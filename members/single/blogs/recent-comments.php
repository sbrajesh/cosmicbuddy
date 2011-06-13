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
					<h1 class="fn"><?php _e("Recent Comments", "buddypress"); ?></h1>
						
						
					</div>
			
				
            
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
			<div class="main-column">
		
			<?php do_action( 'bp_before_recent_comments_content' ) ?>

		<?php if ( bp_has_comments() ) : ?>

			<ul id="comment-list" class="item-list">
				<?php while ( bp_comments() ) : bp_the_comment(); ?>
					
					<li id="comment-<?php bp_comment_id() ?>">
						<span class="small"><?php printf( __( 'On %1$s %2$s said:', 'buddypress' ), bp_comment_date( __( 'F jS, Y', 'buddypress' ), false ), bp_comment_author( false ) ); ?></span>
						<p><?php bp_comment_content() ?></p>
						<span class="small"><?php printf( __( 'Commented on the post <a href="%1$s">%2$s</a> on the blog <a href="%3$s">%4$s</a>.', 'buddypress' ), bp_comment_post_permalink( false ), bp_comment_post_title( false ), bp_comment_blog_permalink( false ), bp_comment_blog_name( false ) ); ?></span>

						<?php do_action( 'bp_recent_comments_item' ) ?>
					</li>
					
				<?php endwhile; ?>
			</ul>
			
			<?php do_action( 'bp_recent_comments_content' ) ?>

		<?php else: ?>

			<div id="message" class="info">
				<p><?php bp_word_or_name( __( "You haven't posted any comments yet.", 'buddypress' ), __( "%s hasn't posted any comments yet.", 'buddypress' ) ) ?></p>
			</div>

		<?php endif;?>

		<?php do_action( 'bp_after_recent_comments_content' ) ?>
		
		</div>
		
			</div><!--end of content-->
			</div><!--end of box content -->
			</div> <!-- end of box -->					
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>