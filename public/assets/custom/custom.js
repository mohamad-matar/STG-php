/**
 * Back to top button
 */
let backtotop = document.querySelector(".back-to-top");

const toggleBacktotop = () => {
    if (window.scrollY > 100) backtotop.classList.add("active");
    else backtotop.classList.remove("active");
};

window.addEventListener("scroll", toggleBacktotop);

