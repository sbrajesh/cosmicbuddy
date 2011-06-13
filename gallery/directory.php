<?php get_header(); ?>
<div id="container">
<?php do_action( 'bp_before_directory_groups_content' ) ?>		
<div id="contents">
<?php do_action( 'bp_before_directory_gallery_content' ) ?>		

	<div id="content">
	
		<div class="page" id="gallery-directory-page">

		<form action="" method="post" id="galleries-directory-form" class="dir-form">
			<div id="directory-nav" class="widget">
			<h2 class="widgettitle"><?php _e( 'Gallery Directory', 'bp-gallery' ) ?></h2>

			<?php do_action( 'bp_before_directory_gallery_content' ) ?>
			<div class="widget-content">
                        <div class="item-list-tabs">
				<ul>
					<li class="selected" id="gallery-all"><a href="<?php bp_root_domain() ?>"><?php printf( __( 'All Galleries (%s)', 'bp-gallery' ), bp_get_total_gallery_count_for_dir() ) ?></a></li>

					<?php if ( is_user_logged_in() && function_exists( 'bp_get_total_gallery_count' ) && bp_get_total_gallery_count( null,null,array('public') ) ) : ?>
						<li id="members-personal"><a href="<?php echo bp_loggedin_user_domain() . BP_GALLERY_SLUG . '/my-galleries/' ?>"><?php printf( __( 'My Galleries (%s)', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ) ?></a></li>
					<?php endif; ?>
					
                                        <?php do_action( 'bp_gallery_directory_member_types' ) ?>

					<li id="gallery-order-select" class="last filter">

						<?php _e( 'Filter By:', 'bp-gallery' ) ?>
						<select><option value=""><?php _e( 'All Galleries', 'bp-gallery' ) ?></option>
							<option value="photo"><?php _e( 'Photo Gallery', 'bp-gallery' ) ?></option>
							<option value="audio"><?php _e( 'Audio Gallery', 'bp-gallery' ) ?></option>
							<option value="video"><?php _e( 'Video Gallery', 'bp-gallery' ) ?></option>

							

							<?php do_action( 'bp_gallery_directory_order_options' ) ?>
						</select>
					</li>
					
				</ul>
			</div><!-- .item-list-tabs -->
			</div>
			</div>
			<div id="gallery-directory-listing" class="directory-listing widget">
					<h2 class="widgettitle"><?php _e( 'Gallery Listing', 'buddypress' ) ?></h2>
			<div id="galleries-dir-list" class="gallery dir-list widget-content">
				<?php locate_template( array( 'gallery/gallery-loop.php' ), true ) ?>
			</div><!-- #galleries-dir-list -->
			</div>
			<?php do_action( 'bp_directory_gallery_content' ) ?>

			<?php wp_nonce_field( 'directory_galleries', '_wpnonce-gallery-filter' ) ?>

			<?php do_action( 'bp_after_directory_galleries_content' ) ?>

		</form><!-- #galleries-directory-form -->

	
	</div>
	</div>

	<?php do_action( 'bp_after_directory_gallery_content' ) ?>		
	<?php do_action( 'bp_before_directory_gallery_sidebar' ) ?>		
	
	<?php get_sidebar("blogs-directory");?>
	<br class="clear" />
</div>

</div><!--end of container-->
	
<?php get_footer(); ?>