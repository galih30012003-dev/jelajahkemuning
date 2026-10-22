<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:740px;">
        <div class="hero-eyebrow">
            <span>Kuis Rekomendasi Paket Rombongan</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            Pilih Paket Wisata Sesuai Kebutuhan Rombongan
        </h1>
        <p class="hero-lead" style="margin:0 auto;">
            Jawab 3 pertanyaan singkat berikut untuk mendapatkan rekomendasi paket dan estimasi biaya secara cepat.
        </p>
    </div>
</section>

<div class="container" style="max-width:700px; padding:56px 20px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:32px; box-shadow:var(--shadow-md);">

        <!-- Step 1 -->
        <div id="quiz-step-1" class="step-1">
            <span class="section-eyebrow">Langkah 1 dari 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--text-main); margin-bottom:18px;">Siapa saja yang akan ikut liburan?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(1, 'group', 'keluarga', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Keluarga Besar</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Santai, nyaman untuk anak-anak & lansia</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'kantor', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Kantor / Instansi</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Gathering, team building & SPJ resmi</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'komunitas', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Komunitas / Teman</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Offroad seru & tantangan alam</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'pasangan', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Pasangan / Berdua</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Private trip kebun teh & sunset</div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="nextStep(1, 2)" style="margin-top:24px; width:100%;">
                <span>Lanjut ke Langkah 2 →</span>
            </button>
        </div>

        <!-- Step 2 -->
        <div id="quiz-step-2" class="step-2" style="display:none;">
            <span class="section-eyebrow">Langkah 2 dari 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--text-main); margin-bottom:18px;">Aktivitas apa yang paling diminati?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(2, 'activity', 'jeep', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Jeep Adventure 4x4</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Susur sungai lumpur, kebun teh & Paralayang</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'tubing', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">River Tubing</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Menyusuri arus air segar Kali Senatah</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'outbound', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Outbound & Fun Games</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Games kekompakan bersama fasilitator</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'villa', this)" style="padding:18px; cursor:pointer;">
                    <strong style="font-size:14.5px; color:var(--text-main); display:block;">Menginap di Villa</strong>
                    <div style="font-size:12.5px; color:var(--text-muted); margin-top:4px;">Paket menginap 2D1N di kebun teh</div>
                </div>
            </div>
            <div style="margin-top:24px; display:flex; gap:10px;">
                <button class="btn btn-outline" onclick="nextStep(2, 1)">
                    ← Kembali
                </button>
                <button class="btn btn-primary" onclick="nextStep(2, 3)" style="flex:1;">
                    Lihat Rekomendasi →
                </button>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="quiz-step-3" class="step-3" style="display:none;">
            <span class="section-eyebrow">Langkah 3 dari 3</span>
            <h3 style="font-size:1.25rem; font-weight:800; color:var(--text-main); margin-bottom:16px;">Jumlah peserta rombongan:</h3>

            <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
                <input type="number" id="quiz-participants-input" value="16" min="1" max="500" class="qf-input" style="width:130px; text-align:center; font-size:17px;" oninput="calculateRecommendation()">
                <span style="font-size:14.5px; font-weight:600; color:var(--text-muted);">Orang Peserta</span>
            </div>

            <div style="background:var(--bg-canvas); border:1px solid var(--border-strong); border-radius:var(--radius-sm); padding:24px; text-align:center;">
                <div style="font-size:11.5px; font-weight:800; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.05em; margin-bottom:6px;">Rekomendasi Paket Terbaik:</div>
                <h2 id="rec-title" style="font-size:1.35rem; font-weight:800; color:var(--primary); margin-bottom:6px;">Paket Combo (Jeep + Outbound + Tubing)</h2>
                <div id="rec-price" style="font-family:var(--font-mono); font-size:1.45rem; font-weight:700; color:var(--accent); margin-bottom:18px;">Estimasi: Rp 185.000 / orang</div>

                <a id="rec-wa-btn" href="#" class="btn btn-accent" style="width:100%;">
                    <span>Konsultasikan Paket Ini via WhatsApp</span>
                </a>
            </div>

            <div style="margin-top:16px; text-align:center;">
                <button onclick="nextStep(3, 2)" style="background:none; border:none; color:var(--text-muted); font-size:13px; font-weight:600; cursor:pointer;">
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
