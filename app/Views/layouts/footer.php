<footer style="background: var(--bg-forest); color: rgba(255,255,255,0.78); padding: 64px 0 32px; border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:40px;">
        <div>
            <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo Jelajah Kemuning" style="height:42px; width:42px; border-radius:8px; background:#fff; padding:2px;" onerror="this.style.display='none'">
                <div>
                    <div style="font-size:1.15rem; font-weight:800; color:#fff; line-height:1.15;">JELAJAH KEMUNING</div>
                    <div style="font-size:11px; color:#86EFAC; font-weight:600; letter-spacing:0.04em;">CV RESMI • KARANGANYAR</div>
                </div>
            </div>
            <p style="font-size:13.5px; line-height:1.65; margin-bottom:18px;">
                Penyedia paket wisata resmi di Kemuning Karanganyar: Jeep Adventure 4x4, River Tubing, Gathering Outbound, dan Sewa Villa. Dikelola CV Jelajah Kemuning berizin resmi pemerintah.
            </p>
            <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.14); padding:6px 12px; border-radius:6px; font-size:12px; color:#fff; font-family:var(--font-mono);">
                <span>NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            </div>
        </div>

        <div>
            <h4 style="color:#fff; font-size:13px; font-weight:800; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:16px;">Layanan Paket Wisata</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:10px;">
                <li><a href="/jeep-adventure-kemuning/" style="color:rgba(255,255,255,0.8);">Jeep Adventure Kemuning</a></li>
                <li><a href="/paket-outbound-kemuning/" style="color:rgba(255,255,255,0.8);">Paket Outbound & Gathering</a></li>
                <li><a href="/river-tubing-kemuning/" style="color:rgba(255,255,255,0.8);">River Tubing Kali Senatah</a></li>
                <li><a href="/paket-hemat-jeep-kemuning/" style="color:rgba(255,255,255,0.8);">Paket Hemat Jeep + Makan</a></li>
                <li><a href="/villa-glamping-kemuning/" style="color:rgba(255,255,255,0.8);">Sewa Villa & Glamping 2D1N</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:13px; font-weight:800; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:16px;">Fitur & Informasi</h4>
            <ul style="list-style:none; font-size:13.5px; display:flex; flex-direction:column; gap:10px;">
                <li><a href="/cari-paket/" style="color:#FDBA74; font-weight:700;">Kuis Rekomendasi Paket</a></li>
                <li><a href="/proposal/" style="color:rgba(255,255,255,0.8);">Cetak Proposal Kantor (PDF)</a></li>
                <li><a href="/galeri/" style="color:rgba(255,255,255,0.8);">Galeri Dokumentasi Lapangan</a></li>
                <li><a href="/artikel/" style="color:rgba(255,255,255,0.8);">Artikel & Tips Wisata Kemuning</a></li>
                <li><a href="/kontak/" style="color:rgba(255,255,255,0.8);">Kontak & Lokasi Meeting Point</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff; font-size:13px; font-weight:800; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:16px;">Meeting Point & Reservasi</h4>
            <p style="font-size:13.5px; line-height:1.65; margin-bottom:12px;">
                Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793
            </p>
            <p style="font-size:13.5px; margin-bottom:16px;">
                WhatsApp Resmi: <strong style="color:#86EFAC; font-family:var(--font-mono);">0851-7100-1566</strong>
            </p>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%; padding:11px 16px; font-size:13.5px;">
                <span>Hubungi Admin via WhatsApp</span>
            </a>
        </div>
    </div>

    <div class="container" style="margin-top:48px; padding-top:24px; border-top:1px solid rgba(255,255,255,0.1); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; font-size:12.5px; color:rgba(255,255,255,0.6);">
        <div>
            &copy; <?= date('Y') ?> CV Jelajah Kemuning. Seluruh hak cipta dilindungi.
        </div>
        <div style="display:flex; gap:16px;">
            <a href="/sitemap.xml" style="color:rgba(255,255,255,0.6);">Sitemap XML</a>
            <span>•</span>
            <a href="https://instagram.com" target="_blank" rel="noopener" style="color:rgba(255,255,255,0.6);">Instagram</a>
            <span>•</span>
            <a href="https://tiktok.com" target="_blank" rel="noopener" style="color:rgba(255,255,255,0.6);">TikTok</a>
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
