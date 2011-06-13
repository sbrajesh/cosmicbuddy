<?php get_header();?>
        <div id="container">
            <div id="left-column">
				<?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <div class='box basics'>
				<div class='box-content'>
					<div id="profile-name">
						<h1 class="fn"><?php _e("Invites");?></h1>
						<!-- for breadcrumb -->
					</div>
			          
					<div class="content">
						<div id="tabbed-subnav">
							<ul>
								<?php bp_get_options_nav() ?>
							</ul>
						    <br class='clear' />
						</div>
						<h2><?php bp_word_or_name( __( "My Groups", 'buddypress' ), __( "%s's Groups", 'buddypress' ) ) ?> &raquo; <?php bp_groups_filter_title() ?></h2>

						<?php do_action( 'bp_before_my_groups_content' ) ?>
	
						<div class="left-menu">
							<?php bp_group_search_form() ?>
						</div>
	
						<div class="main-column">
							<?php do_action( 'template_notices' ) // (error/success feedback) ?>
						
							<?php do_action( 'bp_before_my_groups_loop' ) ?>

<div id="group-loop">
	
	<?php if ( bp_has_groups( 'type=invites&user_id=' . bp_loggedin_user_id() ) ) : ?>
		
		<div class="pagination">
			
			<div class="pag-count">
				<?php bp_groups_pagination_count() ?>
			</div>
			
			<div class="pagination-links" id="<?php bp_group_pag_id() ?>">
				<?php bp_groups_pagination_links() ?>
			</div>
		
		</div>
		
		<?php do_action( 'bp_before_my_groups_list' ) ?>

		<ul id="group-list" class="item-list">
			<?php while ( bp_groups() ) : bp_the_group(); ?>
				
				<li>
					<?php bp_group_avatar_thumb() ?>
					<h4><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a><span class="small"> - <?php printf( __( '%s members', 'buddypress' ), bp_group_total_members( false ) ) ?></span></h4>
	
					<a class="button accept" href="<?php bp_group_accept_invite_link() ?>"><?php _e( 'Accept', 'buddypress' ) ?></a> &nbsp;
					<a class="button reject confirm" href="<?php bp_group_reject_invite_link() ?>"><?php _e( 'Reject', 'buddypress' ) ?></a>

					
					<div class="desc">
						<?php bp_group_description_excerpt() ?>
					</div>
				
					<?php do_action( 'bp_before_my_groups_list_item' ) ?>
				</li>
				
			<?php endwhile; ?>
		</ul>
	
		<?php do_action( 'bp_after_my_groups_list' ) ?>
		
	<?php else: ?>

		<?php if ( bp_group_show_no_groups_message() ) : ?>

			<div id="message" class="info">
				<p><?php bp_word_or_name( __( "You haven't joined any groups yet.", 'buddypress' ), __( "%s hasn't joined any groups yet.", 'buddypress' ) ) ?></p>
			</div>

			
		<?php else: ?>

			<div id="message" class="error">
				<p><?php _e( 'You have no outstanding group invites.', 'buddypress' ) ?></p>
			</div>

		<?php endif; ?>

	<?php endif;?>
	
</div>

<?php do_action( 'bp_after_my_groups_loop' ) ?>
						</div>

						<?php do_action( 'bp_after_my_groups_content' ) ?>
					</div><!--end of content-->
		
				</div><!--end of box content -->
			</div><!--end of box -->
								
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>