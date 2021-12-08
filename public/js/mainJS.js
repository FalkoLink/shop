//navbar scroll
window.onscroll = function() {myFunction()};

let navbar = document.getElementById("navbar_");
let sticky = navbar.offsetTop;
let inane = document.getElementById("inane");

function myFunction() {
    if (window.pageYOffset > sticky) {
        navbar.classList.add("fixed-top");
        inane.classList.remove("d-none");
        inane.classList.add("d-flex");
    } else {
        navbar.classList.remove("fixed-top");
        inane.classList.remove("d-flex");
        inane.classList.add("d-none");
    }
}
