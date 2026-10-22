<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();

// Handle CSV Export for Google Ads Offline Conversions
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $stmt = $db->query("SELECT gclid, event_type, created_at FROM leads_log WHERE gclid IS NOT NULL AND gclid != '' ORDER BY created_at DESC");
    $leads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=google_ads_conversions_' . date('Ymd_His') . '.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Google Click ID', 'Conversion Name', 'Conversion Time', 'Conversion Value', 'Conversion Currency']);

    foreach ($leads as $l) {
        $convName = ($l['event_type'] === 'proposal_pdf') ? 'Lead Proposal PDF' : 'Lead WhatsApp Wisata';
        $timeStr = date('Y-m-d H:i:s', strtotime($l['created_at']));
        fputcsv($output, [$l['gclid'], $convName, $timeStr, 100000, 'IDR']);
    }
    fclose($output);
    exit;
}

$leads = $db->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
$totalGclid = $db->query("SELECT COUNT(*) FROM leads_log WHERE gclid IS NOT NULL AND gclid != ''")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Log Leads & Google Ads GCLID - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F9FAFB;">
    <div style="background:var(--primary); color:#fff; padding:14px 24px; display:flex; justify-content:space-between; align-items:center;">
        <strong>🌿 Admin Jelajah Kemuning</strong>
        <div style="display:flex; gap:16px; font-size:14px;">
            <a href="/admin/index.php">Dashboard</a>
            <a href="/admin/paket.php">Paket & Harga</a>
            <a href="/admin/artikel.php">Artikel SEO</a>
            <a href="/admin/leads.php" style="font-weight:700; text-decoration:underline;">Leads & GCLID</a>
            <a href="/admin/settings.php">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="padding:32px 16px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:16px;">
            <div>
                <h1 style="font-size:1.75rem; font-weight:800;">Log Lead & Kunjungan Iklan</h1>
                <p style="color:#6B7280; font-size:14px;">Terdeteksi <strong><?= $totalGclid ?></strong> lead membawa identifier Google Ads (GCLID).</p>
            </div>
            <a href="/admin/leads.php?export=csv" class="btn-accent">
                📥 Export CSV Google Ads Offline Conversion
            </a>
        </div>

        <div style="background:#fff; border-radius:12px; border:1px solid #E5E7EB; overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:13px; min-width:800px;">
                <thead>
                    <tr style="background:#F9FAFB; text-align:left; border-bottom:1px solid #E5E7EB;">
                        <th style="padding:12px 16px;">Waktu</th>
                        <th style="padding:12px 16px;">Event</th>
                        <th style="padding:12px 16px;">Sumber Traffic</th>
                        <th style="padding:12px 16px;">IP Pengunjung</th>
                        <th style="padding:12px 16px;">Google Click ID (GCLID)</th>
                        <th style="padding:12px 16px;">Nama / Instansi</th>
                        <th style="padding:12px 16px;">Paket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($leads)): ?>
                    <tr><td colspan="7" style="padding:24px; text-align:center; color:#9CA3AF;">Belum ada data lead masuk.</td></tr>
                    <?php else: foreach ($leads as $l): ?>
                    <tr style="border-bottom:1px solid #F3F4F6;">
                        <td style="padding:12px 16px; white-space:nowrap;"><?= date('d/m/Y H:i', strtotime($l['created_at'])) ?></td>
                        <td style="padding:12px 16px;">
                            <span style="font-weight:700; font-size:11px; padding:2px 8px; border-radius:4px; background:<?= $l['event_type'] === 'proposal_pdf' ? '#FEF3C7; color:#92400E;' : '#ECFDF5; color:#047857;' ?>">
                                <?= $l['event_type'] === 'proposal_pdf' ? 'PROPOSAL PDF' : 'KLIK WA' ?>
                            </span>
                        </td>
                        <td style="padding:12px 16px; font-weight:600; color:<?= $l['traffic_source'] === 'Google Ads' ? '#2563EB' : '#374151' ?>;">
                            <?= htmlspecialchars($l['traffic_source']) ?>
                        </td>
                        <td style="padding:12px 16px; font-family:monospace;"><?= htmlspecialchars($l['ip_address']) ?></td>
                        <td style="padding:12px 16px; font-family:monospace; font-size:11px; max-width:180px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                            <?= !empty($l['gclid']) ? '<span style="color:#059669; font-weight:700;">' . htmlspecialchars($l['gclid']) . '</span>' : '<span style="color:#9CA3AF;">-</span>' ?>
                        </td>
                        <td style="padding:12px 16px;"><?= htmlspecialchars($l['institution'] ?: $l['lead_name'] ?: '-') ?></td>
                        <td style="padding:12px 16px;"><?= htmlspecialchars($l['package_name'] ?: '-') ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
