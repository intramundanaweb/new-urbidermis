<?php
/**
 * Embed Styles
 *
 * @package santa-cole
 */

/* ------------- Embed Modular CSS */
function include_styles() {
  wp_enqueue_style('santa-cole-bs-css', get_template_directory_uri() . '/dist/css/bootstrap.min.css' );
  wp_enqueue_style('santa-cole-bsmm-css', get_template_directory_uri() . '/dist/css/bootstrap.min.css.map' );
  wp_enqueue_style('santa-cole-bsmm-css', get_template_directory_uri() . '/dist/css/bootstrap.css.map' );
  wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/dist/css/slick.css' );
  wp_enqueue_style( 'style-cookies', get_template_directory_uri() . '/dist/css/style-cookies.css' );
  wp_enqueue_style('style-admin', get_template_directory_uri() . '/dist/css/style-admin.css' );
  wp_enqueue_style('style-banner', get_template_directory_uri() . '/dist/css/style-banner.css' );
  wp_enqueue_style('style-blog', get_template_directory_uri() . '/dist/css/style-blog.css' );
  wp_enqueue_style('style-borders', get_template_directory_uri() . '/dist/css/style-borders.css' );
  wp_enqueue_style('style-colors', get_template_directory_uri() . '/dist/css/style-colors.css' );
  wp_enqueue_style('style-404', get_template_directory_uri() . '/dist/css/style-404.css' );
  wp_enqueue_style('galeria-proyectos', get_template_directory_uri() . '/dist/css/template-galeria-proyectos.css' );
  wp_enqueue_style('style-single-proyecto', get_template_directory_uri() . '/dist/css/single-proyecto.css' );
  wp_enqueue_style('template-inicio', get_template_directory_uri() . '/dist/css/template-inicio.css' );
  wp_enqueue_style('template-autores', get_template_directory_uri() . '/dist/css/template-autores.css' );
  wp_enqueue_style('template-equipo', get_template_directory_uri() . '/dist/css/template-equipo.css' );
  wp_enqueue_style('single-autor', get_template_directory_uri() . '/dist/css/single-autor.css' );
  wp_enqueue_style('style-extras', get_template_directory_uri() . '/dist/css/style-extras.css' );
  wp_enqueue_style('style-fonts', get_template_directory_uri() . '/dist/css/style-fonts.css' );
  wp_enqueue_style('style-footer', get_template_directory_uri() . '/dist/css/style-footer.css' );
  wp_enqueue_style('style-forms', get_template_directory_uri() . '/dist/css/style-forms.css' );
  wp_enqueue_style('style-gallery', get_template_directory_uri() . '/dist/css/style-gallery.css' );
  wp_enqueue_style('style-general', get_template_directory_uri() . '/dist/css/style-general.css' );
  wp_enqueue_style('style-icons', get_template_directory_uri() . '/dist/css/style-icons.css' );
  wp_enqueue_style('style-navbar', get_template_directory_uri() . '/dist/css/style-navbar.css' );
  wp_enqueue_style('style-slick', get_template_directory_uri() . '/dist/css/style-slick.css' );
  wp_enqueue_style('style-header', get_template_directory_uri() . '/dist/css/style-header.css' );
  wp_enqueue_style('style-tabs', get_template_directory_uri() . '/dist/css/style-tabs.css' );
  wp_enqueue_style('custom-css', get_template_directory_uri() . '/dist/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'include_styles' );
