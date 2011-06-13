	<div id="sidebar" class="directory-sidebar">

		<?php do_action( 'bp_before_directory_blogs_search' ) ?>	

		<div id="blogs-directory-search" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Find Blogs', 'buddypress' ) ?></h3>
			<div class="widget-content">
			<?php bp_directory_blogs_search_form() ?>

			<?php do_action( 'bp_directory_blogs_search' ) ?>	
			</div>
		</div>

		<?php do_action( 'bp_after_directory_blogs_search' ) ?>	
		<?php do_action( 'bp_before_directory_blogs_featured' ) ?>	

		<div id="blogs-directory-featured" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Random Blogs', 'buddypress' ) ?></h3>
		<div class="widget-content">
			<?php if ( bp_has_blogs( 'type=random&max=3' ) ) : ?>

				<ul id="featured-blogs-list" class="item-list">
					<?php while ( bp_blogs() ) : bp_the_blog(); ?>

						<li>
							<div class="item-avatar">
								<a href="<?php bp_blog_permalink() ?>"><?php bp_blog_avatar('type=thumb') ?></a>
							</div>

							<div class="item">
								<div class="item-title"><a href="<?php bp_blog_permalink() ?>"><?php bp_blog_name() ?></a></div>
								<div class="item-meta"><span class="activity"><?php bp_blog_last_active() ?></span></div>
						
								<div class="field-data">
									<div class="field-name">
										<strong><?php _e( 'Description: ', 'buddypress' ) ?></strong>
										<?php bp_blog_description() ?>
									</div>
								</div>
						
								<?php do_action( 'bp_directory_blogs_featured_item' ) ?>
							</div>
							<br class="clear" />
						</li>

					<?php endwhile; ?>
				</ul>			

				<?php do_action( 'bp_directory_blogs_featured' ) ?>	
		
			<?php else: ?>

				<div id="message" class="info">
					<p><?php _e( 'There are not enough blogs to feature.', 'buddypress' ) ?></p>
				</div>

			<?php endif; ?>
			</div><!-- end of widget content -->
		</div>

		<?php do_action( 'bp_after_directory_blogs_featured' ) ?>	

	</div>

	<?php do_action( 'bp_after_directory_blogs_sidebar' ) ?>		
