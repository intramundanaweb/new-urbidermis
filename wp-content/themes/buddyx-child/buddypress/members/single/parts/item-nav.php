<?php
/**
 * BuddyPress Single Members item Navigation
 *
 * @since BuddyPress 3.0.0
 * @version 3.1.0
 */
?>

<nav class="<?php //bp_nouveau_single_item_nav_classes(); ?> bg-transparent br-none col-lg-2 col-12" id="object-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'buddyboss' ); ?>">

	<?php if ( bp_nouveau_has_nav( array( 'type' => 'primary' ) ) ) : ?>

		<ul class="brr-black d-inline-block" style="overflow:hidden;">

			<?php
			while ( bp_nouveau_nav_items() ) :
				bp_nouveau_nav_item();

				$hidden_tabs = bp_nouveau_get_appearance_settings( 'user_nav_hide' );
				$bp_nouveau  = bp_nouveau();
				$nav_item    = $bp_nouveau->current_nav_item;

				if ( ! is_admin() && is_array( $hidden_tabs ) && ! empty( $hidden_tabs ) && in_array( $nav_item->slug, $hidden_tabs, true ) ) {
					continue;
				}

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

			<?php bp_nouveau_member_hook( '', 'options_nav' ); ?>

		</ul>

	<?php endif; ?>

</nav>
