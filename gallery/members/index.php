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
						<h1 class="fn"><?php bp_word_or_name( __( "My Galleries", 'buddypress' ), __( "%s's Friends", 'buddypress' ) ) ?> </h1>
						<!-- for  breadcrumb -->
					</div>
					<div id="tabbed-subnav">
						<ul>
						<?php bp_user_gallery_admin_tabs();?>
						</ul>
						<br class='clear' />
					</div>
					
				</div><!--end of box content -->
			</div><!--basic section ends here-->
			<!-- submenu -->
			<div class="box friends">
				<div class="box-content">
					<div class="bp-widget">
						

							<?php
							
			 if(bp_current_action()=="create")
			 locate_template( array( 'gallery/members/create.php' ), true ) ;
			else if(bp_current_action()=="manage")
			 locate_template( array( 'gallery/members/edit.php' ), true ) ;
			else if(bp_current_action()=="upload")
			 locate_template( array( 'gallery/single/media/upload-form.php' ), true ) ;
			else if(bp_is_single_media())
				 locate_template( array( 'gallery/members/single-media.php' ), true ) ;
			 else if(bp_is_single_gallery())
				 locate_template( array( 'gallery/members/single.php' ), true ) ;
		else
			 locate_template( array( 'gallery/members/home.php' ), true ) ;
			 ?>
						</div>
					</div>
				</div>				
            </div> <!-- end of right column wide-->

         
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>