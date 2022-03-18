import '../scss/index.scss';
// import '../../style.css';


document.addEventListener("DOMContentLoaded", function(e) {
    VANTA.TOPOLOGY({
    el: "#bg-animated",
    mouseControls: false,
    touchControls: false,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 2.00,
    color: 0xb14848,
    backgroundColor: 0x370101
    })
});