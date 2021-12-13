<?php
/**
 * Urbidermis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Urbidermis
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'urbidermis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function urbidermis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Urbidermis, use a find and replace
		 * to change 'urbidermis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'urbidermis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'urbidermis' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'urbidermis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'urbidermis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function urbidermis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'urbidermis_content_width', 640 );
}
add_action( 'after_setup_theme', 'urbidermis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function urbidermis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'urbidermis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'urbidermis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'urbidermis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function urbidermis_scripts() {
	wp_enqueue_style( 'urbidermis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'urbidermis-style', 'rtl', 'replace' );

	wp_enqueue_script( 'urbidermis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'urbidermis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*********************************************************
 * *******************************************************
 * Bootstrap Navwalker.
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/*********************************************************
 * *******************************************************
 * Custom CPTs
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/custom-cpt.php';


/*********************************************************
 * *******************************************************
 * CUSTOM SEARCH
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/custom-search.php';


/*********************************************************
 * *******************************************************
 * Add ALT to images FOR ACF
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/alt-images.php';


/*********************************************************
 * *******************************************************
 * Custom Admin menu
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/custom-backoffice.php';


/*********************************************************
 * *******************************************************
 * Dynamic Tags
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/dynamic-tags.php';



/*********************************************************
 * *******************************************************
 * Página de opciones
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/options-theme.php';


/*********************************************************
 * *******************************************************
 * CUSTOM WPML
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/custom-wpml.php';

/*********************************************************
 * *******************************************************
 * SHORTCODES PERSONALIZADOS
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/shortcodes.php';

/*********************************************************
 * *******************************************************
 * GEOLOCALIZAR CLIENTES
 * *******************************************************
 * *******************************************************
*/
//require get_template_directory() . '/inc/country-code.php';

/*********************************************************
 * *******************************************************
 * Agregar elementos al final del menu de wordpress
 * *******************************************************
 * *******************************************************
*/
//require get_template_directory() . '/inc/add-last-nav-item.php';

/*********************************************************
 * *******************************************************
 * Embed JS Scripts
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/embed-scripts.php';

/*********************************************************
 * *******************************************************
 * Embed Modular CSS
 * *******************************************************
 * *******************************************************
*/
require get_template_directory() . '/inc/embed-styles.php';

function print_r2($val) {
	echo '<pre>';
	print_r($val);
	echo  '</pre>';
  }
  
  function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ) .')';
	  echo '</script>';
  }
  

