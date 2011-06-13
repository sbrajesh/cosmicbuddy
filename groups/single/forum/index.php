<?php if ( bp_is_group_forum_topic_edit() ) : ?>
	<?php locate_template( array( 'groups/single/forum/edit.php' ), true ) ?>

<?php elseif ( bp_is_group_forum_topic() ) : ?>
	<?php locate_template( array( 'groups/single/forum/topic.php' ), true ) ?>
<?php else : ?>
<?php locate_template( array( 'groups/single/forum/home.php' ), true ) ?>
<?php endif;?>