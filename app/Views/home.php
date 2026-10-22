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
                Dapatkan penawaran harga paket wisata di Kemuning, Karanganyar dengan harga termurah serta fasilitas terlengkap. Melayani agenda outbound kantor, komunitas, family gathering, jeep adventure 4x4, hingga river tubing aman & seru.
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
                    <div class="hero-stat-num">Ribuan Klien</div>
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
                    <span>Jeep Adventure 4x4 Kemuning</span>
                    <span class="tag">Mulai 350rb</span>
                </div>
            </div>
            <div class="mosaic-card">
                <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah Kemuning">
                <div class="mosaic-caption">
                    <span>River Tubing Kemuning</span>
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
                <option value="Paket Outbound 2 (Outbound + River Tubing - Rp 135.000/org)">Paket Outbound 2 (Outbound + River Tubing) — Rp 135rb/org</option>
                <option value="Paket Outbound 4 (Games/Tubing + Jeep Short 2 - Rp 210.000/org)">Paket Outbound 4 (Games/Tubing + Jeep Short 2) — Rp 210rb/org</option>
                <option value="Paket Outbound 6 (Outbound + Tubing + Jeep Short 2 - Rp 235.000/org)">Paket Outbound 6 (Outbound + Tubing + Jeep Short 2) — Rp 235rb/org</option>
                <option value="Jeep Adventure Short 1 (Rp 350.000/Jeep)">Jeep Adventure Short 1 — Rp 350rb/Jeep</option>
                <option value="Jeep Adventure Short 2 Susur Sungai (Rp 400.000/Jeep)">Jeep Adventure Short 2 (Susur Sungai Jimber) — Rp 400rb/Jeep</option>
                <option value="Jeep Adventure Medium 1 (Rp 500.000/Jeep)">Jeep Adventure Medium 1 (Jembatan Kaca/Paralayang) — Rp 500rb/Jeep</option>
                <option value="Jeep Adventure Long 1 (Rp 650.000/Jeep)">Jeep Adventure Long 1 (Candi Cetho/Jumog) — Rp 650rb/Jeep</option>
                <option value="River Tubing Kali Guci (Rp 45.000/org)">River Tubing Kali Guci — Rp 45rb/org</option>
                <option value="River Tubing Kali Senatah (Rp 75.000/org)">River Tubing Kali Senatah — Rp 75rb/org</option>
                <option value="Paket Hemat Jeep A (Rp 165.000/org)">Paket Hemat Jeep A (Rute Short 2) — Rp 165rb/org</option>
                <option value="Paket Hemat Tubing A (Rp 95.000/org)">Paket Hemat Tubing A (Kali Guci) — Rp 95rb/org</option>
                <option value="Paket Menginap Villa & Glamping 2D1N (Rp 350.000/org)">Paket Menginap Villa & Glamping 2D1N — Rp 350rb/org</option>
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

