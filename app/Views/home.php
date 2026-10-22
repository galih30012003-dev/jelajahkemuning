<!-- Hero Banner -->
<section style="background: linear-gradient(135deg, #092618 0%, #0F3F28 45%, #155E3B 100%); color: #fff; padding: 70px 0 60px; position:relative; overflow:hidden;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:40px; align-items:center;">
        <div>
            <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.25); padding:6px 16px; border-radius:99px; font-size:12px; margin-bottom:20px; letter-spacing:0.3px;">
                <span>🛡️ Resmi CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?> • Berasuransi</span>
            </div>
            <h1 style="font-size:2.6rem; font-weight:900; line-height:1.2; margin-bottom:18px;">
                Paket Wisata Kemuning — Jeep Adventure, Outbound & River Tubing
            </h1>
            <p style="font-size:1.1rem; opacity:0.92; margin-bottom:28px; line-height:1.7;">
                Cari paket wisata Kemuning yang aman, seru, dan terpercaya? Kami melayani <strong>Jeep Offroad Kebun Teh</strong>, <strong>River Tubing</strong>, <strong>Outbound Gathering Kantor</strong>, dan <strong>Sewa Villa</strong> di Karanganyar dengan admin fast response, dikelola CV resmi berizin, dan bonus gratis dokumentasi.
            </p>
            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="font-size:15px; padding:12px 24px;">
                    📲 Konsultasi WhatsApp Cepat
                </a>
                <a href="/cari-paket/" class="btn-primary" style="background:#fff; color:var(--primary); font-size:15px; padding:12px 22px;">
                    ✨ Kuis Pilih Paket
                </a>
                <a href="/proposal/" class="btn-primary" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); color:#fff; font-size:15px; padding:12px 20px;">
                    📄 Unduh Proposal PDF
                </a>
            </div>
        </div>

        <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.2); padding:28px; border-radius:16px; backdrop-filter:blur(12px);">
            <div style="display:inline-block; background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 10px; border-radius:4px; margin-bottom:12px;">
                PARTNER GATHERING TERPERCAYA
            </div>
            <h3 style="font-size:1.35rem; font-weight:800; margin-bottom:12px; line-height:1.3;">
                Rencanakan Liburan Rombongan Tanpa Repot
            </h3>
            <p style="font-size:13.5px; opacity:0.88; line-height:1.6; margin-bottom:18px;">
                Dengan pengalaman lebih dari 5 tahun, kami telah melayani ratusan rombongan kantor, dinas, komunitas, dan keluarga luar kota dengan kepuasan bintang 5.
            </p>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; font-size:13px;">
                <div style="background:rgba(0,0,0,0.2); padding:10px 14px; border-radius:8px;">
                    <div style="font-size:20px; font-weight:900; color:#FBBF24;">5+ Tahun</div>
                    <div style="opacity:0.8; font-size:11px;">Pengalaman Trip</div>
                </div>
                <div style="background:rgba(0,0,0,0.2); padding:10px 14px; border-radius:8px;">
                    <div style="font-size:20px; font-weight:900; color:#34D399;">500+</div>
                    <div style="opacity:0.8; font-size:11px;">Grup Rombongan</div>
                </div>
                <div style="background:rgba(0,0,0,0.2); padding:10px 14px; border-radius:8px;">
                    <div style="font-size:20px; font-weight:900; color:#60A5FA;">100% Legal</div>
                    <div style="opacity:0.8; font-size:11px;">Izin Usaha NIB</div>
                </div>
                <div style="background:rgba(0,0,0,0.2); padding:10px 14px; border-radius:8px;">
                    <div style="font-size:20px; font-weight:900; color:#F472B6;">Free Dokumentasi</div>
                    <div style="opacity:0.8; font-size:11px;">Foto & Video Softcopy</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Stat Bar -->
