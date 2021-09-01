<?php

/* Template Name: Login 
*
*
* @package buddyx
*/

get_header();
?>
<?php 
  if ( is_user_logged_in() ) {

  $user = wp_get_current_user();
  $user_id = $user->ID;
  $user_info = get_userdata($user_id);

  if ( in_array( 'subscriber', $user_info->roles ) || in_array( 'administrator', $user_info->roles)  || in_array( 'editor', $user_info->roles ) ) :?>
<section>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 mb-4 px-0">
                <div class="row">
                    <!-- <div class="col-md-3 col-12">
                        <img src="<?php the_field('imagen'); ?>" class="img-fluid" alt="home campus urbidermis">
                    </div> -->
                    <div class="col-12">
                        <div class="formato-home">
                            <?php the_field('texto'); ?>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-12">
                        <?php echo do_shortcode('[ameliabooking]');?>
                    </div> -->
                </div>
            </div>
            <div class="col-12 px-0" id="proyectos-home">
                <!-- <h2 class="mb-4"><?php the_field('titulo_para_proyectos'); ?></h2> -->
                <?php echo do_shortcode('[groups-listing user_id="'.$user_id.'"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php 
  endif;
  }else { 
?>
<section class="wrapper">
    <div class="container-fluid px-lg-0 py-md-2 py-2">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="text-left">
                    <?php
                    /* display_tag(
                      'title_group_login',
                      'title_tag',
                      'title_txt',
                      'text-left color-blue fw-600 mb-3'
                    ); */
                    ?>
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
<?php }?>

<?php
get_footer();