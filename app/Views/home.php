<!-- Editorial Split Hero -->
<section class="hero-section">
    <div class="container hero-grid">
        <div>
            <div class="hero-eyebrow">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>Operator Resmi CV Jelajah Kemuning • Berasuransi</span>
            </div>

            <h1 class="hero-h1">
                Paket Wisata <span class="accent-serif">Kemuning</span>: Jeep Offroad, Outbound & River Tubing
            </h1>

            <p class="hero-lead">
                Partner perjalanan resmi di lereng Gunung Lawu, Karanganyar. Melayani trip keluarga, komunitas, hingga gathering kantor ratusan peserta dengan armada terawat, pemandu lokal berpengalaman, konsumsi prasmanan, dan dokumentasi gratis.
            </p>

            <div class="hero-cta-group">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent" style="padding:14px 26px; font-size:15px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Booking & Konsultasi WA</span>
                </a>
                <a href="/proposal/" class="btn btn-light" style="padding:14px 22px; font-size:14.5px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>Unduh Proposal Kantor (PDF)</span>
                </a>
            </div>

            <div class="hero-stats-row">
                <div>
                    <div class="hero-stat-num">5+ Tahun</div>
                    <div class="hero-stat-label">Pengalaman Operator</div>
                </div>
                <div>
                    <div class="hero-stat-num">500+ Grup</div>
                    <div class="hero-stat-label">Kantor & Keluarga</div>
                </div>
                <div>
                    <div class="hero-stat-num">4.9 / 5.0</div>
                    <div class="hero-stat-label">Ulasan Pelanggan</div>
                </div>
            </div>
        </div>

        <!-- Clean Action Photography Mosaic -->
        <div class="hero-mosaic">
            <div class="mosaic-card mosaic-tall">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_5.webp" alt="Jeep Adventure Offroad Kemuning">
                <div class="mosaic-caption">
                    <span>Jeep 4x4 Susur Sungai & Kebun Teh</span>
                    <span class="tag">Mulai 300rb</span>
                </div>
            </div>
            <div class="mosaic-card">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp" alt="River Tubing Kali Senatah Kemuning">
                <div class="mosaic-caption">
                    <span>River Tubing Senatah</span>
                </div>
            </div>
            <div class="mosaic-card">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Outbound Gathering Kemuning">
                <div class="mosaic-caption">
                    <span>Outbound & Fun Games</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Quick Trip Consultation Bar -->
<div class="container quick-finder-wrap">
    <form class="quick-finder-bar" onsubmit="handleQuickConsult(event)">
        <div class="qf-field">
            <label for="qf-package">Pilih Layanan / Paket</label>
            <select id="qf-package" class="qf-input">
                <option value="Paket Combo Terlaris (Outbound + Jeep Short + Tubing - Rp 185.000/org)">Paket Combo Terlaris (Jeep + Outbound + Tubing) — Rp 185rb/org</option>
                <option value="Paket Seru 3 (Outbound + River Tubing - Rp 130.000/org)">Paket Seru 3 (Outbound + River Tubing) — Rp 130rb/org</option>
                <option value="Super Combo (Jeep Medium + Outbound + Tubing - Rp 210.000/org)">Super Combo (Jeep Medium + Outbound + Tubing) — Rp 210rb/org</option>
                <option value="Jeep Adventure 4x4 Kemuning (Mulai Rp 300.000/Jeep)">Jeep Adventure 4x4 (Private / Keluarga) — Mulai Rp 300rb/Jeep</option>
                <option value="Paket Outbound Gathering Kantor (Mulai Rp 80.000/org)">Paket Outbound Gathering & Makan Siang — Mulai Rp 80rb/org</option>
                <option value="River Tubing Kali Senatah (Mulai Rp 50.000/org)">River Tubing Kali Senatah — Mulai Rp 50rb/org</option>
                <option value="Paket Menginap Villa & Glamping 2D1N (Mulai Rp 350.000/org)">Paket Menginap Villa & Glamping 2D1N — Mulai Rp 350rb/org</option>
            </select>
        </div>
        <div class="qf-field">
            <label for="qf-pax">Perkiraan Peserta</label>
            <input type="number" id="qf-pax" class="qf-input" value="20" min="1" max="1000" placeholder="Jumlah orang">
        </div>
        <div class="qf-field">
            <label for="qf-date">Rencana Tanggal</label>
            <input type="date" id="qf-date" class="qf-input" value="<?= date('Y-m-d', strtotime('+7 days')) ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style="height:44px; width:100%; padding:0 22px;">
                <span>Cek Jadwal via WA</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
        </div>
    </form>