<section style="background:#fff; border-bottom:1px solid var(--border); padding:20px 0;">
    <div class="container" style="display:flex; justify-content:space-around; flex-wrap:wrap; gap:20px; text-align:center;">
        <div>
            <span style="color:#047857; font-weight:800; font-size:15px;">✓ Legalitas Resmi CV</span>
            <p style="font-size:12px; color:var(--text-muted);">NIB: 0705250012458 Resmi Pemerintah</p>
        </div>
        <div>
            <span style="color:#047857; font-weight:800; font-size:15px;">✓ Asuransi Keselamatan</span>
            <p style="font-size:12px; color:var(--text-muted);">Trip lebih tenang, aman & nyaman</p>
        </div>
        <div>
            <span style="color:#047857; font-weight:800; font-size:15px;">✓ Driver & Pemandu Lokal</span>
            <p style="font-size:12px; color:var(--text-muted);">Ramah, sopan & hafal spot terbaik</p>
        </div>
        <div>
            <span style="color:#047857; font-weight:800; font-size:15px;">✓ Fast Response Admin</span>
            <p style="font-size:12px; color:var(--text-muted);">Konsultasi cepat via WhatsApp</p>
        </div>
    </div>
</section>

<!-- 3 Paket Terlaris Wisata Kemuning Karanganyar -->
<section style="background:#F8FAF8; padding:64px 0;">
    <div class="container">
        <div style="text-align:center; max-width:750px; margin:0 auto 40px;">
            <span class="badge-trust" style="background:#ECFDF5; color:#065F46; padding:6px 14px; font-size:12px;">FAVORIT ROMBONGAN KANTOR & KELUARGA</span>
            <h2 style="font-size:2.2rem; font-weight:900; color:var(--primary); margin:12px 0 8px;">
                3 Paket Terlaris Wisata Kemuning Karanganyar
            </h2>
            <p style="color:var(--text-muted); font-size:15px;">
                Pilih paket favorit sesuai kebutuhan: Jeep Adventure Kemuning, River Tubing, atau Outbound Gathering. Fasilitas all-in dan sudah termasuk makan siang prasmanan.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:28px; align-items:stretch;">
            <!-- Paket Seru 3 -->
            <div class="card-package" style="padding:28px; border-top:4px solid #10B981; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <span style="background:#ECFDF5; color:#047857; font-size:11px; font-weight:800; padding:4px 10px; border-radius:4px;">FAVORIT</span>
                    <h3 style="font-size:1.4rem; font-weight:800; margin:8px 0 4px;">Paket Seru 3 (Outbound + Tubing)</h3>
                    <p style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">Kombinasi games kebersamaan dan basah-basahan river tubing menyegarkan.</p>
                    <div style="margin-bottom:16px; padding-bottom:16px; border-bottom:1px solid var(--border);">
                        <span style="font-size:2rem; font-weight:900; color:var(--primary);">Rp 130.000</span>
                        <span style="font-size:13px; color:var(--text-muted);">/ Orang</span>
                        <div style="font-size:11px; color:var(--accent); font-weight:700; margin-top:2px;">NB : MINIMAL 16 PESERTA</div>
                    </div>
                    <h4 style="font-size:13px; font-weight:700; color:#374151; margin-bottom:10px;">Fasilitas Include :</h4>
                    <ul style="list-style:none; font-size:13px; display:flex; flex-direction:column; gap:8px; color:#4B5563;">
                        <li>✓ Welcome Drink & Snack Rebusan</li>
                        <li>✓ Outbound & Fun Game Team Building</li>
                        <li>✓ Makan Siang Prasmanan Khas Kemuning</li>
                        <li>✓ River Tubing Kali Senatah (Track Aman)</li>
                        <li>✓ Shuttle Penjemputan River Tubing</li>
                        <li>✓ Aula Transit Luas</li>
                        <li>✓ Trainer Profesional & Fasilitator</li>
                        <li>✓ Sound System Standard</li>
                        <li>✓ Air Mineral Selama Kegiatan</li>
                        <li>✓ Asuransi Resmi Wisata</li>
                        <li>✓ <strong>GRATIS Dokumentasi Softcopy</strong></li>
                    </ul>
                </div>
                <div style="margin-top:24px;">
                    <a href="<?= Helpers::generateWaLink('Paket Seru 3 (Rp 130.000/org)', 'Min 16 peserta') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                        📲 Booking Paket via WA
                    </a>
                </div>
            </div>

            <!-- Paket Terlaris 185K -->
            <div class="card-package" style="padding:28px; border:2px solid var(--accent); border-top:6px solid var(--accent); box-shadow:0 12px 30px rgba(234, 88, 12, 0.15); position:relative; display:flex; flex-direction:column; justify-content:space-between; transform:scale(1.02);">
                <div style="position:absolute; top:-14px; left:50%; transform:translateX(-50%); background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 16px; border-radius:99px; letter-spacing:0.5px;">
                    🔥 PALING BANYAK DIPILIH
                </div>
                <div>
                    <span style="background:#FFF7ED; color:#C2410C; font-size:11px; font-weight:800; padding:4px 10px; border-radius:4px;">TERLARIS</span>
                    <h3 style="font-size:1.4rem; font-weight:800; margin:8px 0 4px;">Paket Combo (Jeep + Outbound + Tubing)</h3>
                    <p style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">Paket terlengkap: Outbound, Jeep Offroad, dan River Tubing all-in satu hari!</p>
                    <div style="margin-bottom:16px; padding-bottom:16px; border-bottom:1px solid var(--border);">
                        <span style="font-size:2.2rem; font-weight:900; color:var(--accent);">Rp 185.000</span>
                        <span style="font-size:13px; color:var(--text-muted);">/ Orang</span>
                        <div style="font-size:11px; color:var(--accent); font-weight:700; margin-top:2px;">NB : MINIMAL 16 PESERTA</div>
                    </div>
                    <h4 style="font-size:13px; font-weight:700; color:#374151; margin-bottom:10px;">Fasilitas Include :</h4>
                    <ul style="list-style:none; font-size:13px; display:flex; flex-direction:column; gap:8px; color:#4B5563;">
                        <li>✓ Welcome Drink & Snack Rebusan</li>
                        <li>✓ Makan Siang Prasmanan Khas Kemuning</li>
                        <li>✓ Outbound & Fun Game Team Building</li>
                        <li>✓ <strong>Jeep Adventure Kemuning (Short Offroad)</strong></li>
                        <li>✓ <strong>River Tubing Kali Senatah</strong></li>
                        <li>✓ Shuttle Penjemputan River Tubing</li>
                        <li>✓ Aula Transit & Area Istirahat</li>
                        <li>✓ Trainer Profesional & Driver Ramah</li>
                        <li>✓ Sound System Standard</li>
                        <li>✓ Air Mineral Sepuasnya</li>
                        <li>✓ Asuransi Resmi Wisata</li>
                        <li>✓ <strong>GRATIS Dokumentasi Foto & Video (Drive)</strong></li>
                    </ul>
                </div>
                <div style="margin-top:24px;">
                    <a href="<?= Helpers::generateWaLink('Paket Combo Terlaris (Rp 185.000/org)', 'Jeep + Outbound + Tubing') ?>" class="btn-accent" style="width:100%; justify-content:center; font-size:16px;">
                        📲 Ambil Promo Paket Terlaris
                    </a>
                </div>
            </div>

            <!-- Paket Super Combo 210K -->
            <div class="card-package" style="padding:28px; border-top:4px solid #3B82F6; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <span style="background:#EFF6FF; color:#1D4ED8; font-size:11px; font-weight:800; padding:4px 10px; border-radius:4px;">BEST VALUE</span>
                    <h3 style="font-size:1.4rem; font-weight:800; margin:8px 0 4px;">Super Combo (Jeep Medium + Outbound + Tubing)</h3>
                    <p style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">Durasi offroad jeep lebih lama hingga spot Jembatan Kaca & Paralayang.</p>
                    <div style="margin-bottom:16px; padding-bottom:16px; border-bottom:1px solid var(--border);">
                        <span style="font-size:2rem; font-weight:900; color:var(--primary);">Rp 210.000</span>
                        <span style="font-size:13px; color:var(--text-muted);">/ Orang</span>
                        <div style="font-size:11px; color:var(--accent); font-weight:700; margin-top:2px;">NB : MINIMAL 16 PESERTA</div>
                    </div>
                    <h4 style="font-size:13px; font-weight:700; color:#374151; margin-bottom:10px;">Fasilitas Include :</h4>
                    <ul style="list-style:none; font-size:13px; display:flex; flex-direction:column; gap:8px; color:#4B5563;">
                        <li>✓ Welcome Drink & Snack Rebusan</li>
                        <li>✓ Makan Siang Prasmanan Khas Kemuning</li>
                        <li>✓ Outbound & Fun Game Team Building</li>
                        <li>✓ <strong>Jeep Adventure (Medium Trip ke Skyhills)</strong></li>
                        <li>✓ <strong>River Tubing Kali Senatah</strong></li>
                        <li>✓ Shuttle Penjemputan River Tubing</li>
                        <li>✓ Aula Transit & Sound System</li>
                        <li>✓ Trainer Profesional & Tim Rescue</li>
                        <li>✓ Air Mineral Selama Kegiatan</li>
                        <li>✓ Asuransi Resmi Wisata</li>
                        <li>✓ <strong>GRATIS Dokumentasi Foto & Video</strong></li>
                    </ul>
                </div>
                <div style="margin-top:24px;">
                    <a href="<?= Helpers::generateWaLink('Super Combo Jeep Medium (Rp 210.000/org)', 'Min 16 peserta') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                        📲 Booking Paket via WA
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detail Paket Jeep Adventure (Highlight Rute Offroad & Santai) -->
<section style="background:#fff; padding:64px 0; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:36px; flex-wrap:wrap; gap:16px;">
            <div>
                <span class="badge-trust">OFFROAD KEBUN TEH KEMUNING 4x4</span>
                <h2 style="font-size:2rem; font-weight:900; color:var(--primary); margin:8px 0 4px;">
                    Paket Jeep Adventure Kemuning Karanganyar
                </h2>
                <p style="color:var(--text-muted); font-size:14px;">
                    Armada jeep 4x4 bersih & terawat, kapasitas maks 4 orang per armada. Pilihan rute offroad sungai, kebun teh, hingga Candi Cetho.
                </p>
            </div>
            <a href="/jeep-adventure-kemuning/" class="btn-primary" style="font-size:13px;">
                Lihat Semua Paket Jeep →
            </a>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
            <?php foreach (array_slice($jeepPackages, 0, 3) as $jeep): ?>
            <div class="card-package" style="padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                        <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:3px 8px; border-radius:4px;">
                            <?= htmlspecialchars($jeep['badge'] ?: 'OFFROAD') ?>
                        </span>
                        <span style="font-size:12px; color:var(--text-muted); font-weight:600;">⏱️ <?= htmlspecialchars($jeep['duration'] ?: '1.5 Jam') ?></span>
                    </div>
                    <h3 style="font-size:1.3rem; font-weight:800; color:var(--primary);"><?= htmlspecialchars($jeep['name']) ?></h3>
                    <div style="margin:10px 0 14px;">
                        <span style="font-size:1.8rem; font-weight:900; color:var(--accent);"><?= Helpers::formatRupiah($jeep['price']) ?></span>
                        <span style="font-size:12px; color:var(--text-muted);">/ Armada (Maks 4 Orang)</span>
                    </div>

                    <?php if (!empty($jeep['itinerary'])): ?>
                    <div style="background:#F9FAFB; border:1px solid #E5E7EB; border-radius:8px; padding:12px; margin-bottom:14px; font-size:12px;">
                        <div style="font-weight:700; color:var(--primary); margin-bottom:4px;">📍 Rute Perjalanan:</div>
                        <div style="color:#4B5563; line-height:1.5;"><?= htmlspecialchars($jeep['itinerary']) ?></div>
                    </div>
                    <?php endif; ?>

                    <h5 style="font-size:12px; font-weight:700; color:#374151; margin-bottom:6px;">Fasilitas Termasuk:</h5>
                    <ul style="list-style:none; font-size:12.5px; color:#4B5563; display:flex; flex-direction:column; gap:4px;">
                        <?php foreach (array_slice(preg_split('/\r\n|\r|\n/', trim($jeep['inclusions'] ?? '')), 0, 4) as $inc): ?>
                        <li>✓ <?= htmlspecialchars($inc) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div style="margin-top:20px;">
                    <a href="<?= Helpers::generateWaLink($jeep['name'], Helpers::formatRupiah($jeep['price']) . '/armada') ?>" class="btn-accent" style="width:100%; justify-content:center;">
                        Booking Jeep via WhatsApp
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Detail Paket Outbound, Tubing & Paket Hemat -->
<section style="background:#F8FAF8; padding:64px 0;">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 40px;">
            <span class="badge-trust">PILIHAN LENGKAP OUTBOUND & WISATA AIR</span>
            <h2 style="font-size:2rem; font-weight:900; color:var(--primary); margin:8px 0 4px;">
                River Tubing, Outbound Gathering & Paket Hemat
            </h2>
            <p style="color:var(--text-muted); font-size:14px;">
                Sesuaikan dengan konsep acara kantor, study tour sekolah, atau liburan keluarga kamu.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
            <!-- Tubing Card -->
            <div class="card-package" style="padding:24px;">
                <span style="font-size:28px;">🌊</span>
                <h3 style="font-size:1.25rem; font-weight:800; color:var(--primary); margin:8px 0;">River Tubing Kali Senatah</h3>
                <p style="font-size:13px; color:var(--text-muted); margin-bottom:12px;">Arus sungai alami jernih berbatu, aman untuk pemula & anak-anak dengan perlengkapan safety lengkap.</p>
                <div style="font-size:1.4rem; font-weight:900; color:var(--accent); margin-bottom:12px;">Mulai Rp 50.000 <span style="font-size:11px; color:#6B7280; font-weight:400;">/ Orang</span></div>
                <ul style="font-size:12.5px; color:#4B5563; list-style:none; display:flex; flex-direction:column; gap:6px; margin-bottom:16px;">
                    <li>✓ Pelampung, Helm & Rescue Team</li>
                    <li>✓ Shuttle Penjemputan Mobil Tubing</li>
                    <li>✓ Kamar Mandi Bilas Bersih</li>
                </ul>
                <a href="/river-tubing-kemuning/" class="btn-primary" style="width:100%; justify-content:center; font-size:13px;">Lihat Paket Tubing →</a>
            </div>

            <!-- Outbound Card -->
            <div class="card-package" style="padding:24px;">
                <span style="font-size:28px;">🎯</span>
                <h3 style="font-size:1.25rem; font-weight:800; color:var(--primary); margin:8px 0;">Outbound & Fun Games</h3>
                <p style="font-size:13px; color:var(--text-muted); margin-bottom:12px;">Bikin rombongan kantor dan sekolah makin kompak dengan games seru, fasilitator pro, & aula luas.</p>
                <div style="font-size:1.4rem; font-weight:900; color:var(--accent); margin-bottom:12px;">Mulai Rp 80.000 <span style="font-size:11px; color:#6B7280; font-weight:400;">/ Orang</span></div>
                <ul style="font-size:12.5px; color:#4B5563; list-style:none; display:flex; flex-direction:column; gap:6px; margin-bottom:16px;">
                    <li>✓ Trainer & Sound System Standar</li>
                    <li>✓ Makan Siang Prasmanan Tradisional</li>
                    <li>✓ Welcome Drink & Snack Rebusan</li>
                </ul>
                <a href="/paket-outbound-kemuning/" class="btn-primary" style="width:100%; justify-content:center; font-size:13px;">Lihat Paket Outbound →</a>
            </div>

            <!-- Paket Hemat Card -->
            <div class="card-package" style="padding:24px;">
                <span style="font-size:28px;">🍱</span>
                <h3 style="font-size:1.25rem; font-weight:800; color:var(--primary); margin:8px 0;">Paket Hemat Jeep Per Orang</h3>
                <p style="font-size:13px; color:var(--text-muted); margin-bottom:12px;">Wisata offroad jeep praktis dihitung per orang, sudah include makan siang prasmanan & aula.</p>
                <div style="font-size:1.4rem; font-weight:900; color:var(--accent); margin-bottom:12px;">Mulai Rp 150.000 <span style="font-size:11px; color:#6B7280; font-weight:400;">/ Orang</span></div>
                <ul style="font-size:12.5px; color:#4B5563; list-style:none; display:flex; flex-direction:column; gap:6px; margin-bottom:16px;">
                    <li>✓ Jeep Offroad (Short - Long)</li>
                    <li>✓ Makan Siang Prasmanan Khas Kemuning</li>
                    <li>✓ Asuransi & Dokumentasi Gratis</li>
                </ul>
                <a href="/paket-hemat-jeep-kemuning/" class="btn-primary" style="width:100%; justify-content:center; font-size:13px;">Lihat Paket Hemat →</a>
            </div>

            <!-- Villa Card -->
            <div class="card-package" style="padding:24px;">
                <span style="font-size:28px;">🏡</span>
                <h3 style="font-size:1.25rem; font-weight:800; color:var(--primary); margin:8px 0;">Villa & Glamping Kemuning</h3>
                <p style="font-size:13px; color:var(--text-muted); margin-bottom:12px;">Menginap 2D1N di villa asri lereng Gunung Lawu sejuk berhawa segar kebun teh Kemuning.</p>
                <div style="font-size:1.4rem; font-weight:900; color:var(--accent); margin-bottom:12px;">Mulai Rp 350.000 <span style="font-size:11px; color:#6B7280; font-weight:400;">/ Orang</span></div>
                <ul style="font-size:12.5px; color:#4B5563; list-style:none; display:flex; flex-direction:column; gap:6px; margin-bottom:16px;">
                    <li>✓ Villa Asri / Glamping Eksklusif</li>
                    <li>✓ Makan 3x Prasmanan + Teh Kemuning</li>
                    <li>✓ Bisa Combo Jeep & Tubing</li>
                </ul>
                <a href="/villa-glamping-kemuning/" class="btn-primary" style="width:100%; justify-content:center; font-size:13px;">Lihat Paket Villa →</a>
            </div>
        </div>
    </div>
