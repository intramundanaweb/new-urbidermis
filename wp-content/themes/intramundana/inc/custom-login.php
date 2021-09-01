<?php
/**
 * Custom Login
 *
 * @package fc_corporativa
 */


 /* ------------- Custom Login Fail */
 add_action( 'wp_login_failed', 'custom_login_failed' ); // Failed Login Hook
 function custom_login_failed( $user ) {
 	// checking where the login attempt came from
 	$referrer = $_SERVER['HTTP_REFERER'];
 	// checking if we are on the default login page
 	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
 	// checking don't have a failed login attempt yet
 	if ( !strstr($referrer, '?login=failed' )) {
 	// redirecting to the custom login page and appending a querystring of login failed
 	wp_redirect( $referrer . '?login=failed');
 	} else {
 	wp_redirect( $referrer );
 	} exit; }
 }

 /* ------------- Custom Login Fail - Emtpy Fields */
 add_action( 'authenticate', 'pu_blank_login');
 function pu_blank_login( $user ){
 	// check what page the login attempt is coming from
 	$referrer = $_SERVER['HTTP_REFERER'];
 	$error = false;
 	if($_POST['log'] == '' || $_POST['pwd'] == '')
 	{ $error = true; }
 	// check that were not on the default login page
 	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {
 	// make sure we don't already have a failed login attempt
 	if ( !strstr($referrer, '?login=failed') ) {
 	// Redirect to the login page and append a querystring of login failed
 	wp_redirect( $referrer . '?login=failed' );
 	} else {
 	wp_redirect( $referrer );
 	} exit;
 	}
 }

 /* ------------- Custom Login Form */
 function custom_authenticate( $user, $username, $password ) {
 	if ( is_wp_error( $user ) && isset( $_SERVER[ 'HTTP_REFERER' ] ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-admin' ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-login.php' ) ) {
 	 $referrer = $_SERVER[ 'HTTP_REFERER' ];
 		foreach ( $user->errors as $key => $error ) {
 			if ( in_array( $key, array( 'empty_password', 'empty_username') ) ) {
 				unset( $user->errors[ $key ] );
 				$user->errors[ 'custom_'.$key ] = $error;
 			}
 		}
  }
  return $user;
 }
 add_filter('authenticate','custom_authenticate', 31, 3);




 /* ------------- Redirect After Logout */
 function logout_page() {
 	$login_page = home_url( '/login/' );
 	wp_redirect( $login_page );
 	exit;
 	}
 add_action('wp_logout','logout_page');
