<?php
/**
 * Custom Login
 *
 * @package 
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
 	$login_page = home_url( '/custom-login/' );
 	wp_redirect( $login_page );
 	exit;
 	}
 add_action('wp_logout','logout_page');


 /* ------------- Redirect After Logout */
 function mytheme_custom_login_redirect($redirect_to, $request, $user) {
 
    // Accedemos a la variable global
    global $user;
 
    // Guardamos el nombre de usuario en una variable
    $usuario = esc_attr($user->user_login);
 
    // Redireccionamos automáticamente al usuario a una página personalizada
    // que hayamos creado previamente, con su nombre como enlace permanente.
    // Por ejemplo: http://www.miweb.com/daniel/
    //return home_url( '/miembros/'.$usuario.'/groups/my-groups/' );
    return home_url();
 
}
add_filter('login_redirect', 'mytheme_custom_login_redirect', 10, 3);



function shortcode_login() { 
    
    ?>
    <section class="wrapper">
    <div class="container-fluid px-lg-0 py-md-2 py-2">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="text-left">
                   
                    <div class="border-bottom-blue mb-lg-5 mb-3"></div>
                    <div class="form-login-custom">
                        <?php

                        wp_login_form(array (
                          //'redirect' => home_url(),
                          'label_log_in' => __( 'Entrar' ),
                          'label_username' => __( 'Correo electrónico' ),
                          'label_password' => __( 'Contraseña' ),
                          'label_remember' => __( 'Recuérdame' ),
                          'id_username'    => 'user_login',
                          'id_password'    => 'user_pass',
                          'id_remember'    => 'rememberme',
                          'id_submit'       => 'user_login_submit',
                          'remember' => true,
                          
                          
                        ));
                        ?>
                        <p class="fs-12 color-blue">
                            <a class="fs-1 color-blue"
                                href="<?php echo get_site_url() ?>/wp-login.php?action=lostpassword">
                                ¿Has olvidado tu contraseña?
                            </a>
                        </p>
                        <!-- <p class="color-grey fs-09">
                        ¿No tienes cuenta?
                        <a class="fw-700 color-red fs-1" href="<?php echo get_site_url() ?>/registro">
                            Regístrate aquí
                        </a>
                        </p> -->
                        <div class="text-left mt-4">
                            <?php
                              $error_format_1 = '<div><p class="p-3 color-primary" style="background-color:#ced4da;"><strong>Error! </strong>';
                              $error_format_2 = '<br /></p></div>';

                              if ( isset($_GET['login']) && $_GET['login'] == 'failed' ) {
                                  $register_error = 'Correo y/o contraseña incorrectos. Por favor vuelve a intentarlo';
                                  echo $error_format_1 . $register_error . $error_format_2;
                              }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
}
add_shortcode('custom_login', 'shortcode_login');
