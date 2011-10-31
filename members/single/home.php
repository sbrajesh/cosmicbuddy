<?php
/** Using this page to Load appropriate template**/
?>
<?php if ( bp_is_user_activity() || !bp_current_component() ) : ?>
		<?php locate_template( array( 'members/single/activity.php' ), true ) ?>
<?php elseif ( bp_is_user_blogs() ) : ?>
		<?php locate_template( array( 'members/single/blogs.php' ), true ) ?>
<?php elseif ( bp_is_user_friends() ) : ?>
		<?php locate_template( array( 'members/single/friends.php' ), true ) ?>
<?php elseif ( bp_is_user_groups() ) : ?>
		<?php locate_template( array( 'members/single/groups.php' ), true ) ?>
<?php elseif ( bp_is_user_messages() ) : ?>
		<?php locate_template( array( 'members/single/messages.php' ), true ) ?>
<?php elseif ( bp_is_user_forums() ) : ?>
		<?php locate_template( array( 'members/single/forums.php' ), true ) ?>
<?php elseif ( bp_is_user_profile() ) : ?>
		<?php locate_template( array( 'members/single/profile.php' ), true ) ?>
<?php endif; ?>