<?php get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
		<?php do_action( 'bp_before_blog_single_post' ) ?>
		<div class="widget page" id="blog-single">
		
			<div class="widgettitle"><?php _e( 'Blog', 'buddypress' ) ?></div>
			<div class="widget-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="item-options">
				
					<div class="alignleft"><?php next_posts_link( __( '&laquo; Previous Entries', 'buddypress' ) ) ?></div>
					<div class="alignright"><?php previous_posts_link( __( 'Next Entries &raquo;', 'buddypress' ) ) ?></div>
				<div class="clear" > </div>
				</div>
				
				<div class="post" id="post-<?php the_ID(); ?>">

					<?php do_action( 'bp_before_blog_post' ) ?>
			
					<h1 class="post-title"><?php the_title(); ?></h1>

					<div class="entry">
						<?php if(has_post_thumbnail()):?>
							<div class="post-thumb post-thumb-single">
							<?php the_post_thumbnail('single-post-thumbnail');?>
							</div>
						<?php endif;?>	
						<?php the_content( __( '<p class="serif">Read the rest of this entry &raquo;</p>', 'buddypress' ) ); ?>

						<?php wp_link_pages(array('before' => __( '<p><strong>Pages:</strong> ', 'buddypress' ), 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<div class="clear"></div>
					</div>

					<?php do_action( 'bp_after_blog_post' ) ?>

				</div>

			<?php comments_template(); ?>

			<?php endwhile; else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.', 'buddypress' ) ?></p>

			<?php endif; ?>
			</div>
		</div>
			<?php do_action( 'bp_after_blog_single_post' ) ?>
	</div>
	<?php get_sidebar("blog");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
