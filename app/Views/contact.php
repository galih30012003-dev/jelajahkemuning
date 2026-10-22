<section class="page-head">
    <div class="container">
        <div class="page-head-inner">
            <div class="section-eyebrow">Lokasi &amp; reservasi resmi</div>
            <h1>Hubungi CV<br>Jelajah Kemuning.</h1>
            <p class="lede">
                Meeting point kami berada di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar — dengan parkir bus luas, toilet bersih, dan aula transit.
            </p>
            <div class="page-head-actions">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Chat WhatsApp</span>
                </a>
                <a href="/proposal/" class="btn btn-outline">Proposal kantor</a>
            </div>
            <div class="page-meta">
                <span>WA <strong>0851-7100-1566</strong></span>
                <span>NIB <strong><?= Helpers::sanitize(Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458')) ?></strong></span>
                <span>Ngargoyoso · Karanganyar</span>
            </div>
        </div>
    </div>
</section>

<div class="page-body">
    <div class="container">
        <div class="info-grid">
            <div class="info-panel">
                <div class="overline" style="color:var(--ink-faint); margin-bottom:10px;">Meeting point utama</div>
                <h2>Kantor &amp; area transit</h2>
                <p>
                    <strong>CV Jelajah Kemuning</strong><br>
                    Terminal Wisata Kemuning, Kec. Ngargoyoso,<br>
                    Kabupaten Karanganyar, Jawa Tengah 57793
                </p>
                <ul class="info-list">
                    <li><span>Parkir</span><span>Bus &amp; kendaraan pribadi</span></li>
                    <li><span>Aula</span><span>Ruang transit rombongan</span></li>
                    <li><span>Toilet</span><span>Bersih &amp; terawat</span></li>
                    <li><span>Jam layanan</span><span>Setiap hari, 05.00–18.00</span></li>
                </ul>
                <div class="info-actions">
                    <span class="badge-trust">NIB <?= Helpers::sanitize(Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458')) ?></span>
                </div>
            </div>

            <div class="info-panel">
                <div class="overline" style="color:var(--ink-faint); margin-bottom:10px;">Layanan pelanggan</div>
                <h2>Kontak reservasi cepat</h2>
                <p>
                    WhatsApp <span class="info-value">0851-7100-1566</span><br>
                    Email <span class="info-value"><?= Helpers::sanitize(Helpers::getSetting('email', 'info@jelajahkemuning.com')) ?></span>
                </p>
                <p>
                    Admin menjawab pertanyaan ketersediaan tanggal, kustom rute, hingga pengajuan proposal kantor. Sebutkan jumlah peserta dan rencana tanggal supaya lebih cepat.
                </p>
                <ul class="info-list">
                    <li><span>Reservasi</span><span>Min. H-3 sebelum trip</span></li>
                    <li><span>Pembayaran</span><span>Transfer / tunai di lokasi</span></li>
                    <li><span>Asuransi</span><span>Sudah termasuk semua paket</span></li>
                </ul>
                <div class="info-actions">
                    <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="width:100%;">
                        <span>Chat WhatsApp admin</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="page-cta">
            <div>
                <div class="section-eyebrow" style="margin-bottom:12px;">Belum yakin pilih paket?</div>
                <h2 class="section-title" style="font-size:clamp(1.4rem,2.4vw,1.9rem); margin-bottom:0;">Coba kuis rekomendasi paket.</h2>
            </div>
            <div class="page-cta-actions">
                <a href="/cari-paket/" class="btn btn-primary">Buka kuis paket</a>
                <a href="/galeri/" class="btn btn-outline">Lihat galeri trip</a>
            </div>
        </div>
    </div>
</div>
