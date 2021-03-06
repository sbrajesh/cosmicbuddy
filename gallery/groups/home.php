<div class="item-list-tabs no-ajax" id="subnav">
<ul>
	<?php bp_group_gallery_admin_tabs(); ?>
</ul>
<?php gallery_display_space_usage()?>
</div>

				<div id="galleries">
				
				<?php if(bp_has_galleries()):?>
					<?php while(bp_galleries()):bp_the_gallery() ;?>
							<div class='gallery' id="gallery_<?php bp_gallery_id();?>">
								<div class='gallery-content'>
							
								<h3 class='gallery-title'><a href="<?php bp_gallery_permalink();?>"><?php bp_gallery_title();?></a></h3>
								<?php// bp_gallery_description();?>
								<div class='gallery-cover'><a href="<?php bp_gallery_permalink();?>"><?php bp_gallery_cover_image();?></a></div>
								<br class="clear" />
								<?php if(user_can_delete_gallery()):?>
                               
								<div class='gallery-actions'>
								<a href="<?php echo  bp_get_media_upload_link();?>" class='upload'>[upload]</a><a href="<?php bp_gallery_edit_link();?>" class='edit'>[Edit]</a><a href='<?php bp_gallery_delete_link()?>' class='delete'>[x]remove</a>
								</div>
								<?php endif;?>
								</div>
							
							</div>
							<?php
							//print_r($galleries_template->gallery);
				?>
					<?php endwhile;?>
			<br class="clear" />
					<?php bp_gallery_pagination_count();?><br />
					<?php   bp_gallery_pagination();?><br />
				<?php else:?>
					<p><?php bp_no_gallery_message();?>
					</p>
					<?php bp_gallery_create_button();?>
				<?php endif;?>
				
			
			<br class="clear" />
			</div>

				<?php do_action( 'bp_directory_members_content' ) ?>