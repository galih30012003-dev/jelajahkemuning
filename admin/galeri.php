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
$activePage = 'galeri';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri Foto - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body class="admin-body">
    <?php require __DIR__ . '/_nav.php'; ?>

    <main class="container" style="padding-top:32px; padding-bottom:64px;">
        <div class="admin-page-head">
            <div>
                <h1 class="admin-page-title">Kelola Galeri Dokumentasi</h1>
                <p class="admin-page-sub">Upload dokumentasi kegiatan lapangan asli, kelola urutan dan kategori foto</p>
            </div>
            <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="btn btn-accent">+ Upload Foto Baru</button>
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

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:18px;">
            <?php if (empty($galleries)): ?>
            <div style="background:#fff; border:1px solid var(--rule); border-radius:var(--radius-sm); padding:44px 20px; text-align:center; grid-column:1/-1; color:var(--ink-faint);">
                Belum ada foto galeri yang diunggah.
            </div>
            <?php else: foreach ($galleries as $gal): ?>
            <div style="background:#fff; border:1px solid var(--rule); border-top:2px solid var(--ink); border-radius:var(--radius-sm); overflow:hidden; display:flex; flex-direction:column;">
                <div style="aspect-ratio:16/10; overflow:hidden; background:var(--paper-recessed);">
                    <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
                </div>
                <div style="padding:14px 16px; display:flex; justify-content:space-between; align-items:flex-start; gap:10px; flex:1;">
                    <div>
                        <div style="font-weight:700; font-size:13.5px; color:var(--ink); line-height:1.25; margin-bottom:4px;"><?= htmlspecialchars($gal['title']) ?></div>
                        <span class="mono" style="font-size:10px; color:var(--ink-faint); text-transform:uppercase; letter-spacing:0.08em;"><?= htmlspecialchars($gal['category_tag']) ?></span>
                    </div>
                    <form method="POST" onsubmit="return confirm('Hapus foto ini?')" style="margin:0;">
                        <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $gal['id'] ?>">
                        <button type="submit" class="admin-btn-action delete">Hapus</button>
                    </form>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </main>

    <div id="modal-add" class="hidden" style="position:fixed; inset:0; background:rgba(14,46,32,0.7); display:flex; align-items:center; justify-content:center; z-index:999; padding:20px;">
        <div style="background:#fff; border:1px solid var(--rule); border-top:3px solid var(--ink); border-radius:var(--radius-sm); padding:28px 24px; width:100%; max-width:480px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; padding-bottom:12px; border-bottom:1px solid var(--rule);">
                <h3 style="font-family:var(--font-display); font-size:1.2rem; font-weight:800; color:var(--ink); margin:0;">Upload Foto Dokumentasi</h3>
                <button onclick="document.getElementById('modal-add').classList.add('hidden')" style="background:none; border:none; font-size:18px; cursor:pointer; color:var(--ink-faint);">✕</button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                <input type="hidden" name="action" value="create">
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Judul / Nama Acara</label>
                    <input type="text" name="title" required placeholder="Contoh: Gathering PT Telkom Solo" class="qf-input on-paper" style="width:100%;">
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Kategori Wisata</label>
                    <select name="category_tag" class="qf-input on-paper" style="width:100%;">
                        <option value="jeep">Jeep Adventure</option>
                        <option value="tubing">River Tubing</option>
                        <option value="outbound">Outbound Gathering</option>
                        <option value="villa">Villa &amp; Glamping</option>
                    </select>
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Pilih File Gambar (JPG/PNG/WebP)</label>
                    <input type="file" name="image_file" accept=".jpg,.jpeg,.png,.webp" style="width:100%; font-size:13px;">
                </div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Atau Masukkan URL Gambar</label>
                    <input type="url" name="image_url" placeholder="https://..." class="qf-input on-paper" style="width:100%;">
                </div>
                <button type="submit" class="btn btn-accent" style="width:100%; justify-content:center; padding:12px;">Upload Foto</button>
            </form>
        </div>
    </div>
</body>
</html>
