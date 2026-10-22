<div class="container" style="max-width:800px; padding:60px 16px;">
    <h1 style="font-size:2rem; font-weight:800; text-align:center; margin-bottom:8px;">Kontak & Lokasi Meeting Point</h1>
    <p style="text-align:center; color:var(--text-muted); margin-bottom:40px;">Konsultasikan kebutuhan paket wisata Jeep Adventure, River Tubing, dan Outbound Gathering bersama tim kami.</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px; margin-bottom:40px;">
        <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:24px;">
            <h3 style="font-size:16px; font-weight:700; color:var(--primary); margin-bottom:12px;">Kantor & Meeting Point</h3>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.6;">
                <strong>CV Jelajah Kemuning</strong><br>
                Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <div style="margin-top:16px;">
                <span class="badge-trust">NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            </div>
        </div>
        <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:24px;">
            <h3 style="font-size:16px; font-weight:700; color:var(--primary); margin-bottom:12px;">Kontak Cepat Reservasi</h3>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.6;">
                WhatsApp: <strong><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '081234567890') ?></strong><br>
                Email: info@jelajahkemuning.com
            </p>
            <div style="margin-top:16px;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="width:100%; justify-content:center;">
                    📲 Chat WhatsApp Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
