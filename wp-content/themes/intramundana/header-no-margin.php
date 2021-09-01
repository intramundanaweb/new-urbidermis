<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package santa_cole
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="theme-color" content="#003d7c">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003d7c">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header fixed-top">
            <nav class="navbar-main navbar-expand-lg
        <?php
        if ( is_user_logged_in() ) {
          $user = wp_get_current_user();
          if ($user->roles[0] == 'administrator') { ?>
            logged-admin
          <?php
          }
        }
        ?>
        navbar-transition">

                <?php
          if ( is_user_logged_in() ) {
            $user = wp_get_current_user();
            if ($user->roles[0] == 'administrator') { ?>
                <div class="fc-adminbar px-2 px-lg-5 bg-blue text-white fs-08 py-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo site_url()?>/wp-admin">
                                        Panel de Gestión
                                    </a>
                                    <a href="<?php echo wp_logout_url() ?>">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
          }
          ?>

                <div class="wrapper py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 px-lg-3 px-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a class="navbar-toggler-right navbar-icon-menu" type="button"
                                        data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                                        aria-label="Toggle navigation" href="#">
                                        <span class="icon-plus color-black fs-lg-3 fs-2"></span>
                                    </a>

                                    <!-- <a href="#" class="close-menu collapse closed">
                                        <span aria-hidden="true" class="color-black icon-close color-black fs-3"></span>
                                    </a> -->
                                    <div class="navbar-brand m-0 py-0 pl-lg-5 pl-4">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                    <?php
                                      wp_nav_menu([
                                      'menu'	         => 'primary',
                                      'theme_location'   => 'primary',
                                      'container'        => 'div',
                                      'container_id'     => 'navbar',
                                      'depth'            => 2,
                                      'container_class'  => 'menu justify-content-end py-lg-0 bg-lg-transparent',
                                      'menu_id'          => 'main-menu',
                                      'menu_class'       => 'navbar-nav flex-column h-100 nav-primary text-left px-lg-5 bg-beige-light',
                                      'fallback_cb'      => 'WP_Bootstrap_Navwalker::fallback',
                                      'walker'           => new WP_Bootstrap_Navwalker()
                                      ]);
                                    ?>

                                    <div class="menu-secondary">
                                        <?php
                                            if ( !function_exists('dynamic_sidebar')
                                            || !dynamic_sidebar('Nav_header') ) : 
                                        ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </header>

        <div id="content" class="site-content">