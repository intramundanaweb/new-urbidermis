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

  $('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-number').find('input');
    if (input.is('input')) {
      input[0][isNegative ? 'stepDown' : 'stepUp']()
    }
  });

  $("input[name='customRadio0']").change(function(){
    $('#collapseTwo').collapse('show');
  });

  /* $("input[name='unidades']").on('click', function(){
    if ($(this).val() !== 0) {
      $('#collapseThree').collapse('show');
    }
  }); */

    $("input#unidades").bind('keyup mouseup', function () {
      $('#collapseThree').collapse('show');  
      $('input#proyecto').trigger('focus');        
  });

});
