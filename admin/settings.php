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
$activePage = 'settings';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Situs - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body class="admin-body">
    <?php require __DIR__ . '/_nav.php'; ?>

    <main class="container" style="max-width:820px; padding-top:32px; padding-bottom:64px;">
        <div class="admin-page-head">
            <div>
                <h1 class="admin-page-title">Pengaturan Website &amp; Tracking Iklan</h1>
                <p class="admin-page-sub">Kelola identitas resmi CV, nomor WhatsApp reservasi, dan tag tracking Google Ads / Meta</p>
            </div>
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

        <form method="POST" class="admin-card" style="border-top:3px solid var(--ink);">
            <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">

            <!-- Kontak & Legalitas -->
            <div style="margin-bottom:28px;">
                <h2 style="font-family:var(--font-display); font-size:1.15rem; font-weight:800; color:var(--ink); margin:0 0 16px; padding-bottom:8px; border-bottom:1px solid var(--rule);">1. Kontak &amp; Legalitas CV</h2>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Nama Perusahaan / CV</label>
                    <input type="text" name="cv_name" value="<?= htmlspecialchars(getVal('cv_name', defined('CV_NAME') ? CV_NAME : 'CV Jelajah Kemuning')) ?>" class="qf-input on-paper" style="width:100%;">
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Nomor Induk Berusaha (NIB)</label>
                    <input type="text" name="nib" value="<?= htmlspecialchars(getVal('nib', defined('CV_NIB') ? CV_NIB : '0705250012458')) ?>" class="qf-input on-paper" style="width:100%;">
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
                    <div>
                        <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">WhatsApp Admin Utama</label>
                        <input type="text" name="no_wa_1" value="<?= htmlspecialchars(getVal('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6281234567890')) ?>" placeholder="Contoh: 6285171001566" class="qf-input on-paper" style="width:100%;">
                    </div>
                    <div>
                        <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">WhatsApp Cadangan (Opsional)</label>
                        <input type="text" name="no_wa_2" value="<?= htmlspecialchars(getVal('no_wa_2', '')) ?>" class="qf-input on-paper" style="width:100%;">
                    </div>
                </div>
            </div>

            <!-- Tracking & Analytics -->
            <div style="margin-bottom:28px;">
                <h2 style="font-family:var(--font-display); font-size:1.15rem; font-weight:800; color:var(--ink); margin:0 0 16px; padding-bottom:8px; border-bottom:1px solid var(--rule);">2. Tracking &amp; Google Ads Pixel</h2>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Google Tag Manager Container ID (GTM)</label>
                    <input type="text" name="gtm_id" value="<?= htmlspecialchars(getVal('gtm_id', '')) ?>" placeholder="GTM-XXXXXX" class="qf-input on-paper" style="width:100%;">
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Meta / Facebook Pixel ID</label>
                    <input type="text" name="meta_pixel_id" value="<?= htmlspecialchars(getVal('meta_pixel_id', '')) ?>" placeholder="123456789012345" class="qf-input on-paper" style="width:100%;">
                </div>
                <div style="margin-bottom:24px;">
                    <label style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Google Ads Conversion ID</label>
                    <input type="text" name="google_ads_conversion_id" value="<?= htmlspecialchars(getVal('google_ads_conversion_id', '')) ?>" placeholder="AW-XXXXXXXXX" class="qf-input on-paper" style="width:100%;">
                </div>
            </div>

            <button type="submit" class="btn btn-accent" style="width:100%; justify-content:center; padding:13px;">Simpan Semua Pengaturan</button>
        </form>
    </main>
</body>
</html>
