<?php
/**
 * Embed Scripts
 *
 * @package santa-cole
 */

/* ------------- Embed JS Scripts */
function include_scripts() {
  
  wp_enqueue_script ('jquery', get_template_directory_uri() . '/dist/js/jquery-3.5.1.min.js', array('jquery'), '', true);
  wp_enqueue_script ('jquery-ui', get_template_directory_uri() . '/dist/js/jquery-ui.min.js', array('jquery'), '', true);
  wp_enqueue_script ('popper', get_template_directory_uri() . '/dist/js/popper.min.js', array('jquery'), '', true);
  wp_enqueue_script ('bs-js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '', true);
  wp_enqueue_script ('slick-js', get_template_directory_uri() . '/dist/js/slick.min.js', array('jquery'), '', true);
  wp_enqueue_script ('custom-slick', get_template_directory_uri() . '/dist/js/custom-slick.js', array('jquery'), '', true);
  wp_enqueue_script ('custom-tabs', get_template_directory_uri() . '/dist/js/custom-tabs.js', array('jquery'), '', true);
  wp_enqueue_script ('spinner-js', get_template_directory_uri() . '/dist/js/bootstrap-input-spinner.js', array('jquery'), '', true);
  wp_enqueue_script ('intra-init', get_template_directory_uri() . '/dist/js/init.js', array('jquery'), '', true);
  wp_enqueue_script ('intra-nav', get_template_directory_uri() . '/dist/js/nav.js', array('jquery'), '', true);
  wp_enqueue_script ('intra-config', get_template_directory_uri() . '/dist/js/configurador.js', array('jquery'), '', true);
  wp_enqueue_script ('galeria-proyectos', get_template_directory_uri() . '/dist/js/template-galeria-proyectos.js', array('jquery'), '', true);
  wp_enqueue_script ('single-proyectos', get_template_directory_uri() . '/dist/js/single-proyecto.js', array('jquery'), '', true);
  wp_enqueue_script ('single-autor', get_template_directory_uri() . '/dist/js/single-autor.js', array('jquery'), '', true);
  wp_enqueue_script ('template-inicio', get_template_directory_uri() . '/dist/js/template-inicio.js', array('jquery'), '', true);
  
  
  //wp_enqueue_script ('bsm-js', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'include_scripts' );

/* ------------- Embed JS Scripts urls */

add_action( 'wp_enqueue_scripts', 'include_scripts_cdn' );
function include_scripts_cdn(){
  wp_enqueue_script ('intra-font-awesome', 'https://kit.fontawesome.com/89a11451ca.js', array(), null, true);

  // Add filters to catch and modify the styles and scripts as they're loaded.
  add_filter( 'script_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri_crossorigin', 10, 2 );
}

/**
* Add SRI attributes based on defined script/style handles.
*/
function wpdocs_my_add_sri_crossorigin( $html, $handle ) : string {

  switch( $handle ) {
      case 'intra-font-awesome':
          $html = str_replace( '></script>', ' crossorigin="anonymous"></script>', $html );
          break;
  } 
  return $html;
}