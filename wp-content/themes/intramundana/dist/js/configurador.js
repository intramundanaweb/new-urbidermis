/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {


  /* ACTIVADOR DE INPUT TYPE="TEXT" A PARTIR DE UN INPUT RADIO */
  $(function(){
    $("input[name='customRadioAcabado']").change(function(){
      if($(this).val()==1){
        $("#fijo").attr("disabled",true);
        $("#tcontenidoMod").removeAttr("disabled");
        /* PARA QUE QUEDE EL CURSOR ACTIVO */
        $('input#tcontenidoMod').trigger('focus');
      }
    });
  });


});
