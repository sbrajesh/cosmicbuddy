<?php locate_template( array( 'members/single/messages/message-header.php' ), true ) ?>

			<div class="main-column">
				<?php do_action( 'template_notices' ) // (error/success feedback) ?>
			

		<form action="<?php bp_messages_form_action('compose') ?>" method="post" id="send_message_form" class="standard-form">

			<?php do_action( 'bp_before_messages_compose_content' ) ?>
			<div class='row'>
			<div class="label">
			<label for="send-to-input"><?php _e("Send To", 'buddypress') ?> &nbsp; <span class="ajax-loader"></span></label>
			</div>
			<div class='input'>
			<ul class="first acfb-holder">
				<li>
					<?php bp_message_get_recipient_tabs() ?>
					<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" />
				</li>
			</ul>
		</div>
		<br class='clear' />
		</div>
			<?php if ( is_site_admin() ) : ?>
			<div class='row'>
				<div class='label'>
				 <?php _e( "This is a notice to all users.", "buddypress" ) ?>
				 </div>
				 <div class='input'>
				<input type="checkbox" id="send-notice" name="send-notice" value="1" />
				</div>
				<br class='clear' />
			</div>
			<?php endif; ?>
			<div class='row alt'>
			<div class='label'>
			<label for="subject"><?php _e( 'Subject', 'buddypress') ?></label>
			</div>
			<div class='input'>
			<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value() ?>" />
			</div>
			<br class='clear'>
			</div>
			<div class='row'>
				<div class='label'>
			<label for="content"><?php _e( 'Message', 'buddypress') ?></label>
			</div>
			<div class='input'>
			<textarea name="content" id="message_content" rows="15" cols="40"><?php bp_messages_content_value() ?></textarea>
			</div>
			<br class='clear' />
			</div>
			<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames() ?>" />
		
			<?php do_action( 'bp_after_messages_compose_content' ) ?>

			<p class="submit">
				<input type="submit" value="<?php _e("Send", 'buddypress') ?> &raquo;" name="send" id="send" />
			</p>
		
			<?php wp_nonce_field( 'messages_send_message' ) ?>
		</form>
	
		<script type="text/javascript">
			document.getElementById("send-to-input").focus();
		</script>
		
		    </div>
		
			</div><!--end of content-->
			</div> <!-- end of box content -->
			</div>	<!-- end of box -->						
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>