const backToTopBtn = document.getElementById("back-to-top");

//window.onscroll = function() {scrollBackToTop()};

function scrollBackToTop() {
    if (document.documentElement.scrollTop > 500) {
        backToTopBtn.style.display = "block";
    } else {
        backToTopBtn.style.display = "none";
    }
}

window.addEventListener("scroll", scrollBackToTop, false);