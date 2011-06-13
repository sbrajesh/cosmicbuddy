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
<?php do_action( 'bp_before_member_activity_post_form' ) ?>

<?php if ( is_user_logged_in() && bp_is_my_profile() && ( '' == bp_current_action() || 'just-me' == bp_current_action() ) ) : ?>
	<?php locate_template( array( 'activity/post-form.php'), true ) ?>
<?php endif; ?>

<?php do_action( 'bp_after_member_activity_post_form' ) ?>
<?php do_action( 'bp_before_member_activity_content' ) ?>
				<?php locate_template( array( 'activity/activity-loop.php' ), true ) ?>
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