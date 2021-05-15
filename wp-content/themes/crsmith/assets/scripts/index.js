// Polyfills
import "core-js/stable/promise";
import "core-js/stable/number";
import "core-js/stable/array";
import "regenerator-runtime/runtime";

// Load Vendor
import AOS from 'aos';
import '@fancyapps/fancybox/dist/jquery.fancybox';
import '@fancyapps/fancybox/dist/jquery.fancybox.css';

// Load App
import Menu from './app/Menu';
import ScrollTo from './app/ScrollTo';
import Sliders from './app/Sliders';
import General from './app/General';
import Animation from './app/Animation';
import Accordion from './app/Accordion';

(() => {

    ScrollTo();
    General();
    Sliders();
    Menu();
    Accordion();
    

})();

window.onload = () => {

    Animation();
    
    AOS.init({
        once: true
    });



};
