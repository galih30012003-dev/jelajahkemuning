<?php
$siteTitle = $pageTitle ?? 'Paket Wisata Kemuning - Jeep, Outbound & River Tubing Karanganyar';
$siteDesc = $pageDesc ?? 'Penyedia paket wisata resmi CV Jelajah Kemuning. Melayani Jeep Offroad, River Tubing, Outbound Kantor, dan Sewa Villa Glamping berizin resmi & berasuransi.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Helpers::sanitize($siteTitle) ?></title>
    <meta name="description" content="<?= Helpers::sanitize($siteDesc) ?>">
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <?php if ($gtmId = Helpers::getSetting('gtm_id')): ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= $gtmId ?>');</script>
    <?php endif; ?>
</head>
<body>
<header class="header-nav">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center; height:64px;">
        <a href="/" style="font-weight:800; font-size:1.25rem; color:var(--primary); display:flex; align-items:center; gap:8px;">
            <span>🌿 JELAJAH KEMUNING</span>
        </a>
        <nav style="display:none; gap:20px; align-items:center;" class="nav-desktop">
            <a href="/jeep-adventure-kemuning/">Jeep Offroad</a>
            <a href="/river-tubing-kemuning/">River Tubing</a>
            <a href="/paket-outbound-kemuning/">Outbound</a>
            <a href="/villa-glamping-kemuning/">Villa & Glamping</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat</a>
            <a href="/cari-paket/" style="color:var(--primary-light); font-weight:700;">✨ Kuis Paket</a>
            <a href="/artikel/">Blog</a>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="padding:6px 14px; font-size:14px;">Chat WA</a>
        </nav>
        <button id="mobile-menu-btn" style="background:none; border:none; font-size:24px; cursor:pointer;" aria-label="Menu">☰</button>
    </div>
    <div id="mobile-nav" class="hidden" style="background:#fff; border-top:1px solid var(--border); padding:16px;">
        <div style="display:flex; flex-direction:column; gap:12px;">
            <a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a>
            <a href="/river-tubing-kemuning/">River Tubing Kemuning</a>
            <a href="/paket-outbound-kemuning/">Paket Outbound Kemuning</a>
            <a href="/villa-glamping-kemuning/">Villa & Glamping Kemuning</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat Jeep</a>
            <a href="/cari-paket/" style="font-weight:700; color:var(--primary-light);">✨ Kuis Pilih Paket</a>
            <a href="/proposal/">📄 Unduh Proposal Penawaran PDF</a>
            <a href="/artikel/">Artikel & Tips Wisata</a>
            <a href="/galeri/">Galeri Dokumentasi</a>
            <a href="/kontak/">Kontak & Lokasi</a>
        </div>
    </div>
</header>
