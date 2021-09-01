<?php
/**
 * Embed Fonts
 *
 * @package santa-cole
 */

/* ------------- Embed Google Fonts */
 function include_admin_font() {
 	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap' );
 }
 add_action( 'wp_enqueue_scripts', 'include_admin_font' );
