<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/PackageController.php';
require_once __DIR__ . '/../app/Controllers/QuizController.php';
require_once __DIR__ . '/../app/Controllers/ProposalController.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';

it('runs full end-to-end journey from ad visit to proposal download and offline conversion log', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Setup full tables
    $schema = file_get_contents(__DIR__ . '/../schema.sql');
    $sqliteSchema = str_replace(
        ['AUTO_INCREMENT', 'ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 'LONGTEXT'],
        ['AUTOINCREMENT', '', '', 'DATETIME DEFAULT CURRENT_TIMESTAMP', 'TEXT'],
        $schema
    );
    $sqliteSchema = preg_replace('/ENUM\([^)]+\)/', 'TEXT', $sqliteSchema);
    $pdo->exec($sqliteSchema);
    Database::setTestInstance($pdo);

    // 1. Visitor lands from Google Ads
    $_GET['gclid'] = 'EAIaIQobChMIe2eTestGclid999';
    $_GET['utm_source'] = 'google_ads';
    $_SERVER['REMOTE_ADDR'] = '36.85.10.22';
    Tracker::captureVisit();

    assertEquals('EAIaIQobChMIe2eTestGclid999', Tracker::getGclid());

    // 2. Generate Proposal
    $proposalCtrl = new ProposalController();
    $pdf = $proposalCtrl->buildPdfBuffer([
        'institution' => 'Dinas Pendidikan Jawa Tengah',
        'pic_name' => 'Dr. H. Bambang',
        'phone' => '081299887766',
        'package_name' => 'Paket Outbound Gathering Kemuning',
        'participants' => 50,
        'trip_date' => '2026-11-20'
    ]);
    assertTrue(strlen($pdf) > 1000);

    // 3. Verify Lead Log has recorded the GCLID and IP
    $lead = $pdo->query("SELECT * FROM leads_log WHERE gclid = 'EAIaIQobChMIe2eTestGclid999'")->fetch(PDO::FETCH_ASSOC);
    assertTrue($lead !== false, 'Lead must be found with GCLID');
    assertEquals('36.85.10.22', $lead['ip_address']);
    assertEquals('Dinas Pendidikan Jawa Tengah', $lead['institution']);
});
