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
$activePage = 'leads';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Leads & Google Ads GCLID - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body class="admin-body">
    <?php require __DIR__ . '/_nav.php'; ?>

    <main class="container" style="padding-top:32px; padding-bottom:64px;">
        <div class="admin-page-head">
            <div>
                <h1 class="admin-page-title">Log Leads &amp; Kunjungan Iklan</h1>
                <p class="admin-page-sub">Terdeteksi <strong style="color:var(--ink);"><?= $totalGclid ?></strong> lead membawa identifier Google Ads (GCLID) untuk offline conversion tracking</p>
            </div>
            <a href="/admin/leads.php?export=csv" class="btn btn-accent" style="display:inline-flex; align-items:center; gap:8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Export CSV Google Ads</span>
            </a>
        </div>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Event</th>
                        <th>Sumber Traffic</th>
                        <th>IP Pengunjung</th>
                        <th>Google Click ID (GCLID)</th>
                        <th>Nama / Instansi</th>
                        <th>Paket Wisata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($leads)): ?>
                    <tr><td colspan="7" style="padding:32px; text-align:center; color:var(--ink-faint);">Belum ada data lead masuk.</td></tr>
                    <?php else: foreach ($leads as $l): ?>
                    <tr>
                        <td class="mono" style="font-size:11.5px; white-space:nowrap;"><?= date('d.m.Y H:i', strtotime($l['created_at'])) ?></td>
                        <td>
                            <span class="admin-badge <?= $l['event_type'] === 'proposal_pdf' ? 'inactive' : 'active' ?>" style="font-weight:600;">
                                <?= $l['event_type'] === 'proposal_pdf' ? 'PROPOSAL PDF' : 'KLIK WA' ?>
                            </span>
                        </td>
                        <td style="font-weight:600; color:<?= $l['traffic_source'] === 'Google Ads' ? 'var(--field)' : 'var(--ink)' ?>;">
                            <?= htmlspecialchars($l['traffic_source']) ?>
                        </td>
                        <td class="mono" style="font-size:11px;"><?= htmlspecialchars($l['ip_address']) ?></td>
                        <td class="mono" style="font-size:11px; max-width:180px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                            <?= !empty($l['gclid']) ? '<span style="color:var(--field); font-weight:600;">' . htmlspecialchars($l['gclid']) . '</span>' : '<span style="color:var(--ink-faint);">-</span>' ?>
                        </td>
                        <td style="font-weight:500; color:var(--ink);"><?= htmlspecialchars($l['institution'] ?: $l['lead_name'] ?: '-') ?></td>
                        <td><?= htmlspecialchars($l['package_name'] ?: '-') ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
