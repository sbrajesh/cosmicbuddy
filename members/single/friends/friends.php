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
						<h1 class="fn"><?php bp_word_or_name( __( "My Friends", 'buddypress' ), __( "%s's Friends", 'buddypress' ) ) ?> </h1>
						<!-- for  breadcrumb -->
					</div>
					<div id="tabbed-subnav">
						<?php locate_template( array( 'optionsbar.php' ), true ) ;
							?>
						<br class='clear' />
					</div>
					<div id="content-header"><ul>
						<?php bp_friends_header_tabs();?></ul>
					<br class="clear" />
					</div>	
				</div><!--end of box content -->
			</div><!--basic section ends here-->
			<!-- submenu -->
			<div class="box friends">
				<div class="box-content">
					<div class="bp-widget">
						<h4><?php bp_friends_filter_title() ?></h4>

							<?php do_action( 'bp_before_my_friends_content' ) ?>		
							<?php do_action( 'bp_before_my_friends_search' ) ?>

							<?php bp_friend_search_form() ?>
			
								<?php do_action( 'bp_after_my_friends_search' ) ?>
		

		
								<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
								<?php locate_template( array( 'members/single/friends/friends-loop.php' ), true ) ?>
		

								<?php do_action( 'bp_after_my_friends_content' ) ?>	
						</div>
					</div>
				</div>				
            </div> <!-- end of right column wide-->

         
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>