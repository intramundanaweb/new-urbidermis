<?php
/**
 * Plugin Name: Entradas Personalizadas CPT
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
  register_post_type('intra-autores',
       array(
           'labels' => array(
               'name'              => __('autores'),
           ),
           'public'      => true,
           'has_archive' => true,
           'menu_icon'   => 'dashicons-groups',
           'supports' => array( 'title','thumbnail' ),
           'rewrite' => array( 'with_front' => false ),
       )
  );


    /* ------------- Second CPT */
  register_post_type('intra-proyectos',
  array(
      'labels' => array(
          'name'              => __('proyectos'),
      ),
      'public'      => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-portfolio',
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
    $get_post_type = get_post_type_object('intra-autores');
    $labels = $get_post_type->labels;
    $labels->name = 'autores';
    $labels->singular_name = 'autor';
    $labels->add_new = 'Añadir autor';
    $labels->add_new_item = 'Añadir autor';
    $labels->edit_item = 'Editar autor';
    $labels->new_item = 'autores';
    $labels->view_item = 'Ver autores';
    $labels->search_items = 'Buscar autor';
    $labels->not_found = 'No se encontró el autor';
    $labels->all_items = 'Todos los autores';
    $labels->menu_name = 'Autores';
    $labels->name_admin_bar = 'Autores';
    $get_post_type = get_post_type_object('intra-proyectos');
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
    'name'              => _x('Tipos de autores', 'taxonomy general name'),
    'singular_name'     => _x('Tipo de autor', 'taxonomy singular name'),
    'search_items'      => __('Buscar tipo de autor'),
    'all_items'         => __('Todos los Tipos de autores'),
    'edit_item'         => __('Editar tipo de autor'),
    'update_item'       => __('Actualizar tipo de autor'),
    'add_new_item'      => __('Añadir Nuevo tipo de autor'),
    'new_item_name'     => __('Nombre de tipo de autor'),
    'menu_name'         => __('Tipo de autor'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'tipo-autor'],
  ];
  register_taxonomy('tipo-autor',  'intra-autores', $args);
}
add_action('init', 'registration_taxonomy');

function register_custom_taxonomy() {
  registration_taxonomy();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'register_custom_taxonomy' );