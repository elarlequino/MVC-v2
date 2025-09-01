//Caroussel de base
$(document).ready(function(){
    $('.caroussel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: "linear",
        dots: true,
    });
});

//Caroussel moyen et petit
$(document).ready(function(){
    $('.carousselmoyen').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: "linear",
        asNavFor:".carousselpetit",
    });
});

$(document).ready(function(){
    $('.carousselpetit').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: "linear",
        asNavFor:".carousselmoyen",
    });
});

//Caroussel à Article
$(document).ready(function(){
    $('.carousselarticle').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: "linear",
    });
});

//Modale
$(document).ready(function() {  
    $('.modal-btn').magnificPopup({
      type:'inline',
      closeBtnInside:true,
      autoFocusLast: true,
      focus:".modal-title",
    });
});