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
  register_post_type('autor',
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
  register_post_type('proyecto',
  array(
      'labels' => array(
          'name'              => __('proyectos'),
      ),
      'public'      => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-portfolio',
      'supports' => array( 'title','thumbnail' ),
      'rewrite' => array('slug' => 'caso-practico', 'with_front' => false ),
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
    $get_post_type = get_post_type_object('autor');
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

    $get_post_type = get_post_type_object('proyecto');
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

    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'Artículos';
    $labels->singular_name = 'Artículo';
    $labels->add_new = 'Añadir artículo';
    $labels->add_new_item = 'Añadir artículo';
    $labels->edit_item = 'Editar artículo';
    $labels->new_item = 'artículos';
    $labels->view_item = 'Ver artículos';
    $labels->search_items = 'Buscar artículos';
    $labels->not_found = 'No se encontró un artículo';
    $labels->all_items = 'Todos los artículos';
    $labels->menu_name = 'Artículos';
    $labels->name_admin_bar = 'Artículos';

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
  register_taxonomy('tipo-autor',  'autor', $args);


  /* ------------- Second Taxonomy */
  $labels = [
    'name'              => _x('Pais', 'taxonomy general name'),
    'singular_name'     => _x('Pais', 'taxonomy singular name'),
    'search_items'      => __('Buscar Pais'),
    'all_items'         => __('Todos los Paises'),
    'edit_item'         => __('Editar Pais'),
    'update_item'       => __('Actualizar Pais'),
    'add_new_item'      => __('Añadir Nuevo Pais'),
    'new_item_name'     => __('Nombre de Pais'),
    'menu_name'         => __('Pais'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'pais'],
  ];
  register_taxonomy('pais',  'proyecto', $args);

  /* ------------- three Taxonomy */
  $labels = [
    'name'              => _x('Ciudad', 'taxonomy general name'),
    'singular_name'     => _x('Ciudad', 'taxonomy singular name'),
    'search_items'      => __('Buscar Ciudad'),
    'all_items'         => __('Todos los Ciudades'),
    'edit_item'         => __('Editar Ciudad'),
    'update_item'       => __('Actualizar Ciudad'),
    'add_new_item'      => __('Añadir Nuevo Ciudad'),
    'new_item_name'     => __('Nombre de Ciudad'),
    'menu_name'         => __('Ciudad'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'cuidad'],
  ];
  register_taxonomy('ciudad',  'proyecto', $args);

   /* ------------- Four Taxonomy */
   $labels = [
    'name'              => _x('Tipologia', 'taxonomy general name'),
    'singular_name'     => _x('Tipologia', 'taxonomy singular name'),
    'search_items'      => __('Buscar Tipologia'),
    'all_items'         => __('Todos los Tipologias'),
    'edit_item'         => __('Editar Tipologia'),
    'update_item'       => __('Actualizar Tipologia'),
    'add_new_item'      => __('Añadir Nuevo Tipologia'),
    'new_item_name'     => __('Nombre de Tipologia'),
    'menu_name'         => __('Tipologia'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'tipo'],
  ];
  register_taxonomy('tipo',  'proyecto', $args);


  /* ------------- Five Taxonomy */
  $labels = [
    'name'              => _x('Producto', 'taxonomy general name'),
    'singular_name'     => _x('Producto', 'taxonomy singular name'),
    'search_items'      => __('Buscar Producto'),
    'all_items'         => __('Todos los Productos'),
    'edit_item'         => __('Editar Producto'),
    'update_item'       => __('Actualizar Producto'),
    'add_new_item'      => __('Añadir Nuevo Producto'),
    'new_item_name'     => __('Nombre de Producto'),
    'menu_name'         => __('Producto'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'producto'],
  ];
  register_taxonomy('producto',  'proyecto', $args);


/* ------------- Sixth Taxonomy */
$labels = [
    'name'              => _x('Categoria de producto', 'taxonomy general name'),
    'singular_name'     => _x('Categoria de producto', 'taxonomy singular name'),
    'search_items'      => __('Buscar categoria de producto'),
    'all_items'         => __('Todas las categorias de producto'),
    'edit_item'         => __('Editar categoria de producto'),
    'update_item'       => __('Actualizar categoria de producto'),
    'add_new_item'      => __('Añadir Nueva categoria de producto'),
    'new_item_name'     => __('Nombre de la categoria de producto'),
    'menu_name'         => __('Categoria de producto'),
    ];
    $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'categoria-de-producto'],
    ];
    register_taxonomy('Categoria de producto',  'proyecto', $args);

}
add_action('init', 'registration_taxonomy');

function register_custom_taxonomy() {
  registration_taxonomy();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'register_custom_taxonomy' );