// SAANS Header: Poni (Notch) to Dynamic Island transition on scroll
(function () {
    var header = document.querySelector('.site-header');
    if (!header) return;

    var isIsland = false;
    var threshold = 25;

    function update() {
        var y = window.scrollY || document.documentElement.scrollTop || 0;
        if (y > threshold && !isIsland) {
            isIsland = true;
            header.classList.add('dynamic-island');
        } else if (y <= threshold && isIsland) {
            isIsland = false;
            header.classList.remove('dynamic-island');
        }
    }

    // Initial check
    update();

    window.addEventListener('scroll', update, { passive: true });

    // Sinkronisasi dengan GSAP / Lenis
    if (window.gsap && gsap.ticker) {
        gsap.ticker.add(update);
    }

    // Event listener untuk tombol close di dalam menu drawer
    var closeBtn = document.querySelector('.menu-close-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var menuBtn = document.querySelector('.menu-btn');
            if (menuBtn) {
                menuBtn.click();
            } else {
                var menu = document.getElementById('menu');
                if (menu) menu.hidden = true;
            }
        });
    }
})();

