// BANNER
$('.slide-banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    autoplaySpeed: 2000,
});

// Marcas

$('.marcas-confiaveis .site div').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 2000,
});

// DEPO - SLIDE
$('.depoimento-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    fade: true,
    autoplaySpeed: 2000,
});


// back to top 
function scrollFunction() {
    var btn = document.querySelector(".scrollup-trigger");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        btn.classList.add("show"); 
    } else {
        btn.classList.remove("show"); 
    }
}

document.querySelector(".scrollup-trigger").onclick = function() {
    window.scrollTo({
        top: 0, 
        behavior: 'smooth' 
    });
};

window.onscroll = function() {
    scrollFunction();
};
