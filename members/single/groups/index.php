<?php get_header();?>
        <div id="container">
            <div id="left-column">
				<?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			 	  <div class='box-content'>
					  <div id="profile-name">
						<h1 class="fn"><?php _e("Groups");?></h1>
								<!-- for breadcrumb-->
					   </div>
					<div class='content'>
						<div id="tabbed-subnav">
							<?php 	locate_template( array( 'optionsbar.php' ), true ) ?>
							<div class='border' ></div>
							<br class='clear' />
							</div>
							<div id="content-header">
							<ul><?php bp_groups_header_tabs() ?></ul>
					
								<br class='clear' />
						</div>
				
						<?php do_action( 'bp_before_my_groups_content' ) ?>
						<div class="main-column">
							<?php do_action( 'template_notices' ) // (error/success feedback) ?>
						
							<?php locate_template( array( 'groups/groups-loop.php' ), true ) ?>
						</div>

						<?php do_action( 'bp_after_my_groups_content' ) ?>
				
					</div><!--end of content -->
				
				</div><!--end of box content -->
            </div><!--basic section ends here-->
										
            </div> <!-- end of right column wide-->
         
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>