<!-- Section 1: 3 Paket Terlaris Wisata Kemuning -->
<section class="section-block">
    <div class="container">
        <div class="section-header-center">
            <span class="section-eyebrow">Paket Paling Sering Dibooking</span>
            <h2 class="section-title">3 Paket Terlaris Wisata Kemuning Karanganyar</h2>
            <p class="section-desc">
                Pilihan paket favorit untuk rombongan kantor, dinas, sekolah, dan keluarga. Fasilitas lengkap, include tempat transit, makan siang prasmanan, dan dokumentasi.
            </p>
        </div>

        <div class="packages-grid">
            <!-- Card 1: Paket Outbound 2 (135rb) -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/foto-paket-combo-seru-3.webp" alt="Paket Outbound 2 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Favorit Rombongan</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 Hari
                                </span>
                            </div>
                            <h3 class="card-title">Paket Outbound 2 (Outbound + River Tubing)</h3>

                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Paket</span>
                                    <span class="card-price">Rp 135.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>

                            <div class="itinerary-box">
                                <strong>Rangkaian Kegiatan:</strong>
                                Fun Game Team Building + River Tubing + Makan Siang Prasmanan + Oleh-oleh Khas Kemuning
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Fun Game (Team Building) & Tool Game</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>River Tubing Sungai Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan Khas Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Tempat Transit (Resto) & Sound System</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Trainer & Fasilitator Profesional</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Dokumentasi Foto & Video + <strong>Oleh-oleh Khas Kemuning</strong></span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Paket Outbound 2 (Rp 135.000/orang)', 'Minimal 16 peserta') ?>" class="btn btn-primary" style="width:100%;">
                            <span>Booking Paket Outbound 2 via WA</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Paket Outbound 4 (210rb) (Featured) -->
            <div class="card-package is-featured">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/paket-combo-seru-4.webp" alt="Paket Outbound 4 Jeep Short 2 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Terlaris #1</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 16 14"/></svg>
                                    1 Hari Penuh
                                </span>
                            </div>
                            <h3 class="card-title">Paket Outbound 4 (Games/Tubing + Jeep Short 2)</h3>

                            <div class="card-price-box" style="background:var(--accent-soft); border-color:#FDBA74;">
                                <div>
                                    <span class="card-price-label" style="color:var(--accent);">Paling Banyak Dipilih</span>
                                    <span class="card-price">Rp 210.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax" style="background:#FFFFFF;">Min. 16 Peserta</span>
                            </div>

                            <div class="itinerary-box" style="border-left-color:var(--accent);">
                                <strong style="color:var(--accent);">Kombinasi Jeep Offroad + Fun Game / Tubing</strong>
                                Fun Game ATAU River Tubing + Jeep Adventure Rute Short 2 (Susur Sungai & Lumpur) + Makan Siang Prasmanan
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Fun Game ATAU River Tubing (Pilih Salah Satu)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><strong>Jeep Adventure Rute Short 2 (Susur Sungai Jimber)</strong></span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan Khas Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Trainer & Fasilitator + Tool Game</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Tempat Transit (Resto) & Sound System</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Dokumentasi Foto & Video + <strong>Oleh-oleh Khas</strong></span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Paket Outbound 4 (Rp 210.000/orang)', 'Jeep Short 2 + Games/Tubing') ?>" class="btn btn-accent" style="width:100%;">
                            <span>Ambil Paket Terlaris via WA</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Jeep Adventure Short 2 (400rb) -->
            <div class="card-package">
                <div>
                    <div class="card-thumb-wrap">
                        <img src="/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp" alt="Jeep Adventure Kemuning Short 2">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge blue">Offroad Lumpur & Sungai</span>
                                <span class="card-duration">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 - 1.5 Jam
                                </span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Rute Short 2 (Susur Sungai)</h3>

                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 400.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>

                            <div class="itinerary-box">
                                <strong>Pilihan Rute Short 2:</strong>
                                Rute A: Titik Point - Offroad Lumpur & Susur Sungai Jimber - Kelok 0 - Landing Paralayang - Finish
                            </div>

                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Kapasitas 4 Orang Per Jeep)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Driver Lokal Berpengalaman</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Offroad Lumpur & Susur Sungai Jimber Park</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Spot Foto Kelok 0 Kebun Teh Jimber</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Singgah di Landing Paralayang</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>BBM, Parkir & Asuransi Resmi Wisata</span></li>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 2 (Rp 400.000/jeep)', 'Maks 4 orang') ?>" class="btn btn-primary" style="width:100%;">
                            <span>Booking Jeep Short 2 via WA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Katalog Lengkap Layanan (Filterable) -->
