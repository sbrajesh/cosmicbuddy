<?php get_header();?>
        <div id="container">
            <div id="left-column">
				<?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			 
			 <div class='box basics'>
			 
				<div class='box-content'>
					<div id="profile-name">
						<h1 class="fn"><?php _e( "Friend requests", 'buddypress' ); ?></h1>
						<!--for breadcrum -->
					</div>
					<div id="content-header">
					</div>
					<div id="tabbed-subnav">
						<?php 	locate_template( array( 'optionsbar.php' ), true ) ;
						?>
			
						<br class='clear' />
					</div>
				
				</div><!--end of box content -->
			 </div><!--basic section ends here-->
			
			<div class="box friends">
				<div class="box-content">
					<div class="bp-widget">
						<h4><?php _e( 'Friendship Requests', 'buddypress' ); ?></h4>

							<?php do_action( 'template_notices' ) // (error/success feedback) ?>

							<?php do_action( 'bp_before_friend_requests_content' ) ?>		
	
							<?php if ( bp_has_members( 'include=' . bp_get_friendship_requests() . '&per_page=0' ) ) : ?>
			
									<ul id="friend-list" class="item-list">
										<?php while ( bp_members() ) : bp_the_member(); ?>
											
											<li>
												<?php bp_member_avatar() ?>
												<h4><a href="<?php bp_member_link() ?>"><?php bp_member_name() ?></a></h4>
												<span class="activity"><?php bp_member_last_active() ?></span>
												
												<?php do_action( 'bp_friend_requests_item' ) ?>	
												
												<div class="action">
													<div class="generic-button accept">
														<a href="<?php bp_friend_accept_request_link() ?>"><?php _e( 'Accept', 'buddypress' ); ?></a>
													</div>
											
													 &nbsp; 
											
													<div class="generic-button reject">
														<a href="<?php bp_friend_reject_request_link() ?>"><?php _e( 'Reject', 'buddypress' ); ?></a>
													</div>
													
													<?php do_action( 'bp_friend_requests_item_action' ) ?>	
												</div>
											</li>
											
										<?php endwhile; ?>
									</ul>
			
										<?php do_action( 'bp_friend_requests_content' ) ?>		
			
									<?php else: ?>

											<div id="message" class="info">
												<p><?php _e( 'You have no pending friendship requests.', 'buddypress' ); ?></p>
											</div>

									<?php endif;?>

							<?php do_action( 'bp_after_friend_requests_content' ) ?>		
		
						</div>
					</div>
				</div>				
			</div> <!-- end of right column -->

         
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>