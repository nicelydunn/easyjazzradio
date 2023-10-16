(function($) {
    $('#js-slick-quotes').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev absolute left-4 center-vertically z-50"><svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-gray-600 transition-all hover:fill-white" viewBox="0 0 24 24"><path d="M8.29 11.29a1 1 0 0 0-.21.33 1 1 0 0 0 0 .76 1 1 0 0 0 .21.33l3 3a1 1 0 0 0 1.42-1.42L11.41 13H15a1 1 0 0 0 0-2h-3.59l1.3-1.29a1 1 0 0 0 0-1.42 1 1 0 0 0-1.42 0ZM2 12A10 10 0 1 0 12 2 10 10 0 0 0 2 12Zm18 0a8 8 0 1 1-8-8 8 8 0 0 1 8 8Z"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next absolute right-4 center-vertically z-50"><svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-gray-600 transition-all hover:fill-white" viewBox="0 0 24 24"><path d="M15.71 12.71a1 1 0 0 0 .21-.33 1 1 0 0 0 0-.76 1 1 0 0 0-.21-.33l-3-3a1 1 0 0 0-1.42 1.42l1.3 1.29H9a1 1 0 0 0 0 2h3.59l-1.3 1.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0ZM22 12a10 10 0 1 0-10 10 10 10 0 0 0 10-10ZM4 12a8 8 0 1 1 8 8 8 8 0 0 1-8-8Z"/></svg></button>'
    });
})(jQuery);