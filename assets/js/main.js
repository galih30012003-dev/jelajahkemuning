document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    }

    // 2. FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');
            if (answer) {
                answer.classList.toggle('hidden');
                if (icon) icon.textContent = answer.classList.contains('hidden') ? '+' : '−';
            }
        });
    });

    // 3. Category Filter Tabs
    const tabButtons = document.querySelectorAll('.cat-btn');
    const packageCards = document.querySelectorAll('.card-package[data-category]');
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const target = btn.getAttribute('data-target');

            packageCards.forEach(card => {
                const cat = card.getAttribute('data-category');
                if (target === 'all' || cat === target) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // 4. Gallery Lightbox Modal
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.querySelector('.lightbox-close');

    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            if (img && lightboxModal && lightboxImg) {
                lightboxImg.src = img.src;
                lightboxModal.classList.add('active');
            }
        });
    });

    if (lightboxClose && lightboxModal) {
        lightboxClose.addEventListener('click', () => {
            lightboxModal.classList.remove('active');
        });
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) {
                lightboxModal.classList.remove('active');
            }
        });
    }
});
