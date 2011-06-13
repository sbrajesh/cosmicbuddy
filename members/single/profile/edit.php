<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			  <div class='box-trc'>
			  </div>
			  <div class='box-content'>
					<div id="profile-name">
						<h1 class="fn"><?php _e("Edit Profile","bpdev");?></h1>
						<?php if(function_exists("bpdev_bcn")):?>
						<p class="breadcrumb">
							<?php bpdev_bcn();?>
							</p><!--end of breadcrum -->
						<?php endif;?>	
					</div>
			
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php bp_profile_group_tabs(); ?></ul>
			<br class='clear' />
			</div>
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
	
			<?php do_action( 'bp_before_profile_edit_content' ) ?>
		    
			<?php if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<form action="<?php bp_the_profile_group_edit_form_action() ?>" method="post" id="profile-edit-form" class="standard-form <?php bp_the_profile_group_slug() ?>">

			<?php do_action( 'bp_before_profile_field_content' ) ?>
		
				
				<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
				
					<div<?php bp_field_css_class( 'editfield' ) ?>>
					
						<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>
							<div class='label'>
							<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ) ?><?php endif; ?></label>
							</div>
							<div class='input'>
							<input type="text" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" value="<?php bp_the_profile_field_edit_value() ?>" />
							</div>
						<?php endif; ?>
				
						<?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>
						<div class='label'>
							<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ) ?><?php endif; ?></label>
							</div>
							<div class='input'>
							<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_edit_value() ?></textarea>
							</div>
						<?php endif; ?>

						<?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>
							<div class='label'>
							<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ) ?><?php endif; ?></label>
							</div>
							<div class='input'>
							<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>">
								<?php bp_the_profile_field_options() ?>
							</select>
							</div>
						<?php endif; ?>

						<?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>
						<div class='label'>
							<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ) ?><?php endif; ?></label>
						</div>	
							<div class='input'>
							<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" multiple="multiple">
								<?php bp_the_profile_field_options() ?>
							</select>
							</div>
							
						<?php endif; ?>

						<?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>
					
							<div class='label'>
								<?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '*', 'buddypress' ) ?><?php endif; ?>
							</div>
							<div class='input'>
								<?php bp_the_profile_field_options() ?>
							
								<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
									<a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name() ?>' );"><?php _e( 'Clear', 'buddypress' ) ?></a>
								<?php endif; ?>
							</div>
					
						<?php endif; ?>	
				
						<?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>
							<div class='label'>
										<?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '*', 'buddypress' ) ?><?php endif; ?>
							</div>
							<div class='input'>
							
								<?php bp_the_profile_field_options() ?>
							</div>
					
						<?php endif; ?>					

						<?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>
					
							<div class='label'>
								<label for="<?php bp_the_profile_field_input_name() ?>_day"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ) ?><?php endif; ?></label>
							</div>
							<div class='input'>
								<select name="<?php bp_the_profile_field_input_name() ?>_day" id="<?php bp_the_profile_field_input_name() ?>_day">
									<?php bp_the_profile_field_options( 'type=day' ) ?>
								</select>
							
								<select name="<?php bp_the_profile_field_input_name() ?>_month" id="<?php bp_the_profile_field_input_name() ?>_month">
									<?php bp_the_profile_field_options( 'type=month' ) ?>
								</select>
							
								<select name="<?php bp_the_profile_field_input_name() ?>_year" id="<?php bp_the_profile_field_input_name() ?>_year">
									<?php bp_the_profile_field_options( 'type=year' ) ?>
								</select>
							</div>								
							</div>
					
						<?php endif; ?>	
					
						<?php do_action( 'bp_custom_profile_edit_fields' ) ?>
				<br class='clear' />
						<p class="description"><?php bp_the_profile_field_description() ?></p>
					</div>

				<?php endwhile; ?>

			<?php do_action( 'bp_after_profile_field_content' ) ?>
			<div id="profile-edit-button">
			<button type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit"  ><?php _e( 'update', 'buddypress' ) ?></button>
			
			
			
			<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_group_field_ids() ?>" />
			<?php wp_nonce_field( 'bp_xprofile_edit' ) ?>
			</div>
		</form>
		
		<?php endwhile; endif; ?>
		
		<?php do_action( 'bp_after_profile_edit_content' ) ?>
		
			</div><!--end of content-->
			</div><!--end of box content-->
				
            </div><!--basic section ends here-->					
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>