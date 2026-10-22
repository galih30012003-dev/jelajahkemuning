<!-- Hero Section with Canvas Mist Particles & Real Photo Collage -->
<section class="hero-wrapper">
    <canvas id="hero-particles"></canvas>

    <div class="container hero-content">
        <div>
            <div style="display:inline-flex; align-items:center; gap:8px; margin-bottom:18px;">
                <span class="badge-glass">🛡️ CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
                <span class="badge-glass" style="background:rgba(234, 88, 12, 0.25); border-color:rgba(234, 88, 12, 0.5);">⭐ Rating 5.0 Google</span>
            </div>

            <h1 class="hero-title">
                Sensasi Offroad Jeep, Outbound & Tubing di <span class="highlight">Kebun Teh Kemuning</span>
            </h1>

            <p class="hero-desc">
                Cari paket wisata Kemuning yang resmi, aman, dan berkesan? Kami melayani <strong>Jeep Adventure 4x4</strong>, <strong>River Tubing Kali Senatah</strong>, <strong>Gathering Outbound Kantor</strong>, dan <strong>Sewa Villa</strong> di Karanganyar dengan operator lokal berpengalaman, berizin NIB, tersedia asuransi, dan bonus gratis dokumentasi.
            </p>

            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="font-size:15.5px; padding:14px 28px;">
                    📲 Konsultasi WhatsApp Cepat
                </a>
                <a href="/cari-paket/" class="btn-white" style="font-size:15px; padding:13px 24px;">
                    ✨ Kuis Pilih Paket
                </a>
                <a href="/proposal/" class="btn-white" style="background:rgba(255,255,255,0.12); color:#fff; border:1px solid rgba(255,255,255,0.3); font-size:15px; padding:13px 22px;">
                    📄 Unduh Proposal PDF
                </a>
            </div>
        </div>

        <!-- Real Photo Collage in Hero -->
        <div class="hero-collage">
            <div class="hero-img-wrap hero-img-span">
                <img src="/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp" alt="Jeep Adventure Kemuning">
            </div>
            <div class="hero-img-wrap">
                <img src="/assets/uploads/paket-combo-seru-4.webp" alt="Paket Combo Outbound Kemuning">
            </div>
            <div class="hero-img-wrap">
                <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah Kemuning">
            </div>

            <!-- Floating Trust Pill -->
            <div class="hero-floating-badge">
                <div style="font-size:28px;">🏆</div>
                <div>
                    <div style="font-weight:900; font-size:14px; color:#FDE68A;">500+ Rombongan Terlayani</div>
                    <div style="font-size:11.5px; color:#A7F3D0;">Kantor, Komunitas & Keluarga</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Metric Bar -->
<section style="background:#fff; border-bottom:1px solid var(--border); padding:20px 0;">
    <div class="container" style="display:flex; justify-content:space-around; flex-wrap:wrap; gap:20px; text-align:center;">
        <div>
            <div style="font-size:18px; font-weight:900; color:var(--color-primary);">🏛️ Resmi Berizin CV</div>
            <p style="font-size:12px; color:var(--text-muted);">NIB: 0705250012458 Aman untuk SPJ</p>
        </div>
        <div>
            <div style="font-size:18px; font-weight:900; color:var(--color-primary);">🛡️ Jaminan Asuransi</div>
            <p style="font-size:12px; color:var(--text-muted);">Seluruh paket dilengkapi asuransi resmi</p>
        </div>
        <div>
            <div style="font-size:18px; font-weight:900; color:var(--color-primary);">📸 Free Dokumentasi</div>
            <p style="font-size:12px; color:var(--text-muted);">Gratis softcopy foto & video Google Drive</p>
        </div>
        <div>
            <div style="font-size:18px; font-weight:900; color:var(--color-primary);">⚡ Fast Response 24/7</div>
            <p style="font-size:12px; color:var(--text-muted);">Admin ramah siap bantu penyesuaian jadwal</p>
        </div>
    </div>
</section>

