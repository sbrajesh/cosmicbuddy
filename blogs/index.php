<?php get_header(); ?>
<div id="container">
<?php do_action( 'bp_before_directory_groups_content' ) ?>		
<div id="contents">
<?php do_action( 'bp_before_directory_blogs_content' ) ?>		

	<div id="content">
	
		<div class="page" id="blogs-directory-page">
	
			<form action="" method="post" id="blogs-directory-form" class="dir-form">
				<div id="directory-nav" class="widget">
				<h2 class="widgettitle"><?php _e( 'Blog Directory', 'buddypress' ) ?><?php if ( is_user_logged_in() && bp_blog_signup_enabled() ) : ?> &nbsp;<a class="button" href="<?php echo bp_get_root_domain() . '/' . BP_BLOGS_SLUG . '/create/' ?>"><?php _e( 'Create a Blog', 'cb' ) ?></a><?php endif; ?></h2>
				<div class="widget-content">
				<div class="item-list-tabs">
				<ul>
					<li class="selected" id="blogs-all"><a href="<?php bp_root_domain() ?>"><?php printf( __( 'All Blogs (%s)', 'buddypress' ), bp_get_total_blog_count() ) ?></a></li>

					<?php if ( is_user_logged_in() && bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) : ?>
						<li id="blogs-personal"><a href="<?php echo bp_loggedin_user_domain() . BP_BLOGS_SLUG . '/my-blogs/' ?>"><?php printf( __( 'My Blogs (%s)', 'buddypress' ), bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) ?></a></li>
					<?php endif; ?>

					<?php do_action( 'bp_blogs_directory_blog_types' ) ?>

					<li id="blogs-order-select" class="last filter">

						<?php _e( 'Order By:', 'buddypress' ) ?>
						<select>
							<option value="active"><?php _e( 'Last Active', 'buddypress' ) ?></option>
							<option value="newest"><?php _e( 'Newest', 'buddypress' ) ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ) ?></option>

							<?php do_action( 'bp_blogs_directory_order_options' ) ?>
						</select>
					</li>
				</ul>
			</div><!-- .item-list-tabs -->
				</div>
			</div>
				<div id="blogs-directory-listing" class="directory-listing widget">
					<h2 class="widgettitle"><?php _e( 'Blog Listing', 'buddypress' ) ?></h2>
			
					<div id="blog-dir-list" class="blogs widget-content">
						<?php locate_template( array( 'blogs/blogs-loop.php' ), true ) ?>
					</div>

				</div>

				<?php do_action( 'bp_directory_blogs_content' ) ?>
		
				<?php wp_nonce_field( 'directory_blogs', '_wpnonce-blog-filter' ) ?>

			</form>
	
		</div>
	
	</div>

	<?php do_action( 'bp_after_directory_blogs_content' ) ?>		
	<?php do_action( 'bp_before_directory_blogs_sidebar' ) ?>		
	
	<?php get_sidebar("blogs-directory");?>
	<br class="clear" />
</div>

</div><!--end of container-->
	
<?php get_footer(); ?>
