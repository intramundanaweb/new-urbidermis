<?php
/**
 * Template part for displaying the footer info
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;

?>

<div class="site-info">
	<div class="container">	
		<?php //echo buddyx_footer_custom_text(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<p class="text-right">© Urbidermis <?php echo date('Y'); ?></p>
	</div>
	
	<?php
		// if ( function_exists( 'the_privacy_policy_link' ) ) {
		// 	the_privacy_policy_link();
		// }
	?>
</div><!-- .site-info -->
