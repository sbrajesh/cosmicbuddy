<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
				<?php //we need wire here //
				?>
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
				<?php do_action( 'bp_before_member_body' ) ?>
					
				<?php
				if(bp_flickr_is_settings())
					locate_template( array( 'flickr/settings.php' ), true );
				else
					locate_template( array( 'flickr/flickr.php' ), true );
				
				?>

				

				<?php do_action( 'bp_after_member_body' ) ?>

			 </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>