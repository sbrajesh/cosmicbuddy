<div id="sidebar" class="directory-sidebar">
		
		<?php do_action( 'bp_before_directory_members_search' ) ?>

		<div id="members-directory-search" class="directory-widget widget">
			<h3 class="widgettitle"><?php _e( 'Find Members', 'buddypress' ) ?></h3>
			<div class="widget-content">
				<?php bp_directory_members_search_form() ?>

				<?php do_action( 'bp_directory_members_search' ) ?>
		    </div>
		</div>

		<?php do_action( 'bp_after_directory_members_search' ) ?>	
		<?php do_action( 'bp_before_directory_members_featured' ) ?>	

		<div id="members-directory-featured" class="directory-widget widget">
			<h3 class="widgettitle"><?php _e( 'Random Members', 'buddypress' ) ?></h3>
		    <div class="widget-content">
			<?php if ( bp_has_members( 'type=random&max=3' ) ) : ?>

				<ul id="featured-members-list" class="item-list">
				<?php while ( bp_members() ) : bp_the_member(); ?>

					<li>
						<div class="item-avatar">
							<a href="<?php bp_member_permalink() ?>"><?php bp_member_avatar() ?></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="<?php bp_member_permalink() ?>"><?php bp_member_name() ?></a></div>
							<div class="item-meta"><span class="activity"><?php bp_member_last_active() ?></span></div>
						
							<div class="field-data">
								<div class="field-name"><?php bp_member_total_friend_count() ?></div>
								<div class="field-name xprofile-data"><?php bp_member_random_profile_data() ?></div>
							</div>
						
							<?php do_action( 'bp_directory_members_featured_item' ) ?>
						</div>
						<br class="clear" />
					</li>

				<?php endwhile; ?>
				</ul>			

				<?php do_action( 'bp_directory_members_featured' ) ?>	
			
			<?php else: ?>

				<div id="message" class="info">
					<p><?php _e( 'There are not enough members to feature.', 'buddypress' ) ?></p>
				</div>

			<?php endif; ?>
			</div><!-- end of widget content -->
		</div>

		<?php do_action( 'bp_after_directory_members_featured' ) ?>	

	</div>