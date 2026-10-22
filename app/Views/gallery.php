<!-- ============================================================
     Gallery hero — compact documentary band
     ============================================================ -->
<section class="hero-section is-compact">
    <div class="container hero-inner">
        <div>
            <div class="hero-eyebrow">Dokumentasi asli lapangan</div>

            <h1 class="hero-h1">Galeri trip yang<br>benar-benar jalan.</h1>

            <p class="hero-lead">
                Koleksi foto asli keseruan rombongan kantor, dinas, komunitas, dan keluarga yang telah berlibur bersama CV Jelajah Kemuning. Klik foto untuk memperbesar.
            </p>

            <div class="hero-stats-row" style="margin-top:34px;">
                <div class="hero-stat">
                    <div class="hero-stat-num"><?= count($galleries) ?></div>
                    <div class="hero-stat-label">Foto lapangan</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">4 spot</div>
                    <div class="hero-stat-label">Jeep · tubing · outbound · villa</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">Asli</div>
                    <div class="hero-stat-label">Tanpa foto stok</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="page-body no-rule">
    <div class="container">
        <?php if (empty($galleries)): ?>
        <div class="empty-state">Foto dokumentasi terbaru sedang disinkronkan.</div>
        <?php else: ?>
        <div class="gallery-grid">
            <?php $galIndex = 0; foreach ($galleries as $gal): $galIndex++; ?>
            <div class="gallery-item">
                <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" loading="<?= $galIndex <= 4 ? 'eager' : 'lazy' ?>" decoding="async">
                <div class="gallery-caption"><?= htmlspecialchars($gal['title']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="page-cta">
            <div>
                <div class="section-eyebrow" style="margin-bottom:12px;">Mau trip berikutnya jadi bagian galeri?</div>
                <h2 class="section-title" style="font-size:clamp(1.4rem,2.4vw,1.9rem); margin-bottom:0;">Rombongan kamu bisa ikut di sini.</h2>
            </div>
            <div class="page-cta-actions">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn btn-accent">
                    <span>Chat admin</span>
                </a>
                <a href="/cari-paket/" class="btn btn-outline">Cari paket dulu</a>
            </div>
        </div>
    </div>
</div>
