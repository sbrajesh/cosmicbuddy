	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bp_page_title() ?></title>
		<?php do_action( 'bp_head' ) ?>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<?php wp_head(); ?>
	</head>
	<body >	
			<div id="medias">
		
		
		<?php if(bp_gallery_has_medias()):?>

			<?php while(bp_gallery_medias()):bp_gallery_the_media() ;?>
			
				<div class='sing-media' id="gallery_media_<?php bp_media_id();?>">
				<a href="<?php bp_media_permalink();?>"><?php bp_media_html();?><?php bp_media_title();?></a>
				<p><b><?php  bp_media_title();?></b></p>
				<p><?php  bp_media_description();?></p>
				<?php //bp_gallery_image_edit_form($images_template->image->id,false);?>
			
				<p class='edit-delete'><a href="<?php bp_media_permalink();?>" class='view'>View</a><a href="<?php // bp_the_image_edit_link();?> " class='edit'>Edit</a><a href="<?php //bp_the_image_delete_link();?>" class='delete'>Delete</a></p>
			</div>
			<?php if ( is_user_logged_in()  ) : ?>
			<?php locate_template( array( 'gallery/media/post-form.php'), true ) ?>
	<div class="activity  single-media"></div>
	<?php
		// The loop will be loaded here via AJAX on page load to retain selected settings and not waste cycles.
		// If you're concerned about no-script functionality, uncomment the following line.

		// locate_template( array( 'groups/groups-loop.php' ), true );
	?>
</div><!-- .activity -->
<?php endif; ?>
			<?php endwhile;?>
		<?php //bp_gallery_images_pagination_count();?>
		<?php //bp_gallery_images_pagination_links();?>
		

	<?php else: ?>

		<div id="message" class="info">
			<p><?php _e( 'Sorry, this Gallery does not have an image.', 'buddypress' ) ?></p>
		</div>

	<?php endif;?>



				
				
			
			<br class="clear" />
			</div>
			<div id="image-navigation"><?php //previous_gallery_image_link();?>
		<?php //next_gallery_media_link();?></div>
			<div id="navigation">
				<?php //previous_gallery_link();?>
				<?php //next_gallery_link();?>
			</div>
	<?php do_action( 'bp_after_footer' ) ?>

		<?php //wp_footer(); ?>

	</body>

</html>