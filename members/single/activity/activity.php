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
					<h1 class="fn"><?php _e("Recent Activity");?> &raquo;<?php echo bp_word_or_name( __( "My Activity", 'buddypress' ), __( "%s's Activity", 'buddypress' ), true, false ) ?> <span><a href="<?php bp_activities_member_rss_link() ?>" title="<?php _e( 'RSS Feed', 'buddypress' ) ?>" class="rss"><?php _e( 'RSS Feed', 'buddypress' ) ?></a> </span></h1>
						<!-- breadcrumb here -->
						<!--end of breadcrumb -->
						
					</div>
			
				
            
			<div class="content">
				<div id="tabbed-subnav">
						<?php locate_template( array( 'optionsbar.php' ), true ) ?>
				</div>
			<div class="main-column">
					<div class="bp-widget">
						<ul id="activity-filter-links">
							<?php cb_activity_filter_links() ?>
						</ul>

				<?php if ( bp_has_activities( 'type=personal&per_page=25&max=500' ) ) : ?>
					
					<div class="pagination">
						
						<div class="pag-count" id="activity-count">
							<?php bp_activity_pagination_count() ?>
						</div>
		
						<div class="pagination-links" id="activity-pag">
							&nbsp; <?php bp_activity_pagination_links() ?>
							<br class="clear" />
						</div>
						
					</div>
					
					<ul id="activity-list" class="item-list activity-list">
					<?php while ( bp_activities() ) : bp_the_activity(); ?>
						<li class="<?php bp_activity_css_class() ?>">
							<div class="activity-avatar">
								<?php bp_activity_avatar("height=50&width=50") ?>
							</div>
							
							<?php bp_activity_content() ?>
							
							<?php do_action( 'bp_my_activity_item' ) ?>
							<br class='clear' />
						</li>
					<?php endwhile; ?>
					</ul>
					
					<?php do_action( 'bp_my_activity_content' ) ?>

				<?php else: ?>

					<div id="message" class="info">
						<p><?php echo bp_word_or_name( __( "You haven't done anything yet.", 'buddypress' ), __( "%s hasn't done anything yet.", 'buddypress' ), true, false ) ?></p>
					</div>

				<?php endif;?>
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