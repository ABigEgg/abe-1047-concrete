import Alpine from 'alpinejs';
import Glide from '@glidejs/glide';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import lightGallery from 'lightgallery';

// Import lightGallery CSS (we'll need to add this to our build process)
// Since we're using CSS separately, we don't import the CSS here

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

    // Initialize lightGallery for all concrete gallery images
    initLightGallery();
});

/**
 * Initialize lightGallery for concrete gallery images
 */
function initLightGallery() {
    // Find all gallery containers
    const galleryContainers = document.querySelectorAll('.concrete-gallery');

    galleryContainers.forEach(container => {
        // Get all images in this gallery
        const galleryImages = container.querySelectorAll('.concrete-gallery__image-wrapper');

        // Add a click handler to each image wrapper
        galleryImages.forEach(imageWrapper => {
            // Add a cursor pointer to indicate it's clickable
            imageWrapper.style.cursor = 'pointer';

            // Get the image element
            const image = imageWrapper.querySelector('img');

            // Add data attributes needed for lightGallery
            if (image) {
                // Get the src of the image
                const src = image.getAttribute('src');

                // Add the necessary data attribute for lightGallery
                imageWrapper.setAttribute('data-src', src);

                // Get the alt text or caption if available
                const caption = imageWrapper.closest('.concrete-gallery__item').querySelector('.concrete-gallery__caption');
                if (caption) {
                    imageWrapper.setAttribute('data-sub-html', caption.innerHTML);
                } else if (image.getAttribute('alt')) {
                    imageWrapper.setAttribute('data-sub-html', image.getAttribute('alt'));
                }
            }
        });

        // Initialize lightGallery on the container
        lightGallery(container, {
            selector: '.concrete-gallery__image-wrapper',
            download: false,
            counter: true,
            mousewheel: true,
            escKey: true,
            fullScreen: true,
            pager: false,
            zoom: true,
            scale: 1,
            thumbnail: galleryImages.length > 1, // Only show thumbnails if there's more than one image
        });
    });
} 