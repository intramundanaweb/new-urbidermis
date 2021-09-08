/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

    /** Slick cover - Cover section*/
    jQuery('.slick-cover').slick({
        infinite: true,
        speed: 800,
        autoplaySpeed: 3500,
        autoplay: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        arrows: false,
        fade: false,
        dots: false,
        lazyLoad: 'ondemand',
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    jQuery('#slick-cover-left').on('click', function (e) {
        jQuery('.slick-cover').slick('slickPrev');
    });
    
    jQuery('#slick-cover-right').on('click', function (e) {
        jQuery('.slick-cover').slick('slickNext');
    });
    
      
    /** Slick articles - Reference section */
    jQuery('.slick-articles').slick({
        infinite: true,
        speed: 300,
        //autoplaySpeed: 3500,
        //autoplay: true,
        slidesToScroll: 1,
        slidesToShow: 2,
        arrows: false,
        fade: false,
        dots: false,
        centerMode: false,
        variableWidth: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
    });
    
    jQuery('#slick-article-left').on('click', function (e) {
        jQuery('.slick-articles').slick('slickPrev');
    });
    
    jQuery('#slick-article-right').on('click', function (e) {
        jQuery('.slick-articles').slick('slickNext');
    });

});