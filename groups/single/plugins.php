<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_content' ) ?>

			<div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="right-column-wide">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>
						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; <?php _e( 'Admin', 'buddypress' ); ?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- breadcrumb -->
								<!--end of breadcrum -->
						</div>
						<div id="tabbed-subnav">
							<ul>
							<?php bp_get_options_nav() ?>

							<?php do_action( 'bp_group_plugin_options_nav' ) ?>
						</ul>
							<br class="clear" />
						</div>
						<div class="bp-widget">
						<?php do_action( 'bp_before_group_body' ) ?>

						<?php do_action( 'bp_template_content' ) ?>

						<?php do_action( 'bp_after_group_body' ) ?>
						</div>
				
		
				<?php do_action( 'bp_after_group_plugins_content' ) ?>
					
						
					</div>
				</div><!-- end of group profile -->
							
					<!-- first section -->
					
					

				</div><!-- end of center column -->
		 
			

			<?php do_action( 'bp_after_group_content' ) ?>

		<?php endwhile; else: ?>

			<div id="message" class="error">
				<p><?php _e("Sorry, the group does not exist.", "buddypress"); ?></p>
			</div>

		<?php endif;?>
			<br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>