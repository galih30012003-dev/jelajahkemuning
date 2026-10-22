<?php
$siteTitle = $pageTitle ?? 'Paket Wisata Kemuning - Jeep, Outbound & River Tubing Karanganyar';
$siteDesc = $pageDesc ?? 'Penyedia paket wisata resmi CV Jelajah Kemuning. Melayani Jeep Offroad, River Tubing, Outbound Kantor, dan Sewa Villa Glamping berizin resmi & berasuransi.';
$rawGtmId = Helpers::getSetting('gtm_id');
$gtmId = preg_replace('/[^A-Za-z0-9-]/', '', $rawGtmId);
$waPhone = Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566');
$nibNum = Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458');
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

<!-- Top Credibility & Legal Bar -->
<div class="topbar">
    <div class="container topbar-inner">
        <div class="topbar-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#86EFAC" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Dikelola Resmi <strong>CV Jelajah Kemuning</strong></span>
            <span class="topbar-badge">NIB: <?= Helpers::sanitize($nibNum) ?></span>
        </div>
        <div style="display:flex; gap:18px; align-items:center;">
            <span class="topbar-item">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Terminal Wisata Kemuning, Karanganyar
            </span>
            <a href="<?= Helpers::generateWaLink() ?>" class="topbar-item" style="color:#86EFAC; font-weight:700;">
                WhatsApp: 0851-7100-1566
            </a>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="header-nav">
    <div class="container header-container">
        <a href="/" class="brand-logo">
            <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo CV Jelajah Kemuning" onerror="this.style.display='none'">
            <div class="brand-text-wrap">
                <span class="brand-name">JELAJAH KEMUNING</span>
                <span class="brand-sub">Official Tour & Outbound</span>
            </div>
        </a>

        <nav class="nav-links">
            <a href="/" class="nav-item">Beranda</a>

            <div class="nav-dropdown">
                <a href="#katalog-paket" class="nav-item">
                    <span>Paket Wisata</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m6 9 6 6 6-6"/></svg>
                </a>
                <div class="nav-dropdown-menu">
                    <a href="/jeep-adventure-kemuning/" class="dropdown-link">
                        <div>
                            <span class="dropdown-link-title">Jeep Adventure 4x4</span>
                            <span class="dropdown-link-sub">Offroad Kebun Teh & Sungai</span>
                        </div>
                        <span class="dropdown-link-price">350rb/Jeep</span>
                    </a>
                    <a href="/paket-outbound-kemuning/" class="dropdown-link">
                        <div>
                            <span class="dropdown-link-title">Outbound & Gathering</span>
                            <span class="dropdown-link-sub">Fun Games, Makan & Aula</span>
                        </div>
                        <span class="dropdown-link-price">90rb/Org</span>
                    </a>
                    <a href="/river-tubing-kemuning/" class="dropdown-link">
                        <div>
                            <span class="dropdown-link-title">River Tubing Kemuning</span>
                            <span class="dropdown-link-sub">Kali Guci, Senatah & Pring Kuning</span>
                        </div>
                        <span class="dropdown-link-price">45rb/Org</span>
                    </a>
                    <a href="/paket-hemat-jeep-kemuning/" class="dropdown-link">
                        <div>
                            <span class="dropdown-link-title">Paket Hemat Jeep</span>
                            <span class="dropdown-link-sub">Hitungan Per Orang + Makan</span>
                        </div>
                        <span class="dropdown-link-price">165rb/Org</span>
                    </a>
                    <a href="/villa-glamping-kemuning/" class="dropdown-link">
                        <div>
                            <span class="dropdown-link-title">Villa & Glamping 2D1N</span>
                            <span class="dropdown-link-sub">Menginap di Lereng Lawu</span>
                        </div>
                        <span class="dropdown-link-price">350rb/Org</span>
                    </a>
                </div>
            </div>

            <a href="/cari-paket/" class="nav-item">Rekomendasi Paket</a>
            <a href="/proposal/" class="nav-item">Proposal Kantor</a>
            <a href="/galeri/" class="nav-item">Galeri Trip</a>
            <a href="/artikel/" class="nav-item">Artikel</a>
            <a href="/kontak/" class="nav-item">Kontak</a>
        </nav>

        <div class="header-actions">
            <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="padding:10px 18px; font-size:13.5px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>Konsultasi WA</span>
            </a>
        </div>

        <button id="mobile-menu-btn" style="background:none; border:1px solid var(--border); border-radius:8px; width:42px; height:42px; display:flex; align-items:center; justify-content:center; color:var(--text-main); cursor:pointer;" aria-label="Menu">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
    </div>

    <!-- Mobile Drawer Nav -->
    <div id="mobile-nav" class="hidden" style="background:#fff; border-top:1px solid var(--border); padding:20px;">
        <div style="display:flex; flex-direction:column; gap:12px; font-size:14.5px; font-weight:600;">
            <a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning (Mulai Rp 300rb)</a>
            <a href="/paket-outbound-kemuning/">Paket Outbound Gathering (Mulai Rp 80rb)</a>
            <a href="/river-tubing-kemuning/">River Tubing Kali Senatah (Mulai Rp 50rb)</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat Jeep + Makan (Mulai Rp 150rb)</a>
            <a href="/villa-glamping-kemuning/">Sewa Villa & Glamping 2D1N (Mulai Rp 350rb)</a>
            <hr style="border:none; border-top:1px solid var(--border);">
            <a href="/cari-paket/">Kuis Pilih Paket Rombongan</a>
            <a href="/proposal/">Unduh Proposal Penawaran PDF</a>
            <a href="/galeri/">Galeri Dokumentasi Trip</a>
            <a href="/artikel/">Artikel & Panduan Wisata</a>
            <a href="/kontak/">Kontak & Meeting Point</a>
            <div style="margin-top:8px;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%;">
                    Chat WhatsApp Admin (0851-7100-1566)
                </a>
            </div>
        </div>
    </div>
</header>
