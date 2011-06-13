<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			    <div class='box-trc'>
			   </div>
			  <div class='box-content'>
					<div id="profile-name">
					<h1 class="fn"><?php _e("Recent Posts", "buddypress"); ?></h1>
						
						
					</div>
			
				
            
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
			<div class="main-column">
		
			<?php do_action( 'bp_before_recent_posts_content' ) ?>		

		<?php if ( bp_has_posts() ) : ?>
			
			<?php while ( bp_posts() ) : bp_the_post(); ?>
			
				<div class="post" id="post-<?php bp_post_id(); ?>">
					
					<h2><a href="<?php bp_post_permalink() ?>" rel="bookmark" title="<?php printf ( __( 'Permanent Link to %s', 'buddypress' ), bp_post_title( false ) ); ?>"><?php bp_post_title(); ?></a></h2>
					
					<p class="date"><?php printf( __( '%1$s <em>in %2$s by %3$s</em>', 'buddypress' ), bp_post_date(__('F jS, Y', 'buddypress'), false ), bp_post_category( ', ', '', null, false ), bp_post_author( false ) ); ?></p>
					<?php bp_post_content(__('Read the rest of this entry &raquo;')); ?>
					<p class="postmetadata"><?php bp_post_tags( '<span class="tags">', ', ', '</span>' ); ?>  <span class="comments"><?php bp_post_comments( __('No Comments'), __('1 Comment'), __('% Comments') ); ?></span>
					<br class="clear" />
					</p>
					
					<?php do_action( 'bp_recent_posts_item' ) ?>		

					<hr />
					<br class="clear" />
				</div>
			
			<?php endwhile; ?>

			<?php do_action( 'bp_recent_posts_content' ) ?>		
				
		<?php else: ?>

			<div id="message" class="info">
				<p><?php bp_word_or_name( __( "You haven't made any posts yet.", 'buddypress' ), __( "%s hasn't made any posts yet.", 'buddypress' ) ) ?></p>
			</div>

		<?php endif;?>

		<?php do_action( 'bp_after_recent_posts_content' ) ?>	
		
		</div>
		
			</div><!--end of content-->
			</div><!--end of box content -->
			</div> <!-- end of box -->					
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>