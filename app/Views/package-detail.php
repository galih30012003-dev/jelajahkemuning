<!-- Category Hero Banner -->
<div class="hero-wrapper" style="padding:56px 0;">
    <div class="container" style="text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; margin-bottom:14px;">
            <span class="badge-glass">🛡️ CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            <span class="badge-glass">✓ Asuransi Resmi & Free Dokumentasi</span>
        </div>
        <h1 style="font-size:clamp(2rem, 3.8vw, 3rem); font-weight:900; margin:10px 0 12px; letter-spacing:-0.02em;">
            <?= Helpers::sanitize($category['name']) ?>
        </h1>
        <p style="max-width:720px; margin:0 auto 24px; opacity:0.92; font-size:15px; line-height:1.7;">
            <?= Helpers::sanitize($category['description'] ?? 'Penyedia paket wisata resmi Karanganyar dengan rute terbaik dan fasilitas terlengkap.') ?>
        </p>
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn-accent" style="font-size:15px; padding:12px 26px;">
                📲 Konsultasi WhatsApp Cepat
            </a>
            <a href="/proposal/" class="btn-white" style="font-size:15px; padding:12px 22px;">
                📄 Unduh Proposal PDF Resmi
            </a>
        </div>
    </div>
</div>

<div class="container" style="padding:60px 20px;">
    <div style="text-align:center; max-width:720px; margin:0 auto 40px;">
        <span class="badge-trust">PILIHAN RESMI & HARGA TRANSPARAN</span>
        <h2 style="font-size:2.2rem; font-weight:900; color:var(--color-primary); margin:12px 0 6px;">
            Pilihan Lengkap Paket <?= Helpers::sanitize($category['name']) ?>
        </h2>
        <p style="color:var(--text-muted); font-size:14.5px;">Pilih rute, durasi, dan fasilitas yang sesuai dengan rombongan kamu.</p>
    </div>

    <div class="packages-grid">
        <?php foreach ($packages as $pkg): ?>
        <div class="card-package">
            <div>
                <?php if (!empty($pkg['thumbnail'])): ?>
                <div class="card-thumb-wrap">
                    <img src="<?= htmlspecialchars($pkg['thumbnail']) ?>" alt="<?= Helpers::sanitize($pkg['name']) ?>" loading="lazy">
                    <?php if (!empty($pkg['badge'])): ?>
                    <span class="card-thumb-badge"><?= Helpers::sanitize($pkg['badge']) ?></span>
                    <?php endif; ?>
                    <?php if (!empty($pkg['duration'])): ?>
                    <span class="card-thumb-duration">⏱️ <?= Helpers::sanitize($pkg['duration']) ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="card-body">
                    <div>
                        <?php if (empty($pkg['thumbnail'])): ?>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                            <?php if (!empty($pkg['badge'])): ?>
                            <span class="card-thumb-badge" style="position:static;"><?= Helpers::sanitize($pkg['badge']) ?></span>
                            <?php endif; ?>
                            <?php if (!empty($pkg['duration'])): ?>
                            <span style="font-size:12px; font-weight:700; color:var(--text-muted);">⏱️ <?= Helpers::sanitize($pkg['duration']) ?></span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <h3 class="card-title"><?= Helpers::sanitize($pkg['name']) ?></h3>

                        <div class="card-price-wrap">
                            <span class="card-price"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                            <span class="card-price-unit">/ <?= $pkg['price_type'] === 'per_armada' ? 'Armada (Maks 4 Orang)' : 'Orang' ?></span>
                            <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                            <div style="font-size:11.5px; color:var(--color-accent); font-weight:800; margin-top:3px;">
                                NB : MINIMAL <?= $pkg['min_participants'] ?> PESERTA
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($pkg['itinerary'])): ?>
                        <div class="itinerary-box">
                            <div class="itinerary-title">📍 Rute Perjalanan:</div>
                            <div class="itinerary-text"><?= nl2br(Helpers::sanitize($pkg['itinerary'])) ?></div>
                        </div>
                        <?php endif; ?>

                        <h4 style="font-size:13px; font-weight:800; color:#374151; margin:14px 0 8px; border-bottom:1px solid var(--border); padding-bottom:6px;">Fasilitas Termasuk:</h4>
                        <ul class="facility-list">
                            <?php
                            $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
                            if (empty($incList)): ?>
                                <li><span class="check">✓</span> Fasilitas lengkap standar CV Jelajah Kemuning.</li>
                            <?php else:
                                foreach ($incList as $inc): ?>
                                <li><span class="check">✓</span> <span><?= Helpers::sanitize($inc) ?></span></li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>

                    <div style="margin-top:20px;">
                        <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center; font-size:15px;">
                            📲 Booking Paket via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- FAQ & Info Section -->
<div style="background:#F8FAF8; border-top:1px solid var(--border); padding:64px 0;">
    <div class="container" style="max-width:820px;">
        <div style="text-align:center; margin-bottom:32px;">
            <span class="badge-trust">INFORMASI & FAQ</span>
            <h3 style="font-size:1.85rem; font-weight:900; color:var(--color-primary); margin-top:8px;">
                Pertanyaan Seputar <?= Helpers::sanitize($category['name']) ?>
            </h3>
        </div>

        <div style="display:flex; flex-direction:column; gap:12px;">
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:18px 22px; box-shadow:var(--shadow-low);">
                <div style="font-weight:800; color:var(--color-primary); font-size:15px; margin-bottom:4px;">Bisa custom rute dan jam keberangkatan?</div>
                <div style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Bisa banget! Jam dan rute trip sangat fleksibel, silakan koordinasikan dengan admin via WhatsApp sesuai jadwal rombongan kamu.</div>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:18px 22px; box-shadow:var(--shadow-low);">
                <div style="font-weight:800; color:var(--color-primary); font-size:15px; margin-bottom:4px;">Apakah sudah termasuk asuransi dan dokumentasi?</div>
                <div style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Seluruh paket resmi kami sudah include asuransi wisata dan bonus gratis dokumentasi foto/video untuk rombongan yang di-share lewat link Google Drive.</div>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:18px 22px; box-shadow:var(--shadow-low);">
                <div style="font-weight:800; color:var(--color-primary); font-size:15px; margin-bottom:4px;">Di mana titik kumpul meeting pointnya?</div>
                <div style="font-size:13.5px; color:var(--text-muted); line-height:1.6;">Meeting point utama di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar dengan area parkir bus luas, toilet bersih, dan aula transit gratis.</div>
            </div>
        </div>
    </div>
</div>
