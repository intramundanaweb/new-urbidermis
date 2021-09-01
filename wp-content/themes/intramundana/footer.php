<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Intramundana
 */

?>



</div><!-- #content -->
<footer id="colophon" class="site-footer bg-beige color-black pt-lg-5 pt-5">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6 col-12 pr-lg-3 mb-lg-0 mb-4">
                    <div class="pr-lg-4 mr-lg-5">
                        <?php
                          if ( !function_exists('dynamic_sidebar')
                          || !dynamic_sidebar('Footer_0') ) : ?>

                        <?php endif; ?>
                    </div>

                </div>
                <div class="col-lg-2 col-12 mb-lg-0 mb-4">

                    <?php
                          if ( !function_exists('dynamic_sidebar')
                          || !dynamic_sidebar('Footer_1') ) : ?>

                    <?php endif; ?>

                </div>
                <div class="col-lg-2 col-12 mb-lg-0 mb-4">
                    <?php
                      if ( !function_exists('dynamic_sidebar')
                      || !dynamic_sidebar('Footer_2') ) : ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-2 col-12 mb-lg-0 mb-4">
                    <?php
                      if ( !function_exists('dynamic_sidebar')
                      || !dynamic_sidebar('Footer_3') ) : ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-2 col-12 mb-lg-0 mb-4">    
                        <?php
                      if ( !function_exists('dynamic_sidebar')
                      || !dynamic_sidebar('Footer_4') ) : ?>
                        <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-lg-6 col-12 mt-1 footer-copyright text-left">
                    <p class="mb-0 fs-08">
                        © Urbidermis 2021 · Todos los derechos reservados · <a href="https://intramundana.com"
                            target="_blank" class="fs-1">Diseño web</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>