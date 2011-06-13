<?php if ( 'compose' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/messages/compose.php' ), true ) ?>

<?php elseif ( 'view' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/messages/view.php' ), true ) ?>

<?php else : ?>
	
		<?php if ( 'notices' == bp_current_action() ) : ?>
			<?php locate_template( array( 'members/single/messages/notices.php' ), true ) ?>

		<?php else : ?>
			<?php locate_template( array( 'members/single/messages/messages.php' ), true ) ?>

		<?php endif; ?>
	

<?php endif; ?>