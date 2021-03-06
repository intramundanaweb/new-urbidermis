<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;

?>
	<?php
	$classes = get_body_class();
	if ( ! in_array( 'page-template-full-width', $classes ) ) {
		?>
		</div><!-- .container -->
	<?php } ?>
	<footer id="colophon" class="site-footer">
		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
			<div class="site-footer-wrapper">
				<div class="container">
					<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="footer-inner" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'buddyx' ); ?>">
								<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
							<div class="col-12 col-md-4 mb-4">
								<?php dynamic_sidebar( 'footer-1' ); ?>
								<form action="">
									<div class="mb-3">
										<label for="emailsucription" class="form-label">Email</label>
										<input type="email" class="form-control" id="emailsucription">
									</div>
									<div class="mb-3 form-check">
										<input type="checkbox" class="form-check-input" id="checksuscription">
										<label class="form-check-label" for="checksuscription">He leído y acepto los términos y condiciones,  así como la política de privacidad</label>
									</div>
									<button type="submit" class="botosuscription">Suscribirse</button>
								</form>
							</div>
								<?php } if ( is_active_sidebar( 'footer-2' ) ) { ?>
							<div class="col-12 col-md-2 mb-4">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
							<?php } ?>
								<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
							<div class="col-12 col-md-2 mb-4">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
								<?php } if ( is_active_sidebar( 'footer-4' ) ) { ?>
							<div class="col-12 col-md-4 mb-4">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>
							<?php } ?>
						</div><!-- .widget-area inner-->
					<?php endif; ?>	
				</div><!-- .container -->
			</div><!-- .site-footer-wrapper -->
			<?php get_template_part( 'template-parts/footer/info' ); ?>
		<?php } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="mobile-menu-close"></div>
<?php wp_footer(); ?>

</body>
</html>
