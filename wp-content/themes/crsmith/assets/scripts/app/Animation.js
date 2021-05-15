import gsap from 'gsap';
import ScrollTrigger from "gsap/ScrollTrigger";
import msieversion from "../utilities/msieversion";

if (!msieversion()) {
    gsap.registerPlugin(ScrollTrigger);
}

export default function Animation() {

    if (!msieversion()) {

        const blurScrollers = document.querySelectorAll('.blur-scroller');

        blurScrollers.forEach((el) => {
            gsap.timeline({
                scrollTrigger: {
                    trigger: el,
                    start: "top center",
                    end: "bottom+=50%",
                    scrub: true,
                }
            })
            .to(el, {filter: 'blur(0px)', duration: 1})
            .to(el, {filter: 'blur(0px)', duration: 2})
            .to(el, {filter: 'blur(25px)', duration: 3});
        });

    }

}