</div>

<!-- Section 1: 3 Paket Terlaris Rombongan -->
<section class="section-block">
    <div class="container">
        <div class="section-header-center">
            <span class="section-eyebrow">Favorit Rombongan Kantor & Keluarga</span>
            <h2 class="section-title">3 Paket Combo Terlaris Wisata Kemuning</h2>
            <p class="section-desc">
                Paket paling praktis untuk rombongan minimal 16 peserta. Harga sudah termasuk makan siang prasmanan, welcome drink & snack, aula transit, fasilitator, asuransi, dan dokumentasi gratis.
            </p>
        </div>

        <div class="packages-grid">
            <!-- Card 1: Paket Seru 3 -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-3.webp" alt="Paket Seru 3 Outbound dan River Tubing Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Favorit Grup</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    Half / Full Day
                                </span>
                            </div>
                            <h3 class="card-title">Paket Seru 3 (Outbound + River Tubing)</h3>

                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Paket</span>
                                    <span class="card-price">Rp 130.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>

                            <div class="itinerary-box">
                                <strong>Rangkaian Kegiatan</strong>
                                Fun Games & Ice Breaking + River Tubing Kali Senatah + Makan Siang Prasmanan
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack Tradisional</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Outbound & Fun Games Team Building</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan Khas Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>River Tubing + Shuttle Penjemputan</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Aula Transit, Sound System & Trainer Pro</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Asuransi Resmi & <strong>Gratis Dokumentasi</strong></span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Paket Seru 3 (Rp 130.000/orang)', 'Minimal 16 peserta') ?>" class="btn btn-primary" style="width:100%;">
                            <span>Booking Paket Seru 3 via WA</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Paket Combo 185rb (Featured) -->
            <div class="card-package is-featured">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/paket-combo-seru-4.webp" alt="Paket Combo Terlaris Jeep Outbound Tubing Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Terlaris #1</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 Hari Penuh
                                </span>
                            </div>
                            <h3 class="card-title">Paket Combo Lengkap (Jeep Short + Outbound + Tubing)</h3>

                            <div class="card-price-box" style="background:var(--accent-soft); border-color:#FDBA74;">
                                <div>
                                    <span class="card-price-label" style="color:var(--accent);">Paling Banyak Dipilih</span>
                                    <span class="card-price">Rp 185.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax" style="background:#FFFFFF;">Min. 16 Peserta</span>
                            </div>

                            <div class="itinerary-box" style="border-left-color:var(--accent);">
                                <strong style="color:var(--accent);">3 Aktivitas Utama Sekaligus</strong>
                                Outbound Fun Games + Jeep Adventure 4x4 (Short) + River Tubing + Makan Siang Prasmanan
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack Rebusan</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan Khas Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Outbound & Fun Games Team Building</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><strong>Jeep Adventure 4x4 (Short Offroad)</strong></span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><strong>River Tubing + Shuttle Penjemputan</strong></span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Aula Transit, Sound System & Trainer Pro</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Asuransi Resmi & <strong>Gratis Dokumentasi Drive</strong></span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Paket Combo Terlaris (Rp 185.000/orang)', 'Jeep + Outbound + Tubing') ?>" class="btn btn-accent" style="width:100%;">
                            <span>Ambil Paket Terlaris via WA</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Super Combo 210rb -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-5.webp" alt="Paket Super Combo Jeep Medium Outbound Tubing Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge blue">Rute Lebih Panjang</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 Hari Penuh
                                </span>
                            </div>
                            <h3 class="card-title">Super Combo (Jeep Medium + Outbound + Tubing)</h3>

                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Paket</span>
                                    <span class="card-price">Rp 210.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>

                            <div class="itinerary-box">
                                <strong>Rangkaian Kegiatan</strong>
                                Outbound + Jeep Adventure Medium (Jembatan Kaca & Paralayang) + River Tubing + Makan Siang
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack Tradisional</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan Khas Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Outbound & Fun Games Team Building</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><strong>Jeep Adventure Medium (Skyhills/Paralayang)</strong></span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><strong>River Tubing + Shuttle Penjemputan</strong></span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Asuransi Resmi & <strong>Gratis Dokumentasi</strong></span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Super Combo Jeep Medium (Rp 210.000/orang)', 'Minimal 16 peserta') ?>" class="btn btn-primary" style="width:100%;">
                            <span>Booking Super Combo via WA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Katalog Layanan per Kategori (Filterable) -->
