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
					<h1 class="fn"><?php bp_word_or_name( __( "Your Blogs", 'buddypress' ), __( "%s's Blogs", 'buddypress' ) ) ?></h1>
						
						
					</div>
			
				
            
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
			<div class="main-column">
		
			<?php do_action( 'bp_before_my_blogs_content' ) ?>

		<?php if ( bp_has_blogs() ) : ?>
			
			<ul id="blog-list" class="item-list">
				<?php while ( bp_blogs() ) : bp_the_blog(); ?>
					
					<li>
						<h2><a href="<?php bp_blog_permalink() ?>"><?php bp_blog_title() ?></a></h2>
						<p><?php bp_blog_description() ?></p>

						<?php do_action( 'bp_my_blogs_item' ) ?>
					</li>
					
				<?php endwhile; ?>
			</ul>
			
			<?php do_action( 'bp_my_blogs_content' ) ?>
			
		<?php else: ?>

			<div id="message" class="info">
				<p><?php bp_word_or_name( __( "You haven't created any blogs yet.", 'buddypress' ), __( "%s hasn't created any public blogs yet.", 'buddypress' ) ) ?> <?php bp_create_blog_link() ?> </p>
			</div>

		<?php endif;?>

		<?php do_action( 'bp_after_my_blogs_content' ) ?>
		
		</div>
		
			</div><!--end of content-->
			</div><!--end of box content -->
			</div> <!-- end of box -->				
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>