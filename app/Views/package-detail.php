<!-- ============================================================
     Category hero — compact documentary band
     ============================================================ -->
<section class="hero-section is-compact">
    <div class="container hero-inner">
        <div>
            <div class="hero-eyebrow">Katalog · <?= count($packages) ?> paket tersedia</div>

            <h1 class="hero-h1"><?= Helpers::sanitize($category['name']) ?></h1>

            <p class="hero-lead">
                <?= Helpers::sanitize($category['description'] ?? 'Penyedia paket wisata resmi Karanganyar dengan rute terbaik dan fasilitas terlengkap.') ?>
            </p>

            <div class="hero-cta-group">
                <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn btn-accent">
                    <span>Konsultasi &amp; booking</span>
                </a>
                <a href="/proposal/" class="hero-link">
                    Proposal kantor (PDF)
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <div class="hero-stats-row" style="margin-top:34px;">
                <div class="hero-stat">
                    <div class="hero-stat-num"><?= count($packages) ?></div>
                    <div class="hero-stat-label">Pilihan paket</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">NIB</div>
                    <div class="hero-stat-label">Badan usaha resmi</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">Asuransi</div>
                    <div class="hero-stat-label">Tiap rombongan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     Package entries — ruled editorial list
     ============================================================ -->
<section class="page-body no-rule">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">Daftar paket &amp; rincian rute</div>
                <h2 class="section-title">Pilihan paket <?= Helpers::sanitize($category['name']) ?></h2>
                <p class="section-desc">Pilih durasi, rute perjalanan, dan fasilitas yang paling sesuai dengan rombongan kamu.</p>
            </div>
        </div>

        <div class="packages-grid">
            <?php $pkgIndex = 0; foreach ($packages as $pkg):
                $pkgIndex++;
                $thumb = $pkg['thumbnail'] ?? '';
                $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
            ?>
            <article class="detail-entry">
                <div class="detail-head">
                    <span class="detail-index"><?= str_pad((string)$pkgIndex, 2, '0', STR_PAD_LEFT) ?> / <?= $pkg['price_type'] === 'per_armada' ? 'PER JEEP' : 'PER ORANG' ?></span>
                    <?php if (!empty($pkg['badge'])): ?>
                    <span class="detail-index" style="color:var(--accent);"><?= Helpers::sanitize($pkg['badge']) ?></span>
                    <?php endif; ?>
                    <?php if (!empty($pkg['duration'])): ?>
                    <span class="detail-index">± <?= Helpers::sanitize($pkg['duration']) ?></span>
                    <?php endif; ?>
                </div>

                <h2 class="detail-title"><?= Helpers::sanitize($pkg['name']) ?></h2>

                <?php if (!empty($thumb)): ?>
                <div class="detail-media">
                    <img src="<?= htmlspecialchars($thumb) ?>" alt="<?= Helpers::sanitize($pkg['name']) ?>" loading="lazy" decoding="async">
                </div>
                <?php endif; ?>

                <div class="detail-price-row">
                    <div class="pkg-row-price">
                        <?= Helpers::formatRupiah($pkg['price']) ?>
                        <small>/ <?= $pkg['price_type'] === 'per_armada' ? 'jeep' : 'orang' ?></small>
                    </div>
                    <div class="pkg-row-facts">
                        <?php if ($pkg['price_type'] === 'per_armada'): ?>
                        <span>Maks 4 orang per jeep</span>
                        <?php elseif (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                        <span>Min. <?= (int)$pkg['min_participants'] ?> peserta</span>
                        <?php endif; ?>
                        <span>Include asuransi</span>
                    </div>
                </div>

                <div class="detail-cols">
                    <div>
                        <?php if (!empty($pkg['itinerary'])): ?>
                        <div class="itinerary-box">
                            <strong>Rute perjalanan</strong>
                            <?= nl2br(Helpers::sanitize(str_replace(['\r\n', '\r', '\n'], "\n", $pkg['itinerary']))) ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <div class="overline" style="color:var(--ink-faint); margin-bottom:12px;">Fasilitas termasuk</div>
                        <ul class="facility-list">
                            <?php if (empty($incList)): ?>
                            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Fasilitas lengkap standar CV Jelajah Kemuning.</span></li>
                            <?php else: foreach ($incList as $inc): ?>
                            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span><?= Helpers::sanitize($inc) ?></span></li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="detail-foot">
                    <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn btn-primary">
                        <span>Booking paket ini</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="/proposal/" class="btn btn-outline">Masukkan ke proposal</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     FAQ
     ============================================================ -->
<section class="section-block">
    <div class="container" style="max-width:860px;">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">Informasi penting</div>
                <h2 class="section-title">Tanya jawab seputar <?= Helpers::sanitize($category['name']) ?></h2>
            </div>
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
