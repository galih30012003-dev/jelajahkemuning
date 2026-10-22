<!-- Quiz Hero -->
<section class="hero-clean">
    <div class="container" style="text-align:center; max-width:700px;">
        <span class="badge-trust" style="margin-bottom:10px;">KUIS REKOMENDASI PAKET</span>
        <h1 class="hero-h1" style="margin-bottom:10px;">
            Pilih Paket Wisata Sesuai Kebutuhan Rombongan
        </h1>
        <p class="hero-p" style="margin-bottom:0;">
            Jawab 3 pertanyaan singkat berikut untuk mendapatkan rekomendasi paket dan estimasi biaya secara cepat.
        </p>
    </div>
</section>

<div class="container" style="max-width:680px; padding:48px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:28px;">

        <!-- Step 1 -->
        <div id="quiz-step-1" class="step-1">
            <div style="font-size:12px; font-weight:700; color:var(--primary); margin-bottom:6px;">Langkah 1 dari 3</div>
            <h3 style="font-size:1.15rem; font-weight:800; color:#111827; margin-bottom:16px;">Siapa saja yang akan ikut liburan?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(1, 'group', 'keluarga', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Keluarga Besar</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Santai, nyaman untuk anak-anak & lansia</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'kantor', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Kantor / Instansi</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Gathering, team building & SPJ resmi</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'komunitas', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Komunitas / Teman</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Offroad seru & tantangan alam</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'pasangan', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Pasangan / Berdua</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Private trip kebun teh & sunset</div>
                </div>
            </div>
            <button class="btn-primary" onclick="nextStep(1, 2)" style="margin-top:24px; width:100%; justify-content:center; padding:12px;">
                Lanjut ke Langkah 2 →
            </button>
        </div>

        <!-- Step 2 -->
        <div id="quiz-step-2" class="step-2" style="display:none;">
            <div style="font-size:12px; font-weight:700; color:var(--primary); margin-bottom:6px;">Langkah 2 dari 3</div>
            <h3 style="font-size:1.15rem; font-weight:800; color:#111827; margin-bottom:16px;">Aktivitas apa yang paling diminati?</h3>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(2, 'activity', 'jeep', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Jeep Adventure 4x4</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Susur sungai lumpur, kebun teh & Paralayang</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'tubing', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">River Tubing</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Menyusuri arus air segar Kali Senatah</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'outbound', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Outbound & Fun Games</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Games kekompakan bersama fasilitator</div>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'villa', this)" style="padding:16px; cursor:pointer; border-radius:var(--radius-sm);">
                    <strong style="font-size:14px; color:#111827; display:block;">Menginap di Villa</strong>
                    <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">Paket menginap 2D1N di kebun teh</div>
                </div>
            </div>
            <div style="margin-top:24px; display:flex; gap:10px;">
                <button class="btn-outline" onclick="nextStep(2, 1)" style="padding:12px 18px;">
                    ← Kembali
                </button>
                <button class="btn-primary" onclick="nextStep(2, 3)" style="flex:1; justify-content:center; padding:12px;">
                    Lihat Rekomendasi →
                </button>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="quiz-step-3" class="step-3" style="display:none;">
            <div style="font-size:12px; font-weight:700; color:var(--primary); margin-bottom:6px;">Langkah 3 dari 3</div>
            <h3 style="font-size:1.15rem; font-weight:800; color:#111827; margin-bottom:16px;">Jumlah peserta rombongan:</h3>

            <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
                <input type="number" id="quiz-participants-input" value="16" min="1" max="500" style="width:120px; padding:10px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:16px; font-weight:700; text-align:center;" oninput="calculateRecommendation()">
                <span style="font-size:14px; font-weight:600; color:var(--text-muted);">Orang</span>
            </div>

            <div style="background:#F9FAF9; border:1px solid var(--border); border-radius:var(--radius-sm); padding:20px; text-align:center;">
                <div style="font-size:11.5px; font-weight:700; color:var(--text-muted); text-transform:uppercase; margin-bottom:4px;">Rekomendasi Paket:</div>
                <h2 id="rec-title" style="font-size:1.35rem; font-weight:800; color:var(--primary); margin-bottom:4px;">Paket Combo (Jeep + Outbound + Tubing)</h2>
                <div id="rec-price" style="font-size:1.35rem; font-weight:800; color:var(--accent); margin-bottom:16px;">Estimasi: Rp 185.000 / orang</div>

                <a id="rec-wa-btn" href="#" class="btn-wa" style="width:100%; justify-content:center; font-size:15px; padding:12px;">
                    Pesan Paket Ini via WhatsApp
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
