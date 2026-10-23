<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$message = '';
$error = '';

// Handle Actions (Add, Edit, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        $error = 'Validasi sesi (CSRF) gagal.';
    } else {
        $action = $_POST['action'] ?? '';
        if ($action === 'create' || $action === 'update') {
            $catId = (int)$_POST['category_id'];
            $name = trim($_POST['name']);
            $price = (int)$_POST['price'];
            $priceStrike = (int)($_POST['price_strike'] ?? 0);
            $priceType = $_POST['price_type'] ?? 'per_orang';
            $minPax = (int)($_POST['min_participants'] ?? 1);
            $badge = trim($_POST['badge'] ?? '');
            $inclusions = trim($_POST['inclusions'] ?? '');
            $isActive = isset($_POST['is_active']) ? 1 : 0;
            $ignoreId = ($action === 'update') ? (int)$_POST['id'] : null;

            // Generate unique slug
            $rawSlug = trim($_POST['slug'] ?? '') ?: $name;
            $slug = Helpers::generateUniqueSlug($db, 'packages', $rawSlug, $ignoreId);

            if ($action === 'create') {
                $stmt = $db->prepare("INSERT INTO packages (category_id, name, slug, price, price_strike, price_type, min_participants, badge, inclusions, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$catId, $name, $slug, $price, $priceStrike, $priceType, $minPax, $badge, $inclusions, $isActive]);
                $message = 'Paket wisata berhasil ditambahkan!';
            } else {
                $id = (int)$_POST['id'];
                $stmt = $db->prepare("UPDATE packages SET category_id = ?, name = ?, slug = ?, price = ?, price_strike = ?, price_type = ?, min_participants = ?, badge = ?, inclusions = ?, is_active = ? WHERE id = ?");
                $stmt->execute([$catId, $name, $slug, $price, $priceStrike, $priceType, $minPax, $badge, $inclusions, $isActive, $id]);
                $message = 'Paket wisata berhasil diperbarui!';
            }
        } elseif ($action === 'delete') {
            $id = (int)$_POST['id'];
            $stmt = $db->prepare("DELETE FROM packages WHERE id = ?");
            $stmt->execute([$id]);
            $message = 'Paket wisata berhasil dihapus!';
        }
    }
}

