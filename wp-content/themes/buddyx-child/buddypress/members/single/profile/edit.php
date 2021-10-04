<?php
/**
 * BuddyPress - Members Single Profile Edit
 *
 * @since 3.0.0
 * @version 3.1.0
 */

bp_nouveau_xprofile_hook( 'before', 'edit_content' ); ?>

<!-- <h2 class="screen-heading edit-profile-screen"><?php esc_html_e( 'Edit Profile', 'buddypress' ); ?></h2> -->

<?php if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) :
	while ( bp_profile_groups() ) :
		bp_the_profile_group();
	?>

		<form action="<?php bp_the_profile_group_edit_form_action(); ?>" method="post" id="profile-edit-form" class="standard-form profile-edit <?php bp_the_profile_group_slug(); ?>">

			<?php bp_nouveau_xprofile_hook( 'before', 'field_content' ); ?>

				<?php if ( bp_profile_has_multiple_groups() ) : ?>
					<ul class="button-tabs button-nav">

						<?php bp_profile_group_tabs(); ?>

					</ul>
				<?php endif; ?>

				<!-- <h3 class="screen-heading profile-group-title edit">
					<?php
					printf(
						/* translators: %s = profile field group name */
						__( 'Editing "%s" Profile Group', 'buddypress' ),
						bp_get_the_profile_group_name()
					)
					?>
				</h3> -->


		<div class="container px-0 ">
			<div class="row px-0">

			
				<div class="col-12 col-md-6">
					<?php
						while ( bp_profile_fields() ) : bp_the_profile_field();
						if ( 'textarea' != bp_get_the_profile_field_type() ) : 
					?>
					<div<?php bp_field_css_class( 'editfield' ); ?>>
			
						<?php
							$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
							$field_type->edit_field_html();
						?>

						<?php bp_nouveau_xprofile_edit_visibilty(); ?>
					</div>
					<?php endif; endwhile; ?>
				</div>

				<div class="col-12 col-md-6 ">
					<?php 
						while ( bp_profile_fields() ) : bp_the_profile_field(); 
						if ( 'textarea' == bp_get_the_profile_field_type() ) : 
					?>
					<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
					<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>><?php bp_the_profile_field_edit_value(); ?></textarea>
					<?php endif; endwhile; ?>
				</div>


			

			</div>
		</div>		
			<?php bp_nouveau_xprofile_hook( 'after', 'field_content' ); ?>

			<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

			<?php bp_nouveau_submit_button( 'member-profile-edit' ); ?>

		</form>

	<?php endwhile; ?>

<?php endif; ?>

<?php
bp_nouveau_xprofile_hook( 'after', 'edit_content' );
