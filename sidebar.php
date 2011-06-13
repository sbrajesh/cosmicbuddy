<?php do_action( 'bp_before_sidebar' ) ?>

<div id="sidebar">
	<?php do_action( 'bp_inside_before_sidebar' ) ?>
	
	<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar('sidebar') ) : ?>
	
			<div class="widget-error">
				<?php _e( 'Please log in and add widgets to this column.', 'buddypress' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=blog-sidebar"><?php _e( 'Add Widgets', 'buddypress' ) ?></a>
			</div>

	<?php endif; ?>
	
	<?php do_action( 'bp_inside_after_sidebar' ) ?>
</div>

<?php do_action( 'bp_after_sidebar' ) ?>
