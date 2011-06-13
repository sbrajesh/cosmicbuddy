<?php do_action( 'bp_before_user_bar' ) ?>
<?php
//based on the page show the logged in  user nav or displayed user nav
global $bp;
if(!bp_is_member())
$user_id=$bp->loggedin_user->id;
else
$user_id=$bp->displayed_user->id;
?>
 <div class="user-image">
 
                <a href="<?php bp_user_link() ?>" class='user-profile-wrap'><?php 

echo bp_core_fetch_avatar( array( 'item_id' => $user_id, 'type' => 'full', 'width' => 118, 'height' => 118 )) ;


?></a>

<?php echo bp_core_get_userlink($user_id);?>
</div>
<?php if(bp_is_member()):?>
<div id="item-buttons">
			<?php if ( function_exists( 'bp_add_friend_button' ) ) : ?>
				<?php bp_add_friend_button($user_id) ?>
			<?php endif; ?>

			<?php if ( is_user_logged_in() && !bp_is_my_profile() && function_exists( 'bp_send_public_message_link' ) ) : ?>
				<div class="generic-button" id="post-mention">
					<a href="<?php bp_send_public_message_link() ?>" title="<?php _e( 'Mention this user in a new public message, this will send the user a notification to get their attention.', 'buddypress' ) ?>"><?php _e( 'Mention this User', 'buddypress' ) ?></a>
				</div>
			<?php endif; ?>

			<?php if ( is_user_logged_in() && !bp_is_my_profile() && function_exists( 'bp_send_private_message_link' ) ) : ?>
				<div class="generic-button" id="send-private-message">
					<a href="<?php bp_send_private_message_link() ?>" title="<?php _e( 'Send a private message to this user.', 'buddypress' ) ?>"><?php _e( 'Send Private Message', 'buddypress' ) ?></a>
				</div>
			<?php endif; ?>
		</div><!-- #item-buttons -->
<?php endif;?>
<div id="userbar">
		<?php do_action( 'bp_inside_before_user_bar' ) ?>
		<ul id="bp-nav">
			<?php if(bp_is_member()&&!bp_is_home())
				bp_get_displayed_user_nav();
			else
			bp_get_loggedin_user_nav();
		
			?>
		</ul>
		<?php do_action( 'bp_inside_after_user_bar' ) ?>
</div>

<?php do_action( 'bp_after_user_bar' ) ?>