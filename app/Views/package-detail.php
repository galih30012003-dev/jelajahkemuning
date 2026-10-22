<!-- Category Hero -->
<section class="hero-clean">
    <div class="container" style="text-align:center; max-width:800px;">
        <div style="display:flex; justify-content:center; gap:8px; flex-wrap:wrap; margin-bottom:12px;">
            <span class="badge-trust">Resmi CV Jelajah Kemuning</span>
            <span class="badge-trust">NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
            <span class="badge-trust">Tersedia Asuransi</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            <?= Helpers::sanitize($category['name']) ?>
        </h1>
        <p class="hero-p" style="margin-bottom:24px;">
            <?= Helpers::sanitize($category['description'] ?? 'Penyedia paket wisata resmi Karanganyar dengan rute terbaik dan fasilitas terlengkap.') ?>
        </p>
        <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn-wa">
                Chat WhatsApp Admin
            </a>
            <a href="/proposal/" class="btn-outline">
                Unduh Proposal PDF
            </a>
        </div>
    </div>
</section>

<!-- Packages Grid -->
<section style="padding:56px 0; background:#F9FAF9; border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="max-width:760px; margin-bottom:32px;">
            <h2 class="section-title">Pilihan Paket <?= Helpers::sanitize($category['name']) ?></h2>
            <p class="section-desc" style="margin-bottom:0;">Pilih rute, durasi, dan fasilitas yang sesuai dengan rombongan kamu.</p>
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
                        <span class="card-thumb-duration"><?= Helpers::sanitize($pkg['duration']) ?></span>
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
                                <span style="font-size:12px; font-weight:700; color:var(--text-muted);"><?= Helpers::sanitize($pkg['duration']) ?></span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <h3 class="card-title"><?= Helpers::sanitize($pkg['name']) ?></h3>

                            <div class="card-price-row">
                                <span class="card-price"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                                <span class="card-price-unit">/ <?= $pkg['price_type'] === 'per_armada' ? 'Armada (Maks 4 Orang)' : 'Orang' ?></span>
                                <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                                <div class="card-min-pax">
                                    NB : MINIMAL <?= $pkg['min_participants'] ?> PESERTA
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($pkg['itinerary'])): ?>
                            <div class="itinerary-box">
                                <strong>Rute Perjalanan:</strong>
                                <?= nl2br(Helpers::sanitize($pkg['itinerary'])) ?>
                            </div>
                            <?php endif; ?>

                            <div style="font-size:13px; font-weight:700; color:#111827; margin:12px 0 8px; border-bottom:1px solid var(--border); padding-bottom:4px;">Fasilitas Termasuk:</div>
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

                        <div style="margin-top:16px;">
                            <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-wa" style="width:100%; justify-content:center;">
                                Pesan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section style="padding:56px 0; background:#FFFFFF;">
    <div class="container" style="max-width:820px;">
        <div style="margin-bottom:24px;">
            <h2 class="section-title">Informasi & Pertanyaan Seputar <?= Helpers::sanitize($category['name']) ?></h2>
        </div>

        <div class="faq-box">
            <div class="faq-question">
                <span>Bisa custom rute dan jam keberangkatan?</span>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer hidden">
                Bisa. Jam dan rute trip fleksibel sesuai kebutuhan rombongan. Silakan konsultasikan dengan admin via WhatsApp.
            </div>
        </div>
        <div class="faq-box">
            <div class="faq-question">
                <span>Apakah sudah termasuk asuransi dan dokumentasi?</span>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer hidden">
                Ya, seluruh paket resmi kami sudah termasuk asuransi keselamatan dan bonus dokumentasi foto untuk rombongan.
            </div>
        </div>
        <div class="faq-box">
            <div class="faq-question">
                <span>Di mana titik kumpul meeting pointnya?</span>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer hidden">
                Meeting point utama di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar dengan area parkir bus luas, toilet bersih, dan aula transit gratis.
            </div>
        </div>
    </div>
</section>
