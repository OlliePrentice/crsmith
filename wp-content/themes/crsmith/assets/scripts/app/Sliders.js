import Swiper, {Navigation, Pagination, EffectFade, Autoplay} from "swiper";
import 'swiper/swiper-bundle.css';
import resizeEvent from "../utilities/triggerResizeEvent";

Swiper.use([Navigation, Pagination, EffectFade, Autoplay]);

export default function Sliders() {


    const initSwiper = (el, options) => {
        if(el.swiper !== undefined) {
            el.swiper.destroy();
        }

        options.init = false;

        const carousel = new Swiper(el, options);

        function dummyArrows() {
            if(options.arrowsOnSlides) {
                el.querySelectorAll('.swiper-button-prev').forEach((item) => {
                    item.addEventListener('click', () => {
                        carousel.slidePrev();
                    });
                });

                el.querySelectorAll('.swiper-button-next').forEach((item) => {
                    item.addEventListener('click', () => {
                        carousel.slidePrev();
                    });
                });
            }
        }

        carousel.on('init', () => {
            window.dispatchEvent(resizeEvent);

            dummyArrows();
        });

        carousel.init();

        carousel.on('slideChangeTransitionEnd', () => {
            window.dispatchEvent(resizeEvent);
            document.querySelectorAll('.offers-expander__body').forEach(el => el.addEventListener('click', e => e.stopPropagation()));

            dummyArrows();
    
        });
    };

    document.querySelectorAll('.header-carousel__slider').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 'auto',
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.parentNode.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.parentNode.querySelector('.swiper-button-next'),
                prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
            },
        });
    });

    function offersSliders() {
        document.querySelectorAll('.offers-expander__items').forEach((elem) => {
            const options = {
                slidesPerView: 1,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: {
                    delay: 5000,
                },
            };

            const slides = elem.querySelectorAll('.swiper-slide');

            if(slides.length > 1) {
                options.loop = true;
            } else {
                options.allowTouchMove = false;
            }

            initSwiper(elem, options);
        });
    }

    offersSliders();

    document.querySelectorAll('.menu-item-has-children').forEach(item => item.addEventListener('click', () => offersSliders() ));

    document.querySelectorAll('.featured-products-carousel__slider').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 'auto',
            spaceBetween: 22,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.parentNode.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.parentNode.querySelector('.swiper-button-next'),
                prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
            },
        });
    });


    document.querySelectorAll('.testimonial-carousel__items').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 1,
            spaceBetween: 20,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.parentNode.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.parentNode.querySelector('.swiper-button-next'),
                prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
            },
        });
    });

    document.querySelectorAll('.image-carousel__slides').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
            loopAdditionalSlides: 3,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.parentNode.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.parentNode.querySelector('.swiper-button-next'),
                prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
            },
        });
    });


    document.querySelectorAll('.image-slider__slides').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            loop: true,
            arrowsOnSlides: true,
            autoHeight: true,
            // autoplay: {
            //     delay: 5000,
            // },
        });
    });

    document.querySelectorAll('.offer-carousel__items').forEach((elem) => {
        initSwiper(elem, {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            loop: true,
            autoHeight: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.parentNode.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.parentNode.querySelector('.swiper-button-next'),
                prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
            },
        });

    });

    document.querySelectorAll('.full-width-carousel__slides').forEach((elem) => {
        const centered = elem.getAttribute('data-slides');

        initSwiper(elem, {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            loopAdditionalSlides: 4,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: elem.closest('.full-width-carousel').querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: elem.closest('.full-width-carousel').querySelector('.swiper-button-next'),
                prevEl: elem.closest('.full-width-carousel').querySelector('.swiper-button-prev'),
            },
            centeredSlides: centered ? true : false
        });

    });

    function collectionSliders() {
        document.querySelectorAll('.collection-slider__images').forEach((elem) => {
            initSwiper(elem, {
                slidesPerView: 5,
                centeredSlides: true,
                loop: true,
                loopedSlides: 10,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: elem.closest('.tab-content').querySelector('.swiper-pagination'),
                    type: 'bullets',
                    clickable: true
                },
                navigation: {
                    nextEl: elem.closest('.tab-content').querySelector('.swiper-button-next'),
                    prevEl: elem.closest('.tab-content').querySelector('.swiper-button-prev'),
                },
            });

        });
    }

    function colourSliders() {

        document.querySelectorAll('.colour-slider__items').forEach((elem) => {

            const mode          = elem.getAttribute('data-mode');
            const centerSlides  = elem.getAttribute('data-center');
            const slidesPerView = elem.getAttribute('data-slides');

            const options = {
                slidesPerView: slidesPerView,
                spaceBetween: 40, 
                autoplay: {
                    delay: 5000,
                },
                centerInsufficientSlides: true,
                pagination: {
                    el: elem.closest('.tab-content').querySelector('.swiper-pagination'),
                    type: 'bullets',
                    clickable: true
                },
                navigation: {
                    nextEl: elem.closest('.tab-content').querySelector('.swiper-button-next'),
                    prevEl: elem.closest('.tab-content').querySelector('.swiper-button-prev'),
                },
            };

            if ( elem.querySelector('.swiper-wrapper').children.length <= 4 ) {
                elem.closest('.tab-content').classList.add('insufficient-slides');
            }

            if( elem.querySelector('.swiper-wrapper').children.length > 4 ) {
                options.loop = true;
            }

            if(centerSlides) {
                options.centeredSlides = true;
            }

            initSwiper(elem, options);
        });
    }

    colourSliders();
    collectionSliders();

    document.querySelectorAll('.tabbed-items').forEach((elem) => {

        elem.querySelector('.tab-content').classList.add('active');
        elem.querySelector('.tab-action').classList.add('fill');

        elem.querySelectorAll('.tab-action').forEach((tab) => {
            tab.addEventListener('click', (e) => {
                const index = [...tab.closest('.buttons').children].indexOf(tab.parentElement);

                elem.querySelectorAll('.tab-action').forEach(elem => elem.classList.remove('fill'));
                e.currentTarget.classList.toggle('fill');

                elem.querySelectorAll('.tab-content').forEach(slider => slider.classList.remove('active'));
                elem.querySelectorAll('.tab-content')[index].classList.add('active');

                colourSliders();
                collectionSliders();
            });
        });
    });


}

