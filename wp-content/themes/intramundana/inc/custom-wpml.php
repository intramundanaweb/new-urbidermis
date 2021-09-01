<?php
/**
 * Custom WPML Functions
 *
 * @package santa_cole
 */

// Filtrar wp_nav_menu() para agregar más enlaces y otra salida
// Mostrar otro idioma solamente en el selector de idiomas
// Utilizar el nuevo filtro: https://wpml.org/wpml-hook/wpml_active_languages/ 
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);
function new_nav_menu_items($items, $args) {
 // quitar la marca de comentarios aquí para encontrar la ubicación del menú de su tema
 //echo "args:<pre>"; print_r($args); echo "</pre>";
 
 // obtener idiomas
 $language_actual = apply_filters( 'wpml_current_language', NULL );
 $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );
 
 // agregar $args->theme_location == 'primary-menu' en la condicional si desea especificar la ubicación del menú.
 
 if ( $languages && $args->theme_location == 'primary') {
 
	if(!empty($languages)){
	
		foreach($languages as $l){
			if(!$l['active']){
			// bandera con nombre nativo
			$items = $items . '<li class="menu-item text-uppercase color-black pt-4">
				<a href="' . $l['url'] . '">' . $l['language_code'] . '</a>
				<span class="px-1">/</span>'.$language_actual.' <span></span>
			</li>';
			}
		}
	}
 }
 
 return $items;
}