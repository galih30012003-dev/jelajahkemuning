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
            <a href="/cari-paket/" style="color:var(--color-primary); font-weight:800;">✨ Kuis Paket</a>
            <a href="/proposal/">📄 Proposal PDF</a>
            <a href="/artikel/">Blog</a>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="padding:9px 18px; font-size:13.5px;">
                <span style="display:inline-block; width:8px; height:8px; background:#4ADE80; border-radius:50%; box-shadow:0 0 8px #4ADE80;"></span>
                Chat WA Admin
            </a>
        </nav>

        <button id="mobile-menu-btn" style="background:none; border:none; font-size:26px; color:var(--color-primary); cursor:pointer; padding:6px;" aria-label="Menu">☰</button>
    </div>

    <!-- Mobile Drawer Nav -->
    <div id="mobile-nav" class="hidden" style="background:#fff; border-top:1px solid var(--border); padding:20px; box-shadow:var(--shadow-med);">
        <div style="display:flex; flex-direction:column; gap:14px; font-size:15px; font-weight:700;">
            <a href="/jeep-adventure-kemuning/" style="display:flex; align-items:center; gap:8px;">🚙 Jeep Adventure Kemuning</a>
            <a href="/paket-outbound-kemuning/" style="display:flex; align-items:center; gap:8px;">🎯 Paket Outbound Gathering</a>
            <a href="/river-tubing-kemuning/" style="display:flex; align-items:center; gap:8px;">🌊 River Tubing Kali Senatah</a>
            <a href="/paket-hemat-jeep-kemuning/" style="display:flex; align-items:center; gap:8px;">🍱 Paket Hemat Jeep (Inc. Makan)</a>
            <a href="/villa-glamping-kemuning/" style="display:flex; align-items:center; gap:8px;">🏡 Sewa Villa & Glamping</a>
            <a href="/cari-paket/" style="color:var(--color-accent); display:flex; align-items:center; gap:8px;">✨ Smart Package Finder (Kuis)</a>
            <a href="/proposal/" style="display:flex; align-items:center; gap:8px;">📄 Buat Surat Penawaran / Proposal PDF</a>
            <a href="/galeri/" style="display:flex; align-items:center; gap:8px;">📸 Galeri Dokumentasi Asli</a>
            <a href="/artikel/" style="display:flex; align-items:center; gap:8px;">📖 Artikel & Tips Wisata</a>
            <a href="/kontak/" style="display:flex; align-items:center; gap:8px;">📍 Alamat & Kontak Meeting Point</a>
            <div style="margin-top:10px;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="width:100%; justify-content:center;">
                    📲 Hubungi Admin via WhatsApp
                </a>
            </div>
        </div>
    </div>
</header>
