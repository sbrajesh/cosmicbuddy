<?php get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
			<?php do_action( 'bp_before_404' ) ?>
		<div class="page 404 widget">
		
			<h2 class="widgettitle pagetitle"><?php _e( 'Page Not Found', 'buddypress' ) ?></h2>
			<div class="widget-content">
			<div id="message" class="info ">
			
				<p><?php _e( 'The page you were looking for was not found.', 'buddypress' ) ?>
		
			</div>
			<?php do_action( 'bp_404' ) ?>
			</div>
			

		</div>
		<?php do_action( 'bp_after_404' ) ?>
	</div>
	<?php get_sidebar("blog");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
