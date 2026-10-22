<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';
require_once __DIR__ . '/../app/Controllers/ProposalController.php';

it('generates proposal PDF buffer and logs lead with special characters', function () {
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
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $controller = new ProposalController();

    // Test Review Focus 2: Special characters like quotes & ampersands in institution name
    $postData = [
        'institution' => 'PT. Maju & Jaya "Sentosa"',
        'pic_name' => 'Budi Setiawan, S.E.',
        'phone' => '08123456789',
        'package_name' => 'Paket Combo Jeep + Tubing',
        'participants' => 30,
        'trip_date' => '2026-11-15'
    ];

    $pdfContent = $controller->buildPdfBuffer($postData);
    assertTrue(strlen($pdfContent) > 500, 'PDF buffer should be valid and non-empty');
    assertEquals('%PDF', substr($pdfContent, 0, 4), 'File must start with PDF magic bytes');

    // Verify lead was stored
    $lead = $pdo->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    assertEquals('proposal_pdf', $lead['event_type']);
    assertEquals('PT. Maju & Jaya "Sentosa"', $lead['institution']);
});
