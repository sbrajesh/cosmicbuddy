	<div id="sidebar" class="directory-sidebar">

		<?php do_action( 'bp_before_directory_forums_search' ) ?>	

		<div id="forums-directory-search" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Forum Topic Search', 'buddypress' ) ?></h3>
			<div class="widget-content">
			<?php bp_directory_forums_search_form() ?>

			<?php do_action( 'bp_directory_forums_search' ) ?>
			</div><!--end of widget-content -->	
		</div>

		<?php do_action( 'bp_after_directory_forums_search' ) ?>
		<?php do_action( 'bp_before_directory_forums_tags' ) ?>	

		<div id="forums-directory-tags" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Forum Topic Tags', 'buddypress' ) ?></h3>
			<div class="widget-content">
			<?php bp_forums_tag_heat_map(); ?>

			<?php do_action( 'bp_directory_forums_search' ) ?>
			</div>
		</div>

		<?php do_action( 'bp_after_directory_forums_search' ) ?>	

	</div>
	
	<?php do_action( 'bp_after_directory_forums_sidebar' ) ?> 
