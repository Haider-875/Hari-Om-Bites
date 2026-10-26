import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.Swiper = Swiper;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// Initialize Premium Sliders & Motion on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    // 1. Homepage Hero Cinematic Slider
    const heroEl = document.querySelector('.hero-swiper');
    if (heroEl) {
        new Swiper(heroEl, {
            modules: [Autoplay, EffectFade, Pagination],
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 1200,
            loop: true,
            pagination: {
                el: '.hero-pagination',
                clickable: true
            }
        });
    }

    // 2. Food & Atmosphere Gallery Carousel Slider
    const galleryEl = document.querySelector('.gallery-swiper');
    if (galleryEl) {
        new Swiper(galleryEl, {
            modules: [Pagination, Autoplay],
            slidesPerView: 1.15,
            spaceBetween: 16,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 800,
            loop: true,
            pagination: {
                el: '.gallery-pagination',
                clickable: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 28
                }
            }
        });
    }

    // 3. GSAP Scroll Animations (Respects prefers-reduced-motion)
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!prefersReducedMotion) {
        gsap.utils.toArray('.gsap-fade-up').forEach((el) => {
            gsap.fromTo(el, 
                { opacity: 0, y: 32 }, 
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.9,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 88%',
                        toggleActions: 'play none none none'
                    }
                }
            );
        });

        gsap.utils.toArray('.gsap-stagger-group').forEach((group) => {
            const items = group.querySelectorAll('.gsap-stagger-item');
            if (items.length) {
                gsap.fromTo(items,
                    { opacity: 0, y: 28 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.7,
                        stagger: 0.15,
                        ease: 'power2.out',
                        scrollTrigger: {
                            trigger: group,
                            start: 'top 85%',
                            toggleActions: 'play none none none'
                        }
                    }
                );
            }
        });
    }
});

Alpine.start();
