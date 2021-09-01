<?php

/* Template Name: Login */

get_header();
?>
<?php 
  if ( is_user_logged_in() ) {

  $user = wp_get_current_user();
  $user_id = $user->ID;
  $user_info = get_userdata($user_id);

  if ( in_array( 'subscriber', $user_info->roles ) || in_array( 'administrator', $user_info->roles)  || in_array( 'editor', $user_info->roles ) ) :
?>

<section class="wrapper">
    <div class="container-fluid pt-5">
        <div class="row justify-content-between">
            <!-- COMUNICACIONES -->
            <div class="col-lg-5 col-12 order-lg-1 order-2 mb-lg-0 mb-4">
                <div class="pr-3">
                    <h2 class="text-left color-blue mb-3"><?php the_field('titulo_de_seccion'); ?></h2>
                    <div class="border-bottom-blue mb-lg-4 mb-3"></div>
                </div>
                <div class="custom-height22 pr-2">
                    <div class="custom-scroll ">
                        <?php
                        if( have_rows('comunicacion') ):
                        while ( have_rows('comunicacion') ) : the_row();
                        ?>
                        <div
                            class="border-bottom-blue mb-lg-4 mb-3 py-lg-4 py-3 d-lg-flex justify-content-between align-items-end">
                            <div class="title-date w-lg-50 w-100 mb-lg-0 mb-3">
                                <span
                                    class="d-block fs-12 color-blue mb-lg-0 mb-2"><?php the_sub_field('fecha');?></span>
                                <span class="d-block fs-12 color-blue"><?php the_sub_field('titulo');?></span>
                            </div>
                            <div
                                class="w-lg-50 w-100 file d-flex justify-content-between align-items-lg-end align-items-center">

                                <?php
                          if( get_sub_field('nuevo') == 'SI' ) {
                              echo '<span class="d-block fs-3 color-blue icon-new" style="line-height: .6;"></span>';
                          } else{
                            echo '<span class="d-block fs-3 icon-new" style="line-height: .6;color:transparent;"></span>'; 
                          }
                          ?>

                                <a class="d-block fs-12 color-blue" href="<?php the_sub_field('abrir_yo_descargar');?>"
                                    target="_blank"><?php _e('Abrir', 'intramundana') ?></a>
                                <a class="d-block fs-12 color-blue" href="<?php the_sub_field('abrir_yo_descargar');?>"
                                    download><?php _e('Descargar', 'intramundana') ?></a>

                            </div>
                        </div>
                        <?php
                            endwhile;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <!-- /COMUNICACIONES -->

            <!-- DOCUMENTOS CONTABLES Y FINANCIEROS -->
            <div class="col-lg-5 col-12 order-lg-2 order-3 mb-lg-0 mb-4">
                <div class="pr-3">
                    <h2 class="text-left color-blue mb-3"><?php the_field('titulo_de_seccion_2'); ?></h2>
                    <div class="border-bottom-blue mb-lg-4 mb-3"></div>
                </div>
                <div class="custom-height22 pr-2">
                    <div class="custom-scroll ">
                        <?php
                    if( have_rows('documentacion') ):
                    while ( have_rows('documentacion') ) : the_row();
                    ?>
                        <div
                            class="border-bottom-blue mb-lg-4 mb-3 py-lg-4 py-3 d-lg-flex justify-content-between align-items-end">
                            <div class="title-date w-lg-50 w-100 mb-lg-0 mb-3">
                                <span
                                    class="d-block fs-12 color-blue mb-lg-0 mb-2"><?php the_sub_field('fecha');?></span>
                                <span class="d-block fs-12 color-blue"><?php the_sub_field('titulo');?></span>
                            </div>
                            <div
                                class="w-lg-50 w-100 file d-flex justify-content-between align-items-lg-end align-items-center">

                                <?php
                          if( get_sub_field('nuevo') == 'SI' ) {
                              echo '<span class="d-block fs-3 color-blue icon-new" style="line-height: .6;"></span>';
                          } else{
                            echo '<span class="d-block fs-3 icon-new" style="line-height: .6;color:transparent;"></span>'; 
                          }
                          ?>

                                <a class="d-block fs-12 color-blue" href="<?php the_sub_field('abrir_yo_descargar');?>"
                                    target="_blank"><?php _e('Abrir', 'intramundana') ?></a>
                                <a class="d-block fs-12 color-blue" href="<?php the_sub_field('abrir_yo_descargar');?>"
                                    download><?php _e('Descargar', 'intramundana') ?></a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    endif;
                  ?>
            </div>

            <!-- /DOCUMENTOS CONTABLES Y FINANCIEROS -->
            <div class="col-lg-1 col-12 order-lg-3 order-1 text-right">
                <a href="<?php echo wp_logout_url() ?>">
                    <ins class="color-blue fs-12"><?php _e('Salir', 'intramundana') ?></ins>
                </a>
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
                    display_tag(
                      'title_group_login',
                      'title_tag',
                      'title_txt',
                      'text-left color-blue fw-500 mb-3'
                    );
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
                                <?php _e('¿Has olvidado tu contraseña?', 'intramundana') ?>
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