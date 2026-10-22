<!-- Hero Section -->
<section class="hero-clean">
    <div class="container hero-grid">
        <div>
            <div style="display:flex; gap:8px; flex-wrap:wrap; margin-bottom:14px;">
                <span class="badge-trust">Resmi CV Jelajah Kemuning</span>
                <span class="badge-trust">NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
                <span class="badge-trust">Tersedia Asuransi</span>
            </div>

            <h1 class="hero-h1">
                Paket Wisata Kemuning — Jeep, Outbound & River Tubing
            </h1>

            <p class="hero-p">
                Cari paket wisata Kemuning yang aman dan terpercaya? JelajahKemuning.com menyediakan Jeep Kemuning, River Tubing, Outbound Gathering, dan Sewa Villa di Karanganyar dengan admin fast response. Dikelola CV resmi berizin, didukung operator lokal berpengalaman, dan bonus gratis dokumentasi.
            </p>

            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa">
                    Chat WhatsApp Admin
                </a>
                <a href="/cari-paket/" class="btn-primary">
                    Kuis Pilih Paket
                </a>
                <a href="/proposal/" class="btn-outline">
                    Unduh Proposal PDF
                </a>
            </div>
        </div>

        <div class="hero-photo-box">
            <img src="/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp" alt="Wisata Jeep Adventure Kemuning">
        </div>
    </div>
</section>

<!-- 3 Paket Terlaris Wisata Kemuning -->
<section style="padding:56px 0; background:#FFFFFF; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="max-width:760px; margin-bottom:32px;">
            <span class="badge-trust" style="margin-bottom:8px;">PILIHAN TERLARIS</span>
            <h2 class="section-title">3 Paket Terlaris Wisata Kemuning Karanganyar</h2>
            <p class="section-desc">
                Pilihan paket paling sering dibooking untuk rombongan kantor, dinas, komunitas, dan keluarga. Sudah termasuk makan siang prasmanan.
            </p>
        </div>

        <div class="packages-grid">
            <!-- Paket Seru 3 -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-3.webp" alt="Paket Seru 3 Kemuning">
                        <span class="card-thumb-badge" style="background:#155E3B;">FAVORIT</span>
                        <span class="card-thumb-duration">1 Hari</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Seru 3</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 130.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 16 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Aktivitas:</strong>
                                Outbound Fun Games & Team Building + River Tubing Kali Senatah + Makan Siang Prasmanan
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack</li>
                                <li><span class="check">✓</span> Outbound & Fun Game</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan</li>
                                <li><span class="check">✓</span> River Tubing Kali Senatah</li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Tubing</li>
                                <li><span class="check">✓</span> Aula & Trainer Profesional</li>
                                <li><span class="check">✓</span> Sound System & Air Mineral</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Seru 3 (Rp 130.000/orang)', 'Minimal 16 peserta') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket Combo 185K -->
            <div class="card-package" style="border: 2px solid var(--accent);">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/paket-combo-seru-4.webp" alt="Paket Combo Terlaris">
                        <span class="card-thumb-badge" style="background:var(--accent);">TERLARIS</span>
                        <span class="card-thumb-duration">1 Hari Penuh</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Combo (Jeep + Outbound + Tubing)</h3>
                            <div class="card-price-row">
                                <span class="card-price" style="color:var(--accent);">Rp 185.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 16 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Aktivitas:</strong>
                                Outbound Fun Games + Jeep Adventure Short + River Tubing + Makan Siang Prasmanan
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan</li>
                                <li><span class="check">✓</span> Outbound & Fun Game</li>
                                <li><span class="check">✓</span> <strong>Jeep Adventure (Short Offroad)</strong></li>
                                <li><span class="check">✓</span> <strong>River Tubing Kali Senatah</strong></li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Tubing</li>
                                <li><span class="check">✓</span> Aula & Sound System</li>
                                <li><span class="check">✓</span> Trainer Profesional & Driver</li>
                                <li><span class="check">✓</span> Air Mineral</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Combo Terlaris (Rp 185.000/orang)', 'Jeep + Outbound + Tubing') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket Super Combo 210K -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-5.webp" alt="Super Combo Kemuning">
                        <span class="card-thumb-badge" style="background:#2563EB;">BEST VALUE</span>
                        <span class="card-thumb-duration">1 Hari Penuh</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Super Combo (Jeep Medium + Outbound + Tubing)</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 210.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 16 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Aktivitas:</strong>
                                Outbound Fun Games + Jeep Adventure Medium (Skyhills & Paralayang) + Tubing + Makan Siang
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan</li>
                                <li><span class="check">✓</span> Outbound & Fun Game</li>
                                <li><span class="check">✓</span> <strong>Jeep Adventure (Medium Trip)</strong></li>
                                <li><span class="check">✓</span> <strong>River Tubing Kali Senatah</strong></li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Tubing</li>
                                <li><span class="check">✓</span> Aula & Sound System</li>
                                <li><span class="check">✓</span> Trainer Profesional</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Super Combo Jeep Medium (Rp 210.000/orang)', 'Minimal 16 peserta') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filterable Catalog -->
