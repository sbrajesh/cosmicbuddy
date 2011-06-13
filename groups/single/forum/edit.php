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
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!--for  breadcrumb -->
						</div>
						
					</div>
				</div><!-- end of group profile -->
									
				<div class="box">
					<div class="box-content">
						<div class="bp-widget">
				<?php if ( bp_has_forum_topic_posts() ) : ?>
				<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">
			
					<h4><?php _e( 'Forum', 'buddypress' ); ?></h4>
				
					<ul id="topic-post-list" class="item-list">
						<li id="topic-meta">
							<a href="<?php bp_forum_permalink() ?>"><?php _e( 'Forum', 'buddypress') ?></a> &raquo; 
							<strong><?php bp_the_topic_title() ?> (<?php bp_the_topic_total_post_count() ?>)</strong>
						</li>
					</ul>
					
					<?php if ( bp_group_is_member() ) : ?>
						
						<?php if ( bp_is_edit_topic() ) : ?>
							
							<div id="edit-topic">

								<?php do_action( 'groups_forum_edit_topic_before' ) ?>
							
								<h4><?php _e( 'Edit Topic:', 'buddypress' ) ?></h4>
								<div class="editfield">
									<div class="label">
										<label for="topic_title"><?php _e( 'Title:', 'buddypress' ) ?></label>
									</div>
									<div class="input">
										<input type="text" name="topic_title" id="topic_title" value="<?php bp_the_topic_title() ?>" />
									</div>
									<br class="clear">
								</div>
								<div class="editfield alt">
									<div class="label">
										<label for="topic_text"><?php _e( 'Content:', 'buddypress' ) ?></label>
									</div>
									<div class="input">
										<textarea name="topic_text" id="topic_text"><?php bp_the_topic_text() ?></textarea>
									</div>
									<br class="clear" />
								</div>	
								<?php do_action( 'groups_forum_edit_topic_after' ) ?>
					
								<p class="submit"><input type="submit" name="save_changes" id="save_changes" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" /></p>
							
								<?php wp_nonce_field( 'bp_forums_edit_topic' ) ?>
							
							</div>
							
						<?php else : ?>
							
							<div id="edit-post">

								<?php do_action( 'groups_forum_edit_post_before' ) ?>
							
								<h4><?php _e( 'Edit Post:', 'buddypress' ) ?></h4>

								<textarea name="post_text" id="post_text"><?php bp_the_topic_post_edit_text() ?></textarea>
		
								<?php do_action( 'groups_forum_edit_post_after' ) ?>
					
								<p class="submit"><input type="submit" name="save_changes" id="save_changes" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" /></p>
							
								<?php wp_nonce_field( 'bp_forums_edit_post' ) ?>
							
							</div>
							
						<?php endif; ?>
					
					<?php endif; ?>
					
				</form>	
				<?php else: ?>

					<div id="message" class="info">
						<p><?php _e( 'This topic does not exist.', 'buddypress' ) ?></p>
					</div>

				<?php endif;?>

			</div>
					</div>
				</div>
					
					
					

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