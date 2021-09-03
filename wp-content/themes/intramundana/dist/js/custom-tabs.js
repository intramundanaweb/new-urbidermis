/* Custom JS for customizer tabs */

jQuery(document).ready(function ($) {

    $('.siguiente-tab').click(function () {
        $('#nav-tab > a[aria-selected~="true"]').next().click();
        
    });
    
    $('.anterior-tab').click(function () {
        $('#nav-tab > a[aria-selected~="true"]').prev().trigger('click');
    });

   

});