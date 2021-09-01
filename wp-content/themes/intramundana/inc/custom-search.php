<?php
/**
 * Custom Search
 *
 * @package santa_cole
 */



/* ------------- Custom Search for products and CPTS */
function customize_search( $query ) {
	if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'post', 'product' ) );
	}
}
add_action( 'pre_get_posts', 'customize_search' );

function custom_product_search_form() {
	$home_url = esc_url( home_url( '/' ) );
	$search_value = get_search_query();
	$form = '<form role="search" class="mt-0 search-form d-flex" action="' . $home_url . '" method="get">
		<input type="search" name="s" class="input-activo" 
			id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
			value="' . $search_value . '" placeholder="Buscar..."/>
			<input type="hidden" name="post_type" value="product" />
	</form>';
	return $form;
}
