<?php get_header() ?>
<div id="container">
            <div id="left-padder">
            <?php //locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->
<div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			  <div class='box-trc'>
			  </div>
			  <div class='box-content'>
					
			
			<div class="content">
			
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
			<div class="activity no-ajax">
	<?php if ( bp_has_activities( 'display_comments=threaded&include=' . bp_current_action() ) ) : ?>

		<ul id="activity-stream" class="activity-list item-list">
		<?php while ( bp_activities() ) : bp_the_activity(); ?>

			<?php locate_template( array( 'activity/entry.php' ), true ) ?>

		<?php endwhile; ?>
		</ul>

	<?php endif; ?>
</div>
			
		
			</div><!--end of content-->
			</div><!--end of box content-->


</div><!--basic section ends here-->					
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>