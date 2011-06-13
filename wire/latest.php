<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
				<?php //we need wire here //
				?>
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>

		<?php do_action( 'bp_before_profile_wire_latest_content' ) ?>
			<?php if ( function_exists('bp_wire_get_post_list') ) : ?>
				<?php bp_wire_get_post_list( bp_current_user_id(), bp_word_or_name( __( "Your Wire", 'buddypress' ), __( "%s's Wire", 'buddypress' ), true, false ), bp_word_or_name( __( "No one has posted to your wire yet.", 'buddypress' ), __( "No one has posted to %s's wire yet.", 'buddypress' ), true, false ), bp_profile_wire_can_post() ) ?>
			<?php endif; ?>
			<?php do_action( 'bp_after_profile_wire_latest_content' ) ?>

         </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>