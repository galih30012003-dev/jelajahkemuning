<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$pkgCount = $db->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$artCount = $db->query("SELECT COUNT(*) FROM articles")->fetchColumn();
$leadCount = $db->query("SELECT COUNT(*) FROM leads_log")->fetchColumn();
$recentLeads = $db->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Jelajah Kemuning</title>
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
            <a href="/admin/settings.php">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="padding:32px 16px;">
        <h1 style="font-size:1.75rem; font-weight:800; margin-bottom:24px;">Ringkasan Sistem</h1>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:20px; margin-bottom:32px;">
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Total Paket Wisata</div>
                <div style="font-size:28px; font-weight:800; color:var(--primary);"><?= $pkgCount ?></div>
            </div>
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Artikel Blog SEO</div>
                <div style="font-size:28px; font-weight:800; color:var(--primary);"><?= $artCount ?></div>
            </div>
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Total Lead & Konversi</div>
                <div style="font-size:28px; font-weight:800; color:var(--accent);"><?= $leadCount ?></div>
            </div>
        </div>

        <div style="background:#fff; border-radius:10px; border:1px solid #E5E7EB; padding:24px;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:16px;">5 Lead Terbaru Masuk</h3>
            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                <thead>
                    <tr style="background:#F9FAFB; text-align:left; border-bottom:1px solid #E5E7EB;">
                        <th style="padding:10px;">Waktu</th>
                        <th style="padding:10px;">Event</th>
                        <th style="padding:10px;">Nama / Instansi</th>
                        <th style="padding:10px;">Sumber</th>
                        <th style="padding:10px;">GCLID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentLeads)): ?>
                    <tr><td colspan="5" style="padding:16px; text-align:center; color:#9CA3AF;">Belum ada lead masuk.</td></tr>
                    <?php else: foreach ($recentLeads as $ld): ?>
                    <tr style="border-bottom:1px solid #F3F4F6;">
                        <td style="padding:10px;"><?= $ld['created_at'] ?></td>
                        <td style="padding:10px;"><strong><?= htmlspecialchars($ld['event_type']) ?></strong></td>
                        <td style="padding:10px;"><?= htmlspecialchars($ld['institution'] ?: $ld['lead_name'] ?: '-') ?></td>
                        <td style="padding:10px;"><?= htmlspecialchars($ld['traffic_source']) ?></td>
                        <td style="padding:10px; font-family:monospace;"><?= htmlspecialchars(substr($ld['gclid'] ?? '-', 0, 15)) ?>...</td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
