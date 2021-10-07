jQuery(document).ready(function ($) {

    $(".card-header").click(function() {
        if ($(this).children(1).hasClass('collapsed')) {
            $(this).find(".product-title").css('color', '#87966e');
            $(this).css('background', '#f6f5f1');
        } else {
            $(this).find(".product-title").css('color', '#000');
            $(this).css('background', '#e5e4dc');
        }
        
    })

})