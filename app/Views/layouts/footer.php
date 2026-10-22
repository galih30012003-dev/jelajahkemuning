<footer style="background: #111827; color:#9CA3AF; padding:56px 0 28px; border-top:1px solid #1F2937;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:36px;">
        <div>
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo Jelajah Kemuning" style="height:38px; width:auto; border-radius:4px; background:#fff; padding:2px;" onerror="this.style.display='none'">
                <span style="font-size:1.2rem; font-weight:800; color:#fff;">JELAJAH KEMUNING</span>
            </div>
            <p style="font-size:13.5px; line-height:1.6; margin-bottom:16px;">
                Penyedia paket wisata resmi Karanganyar: Jeep Adventure, River Tubing, Gathering Outbound, dan Sewa Villa. Dikelola CV resmi berizin berusaha (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>).
            </p>
            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                <span class="badge-trust" style="background:#1F2937; color:#10B981; border-color:#374151;">Resmi NIB Pemerintah</span>
                <span class="badge-trust" style="background:#1F2937; color:#10B981; border-color:#374151;">Tersedia Asuransi</span>
            </div>
        </div>

        <div>
            <h4 style="color:#fff; font-size:14px; font-weight:700; text-transform:uppercase; margin-bottom:14px;">Paket Wisata</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:8px;">
                <li><a href="/jeep-adventure-kemuning/" style="color:#D1D5DB;">Jeep Adventure Kemuning</a></li>
                <li><a href="/paket-outbound-kemuning/" style="color:#D1D5DB;">Paket Outbound Gathering</a></li>
                <li><a href="/river-tubing-kemuning/" style="color:#D1D5DB;">River Tubing Kali Senatah</a></li>
                <li><a href="/paket-hemat-jeep-kemuning/" style="color:#D1D5DB;">Paket Hemat Jeep (Include Makan)</a></li>
                <li><a href="/villa-glamping-kemuning/" style="color:#D1D5DB;">Sewa Villa & Glamping Kemuning</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:14px; font-weight:700; text-transform:uppercase; margin-bottom:14px;">Menu & Layanan</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:8px;">
                <li><a href="/cari-paket/" style="color:#D1D5DB;">Kuis Rekomendasi Paket</a></li>
                <li><a href="/proposal/" style="color:#D1D5DB;">Proposal Penawaran PDF</a></li>
                <li><a href="/galeri/" style="color:#D1D5DB;">Galeri Dokumentasi Trip</a></li>
                <li><a href="/artikel/" style="color:#D1D5DB;">Artikel & Tips Wisata</a></li>
                <li><a href="/kontak/" style="color:#D1D5DB;">Kontak & Lokasi Meeting Point</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:14px; font-weight:700; text-transform:uppercase; margin-bottom:14px;">Kontak & Alamat</h4>
            <p style="font-size:13.5px; line-height:1.6; margin-bottom:10px;">
                Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <p style="font-size:13.5px; margin-bottom:14px;">
                WhatsApp: <strong style="color:#10B981;"><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566') ?></strong>
            </p>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa" style="font-size:13px; padding:8px 16px;">
                Chat WhatsApp Admin
            </a>
        </div>
    </div>

    <div class="container" style="margin-top:40px; padding-top:20px; border-top:1px solid #1F2937; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; font-size:12px;">
        <div>
            &copy; <?= date('Y') ?> CV Jelajah Kemuning. All rights reserved.
        </div>
        <div style="display:flex; gap:14px;">
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