<section id="katalog-paket" class="section-block" style="background:#FFFFFF; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-eyebrow">Katalog Lengkap Layanan</span>
                <h2 class="section-title">Pilih Paket Sesuai Kebutuhan Trip</h2>
                <p class="section-desc">Tersedia paket per armada Jeep untuk keluarga maupun paket rombongan besar untuk kantor dan komunitas.</p>
            </div>
            <a href="/cari-paket/" class="btn btn-outline">
                <span>Bingung Pilih? Coba Kuis Rekomendasi</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="category-tabs">
            <button class="cat-btn active" data-target="all">Semua Layanan</button>
            <button class="cat-btn" data-target="jeep">Jeep Adventure (Mulai 300rb/Jeep)</button>
            <button class="cat-btn" data-target="outbound">Outbound & Gathering (Mulai 80rb)</button>
            <button class="cat-btn" data-target="tubing">River Tubing (Mulai 50rb)</button>
            <button class="cat-btn" data-target="hemat">Paket Hemat Jeep + Makan (Mulai 150rb)</button>
            <button class="cat-btn" data-target="villa">Villa & Glamping 2D1N</button>
        </div>

        <div class="packages-grid">
            <!-- Jeep Special 1 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Special 1 Susur Sungai Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Terlaris Offroad</span>
                                <span class="card-duration">Durasi ± 1.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Special 1 (Offroad Kali & Kebun Teh)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 450.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rute Perjalanan</strong>
                                Start Transit Kemuning → Offroad Gunung Cilik → Kelok 0 → Susur Sungai & Lumpur → Kebun Teh Jimber → Hutan Karet → Finish
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 Bersih & Terawat</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Driver Lokal Ramah Sekaligus Fotografer</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>BBM, Parkir & Asuransi Keselamatan</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail Rute</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Special 1 (Rp 450.000/armada)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Special 2 -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Special 2 Jembatan Kaca Paralayang">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Favorit Keluarga</span>
                                <span class="card-duration">Durasi ± 2.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Special 2 (Jembatan Kaca & Paralayang)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 470.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rute Perjalanan</strong>
                                Start Transit → Jembatan Kaca Skyhills → Landing Paralayang → Susur Sungai & Lumpur → Kebun Teh Jimber → Hutan Karet → Finish
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Kombinasi View Kebun Teh & Trek Air</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Singgah Foto di Spot Paralayang & Skyhills</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Driver Berpengalaman, BBM & Asuransi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Semua Rute</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Special 2 (Rp 470.000/armada)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- River Tubing Kali Senatah -->
            <div class="card-package" data-category="tubing">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Wisata Air Segar</span>
                                <span class="card-duration">Durasi ± 45-60 Menit</span>
                            </div>
                            <h3 class="card-title">River Tubing Kali Senatah & Kali Pucung</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Mulai</span>
                                    <span class="card-price">Rp 50.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Aman Pemula</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Track Sungai</strong>
                                Tersedia Track Kali Pucung (Rp 50rb), Pring Kuning (Rp 75rb), dan Kali Senatah Track Panjang (Rp 80rb)
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Ban Tubing, Helm Safety & Pelampung</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pemandu Sungai & Tim Rescue Siaga</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Shuttle Penjemputan & Kamar Bilas Bersih</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/river-tubing-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail Tubing</a>
                            <a href="<?= Helpers::generateWaLink('Paket River Tubing Kemuning') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Outbound Fun Games -->
            <div class="card-package" data-category="outbound">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp" alt="Paket Outbound Gathering Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Gathering Kantor</span>
                                <span class="card-duration">Half Day / Full Day</span>
                            </div>
                            <h3 class="card-title">Paket Outbound & Team Building</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Mulai</span>
                                    <span class="card-price">Rp 80.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Konsep Acara Fleksibel</strong>
                                Ice breaking, fun games kekompakan, capacity building, lengkap dengan konsumsi prasmanan & aula
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Master Game / Trainer Berpengalaman</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan + Welcome Snack</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Aula Transit, Sound System & Dokumentasi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/paket-outbound-kemuning/" class="btn btn-outline" style="flex:0.8;">Pilihan Paket</a>
                            <a href="<?= Helpers::generateWaLink('Paket Outbound Gathering Kemuning') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Hemat Jeep Per Orang -->
            <div class="card-package" data-category="hemat">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto-paket-wisata-kemuning-jeep-1.webp" alt="Paket Hemat Jeep Kemuning Per Orang">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Include Makan Siang</span>
                                <span class="card-duration">Half Day</span>
                            </div>
                            <h3 class="card-title">Paket Hemat Jeep (Hitungan Per Orang)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Mulai</span>
                                    <span class="card-price">Rp 150.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Praktis untuk Panitia Rombongan</strong>
                                Dihitung per peserta, sudah termasuk trip Jeep Adventure + Makan Siang Prasmanan + Snack + Aula
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pilihan Jeep Short (150rb) s/d Long Plus (210rb)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan & Welcome Drink</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Aula Transit, Sound, Asuransi & Dokumentasi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/paket-hemat-jeep-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail Paket</a>
                            <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep Per Orang (Mulai Rp 150.000)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Villa & Glamping -->
            <div class="card-package" data-category="villa">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp" alt="Sewa Villa dan Glamping Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Menginap 2D1N</span>
                                <span class="card-duration">2 Hari 1 Malam</span>
                            </div>
                            <h3 class="card-title">Paket Menginap Villa & Glamping Kebun Teh</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Mulai</span>
                                    <span class="card-price">Rp 350.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 10 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Full Board Menginap + Wisata</strong>
                                Menginap di villa sejuk lereng Lawu, makan 3x prasmanan, malam keakraban/BBQ, bisa digabung Jeep & Tubing
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Villa Private Nyaman View Kebun Teh</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan 3x Prasmanan + Teh Kemuning Hangat</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Tersedia Paket Stay & Play (Include Jeep + Tubing)</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/villa-glamping-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail Villa</a>
                            <a href="<?= Helpers::generateWaLink('Paket Menginap Villa Kemuning 2D1N') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Corporate Gathering & Official PDF Proposal Callout -->
