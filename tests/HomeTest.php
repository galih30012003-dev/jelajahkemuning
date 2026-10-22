<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

it('retrieves home data including top packages, categories, and faq correctly', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT, description TEXT, icon TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER, sort_order INTEGER);
        CREATE TABLE galleries (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, image_url TEXT, category_tag TEXT, sort_order INTEGER);
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, badge, is_active) VALUES (1, 'Paket Seru 3', 'paket-seru-3', 130000, 'FAVORIT', 1)");

    $controller = new HomeController();
    $data = $controller->getHomeData();
    assertEquals(1, count($data['categories']));
    assertEquals(1, count($data['topPackages']));
    assertTrue(count($data['faqs']) >= 3, 'Default FAQs should be provided');
});
