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
					<h1 class="fn"><?php _e("My Messages", "buddypress"); ?></h1>
						
						<!-- breadcrumb-->
					</div>
					
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
			
				
           