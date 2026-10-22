<section class="page-head">
    <div class="container">
        <div class="page-head-inner">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="/">Beranda</a>
                <span class="sep">/</span>
                <a href="/artikel/">Artikel</a>
                <span class="sep">/</span>
                <span class="is-current"><?= Helpers::sanitize($article['title']) ?></span>
            </nav>

            <h1><?= Helpers::sanitize($article['title']) ?></h1>

            <div class="page-meta">
                <span>Tim Jelajah Kemuning</span>
                <span><?= date('d.m.Y', strtotime($article['published_at'])) ?></span>
                <span><?= (int)$article['views'] ?> kali dibaca</span>
            </div>
        </div>
    </div>
</section>

<div class="page-body">
    <div class="container">
        <div style="max-width:800px;">
        <div class="prose">
            <?= $article['content'] ?>
        </div>

        <div class="article-foot">
            <a href="/artikel/" class="btn-ghost">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Semua artikel
            </a>
            <a href="<?= Helpers::generateWaLink('Artikel: ' . $article['title']) ?>" class="btn btn-accent">
                <span>Tanya admin soal trip</span>
            </a>
        </div>

        <div class="b2b-banner" style="margin-top:48px;">
            <div>
                <div class="hero-eyebrow" style="margin-bottom:18px;">Rencanakan perjalanan</div>
                <h2 style="font-size:clamp(1.4rem,2.4vw,1.9rem); line-height:1.1; margin-bottom:12px; max-width:22ch;">
                    Konsultasi jadwal trip Kemuning
                </h2>
                <p style="font-size:14.5px; color:var(--on-pine-muted); line-height:1.7; max-width:52ch;">
                    Rencanakan perjalanan Jeep Adventure, outbound, atau river tubing rombongan kamu bersama admin kami.
                </p>
            </div>
            <div class="b2b-panel" style="text-align:left;">
                <div class="overline" style="color:rgba(244,241,234,0.55); margin-bottom:8px;">Reservasi langsung</div>
                <div style="font-size:1.1rem; font-weight:700; letter-spacing:-0.02em; margin-bottom:18px; color:var(--on-pine);">0851-7100-1566</div>
                <a href="<?= Helpers::generateWaLink('Artikel: ' . $article['title']) ?>" class="btn btn-accent" style="width:100%;">Chat WhatsApp admin</a>
            </div>
        </div>
        </div>
    </div>
</div>
