<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$pkgCount = $db->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$artCount = $db->query("SELECT COUNT(*) FROM articles")->fetchColumn();
$leadCount = $db->query("SELECT COUNT(*) FROM leads_log")->fetchColumn();
$recentLeads = $db->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

$activePage = 'index';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body class="admin-body">
    <?php require __DIR__ . '/_nav.php'; ?>

    <main class="container" style="padding-top:32px; padding-bottom:64px;">
        <div class="admin-page-head">
            <div>
                <h1 class="admin-page-title">Ringkasan Sistem</h1>
                <p class="admin-page-sub">Status data paket, artikel blog, dan performa konversi leads</p>
            </div>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="/admin/paket.php" class="btn btn-primary" style="font-size:12px; padding:8px 14px;">+ Kelola Paket</a>
                <a href="/admin/artikel.php" class="btn btn-outline" style="font-size:12px; padding:8px 14px;">+ Tulis Artikel</a>
            </div>
        </div>

        <div class="admin-stat-grid">
            <div class="admin-stat-card">
                <div class="admin-stat-label">Total Paket Wisata</div>
                <div class="admin-stat-value"><?= $pkgCount ?></div>
            </div>
            <div class="admin-stat-card">
                <div class="admin-stat-label">Artikel Blog SEO</div>
                <div class="admin-stat-value"><?= $artCount ?></div>
            </div>
            <div class="admin-stat-card accent">
                <div class="admin-stat-label">Total Lead &amp; Konversi</div>
                <div class="admin-stat-value"><?= $leadCount ?></div>
            </div>
        </div>

        <div class="admin-card" style="padding:0; overflow:hidden;">
            <div style="padding:18px 20px; border-bottom:1px solid var(--rule); display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h2 style="font-size:15px; font-weight:700; color:var(--ink); margin:0;">5 Lead Terbaru Masuk</h2>
                    <p style="font-size:12px; color:var(--ink-muted); margin:2px 0 0;">Pengunjung yang mengirim form proposal atau klik chat WhatsApp</p>
                </div>
                <a href="/admin/leads.php" class="btn-ghost" style="font-size:11px;">Semua lead →</a>
            </div>
            <div class="admin-table-wrap" style="border:none;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Event</th>
                            <th>Nama / Instansi</th>
                            <th>Sumber Traffic</th>
                            <th>Google Click ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentLeads)): ?>
                        <tr><td colspan="5" style="padding:32px; text-align:center; color:var(--ink-faint);">Belum ada lead masuk.</td></tr>
                        <?php else: foreach ($recentLeads as $ld): ?>
                        <tr>
                            <td class="mono" style="font-size:11.5px;"><?= $ld['created_at'] ?></td>
                            <td><strong style="color:var(--ink);"><?= htmlspecialchars($ld['event_type']) ?></strong></td>
                            <td><?= htmlspecialchars($ld['institution'] ?: $ld['lead_name'] ?: '-') ?></td>
                            <td><span class="admin-badge active"><?= htmlspecialchars($ld['traffic_source']) ?></span></td>
                            <td class="mono" style="font-size:11px; color:var(--ink-muted);"><?= htmlspecialchars(substr($ld['gclid'] ?? '-', 0, 16)) ?><?= strlen($ld['gclid'] ?? '') > 16 ? '…' : '' ?></td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
