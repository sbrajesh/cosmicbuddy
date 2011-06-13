<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_content' ) ?>

			   <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="center-column">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!--breadcrumb-->
								<!--end of breadcrum -->
						</div>
						<!--group description and meta -->
						<div class="group-meta">
						<?php do_action( 'bp_before_group_description' ) ?>
						<div class="desc-row">
							<div class="label"><label><?php _e( 'Description', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_description() ?>
							</div>
							<br class="clear" />
						</div>
						<?php do_action( 'bp_after_group_description' ) ?>
						<div class="desc-row alt">
							<div class="label"><label><?php _e( 'Owner', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_list_admins(false)?>
							</div>
							<br class="clear" />
						</div>
						<div class="desc-row">
							<div class="label"><label><?php _e( 'Type', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_status(); ?>
							</div>
							<br class="clear" />
						</div>
						<div class="desc-row alt">
							<div class="label"><label><?php _e( 'Content Privacy', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php if(bp_group_is_visible()) _e("Public");else _e("members only"); ?>
							</div>
							<br class="clear" />
						</div>
						
						</div><!--end of group meta -->
					</div>
				</div><!-- end of group profile -->
					

					<?php if ( !bp_group_is_visible() ) : ?>

						<?php do_action( 'bp_before_group_status_message' ) ?>

						<div id="message" class="info">
							<p><?php bp_group_status_message() ?></p>
						</div>

						<?php do_action( 'bp_after_group_status_message' ) ?>

					<?php endif; ?>

					
		

						

					
					<!-- first section -->
					
					<?php if ( bp_group_is_visible() && bp_group_is_forum_enabled()  ) : ?>
						<?php do_action( 'bp_before_group_active_topics' ) ?>

						<div class="bp-widget box">
							
							<div class="box-content">
							<h3 class="widgettitle"><?php _e( 'Recently Active Topics', 'buddypress' ); ?> <span><a href="<?php bp_group_forum_permalink() ?>"><?php _e( 'See All', 'buddypress' ) ?> &rarr;</a></span></h3>
							<?php if ( bp_has_forum_topics( 'no_stickies=true&max=5&per_page=5' ) ) : ?>

								<ul id="forum-topic-list" class="item-list">
									<?php while ( bp_forum_topics() ) : bp_the_forum_topic(); ?>

										<li>
											<a class="topic-avatar" href="<?php bp_the_topic_permalink() ?>" title="<?php bp_the_topic_title() ?> - <?php _e( 'Permalink', 'buddypress' ) ?>"><?php bp_the_topic_last_poster_avatar( 'width=30&height=30') ?></a>
											<a class="topic-title" href="<?php bp_the_topic_permalink() ?>" title="<?php bp_the_topic_title() ?> - <?php _e( 'Permalink', 'buddypress' ) ?>"><?php bp_the_topic_title() ?></a>
											<span class="small topic-meta">(<?php bp_the_topic_total_post_count() ?> &rarr; <?php bp_the_topic_time_since_last_post() ?> <?php _e( 'ago', 'buddypress' ) ?>)</span>
											<div class="small latest topic-excerpt"><?php bp_the_topic_latest_post_excerpt() ?></div>

											<?php do_action( 'bp_group_active_topics_item' ) ?>
										</li>

									<?php endwhile; ?>
								</ul>

							<?php else: ?>

								<div id="message" class="info">
									<p><?php _e( 'There are no active forum topics for this group', 'buddypress' ) ?></p>
								</div>

							<?php endif;?>
							</div><!--end of widget content -->
						</div>

						<?php do_action( 'bp_after_group_active_topics' ) ?>

					<?php endif; ?>
					<?php if ( function_exists( 'bp_has_activities' ) && bp_group_is_visible() ) : ?>

						<?php if ( bp_has_activities( 'object=groups&primary_id=' . bp_get_group_id() . '&max=150&per_page=5' ) ) : ?>

							<?php do_action( 'bp_before_group_activity' ) ?>
							
							<div class="bp-widget box">
								
								<div class="box-content">
								<h3 class="widgettitle"><?php _e( 'Group Activity', 'buddypress' ); ?></h3>
								<div class="pagination">
									<div class="pag-count" id="activity-count">
										<?php bp_activity_pagination_count() ?>
									</div>

									<div class="pagination-links" id="activity-pag">
										&nbsp; <?php bp_activity_pagination_links() ?>
									</div>
								</div>
								
								<?php
								if ( is_user_logged_in() ) {
		locate_template( array( 'activity/post-form.php' ), true );}
	?>

								<ul id="activity-list" class="activity-list item-list">
								<?php while ( bp_activities() ) : bp_the_activity(); ?>
									<li class="<?php bp_activity_css_class() ?>">
										<div class="activity-avatar">
											<?php bp_activity_avatar() ?>
										</div>

										<?php bp_activity_content() ?>
									</li>
								<?php endwhile; ?>
								</ul>
							</div><!-- end of widget content -->
							</div>

							<?php do_action( 'bp_after_group_activity' ) ?>

						<?php endif; ?>

					<?php endif; ?>

					

					<?php do_action( 'groups_custom_group_boxes' ) ?>

					

				</div><!-- end of center column -->
				
		 <?php locate_template( array( 'groups/right-sidebar.php' ), true ) ?>
			

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