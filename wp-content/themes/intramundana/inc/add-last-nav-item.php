<?php
/**
 * Add last nav item para menu movil
 *
 * @package santa_cole
 */

/* ------------- Get last nav item */

function add_last_nav_item($items,$args) {

	//$language = languages_list_custom();
	if ($args->menu_id == 'main-menu') {
		return $items .= (
			
			'<li class="menu-item nav-item close-nav">
			<a href="#" class="close-menu closed">
				<span aria-hidden="true" class="color-black icon-x color-black fs-2"></span>
			</a>
			</li>'
		);
	} else {
			return $items;
	}
}
add_filter('wp_nav_menu_items','add_last_nav_item', 10, 2);