</section>

<!-- Kenapa Memilih CV Jelajah Kemuning -->
<section style="background:#fff; padding:64px 0; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 40px;">
            <span class="badge-trust">KEUNGGULAN KAMI</span>
            <h2 style="font-size:2rem; font-weight:900; color:var(--primary); margin:8px 0 4px;">
                Kenapa Ratusan Rombongan Memilih JelajahKemuning.com?
            </h2>
            <p style="color:var(--text-muted); font-size:14px;">
                Kami bukan sekadar penyedia wisata biasa, kami adalah partner trip lokal yang memastikan acara kamu terorganisir dari awal sampai selesai.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:24px;">
            <div style="padding:20px; border-radius:12px; background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:32px; margin-bottom:10px;">🏛️</div>
                <h3 style="font-size:16px; font-weight:800; color:var(--primary); margin-bottom:6px;">Legal & Terpercaya</h3>
                <p style="font-size:13px; color:var(--text-muted); line-height:1.6;">Dikelola oleh CV resmi dengan NIB: 0705250012458 sehingga sangat aman dan terpercaya untuk SPJ rombongan kantor dan instansi.</p>
            </div>
            <div style="padding:20px; border-radius:12px; background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:32px; margin-bottom:10px;">🎖️</div>
                <h3 style="font-size:16px; font-weight:800; color:var(--primary); margin-bottom:6px;">Berpengalaman 5+ Tahun</h3>
                <p style="font-size:13px; color:var(--text-muted); line-height:1.6;">Kami sudah menangani berbagai kebutuhan wisata Kemuning mulai dari keluarga kecil, komunitas, hingga gathering ratusan peserta.</p>
            </div>
            <div style="padding:20px; border-radius:12px; background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:32px; margin-bottom:10px;">🤝</div>
                <h3 style="font-size:16px; font-weight:800; color:var(--primary); margin-bottom:6px;">Dipercaya Banyak Rombongan</h3>
                <p style="font-size:13px; color:var(--text-muted); line-height:1.6;">Sudah melayani ratusan rombongan dengan kepuasan tinggi, pelayanan ramah, driver sopan, dan fasilitas transit yang nyaman.</p>
            </div>
            <div style="padding:20px; border-radius:12px; background:#F9FAFB; border:1px solid #E5E7EB;">
                <div style="font-size:32px; margin-bottom:10px;">🏷️</div>
                <h3 style="font-size:16px; font-weight:800; color:var(--primary); margin-bottom:6px;">Harga Transparan & Jelas</h3>
                <p style="font-size:13px; color:var(--text-muted); line-height:1.6;">Paket dapat disesuaikan dengan anggaran kamu, mulai dari paket hemat sampai VIP tanpa ada biaya tersembunyi yang membingungkan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Customer Asli -->
