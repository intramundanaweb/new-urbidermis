/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

    
    // Menu Interaction

    if ($(window).width() > 769) {

        /*  $('#navbar').css({
           "right": "-20vw"
         }); */

        $('a[data-target="#navbar"]').on('click', function (e) {
            e.preventDefault();
            alert('entro');
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