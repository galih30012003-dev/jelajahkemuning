<!-- ============================================================
     Page head — paper
     ============================================================ -->
<section class="page-head">
    <div class="container">
        <div class="page-head-inner">
            <div class="section-eyebrow">Panduan &amp; informasi wisata</div>
            <h1>Artikel &amp; panduan<br>wisata Kemuning.</h1>
            <p class="lede">
                Tips perjalanan, rekomendasi rute offroad, kuliner, dan panduan wisata Kemuning Karanganyar — ditulis dari pengalaman operator lapangan.
            </p>
            <div class="page-meta">
                <span><?= count($articles) ?> tulisan</span>
                <span>Diperbarui berkala</span>
                <span>Oleh tim Jelajah Kemuning</span>
            </div>
        </div>
    </div>
</section>

<div class="page-body">
    <div class="container">
        <?php if (empty($articles)): ?>
        <div class="empty-state">Belum ada artikel yang dipublikasikan.</div>
        <?php else: ?>
        <div class="article-list">
            <?php $artIndex = 0; foreach ($articles as $art): $artIndex++; ?>
            <article class="article-row">
                <div class="article-row-meta">
                    <span><?= date('d.m.Y', strtotime($art['published_at'])) ?></span>
                    <span>Artikel <?= str_pad((string)$artIndex, 2, '0', STR_PAD_LEFT) ?></span>
                </div>
                <div class="article-row-body">
                    <h2 class="article-row-title">
                        <a href="/artikel/<?= $art['slug'] ?>/"><?= Helpers::sanitize($art['title']) ?></a>
                    </h2>
                    <p class="article-row-excerpt"><?= Helpers::sanitize(substr(strip_tags($art['content']), 0, 180)) ?>…</p>
                    <a href="/artikel/<?= $art['slug'] ?>/" class="btn-ghost">
                        Baca selengkapnya
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
