<div class="item-list-tabs no-ajax" id="subnav">
	<ul>
	<?php //bp_get_options_nav() ?>
	<?php bp_user_gallery_admin_tabs();?>
	</ul>
	
</div>
<div class="gnav"><?php bp_gallery_bcomb();?>	</div>
<?php //do_action( 'bp_before_gallery_content' ) ?>
	<div id="galleries">
	
		<?php if(bp_has_galleries()):?>
			<?php while(bp_galleries()):bp_the_gallery() ;?>
			<?php if ( bp_is_home()): ?>
				<div class="gallery-actions"><a href="<?php bp_gallery_edit_link();?>"> Edit This gallery</a>|<a href="<?php echo  bp_get_media_upload_link($gallery);?>" id="gallery_media_upload" <?php if( bp_is_gallery_upload()) echo "class='current'";?>> Upload</a><br /></div>
			<?php endif;?>	
				<?php 	locate_template( array( '/gallery/single/media/media-loop.php' ), true );?>
				<br class="clear" />	
		<?php previous_gallery_link();?>
		<?php next_gallery_link();?>
		<?php endwhile;?>
			
		
		
		
	<?php else:?>
	<p><?php _e("Perhaps! the Gallery does not exist or You don't have adequate permissions to view them.");?></p>
	<?php //bp_gallery_create_button();?>
	<?php endif;?>
	<br class="clear" />
</div>