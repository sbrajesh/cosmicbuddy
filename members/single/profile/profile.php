<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="center-column">
			  <!-- user status-->
			  <div class='box basics'>
			 
			  <div class='box-content'>
				<?php locate_template( array('members/single/profile/profile-header.php' ), true ) ?>
				
					
					<div id="content-header"><?php bp_last_activity() ?>
					</div>
				
				<div id="tabbed-subnav">
			
				<?php 
				
				locate_template( array( 'optionsbar.php' ), true ) ?>
				
				<br class='clear' />
				</div>
				<?php locate_template( array( 'members/single/profile/profile-loop.php' ), true ) ?>
			</div><!--end of box content -->
          </div><!--basic section ends here-->
			<!-- submenu -->
			<?php do_action("cb_after_profile_fields");?>
				
				<?php /* Latest Activity Loop */ ?>
			<?php if ( function_exists( 'bp_activity_install')) : ?>
				<?php
				/** if users own profile show the activity post form**/
				?>
				<?php if ( is_user_logged_in() && bp_is_my_profile() ): ?>
				<?php locate_template( array( 'activity/post-form.php'), true ) ?>
				<?php endif; ?>
				
				
				<?php do_action( 'bp_before_profile_activity_widget' ) ?>
				<div class='box activity'>
				
				<div id="profile-activity" class='box-content'>
				<div class="bp-widget">
					<h4><?php echo bp_word_or_name( __( "My Latest Activity", 'buddypress' ), __( "%s's Latest Activity", 'buddypress' ), true, false ) ?> <span><a href="<?php echo bp_displayed_user_domain() . BP_ACTIVITY_SLUG ?>"><?php _e( 'See All', 'buddypress' ) ?> &rarr;</a></span></h4>

					<?php if ( bp_has_activities( 'type=personal&max=5' ) ) : ?>

						<div id="activity-rss">
							<p><a href="<?php bp_activities_member_rss_link() ?>" title="<?php _e( 'RSS Feed', 'buddypress' ) ?>"><?php _e( 'RSS Feed', 'buddypress' ) ?></a></p>
						</div>

						<ul id="activity-list" class="activity-list item-list">
						<?php while ( bp_activities() ) : bp_the_activity(); ?>
							<li class="<?php bp_activity_css_class() ?>">
								<div class="activity-avatar">
								<a href="<?php bp_activity_user_link() ?>">
									<?php bp_activity_avatar("height=50&width=50") ?>
								</a>
								</div>
							<div class="activity-header">
									<?php bp_activity_action() ?>
							</div>

							<?php if ( bp_activity_has_content() ) : ?>
							<div class="activity-inner">
								<?php bp_activity_content_body() ?>
								</div>
							<?php endif; ?>
								<br class='clear' />
							</li>
						<?php endwhile; ?>
						</ul>

					<?php else: ?>

						<div id="message" class="info">
							<p><?php echo bp_word_or_name( __( "You haven't done anything recently.", 'buddypress' ), __( "%s hasn't done anything recently.", 'buddypress' ), true, false ) ?></p>
						</div>

					<?php endif;?>
				</div>
				</div>
				</div>
				<?php do_action( 'bp_after_profile_activity_widget' ) ?>
			
			<?php endif; ?>

			<?php do_action( 'bp_after_profile_activity_loop' ) ?>
			
			<?php do_action( 'bp_before_profile_wire_loop' ); /* Deprecated -> */ do_action( 'bp_custom_profile_boxes' ) ?>

			<?php /* Profile Wire Loop - uses [TEMPLATEPATH]/wire/post-list.php */ ?>
			<?php if ( function_exists('bp_wire_get_post_list') && function_exists( 'xprofile_install' ) ) : ?>
			
				<?php do_action( 'bp_before_profile_wire_widget' ) ?>

				<?php bp_wire_get_post_list( bp_current_user_id(), bp_word_or_name( __( "My Wire", 'buddypress' ), __( "%s's Wire", 'buddypress' ), true, false ), bp_word_or_name( __( "No one has posted to your wire yet.", 'buddypress' ), __( "No one has posted to %s's wire yet.", 'buddypress' ), true, false ), bp_profile_wire_can_post() ) ?>

				<?php do_action( 'bp_after_profile_wire_widget' ) ?>
				
			<?php endif; ?>

			<?php do_action( 'bp_after_profile_wire_loop' ) ?>
							
            </div> <!-- end of center column -->

         <?php locate_template( array( 'members/single/right-sidebar.php' ), true ) ?>
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>