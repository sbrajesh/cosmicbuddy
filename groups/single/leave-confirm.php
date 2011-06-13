<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

		<?php do_action( 'bp_before_group_leave_confirm_content' ) ?>

			   <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="center-column">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; <?php _e( 'Confirm Leave Group', 'buddypress' ); ?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- breadcrumb -->
								<!--end of breadcrum -->
						</div>
						
							<div class="bp-widget">
						
						<h3><?php _e( 'Are you sure you want to leave this group?', 'buddypress' ); ?></h3>
	
						<p>
							<a href="<?php bp_group_leave_confirm_link() ?>"><?php _e( "Yes, I'd like to leave this group.", 'buddypress' ) ?></a> | 
							<a href="<?php bp_group_leave_reject_link() ?>"><?php _e( "No, I'll stay!", 'buddypress' ) ?></a>
						</p>
						
						<?php do_action( 'bp_group_leave_confirm_content' ) ?>
					</div>
						
						
					</div>
				</div><!-- end of group profile -->
									
					
					
					
					
				<?php do_action( 'bp_after_group_leave_confirm_content' ) ?>
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