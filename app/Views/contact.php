<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:740px;">
        <div class="hero-eyebrow">
            <span>Lokasi & Reservasi Resmi</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            Hubungi CV Jelajah Kemuning
        </h1>
        <p class="hero-lead" style="margin:0 auto;">
            Meeting point kami berada di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar dengan fasilitas parkir bus luas dan aula transit.
        </p>
    </div>
</section>

<div class="container" style="max-width:860px; padding:56px 24px;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:28px; box-shadow:var(--shadow-sm);">
            <span class="section-eyebrow">Meeting Point Utama</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--text-main); margin-bottom:10px;">Kantor & Area Transit</h3>
            <p style="font-size:14.5px; color:var(--text-body); line-height:1.65; margin-bottom:16px;">
                <strong>CV Jelajah Kemuning</strong><br>
                Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <span class="badge-trust">NIB Resmi: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
        </div>

        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:28px; box-shadow:var(--shadow-sm);">
            <span class="section-eyebrow">Layanan Pelanggan</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--text-main); margin-bottom:10px;">Kontak Reservasi Cepat</h3>
            <p style="font-size:14.5px; color:var(--text-body); line-height:1.65; margin-bottom:20px;">
                WhatsApp: <strong style="color:var(--primary); font-family:var(--font-mono);">0851-7100-1566</strong><br>
                Email: <?= Helpers::getSetting('email', 'info@jelajahkemuning.com') ?>
            </p>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%;">
                <span>Chat WhatsApp Admin Sekarang</span>
            </a>
        </div>
    </div>
</div>
