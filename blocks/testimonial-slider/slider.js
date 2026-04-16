document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.flair-testimonial-slider');
    sliders.forEach(function (slider) {
        const slides = slider.querySelectorAll('.flair-testimonial-slide');
        const prevBtn = slider.querySelector('.flair-testimonial-prev');
        const nextBtn = slider.querySelector('.flair-testimonial-next');
        if (!slides.length || slides.length <= 1) return;
        let current = 0;
        function showSlide(index) {
            slides.forEach(function (slide) {
                slide.classList.remove('is-active');
            });
            slides[index].classList.add('is-active');
        }
        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                current = current === 0 ? slides.length - 1 : current - 1;
                showSlide(current);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                current = current === slides.length - 1 ? 0 : current + 1;
                showSlide(current);
            });
        }
        setInterval(function () {
            current = current === slides.length - 1 ? 0 : current + 1;
            showSlide(current);
        }, 6000);
    });
});