<section class="section-block">
    <div class="container">
        <div class="b2b-banner">
            <div>
                <span class="hero-eyebrow" style="margin-bottom:14px;">Khusus Panitia Acara Kantor, Dinas & Sekolah</span>
                <h2 style="font-size:clamp(1.6rem, 2.6vw, 2.15rem); font-weight:800; line-height:1.25; margin-bottom:12px;">
                    Butuh Surat Penawaran Resmi Ber-Kop CV untuk Pengajuan Anggaran?
                </h2>
                <p style="font-size:15px; color:rgba(255,255,255,0.82); line-height:1.65;">
                    Kami dikelola oleh <strong>CV Jelajah Kemuning</strong> dengan Perizinan Berusaha Berbasis Risiko (NIB: 0705250012458). Buat dan unduh proposal PDF resmi lengkap dengan rincian fasilitas dan estimasi anggaran rombongan secara instan.
                </p>
                <div class="b2b-points">
                    <div class="b2b-point">✓ Kop Resmi CV & Nomor NIB</div>
                    <div class="b2b-point">✓ Rincian Biaya Transparan</div>
                    <div class="b2b-point">✓ Siap untuk Lampiran SPJ</div>
                </div>
            </div>
            <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.15); border-radius:var(--radius-md); padding:28px; text-align:center;">
                <div style="font-size:13px; color:#A7F3D0; font-weight:700; margin-bottom:6px;">GENERATOR PROPOSAL OTOMATIS</div>
                <div style="font-size:1.25rem; font-weight:800; margin-bottom:18px;">Cetak Proposal PDF dalam 10 Detik</div>
                <a href="/proposal/" class="btn btn-accent" style="width:100%; margin-bottom:10px; padding:14px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>Buat Proposal PDF Sekarang</span>
                </a>
                <a href="/cari-paket/" class="btn btn-light" style="width:100%; padding:12px; font-size:13.5px;">
                    <span>Atau Coba Kuis Hitung Budget</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Galeri Dokumentasi Asli -->