$categories = $db->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
$packages = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id ORDER BY c.name ASC, p.sort_order ASC, p.price ASC")->fetchAll(PDO::FETCH_ASSOC);
$activePage = 'paket';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket Wisata - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body class="admin-body">
    <?php require __DIR__ . '/_nav.php'; ?>

    <main class="container" style="padding-top:32px; padding-bottom:64px;">
        <div class="admin-page-head">
            <div>
                <h1 class="admin-page-title">Kelola Paket &amp; Harga Wisata</h1>
                <p class="admin-page-sub">Tambah, ubah harga, rute, fasilitas, dan kelola ketersediaan paket</p>
            </div>
            <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="btn btn-accent">+ Tambah Paket Baru</button>
        </div>

        <?php if ($message): ?>
        <div style="background:#ECFDF5; color:#065F46; border-left:3px solid #10B981; padding:12px 16px; font-size:13px; margin-bottom:20px;">
            ✓ <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div style="background:#FEF2F2; color:#B91C1C; border-left:3px solid #EF4444; padding:12px 16px; font-size:13px; margin-bottom:20px;">
            ✕ <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Tipe</th>
                        <th>Badge</th>
                        <th>Status</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($packages)): ?>
                    <tr><td colspan="7" style="padding:32px; text-align:center; color:var(--ink-faint);">Belum ada paket wisata.</td></tr>
                    <?php else: foreach ($packages as $pkg): ?>
                    <tr>
                        <td style="font-weight:600; color:var(--pine);"><?= htmlspecialchars($pkg['category_name']) ?></td>
                        <td style="font-weight:700; color:var(--ink);"><?= htmlspecialchars($pkg['name']) ?></td>
                        <td class="mono" style="font-weight:600; color:var(--accent); font-size:13.5px;"><?= Helpers::formatRupiah($pkg['price']) ?></td>
                        <td class="mono" style="font-size:11.5px;"><?= $pkg['price_type'] === 'per_armada' ? 'Per Jeep' : 'Per Orang' ?></td>
                        <td>
                            <?php if ($pkg['badge']): ?>
                            <span class="mono" style="font-size:9.5px; padding:2px 6px; background:rgba(194,65,12,0.1); color:var(--accent); font-weight:600; text-transform:uppercase; letter-spacing:0.08em;"><?= htmlspecialchars($pkg['badge']) ?></span>
                            <?php else: ?>
                            <span style="color:var(--ink-faint);">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="admin-badge <?= $pkg['is_active'] ? 'active' : 'inactive' ?>">
                                <?= $pkg['is_active'] ? 'Aktif' : 'Non-aktif' ?>
                            </span>
                        </td>
                        <td style="text-align:right; white-space:nowrap;">
                            <button onclick='editPackage(<?= json_encode($pkg) ?>)' class="admin-btn-action edit">Edit</button>
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Hapus paket ini?')">
                                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $pkg['id'] ?>">
                                <button type="submit" class="admin-btn-action delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal Form (Add & Edit) -->
    <div id="modal-add" class="hidden" style="position:fixed; inset:0; background:rgba(14,46,32,0.7); display:flex; align-items:center; justify-content:center; z-index:999; padding:20px;">
        <div style="background:#fff; border:1px solid var(--rule); border-top:3px solid var(--ink); border-radius:var(--radius-sm); padding:28px 24px; width:100%; max-width:550px; max-height:90vh; overflow-y:auto;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; padding-bottom:12px; border-bottom:1px solid var(--rule);">
                <h3 id="modal-title" style="font-family:var(--font-display); font-size:1.2rem; font-weight:800; color:var(--ink); margin:0;">Tambah Paket Wisata</h3>
                <button onclick="document.getElementById('modal-add').classList.add('hidden')" style="background:none; border:none; font-size:18px; cursor:pointer; color:var(--ink-faint);">✕</button>
            </div>
            <form method="POST" id="package-form">
                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                <input type="hidden" name="action" id="pkg-action" value="create">
                <input type="hidden" name="id" id="pkg-id" value="">
                <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Kategori</label>
                    <select name="category_id" id="pkg-cat" required style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px; background:#fff;">
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Nama Paket</label>
                    <input type="text" name="name" id="pkg-name" required placeholder="Contoh: Paket Seru 3 (Jeep + Tubing)" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                    <div>
                        <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Harga (Rp)</label>
                        <input type="number" name="price" id="pkg-price" required placeholder="185000" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Tipe Harga</label>
                        <select name="price_type" id="pkg-price-type" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px; background:#fff;">
                            <option value="per_orang">Per Orang</option>
                            <option value="per_armada">Per Armada (Jeep)</option>
                        </select>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                    <div>
                        <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Min. Peserta</label>
                        <input type="number" name="min_participants" id="pkg-min" value="16" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Badge (Optional)</label>
                        <input type="text" name="badge" id="pkg-badge" placeholder="TERLARIS / FAVORIT" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                    </div>
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Fasilitas Termasuk (1 per baris)</label>
                    <textarea name="inclusions" id="pkg-inc" rows="5" placeholder="Jeep Adventure&#10;River Tubing&#10;Makan Siang Prasmanan&#10;Asuransi&#10;Gratis Dokumentasi" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px; font-size:13px;"></textarea>
                </div>
                <div style="margin-bottom:20px;">
                    <label style="display:flex; align-items:center; gap:8px; font-size:13px; cursor:pointer;">
                        <input type="checkbox" name="is_active" id="pkg-active" value="1" checked> Aktifkan dan tampilkan di website
                    </label>
                </div>
                <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Simpan Paket</button>
            </form>
        </div>
    </div>

    <script>
    function editPackage(pkg) {
        document.getElementById('modal-title').textContent = 'Edit Paket Wisata';
        document.getElementById('pkg-action').value = 'update';
        document.getElementById('pkg-id').value = pkg.id;
        document.getElementById('pkg-cat').value = pkg.category_id;
        document.getElementById('pkg-name').value = pkg.name;
        document.getElementById('pkg-price').value = pkg.price;
        document.getElementById('pkg-price-type').value = pkg.price_type;
        document.getElementById('pkg-min').value = pkg.min_participants;
        document.getElementById('pkg-badge').value = pkg.badge || '';
        document.getElementById('pkg-inc').value = pkg.inclusions || '';
        document.getElementById('pkg-active').checked = pkg.is_active == 1;
        document.getElementById('modal-add').classList.remove('hidden');
    }
    </script>
</body>
</html>
