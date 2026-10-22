<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:740px;">
        <div class="hero-eyebrow">
            <span>Panduan & Informasi Wisata</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            Artikel & Panduan Wisata Kemuning
        </h1>
        <p class="hero-lead" style="margin:0 auto;">
            Tips perjalanan, rekomendasi rute offroad, kuliner, dan panduan wisata Kemuning Karanganyar.
        </p>
    </div>
</section>

<div class="container" style="padding:56px 24px;">
    <div class="packages-grid">
        <?php if (empty($articles)): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:32px; text-align:center; grid-column:1/-1; color:var(--text-muted);">
            Belum ada artikel yang dipublikasikan.
        </div>
        <?php else: foreach ($articles as $art): ?>
        <article class="card-package" style="padding:24px;">
            <div>
                <div style="font-size:12px; font-weight:600; color:var(--text-muted); margin-bottom:8px;"><?= date('d F Y', strtotime($art['published_at'])) ?></div>
                <h2 class="card-title">
                    <a href="/artikel/<?= $art['slug'] ?>/"><?= Helpers::sanitize($art['title']) ?></a>
                </h2>
                <p style="color:var(--text-muted); font-size:14px; margin-bottom:18px; line-height:1.65;"><?= substr(strip_tags($art['content']), 0, 140) ?>...</p>
            </div>
            <a href="/artikel/<?= $art['slug'] ?>/" class="btn btn-outline" style="width:100%;">Baca Selengkapnya →</a>
        </article>
        <?php endforeach; endif; ?>
    </div>
</div>
