import Alpine from 'alpinejs';
import Glide from '@glidejs/glide';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Export Glide and Swiper for global usage if needed
window.Glide = Glide;
window.Swiper = Swiper;

// Initialize any default Glide or Swiper instances here if needed
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Glide sliders
    const glideElements = document.querySelectorAll('.glide');
    glideElements.forEach(element => {
        new Glide(element).mount();
    });

    // Initialize Swiper sliders
    const swiperElements = document.querySelectorAll('.swiper');
    swiperElements.forEach(element => {
        new Swiper(element, {
            modules: [Navigation, Pagination],
            // Default configuration
            slidesPerView: 1,
            spaceBetween: 30,
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
}); 