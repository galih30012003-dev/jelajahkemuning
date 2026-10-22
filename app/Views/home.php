<!-- ============================================================
     Hero — full-bleed documentary
     ============================================================ -->
<section class="hero-section">
    <div class="hero-media">
        <img src="/assets/uploads/katalog/jeep-medium-2.webp"
             alt="Jeep 4x4 melintasi trek kebun teh Kemuning" fetchpriority="high" decoding="async">
    </div>
    <div class="container hero-inner">
        <div>
            <div class="hero-eyebrow">01 / Operator resmi · Karanganyar</div>

            <h1 class="hero-h1">
                Kemuning,<br>dari balik<br><span class="accent-serif">kemudi jeep.</span>
            </h1>

            <p class="hero-lead">
                Jeep offroad di kebun teh, river tubing di kali jernih, dan gathering kantor di lereng Lawu — dikelola CV Jelajah Kemuning dengan izin resmi dan asuransi wisata.
            </p>

            <div class="hero-cta-group">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Booking via WhatsApp</span>
                </a>
                <a href="#katalog-paket" class="hero-link">
                    Lihat semua paket
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <div class="hero-stats-row" style="margin-top:38px;">
                <div class="hero-stat">
                    <div class="hero-stat-num">5+</div>
                    <div class="hero-stat-label">Tahun operator</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">Ribuan</div>
                    <div class="hero-stat-label">Klien kantor &amp; keluarga</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">4.9 / 5.0</div>
                    <div class="hero-stat-label">Ulasan pelanggan</div>
                </div>
            </div>
        </div>

        <div class="hero-meta">
            <div class="hero-meta-row">
                <div class="hero-meta-label">Jeep adventure</div>
                <div class="hero-meta-value">Rp 350rb <small>/ jeep</small></div>
            </div>
            <div class="hero-meta-row">
                <div class="hero-meta-label">River tubing</div>
                <div class="hero-meta-value">Rp 45rb <small>/ org</small></div>
            </div>
            <div class="hero-meta-row">
                <div class="hero-meta-label">Outbound</div>
                <div class="hero-meta-value">Rp 90rb <small>/ org</small></div>
            </div>
            <div class="hero-meta-row">
                <div class="hero-meta-label">Villa 2D1N</div>
                <div class="hero-meta-value">Rp 350rb <small>/ org</small></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     Quick finder — dark ruled band
     ============================================================ -->
<div class="quick-finder-wrap">
    <div class="container">
        <form class="quick-finder-bar" onsubmit="handleQuickConsult(event)">
            <div class="qf-field">
                <label for="qf-package">Layanan / paket</label>
                <select id="qf-package" class="qf-input">
                    <option value="Paket Outbound 2 (Outbound + River Tubing - Rp 135.000/org)">Outbound 2 + Tubing · 135rb</option>
                    <option value="Paket Outbound 4 (Games/Tubing + Jeep Short 2 - Rp 210.000/org)">Outbound 4 + Jeep S2 · 210rb</option>
                    <option value="Paket Outbound 6 (Outbound + Tubing + Jeep Short 2 - Rp 235.000/org)">Outbound 6 + Jeep S2 · 235rb</option>
                    <option value="Jeep Adventure Short 1 (Rp 350.000/Jeep)">Jeep Short 1 · 350rb</option>
                    <option value="Jeep Adventure Short 2 Susur Sungai (Rp 400.000/Jeep)">Jeep Short 2 · 400rb</option>
                    <option value="Jeep Adventure Medium 1 (Rp 500.000/Jeep)">Jeep Medium 1 · 500rb</option>
                    <option value="Jeep Adventure Long 1 (Rp 650.000/Jeep)">Jeep Long 1 · 650rb</option>
                    <option value="River Tubing Kali Guci (Rp 45.000/org)">Tubing Guci · 45rb</option>
                    <option value="River Tubing Kali Senatah (Rp 75.000/org)">Tubing Senatah · 75rb</option>
                    <option value="Paket Hemat Jeep A (Rp 165.000/org)">Hemat Jeep A · 165rb</option>
                    <option value="Paket Hemat Tubing A (Rp 95.000/org)">Hemat Tubing A · 95rb</option>
                    <option value="Paket Menginap Villa & Glamping 2D1N (Rp 350.000/org)">Villa 2D1N · 350rb</option>
                </select>
            </div>
            <div class="qf-field">
                <label for="qf-pax">Peserta</label>
                <input type="number" id="qf-pax" class="qf-input" value="20" min="1" max="1000" placeholder="Jumlah orang">
            </div>
            <div class="qf-field">
                <label for="qf-date">Tanggal</label>
                <input type="date" id="qf-date" class="qf-input" value="<?= date('Y-m-d', strtotime('+7 days')) ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-accent" style="width:100%;">
                    <span>Cek jadwal</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================
     Section 02 — Most booked (asymmetric lead + compact rows)
     ============================================================ -->
