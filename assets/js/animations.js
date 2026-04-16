/**
 * FlairFacilities Animations
 */
(function () {
    'use strict';

    // Intersection Observer for scroll animations
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -50px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                
                // Trigger stat counters if present
                const counters = entry.target.querySelectorAll('.flair-stat-counter');
                counters.forEach(function (counter) {
                    animateCounter(counter);
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.flair-animate-up').forEach(function (el) {
        observer.observe(el);
    });

    // Stat counter animation
    function animateCounter(counterEl) {
        const valueEl = counterEl.querySelector('.flair-stat-value');
        const target = parseInt(counterEl.dataset.count, 10);
        if (!valueEl || isNaN(target)) return;
        
        const duration = 2000;
        const startTime = performance.now();
        
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.floor(easeOutQuart * target);
            valueEl.textContent = current;
            
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                valueEl.textContent = target;
            }
        }
        
        requestAnimationFrame(update);
    }

    // Sticky header hide/show on scroll
    let lastScroll = 0;
    const header = document.querySelector('.flair-header-main');
    
    if (header) {
        window.addEventListener('scroll', function () {
            const currentScroll = window.pageYOffset;
            if (currentScroll <= 0) {
                header.style.transform = 'translateY(0)';
                return;
            }
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
            lastScroll = currentScroll;
        }, { passive: true });
    }

    // Parallax effect for hero backgrounds
    const heroCovers = document.querySelectorAll('.flair-hero .wp-block-cover__image-background');
    if (heroCovers.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        window.addEventListener('scroll', function () {
            const scrollY = window.pageYOffset;
            heroCovers.forEach(function (img) {
                img.style.transform = 'translateY(' + (scrollY * 0.3) + 'px)';
            });
        }, { passive: true });
    }
})();
