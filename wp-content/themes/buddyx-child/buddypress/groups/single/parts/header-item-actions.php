<?php
/**
 * BuddyPress - Groups Header item-actions.
 *
 * @since 3.0.0
 * @version 3.1.0
 */
?>
<div id="item-actions" class="group-item-actions d-block m-0 text-left" style="max-width: 100% !important;">

	<?php if ( bp_current_user_can( 'groups_access_group' ) ) : ?>

		<h2 class="bp-screen-reader-text"><?php esc_html_e( 'Group Leadership', 'buddypress' ); ?></h2>
<!-- <span class="bp-tooltip" data-bp-tooltip="esto es un test">HOVER</span> -->
		<dl class="moderators-lists d-flex align-items-center">
			<dt class="moderators-title fs-1 fw-400 pr-3"><?php esc_html_e( 'Group Administrators', 'buddypress' ); ?></dt>
			<dd class="user-list admins m-0">
				<?php bp_group_list_admins(); ?>
				<?php bp_nouveau_group_hook( 'after', 'menu_admins' ); ?>
			</dd>
		</dl>

		<?php
		if ( bp_group_has_moderators() ) :
			  bp_nouveau_group_hook( 'before', 'menu_mods' );
		?>

			<dl class="moderators-lists">
				<dt class="moderators-title"><?php esc_html_e( 'Group Mods', 'buddypress' ); ?></dt>
				<dd class="user-list moderators">
					<?php
					bp_group_list_mods();
					bp_nouveau_group_hook( 'after', 'menu_mods' );
					?>
				</dd>
			</dl>

		<?php endif; ?>

	<?php endif; ?>

</div><!-- .item-actions -->
