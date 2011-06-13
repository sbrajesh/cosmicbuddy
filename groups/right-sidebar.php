<div id="right-column">
<?php if ( bp_group_is_visible() ) : ?>
				<div class='widget'>
					<h3 class='widgettitle'><?php printf( __( 'Members (%d)', 'buddypress' ), bp_get_group_total_members() ); ?> <span><a href="<?php bp_group_all_members_permalink() ?>"><?php _e( 'See All', 'buddypress' ) ?> &rarr;</a></span> </h3>
					<div class='widget-content'>
						
						

						<?php do_action( 'bp_before_group_member_widget' ) ?>

						
						
							<?php if ( bp_group_has_members( 'max=5&exclude_admins_mods=0' ) ) : ?>

								<ul class="horiz-gallery">
									<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

										<li>
											<a href="<?php bp_group_member_url() ?>"><?php bp_group_member_avatar_thumb() ?></a>
											<h5><?php bp_group_member_link() ?></h5>
										</li>
									<?php endwhile; ?>
								</ul>
								<br class="clear" />

							<?php endif; ?>
							

						<?php do_action( 'bp_after_group_member_widget' ) ?>

					
						
						
					</div>
					
				</div>
				<?php endif; ?>
			
			
				
            </div><!--end of right column -->