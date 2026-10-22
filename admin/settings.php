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
        $settingsToUpdate = [
            'no_wa_1' => trim($_POST['no_wa_1'] ?? ''),
            'no_wa_2' => trim($_POST['no_wa_2'] ?? ''),
            'cv_name' => trim($_POST['cv_name'] ?? ''),
            'nib' => trim($_POST['nib'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'bank_info' => trim($_POST['bank_info'] ?? ''),
            'gtm_id' => trim($_POST['gtm_id'] ?? ''),
            'meta_pixel_id' => trim($_POST['meta_pixel_id'] ?? ''),
            'google_ads_conversion_id' => trim($_POST['google_ads_conversion_id'] ?? ''),
        ];

        foreach ($settingsToUpdate as $key => $val) {
            $stmt = $db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?");
            // For SQLite / MySQL compatibility:
            try {
                $stmt->execute([$key, $val, $val]);
            } catch (\Throwable $e) {
                // SQLite fallback
                $del = $db->prepare("DELETE FROM settings WHERE setting_key = ?");
                $del->execute([$key]);
                $ins = $db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)");
                $ins->execute([$key, $val]);
            }
        }
        $message = 'Pengaturan berhasil disimpan!';
    }
}

function getVal($k, $default = '') {
    return Helpers::getSetting($k, $default);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Situs - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F9FAFB;">
    <div style="background:var(--primary); color:#fff; padding:14px 24px; display:flex; justify-content:space-between; align-items:center;">
        <strong>🌿 Admin Jelajah Kemuning</strong>
        <div style="display:flex; gap:16px; font-size:14px;">
            <a href="/admin/index.php">Dashboard</a>
            <a href="/admin/paket.php">Paket & Harga</a>
            <a href="/admin/artikel.php">Artikel SEO</a>
            <a href="/admin/leads.php">Leads & GCLID</a>
            <a href="/admin/settings.php" style="font-weight:700; text-decoration:underline;">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="max-width:750px; padding:32px 16px;">
        <h1 style="font-size:1.75rem; font-weight:800; margin-bottom:24px;">Pengaturan Website & Tracking Iklan</h1>

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

        <form method="POST" style="background:#fff; border-radius:12px; border:1px solid #E5E7EB; padding:24px;">
            <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">

            <!-- Kontak & Legalitas -->
            <h3 style="font-size:16px; font-weight:700; margin-bottom:16px; color:var(--primary);">1. Kontak & Legalitas CV</h3>
            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Nama Perusahaan / CV</label>
                <input type="text" name="cv_name" value="<?= htmlspecialchars(getVal('cv_name', defined('CV_NAME') ? CV_NAME : 'CV Jelajah Kemuning')) ?>" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
            </div>
            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Nomor Izin Berusaha (NIB)</label>
                <input type="text" name="nib" value="<?= htmlspecialchars(getVal('nib', defined('CV_NIB') ? CV_NIB : '0705250012458')) ?>" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:14px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">WhatsApp Admin Utama</label>
                    <input type="text" name="no_wa_1" value="<?= htmlspecialchars(getVal('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6281234567890')) ?>" placeholder="Contoh: 6281234567890" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">WhatsApp Cadangan (Opsional)</label>
                    <input type="text" name="no_wa_2" value="<?= htmlspecialchars(getVal('no_wa_2', '')) ?>" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
                </div>
            </div>

            <!-- Tracking & Analytics -->
            <h3 style="font-size:16px; font-weight:700; margin:24px 0 16px; color:var(--primary);">2. Tracking & Google Ads Pixel</h3>
            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Google Tag Manager Container ID (GTM)</label>
                <input type="text" name="gtm_id" value="<?= htmlspecialchars(getVal('gtm_id', '')) ?>" placeholder="GTM-XXXXXX" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
            </div>
            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Meta / Facebook Pixel ID</label>
                <input type="text" name="meta_pixel_id" value="<?= htmlspecialchars(getVal('meta_pixel_id', '')) ?>" placeholder="123456789012345" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
            </div>
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Google Ads Conversion ID</label>
                <input type="text" name="google_ads_conversion_id" value="<?= htmlspecialchars(getVal('google_ads_conversion_id', '')) ?>" placeholder="AW-XXXXXXXXX" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;">
            </div>

            <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Simpan Semua Pengaturan</button>
        </form>
    </div>
</body>
</html>
