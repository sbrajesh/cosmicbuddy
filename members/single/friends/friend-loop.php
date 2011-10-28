<div class="pagination">

			<div class="pag-count">
				<?php bp_members_pagination_count() ?>
			</div>
			
			<div class="pagination-links" id="pag">
				<?php bp_members_pagination_links() ?>
			</div>
		
		</div>
		
		<?php do_action( 'bp_before_my_friends_list' ) ?>
		
		<ul id="friend-list" class="item-list">
		<?php while ( bp_members() ) : bp_the_member(); ?>
			
				<li>
					<?php bp_member_avatar() ?>
					<h4><a href="<?php bp_member_permalink() ?>"><?php bp_member_name() ?></a></h4>
					<span class="activity"> - <?php bp_member_latest_update( 'length=10' ) ?></span>

					<?php do_action( 'bp_my_friends_list_item' ) ?>	
								
					<div class="action">
						<?php bp_member_add_friend_button() ?>
						
						<?php do_action( 'bp_my_friends_list_item_action' ) ?>
					</div>
				</li>
		
			<?php endwhile; ?>
		</ul>

		<?php do_action( 'bp_after_my_friends_list' ) ?>