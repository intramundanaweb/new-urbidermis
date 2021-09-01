<?php
/**
 * BuddyPress Single Groups item Navigation
 *
 * @since 3.0.0
 * @version 3.0.0
 */
?>

<nav class="<?php //bp_nouveau_single_item_nav_classes(); ?> bg-transparent br-none col-lg-2 col-12" id="object-nav" role="navigation" aria-label="<?php esc_attr_e( 'Group menu', 'buddypress' ); ?>">

	<?php if ( bp_nouveau_has_nav( array( 'object' => 'groups' ) ) ) : ?>

		<ul class="brr-black d-inline-block" style="overflow:hidden;">

			<?php
			while ( bp_nouveau_nav_items() ) :
				bp_nouveau_nav_item();
			?>

				<li id="<?php bp_nouveau_nav_id(); ?>" class="<?php bp_nouveau_nav_classes(); ?> brb-black">
					<a href="<?php bp_nouveau_nav_link(); ?>" id="<?php bp_nouveau_nav_link_id(); ?>" class="fs-12 fw-400 d-block pl-4 pr-5 py-3">
						<?php bp_nouveau_nav_link_text(); ?>

						<?php if ( bp_nouveau_nav_has_count() ) : ?>
							<span class="count fw-500 ml-3 p-2"><?php bp_nouveau_nav_count(); ?></span>
						<?php endif; ?>
					</a>
				</li>

			<?php endwhile; ?>

			<?php bp_nouveau_group_hook( '', 'options_nav' ); ?>

		</ul>

	<?php endif; ?>

</nav>
