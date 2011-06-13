<?php
 global $bp;
 $gallery=bp_get_single_gallery();
 ?>
<div class="gnav">
<a href="<?php echo bp_get_gallery_permalink($gallery);?>">Back to <?php echo bp_get_gallery_title($gallery);?></a>
</div>
<?php
if( bp_gallery_has_unpublished_media($gallery->id)):?>
<div class="notice" id="publish_gallery_activity"><?php _e("You have ".bp_get_gallery_unpublished_media_count($gallery->id)." unpublished ".$gallery->gallery_type.". <a href='".bp_get_gallery_publish_activity_link($gallery)."'>Publish Them to activity now</a> or <a href='".bp_get_gallery_unpublish_activity_link($gallery)."' id='publish_gallery_activity'>Hide This Notice</a>");?>
</div>
<?php endif;?> 
<div id="gallery-header">
	<?php single_gallery_admin_tabs();?>
</div>
<div id="gallery-organize">
<div id="message"></div>
<?php
///we will always have this for some ga;llery

    //find all media for this gallery
//all the code for single gallery editing goes here
if(bp_is_gallery_edit_details()){?>
		<?php do_action( 'bp_before_gallery_edit_content' ) ?>
		<form action="" method="post" id="gallery_edit_info">
			<div class='edit-gallery' id="gallery_<?php echo bp_get_gallery_id($gallery);?>">
                            <div class='gallery-cover'><?php echo bp_get_gallery_cover_image("mid",$gallery);?>
                            </div>
                            <div class='edit-info'>
                                <input type="text" id="gallery_title" name="gallery_title" value="<?php echo esc_attr(bp_get_gallery_title($gallery));?>">
				<br />
				<textarea name="gallery_description" id="gallery_description"><?php echo bp_get_gallery_description($gallery);?></textarea>
				<br />
				<?php wp_nonce_field( 'gallery_edit_save','_wpnonce-edit-save-gallery' );?>
				<?php gallery_valid_gallery_status_dd($gallery->status);?>
                            </div><!-- end of edit info -->
                         </div><!-- end of edit gallery -->
								
			<br class="clear" />
			<input type="submit" name="save" value="save" />
		</form><!-- end of edit form -->
		<br class="clear" />
            <?php do_action( 'bp_after_gallery_edit_content' ) ?>
<?php }else if(bp_is_media_edit()){  //code fo editing medias?>
    <?php
    
     if(bp_gallery_has_medias("page=0")):?>
	<form action="" method="post" id="media_bulk_edit_form">
	 <input type="submit" name="save" value="Save" />
	    <?php while(bp_gallery_medias()):bp_gallery_the_media() ;?>
           <div class='edit-media' id="gallery_media_<?php bp_media_id();?>">
				<div class='media-cover'><?php bp_media_html();?>
				</div>
				<div class='edit-info'>
					<input type="text" name="media_title[<?php bp_media_id();?>]" value="<?php echo esc_attr(bp_get_media_title());?>">
					<br />
					<textarea name="media_description[<?php bp_media_id();?>]" ><?php  bp_media_description();?></textarea>
					<br />
							
					<?php gallery_valid_gallery_status_dd_bulkedit(bp_get_media_status(),bp_get_media_id());?>
					<?php if($gallery->gallery_type=="photo"):?>
                                        <label><input type="radio" name="gallery_cover" value="<?php bp_media_id();?>" <?php if( bp_gallery_is_cover_image($gallery->id,bp_get_media_id())) echo 'checked="checked"';?>/> Set Cover</label>
                                        <?php endif;?>
                                </div>
				<br class="clear" />
		    </div>
	<?php endwhile;	?>
	<input type="hidden" name="gallery_id" value="<?php echo $gallery->id;?>" />
          <br class="clear" />
		  <?php wp_nonce_field( 'media_edit_save','_wpnonce-media_edit_save' );?>
         <input type="submit" name="save" value="Save" />
	</form>
	<?php else:?>
            <?php _e("You have not uploaded anything yet, Upload Now."); ?>
            <a href="<?php echo  bp_get_media_upload_link($gallery);?>" id="gallery_media_upload" <?php if( bp_is_gallery_upload()) echo "class='current'";?>> Upload</a>
	<?php endif; ?>
	
<?php }
else if(bp_is_gallery_upload())
    locate_template(array("gallery/single/media/upload-form.php"),true);
else if( bp_is_gallery_reorder_media()){
//if media reorder screen is for gallery
   ?>
<?php if(bp_gallery_has_medias("page=0")):?>
	<form action="" method="post" id="gallery_media_rorder_form">
	<div id="gallery-sortable">
	    <?php while(bp_gallery_medias()):bp_gallery_the_media() ;?>
                    <div class='reorder-media' id="gallery_media_<?php bp_media_id();?>">
			<div class='media-cover'><?php bp_media_html();?>
			</div>
			<br class="clear" />
		     </div>
	<?php endwhile;	?>
	</div>
            <br class="clear" />
            <input type="submit" name="save" value="save" id="save_sorted" />
			<?php wp_nonce_field( 'gallery_media_reorder','_wpnonce-gallery_media_reorder' );?>
			<input type="hidden" name="reorder_gallery_id" value="<?php echo $gallery->id;?>" id="reorder_gallery_id" />
			
	</form>
	<?php else:?>
            <?php _e("You have not uploaded anything yet, Upload Now."); ?>
            <a href="<?php echo  bp_get_media_upload_link($gallery);?>" id="gallery_media_upload" <?php if( bp_is_gallery_upload()) echo "class='current'";?>> Upload</a>
	<?php endif; ?>

    
            
<?php }
else if(bp_is_gallery_cover_upload()){
//if this is gallery cover upload page
?>
<form  id="gallery_cover_upload_form" action="<?php bp_gallery_cover_upload_form_action();?>" method="post" enctype="multipart/form-data">
			<div id="from-my-comuter">
			<div class="guploading" style="display:none;"></div>
			<input type="hidden" name="auth_cookie" value="<?php if ( is_ssl() ) echo $_COOKIE[SECURE_AUTH_COOKIE]; else echo $_COOKIE[AUTH_COOKIE]; ?>" id="auth_cookie" />
			<?php wp_nonce_field( 'save_gallery_cover','_wpnonce-save-gallery-cover' ) ?> 
			<br />
			<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

			<input type="file" name="file" id="cover_file" />
			<br />
			<input type="hidden" name="galleriy_id" id="galleriy_id" value="<?php echo $gallery->id;?>" />
			<div id="swfupload-control">
			<p id="queuestatus" ></p>
			<ol id="log"></ol>
		</div>
			<p><input type="submit" name="save-gallery-cover" id="save_gallery_cover" value="Upload & Save Cover"> 
			
		</div>
		<div class="update_media_upload" id="update_media_upload">
		
		</div>
		<br class="clear" />
	</form>

<?php
}
 //end of code block?>
 </div>