<?php

/* Template Name: Register */

get_header();
?>

<section class="bg-image-regular register-background wrapper"
style="background-image:url(<?php the_field('banner_desktop_img') ?>)">
<div class="container-fluid px-lg-0 py-md-2 py-2 z-index-11 rel-wrapper">
  <div class="row pt-5 mt-4 mt-lg-4 mt-md-5 d-flex align-items-center justify-content-center">
    <div class="col-12 col-md-6 mt-5">
      <div class="bg-white b-r-8 p-4 mb-4 mb-lg-0 text-center">
        <?php
            display_tag(
              'title_group_register',
              'title_tag',
              'title_txt',
              'form-title text-center color-red text-uppercase fw-700 my-4 d-block'
            );
            ?>
        <form action="" method="post" name="user_registration" class="register-form">
            <span class="login-field mb-3 d-block">
                <input type="text" name="register_email" id="register_email" class="input" value="" size="20"
                    placeholder="E-mail">
            </span>
            <div class="d-flex align-items-center flex-column flex-md-row justify-content-between">
              <span class="login-field w-100 mb-3 pr-md-2">
                  <input type="text" name="register_fname" id="register_fname" class="input" value="" size="20"
                      placeholder="Nombre">
              </span>
              <span class="login-field w-100 mb-3 pl-md-2">
                  <input type="text" name="register_lname" id="register_lname" class="input" value="" size="20"
                      placeholder="Apellido">
              </span>
            </div>
            <span class="login-field mb-3 d-block">
                <input type="text" name="register_username" id="register_email" class="input" value="" size="20"
                    placeholder="Nombre de usuario">
            </span>
            <span class="login-field mb-2 d-block">
                <input type="password" name="register_pass" id="register_pass" class="input" value="" size="20"
                    placeholder="Contraseña">
            </span>
            <span class="my-3 d-block">
                <input type="submit" name="user_registration" class="button-primary"
                    value="REGISTRARSE">
            </span>
        </form>
        <div class="text-center">
          <?php
          if (isset($_POST['user_registration'])) {

            $error_count = 0;
            $error_format_1 = '<div><p class="p-3 color-custom-white" style="background-color:#293543;"><strong>Error! </strong>';
            $error_format_2 = '</p></div>';
            $email = $_POST['register_email'];
            $fname = $_POST['register_fname'];
            $lname = $_POST['register_lname'];
            $username = $_POST['register_username'];
            $password = $_POST['register_pass'];

          if ( empty( $username ) || empty( $email ) || empty($password) || empty($fname) || empty($lname) ) {
            $register_error = 'Por favor llena todos los campos';
            $error_count = 1;
            echo $error_format_1 . $register_error . $error_format_2;
          } else {
            if ( 6 > strlen( $username ) ) {
              $register_error = 'El nombre de usuario es muy corto. Al menos introduce 6 caracteres';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
            if ( username_exists( $username ) ) {
              $register_error = 'El nombre de usuario ya está registrado';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
            if ( ! validate_username( $username ) ) {
              $register_error = 'El nombre de usuario no es válido';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
            if ( !is_email( $email ) ) {
              $register_error = 'El correo electrónico no es válido';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
            if ( email_exists( $email ) ) {
              $register_error = 'El correo electrónico ya está registrado';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
            if ( 5 > strlen( $password ) ) {
              $register_error = 'La contraseña debe tener más de 5 caracteres';
              $error_count = 1;
              echo $error_format_1 . $register_error . $error_format_2;
            }
          }
          if ( $error_count == 0 ) {
            global $username, $email, $password, $fname, $lname;
            $username   =   sanitize_user( $_POST['register_username'] );
            $email      =   sanitize_email( $_POST['register_email'] );
            $password   =   esc_attr( $_POST['register_pass'] );
            $fname      =   sanitize_text_field( $_POST['register_fname'] );
            $lname      =   sanitize_text_field( $_POST['register_lname'] );

            $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password,
            'first_name'    =>   $fname,
            'last_name'     =>   $lname,
            'role'          =>   'author'
            );
            $user = wp_insert_user( $userdata );

            $from      = get_option('admin_email');
            $headers   = array('Content-Type: text/html; charset=UTF-8', 'From: '.$from . "\r\n");
            $subject   = 'Registro completado - Ayuntamiento de Montuïri';
            $url       = get_site_url() . '/login/';
            $main_url  = get_site_url();
            $message   = '<img width="150" height="auto" src="' . $main_url . '/wp-content/themes/memoria/img/logo-color.png">
            <h3>¡Registro completado!</h3><h4>Puedes iniciar sesión en la web del Ayuntamiento de Montuïri haciendo click <a href=' . $url . '><b>aquí</b></a></h4>';

            // Email password and other details to the user
            wp_mail( $email, $subject, $message, $headers );

            echo '<div class="p-3  color-white" style="background-color: #000;margin-bottom:30px;">Por favor, revisa tu correo para completar el proceso de registro.</div>';
          }

        }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php
get_footer();
