<?php get_header();?>
        <div id="container">
            <div id="left-column">
            <?php locate_template( array( 'userbar.php' ), true ) ?>
            </div><!--end of left column -->

            <div id="right-column-wide">
			  <!-- user status-->
			  <div class='box basics'>
			  <div class='box-trc'>
			  </div>
			  <div class='box-content'>
					<div id="profile-name">
						<h1 class="fn"><?php do_action('bp_template_title') ?></h1>
						<!--breadcrumb -->
					</div>
			
				
           
			<div class="content">
			<div id="tabbed-subnav">
			<ul>
			<?php bp_get_options_nav() ?>
			</ul>
			<?php do_action('bp_template_content_header') ?>
			<br class='clear' />
			</div>
			
	
		<?php do_action('bp_template_content') ?>
			<br class="clear" />
		</div><!--end of content-->
		
		 </div><!--end of box content -->
			</div><!--end of box -->
								
            </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>