<section class="section-block" style="background:#FFFFFF; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-eyebrow">Dokumentasi Lapangan</span>
                <h2 class="section-title">Galeri Dokumentasi Trip Jelajah Kemuning</h2>
                <p class="section-desc">Dokumentasi asli dari kegiatan Jeep Adventure, River Tubing, dan Outbound Gathering bersama rombongan kami.</p>
            </div>
            <a href="/galeri/" class="btn btn-outline">Lihat Semua Foto →</a>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Adventure Susur Sungai Kemuning" loading="lazy">
                <div class="gallery-caption">Offroad Susur Sungai & Lumpur</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp" alt="Jeep Adventure Kebun Teh Kemuning" loading="lazy">
                <div class="gallery-caption">Konvoi Jeep Kebun Teh Kemuning</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Outbound Gathering Kantor Kemuning" loading="lazy">
                <div class="gallery-caption">Gathering & Outbound Rombongan</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp" alt="River Tubing Kali Senatah" loading="lazy">
                <div class="gallery-caption">River Tubing Kali Senatah</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_7.webp" alt="Trek Lumpur Jeep Kemuning" loading="lazy">
                <div class="gallery-caption">Sensasi Trek Air & Lumpur 4x4</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp" alt="Fun Games Team Building Kemuning" loading="lazy">
                <div class="gallery-caption">Fun Games & Team Building</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_tubing_3.webp" alt="Wisata Air Tubing Kemuning" loading="lazy">
                <div class="gallery-caption">Jeram Alami Segar & Aman</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp" alt="Spot Foto Kebun Teh Jimber" loading="lazy">
                <div class="gallery-caption">Spot Foto Kebun Teh Jimber</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Testimoni Customer & Keunggulan -->
<section class="section-block">
    <div class="container">
        <div class="section-header-center">
            <span class="section-eyebrow">Ulasan Pelanggan</span>
            <h2 class="section-title">Pengalaman Mereka Bersama Jelajah Kemuning</h2>
            <p class="section-desc">Ratusan rombongan keluarga, komunitas, dan instansi luar kota telah mempercayakan kegiatan wisatanya kepada tim kami.</p>
        </div>

        <div class="testi-grid">
            <?php foreach ($testimonials as $t): ?>
            <div class="testi-card">
                <div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-quote">"<?= htmlspecialchars($t['comment']) ?>"</p>
                </div>
                <div class="testi-author">
                    <div class="testi-avatar"><?= strtoupper(substr($t['name'], 0, 1)) ?></div>
                    <div>
                        <strong style="font-size:14px; color:var(--text-main); display:block;"><?= htmlspecialchars($t['name']) ?></strong>
                        <span style="font-size:12px; color:var(--text-muted);"><?= htmlspecialchars($t['trip']) ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 6: FAQ Accordion -->
<section class="section-block" style="background:#FFFFFF; border-top:1px solid var(--border);">
    <div class="container" style="max-width:840px;">
        <div class="section-header-center" style="margin-bottom:32px;">
            <span class="section-eyebrow">Tanya Jawab</span>
            <h2 class="section-title">Pertanyaan yang Sering Ditanyakan (FAQ)</h2>
            <p class="section-desc">Informasi seputar reservasi, titik kumpul, asuransi, dan penyesuaian jadwal trip.</p>
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

<script>
function handleQuickConsult(e) {
    e.preventDefault();
    const pkg = document.getElementById('qf-package').value;
    const pax = document.getElementById('qf-pax').value || '16';
    const dt = document.getElementById('qf-date').value || '-';
    const phone = '<?= Helpers::getSetting("no_wa_1", "6285171001566") ?>';
    const text = `Halo Admin Jelajah Kemuning, saya ingin cek ketersediaan jadwal:\n\n- Paket: *${pkg}*\n- Jumlah Peserta: *${pax} orang*\n- Rencana Tanggal: *${dt}*\n\nMohon info rincian dan prosedurnya ya. Terima kasih!`;

    if (navigator.sendBeacon) {
        navigator.sendBeacon('/api/track-lead', JSON.stringify({
            event: 'wa_click',
            package_name: pkg,
            participants: parseInt(pax, 10) || 0
        }));
    }
    window.open('https://wa.me/' + phone + '?text=' + encodeURIComponent(text), '_blank');
}
</script>