<section style="background:#0F3F28; color:#fff; padding:64px 0;">
    <div class="container">
        <div style="text-align:center; max-width:700px; margin:0 auto 40px;">
            <span class="badge-trust" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">REVIEW GOOGLE 5.0 ⭐⭐⭐⭐⭐</span>
            <h2 style="font-size:2rem; font-weight:900; margin:10px 0 4px;">
                Testimoni Asli Customer Jelajah Kemuning
            </h2>
            <p style="opacity:0.85; font-size:14px;">
                Ini pengalaman nyata rombongan yang telah berlibur bersama kami di Kemuning Karanganyar.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
            <?php foreach ($testimonials as $t): ?>
            <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:12px; padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <div style="color:#FBBF24; font-size:15px; margin-bottom:8px;">⭐⭐⭐⭐⭐</div>
                    <p style="font-size:13.5px; opacity:0.92; line-height:1.6; font-style:italic; margin-bottom:16px;">
                        "<?= htmlspecialchars($t['comment']) ?>"
                    </p>
                </div>
                <div style="border-top:1px solid rgba(255,255,255,0.15); padding-top:12px;">
                    <div style="font-weight:700; font-size:14px;"><?= htmlspecialchars($t['name']) ?></div>
                    <div style="font-size:11.5px; opacity:0.75;"><?= htmlspecialchars($t['trip']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="container" style="padding:64px 16px; max-width:850px;">
    <div style="text-align:center; margin-bottom:36px;">
        <span class="badge-trust">TANYA JAWAB</span>
        <h2 style="font-size:1.85rem; font-weight:900; color:var(--primary); margin:8px 0 4px;">
            Pertanyaan yang Sering Ditanyakan (FAQ)
        </h2>
        <p style="color:var(--text-muted); font-size:14px;">Biar kamu makin yakin sebelum booking, ini beberapa pertanyaan yang paling sering diajukan.</p>
    </div>

    <div style="display:flex; flex-direction:column; gap:12px;">
        <?php foreach ($faqs as $faq): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:10px; overflow:hidden;">
            <div class="faq-question" style="padding:16px 20px; font-weight:700; cursor:pointer; display:flex; justify-content:space-between; align-items:center; color:var(--primary);">
                <span><?= htmlspecialchars($faq['q']) ?></span>
                <span class="faq-icon" style="font-size:18px; color:var(--accent);">+</span>
            </div>
            <div class="faq-answer hidden" style="padding:0 20px 16px; color:var(--text-muted); font-size:13.5px; line-height:1.6; border-top:1px solid #F3F4F6;">
                <?= htmlspecialchars($faq['a']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Final CTA Banner -->
<section style="background:linear-gradient(135deg, var(--accent) 0%, #C2410C 100%); color:#fff; padding:60px 0; text-align:center;">
    <div class="container" style="max-width:700px;">
        <h2 style="font-size:2.2rem; font-weight:900; margin-bottom:12px;">Siap Trip Seru di Kemuning? Booking Sekarang!</h2>
        <p style="font-size:15px; opacity:0.92; margin-bottom:24px; line-height:1.6;">
            Konsultasikan kebutuhan trip kamu sekarang. Kami siap bantu pilih paket Jeep Adventure, River Tubing, atau Outbound Gathering sesuai jumlah peserta dan tanggal keberangkatan.
        </p>
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-primary" style="background:#fff; color:var(--accent); font-size:16px; padding:12px 28px; font-weight:800;">
                📲 Chat WhatsApp Admin Sekarang
            </a>
            <a href="/proposal/" class="btn-primary" style="background:rgba(0,0,0,0.2); border:1px solid rgba(255,255,255,0.4); color:#fff; font-size:16px; padding:12px 24px;">
                📄 Download Proposal PDF
            </a>
        </div>
    </div>
</section>
