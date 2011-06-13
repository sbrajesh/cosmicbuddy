<?php if(bp_gallery_has_medias("page=0")):?>
<div class="player_wrapper">
<a id="player" class="player plain" style="background-image:url(<?php echo bp_gallery_get_cover_mid_src($gallery);?>)">
    <?php
    $gallery=bp_get_single_gallery();
    
   // if(bp_gallery_has_cover_image($gallery)):?>
    <img src="<?php echo BP_GALLERY_PLUGIN_URL;?>inc/images/play_large.png" />
    <?php //endif;?>
</a>
<div id="playlist" class="playlist">

		
<?php while(bp_gallery_medias()):bp_gallery_the_media() ;?>
			
   
     <a href="<?php bp_media_thumb_src();?>" >
         <strong> <?php bp_media_title();?></strong>
         <em> by <?php bp_member_avatar(array("user_id"=>bp_get_media_uploader_id(),"height"=>50,"width"=>50));?> <?php echo bp_core_get_user_displayname(bp_get_media_uploader_id());?></em><br/>
         <span>on <?php echo mysql2date("F j Y",bp_get_media_creation_date());?></span>
       
    </a>
	
			
		
			<?php endwhile;?>


	</div>

</div>

<br clear="all" />
	<script type="text/javascript">
	jQuery(document).ready( function(){
		gallery_activate_player();
		});
		</script>
			<br class="clear" />
		
	<?php else: ?>

		<div id="message" class="info">
			<p><?php _e( ":( we don't have anything here.", "bp-gallery" ) ?></p>
		</div>

	<?php endif;?>


