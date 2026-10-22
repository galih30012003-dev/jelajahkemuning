<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('generates valid dynamic xml sitemap containing categories and articles', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT);
        CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, slug TEXT, status TEXT, published_at DATETIME);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $pdo->exec("INSERT INTO articles (title, slug, status, published_at) VALUES ('Tips Jeep', 'tips-jeep', 'published', '2026-10-22 10:00:00')");

    ob_start();
    require __DIR__ . '/../sitemap.php';
    $xml = ob_get_clean();

    assertTrue(str_contains($xml, '<?xml version="1.0" encoding="UTF-8"?>'), 'Must contain xml declaration');
    assertTrue(str_contains($xml, '<loc>https://jelajahkemuning.com/jeep-adventure-kemuning/</loc>'), 'Must contain category URL');
    assertTrue(str_contains($xml, '<loc>https://jelajahkemuning.com/artikel/tips-jeep/</loc>'), 'Must contain article URL');
});
