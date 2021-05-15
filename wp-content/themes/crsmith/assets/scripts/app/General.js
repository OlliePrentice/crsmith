// import $ from 'jquery';
// import 'jquery-match-height/dist/jquery.matchHeight';
import resizeEvent from "../utilities/triggerResizeEvent";
import imagesLoaded from 'imagesloaded';
import Dropkick from 'dropkickjs';
import 'dropkickjs/dist/dropkick.css';
import ImageCompare from './ImageCompare';

function General() {

    let t;
    // $('.mh').matchHeight();

    // $.fn.matchHeight._afterUpdate = function(event, groups) {
    //     window.dispatchEvent(resizeEvent);
    // };

    const offersExpander = document.querySelectorAll('.offers-expander');

    offersExpander.forEach((el) => {

        el.addEventListener('click', (e) => {
            const item = e.currentTarget;

            if(!item.classList.contains('active')) {
                item.classList.add('active');
                item.querySelectorAll('.expander-btn').forEach(btn => btn.classList.add('active'));
            } else {
                item.classList.remove('active');
                item.querySelectorAll('.expander-btn').forEach(btn => btn.classList.remove('active'));
            }

        });
    });

    const dropSelects = document.querySelectorAll('.drop-select');

    dropSelects.forEach((el) => {
        const dropSelect = new Dropkick(el, {
            change: function() {
                if(el.classList.contains('scroll-links')) {
                    $('html, body').animate({
                        scrollTop: $(`#${this.value}`).offset().top - $('.main-header').outerHeight()
                    }, 600);
                }
            }
        });
    });



    function setHalfBackgrounds() {
        const halfBackground = document.querySelectorAll('.half-background');

        halfBackground.forEach((el) => {
            const imageHeight = el.parentElement.querySelector('img').offsetHeight;

            el.style.height = `${imageHeight}px`;
        });
    }

    function comparisonImageSizes() {

        document.querySelectorAll('.img-comp-container').forEach((el) => {

            const container = el;
            const width = container.offsetWidth;
            
            container.querySelectorAll('.img-comp-img').forEach((imgWrap) => {

                const img = imgWrap.querySelector('img');
                img.style.width = `${width}px`;

                const imgHeight = img.offsetHeight;
                container.style.height = `${imgHeight}px`;

            });

        });

    }

    imagesLoaded( document.querySelectorAll('.img-comp-container'), () => {
        comparisonImageSizes();
        ImageCompare();
    });

    let windowWidth = window.innerWidth;
    
    const updateDimensions = (e) => {

        clearTimeout(t);

        if (updateDimensions._tick) {
            cancelAnimationFrame(updateDimensions._tick);
        }

        updateDimensions._tick = requestAnimationFrame(function () {
            updateDimensions._tick = null;

            setHalfBackgrounds();

            t = setTimeout(() => {

                let newWindowWidth = window.innerWidth;

                if ( newWindowWidth !== windowWidth ) {

                    windowWidth = newWindowWidth;
                    comparisonImageSizes();
                    ImageCompare();

                }

            }, 1000);

        });

    };

    window.addEventListener('resize', updateDimensions);

}

export default General;
