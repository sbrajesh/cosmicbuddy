<?php get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
		<?php do_action( 'bp_before_blog_search' ) ?>
		<div class="page widget" id="blog-search">
			
			
		
		<?php do_action("advance-search");//this is the only line you need?>
		
		<?php do_action( 'bp_after_blog_search' ) ?>
	</div>
	</div>
	<?php get_sidebar("home");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