<section style="padding:56px 0; background:#F9FAF9; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="max-width:760px; margin-bottom:24px;">
            <h2 class="section-title">Paket Unggulan Jelajah Kemuning</h2>
            <p class="section-desc">Pilih kategori wisata untuk melihat daftar paket dan rincian fasilitas.</p>
        </div>

        <div class="category-tabs">
            <button class="cat-btn active" data-target="all">Semua Paket</button>
            <button class="cat-btn" data-target="jeep">Jeep Adventure</button>
            <button class="cat-btn" data-target="outbound">Outbound Gathering</button>
            <button class="cat-btn" data-target="tubing">River Tubing</button>
            <button class="cat-btn" data-target="hemat">Paket Hemat Jeep</button>
            <button class="cat-btn" data-target="villa">Villa & Glamping</button>
        </div>

        <div class="packages-grid">
            <!-- Jeep Special 1 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Special 1">
                        <span class="card-thumb-badge">TERLARIS</span>
                        <span class="card-thumb-duration">1.5 Jam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Jeep Special 1</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 450.000</span>
                                <span class="card-price-unit">/ Armada (Maks 4 Orang)</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rute Offroad:</strong>
                                Start Transit – Offroad Gunung Cilik – Kelok 0 – Susur Sungai & Lumpur – Kebun Teh Jimber – Hutan Karet – Finish
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Armada Jeep 4x4 Terawat</li>
                                <li><span class="check">✓</span> Driver Lokal Berpengalaman</li>
                                <li><span class="check">✓</span> BBM & Parkir</li>
                                <li><span class="check">✓</span> Asuransi Resmi & Free Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Jeep Special 1 (Rp 450.000/armada)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Jeep Special 2 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Special 2">
                        <span class="card-thumb-badge">FAVORIT</span>
                        <span class="card-thumb-duration">2.5 Jam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Jeep Special 2</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 470.000</span>
                                <span class="card-price-unit">/ Armada (Maks 4 Orang)</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rute Offroad:</strong>
                                Start Transit – Jembatan Kaca Skyhills – Landing Paralayang – Susur Sungai & Lumpur – Kebun Teh Jimber – Finish
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Armada Jeep 4x4 (Maks 4 Orang)</li>
                                <li><span class="check">✓</span> Spot Jembatan Kaca & Paralayang</li>
                                <li><span class="check">✓</span> Driver Lokal & BBM</li>
                                <li><span class="check">✓</span> Asuransi Resmi & Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Jeep Special 2 (Rp 470.000/armada)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- River Tubing Kali Senatah -->
            <div class="card-package" data-category="tubing">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah">
                        <span class="card-thumb-badge" style="background:#059669;">AIR SEGAR</span>
                        <span class="card-thumb-duration">1 Jam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">River Tubing Kali Senatah</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 80.000</span>
                                <span class="card-price-unit">/ Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Perlengkapan:</strong>
                                Ban Tubing, Helm Standar SNI, Pelampung, Sepatu Karet, Shuttle Penjemputan, & Rescue Team
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Track Panjang (-+ 1.5 KM)</li>
                                <li><span class="check">✓</span> Perlengkapan Safety Lengkap</li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Tubing</li>
                                <li><span class="check">✓</span> Kamar Mandi Bilas & Asuransi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('River Tubing Kali Senatah (Rp 80.000/orang)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Outbound Basic Fun Games -->
            <div class="card-package" data-category="outbound">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/fun-games-05.webp" alt="Outbound Fun Games">
                        <span class="card-thumb-badge" style="background:#D97706;">HEMAT</span>
                        <span class="card-thumb-duration">Half Day</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Outbound Basic Fun Games</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 80.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 16 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rundown:</strong>
                                Welcome Drink → Ice Breaking & Fun Games → Makan Siang Prasmanan Khas Kemuning
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Trainer Profesional & Sound System</li>
                                <li><span class="check">✓</span> Aula Transit & Gratis Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Outbound Basic (Rp 80.000/orang)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket Hemat Jeep 150K -->
            <div class="card-package" data-category="hemat">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-hemat-jeep-adventure-kemuning.webp" alt="Paket Hemat Jeep">
                        <span class="card-thumb-badge">ALL-IN MAKAN</span>
                        <span class="card-thumb-duration">Half Day</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Hemat Jeep Short</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 150.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 16 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Praktis untuk Rombongan:</strong>
                                Dihitung per orang, trip jeep keliling kebun teh + makan siang prasmanan dan aula transit.
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Jeep Adventure Short (Maks 4 Org)</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Aula Transit, Asuransi & Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep Short (Rp 150.000/orang)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Villa & Glamping 2D1N -->
            <div class="card-package" data-category="villa">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Villa & Glamping">
                        <span class="card-thumb-badge" style="background:#7C3AED;">MENGINAP</span>
                        <span class="card-thumb-duration">2D1N</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Menginap Villa 2D1N</h3>
                            <div class="card-price-row">
                                <span class="card-price">Rp 350.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div class="card-min-pax">NB : MINIMAL 10 PESERTA</div>
                            </div>
                            <div class="itinerary-box">
                                <strong>Fasilitas Menginap:</strong>
                                Villa asri kebun teh, makan 3x prasmanan, api unggun malam hari, teh Kemuning hangat sepuasnya.
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Menginap 1 Malam di Villa Private</li>
                                <li><span class="check">✓</span> Makan 3x Prasmanan + Snack</li>
                                <li><span class="check">✓</span> Water Heater, WiFi & Fasilitas BBQ</li>
                                <li><span class="check">✓</span> Bisa Ditambah Trip Jeep & Tubing</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Menginap Villa 2D1N (Rp 350.000/orang)') ?>" class="btn-wa" style="width:100%; justify-content:center;">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Dokumentasi Asli -->
<section style="padding:56px 0; background:#FFFFFF; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px; flex-wrap:wrap; gap:16px;">
            <div>
                <h2 class="section-title">Galeri Dokumentasi Trip Jelajah Kemuning</h2>
                <p class="section-desc" style="margin-bottom:0;">Foto asli rombongan dari berbagai trip yang kami dampingi di Kemuning Karanganyar.</p>
            </div>
            <a href="/galeri/" class="btn-outline">
                Lihat Semua Galeri →
            </a>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Kelok 0 Kemuning">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Hutan Karet">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp" alt="Jeep Paralayang Kemuning">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Outbound Gathering Kemuning">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp" alt="River Tubing Kali Senatah">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_3.webp" alt="River Tubing Kemuning">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp" alt="Kebun Teh Jimber">
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp" alt="Team Building Kemuning">
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan Jelajah Kemuning -->
<section style="padding:56px 0; background:#F9FAF9; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="max-width:760px; margin-bottom:32px;">
            <h2 class="section-title">Keunggulan Jelajah Kemuning</h2>
            <p class="section-desc">Alasan kenapa banyak rombongan mempercayakan kegiatan wisatanya kepada kami.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
            <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px;">
                <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:6px;">Legal & Terpercaya</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Dikelola CV resmi dengan NIB: 0705250012458 sehingga lebih terpercaya untuk booking rombongan dan SPJ kantor.</p>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px;">
                <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:6px;">Berpengalaman 5+ Tahun</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Kami sudah menangani berbagai kebutuhan wisata Kemuning untuk keluarga, komunitas, dan gathering kantor.</p>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px;">
                <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:6px;">Dipercaya Banyak Rombongan</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Sudah melayani ratusan rombongan dengan kepuasan tinggi dan pelayanan ramah dari awal sampai selesai trip.</p>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px;">
                <h3 style="font-size:16px; font-weight:800; color:#111827; margin-bottom:6px;">Harga Bersaing & Transparan</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Paket bisa disesuaikan budget, mulai dari paket hemat sampai premium, tanpa biaya yang membingungkan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Customer Real -->
<section style="padding:56px 0; background:#FFFFFF; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="max-width:760px; margin-bottom:32px;">
            <h2 class="section-title">Testimoni Customer Jelajah Kemuning</h2>
            <p class="section-desc">Sudah melayani ratusan rombongan dan wisatawan luar kota. Ini pengalaman mereka setelah trip bersama kami.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
            <?php foreach ($testimonials as $t): ?>
            <div style="background:#F9FAF9; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <div style="color:#F59E0B; font-size:13px; margin-bottom:8px;">★★★★★</div>
                    <p style="font-size:13.5px; color:#374151; line-height:1.6; margin-bottom:14px;">
                        "<?= htmlspecialchars($t['comment']) ?>"
                    </p>
                </div>
                <div style="border-top:1px solid var(--border); padding-top:10px;">
                    <strong style="font-size:13.5px; color:#111827;"><?= htmlspecialchars($t['name']) ?></strong>
                    <div style="font-size:12px; color:var(--text-muted);"><?= htmlspecialchars($t['trip']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion (7 Pertanyaan Real) -->
<section style="padding:56px 0; background:#F9FAF9; border-bottom:1px solid var(--border);">
    <div class="container" style="max-width:820px;">
        <div style="margin-bottom:28px;">
            <h2 class="section-title">Pertanyaan yang Sering Ditanyakan (FAQ)</h2>
            <p class="section-desc" style="margin-bottom:0;">Informasi penting sebelum booking paket wisata di Jelajah Kemuning.</p>
        </div>

        <?php foreach ($faqs as $faq): ?>
        <div class="faq-box">
            <div class="faq-question">
                <span><?= htmlspecialchars($faq['q']) ?></span>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer hidden">
                <?= htmlspecialchars($faq['a']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Final CTA Section -->
<section style="padding:56px 0; background:#FFFFFF; text-align:center;">
    <div class="container" style="max-width:680px;">
        <h2 style="font-size:1.9rem; font-weight:800; color:#111827; margin-bottom:12px;">
            Siap Trip Seru di Kemuning? Booking Sekarang!
        </h2>
        <p style="font-size:14.5px; color:var(--text-muted); line-height:1.7; margin-bottom:24px;">
            Konsultasikan kebutuhan trip kamu sekarang. Kami siap bantu pilih paket Jeep Adventure Kemuning, River Tubing, atau Outbound Gathering sesuai jumlah peserta dan tanggal keberangkatan.
        </p>
        <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-wa" style="font-size:15px; padding:12px 24px;">
                Chat WhatsApp Admin
            </a>
            <a href="/proposal/" class="btn-outline" style="font-size:15px; padding:12px 22px;">
                Unduh Proposal PDF
            </a>
        </div>
    </div>
</section>
