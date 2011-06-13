<?php do_action( 'bp_before_status_update_form' ) ?>
<form action="<?php bp_activity_post_form_action() ?>" id="status-update-form" method="post" class="standard-form">
	<?php do_action( 'bp_before_status_update_input' ) ?>

	
		<input type="text" id="status-update-input" name="whats-new" tabindex="99" />
	
	<?php do_action( 'bp_after_status_update_input' ) ?>
	
	
		<input type="submit" name="status-update-post" id="status-update-post" tabindex="100" value="<?php _e( 'Update', 'buddypress' ) ?>" />
		<input type="button" name="status-update-post-cancel" id="status-update-post-cncel" tabindex="100" value="<?php _e( 'Cancel', 'buddypress' ) ?>" />
		
		<?php do_action( 'bp_status_update_buttons' ) ?>
	
	
	<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
</form>

<?php do_action( 'bp_after_status_update_form' ) ?>
