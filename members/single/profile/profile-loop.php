<?php if ( function_exists('xprofile_get_profile') ) : ?>
	
	<?php if ( bp_has_profile() ) : ?>	
		
		<?php while ( bp_profile_groups("group_id=1") ) : bp_the_profile_group(); ?>

			<?php if ( bp_profile_group_has_fields() ) : ?>
				
				<?php do_action( 'bp_before_profile_field_content' ) ?>
				
				<div class="bp-widget <?php bp_the_profile_group_slug() ?>">
					<h4><?php bp_the_profile_group_name() ?></h4>
				
					<div class="profile-fields">
						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<?php if ( bp_field_has_data() ) : ?>
								<div<?php bp_field_css_class() ?>>
								
									<div class="label">
										<?php bp_the_profile_field_name() ?>
									</div>
									<div class="data">
										<?php bp_the_profile_field_value() ?>
									</div>
									<br class="clear" />
								</div>
							<?php endif; ?>
							
							<?php do_action( 'bp_profile_field_item' ) ?>

						<?php endwhile; ?>
					</div>
				</div>

				<?php do_action( 'bp_after_profile_field_content' ) ?>
				
			<?php endif; ?>	
		
		<?php endwhile; ?>
	
		
	
	<?php else: ?>
	
		<div id="message" class="info">
			<p><?php _e( 'Sorry, this person does not have a public profile.', 'buddypress' ) ?></p>
		</div>
	
	<?php endif;?>

<?php else : ?>
	
	<?php bp_core_get_wp_profile() ?>

<?php endif; ?>
