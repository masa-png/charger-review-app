var $slide =  $(".slide")
  .slick({
        fade: true,
        speed: 2500,
        autoplaySpeed: 4500,
        arrows: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true
    });

$(document).ready(function() {
    $('.multiple-items').slick( {
        slidesToShow: 3,
        autoplay: true,
        dots: false,
        arrows: true,
        speed: 800,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});

// アコーディオンメニュー
$(function() {
    $(".js-accordion-title").on("click", function() {
        $(this).next().slideToggle(100);
        $(this).toggleClass("open", 100);
    });
});

$(".input-comment").on("keyup", function() {
    let text = $(".input-comment").val();

    if (text) {
        $(".comment-button").prop("disabled", false);
    }
    else {
        $(".comment-button").prop("disabled", true);
    }
});

$(".input-reply").on("keyup", function() {
    let text = $(".input-reply").val();

    if (text) {
        $(".reply-button").prop("disabled", false);
    }
    else {
        $(".reply-button").prop("disabled", true);
    }
});


