<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: #fff; padding: 70px 0 60px;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:40px; align-items:center;">
        <div>
            <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.15); padding:6px 14px; border-radius:99px; font-size:12px; margin-bottom:16px;">
                <span>✓ Resmi CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?> • Asuransi Resmi</span>
            </div>
            <h1 style="font-size:2.5rem; font-weight:800; line-height:1.2; margin-bottom:16px;">Serunya Liburan Jeep Offroad, Outbound & Tubing di Kemuning</h1>
            <p style="font-size:1.1rem; opacity:0.9; margin-bottom:24px;">Partner terpercaya trip wisata keluarga, komunitas, dan gathering kantor di Karanganyar dengan pemandu lokal ramah & berpengalaman.</p>
            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="font-size:16px;">📲 Booking Cepat via WA</a>
                <a href="/cari-paket/" class="btn-primary" style="background:#fff; color:var(--primary); font-size:16px;">✨ Kuis Pilih Paket</a>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.2); padding:24px; border-radius:16px; backdrop-filter:blur(10px);">
            <h3 style="font-size:18px; font-weight:700; margin-bottom:12px;">Kenapa Ratusan Rombongan Memilih Kami?</h3>
            <ul style="list-style:none; font-size:14px; display:flex; flex-direction:column; gap:10px;">
                <li>🏛️ <strong>Legalitas Jelas:</strong> Dikelola CV resmi berizin berusaha NIB lengkap.</li>
                <li>🛡️ <strong>Aman & Nyaman:</strong> Seluruh paket didukung asuransi trip resmi.</li>
                <li>📸 <strong>Gratis Dokumentasi:</strong> Dokumentasi foto & video seru untuk rombongan.</li>
                <li>🍱 <strong>Paket Lengkap:</strong> Termasuk aula, makan siang prasmanan, & snack.</li>
            </ul>
            <div style="margin-top:20px;">
                <a href="/proposal/" class="btn-accent" style="width:100%; justify-content:center; background:#fff; color:var(--accent);">
                    📄 Download Surat Penawaran / Proposal PDF
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Category Navigation -->
<section class="container" style="padding:48px 16px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:700; margin-bottom:24px;">Pilihan Kategori Wisata Kemuning</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px;">
        <?php foreach ($categories as $cat): ?>
        <a href="/<?= $cat['slug'] ?>/" class="card-package" style="padding:20px; text-align:center;">
            <div style="font-size:32px; margin-bottom:8px;">⛰️</div>
            <h3 style="font-size:16px; font-weight:700; color:var(--primary);"><?= Helpers::sanitize($cat['name']) ?></h3>
            <p style="font-size:12px; color:var(--text-muted); margin-top:4px;">Lihat rincian paket & harga →</p>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Top Packages Section -->
<section style="background:#fff; padding:60px 0; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <h2 style="text-align:center; font-size:1.85rem; font-weight:800;">Paket Terlaris Rombongan & Keluarga</h2>
        <p style="text-align:center; color:var(--text-muted); margin-bottom:36px;">Paket favorit dengan fasilitas terlengkap dan harga transparan.</p>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
            <?php foreach ($topPackages as $pkg): ?>
            <div class="card-package" style="padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <?php if (!empty($pkg['badge'])): ?>
                    <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 8px; border-radius:4px;"><?= Helpers::sanitize($pkg['badge']) ?></span>
                    <?php endif; ?>
                    <h3 style="font-size:1.25rem; font-weight:700; margin-top:8px;"><?= Helpers::sanitize($pkg['name']) ?></h3>
                    <div style="margin:10px 0;">
                        <span style="font-size:1.6rem; font-weight:800; color:var(--primary);"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                        <span style="font-size:12px; color:var(--text-muted);">/ <?= $pkg['price_type'] === 'per_armada' ? 'Jeep' : 'Orang' ?></span>
                    </div>
                    <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                    <p style="font-size:12px; color:var(--accent); font-weight:600;">* Minimal <?= $pkg['min_participants'] ?> peserta</p>
                    <?php endif; ?>
                </div>
                <div style="margin-top:20px;">
                    <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center;">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="container" style="padding:60px 16px; max-width:800px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:800; margin-bottom:32px;">Pertanyaan yang Sering Diajukan (FAQ)</h2>
    <div style="display:flex; flex-direction:column; gap:12px;">
        <?php foreach ($faqs as $faq): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:8px; overflow:hidden;">
            <div class="faq-question" style="padding:16px 20px; font-weight:700; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                <span><?= Helpers::sanitize($faq['q']) ?></span>
                <span class="faq-icon" style="font-size:18px;">+</span>
            </div>
            <div class="faq-answer hidden" style="padding:0 20px 16px; color:var(--text-muted); font-size:14px; border-top:1px solid #F3F4F6;">
                <?= Helpers::sanitize($faq['a']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
