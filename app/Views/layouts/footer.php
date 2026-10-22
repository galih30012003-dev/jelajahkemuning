<footer style="background: linear-gradient(145deg, #071E12 0%, #0B3B24 100%); color:#E5E7EB; padding:64px 0 32px; margin-top:80px; border-top:1px solid rgba(255,255,255,0.1);">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:40px;">
        <div>
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
                <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo Jelajah Kemuning" style="height:44px; width:auto; border-radius:8px; background:#fff; padding:3px;" onerror="this.style.display='none'">
                <span style="font-size:1.35rem; font-weight:900; color:#fff; letter-spacing:-0.02em;">JELAJAH KEMUNING</span>
            </div>
            <p style="font-size:13.5px; opacity:0.85; line-height:1.7; margin-bottom:18px;">
                Penyedia paket wisata resmi Karanganyar: Jeep Adventure, River Tubing, Gathering/Outbound, dan Sewa Villa. Dikelola CV resmi berizin berusaha (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>).
            </p>
            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                <span class="badge-glass">✓ Resmi NIB Pemerintah</span>
                <span class="badge-glass">✓ Asuransi Terjamin</span>
            </div>
        </div>

        <div>
            <h4 style="color:#fff; font-size:15px; font-weight:800; letter-spacing:0.5px; text-transform:uppercase; margin-bottom:16px;">Paket Wisata Populer</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:10px; opacity:0.9;">
                <li><a href="/jeep-adventure-kemuning/" style="color:#D1D5DB;">🚙 Jeep Adventure Kemuning (Short - Long)</a></li>
                <li><a href="/paket-outbound-kemuning/" style="color:#D1D5DB;">🎯 Paket Outbound Gathering & Fun Games</a></li>
                <li><a href="/river-tubing-kemuning/" style="color:#D1D5DB;">🌊 River Tubing Kali Senatah</a></li>
                <li><a href="/paket-hemat-jeep-kemuning/" style="color:#D1D5DB;">🍱 Paket Hemat Jeep Per Orang (Inc. Makan)</a></li>
                <li><a href="/villa-glamping-kemuning/" style="color:#D1D5DB;">🏡 Sewa Villa & Glamping Kemuning 2D1N</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:15px; font-weight:800; letter-spacing:0.5px; text-transform:uppercase; margin-bottom:16px;">Navigasi & Fitur</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:10px; opacity:0.9;">
                <li><a href="/cari-paket/" style="color:#FDE68A; font-weight:700;">✨ Smart Package Finder (Kuis)</a></li>
                <li><a href="/proposal/" style="color:#D1D5DB;">📄 Generator Proposal Penawaran PDF</a></li>
                <li><a href="/galeri/" style="color:#D1D5DB;">📸 Galeri Dokumentasi Asli Trip</a></li>
                <li><a href="/artikel/" style="color:#D1D5DB;">📖 Artikel & Tips Wisata Kemuning</a></li>
                <li><a href="/kontak/" style="color:#D1D5DB;">📍 Kontak & Lokasi Meeting Point</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:15px; font-weight:800; letter-spacing:0.5px; text-transform:uppercase; margin-bottom:16px;">Alamat & Reservasi</h4>
            <p style="font-size:13.5px; opacity:0.85; line-height:1.6; margin-bottom:12px;">
                📍 <strong>Terminal Wisata Kemuning</strong><br>
                Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <p style="font-size:13.5px; margin-bottom:16px;">
                WhatsApp: <strong style="color:#4ADE80; font-family:var(--font-mono); font-size:14px;"><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566') ?></strong>
            </p>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="font-size:13px; padding:8px 18px;">
                📲 Chat WhatsApp Sekarang
            </a>
        </div>
    </div>

    <div class="container" style="margin-top:48px; padding-top:24px; border-top:1px solid rgba(255,255,255,0.12); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; font-size:12.5px; opacity:0.75;">
        <div>
            &copy; <?= date('Y') ?> CV Jelajah Kemuning. All rights reserved.
        </div>
        <div style="display:flex; gap:16px;">
            <span>NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            <span>•</span>
            <a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a>
            <span>•</span>
            <a href="https://tiktok.com" target="_blank" rel="noopener">TikTok</a>
        </div>
    </div>
</footer>

<!-- Lightbox Modal -->
<div id="lightbox-modal">
    <button class="lightbox-close" aria-label="Tutup">&times;</button>
    <img id="lightbox-img" src="" alt="Dokumentasi Fullsize">
</div>

<?php require __DIR__ . '/floating-cta.php'; ?>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/tracker.js"></script>
</body>
</html>
