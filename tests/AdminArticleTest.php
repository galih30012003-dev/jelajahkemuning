<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('saves article with seo metadata and validates slug uniqueness', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE articles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT NOT NULL,
            thumbnail TEXT NULL,
            meta_title TEXT NULL,
            meta_description TEXT NULL,
            focus_keyword TEXT NULL,
            views INTEGER DEFAULT 0,
            status TEXT DEFAULT 'published',
            published_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");
    Database::setTestInstance($pdo);

    $stmt = $pdo->prepare("INSERT INTO articles (title, slug, content, meta_title, meta_description, focus_keyword) VALUES (:t, :s, :c, :mt, :md, :fk)");
    $stmt->execute([
        ':t' => 'Panduan Offroad Kemuning',
        ':s' => 'panduan-offroad-kemuning',
        ':c' => '<p>Tips offroad aman</p>',
        ':mt' => 'Panduan Lengkap Offroad Jeep Kemuning 2026',
        ':md' => 'Simak rute terbaik dan tips offroad seru di kebun teh Kemuning Karanganyar.',
        ':fk' => 'offroad kemuning'
    ]);

    $id = $pdo->lastInsertId();
    $row = $pdo->query("SELECT * FROM articles WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    assertEquals('offroad kemuning', $row['focus_keyword']);
});
