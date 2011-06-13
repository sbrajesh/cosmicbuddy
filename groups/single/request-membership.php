<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_request_membership_content' ) ?>

			   <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="center-column">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; <?php _e( 'Request Membership', 'buddypress' ); ?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- breadcrumb-->
								<!--end of breadcrum -->
						</div>
						
				
				<div class="bp-widget">
				
			
				

				<?php if ( !bp_group_has_requested_membership() ) : ?>
					<p><?php printf( __( "You are requesting to become a member of the group '%s'.", "buddypress" ), bp_group_name( false, false ) ); ?></p>

					<form action="<?php bp_group_form_action('request-membership') ?>" method="post" name="request-membership-form" id="request-membership-form" class="standard-form">
						<label for="group-request-membership-comments"><?php _e( 'Comments (optional)', 'buddypress' ); ?></label>
						<textarea name="group-request-membership-comments" id="group-request-membership-comments"></textarea>

						<?php do_action( 'bp_group_request_membership_content' ) ?>

						<p><input type="submit" name="group-request-send" id="group-request-send" value="<?php _e( 'Send Request', 'buddypress' ) ?> &raquo;" />
					
						<?php wp_nonce_field( 'groups_request_membership' ) ?>
					</form>
				<?php endif; ?>
			
			</div>				
					
					
				<?php do_action( 'bp_after_group_request_membership_content' ) ?>	
				</div>
				</div><!-- end of group profile -->

				</div><!-- end of center column -->
		 <?php locate_template( array( 'groups/right-sidebar.php' ), true ) ?>
			

			<?php do_action( 'bp_after_group_content' ) ?>

		<?php endwhile; else: ?>

			<div id="message" class="error">
				<p><?php _e("Sorry, the group does not exist.", "buddypress"); ?></p>
			</div>

		<?php endif;?>
			<br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>