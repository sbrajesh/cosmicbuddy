<div class='box basics'>
				 <div class='box-trc'>
			  </div>
			  <div class='box-content'>
					<div id="profile-name">
					<h1 class="fn"><?php bp_word_or_name( __( "Your Latest Flickr Photos", 'buddypress' ), __( "%s's Latest Flickr Photos", 'buddypress' ) ) ?></h1>
						
						
					</div>
			
				
            
			<div class="content">
			<div id="tabbed-subnav">
			
			<ul><?php locate_template( array( 'optionsbar.php' ), true ) ?></ul>
			<br class='clear' />
			</div>
<div class="main-column">

<?php do_action( 'bp_before_member_flickr_content' ) ?>
<div class="flickr myflickr-settings">
	<?php do_action( 'bp_before_flickr_settings' ) ?>

	<form class="standard-form" method="post" action="">

		<fieldset>
			<legend>Flickr Account settings</legend>
			<p>Please enter your flickr account NSID
			<input type="text" name="flickr_account" value="<?php echo bp_flickr_get_user_account();?>"/>
			</p>
			<?php wp_nonce_field( 'flickr_settings') ?>
			<input type="submit" name="save_settings" value="Save" />
			
		</fieldset>

	</form>






<?php do_action( 'bp_after_flickr_settings' ) ?>
	
</div><!-- flickr -->

<?php do_action( 'bp_after_member_flickr_content' ) ?>
</div>
		
	</div><!--end of content-->
	</div><!--end of box content -->
	</div> <!-- end of box -->				
   </div> <!--end of right-column-wide -->

          
             <br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>