<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			    <div class='box basics'>
				
			  <div class='box-trc'>
			  </div>
			  <div class='box-content'>
					<div id="profile-name">
					<h1 class="fn"><?php _e( 'Create a Blog', 'buddypress' ) ?></h1>
						
						
					</div>
			
				
           
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
			<div class="main-column">
		
			<?php do_action( 'bp_before_create_blog_content' ) ?>

		<?php if ( bp_blog_signup_enabled() ) : ?>
		
			<?php bp_show_blog_signup_form() ?>
	
		<?php else: ?>

			<div id="message" class="info">
				<p><?php _e( 'Blog registration is currently disabled', 'buddypress' ); ?></p>
			</div>

		<?php endif; ?>

		<?php do_action( 'bp_after_create_blog_content' ) ?>
		
		</div>
		
			</div><!--end of content-->
			</div><!--end of box content -->
			</div> <!-- end of box -->
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>