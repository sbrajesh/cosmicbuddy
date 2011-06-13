<?php if ( 'invites' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/groups/invites.php' ), true ) ?>

<?php else : ?>

	<?php do_action( 'bp_before_member_groups_content' ) ?>

		<?php locate_template( array( 'members/single/groups/index.php' ), true ) ?>
	
	<?php do_action( 'bp_after_member_groups_content' ) ?>

<?php endif; ?>
