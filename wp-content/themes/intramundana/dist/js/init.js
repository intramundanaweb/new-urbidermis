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

    //Abrir modales de voceros

    $('.sidecontent-vocero.modal').on('shown.bs.modal', function () {
      $('.sidecontent-vocero').stop().animate({
        "right": "0",
        "left": "auto",
      });
    });

    $('.sidecontent-vocero.modal').on('hidden.bs.modal', function () {
      $('.sidecontent-vocero').stop().animate({
        "right": "-80vw",
      });
    });
  }

    /** Template-inicio scripts */

    // Change section-contact background on hovering button
    jQuery(".contact-btn").mouseenter(function () {
        jQuery(".section-contact").animate({
            backgroundColor: '#87966e'
        })
    }).mouseleave(function () {
        jQuery(".section-contact").animate({
            backgroundColor: '#e5e4dc'
        })
    })

    // Change section-skin background on hovering buttons 
    jQuery(".skin-buttons>button").mouseenter(function () {
        jQuery(".section-skin").animate({
            backgroundColor: '#b4714e'
        })
    }).mouseleave(function () {
        jQuery(".section-skin").animate({
            backgroundColor: '#f6f5f1'
        })
    })

    // Change section-reference background on hovering button
    jQuery(".btn-masPublicaciones").mouseenter(function () {
        jQuery(".section-reference").animate({
            backgroundColor: '#9dbfcc'
        })
    }).mouseleave(function () {
        jQuery(".section-reference").animate({
            backgroundColor: '#f6f5f1'
        })
    })

    // Parallax effect 'revolución urbana' (try)
    /*let big = jQuery(".big-title-section")

    const html = document.documentElement;
    const canvas = document.getElementById("myCanvas");
    const context = canvas.getContext("2d");

    const frameCount = 4;
    const currentFrame = index => (
    `/new-urbidermis/wp-content/themes/intramundana/vienen_${index.toString().padStart(0, '0')}.png`
    )

    const preloadImages = () => {
    for (let i = 1; i < frameCount; i++) {
        const img = new Image();
        img.src = currentFrame(i);
    }
    };

    const img = new Image()
    img.src = currentFrame(1);
    canvas.width=1903;
    canvas.height=168;
    img.onload=function(){
    context.drawImage(img, 0, 0);
    }

    const updateImage = index => {
    img.src = currentFrame(index);
    context.drawImage(img, 0, 0);
    }

    window.addEventListener('scroll', () => {  
    const scrollTop = big.scrollTop();
    const maxScrollTop = big.height() - window.innerHeight;
    const scrollFraction = scrollTop / maxScrollTop;
    const frameIndex = Math.min(frameCount - 1, Math.ceil(scrollFraction * frameCount));
    
    requestAnimationFrame(() => updateImage(frameIndex + 1))
    });

    preloadImages()*/

    
});

// páginas gracias

document.addEventListener('wpcf7mailsent', function (event) {
  if ('192' == event.detail.contactFormId) {
    location = '#';
  } else if ('302' == event.detail.contactFormId) {
    location = '#';
  }
}, false);