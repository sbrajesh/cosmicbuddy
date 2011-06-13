<?php get_header(); ?>
<div id="container">
<div id="contents">
<?php do_action( 'bp_before_blog_home' ) ?>
	<div id="content">
	<div class="widget">
	<div class="widgettitle"><?php _e( 'Blog', 'buddypress' ) ?></div>
		<div class="widget-content">
			<?php if ( have_posts() ) : ?>

				<?php while (have_posts()) : the_post(); ?>
				
					<?php do_action( 'bp_before_blog_post' ) ?>
				
					<div class="post" id="post-<?php the_ID(); ?>">
						<?php if(has_post_thumbnail()):?>
							<div class="post-thumb cb-thumb-wrap">
							<?php the_post_thumbnail();?>
							</div>
						<?php endif;?>
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddypress' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
						<p class="date"><?php the_time('F j, Y') ?> <em><?php _e( 'in', 'buddypress' ) ?> <?php the_category(', ') ?> <?php printf( __( 'by %s', 'buddypress' ), bp_core_get_userlink($post->post_author) ) ?></em></p>

						<div class="entry">
							<?php the_content( __( 'Read the rest of this entry &raquo;', 'buddypress' ) ); ?>
						</div>

						<p class="postmetadata"><span class="tags"><?php the_tags( __( 'Tags: ', 'buddypress' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'buddypress' ), __( '1 Comment &#187;', 'buddypress' ), __( '% Comments &#187;', 'buddypress' ) ); ?></span><br class="clear" /></p>
						<br class="clear" />
					</div>

					<?php do_action( 'bp_after_blog_post' ) ?>

				<?php endwhile; ?>

				<div class="navigation">
				
					<div class="alignleft"><?php next_posts_link( __( '&laquo; Previous Entries', 'buddypress' ) ) ?></div>
					<div class="alignright"><?php previous_posts_link( __( 'Next Entries &raquo;', 'buddypress' ) ) ?></div>
				
				</div>

			<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ) ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'buddypress' ) ?></p>

				<?php locate_template( array( 'searchform.php' ), true ) ?>

			<?php endif; ?>
			<br class="clear" />
		</div>
	

	</div>
	<?php do_action( 'bp_after_blog_home' ) ?>
	</div>
	<?php get_sidebar("blog");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
