<div id="right-column">
				<?php if ( !function_exists('dynamic_sidebar')
			        || !dynamic_sidebar('profile-sidebar-top') ) : ?>

				
		
			<?php endif; ?>
			<!--friends-->
			<div class='widget friends-widget'>
	
						<h3 class='widgettitle'><?php bp_word_or_name( __( "My Friends", 'buddypress' ), __( "%s's Friends", 'buddypress' ) ) ?> </h3>
						
						
						<div class='widget-content'>
						<?php bp_friend_search_form() ?>
						<?php global $bp; if ( bp_has_members("type=active&action=active&user_id=".$bp->displayed_user->id."&scope=personal&page=1 ") ) : ?>
							<ul id="friend-list" class="item-list">
								<?php while ( bp_members() ) : bp_the_member(); ?>
			
								<li>
								<a href="<?php bp_member_permalink() ?>">	 <?php bp_member_avatar('type=full&height=64&width=64'  ); ?></a>
									<h4><a href="<?php bp_member_permalink() ?>"><?php bp_member_name() ?></a></h4>
									

									<?php do_action( 'bp_my_friends_list_item' ) ?>	
								
									
								</li>
		
			<?php endwhile; ?>
		</ul>

		<?php do_action( 'bp_after_my_friends_list' ) ?>
		
	<?php else: ?>

	
		
		<div id="message" class="info">
			<p><?php bp_word_or_name( __( "Your friends list is currently empty", 'buddypress' ), __( "%s's friends list is currently empty", 'buddypress' ) ) ?></p>
		</div>
			
	
		
		<?php if ( bp_is_home()  ) : ?>

			<?php do_action( 'bp_before_random_members_list' ) ?>
						
			<h3><?php _e( 'Why not make friends with some of these members?', 'buddypress' ) ?></h3>
			<?php bp_friends_random_members() ?>

			<?php do_action( 'bp_after_random_members_list' ) ?>
		
		<?php endif; ?>
		
	<?php endif;?>
			<br class='clear' />			
						</div>
					
				
				</div>
				<!--groups-->
				<?php if ( function_exists( 'bp_has_groups' ) ) : ?>
			<div class='widget groups-widget'>
					<h3 class='widgettitle'><?php bp_word_or_name( __( "My Groups", 'buddypress' ), __( "%s's Groups", 'buddypress' ) ) ?> </h3>
					
					
						<div class='widget-content'>
						<?php bp_group_search_form() ?>
						<?php if ( bp_has_groups( 'type=random&max=5' ) ) : ?>
							<ul id="sidebar-group-list">
								<?php while ( bp_groups() ) : bp_the_group(); ?>
									<li>
										<a href="<?php bp_group_permalink() ?>"><?php global $groups_template; echo  bp_core_fetch_avatar( array( 'item_id' => $groups_template->group->id, 'object' => 'group', 'height'=>64,'width'=>64,'type' => 'full', 'avatar_dir' => 'group-avatars', 'alt' => __( 'Group Avatar', 'buddypress' ) ) );?></a>
										<h5><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></h5>
									<br />
									</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<br class="clear" />
						</div>
					
				</div>
			<?php endif;?>	
            </div><!--end of right column -->