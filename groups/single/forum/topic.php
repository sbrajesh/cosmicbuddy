<?php do_action( 'bp_before_group_forum_topic' ) ?>
<?php if ( bp_has_forum_topic_posts() ) : ?>

		<div class="forum-nav">
		<a class="button" href="<?php bp_forum_permalink() ?>/">&larr; <?php _e( 'Group Forum', 'bpmag' ) ?></a> &nbsp; <a class="button" href="<?php bp_forum_directory_permalink() ?>/"><?php _e( 'Group Forum Directory', 'bpmag') ?></a>
		</div>
		
		
		<div id="topic-meta">
			<h2 class='topic-title'><?php bp_the_topic_title() ?> (<?php bp_the_topic_total_post_count() ?>)</h2>
			
			<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_is_mine() ) : ?>
				<div class="admin-links"><?php bp_the_topic_admin_links() ?></div>
			<?php endif; ?>
		</div>
		<div class="pagination no-ajax">

			<div id="post-count" class="pag-count">
				<?php bp_the_topic_pagination_count() ?>
			</div>

			<div class="pagination-links" id="topic-pag">
				<?php bp_the_topic_pagination() ?>
			</div>
		<div class="clear"> </div>
		</div>
		<ul id="topic-post-list" class="item-list">
			<?php while ( bp_forum_topic_posts() ) : bp_the_forum_topic_post(); ?>

				<li id="post-<?php bp_the_topic_post_id() ?>">
					

					<div class="post-content">
						<?php bp_the_topic_post_content() ?>
					</div>
					<div class="poster-meta">
						<a href="<?php bp_the_topic_post_poster_link() ?>">
							<?php bp_the_topic_post_poster_avatar( 'width=40&height=40' ) ?>
						</a>
						<br />
						<?php echo  bp_get_the_topic_post_poster_name();?>
					</div>
					<div class="clear"></div>
					<div class="admin-links">
					<?php echo sprintf( __( 'posted %s ago:', 'bpmag'),bp_get_the_topic_post_time_since() )?>
						<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_post_is_mine() ) : ?>
							<?php bp_the_topic_post_admin_links() ?>
						<?php endif; ?>
						<a href="#post-<?php bp_the_topic_post_id() ?>" title="<?php _e( 'Permanent link to this post', 'bpmag' ) ?>">#</a>
					</div>
				</li>

			<?php endwhile; ?>
		</ul>

		<div class="pagination no-ajax">

			<div id="post-count" class="pag-count">
				<?php bp_the_topic_pagination_count() ?>
			</div>

			<div class="pagination-links" id="topic-pag">
				<?php bp_the_topic_pagination() ?>
			</div>
		<div class="clear"> </div>
		</div>
	<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">

		<?php if ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) : ?>

			<?php if ( bp_get_the_topic_is_last_page() ) : ?>

				<?php if ( bp_get_the_topic_is_topic_open() ) : ?>

					<div id="post-topic-reply">
						<p id="post-reply"></p>

						<?php if ( !bp_group_is_member() &&apply_filters("bpmag_show_public_group_join_message_on_new_post",1)) : ?>
							<?php bpmag_bp_info_message(__( 'You will auto join this group when you reply to this topic.', 'bpmag' )); ?>
						<?php endif; ?>

						<?php do_action( 'groups_forum_new_reply_before' ) ?>

						<h4><?php _e( 'Add a reply:', 'bpmag' ) ?></h4>

						<textarea name="reply_text" id="reply_text"></textarea>

						<div class="submit">
							<input type="submit" name="submit_reply" id="submit" value="<?php _e( 'Post Reply', 'bpmag' ) ?>" />
						</div>

						<?php do_action( 'groups_forum_new_reply_after' ) ?>

						<?php wp_nonce_field( 'bp_forums_new_reply' ) ?>
					</div>

				<?php else : ?>
					<?php bpmag_bp_info_message(__( 'This topic is closed, replies are no longer accepted.', 'bpmag' )); ?>

				<?php endif; ?>

			<?php endif; ?>

		<?php endif; ?>

	</form>
<?php else: ?>
<?php bpmag_bp_info_message(__( 'There are no posts for this topic.', 'bpmag' ));?>
<?php endif;?>