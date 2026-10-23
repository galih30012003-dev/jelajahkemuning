<?php
$siteTitle = $pageTitle ?? 'Paket Wisata Kemuning - Jeep, Outbound & River Tubing Karanganyar';
$siteDesc = $pageDesc ?? 'Penyedia paket wisata resmi CV Jelajah Kemuning. Melayani Jeep Offroad, River Tubing, Outbound Kantor, dan Sewa Villa Glamping berizin resmi & berasuransi.';
$baseUrl = Helpers::baseUrl();
$canonicalUrl = $pageCanonical ?? Helpers::canonicalUrl();
$ogTitle = $pageOgTitle ?? $siteTitle;
$ogDesc = $pageOgDesc ?? $siteDesc;
$ogType = $pageOgType ?? 'website';
$ogImage = $pageOgImage ?? ($baseUrl . '/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp');
if (!str_starts_with($ogImage, 'http')) {
    $ogImage = $baseUrl . '/' . ltrim($ogImage, '/');
}

$rawGtmId = Helpers::getSetting('gtm_id');
$gtmId = preg_replace('/[^A-Za-z0-9-]/', '', $rawGtmId);
$waPhone = Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566');
$nibNum = Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458');
$currentPath = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/');
if ($currentPath === '') $currentPath = '/';
$isActive = static function (array $prefixes) use ($currentPath): string {
    foreach ($prefixes as $p) {
        if ($p === '/' ? $currentPath === '/' : str_starts_with($currentPath, $p)) return ' is-active';
    }
    return '';
};
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Helpers::sanitize($siteTitle) ?></title>
    <meta name="description" content="<?= Helpers::sanitize($siteDesc) ?>">
    <link rel="canonical" href="<?= Helpers::sanitize($canonicalUrl) ?>">

    <!-- Open Graph / WhatsApp Preview -->
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="<?= Helpers::sanitize($ogType) ?>">
    <meta property="og:site_name" content="Jelajah Kemuning">
    <meta property="og:title" content="<?= Helpers::sanitize($ogTitle) ?>">
    <meta property="og:description" content="<?= Helpers::sanitize($ogDesc) ?>">
    <meta property="og:url" content="<?= Helpers::sanitize($canonicalUrl) ?>">
    <meta property="og:image" content="<?= Helpers::sanitize($ogImage) ?>">
    <meta property="og:image:secure_url" content="<?= Helpers::sanitize($ogImage) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= Helpers::sanitize($ogTitle) ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= Helpers::sanitize($ogTitle) ?>">
    <meta name="twitter:description" content="<?= Helpers::sanitize($ogDesc) ?>">
    <meta name="twitter:image" content="<?= Helpers::sanitize($ogImage) ?>">

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    <?= json_encode(Helpers::buildTravelAgencySchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>

    <?php if (!empty($pageSchemas) && is_array($pageSchemas)): ?>
        <?php foreach ($pageSchemas as $sch): ?>
            <?php if (!empty($sch)): ?>
            <script type="application/ld+json">
            <?= json_encode($sch, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
            </script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="icon" type="image/png" href="/assets/uploads/cropped-logo-jelajah-kemuningg.png">

    <?php if (!empty($gtmId)): ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= $gtmId ?>');</script>
    <?php endif; ?>
</head>
<body>

<!-- Utility strip -->
<div class="topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span class="topbar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>Operator resmi <strong>CV Jelajah Kemuning</strong></span>
                <span class="topbar-badge">NIB <?= Helpers::sanitize($nibNum) ?></span>
            </span>
        </div>
        <div class="topbar-right">
            <span class="topbar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Terminal Wisata Kemuning, Karanganyar
            </span>
            <a href="<?= Helpers::generateWaLink() ?>" class="topbar-item topbar-wa">WA 0851-7100-1566</a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="header-nav">
    <div class="container header-container">
        <a href="/" class="brand-logo" aria-label="Jelajah Kemuning — beranda">
            <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo CV Jelajah Kemuning" onerror="this.style.display='none'">
            <span class="brand-text-wrap">
                <span class="brand-name">Jelajah Kemuning</span>
                <span class="brand-sub">Tour &amp; Outbound · Karanganyar</span>
            </span>
        </a>

        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="/" class="nav-item<?= $isActive(['/']) ?>">Beranda</a>

            <div class="nav-dropdown">
                <a href="#katalog-paket" class="nav-item<?= $isActive(['/jeep-adventure-kemuning', '/river-tubing-kemuning', '/paket-outbound-kemuning', '/paket-hemat-jeep-kemuning', '/villa-glamping-kemuning']) ?>">
                    <span>Paket</span>
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                </a>
                <div class="nav-dropdown-menu">
                    <a href="/jeep-adventure-kemuning/" class="dropdown-link">
                        <span>
                            <span class="dropdown-link-title">Jeep Adventure 4×4</span>
                            <span class="dropdown-link-sub">Offroad kebun teh &amp; susur sungai</span>
                        </span>
                        <span class="dropdown-link-price">350rb/jeep</span>
                    </a>
                    <a href="/paket-outbound-kemuning/" class="dropdown-link">
                        <span>
                            <span class="dropdown-link-title">Outbound &amp; Gathering</span>
                            <span class="dropdown-link-sub">Fun games, makan &amp; aula</span>
                        </span>
                        <span class="dropdown-link-price">90rb/org</span>
                    </a>
                    <a href="/river-tubing-kemuning/" class="dropdown-link">
                        <span>
                            <span class="dropdown-link-title">River Tubing</span>
                            <span class="dropdown-link-sub">Kali Guci, Senatah &amp; Pring Kuning</span>
                        </span>
                        <span class="dropdown-link-price">45rb/org</span>
                    </a>
                    <a href="/paket-hemat-jeep-kemuning/" class="dropdown-link">
                        <span>
                            <span class="dropdown-link-title">Paket Hemat Jeep</span>
                            <span class="dropdown-link-sub">Per orang, sudah termasuk makan</span>
                        </span>
                        <span class="dropdown-link-price">165rb/org</span>
                    </a>
                    <a href="/villa-glamping-kemuning/" class="dropdown-link">
                        <span>
                            <span class="dropdown-link-title">Villa &amp; Glamping 2D1N</span>
                            <span class="dropdown-link-sub">Menginap di lereng Lawu</span>
                        </span>
                        <span class="dropdown-link-price">350rb/org</span>
                    </a>
                </div>
            </div>

            <a href="/cari-paket/" class="nav-item<?= $isActive(['/cari-paket']) ?>">Rekomendasi</a>
            <a href="/proposal/" class="nav-item<?= $isActive(['/proposal']) ?>">Proposal</a>
            <a href="/galeri/" class="nav-item<?= $isActive(['/galeri']) ?>">Galeri</a>
            <a href="/artikel/" class="nav-item<?= $isActive(['/artikel']) ?>">Artikel</a>
            <a href="/kontak/" class="nav-item<?= $isActive(['/kontak', '/tentang-kami']) ?>">Kontak</a>
        </nav>

        <div class="header-actions">
            <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>Booking WA</span>
            </a>
        </div>

        <button id="mobile-menu-btn" class="menu-btn" aria-label="Buka menu" aria-expanded="false">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="3" y1="7" x2="21" y2="7"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="17" x2="21" y2="17"/></svg>
        </button>
    </div>

    <div id="mobile-nav" class="hidden">
        <div class="container">
            <a href="/">Beranda</a>
            <a href="/jeep-adventure-kemuning/">Jeep Adventure — 350rb/jeep</a>
            <a href="/paket-outbound-kemuning/">Outbound &amp; Gathering — 90rb/org</a>
            <a href="/river-tubing-kemuning/">River Tubing — 45rb/org</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat Jeep — 165rb/org</a>
            <a href="/villa-glamping-kemuning/">Villa &amp; Glamping 2D1N — 350rb/org</a>
            <a href="/cari-paket/">Kuis pilih paket</a>
            <a href="/proposal/">Proposal penawaran PDF</a>
            <a href="/galeri/">Galeri trip</a>
            <a href="/artikel/">Artikel</a>
            <a href="/kontak/">Kontak &amp; meeting point</a>
            <div style="margin-top:16px;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%;">Chat WhatsApp admin</a>
            </div>
        </div>
    </div>
</header>
