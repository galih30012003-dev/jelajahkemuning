let quizState = {
    group: 'keluarga',
    activity: 'jeep',
    participants: 10
};

function selectOption(step, key, val, el) {
    quizState[key] = val;
    document.querySelectorAll(`.step-${step} .quiz-opt`).forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');
}

function nextStep(current, next) {
    document.getElementById(`quiz-step-${current}`).style.display = 'none';
    document.getElementById(`quiz-step-${next}`).style.display = 'block';
    if (next === 3) {
        calculateRecommendation();
    }
}

function calculateRecommendation() {
    const count = parseInt(document.getElementById('quiz-participants-input').value) || 10;
    quizState.participants = count;

    let recName = "Paket Combo Jeep & River Tubing";
    let estPrice = 185000;
    if (quizState.activity === 'jeep') {
        recName = "Jeep Adventure Kemuning Short/Medium";
        estPrice = count > 15 ? 150000 : 350000;
    } else if (quizState.activity === 'tubing') {
        recName = "River Tubing Kali Senatah";
        estPrice = 75000;
    } else if (quizState.activity === 'outbound') {
        recName = "Paket Outbound Gathering Kemuning";
        estPrice = 130000;
    } else if (quizState.activity === 'villa') {
        recName = "Paket Menginap Villa & Glamping 2D1N";
        estPrice = 350000;
    }

    document.getElementById('rec-title').textContent = recName;
    document.getElementById('rec-price').textContent = "Estimasi: Rp " + estPrice.toLocaleString('id-ID') + (count >= 16 ? "/orang" : "/paket");

    const waText = `Halo Admin Jelajah Kemuning, saya sudah coba Kuis Paket di web: Tipe: ${quizState.group}, Aktivitas: ${quizState.activity}, Peserta: ${count} orang. Tertarik rekomendasi: ${recName}. Boleh minta info detailnya?`;
    document.getElementById('rec-wa-btn').href = "https://wa.me/6281234567890?text=" + encodeURIComponent(waText);
}
