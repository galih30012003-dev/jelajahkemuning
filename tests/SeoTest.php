<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/PackageController.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';

it('validates SEO helpers, canonical URLs, and Schema.org builders', function () {
    $base = Helpers::baseUrl();
    assertEquals('https://jelajahkemuning.com', $base);

    // 1. Canonical URLs
    assertEquals('https://jelajahkemuning.com/', Helpers::canonicalUrl('/'));
    assertEquals('https://jelajahkemuning.com/galeri/', Helpers::canonicalUrl('/galeri'));
    assertEquals('https://jelajahkemuning.com/artikel/tips-offroad/', Helpers::canonicalUrl('artikel/tips-offroad'));

    // 2. TravelAgency Schema
    $agency = Helpers::buildTravelAgencySchema();
    assertEquals('https://schema.org', $agency['@context']);
    assertEquals('TravelAgency', $agency['@type']);
    assertEquals('CV Jelajah Kemuning', $agency['name']);
    assertTrue(str_contains($agency['telephone'], '+62'), 'Telephone must be in international format');
    assertEquals('ID', $agency['address']['addressCountry']);
    assertEquals(-7.5873, $agency['geo']['latitude']);

    // 3. FAQPage Schema
    $faqs = [
        ['q' => 'Berapa tarif jeep?', 'a' => 'Mulai dari Rp 350.000 per armada.']
    ];
    $faqSchema = Helpers::buildFaqSchema($faqs);
    assertEquals('FAQPage', $faqSchema['@type']);
    assertEquals(1, count($faqSchema['mainEntity']));
    assertEquals('Berapa tarif jeep?', $faqSchema['mainEntity'][0]['name']);
    assertEquals('Mulai dari Rp 350.000 per armada.', $faqSchema['mainEntity'][0]['acceptedAnswer']['text']);

    // 4. BreadcrumbList Schema
    $crumbs = [
        'Beranda' => '/',
        'Artikel' => '/artikel/',
        'Tips Offroad' => '/artikel/tips-offroad/'
    ];
    $breadSchema = Helpers::buildBreadcrumbSchema($crumbs);
    assertEquals('BreadcrumbList', $breadSchema['@type']);
    assertEquals(3, count($breadSchema['itemListElement']));
    assertEquals(1, $breadSchema['itemListElement'][0]['position']);
    assertEquals('https://jelajahkemuning.com/artikel/tips-offroad/', $breadSchema['itemListElement'][2]['item']);

    // 5. Article Schema
    $art = [
        'title' => 'Tips Offroad Jeep Kemuning',
        'content' => '<p>Panduan lengkap offroad.</p>',
        'meta_description' => 'Tips aman menjelajahi rute offroad kebun teh.',
        'thumbnail' => '/assets/uploads/jeep-medium-1.webp',
        'published_at' => '2026-10-23 09:00:00'
    ];
    $artSchema = Helpers::buildArticleSchema($art, 'https://jelajahkemuning.com/artikel/tips-offroad/');
    assertEquals('Article', $artSchema['@type']);
    assertEquals('Tips Offroad Jeep Kemuning', $artSchema['headline']);
    assertTrue(str_starts_with($artSchema['image'], 'https://jelajahkemuning.com/'), 'Thumbnail must be absolute URL');
    assertEquals('CV Jelajah Kemuning', $artSchema['publisher']['name']);

    // 6. PackageList Schema
    $pkgs = [
        ['name' => 'Jeep Short 1', 'summary' => 'Rute kebun teh santai', 'price' => 350000, 'thumbnail' => '']
    ];
    $pkgListSchema = Helpers::buildPackageListSchema($pkgs, 'Jeep Adventure', 'https://jelajahkemuning.com/jeep-adventure-kemuning/');
    assertEquals('ItemList', $pkgListSchema['@type']);
    assertEquals(1, count($pkgListSchema['itemListElement']));
    assertEquals('TouristTrip', $pkgListSchema['itemListElement'][0]['item']['@type']);
    assertEquals(350000, $pkgListSchema['itemListElement'][0]['item']['offers']['price']);
});

it('verifies Open Graph and JSON-LD markup on homepage and category views', function () {
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
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, badge, is_active) VALUES (1, 'Jeep Short 1', 'jeep-short-1', 350000, 'FAVORIT', 1)");

    // Test Homepage rendering
    ob_start();
    (new HomeController())->index();
    $homeHtml = ob_get_clean();

    assertTrue(str_contains($homeHtml, 'property="og:locale" content="id_ID"'), 'Must contain og:locale');
    assertTrue(str_contains($homeHtml, 'property="og:type" content="website"'), 'Home must be og:type website');
    assertTrue(str_contains($homeHtml, 'property="og:site_name" content="Jelajah Kemuning"'), 'Must contain og:site_name');
    assertTrue(str_contains($homeHtml, 'property="og:title"'), 'Must contain og:title');
    assertTrue(str_contains($homeHtml, 'property="og:description"'), 'Must contain og:description');
    assertTrue(str_contains($homeHtml, 'property="og:image" content="https://jelajahkemuning.com/assets/uploads/'), 'OG image must be absolute URL');
    assertTrue(str_contains($homeHtml, 'name="twitter:card" content="summary_large_image"'), 'Must contain twitter:card');
    assertTrue(str_contains($homeHtml, 'rel="canonical" href="https://jelajahkemuning.com/"'), 'Home canonical must be root');
    assertTrue(str_contains($homeHtml, '"@type": "TravelAgency"'), 'Home must render TravelAgency JSON-LD');
    assertTrue(str_contains($homeHtml, '"@type": "FAQPage"'), 'Home must render FAQPage JSON-LD');

    // Test Category Page rendering
    ob_start();
    (new PackageController())->showBySlug('jeep-adventure-kemuning');
    $pkgHtml = ob_get_clean();

    assertTrue(str_contains($pkgHtml, 'rel="canonical" href="https://jelajahkemuning.com/jeep-adventure-kemuning/"'), 'Category canonical URL');
    assertTrue(str_contains($pkgHtml, '"@type": "BreadcrumbList"'), 'Category must render BreadcrumbList JSON-LD');
    assertTrue(str_contains($pkgHtml, '"@type": "ItemList"'), 'Category must render ItemList JSON-LD');
});
