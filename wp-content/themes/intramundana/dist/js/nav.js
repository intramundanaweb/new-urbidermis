/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

    
    // Menu Interaction

    if ($(window).width() > 769) {

        /*  $('#navbar').css({
           "right": "-20vw"
         }); */

        $('a[data-target="#navbar"]').on('click', function (e) {
            e.preventDefault();
            
            $('#navbar').stop().animate({
                "left": "0"
            });
            
        });

        $('.close-menu').on('click', function (e) {
            e.preventDefault();
            $('#navbar').stop().animate({
                "left": "-100vw"
            });
            $('.navbar-toggler-right').fadeIn(100);

        });


    }

    if ($(window).width() < 769) {

        /* $('#navbar').css({
          "right": "-80vw"
        }); */
        $('.navbar-toggler-right').on('click', function (e) {
            e.preventDefault();
            $('#navbar').stop().animate({
                "left": "0"
            });
            $('.close-menu').fadeIn(300);
            $(this).fadeOut(10);
        });

        $('.close-menu').on('click', function (e) {
            e.preventDefault();
            $('#navbar').stop().animate({
                "left": "-100vw"
            });
            $('.navbar-toggler-right').fadeIn(300);
            $(this).fadeOut(30);
        });
    }


    /* $('.dropdown-toggle').on('click', function () {
        $('#navModal').fadeIn(500, 'swing');
      }); */

    // Header scroll effect
    if ($(window).scrollTop() > 0) {
        $('.navbar-transition').addClass('scrolled');
        $('.scrolled-items').addClass('scrolled');
        $('.initial-header').addClass('scrolled');
    }

    $(window).scroll(function () {
        var $nav = $('.navbar-transition');
        var $nav1 = $('.scrolled-items');
        var $nav2 = $('.initial-header');
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $nav1.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $nav2.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });

    /* HOVER CON IMAGENES EN LOS SUBMENUS */

    if ($(window).width() > 769) {

        /* NOSOTROS */

        $('#menu-item-37 a').mouseenter(function () {
            $('#navbar').addClass('nuestra-historia');
        });

        $('#menu-item-37 a').mouseleave(function () {
            $('#navbar').removeClass('nuestra-historia');
        });


        $('#menu-item-202 a').mouseover(function () {
            $('#navbar').addClass('filosofia');
        });

        $('#menu-item-202 a').mouseleave(function () {
            $('#navbar').removeClass('filosofia');
        });


        $('#menu-item-201 a').mouseover(function () {
            $('#navbar').addClass('autores');
        });

        $('#menu-item-201 a').mouseleave(function () {
            $('#navbar').removeClass('autores');
        });


        $('#menu-item-200 a').mouseover(function () {
            $('#navbar').addClass('parc-belloch');    
        });

        $('#menu-item-200 a').mouseleave(function () {
            $('#navbar').removeClass('parc-belloch');
        });


        $('#menu-item-199 a').mouseover(function () {
            $('#navbar').addClass('talento');    
        });

        $('#menu-item-199 a').mouseleave(function () {
            $('#navbar').removeClass('talento');
        });

        /* PRODUCTO */
        $('#menu-item-472 a').mouseover(function () {
            $('#navbar').addClass('iluminacion-urbana');
        });

        $('#menu-item-472 a').mouseleave(function () {
            $('#navbar').removeClass('iluminacion-urbana');
        });


        $('#menu-item-473 a').mouseover(function () {
            $('#navbar').addClass('mobiliario-urbano');
        });

        $('#menu-item-473 a').mouseleave(function () {
            $('#navbar').removeClass('mobiliario-urbano');
        });


        $('#menu-item-474 a').mouseover(function () {
            $('#navbar').addClass('microarquitectura');
        });

        $('#menu-item-474 a').mouseleave(function () {
            $('#navbar').removeClass('microarquitectura');
        });


        $('#menu-item-476 a').mouseover(function () {
            $('#navbar').addClass('viver-de-belloch');
        });

        $('#menu-item-476 a').mouseleave(function () {
            $('#navbar').removeClass('viver-de-belloch');
        });

        /* CONOCIMIENTO */
        $('#menu-item-388 a').mouseover(function () {
            $('#navbar').addClass('galeria-de-proyectos');
        });

        $('#menu-item-388 a').mouseleave(function () {
            $('#navbar').removeClass('galeria-de-proyectos');
        });


        $('#menu-item-389 a').mouseover(function () {
            $('#navbar').addClass('casos-practicos');
        });

        $('#menu-item-389 a').mouseleave(function () {
            $('#navbar').removeClass('casos-practicos');
        });


        $('#menu-item-390 a').mouseover(function () {
            $('#navbar').addClass('publicaciones');
        });

        $('#menu-item-390 a').mouseleave(function () {
            $('#navbar').removeClass('publicaciones');
        });

    }

});

/* OCULTAR HEADER EN SCROLL DOWN */
var lastScrollTop = 0;
window.addEventListener("scroll", function(){
   var st = window.pageYOffset || document.documentElement.scrollTop; 
   if(st > lastScrollTop && st > 0){
           if (screen.width > 768) {//Para desktop
               jQuery("#masthead").css({"top" : "-85px"});
           }
           if (screen.width < 768) {//Para moviles
               jQuery("#masthead").css({"top" : "0px"});
                
           }
   }else{
         jQuery("#masthead").css({"top" : "0px"});
   }
   lastScrollTop = st;
},false);