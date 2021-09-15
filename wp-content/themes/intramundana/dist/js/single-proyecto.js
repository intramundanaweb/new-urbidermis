jQuery(document).ready(function ($) {

/*
    ==============================
    Page: Single-proyecto
    ==============================
    */

    $(".icon-plus").click(function (e) {
        e.stopPropagation()
        $(".infoTec").toggle('slide', {
            direction: 'left'
        }, 500)
    })

    $(".icon-close,.icon-arrow-left").click(function () {
        $(".infoTec").toggle('slide', {
            direction: 'left'
        }, 500)
    })

    $(".infoTec").click(function (e) {
        e.stopPropagation()
    })

    $(document).on('click', function () {
        $(".infoTec").hide('slide', {
            direction: 'left'
        }, 500)
    });

    // Revisar, no funciona
    if ($("html").width() < 769) {
        $("body").click(function () {
            if ($(".infoTec").css('display') == 'block') {
                $("body").css("overflow", "hidden")
            } else {
                $("body").css("overflow", "auto")
            }
        })
    }


    /*let html = document.documentElement
    if ($(".infoTec").width() > 411) {
        $(document).scroll(function() {
        
            if ($("#masthead").css('top') > '0' ) {
                //console.log('epep')
                $(".infoTec").css('top', '63.3px')
            } else {
                $(".infoTec").css('top', '0px')
                //console.log('ipip')
            }
        })
    }*/

});