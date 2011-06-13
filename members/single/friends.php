<?php if ( 'requests' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/friends/requests.php' ), true ) ?>

<?php else : ?>
	<?php locate_template( array( 'members/single/friends/friends.php' ), true ) ?>
<?php endif; ?>