// SAANS Page Opener — runs after GSAP is loaded
(function () {
    var opener = document.getElementById('saans-opener');
    if (!opener) return;

    // Skip opener if user has visited before in this session
    if (sessionStorage.getItem('saans-opened')) {
        opener.style.display = 'none';
        return;
    }

    var wordmark = opener.querySelector('.opener-wordmark');
    var sub      = opener.querySelector('.opener-sub');
    var panelTop = opener.querySelector('.opener-top');
    var panelBot = opener.querySelector('.opener-bottom');

    var tl = gsap.timeline({
        onComplete: function () {
            opener.classList.add('is-done');
            sessionStorage.setItem('saans-opened', '1');
        }
    });

    // 1. Wordmark fades + rises in
    tl.to(wordmark, {
        opacity: 1,
        y: 0,
        scale: 1,
        duration: 0.9,
        ease: 'power3.out',
        delay: 0.1
    });

    // 2. Sub-title fades in
    tl.to(sub, {
        opacity: 1,
        duration: 0.5,
        ease: 'power2.out'
    }, '-=0.3');

    // 3. Hold for a moment
    tl.to({}, { duration: 0.7 });

    // 4. Wordmark & sub fade out
    tl.to([wordmark, sub], {
        opacity: 0,
        duration: 0.35,
        ease: 'power2.in'
    });

    // 5. Panels split apart (top goes up, bottom goes down)
    tl.to(panelTop, {
        yPercent: -100,
        duration: 0.75,
        ease: 'power4.inOut'
    }, '-=0.1');

    tl.to(panelBot, {
        yPercent: 100,
        duration: 0.75,
        ease: 'power4.inOut',
        onComplete: function () {
            opener.style.display = 'none';
        }
    }, '<');
})();

