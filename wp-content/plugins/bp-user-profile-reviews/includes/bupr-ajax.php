<?php
/**
 * Class to serve AJAX Calls
 *
 * @since    1.0.0
 * @author   Wbcom Designs
 * @package BuddyPress_Member_Reviews
 */

defined( 'ABSPATH' ) || exit;

/**
* Class to serve AJAX Calls
*
* @since    1.0.0
* @author   Wbcom Designs
*/
if ( ! class_exists( 'BUPR_AJAX' ) ) {
	/**
	 * The ajax functionality of the plugin.
	 *
	 * @package    BuddyPress_Member_Reviews
	 * @author     wbcomdesigns <admin@wbcomdesigns.com>
	 */
	class BUPR_AJAX {

		/**
		 * Constructor.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @author   Wbcom Designs
		 */
		public function __construct() {

			/* add action for approving reviews */
			add_action( 'wp_ajax_bupr_approve_review', array( $this, 'bupr_approve_review' ) );
			add_action( 'wp_ajax_nopriv_bupr_approve_review', array( $this, 'bupr_approve_review' ) );

			add_action( 'wp_ajax_allow_bupr_member_review_update', array( $this, 'wp_allow_bupr_my_member' ) );
			add_action( 'wp_ajax_nopriv_allow_bupr_member_review_update', array( $this, 'wp_allow_bupr_my_member' ) );

			/*** Filter post_date_gmt for prevent update post date on update_post_data */
			add_filter( 'wp_insert_post_data', array( $this, 'bupr_filter_review_post' ), 10, 1 );
			// Filter widget ratings.
			add_action( 'wp_ajax_bupr_filter_ratings', array( $this, 'bupr_filter_ratings' ) );
			add_action( 'wp_ajax_nopriv_bupr_filter_ratings', array( $this, 'bupr_filter_ratings' ) );
			// Filter Reviews listings.
			add_action( 'wp_ajax_bupr_reviews_filter', array( $this, 'bupr_reviews_filter' ) );
			add_action( 'wp_ajax_nopriv_bupr_reviews_filter', array( $this, 'bupr_reviews_filter' ) );
		}

		/**
		 * Actions performed to filter member reviews.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @author   Wbcom Designs
		 */
		public function bupr_reviews_filter() {
			if ( filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) && filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) === 'bupr_reviews_filter' ) {
				global $bp,$post;
				global $allowedtags,$allowedposttags;
				global $bupr;
				$filter = sanitize_text_field( filter_input( INPUT_POST, 'filter' ) );
				$limit  = sanitize_text_field( filter_input( INPUT_POST, 'limit' ) );

				/*** Displayed user Reviews start */

				$bupr_avg_rating = 0;
				/* Gather all the members reviews */
				$bupr_args = array(
					'post_type'   => 'review',
					'post_status' => 'publish',
					'category'    => 'bp-member',
					'meta_query'  => array(
						array(
							'key'     => 'linked_bp_member',
							'value'   => bp_displayed_user_id(),
							'compare' => '=',
						),
					),
				);

				/*** Displayed user Reviews end */

				$reviews            = get_posts( $bupr_args );
				$bupr_total_rating  = 0;
				$bupr_reviews_count = count( $reviews );
				$final_review_arr   = array();
				$final_review_obj   = array();
				if ( $bupr_reviews_count !== 0 ) {
					foreach ( $reviews as $review ) {
						$rate                = 0;
						$reviews_field_count = 0;
						$review_ratings      = get_post_meta( $review->ID, 'profile_star_rating', false );

						if ( ! empty( $review_ratings[0] ) ) {

							if ( ! empty( $bupr['active_rating_fields'] ) && ! empty( $review_ratings[0] ) ) {
								foreach ( $review_ratings[0] as $field => $value ) {
									if ( array_key_exists( $field, $bupr['active_rating_fields'] ) ) {
										$rate += $value;
										$reviews_field_count++;
									}
								}
								if ( $reviews_field_count !== 0 ) {
									$final_review_arr[ $review->ID ] = (int) $rate / $reviews_field_count;
									$final_review_obj[ $review->ID ] = $review;
								}
							}
						}
					}
				}

				if ( ! empty( $final_review_arr ) ) {
					if ( 'highest' === $filter ) {
						arsort( $final_review_arr );
					} elseif ( 'lowest' === $filter ) {
						asort( $final_review_arr );
					} else {
						$final_review_arr = $final_review_arr;
					}
				}

				$args = array(
					'post_type'      => 'review',
					'post_status'    => 'publish',
					'posts_per_page' => $bupr['reviews_per_page'],
					'paged'          => get_query_var( 'page', 1 ),
					'category'       => 'bp-member',
					'post__in'       => array_keys( $final_review_arr ),
					'orderby'        => 'post__in',
					'meta_query'     => array(
						array(
							'key'     => 'linked_bp_member',
							'value'   => bp_displayed_user_id(),
							'compare' => '=',
						),
					),
				);

				$reviews = new WP_Query( $args );
				$html    = '';
				if ( $reviews->have_posts() ) {
					while ( $reviews->have_posts() ) :
						$reviews->the_post();
						$review_date           = date_i18n( 'M Y' );
						$anonymous_post_review = get_post_meta( $post->ID, 'bupr_anonymous_review_post', true );
						$member_review_ratings = get_post_meta( $post->ID, 'profile_star_rating', false );
						$author                = $reviews->post->post_author;
						$html                 .= '<div class="bupr-row"><div class="bupr-members-profiles"><div class="item-avatar">';
						if ( $anonymous_post_review === 'yes' ) {
							$avatar_url = bp_core_avatar_default(
								$type   = 'local',
								array(
									'height' => 96,
									'width'  => 96,
									'html'   => true,
								)
							);
							$html .= "<img src='" . $avatar_url . "' class='avatar avatar-96 photo' alt='Profile Photo' width='96' height='96'></img>";
						} else {

							$html .= bp_core_fetch_avatar(
								array(
									'item_id' => $author,
									'height'  => 96,
									'width'   => 96,
								)
							);
						}

						if ( ! empty( $bupr['active_rating_fields'] ) ) {
							$member_review_rating_fields = $bupr['active_rating_fields'];

						}
						$bupr_rating_criteria = array();
						if ( ! empty( $member_review_rating_fields ) ) {
							foreach ( $member_review_rating_fields as $bupr_keys => $bupr_fields ) {
								if ( 'yes' === $bupr_fields ) {
									$bupr_rating_criteria[] = $bupr_keys;
								}
							}
						}

						$html .= '</div><div class="reviewer"><h4>';
						if ( $anonymous_post_review === 'yes' ) {
							$html .= esc_html__( 'anonymous', 'bp-member-reviews' );
						} else {
							$html .= wp_kses( bp_core_get_userlink( $author ), $allowedtags );
						}
						$html .= '</h4></div></div><div class="bupr-members-content">';

						if ( ! empty( $member_review_ratings ) ) {
							$member_review_ratings_new = array();
							$html                     .= "<div class='rating-sec'>";
							foreach ( $bupr_rating_criteria as $bupr_rating_each_criteria ) {
								if ( array_key_exists( $bupr_rating_each_criteria, $member_review_ratings[0] ) ) {
									$member_review_ratings_new[ $bupr_rating_each_criteria ] = $member_review_ratings[0][ $bupr_rating_each_criteria ];
								}
							}
							if ( ! empty( $member_review_ratings_new ) ) {
								$aggregate = array_sum( $member_review_ratings_new ) / count( $member_review_ratings_new );
								$html     .= "<div class='rating-star'>";
								for ( $i = 0; $i < 5; $i++ ) {
									if ( floor( $aggregate ) - $i >= 1 ) {
										$html .= '<span class="fas fa-star bupr-star-rate"></span>';
									} elseif ( $aggregate - $i > 0 ) {
										$html .= '<span class="fa fa-star-half-o bupr-star-rate"></span>';
									} else {
										$html .= '<span class="far fa-star stars bupr-star-rate"></span>';
									}
								}
								$html .= '</div>';
								$html .= '<span class="rating-num">' . number_format( $aggregate, 2 ) . '</span>';
							}
						}

						$html       .= '<span class="posted-on list"><time class="entry-date published updated">' . esc_html( $review_date ) . '	</time></span> ';
						$html       .= '</div>';
						$url         = 'view / ' . get_the_id();
						$html       .= '<div class = "bupr-review-description"> <div class="bupr-full-description">';
						$trimcontent = get_the_content();
						if ( ! empty( $trimcontent ) ) {
							$len = strlen( $trimcontent );
							if ( $len > 150 ) {
								$shortexcerpt = substr( $trimcontent, 0, 150 );
								$html        .= '<div class ="description">' . wpautop( $shortexcerpt ) . '</div>';
								$html        .= '<a href = "' . esc_attr( $url ) . '" ><i> ' . esc_html__( 'read more...', 'bp-member-reviews' ) . '</i></a>';
							} else {
								$html .= ' <div class = "description">' . wpautop( $trimcontent ) . '</div>';
							}
						}

						if ( ! empty( $member_review_rating_fields ) && ! empty( $member_review_ratings[0] ) ) :

							foreach ( $member_review_ratings[0] as $field => $bupr_value ) {
								if ( in_array( $field, $bupr_rating_criteria, true ) ) {
									$html .= ' <div class="multi-review inline-content"><div class="bupr-col-4">' . esc_attr( $field ) . '</div>';

									/*** Star rating Ratings */
									$stars_on  = $bupr_value;
									$stars_off = 5 - $stars_on;
									$html     .= '<div class= "bupr-col-4">';
									for ( $i = 1; $i <= $stars_on; $i++ ) {
										$html .= '<span class= "fas fa-star bupr-star-rate"></span >';
									}

									for ( $i = 1; $i <= $stars_off; $i++ ) {
										$html .= '<span class = "far fa-star stars bupr-star-rate"></span>';
									}
									/*star rating end */

									$html .= '</div>';
									$html .= '</div>';
								}
							}
										endif;
									$html .= '</div></div></div></div>';
					endwhile;

					$total_pages = $reviews->max_num_pages;
					if ( $total_pages > 1 ) {
						$html .= "<div class = 'bupr-pagination' >";
							/*** Posts pagination */
							$html .= "<div class='bupr - posts - pagination'>";
							$html .= wp_kses(
								paginate_links(
									array(
										'base'    => add_query_arg( 'page', ' % // %' ),
										'format'  => '',
										'current' => max( 1, get_query_var( 'page' ) ),
										'total'   => $reviews->max_num_pages,
									)
								),
								$allowedposttags
							);
							$html .= '</div>';
						$html     .= '</div>';
					}
					wp_reset_postdata();
				} else {
					$bp_template_option = bp_get_option( '_bp_theme_package_id' );
					if ( 'nouveau' === $bp_template_option ) {
						$html .= '<div id="message" class="info bp-feedback bp-messages bp-template-notice"><span class="bp-icon" aria-hidden="true"></span>';
					} else {
						$html .= '<div id="message" class="info">';
					}
						$html .= '<p>' . sprintf( esc_html__( 'Sorry, no %1$s were found.', 'bp-member-reviews' ), $bupr['review_label'] ) . '

						</p>
					</div>';

				}

				echo stripslashes( $html );
				die;

			}
		}

		/**
		 * Actions performed to filter member ratings.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @author   Wbcom Designs
		 */
		public function bupr_filter_ratings() {
			if ( filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) && filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) === 'bupr_filter_ratings' ) {
				global $bupr;
				$filter = sanitize_text_field( filter_input( INPUT_POST, 'filter' ) );
				$limit  = sanitize_text_field( filter_input( INPUT_POST, 'limit' ) );

				/* Gather all the members reviews */
				$bupr_args = array(
					'post_type'   => 'review',
					'post_status' => 'publish',
					'category'    => 'bp-member',
					'meta_query'  => array(
						array(
							'key'     => 'linked_bp_member',
							'value'   => bp_displayed_user_id(),
							'compare' => '=',
						),
					),
				);

				/*** Displayed user Reviews end */

				$reviews            = get_posts( $bupr_args );
				$bupr_total_rating  = 0;
				$bupr_reviews_count = count( $reviews );
				$final_review_arr   = array();
				$final_review_obj   = array();
				$html               = '';

				if ( $bupr_reviews_count !== 0 ) {
					foreach ( $reviews as $review ) {
						$rate                = 0;
						$reviews_field_count = 0;
						$review_ratings      = get_post_meta( $review->ID, 'profile_star_rating', false );
						if ( ! empty( $review_ratings[0] ) ) {

							if ( ! empty( $bupr['active_rating_fields'] ) && ! empty( $review_ratings[0] ) ) {
								foreach ( $review_ratings[0] as $field => $value ) {
									if ( array_key_exists( $field, $bupr['active_rating_fields'] ) ) {
										$rate += $value;
										$reviews_field_count++;
									}
								}
								if ( $reviews_field_count !== 0 ) {
									$final_review_arr[ $review->ID ] = (int) $rate / $reviews_field_count;
									$final_review_obj[ $review->ID ] = $review;
								}
							}
						}
					}
				}
				$bupr_user_count = 0;
				if ( 'highest' === $filter ) {
					arsort( $final_review_arr );
				} elseif ( 'lowest' === $filter ) {
					asort( $final_review_arr );
				} else {
					$final_review_arr = $final_review_arr;
				}

				if ( ! empty( $final_review_arr ) ) {
					foreach ( $final_review_arr as $buprKey => $buprValue ) {
						if ( $bupr_user_count === $limit ) {
							break;
						} else {
							$html .= '<li class="vcard"><div class="item-avatar">';
							$html .= get_avatar( $final_review_obj[ $buprKey ]->ID, 65 );
							$html .= '</div>';
							$html .= '<div class="item">';

							$members_profile = bp_core_get_userlink( $final_review_obj[ $buprKey ]->post_author );
							$html           .= '<div class="item-title fn">';
							$html           .= $members_profile;
							$html           .= '</div>';

							$bupr_avg_rating = $buprValue;
							$stars_on        = $stars_off = $stars_half = '';
							$remaining       = $bupr_avg_rating - (int) $bupr_avg_rating;
							if ( $remaining > 0 ) {
								$stars_on        = intval( $bupr_avg_rating );
								$stars_half      = 1;
								$bupr_half_squar = 1;
								$stars_off       = 5 - ( $stars_on + $stars_half );
							} else {
								$stars_on   = $bupr_avg_rating;
								$stars_off  = 5 - $bupr_avg_rating;
								$stars_half = 0;
							}
							$html .= '<div class="item-meta">';

							for ( $i = 1; $i <= $stars_on; $i++ ) {
								$html .= '<span class="fas fa-star bupr-star-rate"></span>';
							}

							for ( $i = 1; $i <= $stars_half; $i++ ) {
								$html .= '<span class="fas fa-star-half-alt bupr-star-rate"></span>';
							}

							for ( $i = 1; $i <= $stars_off; $i++ ) {
								$html .= '<span class="far fa-star bupr-star-rate"></span>';

							}
							$html .= '</div>';

							$bupr_avg_rating = round( $bupr_avg_rating, 2 );
							$html           .= '<span class="bupr-meta">';
							$html           .= sprintf( esc_html__( 'Rating : ( %1$s )', 'bp-member-reviews' ), esc_html( $bupr_avg_rating ) );
							$html           .= '</span>';
							$html           .= '</div></li>';

						}

						$bupr_user_count++;
					}
				} else {
					$html .= '<p>' . esc_html__( 'No member has been rated yet.', 'bp-member-reviews' ) . '</p>';
				}
				$result = array(
					'html' => $html,
				);
				echo json_encode( $result );
				die;
			}
		}

		/**
		 * Actions performed on inserting post data.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @param    array $data Post data array.
		 * @author   Wbcom Designs
		 */
		public function bupr_filter_review_post( $data ) {
			if ( $data['post_type'] === 'review' ) {
				$post_date             = $data['post_date'];
				$post_date_gmt         = get_gmt_from_date( $post_date );
				$data['post_date_gmt'] = $post_date_gmt;
			}
			return $data;
		}

		/**
		 * Actions performed to approve review at admin end.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @author   Wbcom Designs
		 */
		public function bupr_approve_review() {
			if ( filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) && filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) === 'bupr_approve_review' ) {
				$rid  = sanitize_text_field( filter_input( INPUT_POST, 'review_id' ) );
				$args = array(
					'ID'          => $rid,
					'post_status' => 'publish',
				);
				wp_update_post( $args );
				echo 'review-approved-successfully';
				die;
			}
		}

		/**
		 * Add review to member's profile.
		 *
		 * @since    1.0.0
		 * @author   Wbcom Designs
		 */
		public function wp_allow_bupr_my_member() {
			global $bupr;
			if ( filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) && filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) === 'allow_bupr_member_review_update' ) {

				$bupr_rating_criteria = array();
				if ( ! empty( $bupr['active_rating_fields'] ) ) {
					foreach ( $bupr['active_rating_fields'] as $bupr_keys => $bupr_fields ) {
						if ( $bupr_fields === 'yes' ) {
							$bupr_rating_criteria[] = $bupr_keys;
						}
					}
				}

				$bupr_reviews_status = 'draft';
				if ( 'yes' === $bupr['auto_approve_reviews'] ) {
					$bupr_reviews_status = 'publish';
				}

				$bupr_multi_reviews = $bupr['multi_reviews'];

				$bupr_current_user          = filter_input( INPUT_POST, 'bupr_current_user', FILTER_SANITIZE_STRING );
				$review_subject             = filter_input( INPUT_POST, 'bupr_review_title', FILTER_SANITIZE_STRING );
				$review_desc                = filter_input( INPUT_POST, 'bupr_review_desc', FILTER_SANITIZE_STRING );
				$bupr_member_id             = filter_input( INPUT_POST, 'bupr_member_id', FILTER_SANITIZE_STRING );
				$review_count               = filter_input( INPUT_POST, 'bupr_field_counter', FILTER_SANITIZE_STRING );
				$anonymous_review           = filter_input( INPUT_POST, 'bupr_anonymous_review', FILTER_SANITIZE_STRING );
				$profile_rated_field_values = isset( $_POST['bupr_review_rating'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['bupr_review_rating'] ) ) : '';

				$bupr_count = 0;

				$bupr_member_star = array();
				$member_args      = array(
					'post_type'      => 'review',
					'posts_per_page' => -1,
					'post_status'    => array(
						'draft',
						'publish',
					),
					'author'         => $bupr_current_user,
					'category'       => 'bp-member',
					'meta_query'     => array(
						array(
							'key'     => 'linked_bp_member',
							'value'   => $bupr_member_id,
							'compare' => '=',
						),
					),
				);
				$reviews_args     = new WP_Query( $member_args );

				if ( 'no' === $bupr['multi_reviews'] ) {
					$user_post_count = $reviews_args->post_count;
				} else {
					$user_post_count = 0;
				}

				if ( $user_post_count === 0 ) {
					if ( ! empty( $profile_rated_field_values ) ) {
						foreach ( $profile_rated_field_values as $bupr_stars_rate ) {
							if ( $bupr_count === $review_count ) {
								break;
							} else {
								$bupr_member_star[] = $bupr_stars_rate;
							}
							$bupr_count++;
						}
					}

					if ( ! empty( $bupr_member_id ) && $bupr_member_id !== 0 ) {
						$bupr_rated_stars = array();
						if ( ! empty( $bupr_rating_criteria ) ) :
							$bupr_rated_stars = array_combine( $bupr_rating_criteria, $bupr_member_star );
						endif;

						$add_review_args = array(
							'post_type'    => 'review',
							'post_title'   => $review_subject,
							'post_content' => $review_desc,
							'post_status'  => $bupr_reviews_status,
						);

						$review_id = wp_insert_post( $add_review_args );
						if ( $review_id ) {

							if ( ! empty( $bupr_current_user ) && ! empty( $bupr_member_id ) ) {
								$bupr_sender_data    = get_userdata( $bupr_current_user );
								$bupr_sender_email   = $bupr_sender_data->data->user_email;
								$bupr_reciever_data  = get_userdata( $bupr_member_id );
								$bupr_reciever_email = $bupr_reciever_data->data->user_email;
								$bupr_reciever_name  = $bupr_reciever_data->data->user_nicename;
								$bupr_reciever_login = $bupr_reciever_data->data->user_login;
								$bupr_review_url     = bp_core_get_user_domain( $bupr_member_id ) . strtolower( $bupr['review_label_plural'] ) . '/view/' . $review_id;
							}

							/* send notification to member if  notification is enable */
							if ( 'yes' === $bupr['allow_notification'] ) {
								do_action( 'bupr_sent_review_notification', $bupr_member_id, $review_id );
							}

							/* send email to member if email notification is enable */
							if ( 'yes' === $bupr['allow_email'] ) {
								$bupr_to       = $bupr_reciever_email;
								$bupr_subject  = sprintf( 'You have got a new %s', $bupr['review_label'] );// $review_subject;
								$bupr_message .= '<p>' . sprintf( esc_html__( 'Welcome ! %s You have a new %2$s on your profile.', 'bp-member-reviews' ), esc_attr( $bupr_reciever_name ), $bupr['review_label'] ) . '</p>';
								$bupr_message .= sprintf( esc_html__( 'To read your %s click on the link given below.', 'bp-member-reviews' ), $bupr['review_label'] );
								$bupr_message .= '<a href="' . $bupr_review_url . '">' . $review_subject . '</a>';
								$bupr_header   = "From:$bupr_sender_email \r\n";
								$bupr_header  .= "MIME-Version: 1.0\r\n";
								$bupr_header  .= "Content-type: text/html\r\n";
								wp_mail( $bupr_to, $bupr_subject, $bupr_message, $bupr_header );
							}

							if ( 'no' === $bupr['auto_approve_reviews'] ) {
								echo sprintf( esc_html__( 'Thank you for taking time to write this %1$s. Your %1$s will display on members\' profile after moderator approval.', 'bp-member-reviews' ), esc_html( $bupr['review_label'] ) );
							} else {
								echo sprintf( esc_html__( 'Thank you for taking the time to write this %1$s!', 'bp-member-reviews' ), esc_html( strtolower( $bupr['review_label'] ) ) );
							}
						} else {
							echo '<p class="bupr-error">';
							esc_html_e( 'Please try again!', 'bp-member-reviews' );
							echo '</p>';
						}

						wp_set_object_terms( $review_id, 'BP Member', 'review_category' );
						update_post_meta( $review_id, 'linked_bp_member', $bupr_member_id );

						if ( 'yes' === $bupr['anonymous_reviews'] ) {
							update_post_meta( $review_id, 'bupr_anonymous_review_post', $anonymous_review );
						}
						if ( ! empty( $bupr_rated_stars ) ) :
							update_post_meta( $review_id, 'profile_star_rating', $bupr_rated_stars );
						endif;
					} else {
						echo '<p class="bupr-error">';
						esc_html_e( 'Please select a member.', 'bp-member-reviews' );
						echo '</p>';
					}
				} else {
					echo sprintf( esc_html__( 'You already posted a %1$s for this member.', 'bp-member-reviews' ), esc_html( $bupr['review_label'] ) );
				}
				die;
			}
		}
	}
	new BUPR_AJAX();
}
