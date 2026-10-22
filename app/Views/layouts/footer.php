<footer style="background:#0F3F28; color:#E5E7EB; padding:48px 0 24px; margin-top:64px;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:32px;">
        <div>
            <h3 style="color:#fff; font-size:1.25rem; font-weight:700; margin-bottom:12px;">CV Jelajah Kemuning</h3>
            <p style="font-size:14px; opacity:0.85; line-height:1.6;">Penyedia paket wisata resmi Karanganyar: Jeep Adventure, River Tubing, Gathering/Outbound, dan Villa. Dikelola CV resmi berizin berusaha (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>).</p>
            <div style="margin-top:16px; display:flex; gap:8px; flex-wrap:wrap;">
                <span class="badge-trust">✓ Berizin Resmi NIB</span>
                <span class="badge-trust">✓ Asuransi Terjamin</span>
            </div>
        </div>
        <div>
            <h4 style="color:#fff; font-size:1rem; font-weight:600; margin-bottom:12px;">Paket Wisata</h4>
            <ul style="list-style:none; font-size:14px; display:flex; flex-direction:column; gap:8px;">
                <li><a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a></li>
                <li><a href="/river-tubing-kemuning/">River Tubing Kemuning</a></li>
                <li><a href="/paket-outbound-kemuning/">Paket Outbound Kemuning</a></li>
                <li><a href="/villa-glamping-kemuning/">Sewa Villa & Glamping</a></li>
                <li><a href="/paket-hemat-jeep-kemuning/">Paket Hemat Rombongan</a></li>
            </ul>
        </div>
        <div>
            <h4 style="color:#fff; font-size:1rem; font-weight:600; margin-bottom:12px;">Alamat & Kontak</h4>
            <p style="font-size:14px; opacity:0.85;">Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793</p>
            <p style="font-size:14px; margin-top:8px;">WhatsApp: <strong><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '081234567890') ?></strong></p>
        </div>
    </div>
    <div class="container" style="margin-top:40px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.1); text-align:center; font-size:13px; opacity:0.75;">
        &copy; <?= date('Y') ?> JelajahKemuning.com. All rights reserved.
    </div>
</footer>
<?php require __DIR__ . '/floating-cta.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
