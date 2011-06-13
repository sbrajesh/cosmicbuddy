<?php get_header(); ?>
<div id="container">
<?php do_action( 'bp_before_directory_groups_content' ) ?>		
<div id="contents">
<div id="content">
	<div class="page" id="groups-directory-page">
	
			<form action="" method="post" id="groups-directory-form" class="dir-form">
				<div id="directory-nav" class="widget">
						
						<h2 class="widgettitle"><?php _e( 'Groups Directory', 'buddypress' ) ?><?php if ( is_user_logged_in() ) : ?> &nbsp;<a class="button" href="<?php echo bp_get_root_domain() . '/' . BP_GROUPS_SLUG . '/create/' ?>"><?php _e( 'Create a Group', 'buddypress' ) ?></a><?php endif; ?></h2>
						<div class="widget-content">
						<div class="item-list-tabs">
				<ul>
					<li class="selected" id="groups-all"><a href="<?php bp_root_domain() ?>"><?php printf( __( 'All Groups (%s)', 'buddypress' ), bp_get_total_group_count() ) ?></a></li>

					<?php if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>
						<li id="groups-personal"><a href="<?php echo bp_loggedin_user_domain() . BP_GROUPS_SLUG . '/my-groups/' ?>"><?php printf( __( 'My Groups (%s)', 'buddypress' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) ?></a></li>
					<?php endif; ?>

					<?php do_action( 'bp_groups_directory_group_types' ) ?>

					<li id="groups-order-select" class="last filter">

						<?php _e( 'Order By:', 'buddypress' ) ?>
						<select>
							<option value="active"><?php _e( 'Last Active', 'buddypress' ) ?></option>
							<option value="popular"><?php _e( 'Most Members', 'buddypress' ) ?></option>
							<option value="newest"><?php _e( 'Newly Created', 'buddypress' ) ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ) ?></option>

							<?php do_action( 'bp_groups_directory_order_options' ) ?>
						</select>
					</li>
				</ul>
			</div><!-- .item-list-tabs -->
						</div><!-- end of widget content -->
				</div>
				<div id="groups-directory-listing" class="directory-listing widget">
					<h2 class="widgettitle"><?php _e( 'Groups Listing', 'buddypress' ) ?></h2>
			
					<div id="group-dir-list" class="groups widget-content">
						<?php locate_template( array( 'groups/groups-loop.php' ), true ) ?>
					</div>

				</div>
			
				<?php do_action( 'bp_directory_groups_content' ) ?>

				<?php wp_nonce_field( 'directory_groups', '_wpnonce-group-filter' ) ?>

			</form>
	
		</div>
	</div>
	<?php do_action( 'bp_after_directory_groups_content' ) ?>		
	<?php do_action( 'bp_before_directory_groups_sidebar' ) ?>
	<?php get_sidebar("groups-directory");?>
	<br class="clear" />
</div>

</div><!--end of container-->
	
<?php get_footer(); ?>
