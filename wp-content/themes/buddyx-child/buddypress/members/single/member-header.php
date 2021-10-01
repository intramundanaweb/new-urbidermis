<?php
/**
 * BuddyBoss - Users Header
 *
 * @since BuddyPress 3.0.0
 * @version 3.0.0
 */
?>

<div class="item-header-wrap">

	<div id="item-header-avatar" class="position-relative col-lg-2 col-12">
		<?php if ( bp_is_my_profile() && ! bp_disable_avatar_uploads() ) { ?>
			<a href="<?php bp_members_component_link( 'profile', 'change-avatar' ); ?>" class="link-change-profile-image bp-tooltip" data-bp-tooltip-pos="up" data-bp-tooltip="<?php _e('Change Profile Photo', 'buddyboss'); ?>">
				<i class="bb-icon-edit-thin"></i>
			</a>
		<?php } ?>
		<?php //bp_displayed_user_avatar( 'type=full' ); ?>
	</div><!-- #item-header-avatar -->

	<div id="item-header-content" class="col-lg-10 col-12">
		<div class="col-12 px-0 d-flex justify-content-between">
			<div class="col-9 px-0">
				<h1><?php _e('Perfil','intramundana'); ?>, <?php echo bp_core_get_user_displayname( bp_displayed_user_id() ); ?> </h1>
				<?php echo bp_get_user_social_networks_urls(); ?>
			</div>
			<div class="col-3 px-0 d-flex align-profile-title ">
				
				<?php if ( ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) || bp_nouveau_member_has_meta() ) : ?>
					<div class="item-meta">
						<?php
						if ( true === bp_member_type_enable_disable() && true === bp_member_type_display_on_profile() ) {
							echo bp_get_user_member_type( bp_displayed_user_id() );
						} elseif ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) { ?>
							<span class="mention-name">@<?php bp_displayed_user_mentionname(); ?></span><?php
						} ?>

						<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() && bp_nouveau_member_has_meta() && '' !== bp_get_user_member_type( bp_displayed_user_id() ) ) : ?>
							<span class="separator">&bull;</span>
						<?php endif; ?>

						<?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>

						<?php if ( bp_nouveau_member_has_meta() ) : ?>
							<?php bp_nouveau_member_meta(); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>
			</div>
		</div>
		<?php 
			$descripcionperfil = xprofile_get_field_data(22, bp_displayed_user_id());
			echo $descripcionperfil;
		?>
		<?php //bp_nouveau_member_header_buttons( array( 'container_classes' => array( 'member-header-actions' ) ) ); ?>
	</div><!-- #item-header-content -->

</div><!-- .item-header-wrap -->
