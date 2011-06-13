	<div id="sidebar" class="directory-sidebar">

		<?php do_action( 'bp_before_directory_groups_search' ) ?>	

		<div id="groups-directory-search" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Find Groups', 'buddypress' ) ?></h3>
			<div class="widget-content">
			<?php bp_directory_groups_search_form() ?>

			<?php do_action( 'bp_directory_groups_search' ) ?>
			</div><!-- end of widget content -->	
		</div>

		<?php do_action( 'bp_after_directory_groups_search' ) ?>	
		<?php do_action( 'bp_before_directory_groups_featured' ) ?>	

		<div id="groups-directory-featured" class="directory-widget widget">
			
			<h3 class="widgettitle"><?php _e( 'Random Groups', 'buddypress' ) ?></h3>
			<div class="widget-content">
			<?php if ( bp_has_groups( 'type=random&max=3' ) ) : ?>

				<ul id="groups-list" class="item-list">
					<?php while ( bp_groups() ) : bp_the_group(); ?>

						<li>
							<div class="item-avatar">
								<a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar_thumb() ?></a>
							</div>

							<div class="item">
							
								<div class="item-title"><a href="<?php bp_group_permalink()?>"><?php bp_group_name() ?></a></div>
								<div class="item-meta"><span class="activity"><?php bp_group_last_active() ?></span></div>
						
								<div class="field-data">
									<div class="field-name">
										<strong><?php _e( 'Members:', 'buddypress' ) ?></strong>
										<?php bp_group_member_count() ?>
									</div>
							
									<div class="field-name">
										<strong><?php _e( 'Description:', 'buddypress' ) ?></strong>
										<?php bp_group_description_excerpt() ?>
									</div>
								</div>
						
								<?php do_action( 'bp_directory_groups_featured_item' ) ?>
							
							</div>
						<br class="clear" />
						</li>

					<?php endwhile; ?>
				</ul>		

				<?php do_action( 'bp_directory_groups_featured' ) ?>	
				
			<?php else: ?>

				<div id="message" class="info">
					<p><?php _e( 'No groups found.', 'buddypress' ) ?></p>
				</div>

			<?php endif; ?>
		</div><!-- end of widget content -->
		</div>

		<?php do_action( 'bp_after_directory_groups_featured' ) ?>	

	</div>
	
	<?php do_action( 'bp_after_directory_groups_sidebar' ) ?>