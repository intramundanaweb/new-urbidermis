<?php
/**
 * Group Members Loop template
 *
 * @since 3.0.0
 * @version 3.2.0
 */
?>

<?php if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) ) ) : ?>

<?php bp_nouveau_group_hook( 'before', 'members_content' ); ?>

<?php bp_nouveau_pagination( 'top' ); ?>

<?php bp_nouveau_group_hook( 'before', 'members_list' ); ?>

<ul id="members-list" class="<?php bp_nouveau_loop_classes(); ?>">

    <?php
		while ( bp_group_members() ) :
			bp_group_the_member();
			?>

    <li <?php bp_member_class( array( 'item-entry' ) ); ?>
        data-bp-item-id="<?php echo esc_attr( bp_get_group_member_id() ); ?>" data-bp-item-component="members">

        <div class="list-wrap row bg-transparent box-shadow-none brr-black p-4">

            <div class="item-avatar col-lg-5 col-12 mb-3 pl-0 pr-lg-4">
                <a href="<?php bp_group_member_domain(); ?>">
                    <?php bp_group_member_avatar(); ?>
                </a>
            </div>

            <div class="item col-lg-7 col-12 d-flex align-items-center mb-3 px-0">

                <div class="item-block">
                    <div class="member-info-wrapper">
                        <h3 class="list-title member-name text-left mb-1 p-0 fs-11"><?php bp_group_member_link(); ?></h3>

                       <!--  
                        Campo para mostrar  ejemplo para mostrar campos especificos
                       <p class="joined item-meta"> 
                            <?php 
								/* $area = xprofile_get_field_data(36, bp_get_group_member_id());
								echo $area;  */
								
							?>

                        </p> -->

                        <div class="text-left">
                            <?php 
							//echo bp_get_member_type(bp_get_group_member_id());
							if (bp_get_member_type(bp_get_group_member_id()) == 'comercial') {
								echo '<div class="users-header-urbi">'.bp_get_user_member_type( bp_get_group_member_id() ).'</div>';
							}elseif (bp_get_member_type(bp_get_group_member_id()) == 'colaborador-externo'){
								echo '<div class="users-header-ex">'.bp_get_user_member_type( bp_get_group_member_id() ).'</div>';
							}elseif (bp_get_member_type(bp_get_group_member_id()) == 'cliente'){
								echo '<div class="users-header-cliente">'.bp_get_user_member_type( bp_get_group_member_id() ).'</div>';
							}elseif (bp_get_member_type(bp_get_group_member_id()) == 'equipo-urbidermis'){
								echo '<div class="users-header-urbi">'.bp_get_user_member_type( bp_get_group_member_id() ).'</div>';
							}
							
							?>
                        </div>

                    </div><!-- .member-info-wrapper -->
                    <div class="member-action-wrapper">
                        <?php //bp_nouveau_members_loop_buttons(); ?>
                    </div><!-- .member-action-wrapper -->
                </div>

            </div>

            <div class="col-12 px-0">

                <div class="user-details text-left">
                    <?php
								if ( bp_has_profile( array( 'user_id' => bp_get_group_member_id() )) ) :
																
								while ( bp_profile_groups() ) : bp_the_profile_group(); 
							?>

                    <div id="profile-groups">
                        <?php if ( bp_profile_group_has_fields() ) : ?>

                        <div>
                            <?php if(bp_get_the_profile_group_id() == 4) :
										//bp_the_profile_group_name() ?>

                            <ul id="profile-group-fields" class="text-left">
                                <?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

                                <?php if ( bp_field_has_data() ) : ?>
                                <li class="joined item-meta py-0 text-left color-black fs-1">
                                    <span class="color-black fs-12"><?php bp_the_profile_field_name() ?>: </span>
                                    <div class="d-inline d-inline-p color-black fs-12"><?php bp_the_profile_field_value() ?></div>
                                </li>
                                <?php endif; ?>

                                <?php endwhile; ?>
                            </ul>

                            <?php endif; ?>
                        </div>

                        <?php endif; ?>
                    </div>

                    <?php endwhile; ?>

                    <?php endif;?>
                </div>

                <?php bp_nouveau_group_hook( '', 'members_list_item' ); ?>

            </div>

        </div><!-- // .list-wrap -->

    </li>

    <?php endwhile; ?>

</ul>

<?php bp_nouveau_group_hook( 'after', 'members_list' ); ?>

<?php bp_nouveau_pagination( 'bottom' ); ?>

<?php bp_nouveau_group_hook( 'after', 'members_content' ); ?>

<?php
else :

	bp_nouveau_user_feedback( 'group-members-none' );

endif;