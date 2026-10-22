<?php
$siteTitle = $pageTitle ?? 'Paket Wisata Kemuning - Jeep, Outbound & River Tubing Karanganyar';
$siteDesc = $pageDesc ?? 'Penyedia paket wisata resmi CV Jelajah Kemuning. Melayani Jeep Offroad, River Tubing, Outbound Kantor, dan Sewa Villa Glamping berizin resmi & berasuransi.';
$rawGtmId = Helpers::getSetting('gtm_id');
$gtmId = preg_replace('/[^A-Za-z0-9-]/', '', $rawGtmId);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Helpers::sanitize($siteTitle) ?></title>
    <meta name="description" content="<?= Helpers::sanitize($siteDesc) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="icon" type="image/png" href="/assets/uploads/cropped-logo-jelajah-kemuningg-32x32.png">

    <?php if (!empty($gtmId)): ?>
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
    <div class="container header-container">
        <a href="/" class="brand-logo">
            <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo Jelajah Kemuning" onerror="this.style.display='none'">
            <span>JELAJAH KEMUNING</span>
        </a>

        <nav class="nav-links">
            <a href="/jeep-adventure-kemuning/">Jeep Offroad</a>
            <a href="/paket-outbound-kemuning/">Outbound & Gathering</a>
            <a href="/river-tubing-kemuning/">River Tubing</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat</a>
            <a href="/villa-glamping-kemuning/">Villa & Glamping</a>
            <a href="/cari-paket/">Kuis Paket</a>
            <a href="/proposal/">Proposal PDF</a>
            <a href="/artikel/">Blog</a>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa" style="padding:8px 16px; font-size:13.5px;">
                Chat WA
            </a>
        </nav>

        <button id="mobile-menu-btn" style="background:none; border:none; font-size:26px; color:var(--text-main); cursor:pointer; padding:6px;" aria-label="Menu">☰</button>
    </div>

    <!-- Mobile Drawer Nav -->
    <div id="mobile-nav" class="hidden" style="background:#fff; border-top:1px solid var(--border); padding:16px;">
        <div style="display:flex; flex-direction:column; gap:12px; font-size:14px; font-weight:600;">
            <a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a>
            <a href="/paket-outbound-kemuning/">Paket Outbound Gathering</a>
            <a href="/river-tubing-kemuning/">River Tubing Kali Senatah</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat Jeep (Include Makan)</a>
            <a href="/villa-glamping-kemuning/">Sewa Villa & Glamping</a>
            <a href="/cari-paket/">Kuis Pilih Paket</a>
            <a href="/proposal/">Proposal Penawaran PDF</a>
            <a href="/galeri/">Galeri Dokumentasi</a>
            <a href="/artikel/">Artikel Wisata</a>
            <a href="/kontak/">Kontak & Lokasi</a>
            <div style="margin-top:8px;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa" style="width:100%; justify-content:center;">
                    Chat WhatsApp Admin
                </a>
            </div>
        </div>
    </div>
</header>
