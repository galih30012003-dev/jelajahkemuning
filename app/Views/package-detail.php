<!-- Category Hero -->
<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:820px;">
        <div class="hero-eyebrow">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Resmi CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?> • Berasuransi</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:14px;">
            <?= Helpers::sanitize($category['name']) ?>
        </h1>
        <p class="hero-lead" style="margin:0 auto 28px; max-width:680px;">
            <?= Helpers::sanitize($category['description'] ?? 'Penyedia paket wisata resmi Karanganyar dengan rute terbaik dan fasilitas terlengkap.') ?>
        </p>
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn btn-accent">
                <span>Konsultasi & Booking via WA</span>
            </a>
            <a href="/proposal/" class="btn btn-light">
                <span>Unduh Proposal Kantor (PDF)</span>
            </a>
        </div>
    </div>
</section>

<!-- Packages Grid -->
<section class="section-block">
    <div class="container">
        <div class="section-header-center">
            <span class="section-eyebrow">Daftar Paket & Rincian Rute</span>
            <h2 class="section-title">Pilihan Paket <?= Helpers::sanitize($category['name']) ?></h2>
            <p class="section-desc">Pilih durasi, rute perjalanan, dan fasilitas yang paling sesuai dengan rombongan kamu.</p>
        </div>

        <div class="packages-grid">
            <?php foreach ($packages as $pkg):
                $thumb = $pkg['thumbnail'] ?? '';
                $isBanner = str_contains($thumb, 'foto-paket-') || str_contains($thumb, 'paket-combo-');
            ?>
            <div class="card-package <?= ($pkg['badge'] ?? '') === 'TERLARIS' ? 'is-featured' : '' ?>">
                <div>
                    <?php if (!empty($thumb)): ?>
                    <div class="card-thumb-wrap <?= $isBanner ? '' : 'ratio-16-9' ?>">
                        <img src="<?= htmlspecialchars($thumb) ?>" alt="<?= Helpers::sanitize($pkg['name']) ?>" loading="lazy">
                    </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div>
                            <div class="card-meta-top">
                                <?php if (!empty($pkg['badge'])): ?>
                                <span class="pill-badge <?= ($pkg['badge'] === 'TERLARIS') ? 'accent' : '' ?>"><?= Helpers::sanitize($pkg['badge']) ?></span>
                                <?php else: ?>
                                <span class="pill-badge">Tersedia</span>
                                <?php endif; ?>

                                <?php if (!empty($pkg['duration'])): ?>
                                <span class="card-duration">Durasi ± <?= Helpers::sanitize($pkg['duration']) ?></span>
                                <?php endif; ?>
                            </div>

                            <h3 class="card-title"><?= Helpers::sanitize($pkg['name']) ?></h3>

                            <div class="card-price-box">
                                <div>
                                    <span class="card-price-label">Harga Paket</span>
                                    <span class="card-price"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                                    <span class="card-price-unit">/ <?= $pkg['price_type'] === 'per_armada' ? 'Jeep' : 'Orang' ?></span>
                                </div>
                                <?php if ($pkg['price_type'] === 'per_armada'): ?>
                                <span class="card-min-pax">Maks. 4 Orang</span>
                                <?php elseif (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                                <span class="card-min-pax">Min. <?= $pkg['min_participants'] ?> Peserta</span>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($pkg['itinerary'])): ?>
                            <div class="itinerary-box">
                                <strong>Rute Perjalanan</strong>
                                <?= nl2br(Helpers::sanitize($pkg['itinerary'])) ?>
                            </div>
                            <?php endif; ?>

                            <div style="font-size:12.5px; font-weight:800; text-transform:uppercase; letter-spacing:0.04em; color:var(--text-muted); margin:12px 0 8px;">Fasilitas Termasuk:</div>
                            <ul class="facility-list">
                                <?php
                                $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
                                if (empty($incList)): ?>
                                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Fasilitas lengkap standar CV Jelajah Kemuning.</span></li>
                                <?php else:
                                    foreach ($incList as $inc): ?>
                                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><?= Helpers::sanitize($inc) ?></span></li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </div>

                        <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn btn-primary" style="width:100%;">
                            <span>Booking Paket Ini via WA</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-block" style="background:#FFFFFF; border-top:1px solid var(--border);">
    <div class="container" style="max-width:820px;">
        <div class="section-header-center" style="margin-bottom:28px;">
            <span class="section-eyebrow">Informasi Penting</span>
            <h2 class="section-title">Tanya Jawab Seputar <?= Helpers::sanitize($category['name']) ?></h2>
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
