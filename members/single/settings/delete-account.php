<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="center-column">
			  <!-- user status-->
				<div class='box basics'>
			 
						<div class='box-content'>
						<?php do_action( 'bp_before_member_settings_template' ); ?>
							<div id="tabbed-subnav">
						
								<?php locate_template( array( 'optionsbar.php' ), true ) ?>
								
								<br class='clear' />
							</div>
							<?php do_action( 'bp_before_member_body' ); ?>

				<h3><?php _e( 'Delete Account', 'buddypress' ); ?></h3>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/delete-account'; ?>" name="account-delete-form" id="account-delete-form" class="standard-form" method="post">

					<div id="message" class="info">
						<p><?php _e( 'WARNING: Deleting your account will completely remove ALL content associated with it. There is no way back, please be careful with this option.', 'buddypress' ); ?></p>
					</div>

					<input type="checkbox" name="delete-account-understand" id="delete-account-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-account-button').disabled = ''; } else { document.getElementById('delete-account-button').disabled = 'disabled'; }" /> <?php _e( 'I understand the consequences of deleting my account.', 'buddypress' ); ?>

					<?php do_action( 'bp_members_delete_account_before_submit' ); ?>

					<div class="submit">
						<input type="submit" disabled="disabled" value="<?php _e( 'Delete My Account', 'buddypress' ) ?>" id="delete-account-button" name="delete-account-button" />
					</div>

					<?php do_action( 'bp_members_delete_account_after_submit' ); ?>

					<?php wp_nonce_field( 'delete-account' ); ?>
				</form>

				<?php do_action( 'bp_after_member_body' ); ?>
				</div><!--end of box content -->
						<?php do_action( 'bp_after_member_settings_template' ); ?>
				</div><!--basic section ends here-->
			
							
            </div> <!-- end of center column -->

         <?php locate_template( array( 'members/single/right-sidebar.php' ), true ) ?>
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>