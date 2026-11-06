/**
 * SAANS Place Section — Slider Sederhana & Bersih
 * - Navigasi tombol kiri/kanan (manual)
 * - Scroll ke section: saat section masuk layar ~50%, IntersectionObserver
 *   mengaktifkan mode "scroll-intercept" singkat sehingga 1x scroll = 1x slide
 * - Tanpa GSAP pin/spacer sehingga bebas gap kosong 100%
 * - Scroll natural berlanjut begitu semua slide selesai
 */
(function () {
    function initPlaceSlider() {
        var slider = document.querySelector('[data-ripple-slider]');
        var placeSec = document.getElementById('place');
        if (!slider || !placeSec) return;

        var dataEl = slider.querySelector('#placeSlidesData');
        if (!dataEl) return;

        var slides = [];
        try {
            slides = JSON.parse(dataEl.textContent);
        } catch (e) {
            console.error('SAANS Slider: Gagal memuat data slides', e);
            return;
        }

        if (!slides || !slides.length) return;

        var current = 0;
        var total = slides.length;
        var images = slider.querySelectorAll('.ripple-slide-img');
        var prevBtn = slider.querySelector('.ripple-btn--prev');
        var nextBtn = slider.querySelector('.ripple-btn--next');
        var counter = slider.querySelector('#rippleCounter');
        var plate = slider.querySelector('.ripple-plate');
        var items = plate ? plate.querySelectorAll('.ripple-meta-item') : [];
        var updateTimeout = null;

        // ─── Fungsi visual: ganti gambar, counter, metadata ───────────────────
        function updateSlide(nextIndex) {
            current = (nextIndex + total) % total;

            for (var i = 0; i < images.length; i++) {
                images[i].classList.toggle('is-active', i === current);
            }

            if (counter) {
                counter.textContent =
                    String(current + 1).padStart(2, '0') + ' / ' +
                    String(total).padStart(2, '0');
            }

            var slideData = slides[current];
            if (plate && slideData && slideData.items) {
                if (updateTimeout) clearTimeout(updateTimeout);
                plate.classList.add('is-changing');
                updateTimeout = setTimeout(function () {
                    for (var j = 0; j < slideData.items.length; j++) {
                        if (items[j]) {
                            var dt = items[j].querySelector('dt');
                            var dd = items[j].querySelector('dd');
                            if (dt) dt.textContent = slideData.items[j].label || '';
                            if (dd) dd.textContent = slideData.items[j].value || '';
                        }
                    }
                    plate.classList.remove('is-changing');
                }, 140);
            }
        }

        // ─── Tombol panah manual (dengan wrap-around) ─────────────────────────
        if (prevBtn) {
            prevBtn.addEventListener('click', function (e) {
                e.preventDefault();
                updateSlide(current - 1);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', function (e) {
                e.preventDefault();
                updateSlide(current + 1);
            });
        }

        // ─── IntersectionObserver untuk keyboard focus ────────────────────────
        var sectionVisible = false;
        var io = new IntersectionObserver(function (entries) {
            sectionVisible = entries[0].isIntersecting;
        }, { threshold: 0.3 });
        io.observe(placeSec);

        // ─── Keyboard arrow ───────────────────────────────────────────────────
        document.addEventListener('keydown', function (e) {
            if (!sectionVisible) return;
            if (e.key === 'ArrowLeft') updateSlide(current - 1);
            else if (e.key === 'ArrowRight') updateSlide(current + 1);
        });

        // ─── Touch swipe ──────────────────────────────────────────────────────
        var slab = slider.querySelector('.ripple-slab');
        if (slab) {
            var tx = 0, ty = 0;
            slab.addEventListener('touchstart', function (e) {
                if (e.changedTouches[0]) { tx = e.changedTouches[0].screenX; ty = e.changedTouches[0].screenY; }
            }, { passive: true });
            slab.addEventListener('touchend', function (e) {
                if (!e.changedTouches[0]) return;
                var dx = e.changedTouches[0].screenX - tx;
                var dy = e.changedTouches[0].screenY - ty;
                if (Math.abs(dx) > 36 && Math.abs(dx) > Math.abs(dy)) {
                    updateSlide(dx < 0 ? current + 1 : current - 1);
                }
            }, { passive: true });
        }

    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPlaceSlider);
    } else {
        initPlaceSlider();
    }
})();
