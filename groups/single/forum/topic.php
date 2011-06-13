<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_content' ) ?>

			   <div id="left-column">
					<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
			   </div><!--end of left column -->

			<div id="right-column-wide">
			<?php if ( bp_has_forum_topic_posts() ) : ?>
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> <a href="<?php bp_forum_permalink() ?>">&larr; <?php _e( 'Forum', 'buddypress' ); ?></a></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- for breadcrumb-->
						</div>
						<div class="pagination">

						<div id="post-count" class="pag-count">
							<?php bp_the_topic_pagination_count() ?>
						</div>
				
						<div class="pagination-links" id="topic-pag">
							<?php bp_the_topic_pagination() ?>
						</div>
					
					</div>
					</div>
				</div><!-- end of group profile -->
				
				<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">
								
				<div class="box">
					<div class="box-content">
						<div class="bp-widget">
							<ul>
					<li id="topic-meta">
							
							<h3><?php bp_the_topic_title() ?> (<?php bp_the_topic_total_post_count() ?>)</h3>
							
							<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_is_mine() ) : ?>
								<div class="admin-links"><?php bp_the_topic_admin_links() ?></div>
							<?php endif; ?>
							
						</li>
						</ul>
						<br class="clear" />
						<span class="small"><a href="<?php bp_forum_permalink() ?>">&larr; <?php _e( 'Group Forum', 'buddypress' ) ?></a> | <a href="<?php bp_forum_directory_permalink() ?>"><?php _e( 'Forum Topic Directory', 'buddypress') ?></a></span>
					<?php if ( is_user_logged_in() ) : ?>
					<h4 class="post-new-topic-reply"> <span><a href="#post-topic-reply" title="<?php _e( 'Post New', 'buddypress' ) ?>"><?php _e( 'Post Reply &rarr;', 'buddypress' ) ?></a></span></h4>
					<br class="clear" />
					<?php endif; ?>
					
					
					</div>
					</div>
					</div>
					<div class="box">
					<div class="box-content">
						<div class="bp-widget">
					<ul id="topic-post-list" class="item-list">
						
						
					<?php while ( bp_forum_topic_posts() ) : bp_the_forum_topic_post(); ?>
						
						<li id="post-<?php bp_the_topic_post_id() ?>">
							<div class="poster-meta">
								<?php bp_the_topic_post_poster_avatar() ?>
								<?php echo sprintf( __( '%s said %s ago:', 'buddypress' ), bp_the_topic_post_poster_name( false ), bp_get_the_topic_post_time_since( false ) ) ?>
							</div>
					
							<div class="post-content">
								<?php bp_the_topic_post_content() ?>
							</div>
							
							<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_post_is_mine() ) : ?>
								<div class="admin-links"><?php bp_the_topic_post_admin_links() ?></div>
							<?php endif; ?>
						</li>
						
					<?php endwhile; ?>
					
					</ul>
					
					<?php if ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) : ?>
											
						<?php if ( bp_get_the_topic_is_topic_open() ) : ?>
							
							<div id="post-topic-reply">	
								<a name="post-reply"></a>

								<?php if ( !bp_group_is_member() ) : ?>
									<p><?php _e( 'You will auto join this group when you reply to this topic.', 'buddypress' ) ?></p>
								<?php endif; ?>
							
								<?php do_action( 'groups_forum_new_reply_before' ) ?>
						
								<p><strong><?php _e( 'Add a reply:', 'buddypress' ) ?></strong></p>
																
								<textarea name="reply_text" id="reply_text"></textarea>
					
								<p class="submit"><input type="submit" name="submit_reply" id="submit" value="<?php _e( 'Post Reply', 'buddypress' ) ?>" /></p>

								<?php do_action( 'groups_forum_new_reply_after' ) ?>

								<?php wp_nonce_field( 'bp_forums_new_reply' ) ?>
							</div>
							
						<?php else : ?>
							
							<div id="message" class="info">
								<p><?php _e( 'This topic is closed, replies are no longer accepted.', 'buddypress' ) ?></p>
							</div>
							
						<?php endif; ?>
					
					<?php endif; ?>
					
				
				
			</div>
						
					</div>
				</div>
				</form>	
			<?php else: ?>
					<div class="box">
					<div class="box-content">
					<div id="message" class="info">
						<p><?php _e( 'There are no posts for this topic.', 'buddypress' ) ?></p>
					</div>
				</div>
				</div>
				<?php endif;?>		
					

				</div><!-- end of center column -->
		 

			<?php do_action( 'bp_after_group_content' ) ?>

		<?php endwhile; else: ?>

			<div id="message" class="error">
				<p><?php _e("Sorry, the group does not exist.", "buddypress"); ?></p>
			</div>

		<?php endif;?>
			<br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>