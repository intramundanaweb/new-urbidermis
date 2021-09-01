<?php
/**
 * Plugin Name: Setup CPT
 * Description: Register CPTs and Custom taxonomies
 * Version: 1.0.1
 * Author: Michell Arenales de Intramundana
 * Author URI: https://www.intramundana.com
*/


/*
==============================
Register CPT
==============================
*/
function registration_cpt() {

/* ------------- First CPT */
  register_post_type('empresas',
       array(
           'labels' => array(
               'name'              => __('empresas'),
           ),
           'public'      => true,
           'has_archive' => true,
           'menu_icon'   => 'dashicons-editor-ul',
           'supports' => array( 'title','thumbnail' ),
           'rewrite' => array( 'with_front' => false ),
       )
  );


    /* ------------- Second CPT */
  register_post_type('proyectos',
  array(
      'labels' => array(
          'name'              => __('proyectos'),
      ),
      'public'      => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-location',
      'supports' => array( 'title','thumbnail' ),
      'rewrite' => array( 'with_front' => false ),
  )
);



 }
 add_action( 'init', 'registration_cpt' );

/* ------------- Activation Hook */
 function register_cpt() {
     registration_cpt();
     flush_rewrite_rules();
 }
 register_activation_hook( __FILE__, 'register_cpt' );

/* ------------- Update CPT Labels */

add_action( 'init', 'change_cpt_label' );
function change_cpt_label() {
    $get_post_type = get_post_type_object('empresas');
    $labels = $get_post_type->labels;
    $labels->name = 'empresas';
    $labels->singular_name = 'empresa';
    $labels->add_new = 'Añadir empresa';
    $labels->add_new_item = 'Añadir empresa';
    $labels->edit_item = 'Editar empresa';
    $labels->new_item = 'empresas';
    $labels->view_item = 'Ver empresas';
    $labels->search_items = 'Buscar empresa';
    $labels->not_found = 'No se encontró la empresa';
    $labels->all_items = 'Todos las empresas';
    $labels->menu_name = 'Empresas';
    $labels->name_admin_bar = 'Empresas';
    $get_post_type = get_post_type_object('proyectos');
    $labels = $get_post_type->labels;
    $labels->name = 'proyectos';
    $labels->singular_name = 'proyectos';
    $labels->add_new = 'Añadir proyectos';
    $labels->add_new_item = 'Añadir proyectos';
    $labels->edit_item = 'Editar proyectos';
    $labels->new_item = 'proyectos';
    $labels->view_item = 'Ver proyectos';
    $labels->search_items = 'Buscar proyectos';
    $labels->not_found = 'No se encontró un proyectos';
    $labels->all_items = 'Todos los proyectos';
    $labels->menu_name = 'Proyectos';
    $labels->name_admin_bar = 'Proyectos';

}
 /*
 ==============================
 Register Taxonomies
 ==============================
 */

function registration_taxonomy() {

/* ------------- First Taxonomy */
  $labels = [
    'name'              => _x('Tipo de empresas', 'taxonomy general name'),
    'singular_name'     => _x('Tipo de empresa', 'taxonomy singular name'),
    'search_items'      => __('Buscar tipo de empresa'),
    'all_items'         => __('Todos los Tipos de empresa'),
    'edit_item'         => __('Editar tipo de empresa'),
    'update_item'       => __('Actualizar tipo de empresa'),
    'add_new_item'      => __('Añadir Nuevo tipo de empresa'),
    'new_item_name'     => __('Nombre de tipo de empresa'),
    'menu_name'         => __('Tipo de empresa'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'tipo-empresa'],
  ];
  register_taxonomy('tipo-empresa',  'empresas', $args);
}
add_action('init', 'registration_taxonomy');

function register_custom_taxonomy() {
  registration_taxonomy();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'register_custom_taxonomy' );