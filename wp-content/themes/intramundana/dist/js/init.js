/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

    // Menu Interaction

    /* $('.dropdown-toggle').on('click', function () {
        $('#navModal').fadeIn(500, 'swing');
      }); */

    /* Prevent Contact Form double submission */

    /* $('.wpcf7-submit').on('click', function (e) {
        if ( $(this).siblings('.ajax-loader').hasClass('is-active') ) {
            e.preventDefault();
          return false;
        }
    }); */

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


    //Formulario, selec
    $('b[role="presentation"]').hide();
    $('ul li:first-child').attr('disabled');

    /* Dropdown menu on hover */
    /*   $('ul.navbar-nav li.dropdown').not('ul.navbar-nav li.dropdown .dropdown-item').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
     */
    var $status = $('.slider-info');
    var $slickElement = $('.slider-galeria');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        if (!slick.$dots) {
            return;
        }

        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + (slick.$dots[0].children.length));
        //console.log(i);
        $(document).on('click', '.slick-current,.edit', function () {
            var first = $('#firstname' + i).text();
            var steg = $('#descripname' + i).text();

            $('#efirstname').text(first);
            $('#descrnametext').text(steg);
        });

    });

    $('.slider-galeria').slick({
        infinite: true,
        speed: 300,
        autoplaySpeed: 3500,
        autoplay: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        arrows: false,
        fade: false,
        dots: true,
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

    $('#slider-right').on('click', function (e) {
        $('.slider-galeria').slick('slickNext');
    });

    $('#slider-left').on('click', function (e) {
        $('.slider-galeria').slick('slickPrev');
    });


    //SLIDER HOME
    const slider = $(".slider-item");
    slider
        .slick({
            vertical: true,
            infinite: false,
            speed: 500,
            autoplaySpeed: 3500,
            autoplay: false,
            slidesToScroll: 1,
            slidesToShow: 1,
            arrows: false,
            fade: false,
            dots: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    autoplay: true,
                    infinite: true,
                    vertical: true,
                }
            }]
        });

    if ($(window).width() > 768) {
        slider.on('wheel', (function (e) {
            e.preventDefault();

            if (e.originalEvent.deltaY > 0) {
                $(this).slick('slickNext');
            } else {
                $(this).slick('slickPrev');
            }
        }));
    }

    if ($(window).width() < 768) {


        /* slider.on({
          'touchmove': function (e) {
            e.preventDefault();
            if (e.originalEvent.deltaY < 0) {
              console.log('down');
              $(this).slick('slickPrev');
            } else {
              console.log('up');
              $(this).slick('slickNext');
            }
          }
        }); */



        slider.on({
            'touchmove': function (e) {
                let touch = e.touches[0];
                if (touch.clientY) {
                    console.log('up');
                    $(this).slick('slickNext');

                } else {
                    console.log('down');
                    $(this).slick('slickPrev');
                }
            }
        });
    }

    var height = $(window).height();

    $('.height-200').height(height);

    /* 
        $('.custom-height').scroll(function (event) {
        $('.custom-height').scrollTop();
    }); */

    /*  $('.custom-height').scroll(function (event) {
       $('.custom-height').addClass('pr-3');
     });
  
    */


    //$('body.page-template-template-login').css('overflow-y', 'hidden');


    /* ELIMAR ENLACE */
    /* $('span .url').click(function () {
      return false;
    }); */

    $('#searchModal').on('shown.bs.modal', function () {
        $('input.input-activo').trigger('focus');
    });
    //.focus();
    var height = $(window).height();

    $('.height-300').height(height);

    if ($(window).width() > 769) {

        var height = $(window).height();

        $('.height-300').height(height);

        //Abrir modal de info fotos
        $('.sidecontent').css({
            "right": "-20vw"
        });
        $('.buttom-info-photo').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent').stop().animate({
                "right": "0"
            });
        });

        $('.closebtn').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent').stop().animate({
                "right": "-20vw"
            });
        });

        //Abrir modal de presi
        $('.sidecontent-presi').css({
            "right": "-40vw"
        });
        $('#open-modal-presi').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-presi').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-presi').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-presi').stop().animate({
                "right": "-40vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de vicepresi
        $('.sidecontent-vicepresi').css({
            "right": "-40vw"
        });
        $('#open-modal-vicepresi').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-vicepresi').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-vicepresi').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-vicepresi').stop().animate({
                "right": "-40vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de secre
        $('.sidecontent-secre').css({
            "right": "-40vw"
        });
        $('#open-modal-secre').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-secre').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-secre').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-secre').stop().animate({
                "right": "-40vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de legal
        $('.sidecontent-legal').css({
            "right": "-40vw"
        });
        $('#open-modal-legal').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-legal').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-legal').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-legal').stop().animate({
                "right": "-40vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modales de voceros

        $('.sidecontent-vocero.modal').on('shown.bs.modal', function () {
            $('.sidecontent-vocero').stop().animate({
                "right": "0",
                "left": "auto",
            });
        });

        $('.sidecontent-vocero.modal').on('hidden.bs.modal', function () {
            $('.sidecontent-vocero').stop().animate({
                "right": "-40vw",
            });
        });
    }

    if ($(window).width() < 769) {

        //Abrir modal de info fotos
        $('.sidecontent').css({
            "right": "-70vw"
        });
        $('.buttom-info-photo').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent').stop().animate({
                "right": "0"
            });
        });

        $('.closebtn').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent').stop().animate({
                "right": "-70vw"
            });
        });

        //Abrir modal de presi
        $('.sidecontent-presi').css({
            "right": "-80vw"
        });
        $('#open-modal-presi').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-presi').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-presi').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-presi').stop().animate({
                "right": "-80vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de vicepresi
        $('.sidecontent-vicepresi').css({
            "right": "-80vw"
        });
        $('#open-modal-vicepresi').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-vicepresi').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-vicepresi').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-vicepresi').stop().animate({
                "right": "-80vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de secre
        $('.sidecontent-secre').css({
            "right": "-80vw"
        });
        $('#open-modal-secre').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-secre').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-secre').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-secre').stop().animate({
                "right": "-80vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

        //Abrir modal de legal
        $('.sidecontent-legal').css({
            "right": "-80vw"
        });
        $('#open-modal-legal').on('click', function (e) {

            e.preventDefault();
            $('.sidecontent-legal').stop().animate({
                "right": "0"
            });
            $('body').css('overflow-y', 'hidden');
        });

        $('.closebtn-legal').on('click', function (e) {
            e.preventDefault();
            $('.sidecontent-legal').stop().animate({
                "right": "-80vw"
            });
            $('body').css('overflow-y', 'scroll');
        });

    }

});


/*
==============================
Page: Thank you Page
==============================
*/

document.addEventListener('wpcf7mailsent', function (event) {
    if ('192' == event.detail.contactFormId) {
        location = '#';
    } else if ('302' == event.detail.contactFormId) {
        location = '#';
    }
}, false);


/**/

window.mobileCheck = function() {
    let check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    
    return check;
};