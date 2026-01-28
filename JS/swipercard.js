document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.vision__swiper', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        speed: 800,
        watchSlidesProgress: true,
        observeParents: true,
        observer: true,
        coverflowEffect: {
            rotate: 35,
            stretch: 0,
            depth: 150,
            modifier: 1,
            slideShadows: false, // Las sombras propias de Swiper 8 a veces fallan, mejor gestionarlas por CSS
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
