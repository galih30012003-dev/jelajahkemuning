<section class="page-head">
    <div class="container">
        <div class="page-head-inner">
            <div class="section-eyebrow">Kuis rekomendasi paket rombongan</div>
            <h1>Pilih paket sesuai<br>kebutuhan rombongan.</h1>
            <p class="lede">
                Jawab tiga pertanyaan singkat berikut untuk mendapatkan rekomendasi paket dan estimasi biaya secara cepat — tanpa perlu menunggu balasan admin.
            </p>
            <div class="page-meta">
                <span>3 langkah</span>
                <span>± 30 detik</span>
                <span>Langsung ke WhatsApp</span>
            </div>
        </div>
    </div>
</section>

<div class="page-body">
    <div class="container">
        <div class="quiz-panel" style="max-width:760px;">

            <!-- Step 1 -->
            <div id="quiz-step-1" class="step-1">
                <div class="section-eyebrow" style="margin-bottom:16px;">Langkah 1 dari 3</div>
                <h2 class="section-title" style="font-size:clamp(1.25rem,2vw,1.6rem); margin-bottom:22px;">Siapa saja yang akan ikut liburan?</h2>

                <div class="quiz-grid">
                    <button type="button" class="quiz-opt selected" onclick="selectOption(1, 'group', 'keluarga', this)">
                        <span class="quiz-opt-title">Keluarga besar</span>
                        <span class="quiz-opt-sub">Santai, nyaman untuk anak-anak &amp; lansia</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(1, 'group', 'kantor', this)">
                        <span class="quiz-opt-title">Kantor / instansi</span>
                        <span class="quiz-opt-sub">Gathering, team building &amp; SPJ resmi</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(1, 'group', 'komunitas', this)">
                        <span class="quiz-opt-title">Komunitas / teman</span>
                        <span class="quiz-opt-sub">Offroad seru &amp; tantangan alam</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(1, 'group', 'pasangan', this)">
                        <span class="quiz-opt-title">Pasangan / berdua</span>
                        <span class="quiz-opt-sub">Private trip kebun teh &amp; sunset</span>
                    </button>
                </div>

                <div class="quiz-step-nav">
                    <button type="button" class="btn btn-primary" onclick="nextStep(1, 2)">
                        <span>Lanjut ke langkah 2</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </button>
                </div>
            </div>

            <!-- Step 2 -->
            <div id="quiz-step-2" class="step-2" style="display:none;">
                <div class="section-eyebrow" style="margin-bottom:16px;">Langkah 2 dari 3</div>
                <h2 class="section-title" style="font-size:clamp(1.25rem,2vw,1.6rem); margin-bottom:22px;">Aktivitas apa yang paling diminati?</h2>

                <div class="quiz-grid">
                    <button type="button" class="quiz-opt selected" onclick="selectOption(2, 'activity', 'jeep', this)">
                        <span class="quiz-opt-title">Jeep Adventure 4×4</span>
                        <span class="quiz-opt-sub">Susur sungai lumpur, kebun teh &amp; paralayang</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(2, 'activity', 'tubing', this)">
                        <span class="quiz-opt-title">River tubing</span>
                        <span class="quiz-opt-sub">Menyusuri arus air segar Kali Senatah</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(2, 'activity', 'outbound', this)">
                        <span class="quiz-opt-title">Outbound &amp; fun games</span>
                        <span class="quiz-opt-sub">Games kekompakan bersama fasilitator</span>
                    </button>
                    <button type="button" class="quiz-opt" onclick="selectOption(2, 'activity', 'villa', this)">
                        <span class="quiz-opt-title">Menginap di villa</span>
                        <span class="quiz-opt-sub">Paket menginap 2D1N di kebun teh</span>
                    </button>
                </div>

                <div class="quiz-step-nav">
                    <button type="button" class="btn btn-outline" onclick="nextStep(2, 1)">Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(2, 3)">
                        <span>Lihat rekomendasi</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </button>
                </div>
            </div>

            <!-- Step 3 -->
            <div id="quiz-step-3" class="step-3" style="display:none;">
                <div class="section-eyebrow" style="margin-bottom:16px;">Langkah 3 dari 3</div>
                <h2 class="section-title" style="font-size:clamp(1.25rem,2vw,1.6rem); margin-bottom:22px;">Jumlah peserta rombongan</h2>

                <div class="field" style="max-width:260px;">
                    <label for="quiz-participants-input">Jumlah peserta (orang)</label>
                    <input type="number" id="quiz-participants-input" value="16" min="1" max="500" class="qf-input on-paper" oninput="calculateRecommendation()">
                </div>

                <div class="quiz-result">
                    <div class="quiz-result-label">Rekomendasi paket terbaik</div>
                    <h3 id="rec-title" style="font-size:clamp(1.15rem,1.8vw,1.4rem); margin-bottom:8px; color:var(--ink);">Paket Combo (Jeep + Outbound + Tubing)</h3>
                    <div id="rec-price" class="mono" style="font-size:1.3rem; font-weight:500; color:var(--accent); letter-spacing:-0.02em; margin-bottom:22px;">Estimasi: Rp 185.000 / orang</div>

                    <a id="rec-wa-btn" href="#" class="btn btn-accent" style="width:100%;">
                        <span>Konsultasikan paket ini via WhatsApp</span>
                    </a>
                </div>

                <div class="quiz-step-nav" style="justify-content:flex-start;">
                    <button type="button" class="quiz-back" onclick="nextStep(3, 2)">← Ubah pilihan aktivitas</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.JK_WA_PHONE = '<?= Helpers::getSetting("no_wa_1", "6285171001566") ?>';
</script>
<script src="/assets/js/quiz.js"></script>
