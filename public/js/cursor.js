// SAANS Custom Glow Ring Cursor with GSAP spring lerp
(function () {
    if (!window.matchMedia('(pointer: fine)').matches) return;

    var cursorWrap = document.querySelector('.saans-cursor');
    if (!cursorWrap) return;

    var dot = cursorWrap.querySelector('.cursor-dot');
    var ring = cursorWrap.querySelector('.cursor-ring');
    if (!dot || !ring) return;

    var setDotX = gsap.quickTo(dot, 'x', { duration: 0.08, ease: 'power2.out' });
    var setDotY = gsap.quickTo(dot, 'y', { duration: 0.08, ease: 'power2.out' });

    var setRingX = gsap.quickTo(ring, 'x', { duration: 0.28, ease: 'power3.out' });
    var setRingY = gsap.quickTo(ring, 'y', { duration: 0.28, ease: 'power3.out' });

    var isHidden = true;

    window.addEventListener('mousemove', function (e) {
        if (isHidden) {
            cursorWrap.classList.remove('is-hidden');
            isHidden = false;
        }

        setDotX(e.clientX);
        setDotY(e.clientY);
        setRingX(e.clientX);
        setRingY(e.clientY);

        // Ubah warna kursor otomatis saat berada di latar gelap (Hero, Footer)
        var target = e.target;
        if (target && target.closest && (target.closest('.hero') || target.closest('.site-footer') || target.closest('#saans-opener'))) {
            cursorWrap.classList.add('is-on-dark');
        } else {
            cursorWrap.classList.remove('is-on-dark');
        }
    }, { passive: true });

    document.addEventListener('mouseleave', function () {
        cursorWrap.classList.add('is-hidden');
        isHidden = true;
    });

    document.addEventListener('mouseenter', function () {
        cursorWrap.classList.remove('is-hidden');
        isHidden = false;
    });

    var hoverSelector = 'a, button, input, select, textarea, [role="button"], .btn, .link, .sh, .pass-card, .menu-btn';
    document.addEventListener('mouseover', function (e) {
        if (e.target && e.target.closest && e.target.closest(hoverSelector)) {
            cursorWrap.classList.add('is-hovering');
        }
    });

    document.addEventListener('mouseout', function (e) {
        if (e.target && e.target.closest && e.target.closest(hoverSelector)) {
            cursorWrap.classList.remove('is-hovering');
        }
    });

    window.addEventListener('mousedown', function () {
        cursorWrap.classList.add('is-active');
    });

    window.addEventListener('mouseup', function () {
        cursorWrap.classList.remove('is-active');
    });
})();

