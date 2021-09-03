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
    <div id="page" class="site margin-top-content top-bar-margin top-bar-margin-classy">
        <header id="masthead" class="site-header fixed-top bg-beige-light">
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
        navbar-transition top-bar-include">
                <a href="#" class="close-menu d-lg-none collapse closed">
                    <span aria-hidden="true" class="color-custom-black">&times;</span>
                </a>

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
                                        Panel de administración Santa i Cole
                                    </a>
                                    <a href="<?php echo wp_logout_url() ?>">
                                        Cerrar sesión
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
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-between">

                                        <div class="col-4 text-left pl-0">
                                            <a class="navbar-toggler-right navbar-icon-menu" type="button"
                                                data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                                                aria-label="Toggle navigation" href="#">
                                                <span class="icon-plus color-black fs-lg-3 fs-2"></span>
                                            </a>
                                        </div>
                                        <div class="col-4 text-center">
                                            <div class="navbar-brand m-0 py-0">
                                                <?php the_custom_logo(); ?>
                                            </div>
                                        </div>
                                        <div class="col-4 pr-0">
                                            <div class="menu-secondary">
                                                <?php
                                            if ( !function_exists('dynamic_sidebar')
                                            || !dynamic_sidebar('Nav_header') ) : 
                                        ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- <a href="#" class="close-menu collapse closed">
                                        <span aria-hidden="true" class="color-black icon-close color-black fs-3"></span>
                                    </a> -->

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


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="
              <?php
                if ( is_user_logged_in() ) {
                  $user = wp_get_current_user();
                  if ($user->roles[0] == 'administrator') { ?>
                    logged-admin
                  <?php
                  }
                }
                ?>">
                <a class="navbar-toggler-right navbar-icon-menu" type="button" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation" href="#">
                    <span class="icon-menu-start color-blue fs-3"></span>
                </a>
            </div>
        </header>

        <!-- Search Modal -->
        <div class="modal fade mt-0" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-left m-0" role="document">
                <div class="modal-content bg-beige br-0 h-100 px-lg-5 px-3 pb-lg-4 pb-3">
                    <div class="modal-header d-flex align-items-center border-0 br-0 mt-5">
                        <span class="color-black d-block title-search">
                            <?php _e('Búscador', 'santa-cole') ?>
                        </span>
                        <a href="#" class="close color-black" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body ">
                        <div class="header-modal">
                            <div class="search-form-product mb-5"><?php echo custom_product_search_form(); ?></div>
                            <div class="quick-links">
                                <span
                                    class="color-grey-light nav-link-custom d-block mb-2"><?php _e('Enlaces rápidos', 'santa-cole') ?>
                            </div>
                            <a href="<?php echo home_url('/cesta/')?>" class="nav-link d-inline-block pl-0 pr-3">
                                <?php _e('Cesta', 'santa-cole') ?>
                            </a>
                            <a href="<?php echo home_url('/miguel-mila/')?>" class="nav-link d-inline-block pl-0 pr-3">
                                <?php _e('Miguel Mila', 'santa-cole') ?>
                            </a>
                            <a href="<?php echo home_url('/antoni-arola/')?>" class="nav-link d-inline-block pl-0 pr-3">
                                <?php _e('Antoni Arola', 'santa-cole') ?>
                            </a>
                            <a href="<?php echo home_url('/cirio-circular/')?>"
                                class="nav-link d-inline-block pl-0 pr-3">
                                <?php _e('Cirio circular', 'santa-cole') ?>
                            </a>
                            <a href="<?php echo home_url('/cirio-circular/')?>"
                                class="nav-link d-inline-block pl-0 pr-3">
                                <?php _e('Cirio circular', 'santa-cole') ?>
                            </a>
                        </div>
                    </div>
                    <div class="footer-modal d-flex align-items-center justify-content-between pt-4">
                        <a href="<?php echo home_url('/donde-comprar/')?>" class="nav-link d-block px-0">
                            <?php _e('Dónde comprar', 'santa-cole') ?>
                        </a>

                        <a href="<?php echo home_url('/area-profesional/')?>" class="nav-link d-block px-0">
                            <?php _e('Área profesional', 'santa-cole') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODAL MENUS -->
        <div class="modalnav" id="navModal">
            <div class="modal-dialog modal-left m-0">
                <div class="modal-content bg-beige br-0 h-100 px-lg-5 px-3 pb-lg-4 pb-3">
                    <div class="modal-header d-flex align-items-center border-0 br-0 mt-5">

                    </div>
                    <div class="modal-body ">
                        <div class="header-modal">

                        </div>
                        <div class="footer-modal d-flex align-items-center justify-content-between pt-4">
                            <a href="<?php echo home_url('/donde-comprar/')?>" class="nav-link d-block px-0">
                                <?php _e('Dónde comprar', 'santa-cole') ?>
                            </a>

                            <a href="<?php echo home_url('/area-profesional/')?>" class="nav-link d-block px-0">
                                <?php _e('Área profesional', 'santa-cole') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" class="site-content mt-content-header">