<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-brand">
                    <img src="/assets/uploads/cropped-logo-jelajah-kemuningg.png" alt="Logo Jelajah Kemuning" onerror="this.style.display='none'">
                    <span>
                        <span class="footer-brand-name">Jelajah Kemuning</span>
                        <span class="footer-brand-sub">Official tour &amp; outbound</span>
                    </span>
                </div>
                <p class="footer-blurb">
                    Operator wisata di Kemuning, Karanganyar: Jeep Adventure 4×4, river tubing, gathering outbound, dan sewa villa. Dikelola CV Jelajah Kemuning dengan izin usaha resmi.
                </p>
                <span class="footer-nib">NIB <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            </div>

            <div class="footer-col">
                <h4>Paket wisata</h4>
                <ul>
                    <li><a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a></li>
                    <li><a href="/paket-outbound-kemuning/">Outbound &amp; gathering</a></li>
                    <li><a href="/river-tubing-kemuning/">River tubing</a></li>
                    <li><a href="/paket-hemat-jeep-kemuning/">Paket hemat jeep</a></li>
                    <li><a href="/villa-glamping-kemuning/">Villa &amp; glamping 2D1N</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="/cari-paket/" class="accent-link">Kuis rekomendasi paket</a></li>
                    <li><a href="/proposal/">Cetak proposal kantor (PDF)</a></li>
                    <li><a href="/galeri/">Galeri dokumentasi</a></li>
                    <li><a href="/artikel/">Artikel &amp; tips wisata</a></li>
                    <li><a href="/kontak/">Kontak &amp; meeting point</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Reservasi</h4>
                <p class="footer-address">
                    Terminal Wisata Kemuning, Kec. Ngargoyoso,<br>
                    Kabupaten Karanganyar, Jawa Tengah 57793
                </p>
                <a href="<?= Helpers::generateWaLink() ?>" class="footer-wa">0851-7100-1566</a>
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%;">Hubungi admin</a>
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; <?= date('Y') ?> CV Jelajah Kemuning</div>
            <div class="footer-bottom-links">
                <a href="/sitemap.xml">Sitemap</a>
                <a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a>
                <a href="https://tiktok.com" target="_blank" rel="noopener">TikTok</a>
            </div>
        </div>
    </div>
</footer>

<!-- Lightbox -->
<div id="lightbox-modal">
    <button class="lightbox-close" aria-label="Tutup">Tutup</button>
    <img id="lightbox-img" src="" alt="Dokumentasi fullsize">
</div>

<?php require __DIR__ . '/floating-cta.php'; ?>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/tracker.js"></script>
</body>
</html>
