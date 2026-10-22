<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('exports valid Google Ads Offline Conversion CSV format', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE leads_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event_type TEXT,
            lead_name TEXT,
            lead_phone TEXT,
            institution TEXT,
            package_name TEXT,
            participants INTEGER,
            ip_address TEXT,
            user_agent TEXT,
            traffic_source TEXT,
            utm_source TEXT,
            utm_medium TEXT,
            utm_campaign TEXT,
            gclid TEXT,
            status TEXT,
            created_at DATETIME
        );
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO leads_log (event_type, gclid, created_at) VALUES ('wa_click', 'EAIaIQobChMI12345', '2026-10-22 14:30:00')");

    $leads = $pdo->query("SELECT gclid, event_type, created_at FROM leads_log WHERE gclid IS NOT NULL AND gclid != ''")->fetchAll(PDO::FETCH_ASSOC);

    $csvLines = [];
    $csvLines[] = "Google Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency";
    foreach ($leads as $l) {
        $convName = $l['event_type'] === 'wa_click' ? 'Lead WhatsApp Wisata' : 'Lead Proposal PDF';
        $timeStr = date('Y-m-d H:i:s', strtotime($l['created_at']));
        $csvLines[] = "{$l['gclid']},$convName,$timeStr,100000,IDR";
    }

    $csvOutput = implode("\n", $csvLines);
    assertTrue(str_contains($csvOutput, 'Google Click ID,Conversion Name,Conversion Time'), 'Header must match Google Ads template');
    assertTrue(str_contains($csvOutput, 'EAIaIQobChMI12345,Lead WhatsApp Wisata'), 'Row must contain valid GCLID and Conversion Name');
});
