document.addEventListener('DOMContentLoaded', () => {
    // Intercept clicks on WhatsApp links to track leads & GCLID conversions
    document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
        link.addEventListener('click', () => {
            const href = link.getAttribute('href');
            let packageName = 'Konsultasi WhatsApp';
            try {
                const url = new URL(href);
                const text = url.searchParams.get('text');
                if (text) {
                    const match = text.match(/\*([^*]+)\*/);
                    if (match) packageName = match[1];
                }
            } catch (e) {}

            const payload = JSON.stringify({
                event: 'wa_click',
                package_name: packageName
            });

            if (navigator.sendBeacon) {
                navigator.sendBeacon('/api/track-lead', payload);
            } else {
                fetch('/api/track-lead', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: payload,
                    keepalive: true
                }).catch(() => {});
            }
        });
    });
});
