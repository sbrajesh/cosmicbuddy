<?php get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
		<?php if ( !function_exists('dynamic_sidebar')
			        || !dynamic_sidebar('welcome-section') ) : ?>

				
		
			<?php endif; ?>
		  <?php
		  if(is_active_sidebar("homepage-main-col1")||is_active_sidebar("homepage-main-col2")):?>
			<div id="home-2col-container">
				<div id="home-col1">
					<?php dynamic_sidebar('homepage-main-col1');?>
				</div>
				<div id="home-col2">
					<?php dynamic_sidebar('homepage-main-col2');?>
				</div>
				<br class="clear" />	
			</div>
			<?php else:?>
	
	<?php if ( !function_exists('dynamic_sidebar')
			        || !dynamic_sidebar('homepage-first-section') ) : ?>

			<div class="widget-error">
				<?php _e( 'Please log in and add widgets to this section.', 'buddypress' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=third-section"><?php _e( 'Add Widgets', 'buddypress' ) ?></a>
			</div>		
		
			<?php endif; ?>
<?php endif;?>
	</div>
	<?php get_sidebar();?>
	<br class="clear" />
	<?php
	include_once("featured-bottom.php");?>
	</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
