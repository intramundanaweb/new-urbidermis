/* Custom JS  */

jQuery(document).ready(function ($) {

   
    var height = $(window).height();

    $('.chocolat-lightboxx').height(height);

    if ($(window).width() < 768) {
    } else {
        var heightt = $(window).height();

        $('.vh-100').height(heightt);
    }

  
    /* Fix for scrolling modal Safari Mobile */

    $(function () {
        var $window = $(window),
        $body = $('body'),
        $modal = $('.modal'),
        scrollDistance = 0;

        $modal.on('show.bs.modal', function () {
        scrollDistance = $window.scrollTop();
        $body.css('top', scrollDistance * -1);
        });

        $modal.on('hidden.bs.modal', function () {
        $body.css('top', '');
        $window.scrollTop(scrollDistance);
        });
    });

    /* Smooth scrolling */
    $('.smooth-link').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
        }, 1000, 'swing');
    });


    //$('.select2-selection__arrow').addClass('select2-selection__arrow2');
    $('.select2-selection__arrow').addClass('icon-arrow-right');
    $('ul li:first-child').attr('disabled');


    $('.woocommerce-breadcrumb').addClass('wrapper color-grey-light2 fs-08 mt-lg-5 mt-3 pt-lg-5 d-lg-block d-none');



    /* ELIMAR ENLACE */
    /* $('span .url').click(function () {
        return false;
    }); */


    //SCRIPTS PARA WOOCOMMERCE
    $(document.body).trigger('wc_fragments_refreshed');

    $('.zoomImg').click(function () {
        //$('.woocommerce-product-gallery__trigger').trigger('click');
        $('.woo-variation-gallery-trigger').trigger('click');
    });
    $('.wvg-gallery-image').click(function () {
        //$('.woocommerce-product-gallery__trigger').trigger('click');
        $('.woo-variation-gallery-trigger').trigger('click');
    });

    /* PARA REFRESCAR EL CARRITO AL CAMBIAR LAS UNIDADES */
    $('div.woocommerce').on('change', '.qty', function(){
        $("[name='update_cart']").prop("disabled", false);
        $("[name='update_cart']").trigger("click"); 
    });

    

    /* ICONO PARA VER CONTRASEÑA WOOCOMMERCE LOGIN */

    $('span.show-password-input').addClass('fal fa-eye');

    $('span.show-password-input').on('click', function () {

        $(this).toggleClass('fa-eye-slash', 'fa-eye');

    });


    //Leer más en los textos introductorios
  

    $(".view-more").click(function() {
        $(this).toggle();
        $(".partial-text").toggle();
        $(".full-text").toggle();
        $(".view-less").toggle();
    })

    $(".view-less").click(function() {
        $(".full-text").toggle();
        $(".view-less").toggle();
        $(".partial-text").toggle();
        $(".view-more").toggle();
        $('body').animate({
        scrollTop: $(".section-header").offset().top
        }, 800);

    })

});

// páginas gracias

document.addEventListener('wpcf7mailsent', function (event) {
  if ('192' == event.detail.contactFormId) {
    location = '#';
  } else if ('302' == event.detail.contactFormId) {
    location = '#';
  }
}, false);

