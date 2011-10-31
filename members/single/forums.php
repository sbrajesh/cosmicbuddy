<?php get_header();?>
        <div id="container">
            <div id="left-column">
				<?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			 
			  
					<div class='box-content'>
							<div id="profile-name">
							<h1 class="fn"><?php _e("Recent Forum");?> &raquo;<?php echo bp_word_or_name( __( "My Forum", 'buddypress' ), __( "%s's Forum", 'buddypress' ), true, false ) ?> <span><a href="<?php bp_activities_member_rss_link() ?>" title="<?php _e( 'RSS Feed', 'buddypress' ) ?>" class="rss"><?php _e( 'RSS Feed', 'buddypress' ) ?></a> </span></h1>
								<!-- breadcrumb here -->
								<!--end of breadcrumb -->
								
							</div>
					
						
					
							<div class="content">
								
								<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
										<ul>
											<?php bp_get_options_nav() ?>

											<li id="forums-order-select" class="last filter">

												<label for="forums-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
												<select id="forums-order-by">
													<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
													<option value="popular"><?php _e( 'Most Posts', 'buddypress' ); ?></option>
													<option value="unreplied"><?php _e( 'Unreplied', 'buddypress' ); ?></option>

													<?php do_action( 'bp_forums_directory_order_options' ); ?>

												</select>
											</li>
										</ul>
								</div><!-- .item-list-tabs -->
								
								<div class="main-column">
										<div class="bp-widget">
											<?php

											if ( bp_is_current_action( 'favorites' ) ) :
												locate_template( array( 'members/single/forums/topics.php' ), true );

											else :
												do_action( 'bp_before_member_forums_content' ); ?>

												<div class="forums myforums">

													<?php locate_template( array( 'forums/forums-loop.php' ), true ); ?>

												</div>

												<?php do_action( 'bp_after_member_forums_content' ); ?>

											<?php endif; ?>
										</div>
												
								</div>
						
							</div><!--end of content-->
					</div><!--box content ends here-->
			</div><!--box section ends here-->					
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>