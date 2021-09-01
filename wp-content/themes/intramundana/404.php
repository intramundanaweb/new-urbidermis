<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Intramundana
 */

get_header('no-margin');
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found height-200 d-flex justify-content-center align-items-center">


        <div class="page-content color-blue text-center">
            <header class="page-header mb-4">
                <h1 class="page-title color-blue fs-25 text-center"><?php _e( 'Oops!', 'intramundana' ); ?></h1>
            </header><!-- .page-header -->

            <p><?php _e( '¿Te has perdido?', 'intramundana' ); ?></p>
            <p><?php _e( 'No hemos podido encontrar la página que buscabas.', 'intramundana' ); ?></p>

            <p><?php _e( 'Tal vez quisieras conocer nuestros', 'intramundana' ); ?> <a
                    href="<?php echo get_site_url(); ?>/nosotros/origenes/"><ins><?php _e('Orígenes', 'intramundana') ?></ins></a>,<br>
                <?php _e( 'o saber más sobre nuestras', 'intramundana' ); ?> <a
                    href="<?php echo get_site_url(); ?>/actividades/empresas-y-start-ups/"><ins><?php _e('Empresas y Startups', 'intramundana') ?></ins></a>.</p>

            <p><?php _e( 'Si no es el caso, siempre puedes volver al inicio.', 'intramundana' ); ?> <a
                    href="<?php echo get_site_url(); ?>"><ins><?php _e('inicio', 'intramundana') ?></ins></a>.</p>

            <?php
					//get_search_form();

					//the_widget( 'WP_Widget_Recent_Posts' );
					?>

            <!-- <div class="widget widget_categories">
						<h2 class="widget-title"><?php //_e( 'Most Used Categories', 'intramundana' ); ?></h2>
						<ul>
							<?php
							/* wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							); */
							?>
						</ul>
					</div> -->
            <!-- .widget -->

            <?php
					/* translators: %1$s: smiley */
					/* $intramundana_archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'intramundana' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$intramundana_archive_content" );
 					*/
					//the_widget( 'WP_Widget_Tag_Cloud' );
					?>

        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();