
	
	<?php
	global $bp;
	$group=$bp->groups->current_group;
	?>
	<?php if ( bp_is_group_admin_page() && bp_group_is_visible($group) ) : ?>
						<?php locate_template( array( 'groups/single/admin.php' ), true ) ?>
	<?php elseif ( bp_is_group_members() && bp_group_is_visible($group) ) : ?>
					<?php locate_template( array( 'groups/single/members.php' ), true ) ?>
	<?php elseif ( bp_is_group_invites() && bp_group_is_visible($group) ) : ?>
					<?php locate_template( array( 'groups/single/send-invites.php' ), true ) ?>
	<?php elseif ( bp_is_group_forum() && bp_group_is_visible($group) ) : ?>
					<?php locate_template( array( 'groups/single/forum/index.php' ), true ) ?>
	<?php elseif ( bp_is_group_membership_request() ) : ?>
					<?php locate_template( array( 'groups/single/request-membership.php' ), true ) ?>
	<?php elseif ( bp_group_is_visible($group) && bp_is_group_home()):?>
					<?php locate_template( array( 'groups/single/front.php' ), true ) ?>
	<?php elseif (  bp_group_is_visible($group) && bp_is_active( 'activity' ) ) : ?>
					<?php locate_template( array( 'groups/single/activity.php' ), true ) ?>
	<?php elseif ( ! bp_group_is_visible($group) ) : ?>
	<?php /* The group is not visible, show the status message */ ?>
		<?php do_action( 'bp_before_group_status_message' ) ?>
			<div id="message" class="info">
			<p><?php bp_group_status_message() ?></p>
			</div>
		<?php do_action( 'bp_after_group_status_message' ) ?>

	<?php else : ?>
	<?php
		/* If nothing sticks, just load a group front template if one exists. */
		locate_template( array( 'groups/single/front.php' ), true );
	?>
	<?php endif; ?>
	
