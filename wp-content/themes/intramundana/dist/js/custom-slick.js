/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

    /*
    ==============================
    Page: Template-inicio
    ==============================
    */

    /** Slick cover - Cover section*/
    $('.slick-cover').slick({
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

    $('#slick-cover-left').on('click', function (e) {
        $('.slick-cover').slick('slickPrev');
    });
    
    $('#slick-cover-right').on('click', function (e) {
        $('.slick-cover').slick('slickNext');
    });
    
      
    /** Slick articles - Reference section */
    $('.slick-articles').slick({
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
    
    $('#slick-article-left').on('click', function (e) {
        $('.slick-articles').slick('slickPrev');
    });
    
    $('#slick-article-right').on('click', function (e) {
        $('.slick-articles').slick('slickNext');
    });


    /*
    ==============================
    Page: Single-proyecto
    ==============================
    */

    /** Slick products - Section products */
    $('.slick-productos').slick({
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
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    
    /*$('#slick-article-left').on('click', function (e) {
        $('.slick-articles').slick('slickPrev');
    });
    
    $('#slick-article-right').on('click', function (e) {
        $('.slick-articles').slick('slickNext');
    });*/


    /*
    ==============================
    Page: Template-Autores
    ==============================
    */

    /** Slick articles - Reference section */
    $('.slick-autors').slick({
        infinite: true,
        speed: 300,
        //autoplaySpeed: 3500,
        //autoplay: true,
        slidesToScroll: 1,
        slidesToShow: 4,
        arrows: false,
        fade: false,
        dots: false,
        centerMode: false,
        variableWidth: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }]
    });
    
    $('#slick-autors-left').on('click', function (e) {
        $('.slick-autors').slick('slickPrev');
    });
    
    $('#slick-autors-right').on('click', function (e) {
        $('.slick-autors').slick('slickNext');
    });

});