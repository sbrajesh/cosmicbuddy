<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>
	
			<?php do_action( 'bp_before_group_content' ) ?>

			   <div id="left-column">
					<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
				</div><!--end of left column -->

			<div id="right-column-wide">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; <?php _e( 'Forum', 'buddypress' ); ?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- for breadcrumb-->
								<!--end of breadcrum -->
						</div>
						
					</div>
				</div><!-- end of group profile -->
				<form action="<?php bp_forum_action() ?>" method="post" id="forum-topic-form" class="standard-form">
				<div class="box">
					<div class="box-content">
					<?php if ( bp_has_forum_topics() ) : ?>									
						
						<div class="pagination">
						
							<div id="post-count" class="pag-count">
								<?php bp_forum_pagination_count() ?>
							</div>
					
							<div class="pagination-links" id="topic-pag">
								<?php bp_forum_pagination() ?>
							</div>
						
						</div>
						
						<ul id="forum-topic-list" class="item-list">
						<?php while ( bp_forum_topics() ) : bp_the_forum_topic(); ?>
							<li<?php if ( bp_get_the_topic_css_class() ) : ?> class="<?php bp_the_topic_css_class() ?>"<?php endif; ?>>

								<a class="topic-avatar" href="<?php bp_the_topic_permalink() ?>" title="<?php bp_the_topic_title() ?> - <?php _e( 'Permalink', 'buddypress' ) ?>"><?php bp_the_topic_last_poster_avatar( 'width=30&height=30') ?></a>
								<a class="topic-title" href="<?php bp_the_topic_permalink() ?>" title="<?php bp_the_topic_title() ?> - <?php _e( 'Permalink', 'buddypress' ) ?>"><?php bp_the_topic_title() ?></a> 
								<span class="small topic-meta">(<?php bp_the_topic_total_post_count() ?> &rarr; <?php printf( __( '%s ago', 'buddypress' ), bp_get_the_topic_time_since_last_post() ) ?>)</span>
								<div class="small latest topic-excerpt"><?php bp_the_topic_latest_post_excerpt() ?></div>
								
								<?php if ( bp_group_is_admin() || bp_group_is_mod() ) : ?>
									<div class="admin-links"><?php bp_the_topic_admin_links() ?></div>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php else: ?>

						<div id="message" class="info">
							<p><?php _e( 'There are no topics for this group forum.', 'buddypress' ) ?></p>
						</div>

					<?php endif;?>
					
					</div>
				</div>	
			<?php if ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) : ?>
				<div class="box">
					<div class="box-content">
					<div id="post-new-topic">

							<?php do_action( 'groups_forum_new_topic_before' ) ?>
							
							<?php if ( !bp_group_is_member() ) : ?>
								<p><?php _e( 'You will auto join this group when you start a new topic.', 'buddypress' ) ?></p>
							<?php endif; ?>

							<a name="post-new"></a>
							<h4><?php _e( 'Post a New Topic:', 'buddypress' ) ?></h4>
							<div class="editfield">
								<div class="label">
									<label><?php _e( 'Title:', 'buddypress' ) ?></label>
								</div>
								<div class="input">
									<input type="text" name="topic_title" id="topic_title" value="" />
								</div>
								<br class="clear" />
							</div>
							<div class="editfield alt">
								<div class="label">
									<label><?php _e( 'Content:', 'buddypress' ) ?></label>
								</div>
								<div class="input">
									<textarea name="topic_text" id="topic_text"></textarea>
								</div>
								<br class="clear" />
							</div>
							<div class="editfield">
								<div class="label">
									<label><?php _e( 'Tags (comma separated):', 'buddypress' ) ?></label>
								</div>
								<div class="input">
									<input type="text" name="topic_tags" id="topic_tags" value="" />
								</div>
								<br class="clear" />
							</div>
							<?php do_action( 'groups_forum_new_topic_after' ) ?>
					
							<p class="submit"><input type="submit" name="submit_topic" id="submit" value="<?php _e( 'Post Topic', 'buddypress' ) ?>" /></p>
							
							<?php wp_nonce_field( 'bp_forums_new_topic' ) ?>
						</div>
					</div>
				</div>	
				<?php endif;?>
				</form>
						
						
				
					
					
					

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