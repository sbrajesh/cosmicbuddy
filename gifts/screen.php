<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="center-column">
			  <!-- user status-->
				<div class='box basics'>
			 
						<div class='box-content'>
				
							<div id="tabbed-subnav">
						
								<?php locate_template( array( 'optionsbar.php' ), true ) ?>
								<br class='clear' />
							</div>
							<h4><?php echo bp_word_or_name( __('Your Gifts', 'bp-gifts' ), __( "%s' Gifts", 'bp-gifts' )  ,false,false) ?></h4>
							<?php if (is_user_logged_in() && !bp_is_my_profile()) { ?>

							<div id="bpgifts-waiting" style="display:none"><img src="<?php echo plugins_url('/buddypress-gifts/includes/templates/css/loading.gif') ?>" /></div>
							<div id="bpgifts-alert"></div><br />

							<div class="sendgift-panel">

							<div class="carousel">

							<ul id="mycarousel" class="jcarousel-skin-tango">

							   <!-- The content goes in here -->

							   <?php

							   $allgift = bp_gifts_allgift();

							   foreach ($allgift as $giftitem) {

								echo '<li><img class="giftitem" id="'.$giftitem->id.'" name="'.$giftitem->gift_name.'" src="'.plugins_url('/buddypress-gifts/includes/images/').$giftitem->gift_image.'" alt="" /></li>';

								}

								?>

							</ul>

							</div>

								<br/>

								<div class="sendgift-box">

								<div class="giftbox"><img class="giftbox" id="999" name="emptybox" src="<?php echo plugins_url('/buddypress-gifts/includes/images/admin/emptybox.png') ?>" style="float:left"/>

								</div>



								<div id="gift-message">

									<div id="gift-textarea">

										<textarea name="gift-message" id="giftms" value="" style="overflow:hidden" cols="50" ></textarea>

									</div>



									<div id="gift-button">

										<span class="highlight" id="sendgift-button" style="cursor:hand">Send Gift</span>

									</div>

								</div>

								</div>

							</div>

							<br class="clear" />

							<?php } ?>

						<!--------------------- display gift activity loop --------------------------------->



						<?php if ( bp_has_activities('scope=mentions&action=new_gifts&display_comments=threaded') ) : ?>



							<div class="pagination">

								<div class="pag-count"><?php bp_activity_pagination_count() ?></div>

								<div class="pagination-links"><?php bp_activity_pagination_links() ?></div>

							</div>



							<ul id="activity-stream" class="activity-list item-list">



							<?php while ( bp_activities() ) : bp_the_activity(); ?>



								<li class="<?php bp_activity_css_class() ?>" id="activity-<?php bp_activity_id() ?>">



									<div class="activity-avatar">

										<a href="<?php bp_activity_user_link() ?>">

											<?php bp_activity_avatar( 'type=full&width=100&height=100' ) ?>

										</a>

									</div>



									<div class="activity-content">



										<div class="activity-header">

											<?php bp_activity_action() ?>

										</div>



										<?php if ( bp_get_activity_content_body() ) : ?>

											<div class="activity-inner">

												<?php bp_activity_content_body() ?>

											</div>

										<?php endif; ?>



										<?php do_action( 'bp_activity_entry_content' ) ?>

										

										<div class="activity-meta">

											<?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>

												<a href="<?php bp_activity_comment_link() ?>" class="acomment-reply" id="acomment-comment-<?php bp_activity_id() ?>"><?php _e( 'Reply', 'buddypress' ) ?> (<span><?php bp_activity_comment_count() ?></span>)</a>

											<?php endif; ?>

										

											<?php if ( is_user_logged_in() ) : ?>

												<?php if ( !bp_get_activity_is_favorite() ) : ?>

													<a href="<?php bp_activity_favorite_link() ?>" class="fav" title="<?php _e( 'Mark as Favorite', 'buddypress' ) ?>"><?php _e( 'Favorite', 'buddypress' ) ?></a>

												<?php else : ?>

													<a href="<?php bp_activity_unfavorite_link() ?>" class="unfav" title="<?php _e( 'Remove Favorite', 'buddypress' ) ?>"><?php _e( 'Remove Favorite', 'buddypress' ) ?></a>

												<?php endif; ?>

											<?php endif;?>

										

											<?php do_action( 'bp_activity_entry_meta' ) ?>

										</div>

										

										<?php if ( bp_activity_can_comment() ) : ?>

											<div class="activity-comments">

												<?php bp_activity_comments() ?>

										

												<?php if ( is_user_logged_in() ) : ?>

												<form action="<?php bp_activity_comment_form_action() ?>" method="post" id="ac-form-<?php bp_activity_id() ?>" class="ac-form-gifts" <?php bp_activity_comment_form_nojs_display() ?>>

													<div class="ac-reply-avatar"><?php bp_loggedin_user_avatar( 'width=25&height=25' ) ?></div>

													<div class="ac-reply-content">

														<div class="ac-textarea">

															<textarea id="ac-input-<?php bp_activity_id() ?>" class="ac-input" name="ac_input_<?php bp_activity_id() ?>"></textarea>

														</div>

														<input type="submit" name="ac_form_submit" value="<?php _e( 'Post', 'buddypress' ) ?> &rarr;" /> &nbsp; <?php _e( 'or press esc to cancel.', 'buddypress' ) ?>

														<input type="hidden" name="comment_form_id" value="<?php bp_activity_id() ?>" />

													</div>

													<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ) ?>

												</form>

												<?php endif; ?>

												

											</div>

										<?php endif; ?>

									</div>

									

								</li>



							<?php endwhile; ?>



							</ul>



						<?php else : ?>

							<div id="message" class="info">

								<p><?php echo bp_word_or_name( __('You still don\'t have any gift yet!', 'bp-gifts' ), __( "Either %s hasn't received any gift yet or they have restricted access", 'bp-gifts' )  ,false,false) ?></p>

							</div>

						<?php endif; ?>





							
						</div><!--end of box content -->
				</div><!--basic section ends here-->
			
							
            </div> <!-- end of center column -->

         <?php locate_template( array( 'members/single/right-sidebar.php' ), true ) ?>
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>