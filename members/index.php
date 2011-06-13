<?php get_header(); ?>
<div id="container">
<div id="contents">
<div id="content">
	
	
	<div class="page" id="members-directory-page">
	
			<form action="" method="post" id="members-directory-form" class="dir-form">
				<div class="widget">
					<h2 class="widgettitle"><?php _e( 'Members Directory', 'buddypress' ) ?></h2>
					<div class="widget-content">
						<div id="directory-nav">
				
						<div class="item-list-tabs">
				<ul>
					<li class="selected" id="members-all"><a href="<?php bp_root_domain() ?>"><?php printf( __( 'All Members (%s)', 'buddypress' ), bp_get_total_member_count() ) ?></a></li>

					<?php if ( is_user_logged_in() && function_exists( 'bp_get_total_friend_count' ) && bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
						<li id="members-personal"><a href="<?php echo bp_loggedin_user_domain() . BP_FRIENDS_SLUG . '/my-friends/' ?>"><?php printf( __( 'My Friends (%s)', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ) ?></a></li>
					<?php endif; ?>

					<?php do_action( 'bp_members_directory_member_types' ) ?>

					<li id="members-order-select" class="last filter">

						<?php _e( 'Order By:', 'buddypress' ) ?>
						<select>
							<option value="active"><?php _e( 'Last Active', 'buddypress' ) ?></option>
							<option value="newest"><?php _e( 'Newest Registered', 'buddypress' ) ?></option>

							<?php if ( bp_is_active( 'xprofile' ) ) : ?>
								<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ) ?></option>
							<?php endif; ?>

							<?php do_action( 'bp_members_directory_order_options' ) ?>
						</select>
					</li>
				</ul>
			</div><!-- .item-list-tabs -->
							
						</div><!--end of directory nav -->
					</div><!-- end of widget content -->
					</div><!--end of widget -->
				<div class="widget">
				  <h2 class="widgettitle"><?php _e( 'Member Listing', 'buddypress' ) ?></h2>
			
					<div class="widget-content">
						<div id="members-directory-listing" class="directory-widget">
							
							<div id="member-dir-list" class="members">
								<?php locate_template( array( 'members/members-loop.php' ), true ) ?>
							</div>

						</div>

					  <?php do_action( 'bp_directory_members_content' ) ?>
				    </div><!--end of widget content -->
				</div><!--end of widget -->
				<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ) ?> 
				
			</form>
	
		</div>
	</div>
	<?php get_sidebar("members-directory");?>
	<br class="clear" />
</div>

</div><!--end of container-->
	
<?php get_footer(); ?>
