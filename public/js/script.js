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
