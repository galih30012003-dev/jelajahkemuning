<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/Database.php';
require_once __DIR__ . '/app/Tracker.php';
require_once __DIR__ . '/app/Helpers.php';

// Record visitor attribution
Tracker::captureVisit();

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// Core routes
switch ($uri) {
    case '/':
        require_once __DIR__ . '/app/Controllers/HomeController.php';
        (new HomeController())->index();
        break;

    case '/jeep-adventure-kemuning':
    case '/river-tubing-kemuning':
    case '/paket-outbound-kemuning':
    case '/paket-hemat-jeep-kemuning':
    case '/villa-glamping-kemuning':
        require_once __DIR__ . '/app/Controllers/PackageController.php';
        (new PackageController())->showBySlug(trim($uri, '/'));
        break;

    case '/cari-paket':
        require_once __DIR__ . '/app/Controllers/QuizController.php';
        (new QuizController())->index();
        break;

    case '/proposal':
        require_once __DIR__ . '/app/Controllers/ProposalController.php';
        (new ProposalController())->index();
        break;

    case '/proposal/generate':
        require_once __DIR__ . '/app/Controllers/ProposalController.php';
        (new ProposalController())->generate();
        break;

    case '/artikel':
        require_once __DIR__ . '/app/Controllers/ArticleController.php';
        (new ArticleController())->index();
        break;

    case (preg_match('#^/artikel/([a-zA-Z0-9_-]+)$#', $uri, $matches) ? true : false):
        require_once __DIR__ . '/app/Controllers/ArticleController.php';
        (new ArticleController())->detail($matches[1]);
        break;

    case '/galeri':
    case '/tentang-kami':
    case '/kontak':
        require_once __DIR__ . '/app/Controllers/StaticController.php';
        (new StaticController())->show(trim($uri, '/'));
        break;

    case '/sitemap.xml':
        require_once __DIR__ . '/sitemap.php';
        break;

    default:
        http_response_code(404);
        $pageTitle = 'Halaman Tidak Ditemukan - Jelajah Kemuning';
        require __DIR__ . '/app/Views/layouts/header.php';
        echo '<div class="container" style="padding:80px 0; text-align:center;"><h2>404 - Halaman Tidak Ditemukan</h2><p style="margin-top:12px;"><a href="/" class="btn-primary">Kembali ke Beranda</a></p></div>';
        require __DIR__ . '/app/Views/layouts/footer.php';
        break;
}
