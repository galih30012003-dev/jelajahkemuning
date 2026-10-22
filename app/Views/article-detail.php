<div class="container" style="max-width:760px; padding:48px 16px;">
    <nav style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">
        <a href="/">Beranda</a> &gt; <a href="/artikel/">Artikel</a> &gt; <span><?= Helpers::sanitize($article['title']) ?></span>
    </nav>
    <h1 style="font-size:clamp(1.75rem, 3.2vw, 2.3rem); font-weight:800; line-height:1.3; color:#111827; margin-bottom:12px;">
        <?= Helpers::sanitize($article['title']) ?>
    </h1>
    <div style="font-size:13px; color:var(--text-muted); margin-bottom:24px; padding-bottom:14px; border-bottom:1px solid var(--border);">
        Ditulis oleh Tim Jelajah Kemuning • <?= date('d F Y', strtotime($article['published_at'])) ?> • Dilihat <?= $article['views'] ?> kali
    </div>

    <div style="font-size:15.5px; line-height:1.8; color:#374151;">
        <?= $article['content'] ?>
    </div>

    <div style="background:#F9FAFB; border:1px solid var(--border); padding:24px; border-radius:var(--radius-sm); margin-top:40px; text-align:center;">
        <h3 style="font-size:1.15rem; font-weight:800; color:#111827; margin-bottom:6px;">Konsultasi Jadwal Trip Kemuning</h3>
        <p style="font-size:13.5px; color:var(--text-muted); margin-bottom:16px;">Rencanakan perjalanan Jeep Adventure, Outbound, atau River Tubing rombongan kamu bersama admin kami.</p>
        <a href="<?= Helpers::generateWaLink('Artikel: ' . $article['title']) ?>" class="btn-wa">Chat WhatsApp Admin</a>
    </div>
</div>
