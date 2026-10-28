import 'bootstrap';
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
    const heroSlider = document.querySelector('.hero-swiper');
    if (heroSlider) {
        new Swiper(heroSlider, {
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
    const gallerySlider = document.querySelector('.gallery-swiper');
    if (gallerySlider) {
        new Swiper(gallerySlider, {
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

    // 2.3 Inside Hari Om Atmosphere Carousel Slider (Touch/Drag & Auto-scroll)
    const insideSlider = document.querySelector('.inside-swiper');
    if (insideSlider) {
        new Swiper(insideSlider, {
            modules: [Autoplay],
            slidesPerView: 1.15,
            spaceBetween: 18,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 600,
            loop: true,
            grabCursor: true,
            allowTouchMove: true,
            simulateTouch: true,
            touchRatio: 1.2,
            touchAngle: 45,
            touchStartPreventDefault: false,
            passiveListeners: true,
            resistanceRatio: 0.85,
            breakpoints: {
                540: {
                    slidesPerView: 1.75,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2.3,
                    spaceBetween: 24
                },
                1024: {
                    slidesPerView: 3.25,
                    spaceBetween: 28
                }
            }
        });
    }

    // 2.5 Chef's Selection Signature Dishes Slider
    const chefSlider = document.querySelector('.chef-swiper');
    if (chefSlider) {
        new Swiper(chefSlider, {
            modules: [Autoplay],
            slidesPerView: 1,
            spaceBetween: 32,
            speed: 700,
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            }
        });
    }

    // 3. GSAP Animations & Hero Entrance
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!prefersReducedMotion) {
        // Hero Staggered Entrance Reveal
        const heroContent = document.querySelector('.hero-content');
        if (heroContent) {
            const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });
            heroTl
                .fromTo('.hero-eyebrow', 
                    { opacity: 0, y: -16 }, 
                    { opacity: 1, y: 0, duration: 0.8, delay: 0.1 }
                )
                .fromTo('.hero-logo', 
                    { opacity: 0, scale: 0.92, y: 14 }, 
                    { opacity: 1, scale: 1, y: 0, duration: 0.9 }, 
                    '-=0.5'
                )
                .fromTo(['.hero-tagline', '.hero-subtagline'], 
                    { opacity: 0, y: 12 }, 
                    { opacity: 1, y: 0, duration: 0.7, stagger: 0.12 }, 
                    '-=0.5'
                )
                .fromTo('.hero-buttons a', 
                    { opacity: 0, y: 16 }, 
                    { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'back.out(1.2)' }, 
                    '-=0.4'
                )
                .fromTo(['.hero-pagination', '.hero-scroll-indicator', '.hero-rail-left', '.hero-rail-right'], 
                    { opacity: 0 }, 
                    { opacity: 1, duration: 0.8 }, 
                    '-=0.3'
                );
        }

        // Scroll reveals for section headings and components
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

        // Stagger reveals for card groups
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

    // 4. Smooth Scrolling for Navigation & Anchor Links with Fixed Navbar Offset
    document.querySelectorAll('a[href^="#"], a[href*="/#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const rawHref = this.getAttribute('href');
            const hashIndex = rawHref.indexOf('#');
            if (hashIndex === -1) return;
            const hash = rawHref.substring(hashIndex);
            if (!hash || hash === '#') return;

            const targetEl = document.querySelector(hash);
            if (targetEl) {
                const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
                const linkPath = rawHref.substring(0, hashIndex).replace(/\/$/, '') || '/';
                if (linkPath !== '' && linkPath !== currentPath) {
                    return; // Cross-page navigation, allow default
                }

                e.preventDefault();
                const navHeight = 72;
                const targetTop = targetEl.getBoundingClientRect().top + window.pageYOffset - navHeight;

                window.scrollTo({
                    top: targetTop,
                    behavior: 'smooth'
                });

                if (history.pushState) {
                    history.pushState(null, null, hash);
                }
            }
        });
    });
});

Alpine.start();
