<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="center-column">
			  <!-- user status-->
				<div class='box basics'>
			 
						<div class='box-content'>
						<?php do_action( 'bp_before_member_settings_template' ); ?>
							<div id="tabbed-subnav">
						
								<ul>
								<?php bp_get_options_nav() ?>
							</ul>
								<br class='clear' />
							</div>
							<?php do_action( 'bp_before_member_body' ); ?>

				<h3><?php _e( 'Email Notification', 'buddypress' ); ?></h3>

				<?php do_action( 'bp_template_content' ) ?>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/notifications'; ?>" method="post" class="standard-form" id="settings-form">
					<p><?php _e( 'Send a notification by email when:', 'buddypress' ); ?></p>

					<?php do_action( 'bp_notification_settings' ); ?>

					<?php do_action( 'bp_members_notification_settings_before_submit' ); ?>

					<div class="submit">
						<input type="submit" name="submit" value="<?php _e( 'Save Changes', 'buddypress' ); ?>" id="submit" class="auto" />
					</div>

					<?php do_action( 'bp_members_notification_settings_after_submit' ); ?>

					<?php wp_nonce_field('bp_settings_notifications'); ?>

				</form>

				<?php do_action( 'bp_after_member_body' ); ?>
						</div><!--end of box content -->
						<?php do_action( 'bp_after_member_settings_template' ); ?>
				</div><!--basic section ends here-->
			
							
            </div> <!-- end of center column -->

         <?php locate_template( array( 'members/single/right-sidebar.php' ), true ) ?>
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>