<!-- 3 Paket Terlaris Wisata Kemuning Karanganyar (Bestseller Section) -->
<section style="padding:70px 0; background:#F8FAF8;" class="reveal-on-scroll">
    <div class="container">
        <div style="text-align:center; max-width:760px; margin:0 auto 40px;">
            <span class="badge-trust">FAVORIT ROMBONGAN KANTOR, DINAS & KELUARGA</span>
            <h2 style="font-size:clamp(1.8rem, 3.2vw, 2.4rem); font-weight:900; color:var(--color-primary); margin:12px 0 8px;">
                3 Paket Terlaris Wisata Kemuning Karanganyar
            </h2>
            <p style="color:var(--text-muted); font-size:15px;">
                Pilih paket favorit sesuai kebutuhan: Jeep Adventure, River Tubing, atau Outbound Gathering. Fasilitas all-in lengkap dengan makan siang prasmanan.
            </p>
        </div>

        <div class="packages-grid">
            <!-- Paket 1: Paket Seru 3 (130rb) -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-3.webp" alt="Paket Seru 3 Kemuning">
                        <span class="card-thumb-badge" style="background:#10B981;">FAVORIT</span>
                        <span class="card-thumb-duration">⏱️ 1 Hari (Full)</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Seru 3 (Outbound + River Tubing)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 130.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div style="font-size:11.5px; color:var(--color-accent); font-weight:800; margin-top:3px;">
                                    NB : MINIMAL 16 PESERTA
                                </div>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Highlight Kegiatan:</div>
                                <div class="itinerary-text">Outbound Fun Games & Team Building + River Tubing Kali Senatah + Shuttle Penjemputan + Makan Siang Prasmanan</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack Tradisional</li>
                                <li><span class="check">✓</span> Outbound & Fun Game Team Building</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> River Tubing Kali Senatah (Track Aman)</li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Mobil Tubing</li>
                                <li><span class="check">✓</span> Aula Transit & Sound System</li>
                                <li><span class="check">✓</span> Trainer Profesional & Rescue Team</li>
                                <li><span class="check">✓</span> Air Mineral Selama Kegiatan</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi Softcopy</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Seru 3 (Rp 130.000/org)', 'Outbound + Tubing') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            📲 Booking via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket 2: Combo Terlaris 185rb (Featured) -->
            <div class="card-package card-featured">
                <div class="card-featured-ribbon">🔥 PALING BANYAK DIPILIH</div>
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/paket-combo-seru-4.webp" alt="Paket Combo Terlaris Kemuning">
                        <span class="card-thumb-badge">TERLARIS #1</span>
                        <span class="card-thumb-duration">⏱️ 1 Hari Penuh</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Combo (Jeep + Outbound + Tubing)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price" style="font-size:2.1rem; color:var(--color-accent);">Rp 185.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div style="font-size:11.5px; color:var(--color-accent); font-weight:800; margin-top:3px;">
                                    NB : MINIMAL 16 PESERTA
                                </div>
                            </div>
                            <div class="itinerary-box" style="background:#FFF7ED; border-color:#FFEDD5;">
                                <div class="itinerary-title" style="color:var(--color-accent);">📍 Highlight Lengkap 3 Aktivitas:</div>
                                <div class="itinerary-text">Outbound Fun Games + Jeep Adventure 4x4 Short + River Tubing Kali Senatah + Makan Siang Prasmanan</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Outbound & Fun Game Team Building</li>
                                <li><span class="check">✓</span> <strong>Jeep Adventure Kemuning (Short Offroad)</strong></li>
                                <li><span class="check">✓</span> <strong>River Tubing Kali Senatah</strong></li>
                                <li><span class="check">✓</span> Shuttle Penjemputan River Tubing</li>
                                <li><span class="check">✓</span> Aula Transit Luas & Area Istirahat</li>
                                <li><span class="check">✓</span> Trainer Profesional & Driver Ramah</li>
                                <li><span class="check">✓</span> Sound System Standard</li>
                                <li><span class="check">✓</span> Air Mineral Sepuasnya</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi Foto & Video (Drive)</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Combo Terlaris (Rp 185.000/org)', 'Jeep + Outbound + Tubing') ?>" class="btn-accent" style="width:100%; justify-content:center; font-size:15.5px;">
                            📲 Ambil Promo Paket Terlaris
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket 3: Super Combo 210rb -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-5.webp" alt="Super Combo Kemuning">
                        <span class="card-thumb-badge" style="background:#2563EB;">BEST VALUE</span>
                        <span class="card-thumb-duration">⏱️ 1 Hari Penuh</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Super Combo (Jeep Medium + Outbound + Tubing)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 210.000</span>
                                <span class="card-price-unit">/ Orang</span>
                                <div style="font-size:11.5px; color:var(--color-accent); font-weight:800; margin-top:3px;">
                                    NB : MINIMAL 16 PESERTA
                                </div>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Highlight Kegiatan:</div>
                                <div class="itinerary-text">Durasi Offroad Jeep Medium lebih panjang ke Skyhills & Paralayang + Outbound + Tubing + Makan Siang Prasmanan</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Outbound & Fun Game Team Building</li>
                                <li><span class="check">✓</span> <strong>Jeep Adventure (Medium Trip ke Skyhills)</strong></li>
                                <li><span class="check">✓</span> <strong>River Tubing Kali Senatah</strong></li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Tubing</li>
                                <li><span class="check">✓</span> Aula Transit & Sound System</li>
                                <li><span class="check">✓</span> Trainer Profesional & Rescue Team</li>
                                <li><span class="check">✓</span> Asuransi Resmi Wisata</li>
                                <li><span class="check">✓</span> <strong>GRATIS Dokumentasi Foto & Video</strong></li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Super Combo Jeep Medium (Rp 210.000/org)', 'Min 16 peserta') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            📲 Booking via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Filter Tabs & Complete Catalog -->