<section id="katalog-paket" class="section-block" style="background:#FFFFFF; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-eyebrow">Daftar Paket Kemuning Adventure</span>
                <h2 class="section-title">Pilih Paket Sesuai Kebutuhan Anda</h2>
                <p class="section-desc">Pilihan paket lengkap: Jeep Adventure (Short - Long), Outbound 1 - 8, River Tubing, Paket Hemat Jeep, dan Villa.</p>
            </div>
            <a href="/cari-paket/" class="btn btn-outline">
                <span>Kuis Rekomendasi Paket</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="category-tabs">
            <button class="cat-btn active" data-target="all">Semua Layanan</button>
            <button class="cat-btn" data-target="jeep">Jeep Adventure (350rb - 750rb)</button>
            <button class="cat-btn" data-target="outbound">Paket Outbound (90rb - 275rb)</button>
            <button class="cat-btn" data-target="tubing">River Tubing (45rb - 80rb)</button>
            <button class="cat-btn" data-target="hemat">Paket Hemat Jeep (165rb - 220rb)</button>
            <button class="cat-btn" data-target="villa">Villa & Glamping</button>
        </div>

        <div class="packages-grid">
            <!-- Jeep Short 1 (350rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_4.webp" alt="Jeep Adventure Short 1 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Short 1</span>
                                <span class="card-duration">1 - 1.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Short 1</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 350.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Rute:</strong>
                                Rute A: Start Transit - Jembatan Kaca (Non HTM) - Spot Foto - Kebun Teh - Finish<br>
                                Rute B: Start Transit - Kebun Sayur - Spot Foto - Hutan Karet - Kebun Teh - Finish
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Driver Lokal Berpengalaman</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>BBM & Parkir Selama Trip</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 1 (Rp 350.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Short 2 (400rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp" alt="Jeep Adventure Short 2 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Rute Short 2</span>
                                <span class="card-duration">1 - 1.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Short 2 (Susur Sungai)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 400.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Rute:</strong>
                                Rute A: Transit - Offroad Lumpur & Susur Sungai Jimber - Kebun Teh - Finish<br>
                                Rute B: Transit - Offroad Hutan Pinus - Hutan Karet - Kebun Teh - Finish
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Trek Offroad Lumpur & Susur Sungai Jimber</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Driver, BBM, Parkir & Asuransi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 2 (Rp 400.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Medium 1 (500rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp" alt="Jeep Adventure Medium 1 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Medium 1</span>
                                <span class="card-duration">2 - 2.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Medium 1</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 500.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Rute:</strong>
                                Rute A: Jembatan Kaca (Non HTM) - Offroad Lumpur & Susur Sungai Jimber - Hutan Karet<br>
                                Rute B: Offroad Hutan Pinus - Bukit Paralayang - Kebun Teh
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Kombinasi Jembatan Kaca & Susur Sungai</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>BBM, Parkir & Asuransi Resmi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Medium 1 (Rp 500.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Medium 2 (550rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_5.webp" alt="Jeep Adventure Medium 2 Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Medium 2</span>
                                <span class="card-duration">2 - 2.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Medium 2</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 550.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Rute:</strong>
                                Rute A: Hutan Pinus - Offroad Lumpur & Susur Sungai Jimber - Kebun Teh<br>
                                Rute C: Jembatan Kaca - Trabas Kebun Teh - Offroad Hutan Pinus
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Offroad Hutan Pinus & Susur Sungai Jimber</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Trabas Kebun Teh & Jembatan Kaca</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Medium 2 (Rp 550.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Long 1 (650rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp" alt="Jeep Adventure Long 1 Candi Cetho">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Long 1</span>
                                <span class="card-duration">2.5 - 3 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Long 1 (Candi Cetho)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 650.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Pilihan Rute:</strong>
                                Rute A: Start Transit - Candi Cetho (Non HTM) - Kebun Teh - Offroad Lumpur & Susur Sungai Jimber - Hutan Karet<br>
                                Rute C: Air Terjun Jumog / Telaga Madirda / Candi Sukuh
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Wisata Budaya Candi Cetho / Air Terjun Jumog</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Offroad Lumpur & Susur Sungai Jimber Park</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Long 1 (Rp 650.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jeep Long 2 (750rb) -->
            <div class="card-package" data-category="jeep">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_7.webp" alt="Jeep Adventure Long 2 Ultimate Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Rute Long 2</span>
                                <span class="card-duration">2.5 - 3.5 Jam</span>
                            </div>
                            <h3 class="card-title">Jeep Adventure Long 2 (Ultimate)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Armada</span>
                                    <span class="card-price">Rp 750.000</span>
                                    <span class="card-price-unit">/ Jeep</span>
                                </div>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Rute Terlengkap:</strong>
                                Candi Cetho - Jembatan Kaca - Trabas Kebun Teh - Bukit Paralayang - Hutan Pinus - Offroad Lumpur & Susur Sungai
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Penjelajahan Terlengkap Seluruh Spot Kemuning</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Trabas Hutan Pinus Dalan Pedot & Sungai</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Armada Jeep 4x4 (Maks 4 Orang)</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/jeep-adventure-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Long 2 (Rp 750.000/jeep)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- River Tubing Kali Guci (45rb) -->
            <div class="card-package" data-category="tubing">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/river-tubing-02.webp" alt="River Tubing Kali Guci Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Short</span>
                                <span class="card-duration">Jarak ± 1 KM</span>
                            </div>
                            <h3 class="card-title">River Tubing Kali Guci</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 45.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Upgrade Rute:</strong>
                                Rute Medium (+15.000) | Rute Long (+30.000)
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pelampung & Alat Safety Lengkap</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pemandu (Guide) & Tim Rescue</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Shuttle Penjemputan (Bila Diperlukan) & Dokumentasi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/river-tubing-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('River Tubing Kali Guci (Rp 45.000/orang)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- River Tubing Kali Senatah (75rb) -->
            <div class="card-package" data-category="tubing">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Rute Long</span>
                                <span class="card-duration">Jarak ± 1.8 KM</span>
                            </div>
                            <h3 class="card-title">River Tubing Kali Senatah</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 75.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Keseruan Track Panjang:</strong>
                                Arus sungai jernih berbatu, jeram menantang dan menyegarkan di lereng kebun teh.
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pelampung & Alat Safety Standar SNI</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Guide Pemandu & Tim Rescue Siaga</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Shuttle Penjemputan & Dokumentasi Foto</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/river-tubing-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('River Tubing Kali Senatah (Rp 75.000/orang)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- River Tubing Kali Pring Kuning (80rb) -->
            <div class="card-package" data-category="tubing">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto-paket-river-tubing-kemuning.webp" alt="River Tubing Kali Pring Kuning Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Rute Long</span>
                                <span class="card-duration">Jarak ± 1.3 KM</span>
                            </div>
                            <h3 class="card-title">River Tubing Kali Pring Kuning</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 80.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Keseruan Air Alami:</strong>
                                Mengarungi sungai menggunakan ban renteng didampingi 2 guide profesional.
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Pelampung & Helm Safety Support</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Guide Pemandu & Dokumentasi Foto/Video</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Shuttle Penjemputan ke Lokasi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/river-tubing-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('River Tubing Kali Pring Kuning (Rp 80.000/orang)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Hemat Jeep A (165rb) -->
            <div class="card-package" data-category="hemat">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto-paket-hemat-jeep-adventure-kemuning.webp" alt="Paket Hemat Jeep A Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Hemat Jeep A</span>
                                <span class="card-duration">Half Day</span>
                            </div>
                            <h3 class="card-title">Paket Hemat Jeep A (Rute Short 2)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 165.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Include Makan Siang Prasmanan:</strong>
                                Jeep Adventure Rute Short 2 (Offroad Lumpur & Susur Sungai) + Makan Siang + Aula + Dokumentasi
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack Rebusan</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Jeep Adventure Rute Short 2</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan & Tempat Transit</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/paket-hemat-jeep-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep A (Rp 165.000/orang)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Hemat Jeep B (185rb) -->
            <div class="card-package" data-category="hemat">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp" alt="Paket Hemat Jeep B Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge accent">Hemat Jeep B</span>
                                <span class="card-duration">Half Day</span>
                            </div>
                            <h3 class="card-title">Paket Hemat Jeep B (Rute Medium 1)</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 185.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 16 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Include Makan Siang Prasmanan:</strong>
                                Jeep Adventure Rute Medium 1 (Jembatan Kaca / Paralayang / Sungai) + Makan Siang Prasmanan + Transit
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Welcome Drink & Snack Rebusan</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Jeep Adventure Rute Medium 1</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan Siang Prasmanan, Guide & Dokumentasi</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/paket-hemat-jeep-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep B (Rp 185.000/orang)') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Villa & Glamping (350rb) -->
            <div class="card-package" data-category="villa">
                <div>
                    <div class="card-thumb-wrap ratio-16-9">
                        <img src="/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp" alt="Sewa Villa dan Glamping Kemuning">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <span class="pill-badge">Menginap 2D1N</span>
                                <span class="card-duration">2 Hari 1 Malam</span>
                            </div>
                            <h3 class="card-title">Paket Menginap Villa Kebun Teh 2D1N</h3>
                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Tarif Per Orang</span>
                                    <span class="card-price">Rp 350.000</span>
                                    <span class="card-price-unit">/ Orang</span>
                                </div>
                                <span class="card-min-pax">Min. 10 Peserta</span>
                            </div>
                            <div class="itinerary-box">
                                <strong>Fasilitas Menginap Lengkap:</strong>
                                Villa asri view kebun teh, makan 3x prasmanan, api unggun, teh Kemuning sepuasnya, bisa digabung Jeep & Tubing.
                            </div>
                            <ul class="facility-list">
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Menginap 1 Malam di Villa Private</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Makan 3x Prasmanan + Snack Tradisional</span></li>
                                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Water Heater, WiFi & Fasilitas BBQ</span></li>
                            </ul>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="/villa-glamping-kemuning/" class="btn btn-outline" style="flex:0.8;">Detail</a>
                            <a href="<?= Helpers::generateWaLink('Paket Menginap Villa Kemuning 2D1N') ?>" class="btn btn-primary" style="flex:1.2;">Pesan via WA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: B2B Proposal Callout -->
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
                <img src="/assets/uploads/river-tubing-01.webp" alt="River Tubing Kali Senatah" loading="lazy">
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
                <img src="/assets/uploads/river-tubing-02.webp" alt="Wisata Air Tubing Kemuning" loading="lazy">
                <div class="gallery-caption">Jeram Alami Segar & Aman</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp" alt="Spot Foto Kebun Teh Jimber" loading="lazy">
                <div class="gallery-caption">Spot Foto Kebun Teh Jimber</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Testimoni Customer -->
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
