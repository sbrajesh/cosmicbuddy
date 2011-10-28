<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="center-column">
			  <!-- user status-->
				<div class='box basics'>
			 
					<div class='box-content'>
				
						<div id="tabbed-subnav">
							<ul>
								<?php bp_get_options_nav() ?>
							</ul>
							<br class='clear' />
						</div>
					
						<?php if ( bp_album_has_pictures() ) : ?>
							
						<div class="picture-pagination">
							<?php bp_album_picture_pagination(); ?>	
						</div>			
							
						<div class="picture-gallery">												
								<?php while ( bp_album_has_pictures() ) : bp_album_the_picture(); ?>

						<div class="picture-thumb-box">
			
							<a href="<?php bp_album_picture_url() ?>" class="picture-thumb"><img src='<?php bp_album_picture_thumb_url() ?>' /></a>
							<a href="<?php bp_album_picture_url() ?>"  class="picture-title"><?php bp_album_picture_title_truncate() ?></a>	
						</div>
							
								<?php endwhile; ?>
						</div>					
							<?php else : ?>
							
						<div id="message" class="info">
							<p><?php echo bp_word_or_name( __('No pics here, show something to the community!', 'bp-album' ), __( "Either %s hasn't uploaded any picture yet or they have restricted access", 'bp-album' )  ,false,false) ?></p>
						</div>
						
						<?php endif; ?>
				
					</div><!--end of box content -->
					
				</div><!--basic section ends here-->
			
			</div> <!-- end of center column -->

			<?php locate_template( array( 'members/single/right-sidebar.php' ), true ) ?>
            <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>