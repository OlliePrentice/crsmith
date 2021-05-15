export default function msieversion() {

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    return msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./);

}