<section style="padding:70px 0; background:#fff; border-top:1px solid var(--border);" class="reveal-on-scroll">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 32px;">
            <span class="badge-trust">KATALOG LENGKAP WISATA</span>
            <h2 style="font-size:2.2rem; font-weight:900; color:var(--color-primary); margin:12px 0 6px;">
                Jelajahi Semua Pilihan Paket Wisata
            </h2>
            <p style="color:var(--text-muted); font-size:14.5px;">
                Klik kategori di bawah untuk menyaring paket sesuai jenis petualangan yang kamu cari.
            </p>
        </div>

        <!-- Filter Tab Buttons -->
        <div class="filter-tabs-wrapper" style="justify-content:center; margin-bottom:36px;">
            <button class="tab-btn active" data-target="all">🌟 Semua Paket</button>
            <button class="tab-btn" data-target="jeep">🚙 Jeep Adventure</button>
            <button class="tab-btn" data-target="outbound">🎯 Outbound Gathering</button>
            <button class="tab-btn" data-target="tubing">🌊 River Tubing</button>
            <button class="tab-btn" data-target="hemat">🍱 Paket Hemat (Inc. Makan)</button>
            <button class="tab-btn" data-target="villa">🏡 Villa & Glamping</button>
        </div>

        <!-- Filterable Grid -->
        <div class="packages-grid">
            <!-- Jeep Special 1 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Special 1">
                        <span class="card-thumb-badge">TERLARIS</span>
                        <span class="card-thumb-duration">⏱️ 1.5 Jam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Jeep Special 1 (Offroad Kali & Kebun Teh)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 450.000</span>
                                <span class="card-price-unit">/ Armada (Maks 4 Orang)</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Rute Offroad:</div>
                                <div class="itinerary-text">Start Transit – Offroad Gunung Cilik – Kelok 0 – Offroad Susur Sungai & Lumpur – Kebun Teh Jimber – Hutan Karet – Finish</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Armada Jeep 4x4 Terawat (Maks 4 Org)</li>
                                <li><span class="check">✓</span> Driver Lokal Ramah & Berpengalaman</li>
                                <li><span class="check">✓</span> BBM & Retribusi Parkir</li>
                                <li><span class="check">✓</span> Asuransi Resmi & Free Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Jeep Special 1 (Rp 450.000/armada)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Booking Jeep via WA
                        </a>
                    </div>
                </div>
            </div>

            <!-- Jeep Special 2 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Special 2">
                        <span class="card-thumb-badge" style="background:#2563EB;">FAVORIT</span>
                        <span class="card-thumb-duration">⏱️ 2.5 Jam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Jeep Special 2 (Jembatan Kaca & Paralayang)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 470.000</span>
                                <span class="card-price-unit">/ Armada (Maks 4 Orang)</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Rute Offroad:</div>
                                <div class="itinerary-text">Start Transit – Jembatan Kaca Skyhills – Landing Paralayang – Offroad Susur Sungai & Lumpur – Kebun Teh Jimber – Finish</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Armada Jeep 4x4 (Maks 4 Org)</li>
                                <li><span class="check">✓</span> Spot Hits Jembatan Kaca & Paralayang</li>
                                <li><span class="check">✓</span> BBM & Driver Lokal Berpengalaman</li>
                                <li><span class="check">✓</span> Asuransi Resmi & Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Jeep Special 2 (Rp 470.000/armada)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Booking Jeep via WA
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
                        <span class="card-thumb-duration">⏱️ 1 Jam (-+ 1.5 KM)</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">River Tubing Kali Senatah (Track Panjang)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 80.000</span>
                                <span class="card-price-unit">/ Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Fasilitas Keselamatan:</div>
                                <div class="itinerary-text">Ban Tubing, Helm Standar SNI, Pelampung, Sepatu Karet, Shuttle Penjemputan Pick-up, & Rescue Team</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> River Tubing Track Panjang (-+ 1.5 KM)</li>
                                <li><span class="check">✓</span> Perlengkapan Safety Support Lengkap</li>
                                <li><span class="check">✓</span> Shuttle Penjemputan Mobil Tubing</li>
                                <li><span class="check">✓</span> Kamar Mandi Bilas & Asuransi Resmi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('River Tubing Kali Senatah (Rp 80.000/org)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Pesan Tubing via WA
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
                        <span class="card-thumb-duration">⏱️ Half Day</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Outbound Basic Fun Games</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 80.000</span>
                                <span class="card-price-unit">/ Orang (Min 16 Pax)</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Rundown Acara:</div>
                                <div class="itinerary-text">Welcome Drink → Ice Breaking & Fun Games → Team Building → Istirahat & Makan Siang Prasmanan Khas Kemuning</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Trainer Profesional & Sound System</li>
                                <li><span class="check">✓</span> Aula Transit & Gratis Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Outbound Basic (Rp 80.000/org)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Konsultasi Outbound via WA
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
                        <span class="card-thumb-duration">⏱️ Half Day</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Hemat Jeep Short (Inc. Makan)</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 150.000</span>
                                <span class="card-price-unit">/ Orang (Min 16 Pax)</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Praktis untuk Rombongan:</div>
                                <div class="itinerary-text">Dihitung per orang, trip jeep tetap seru keliling kebun teh + sudah include makan siang prasmanan dan aula.</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Jeep Adventure Short (Maks 4 Org/Jeep)</li>
                                <li><span class="check">✓</span> Makan Siang Prasmanan Khas Kemuning</li>
                                <li><span class="check">✓</span> Welcome Drink & Snack Rebusan</li>
                                <li><span class="check">✓</span> Aula Transit, Asuransi & Dokumentasi</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep Short (Rp 150.000/org)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Pesan Paket Hemat via WA
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
                        <span class="card-thumb-duration">⏱️ 2 Hari 1 Malam</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">Paket Menginap Villa Kebun Teh 2D1N</h3>
                            <div class="card-price-wrap">
                                <span class="card-price">Rp 350.000</span>
                                <span class="card-price-unit">/ Orang (Min 10 Pax)</span>
                            </div>
                            <div class="itinerary-box">
                                <div class="itinerary-title">📍 Suasana Sejuk Gunung Lawu:</div>
                                <div class="itinerary-text">Villa private asri di tengah kebun teh, makan 3x prasmanan, api unggun malam hari, teh Kemuning sepuasnya.</div>
                            </div>
                            <ul class="facility-list">
                                <li><span class="check">✓</span> Menginap 1 Malam di Villa Private</li>
                                <li><span class="check">✓</span> Makan 3x Prasmanan + Snack Tradisional</li>
                                <li><span class="check">✓</span> Water Heater, WiFi & Fasilitas Barbeque</li>
                                <li><span class="check">✓</span> Bisa Ditambah Paket Jeep & Tubing</li>
                            </ul>
                        </div>
                        <a href="<?= Helpers::generateWaLink('Paket Menginap Villa 2D1N (Rp 350.000/org)') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                            Booking Villa via WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Real Photo Documentation Bento Gallery -->
<section style="padding:70px 0; background:#F8FAF8; border-top:1px solid var(--border);" class="reveal-on-scroll">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:32px; flex-wrap:wrap; gap:16px;">
            <div>
                <span class="badge-trust">DOKUMENTASI ASLI KEGIATAN</span>
                <h2 style="font-size:2.2rem; font-weight:900; color:var(--color-primary); margin:8px 0 4px;">
                    Galeri Trip Jelajah Kemuning
                </h2>
                <p style="color:var(--text-muted); font-size:14.5px;">
                    Foto-foto asli rombongan kantor, dinas, komunitas, dan keluarga saat berpetualang bersama kami di Kemuning Karanganyar. Klik foto untuk melihat ukuran penuh.
                </p>
            </div>
            <a href="/galeri/" class="btn-primary" style="font-size:13.5px;">
                Lihat Semua Dokumentasi (14+ Foto) →
            </a>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Kelok 0 Kemuning">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Jeep Adventure</span>
                    <span class="gallery-title">Offroad Kelok 0 & Susur Lumpur</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Hutan Karet">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Jeep Adventure</span>
                    <span class="gallery-title">Trek Hutan Karet Gunung Cilik</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp" alt="Jeep Paralayang Kemuning">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Jeep Adventure</span>
                    <span class="gallery-title">Sunset di Bukit Paralayang</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Outbound Gathering">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Outbound</span>
                    <span class="gallery-title">Fun Games Gathering Kantor</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp" alt="River Tubing Kali Senatah">
                <div class="gallery-overlay">
                    <span class="gallery-tag">River Tubing</span>
                    <span class="gallery-title">Arus Segar Kali Senatah</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_3.webp" alt="River Tubing Keseruan">
                <div class="gallery-overlay">
                    <span class="gallery-tag">River Tubing</span>
                    <span class="gallery-title">Petualangan Jeram Air Alami</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp" alt="Kebun Teh Jimber">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Jeep Adventure</span>
                    <span class="gallery-title">Spot Foto Kebun Teh Jimber</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp" alt="Team Building Kemuning">
                <div class="gallery-overlay">
                    <span class="gallery-tag">Outbound</span>
                    <span class="gallery-title">Team Building Kompak & Seru</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan CV Jelajah Kemuning (4 Pillars) -->
<section style="padding:70px 0; background:#fff; border-top:1px solid var(--border);" class="reveal-on-scroll">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 40px;">
            <span class="badge-trust">PARTNER TRIP RESMI</span>
            <h2 style="font-size:2.2rem; font-weight:900; color:var(--color-primary); margin:12px 0 6px;">
                Kenapa Ratusan Rombongan Memilih Kami?
            </h2>
            <p style="color:var(--text-muted); font-size:14.5px;">
                Kami bukan sekadar perantara trip wisata, tapi mitra lokal langsung yang siap mendampingi dari tahap perencanaan hingga acara selesai dengan lancar.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:24px;">
            <div style="padding:26px; border-radius:var(--radius-md); background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:36px; margin-bottom:12px;">🏛️</div>
                <h3 style="font-size:1.15rem; font-weight:800; color:var(--color-primary); margin-bottom:8px;">Legalitas Resmi & Berizin</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.65;">
                    Dikelola langsung oleh <strong>CV Jelajah Kemuning</strong> dengan izin usaha NIB: 0705250012458. Sangat aman dan resmi untuk kelengkapan administrasi/SPJ instansi pemerintah dan perusahaan.
                </p>
            </div>
            <div style="padding:26px; border-radius:var(--radius-md); background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:36px; margin-bottom:12px;">🎖️</div>
                <h3 style="font-size:1.15rem; font-weight:800; color:var(--color-primary); margin-bottom:8px;">Pengalaman 5+ Tahun</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.65;">
                    Telah melayani ratusan rombongan dengan berbagai ukuran kelompok, mulai dari trip keluarga 4-8 orang hingga acara gathering akbar 300+ peserta.
                </p>
            </div>
            <div style="padding:26px; border-radius:var(--radius-md); background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:36px; margin-bottom:12px;">🤝</div>
                <h3 style="font-size:1.15rem; font-weight:800; color:var(--color-primary); margin-bottom:8px;">Dipercaya Rombongan</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.65;">
                    Tingkat kepuasan tinggi dengan driver lokal ramah, sopan, armada jeep bersih terawat, dan trainer outbound yang energik serta komunikatif.
                </p>
            </div>
            <div style="padding:26px; border-radius:var(--radius-md); background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:36px; margin-bottom:12px;">🏷️</div>
                <h3 style="font-size:1.15rem; font-weight:800; color:var(--color-primary); margin-bottom:8px;">Harga Transparan & Jelas</h3>
                <p style="font-size:13.5px; color:var(--text-muted); line-height:1.65;">
                    Rincian fasilitas jelas sejak awal. Tidak ada biaya tersembunyi yang membingungkan saat pelaksanaan trip di Kemuning.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Customer Asli Google Review 5.0 -->
<section style="padding:70px 0; background: linear-gradient(145deg, #071E12 0%, #0B3B24 100%); color:#fff;" class="reveal-on-scroll">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 40px;">
            <span class="badge-glass">GOOGLE REVIEW RATING 5.0 ⭐⭐⭐⭐⭐</span>
            <h2 style="font-size:2.2rem; font-weight:900; margin:12px 0 6px;">
                Apa Kata Mereka yang Sudah Trip Bersama Kami?
            </h2>
            <p style="opacity:0.85; font-size:14.5px;">
                Ulasan asli dari wisatawan dan panitia rombongan yang merasakan keseruan berlibur di Kemuning.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(270px, 1fr)); gap:24px;">
            <?php foreach ($testimonials as $t): ?>
            <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.16); border-radius:var(--radius-md); padding:24px; display:flex; flex-direction:column; justify-content:space-between; backdrop-filter:blur(10px);">
                <div>
                    <div style="color:#FBBF24; font-size:15px; margin-bottom:12px;">⭐⭐⭐⭐⭐</div>
                    <p style="font-size:14px; opacity:0.92; line-height:1.65; font-style:italic; margin-bottom:18px;">
                        "<?= htmlspecialchars($t['comment']) ?>"
                    </p>
                </div>
                <div style="border-top:1px solid rgba(255,255,255,0.14); padding-top:14px;">
                    <div style="font-weight:800; font-size:14.5px; color:#FDE68A;"><?= htmlspecialchars($t['name']) ?></div>
                    <div style="font-size:12px; opacity:0.75;"><?= htmlspecialchars($t['trip']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion (7 Pertanyaan Real) -->
<section class="container" style="padding:70px 20px; max-width:850px;" class="reveal-on-scroll">
    <div style="text-align:center; margin-bottom:36px;">
        <span class="badge-trust">FAQ / TANYA JAWAB</span>
        <h2 style="font-size:2rem; font-weight:900; color:var(--color-primary); margin:10px 0 6px;">
            Pertanyaan yang Sering Ditanyakan
        </h2>
        <p style="color:var(--text-muted); font-size:14.5px;">Biar kamu makin yakin sebelum booking, ini jawaban atas hal-hal yang paling sering ditanyakan.</p>
    </div>

    <div style="display:flex; flex-direction:column; gap:12px;">
        <?php foreach ($faqs as $faq): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; box-shadow:var(--shadow-low);">
            <div class="faq-question" style="padding:18px 22px; font-weight:800; cursor:pointer; display:flex; justify-content:space-between; align-items:center; color:var(--color-primary); font-size:15px;">
                <span><?= htmlspecialchars($faq['q']) ?></span>
                <span class="faq-icon" style="font-size:20px; color:var(--color-accent); font-weight:900;">+</span>
            </div>
            <div class="faq-answer hidden" style="padding:0 22px 18px; color:var(--text-muted); font-size:14px; line-height:1.65; border-top:1px solid #F3F4F6;">
                <?= htmlspecialchars($faq['a']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Final High-Conversion CTA Banner -->
<section style="background:linear-gradient(135deg, var(--color-accent) 0%, #C2410C 100%); color:#fff; padding:64px 0; text-align:center;">
    <div class="container" style="max-width:720px;">
        <h2 style="font-size:clamp(1.9rem, 3.5vw, 2.5rem); font-weight:900; margin-bottom:14px;">
            Siap Liburan Seru di Kemuning Bersama Rombongan?
        </h2>
        <p style="font-size:15.5px; opacity:0.94; margin-bottom:28px; line-height:1.7;">
            Konsultasikan kebutuhan trip Jeep, River Tubing, atau Outbound Gathering rombongan kamu sekarang. Admin kami siap membantu rute, durasi, dan penawaran terbaik!
        </p>
        <div style="display:flex; justify-content:center; gap:14px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-white" style="font-size:16px; padding:14px 32px; font-weight:900; color:var(--color-accent);">
                📲 Chat WhatsApp Admin Sekarang
            </a>
            <a href="/proposal/" class="btn-primary" style="background:rgba(0,0,0,0.22); border:1.5px solid rgba(255,255,255,0.4); color:#fff; font-size:16px; padding:14px 26px;">
                📄 Unduh Proposal Penawaran PDF
            </a>
        </div>
    </div>
</section>
