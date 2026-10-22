<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        $error = 'Validasi sesi (CSRF) gagal.';
    } else {
        $action = $_POST['action'] ?? '';
        if ($action === 'create') {
            $title = trim($_POST['title']);
            $catTag = trim($_POST['category_tag'] ?? 'jeep');
            $imageUrl = trim($_POST['image_url'] ?? '');

            // Handle file upload if provided
            if (!empty($_FILES['image_file']['name'])) {
                $file = $_FILES['image_file'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (!in_array($ext, $allowed)) {
                    $error = 'Format file tidak diizinkan. Gunakan JPG, PNG, atau WebP.';
                } else {
                    $uploadDir = __DIR__ . '/../assets/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    $filename = 'galeri_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                    $dest = $uploadDir . $filename;
                    if (move_uploaded_file($file['tmp_name'], $dest)) {
                        $imageUrl = '/assets/uploads/' . $filename;
                    } else {
                        $error = 'Gagal mengunggah gambar ke server.';
                    }
                }
            }

            if (empty($error) && !empty($imageUrl)) {
                $stmt = $db->prepare("INSERT INTO galleries (title, image_url, category_tag) VALUES (?, ?, ?)");
                $stmt->execute([$title, $imageUrl, $catTag]);
                $message = 'Foto dokumentasi berhasil ditambahkan!';
            } elseif (empty($error)) {
                $error = 'Harap pilih file gambar atau isi URL gambar.';
            }
        } elseif ($action === 'delete') {
            $id = (int)$_POST['id'];
            $stmt = $db->prepare("DELETE FROM galleries WHERE id = ?");
            $stmt->execute([$id]);
            $message = 'Foto berhasil dihapus!';
        }
    }
}

$galleries = $db->query("SELECT * FROM galleries ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Galeri Foto - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F9FAFB;">
    <div style="background:var(--primary); color:#fff; padding:14px 24px; display:flex; justify-content:space-between; align-items:center;">
        <strong>🌿 Admin Jelajah Kemuning</strong>
        <div style="display:flex; gap:16px; font-size:14px;">
            <a href="/admin/index.php">Dashboard</a>
            <a href="/admin/paket.php">Paket & Harga</a>
            <a href="/admin/artikel.php">Artikel SEO</a>
            <a href="/admin/galeri.php" style="font-weight:700; text-decoration:underline;">Galeri</a>
            <a href="/admin/leads.php">Leads & GCLID</a>
            <a href="/admin/settings.php">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="padding:32px 16px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <h1 style="font-size:1.75rem; font-weight:800;">Kelola Galeri Dokumentasi</h1>
            <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="btn-accent">+ Upload Foto Baru</button>
        </div>

        <?php if ($message): ?>
        <div style="background:#ECFDF5; color:#047857; padding:12px; border-radius:8px; margin-bottom:16px;">
            ✓ <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div style="background:#FEE2E2; color:#B91C1C; padding:12px; border-radius:8px; margin-bottom:16px;">
            ✕ <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
            <?php if (empty($galleries)): ?>
            <div style="background:#fff; border:1px solid #E5E7EB; border-radius:12px; padding:32px; text-align:center; grid-column:1/-1; color:#9CA3AF;">
                Belum ada foto galeri yang diunggah.
            </div>
            <?php else: foreach ($galleries as $gal): ?>
            <div style="background:#fff; border:1px solid #E5E7EB; border-radius:12px; overflow:hidden;">
                <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" style="width:100%; height:180px; object-fit:cover;">
                <div style="padding:16px; display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <div style="font-weight:700; font-size:14px;"><?= htmlspecialchars($gal['title']) ?></div>
                        <div style="font-size:12px; color:#6B7280; text-transform:uppercase;"><?= htmlspecialchars($gal['category_tag']) ?></div>
                    </div>
                    <form method="POST" onsubmit="return confirm('Hapus foto ini?')">
                        <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $gal['id'] ?>">
                        <button type="submit" style="background:none; border:none; color:#EF4444; cursor:pointer; font-size:13px; font-weight:600;">Hapus</button>
                    </form>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>

    <div id="modal-add" class="hidden" style="position:fixed; inset:0; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; z-index:999;">
        <div style="background:#fff; border-radius:12px; padding:24px; width:100%; max-width:480px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <h3 style="font-size:18px; font-weight:800;">Upload Foto Dokumentasi</h3>
                <button onclick="document.getElementById('modal-add').classList.add('hidden')" style="background:none; border:none; font-size:20px; cursor:pointer;">✕</button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                <input type="hidden" name="action" value="create">
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Judul / Nama Acara</label>
                    <input type="text" name="title" required placeholder="Contoh: Gathering PT Telkom Solo" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Kategori Wisata</label>
                    <select name="category_tag" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px; background:#fff;">
                        <option value="jeep">Jeep Adventure</option>
                        <option value="tubing">River Tubing</option>
                        <option value="outbound">Outbound Gathering</option>
                        <option value="villa">Villa & Glamping</option>
                    </select>
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Pilih File Gambar (JPG/PNG/WebP)</label>
                    <input type="file" name="image_file" accept=".jpg,.jpeg,.png,.webp" style="width:100%; font-size:13px;">
                </div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Atau Masukkan URL Gambar</label>
                    <input type="url" name="image_url" placeholder="https://..." style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                </div>
                <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Upload Foto</button>
            </form>
        </div>
    </div>
</body>
</html>
