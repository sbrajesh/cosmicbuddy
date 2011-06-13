<?php locate_template( array( 'members/single/messages/message-header.php' ), true ) ?>
			<div class="main-column">
				<?php do_action( 'template_notices' ) // (error/success feedback) ?>
			<form action="<?php bp_messages_form_action() ?>" method="post" id="messages-form">

			<?php do_action( 'bp_before_messages_inbox_content' ) ?>
	
			<?php bp_message_get_notices(); // (admin created site wide notices) ?>

			<?php if ( bp_has_message_threads() ) : ?>
				
				<div class="pagination">

					<div class="pagination-links">
						<?php bp_messages_pagination() ?>
					</div>

				</div>
				
				<?php do_action( 'bp_before_messages_inbox_list' ) ?>
	
				<table id="message-threads">
					<?php while ( bp_message_threads() ) : bp_message_thread(); ?>
					
						<tr id="m-<?php bp_message_thread_id() ?>"<?php if ( bp_message_thread_has_unread() ) : ?> class="unread"<?php else: ?> class="read"<?php endif; ?>>
							<td width="1%">
								<span class="unread-count"><?php bp_message_thread_unread_count() ?></span>
							</td>
							<td width="1%"><?php bp_message_thread_avatar() ?></td>
							<td width="27%">
								<p><?php _e("From:", "buddypress"); ?> <?php bp_message_thread_from() ?></p>
								<p class="date"><?php bp_message_thread_last_post_date() ?></p>
							</td>
							<td width="40%">
								<p><a href="<?php bp_message_thread_view_link() ?>" title="<?php _e("View Message", "buddypress"); ?>"><?php bp_message_thread_subject() ?></a></p>
								<p><?php bp_message_thread_excerpt() ?></p>
							</td>
							
							<?php do_action( 'bp_messages_inbox_list_item' ) ?>
							
							<td width="10%">
								<a href="<?php bp_message_thread_delete_link() ?>" title="<?php _e("Delete Message", "buddypress"); ?>" class="delete confirm"><?php _e("Delete", "buddypress"); ?></a> &nbsp; 
								<input type="checkbox" name="message_ids[]" value="<?php bp_message_thread_id() ?>" />
							</td>
						</tr>
					
					<?php endwhile; ?>
				</table>

				<?php do_action( 'bp_after_messages_inbox_list' ) ?>
		
			<?php else: ?>
		
				<div id="message" class="info">
					<p><?php _e( 'You have no messages in your inbox.', 'buddypress' ); ?></p>
				</div>	
		
			<?php endif;?>

			<?php do_action( 'bp_after_messages_inbox_content' ) ?>
			</form>
		
		    </div>
		
			</div><!--end of content-->
			</div> <!-- end of box content -->
			</div>	<!-- end of box -->	
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>