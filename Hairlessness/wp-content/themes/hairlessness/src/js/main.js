const backToTopBtn = document.getElementById("back-to-top");
function scrollBackToTop() {
    if (document.documentElement.scrollTop > 500) {
        backToTopBtn.style.display = "block";
    } else {
        backToTopBtn.style.display = "none";
    }
}
window.addEventListener("scroll", scrollBackToTop, false);


let modal = document.getElementById("myModal");
let i;
let img = document.getElementsByClassName("myImg");
let modalImg = document.getElementById("showImg");
let close = document.getElementById("close")


for (i = 0; i < img.length; i++) {
    img[i].onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
    };
    close.onclick = function () {
        modal.style.display = "none";
    };
}