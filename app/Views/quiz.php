<div class="hero-wrapper" style="padding:48px 0;">
    <div class="container" style="text-align:center;">
        <span class="badge-glass">✨ SMART PACKAGE FINDER</span>
        <h1 style="font-size:clamp(1.9rem, 3.5vw, 2.6rem); font-weight:900; margin:12px 0 6px;">
            Temukan Paket Wisata Paling Pas Buat Rombongan
        </h1>
        <p style="opacity:0.92; font-size:14.5px;">
            Jawab 3 pertanyaan singkat di bawah ini untuk mendapatkan rekomendasi paket & estimasi biaya secara instan.
        </p>
    </div>
</div>

<div class="container" style="max-width:720px; padding:50px 20px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); padding:36px; box-shadow:var(--shadow-med);">

        <!-- Step 1 -->
        <div id="quiz-step-1" class="step-1">
            <span class="badge-trust" style="margin-bottom:12px;">LANGKAH 1 DARI 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--color-primary); margin:8px 0 16px;">Siapa saja yang akan ikut liburan?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(1, 'group', 'keluarga', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">👨‍👩‍👧‍👦</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Keluarga Besar</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Santai, nyaman & aman untuk anak-anak</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'kantor', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🏢</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Kantor / Instansi</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Gathering, team building & SPJ resmi</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'komunitas', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🚴‍♂️</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Komunitas / Teman</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Adrenalin offroad & seru-seruan</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'pasangan', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">💑</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Pasangan / Duo</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Private trip kebun teh & sunset</div>
                </div>
            </div>
            <button class="btn-primary" onclick="nextStep(1, 2)" style="margin-top:28px; width:100%; justify-content:center; font-size:15px; padding:13px;">
                Lanjut ke Langkah 2 →
            </button>
        </div>

        <!-- Step 2 -->
        <div id="quiz-step-2" class="step-2" style="display:none;">
            <span class="badge-trust" style="margin-bottom:12px;">LANGKAH 2 DARI 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--color-primary); margin:8px 0 16px;">Aktivitas apa yang paling diminati?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(2, 'activity', 'jeep', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🚙</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Jeep Offroad 4x4</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Susur sungai, lumpur & Paralayang</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'tubing', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🌊</div>
                    <strong style="font-size:14px; color:var(--color-primary);">River Tubing</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Basah-basahan di Kali Senatah</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'outbound', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🎯</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Outbound & Games</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Fun games, kompak & makan siang</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'villa', this)" style="padding:18px; cursor:pointer; border-radius:var(--radius-md);">
                    <div style="font-size:24px; margin-bottom:4px;">🏡</div>
                    <strong style="font-size:14px; color:var(--color-primary);">Menginap di Villa</strong>
                    <div style="font-size:11.5px; color:var(--text-muted); margin-top:2px;">Paket 2D1N santai di kebun teh</div>
                </div>
            </div>
            <div style="margin-top:28px; display:flex; gap:12px;">
                <button class="btn-white" onclick="nextStep(2, 1)" style="border:1.5px solid var(--border); padding:13px 20px;">
                    ← Kembali
                </button>
                <button class="btn-primary" onclick="nextStep(2, 3)" style="flex:1; justify-content:center; font-size:15px; padding:13px;">
                    Lihat Rekomendasi Paket →
                </button>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="quiz-step-3" class="step-3" style="display:none;">
            <span class="badge-trust" style="margin-bottom:12px;">LANGKAH 3 DARI 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--color-primary); margin:8px 0 16px;">Perkiraan jumlah peserta rombongan:</h3>

            <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
                <input type="number" id="quiz-participants-input" value="16" min="1" max="500" style="width:140px; padding:12px 16px; border:2px solid var(--color-primary-light); border-radius:var(--radius-sm); font-size:18px; font-weight:800; font-family:var(--font-mono); text-align:center;" oninput="calculateRecommendation()">
                <span style="font-size:15px; font-weight:700; color:var(--text-muted);">Orang Peserta</span>
            </div>

            <!-- Rekomendasi Box -->
            <div style="background:linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%); border:1.5px solid #A7F3D0; border-radius:var(--radius-md); padding:24px; text-align:center; box-shadow:var(--shadow-low);">
                <span style="font-size:11.5px; font-weight:900; color:#047857; letter-spacing:0.8px;">REKOMENDASI TERBAIK BUAT KAMU:</span>
                <h2 id="rec-title" style="font-size:1.5rem; font-weight:900; color:var(--color-primary); margin:8px 0 6px;">Paket Combo (Jeep + Outbound + Tubing)</h2>
                <div id="rec-price" style="font-size:1.45rem; font-weight:900; color:var(--color-accent); font-family:var(--font-mono);">Estimasi: Rp 185.000/orang</div>

                <div style="margin-top:20px;">
                    <a id="rec-wa-btn" href="#" class="btn-accent" style="width:100%; justify-content:center; font-size:15.5px; padding:14px;">
                        📲 Ambil Rekomendasi Ini via WhatsApp
                    </a>
                </div>
            </div>

            <div style="margin-top:20px; text-align:center;">
                <button onclick="nextStep(3, 2)" style="background:none; border:none; color:var(--text-muted); font-size:13px; font-weight:700; cursor:pointer;">
                    ← Ubah Pilihan Aktivitas
                </button>
            </div>
        </div>
    </div>
</div>

<script>
window.JK_WA_PHONE = '<?= Helpers::getSetting("no_wa_1", "6285171001566") ?>';
</script>
<script src="/assets/js/quiz.js"></script>