<section class="section-block no-rule">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">02 / Paling sering dibooking</div>
                <h2 class="section-title">Tiga paket yang paling banyak dipesan</h2>
                <p class="section-desc">Pilihan favorit rombongan kantor, dinas, sekolah, dan keluarga. Sudah termasuk transit, makan siang prasmanan, dan dokumentasi.</p>
            </div>
            <a href="#katalog-paket" class="btn-ghost">
                Semua paket
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="lead-grid">
            <!-- Lead package: Paket Outbound 4 -->
            <article class="lead-package">
                <div class="lead-media">
                    <span class="lead-index">01 / TERLARIS</span>
                    <span class="lead-badge">Paling dipilih</span>
                    <img src="/assets/uploads/katalog/outbound-4.webp" alt="Paket Outbound 4 Kemuning: jeep short 2 dan fun games" loading="eager" decoding="async">
                </div>

                <h3 class="lead-title">Paket Outbound 4 — Games/Tubing + Jeep Short 2</h3>

                <div class="lead-facts">
                    <div class="lead-fact">
                        <div class="lead-fact-label">Harga</div>
                        <div class="lead-fact-value accent">Rp 210.000 <span style="font-size:10px;color:var(--ink-faint);">/org</span></div>
                    </div>
                    <div class="lead-fact">
                        <div class="lead-fact-label">Durasi</div>
                        <div class="lead-fact-value">1 hari penuh</div>
                    </div>
                    <div class="lead-fact">
                        <div class="lead-fact-label">Minimal</div>
                        <div class="lead-fact-value">16 peserta</div>
                    </div>
                </div>

                <p class="lead-body">
                    Fun game team building <em>atau</em> river tubing, digabung Jeep Adventure Rute Short 2 — susur sungai Jimber dan trek lumpur — lalu makan siang prasmanan khas Kemuning.
                </p>

                <div class="pkg-row-facts" style="margin-bottom:18px;">
                    <span>Welcome drink &amp; snack</span>
                    <span>Trainer &amp; fasilitator</span>
                    <span>Sound system &amp; resto transit</span>
                    <span>Dokumentasi foto &amp; video</span>
                    <span>Oleh-oleh khas Kemuning</span>
                </div>

                <div class="lead-actions">
                    <a href="<?= Helpers::generateWaLink('Paket Outbound 4 (Rp 210.000/orang)', 'Jeep Short 2 + Games/Tubing') ?>" class="btn btn-accent">
                        <span>Ambil paket ini</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="/paket-outbound-kemuning/" class="btn-ghost">Detail paket outbound</a>
                </div>
            </article>

            <!-- Two compact runners-up -->
            <div class="lead-list">
                <article class="lead-row">
                    <div class="lead-row-media">
                        <img src="/assets/uploads/katalog/outbound-games.webp" alt="Paket Outbound 2 Kemuning: outbound dan river tubing" loading="lazy" decoding="async">
                    </div>
                    <div>
                        <div class="pkg-row-index" style="margin-bottom:6px;">02 / ROMBONGAN</div>
                        <h3 class="lead-row-title">Paket Outbound 2 — Outbound + River Tubing</h3>
                        <div class="lead-row-meta">
                            <span>1 hari</span>
                            <span>Min. 16 peserta</span>
                        </div>
                        <div class="lead-row-price">Rp 135.000 <span>/ orang</span></div>
                        <div style="margin-top:12px;">
                            <a href="<?= Helpers::generateWaLink('Paket Outbound 2 (Rp 135.000/orang)', 'Minimal 16 peserta') ?>" class="btn-ghost">Booking paket ini</a>
                        </div>
                    </div>
                </article>

                <article class="lead-row">
                    <div class="lead-row-media">
                        <img src="/assets/uploads/katalog/jeep-short-2.webp" alt="Jeep Adventure Rute Short 2 susur sungai Kemuning" loading="lazy" decoding="async">
                    </div>
                    <div>
                        <div class="pkg-row-index" style="margin-bottom:6px;">03 / OFFROAD</div>
                        <h3 class="lead-row-title">Jeep Adventure Short 2 — Susur Sungai Jimber</h3>
                        <div class="lead-row-meta">
                            <span>1–1.5 jam</span>
                            <span>Maks. 4 org/jeep</span>
                        </div>
                        <div class="lead-row-price">Rp 400.000 <span>/ jeep</span></div>
                        <div style="margin-top:12px;">
                            <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 2 (Rp 400.000/jeep)', 'Maks 4 orang') ?>" class="btn-ghost">Booking paket ini</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     Section 03 — Full catalogue (ruled rows + filters)
     ============================================================ -->
