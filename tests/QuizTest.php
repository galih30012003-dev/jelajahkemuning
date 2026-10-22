<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/QuizController.php';

it('matches the best package based on quiz parameters', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT, description TEXT, icon TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER, sort_order INTEGER);
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (id, name, slug) VALUES (1, 'Jeep Adventure', 'jeep-adventure-kemuning'), (2, 'Outbound', 'paket-outbound-kemuning')");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, min_participants, is_active) VALUES (1, 'Jeep Short', 'jeep-short', 300000, 1, 1)");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, min_participants, is_active) VALUES (2, 'Paket Outbound Kantor', 'outbound-kantor', 185000, 16, 1)");

    $quiz = new QuizController();

    // Large group wanting outbound -> should match Outbound Kantor
    $resultLarge = $quiz->match('kantor', 'outbound', 35);
    assertEquals('Paket Outbound Kantor', $resultLarge['name']);

    // Small family wanting jeep -> should match Jeep Short
    $resultSmall = $quiz->match('keluarga', 'jeep', 4);
    assertEquals('Jeep Short', $resultSmall['name']);
});
