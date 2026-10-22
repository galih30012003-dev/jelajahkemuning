<section class="hero-clean">
    <div class="container" style="text-align:center; max-width:700px;">
        <span class="badge-trust" style="margin-bottom:10px;">LOKASI & KONTAK</span>
        <h1 class="hero-h1" style="margin-bottom:10px;">
            Hubungi CV Jelajah Kemuning
        </h1>
        <p class="hero-p" style="margin-bottom:0;">
            Meeting point kami berada di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar dengan fasilitas parkir bus luas dan aula transit.
        </p>
    </div>
</section>

<div class="container" style="max-width:850px; padding:48px 16px;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px; margin-bottom:32px;">
        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:24px;">
            <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:10px;">Kantor & Meeting Point</h3>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.6; margin-bottom:12px;">
                <strong>CV Jelajah Kemuning</strong><br>
                Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <span class="badge-trust">NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
        </div>

        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:24px;">
            <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:10px;">Kontak Reservasi</h3>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                WhatsApp: <strong style="color:var(--primary);"><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566') ?></strong><br>
                Email: <?= Helpers::getSetting('email', 'info@jelajahkemuning.com') ?>
            </p>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa" style="width:100%; justify-content:center;">
                Chat WhatsApp Admin
            </a>
        </div>
    </div>
</div>
