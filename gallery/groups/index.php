<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_content' ) ?>

			   <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="center-column">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!--breadcrumb-->
								<!--end of breadcrum -->
						</div>
						<!--group description and meta -->
						<div class="group-meta">
						<?php do_action( 'bp_before_group_description' ) ?>
						<div class="desc-row">
							<div class="label"><label><?php _e( 'Description', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_description() ?>
							</div>
							<br class="clear" />
						</div>
						<?php do_action( 'bp_after_group_description' ) ?>
						<div class="desc-row alt">
							<div class="label"><label><?php _e( 'Owner', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_list_admins(false)?>
							</div>
							<br class="clear" />
						</div>
						<div class="desc-row">
							<div class="label"><label><?php _e( 'Type', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php bp_group_status(); ?>
							</div>
							<br class="clear" />
						</div>
						<div class="desc-row alt">
							<div class="label"><label><?php _e( 'Content Privacy', 'buddypress' ); ?></label>
							</div>
							<div class="data"><?php if(bp_group_is_visible()) _e("Public");else _e("members only"); ?>
							</div>
							<br class="clear" />
						</div>
						
						</div><!--end of group meta -->
					</div>
				</div><!-- end of group profile -->
					

					<?php if ( !bp_group_is_visible() ) : ?>

						<?php do_action( 'bp_before_group_status_message' ) ?>

						<div id="message" class="info">
							<p><?php bp_group_status_message() ?></p>
						</div>

						<?php do_action( 'bp_after_group_status_message' ) ?>

					<?php endif; ?>

					
		

						

					
					<!-- first section -->
					
					

						<div class="bp-widget box">
							
							<div class="box-content">
							
							<?php if(bp_is_gallery_home())
			 locate_template( array( 'gallery/groups/home.php' ), true ) ;
			 
		else if(bp_is_gallery_create())
			locate_template( array( 'gallery/groups/create.php' ), true ) ;
			 	
		else if(bp_is_gallery_edit())
			locate_template( array( 'gallery/groups/edit.php' ), true ) ;
			 
		else if(bp_is_gallery_upload())
			locate_template( array( 'gallery/groups/upload.php' ), true ) ;
		 else if(bp_is_single_media())
			
			locate_template( array( 'gallery/groups/single-media.php' ), true ) ;
		 
		else if(bp_is_single_gallery())
			
			locate_template( array( 'gallery/groups/single.php' ), true ) ;
		 
		 else { ?>
					<?php /* The group is not visible, show the status message */ ?>

					<?php do_action( 'bp_before_group_status_message' ) ?>

					<div id="message" class="info">
						<p><?php bp_group_status_message() ?></p>
					</div>

					<?php do_action( 'bp_after_group_status_message' ) ?>
				<?php }; ?>

				<?php do_action( 'bp_after_group_body' ) ?>
			</div>

			<?php do_action( 'bp_after_group_home_content' ) ?>

			
							</div><!--end of widget content -->
						</div>

						
					

					

					<?php do_action( 'groups_custom_group_boxes' ) ?>

					

				</div><!-- end of center column -->
		 <?php locate_template( array( 'groups/right-sidebar.php' ), true ) ?>
			

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