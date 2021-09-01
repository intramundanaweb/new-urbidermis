<?php
/**
 * BuddyPress - Groups Loop
 *
 * @since 3.0.0
 * @version 3.1.0
 */

bp_nouveau_before_loop(); ?>

<?php if ( bp_get_current_group_directory_type() ) : ?>
<p class="current-group-type"><?php bp_current_group_directory_type_message(); ?></p>
<?php endif; ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

<?php bp_nouveau_pagination( 'top' ); ?>


<div class="<?php bp_nouveau_loop_classes(); ?> loop-proyectos accordion" id="groups-list">
    <?php
	while ( bp_groups() ) :
		bp_the_group();
		?>
    <div class="col-lg-3 col-md-4 col-12 mb-lg-5 mb-4">
        <div class="card p-0 bg-transparent " <?php bp_group_class( array( 'item-entry' ) ); ?>
            data-bp-item-id="<?php bp_group_id(); ?>" data-bp-item-component="groups">
            <div class="card-header px-lg-4 px-3" id="open-project-<?php bp_group_id(); ?>">

                <button class="btn p-0 w-100 d-flex justify-content-between align-items-center open-info-project collapsed" type="button"
                    data-toggle="collapse" data-target="#content-project-<?php bp_group_id(); ?>" aria-expanded="false"
                    aria-controls="content-project-<?php bp_group_id(); ?>">
                    <h2 class="px-0 list-title groups-title text-left mb-0">
                        <?php bp_group_name(); ?><?php //bp_group_link(); ?></h2>
                    <span class="icon-arrow-down d-block color-blank fs-15"></span>
                </button>

            </div>

            <div id="content-project-<?php bp_group_id(); ?>" class="collapse"
                aria-labelledby="open-project-<?php bp_group_id(); ?>" data-parent="#groups-list">
                <div class="card-body p-0">
                    <?php if ( bp_nouveau_group_has_meta() ) : ?>
                    <?php if ( function_exists( 'bp_nouveau_the_group_meta' ) ) { ?>
                    <p class="item-meta group-details text-left">
                        <?php bp_nouveau_the_group_meta( array( 'keys' => array( 'status', 'count' ) ) ); ?></p>
                    <?php } else { ?>
                    <p class="miembros item-meta group-details text-left px-lg-4 px-3">
                        <?php echo bp_get_group_member_count();//bp_nouveau_group_meta(); ?></p>
                    <?php } ?>

                    <?php endif; ?>

                    <p class="last-activity item-meta d-none">
                        <?php
                        printf(
                            /* translators: %s = last activity timestamp (e.g. "active 1 hour ago") */
                            __( 'active %s', 'buddyx' ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            bp_get_group_last_active() // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        );
					?>
                    </p>

                    <div class="group-description item-meta group-details text-left px-lg-4 px-3">
                        <?php bp_group_description();?>
                    </div><!-- //.group_description -->

                    <?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
                    <div class="pl-0 item-avatar">
                        <?php bp_group_avatar( bp_nouveau_avatar_args(array('type'    => 'FULL')) ); ?>
                    </div>
                    <?php endif; ?>

                    <div class="permalink-bp-group">
                        <a href="<?php bp_group_permalink(); ?>"
                            class="btn-project py-3 px-lg-4 px-3 d-block"><?php _e('Consultar proyecto', 'intramundana') ?></a>
                    </div>
                    <?php bp_nouveau_groups_loop_item(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php bp_nouveau_pagination( 'bottom' ); ?>


<?php else : ?>

<?php bp_nouveau_user_feedback( 'groups-loop-none' ); ?>

<?php endif; ?>

<?php
bp_nouveau_after_loop();