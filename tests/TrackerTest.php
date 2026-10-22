<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';

it('captures gclid, utm parameters, and logs lead correctly', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE leads_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event_type TEXT NOT NULL,
            lead_name TEXT NULL,
            lead_phone TEXT NULL,
            institution TEXT NULL,
            package_name TEXT NULL,
            participants INTEGER DEFAULT 0,
            ip_address TEXT NOT NULL,
            user_agent TEXT NULL,
            traffic_source TEXT DEFAULT 'Direct',
            utm_source TEXT NULL,
            utm_medium TEXT NULL,
            utm_campaign TEXT NULL,
            gclid TEXT NULL,
            status TEXT DEFAULT 'new',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");
    Database::setTestInstance($pdo);

    // Simulate query params and headers
    $_GET['gclid'] = 'test_gclid_12345';
    $_GET['utm_source'] = 'google';
    $_GET['utm_campaign'] = 'wisata_kemuning_2026';
    $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 Test';
    $_SERVER['REMOTE_ADDR'] = '103.20.10.5';
    $_SERVER['HTTP_REFERER'] = 'https://www.google.com/';

    $visit = Tracker::captureVisit();
    assertEquals('test_gclid_12345', $visit['gclid'], 'Captured GCLID should match GET param');
    assertEquals('test_gclid_12345', Tracker::getGclid(), 'Stored GCLID should be available');
    assertEquals('103.20.10.5', $visit['ip_address'], 'IP address must be accurately detected');

    // Test Review Focus 1: Second visit without gclid does not overwrite existing gclid
    unset($_GET['gclid']);
    $visit2 = Tracker::captureVisit();
    assertEquals('test_gclid_12345', $visit2['gclid'], 'Existing GCLID must not be erased on repeat visit');

    // Log a WhatsApp Click Lead
    $leadId = Tracker::logLead('wa_click', [
        'package_name' => 'Paket Seru 3',
        'institution' => 'PT Test Corp',
        'participants' => 25
    ]);

    assertTrue($leadId > 0, 'Lead ID should be positive integer');

    $stmt = $pdo->query("SELECT * FROM leads_log WHERE id = $leadId");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    assertEquals('wa_click', $row['event_type']);
    assertEquals('test_gclid_12345', $row['gclid']);
    assertEquals('PT Test Corp', $row['institution']);
    assertEquals(25, (int)$row['participants']);
});
