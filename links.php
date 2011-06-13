<?php get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
		<?php do_action( 'bp_before_blog_links' ) ?>
		<div class="widget" id="blog-latest">
		
			<h2 class="widgettitle"><?php _e( 'Links', 'buddypress' ) ?></h2>

			<ul id="links-list">
				<?php get_links_list(); ?>
			</ul>
		
		</div>
		<?php do_action( 'bp_after_blog_links' ) ?>
	</div>
	<?php get_sidebar("blog");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
