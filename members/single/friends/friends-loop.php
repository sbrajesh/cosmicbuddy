<?php do_action( 'bp_before_my_friends_loop' ) ?>		

<div id="friends-loop">
	
	<?php if ( bp_has_members() ) : ?>
		
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
		
	<?php else: ?>

		<!-- <?php //if ( bp_friends_is_filtered() ) : ?>
			
			<div id="message" class="info">
				<p><?php _e( "No friends matched your search filter terms", 'buddypress' ) ?></p>
			</div>			
			
		<?php //else : ?>
			-->
			<div id="message" class="info">
				<p><?php bp_word_or_name( __( "Your friends list is currently empty", 'buddypress' ), __( "%s's friends list is currently empty", 'buddypress' ) ) ?></p>
			</div>
			
		<?php //endif; ?>
		
				
	<?php endif;?>
	
</div>

<?php do_action( 'bp_after_my_friends_loop' ) ?>	