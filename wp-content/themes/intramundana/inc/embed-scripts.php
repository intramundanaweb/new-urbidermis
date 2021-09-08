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
  //wp_enqueue_script ('bsm-js', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'include_scripts' );