<section id="katalog-paket" class="section-block">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">03 / Katalog</div>
                <h2 class="section-title">Semua paket, harga terbuka</h2>
                <p class="section-desc">Jeep Adventure Short sampai Long, Outbound 1–8, river tubing tiga rute, paket hemat, dan villa. Harga per armada atau per orang — tertulis apa adanya.</p>
            </div>
            <a href="/cari-paket/" class="btn-ghost">
                Bantu pilihkan
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="category-tabs" role="tablist" aria-label="Filter paket">
            <button class="cat-btn active" data-target="all">Semua</button>
            <button class="cat-btn" data-target="jeep">Jeep · 350–750rb</button>
            <button class="cat-btn" data-target="outbound">Outbound · 90–275rb</button>
            <button class="cat-btn" data-target="tubing">Tubing · 45–80rb</button>
            <button class="cat-btn" data-target="hemat">Hemat · 165–220rb</button>
            <button class="cat-btn" data-target="villa">Villa</button>
        </div>

        <div class="packages-grid">
            <!-- 01 Jeep Short 1 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-short-1.webp" alt="Jeep Adventure Short 1 Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">04 / JEEP</span>
                        <span class="pkg-row-index">1–1.5 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Short 1</h3>
                    <p class="pkg-row-note">Rute A: jembatan kaca (non HTM), spot foto, kebun teh. Rute B: kebun sayur, hutan karet, kebun teh.</p>
                    <div class="pkg-row-facts">
                        <span>Armada 4×4, maks 4 orang</span>
                        <span>Driver lokal</span>
                        <span>BBM &amp; parkir</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 350.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 1 (Rp 350.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 02 Jeep Short 2 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-short-2.webp" alt="Jeep Adventure Short 2 Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">05 / JEEP</span>
                        <span class="pkg-row-index">1–1.5 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Short 2 — Susur Sungai</h3>
                    <p class="pkg-row-note">Rute A: offroad lumpur, susur sungai Jimber, kebun teh. Rute B: offroad hutan pinus, hutan karet, kebun teh.</p>
                    <div class="pkg-row-facts">
                        <span>Trek lumpur &amp; sungai</span>
                        <span>Armada 4×4, maks 4 orang</span>
                        <span>Driver, BBM, parkir, asuransi</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 400.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Short 2 (Rp 400.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 03 Jeep Medium 1 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-medium-1.webp" alt="Jeep Adventure Medium 1 Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">06 / JEEP</span>
                        <span class="pkg-row-index">2–2.5 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Medium 1</h3>
                    <p class="pkg-row-note">Rute A: jembatan kaca, offroad lumpur, susur sungai Jimber, hutan karet. Rute B: offroad hutan pinus, bukit paralayang, kebun teh.</p>
                    <div class="pkg-row-facts">
                        <span>Jembatan kaca &amp; susur sungai</span>
                        <span>Armada 4×4, maks 4 orang</span>
                        <span>BBM, parkir, asuransi</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 500.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Medium 1 (Rp 500.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 04 Jeep Medium 2 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-medium-2.webp" alt="Jeep Adventure Medium 2 Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">07 / JEEP</span>
                        <span class="pkg-row-index">2–2.5 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Medium 2</h3>
                    <p class="pkg-row-note">Rute A: hutan pinus, offroad lumpur, susur sungai Jimber, kebun teh. Rute C: jembatan kaca, trabas kebun teh, offroad hutan pinus.</p>
                    <div class="pkg-row-facts">
                        <span>Hutan pinus &amp; susur sungai</span>
                        <span>Trabas kebun teh</span>
                        <span>Armada 4×4, maks 4 orang</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 550.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Medium 2 (Rp 550.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 05 Jeep Long 1 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-long-1.webp" alt="Jeep Adventure Long 1 Candi Cetho Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">08 / JEEP</span>
                        <span class="pkg-row-index">2.5–3 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Long 1 — Candi Cetho</h3>
                    <p class="pkg-row-note">Rute A: Candi Cetho (non HTM), kebun teh, offroad lumpur, susur sungai Jimber, hutan karet. Rute C: Air Terjun Jumog, Telaga Madirda, atau Candi Sukuh.</p>
                    <div class="pkg-row-facts">
                        <span>Wisata budaya Candi Cetho</span>
                        <span>Offroad &amp; susur sungai</span>
                        <span>Armada 4×4, maks 4 orang</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 650.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Long 1 (Rp 650.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 06 Jeep Long 2 -->
            <article class="pkg-row" data-category="jeep">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-long-2.webp" alt="Jeep Adventure Long 2 Ultimate Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">09 / JEEP</span>
                        <span class="pkg-row-index">2.5–3.5 jam</span>
                    </div>
                    <h3 class="pkg-row-title">Jeep Adventure Long 2 — Ultimate</h3>
                    <p class="pkg-row-note">Rute terlengkap: Candi Cetho, jembatan kaca, trabas kebun teh, bukit paralayang, hutan pinus, offroad lumpur, dan susur sungai.</p>
                    <div class="pkg-row-facts">
                        <span>Seluruh spot Kemuning</span>
                        <span>Trabas hutan pinus Dalan Pedot</span>
                        <span>Armada 4×4, maks 4 orang</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 750.000<small>per jeep</small></div>
                    <div class="pkg-row-actions">
                        <a href="/jeep-adventure-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Jeep Adventure Long 2 (Rp 750.000/jeep)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 07 River Tubing Kali Guci -->
            <article class="pkg-row" data-category="tubing">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/tubing-guci.webp" alt="River Tubing Kali Guci Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">10 / TUBING</span>
                        <span class="pkg-row-index">± 1 km</span>
                    </div>
                    <h3 class="pkg-row-title">River Tubing Kali Guci</h3>
                    <p class="pkg-row-note">Rute short. Bisa di-upgrade: rute medium (+15.000) atau rute long (+30.000).</p>
                    <div class="pkg-row-facts">
                        <span>Pelampung &amp; alat safety lengkap</span>
                        <span>Guide &amp; tim rescue</span>
                        <span>Shuttle &amp; dokumentasi</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 45.000<small>per orang · min 16</small></div>
                    <div class="pkg-row-actions">
                        <a href="/river-tubing-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('River Tubing Kali Guci (Rp 45.000/orang)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 08 River Tubing Kali Senatah -->
            <article class="pkg-row" data-category="tubing">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/tubing-senatah.webp" alt="River Tubing Kali Senatah Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">11 / TUBING</span>
                        <span class="pkg-row-index">± 1.8 km</span>
                    </div>
                    <h3 class="pkg-row-title">River Tubing Kali Senatah</h3>
                    <p class="pkg-row-note">Track panjang: arus jernih berbatu dan jeram yang menyegarkan di lereng kebun teh.</p>
                    <div class="pkg-row-facts">
                        <span>Safety standar SNI</span>
                        <span>Guide &amp; tim rescue siaga</span>
                        <span>Shuttle &amp; dokumentasi foto</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 75.000<small>per orang · min 16</small></div>
                    <div class="pkg-row-actions">
                        <a href="/river-tubing-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('River Tubing Kali Senatah (Rp 75.000/orang)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 09 River Tubing Kali Pring Kuning -->
            <article class="pkg-row" data-category="tubing">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/tubing-pring-kuning.webp" alt="River Tubing Kali Pring Kuning Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">12 / TUBING</span>
                        <span class="pkg-row-index">± 1.3 km</span>
                    </div>
                    <h3 class="pkg-row-title">River Tubing Kali Pring Kuning</h3>
                    <p class="pkg-row-note">Mengarungi sungai dengan ban renteng, didampingi dua guide profesional.</p>
                    <div class="pkg-row-facts">
                        <span>Pelampung &amp; helm</span>
                        <span>Guide &amp; dokumentasi</span>
                        <span>Shuttle ke lokasi</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 80.000<small>per orang · min 16</small></div>
                    <div class="pkg-row-actions">
                        <a href="/river-tubing-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('River Tubing Kali Pring Kuning (Rp 80.000/orang)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 10 Paket Hemat Jeep A -->
            <article class="pkg-row" data-category="hemat">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-hemat-a.webp" alt="Paket Hemat Jeep A Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">13 / HEMAT</span>
                        <span class="pkg-row-index">Half day</span>
                    </div>
                    <h3 class="pkg-row-title">Paket Hemat Jeep A — Rute Short 2</h3>
                    <p class="pkg-row-note">Jeep Adventure Rute Short 2 (offroad lumpur &amp; susur sungai) dengan makan siang prasmanan, aula, dan dokumentasi.</p>
                    <div class="pkg-row-facts">
                        <span>Welcome drink &amp; snack rebusan</span>
                        <span>Makan siang prasmanan</span>
                        <span>Tempat transit</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 165.000<small>per orang · min 16</small></div>
                    <div class="pkg-row-actions">
                        <a href="/paket-hemat-jeep-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep A (Rp 165.000/orang)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 11 Paket Hemat Jeep B -->
            <article class="pkg-row" data-category="hemat">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/jeep-short-2.webp" alt="Paket Hemat Jeep B Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">14 / HEMAT</span>
                        <span class="pkg-row-index">Half day</span>
                    </div>
                    <h3 class="pkg-row-title">Paket Hemat Jeep B — Rute Medium 1</h3>
                    <p class="pkg-row-note">Jeep Adventure Rute Medium 1 (jembatan kaca, paralayang, sungai) dengan makan siang prasmanan dan transit.</p>
                    <div class="pkg-row-facts">
                        <span>Welcome drink &amp; snack rebusan</span>
                        <span>Makan siang prasmanan</span>
                        <span>Guide &amp; dokumentasi</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 185.000<small>per orang · min 16</small></div>
                    <div class="pkg-row-actions">
                        <a href="/paket-hemat-jeep-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Paket Hemat Jeep B (Rp 185.000/orang)') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>

            <!-- 12 Villa 2D1N -->
            <article class="pkg-row" data-category="villa">
                <div class="pkg-row-media">
                    <img src="/assets/uploads/katalog/villa-glamping.webp" alt="Villa dan glamping Kemuning" loading="lazy" decoding="async">
                </div>
                <div>
                    <div class="pkg-row-head">
                        <span class="pkg-row-index">15 / VILLA</span>
                        <span class="pkg-row-index">2 hari 1 malam</span>
                    </div>
                    <h3 class="pkg-row-title">Menginap Villa Kebun Teh 2D1N</h3>
                    <p class="pkg-row-note">Villa asri dengan pemandangan kebun teh, makan tiga kali prasmanan, api unggun, dan teh Kemuning sepuasnya.</p>
                    <div class="pkg-row-facts">
                        <span>Menginap 1 malam</span>
                        <span>Makan 3× + snack tradisional</span>
                        <span>Water heater, WiFi, BBQ</span>
                    </div>
                </div>
                <div class="pkg-row-side">
                    <div class="pkg-row-price">Rp 350.000<small>per orang · min 10</small></div>
                    <div class="pkg-row-actions">
                        <a href="/villa-glamping-kemuning/" class="btn btn-outline">Detail</a>
                        <a href="<?= Helpers::generateWaLink('Paket Menginap Villa Kemuning 2D1N') ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ============================================================
     Section 04 — B2B proposal
     ============================================================ -->
<section class="section-block">
    <div class="container">
        <div class="b2b-banner">
            <div>
                <div class="hero-eyebrow" style="margin-bottom:20px;">04 / Untuk panitia acara</div>
                <h2 style="font-size:clamp(1.6rem, 2.8vw, 2.4rem); line-height:1.06; margin-bottom:14px; max-width:22ch;">
                    Butuh surat penawaran berkop CV untuk pengajuan anggaran?
                </h2>
                <p style="font-size:15px; color:var(--on-pine-muted); line-height:1.7; max-width:56ch;">
                    Kami dikelola <strong style="color:var(--on-pine);">CV Jelajah Kemuning</strong> dengan Perizinan Berusaha Berbasis Risiko (NIB: 0705250012458). Buat dan unduh proposal PDF resmi lengkap dengan rincian fasilitas dan estimasi anggaran rombongan secara instan.
                </p>
                <div class="b2b-points">
                    <div class="b2b-point">Kop resmi CV &amp; nomor NIB</div>
                    <div class="b2b-point">Rincian biaya transparan</div>
                    <div class="b2b-point">Siap untuk lampiran SPJ</div>
                </div>
            </div>
            <div class="b2b-panel">
                <div class="overline" style="color:rgba(244,241,234,0.55); margin-bottom:8px;">Generator proposal otomatis</div>
                <div style="font-size:1.2rem; font-weight:700; letter-spacing:-0.02em; margin-bottom:20px; color:var(--on-pine);">Cetak proposal dalam 10 detik</div>
                <a href="/proposal/" class="btn btn-accent" style="width:100%; margin-bottom:10px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>Buat proposal PDF</span>
                </a>
                <a href="/cari-paket/" class="btn btn-outline" style="width:100%; border-color:var(--rule-dark); color:var(--on-pine);">Atau hitung budget</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     Section 05 — Gallery
     ============================================================ -->
<section class="section-block">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">05 / Dokumentasi lapangan</div>
                <h2 class="section-title">Foto dari trip yang benar-benar jalan</h2>
                <p class="section-desc">Dokumentasi asli Jeep Adventure, river tubing, dan outbound gathering bersama rombongan yang kami antar.</p>
            </div>
            <a href="/galeri/" class="btn-ghost">
                Semua foto
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/jeep-short-2.webp" alt="Jeep adventure susur sungai Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Offroad susur sungai &amp; lumpur</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/jeep-long-1.webp" alt="Konvoi jeep di kebun teh Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Konvoi kebun teh</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/villa-glamping.webp" alt="Gathering dan outbound rombongan kantor di Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Gathering rombongan</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/tubing-senatah.webp" alt="River tubing Kali Senatah" loading="lazy" decoding="async">
                <div class="gallery-caption">Tubing Kali Senatah</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/jeep-long-2.webp" alt="Trek air dan lumpur jeep 4x4 Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Trek air &amp; lumpur 4×4</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/outbound-2.webp" alt="Fun games team building Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Fun games</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/tubing-guci.webp" alt="Jeram river tubing Kemuning" loading="lazy" decoding="async">
                <div class="gallery-caption">Jeram alami</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/uploads/katalog/jeep-hemat-a.webp" alt="Spot foto kebun teh Jimber" loading="lazy" decoding="async">
                <div class="gallery-caption">Kebun teh Jimber</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     Section 06 — Testimonials
     ============================================================ -->
<section class="section-block">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">06 / Ulasan pelanggan</div>
                <h2 class="section-title">Kata mereka setelah turun dari jeep</h2>
                <p class="section-desc">Ratusan rombongan keluarga, komunitas, dan instansi luar kota sudah mempercayakan kegiatannya ke tim kami.</p>
            </div>
        </div>

        <div class="testi-grid">
            <?php $testiIndex = 0; foreach ($testimonials as $t): $testiIndex++; ?>
            <div class="testi-card<?= $testiIndex === 1 ? ' is-lead' : '' ?>">
                <div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-quote">“<?= htmlspecialchars($t['comment']) ?>”</p>
                </div>
                <div class="testi-author">
                    <div class="testi-avatar"><?= strtoupper(substr($t['name'], 0, 1)) ?></div>
                    <div>
                        <span class="testi-name"><?= htmlspecialchars($t['name']) ?></span>
                        <span class="testi-trip"><?= htmlspecialchars($t['trip']) ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     Section 07 — FAQ
     ============================================================ -->
<section class="section-block">
    <div class="container" style="max-width:900px;">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">07 / Tanya jawab</div>
                <h2 class="section-title">Yang biasanya ditanyakan sebelum booking</h2>
                <p class="section-desc">Reservasi, titik kumpul, asuransi, dan penyesuaian jadwal trip.</p>
            </div>
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
