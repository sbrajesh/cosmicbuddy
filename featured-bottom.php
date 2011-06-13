<div id="footer-featured" class="widget">
		
		<div id="bottom-content" class="widget-content">
			<div class="bottom_col">
			<h3><?php _e("From Our Blogs","bpdev");?></h3>
			<div class="posts">
			 <ul>
				 <?php
				 switch_to_blog(2);
				  $wpq=new Wp_Query();
				  $wpq->query("showposts=3");?>
				  <?php if($wpq->have_posts()):
					while($wpq->have_posts()):$wpq->the_post();
					 $editor_image=bp_core_fetch_avatar( "item_id=".$wpq->post->post_author."&type=thumb&height=32&width=32") ;
					?>
					<li>
						<div class="item-avatar"><?php echo $editor_image;?>
						</div>
						<div class="post-snippet">
							<p> <?php echo substr(strip_tags($wpq->post->post_content),0,60);?></p>
						</div>
						<div class="read_more">
						 <?php the_time(' F j');?>|<a href="<?php the_permalink();?>"><?php _e("Read More","bpdev");?></a>
						</div>
						<br class="clear" />
					</li>
				<?php endwhile;?>
				<?php else :?>
					<li>
						<div class="info">
							<p><?php _e("No New Posts Found");?></p>
						</div>
						<br class="clear" />
					</li>
				<?php endif;
				restore_current_blog();
				?>			
			</ul>	
			</div>
		</div>
		<div class="bottom_col">
			<h3><?php _e("Recent Comments","bpdev");?></h3>
			
			<div class="recent_activity">
				<ul>
				<?php if ( bp_has_activities( 'type=sitewide&action=new_blog_comment&max=3' ) ) : ?>
				  <?php while ( bp_activities() ) : bp_the_activity(); ?>
					   <li>	
						 <div class="item-avatar">
						  <?php bp_activity_avatar("height=32&width=32"); ?>
						 </div>
						 <div class="post-snippet">
						   <?php bp_activity_content() ?>
						 </div>
						 <br class="clear" />
					   </li>
					<?php endwhile;?>
					<?php else:?>
						<li>	
						<p><?php _e("No Sitewide Comments yet","bpdev");?></p>							 
						 <br class="clear" />
						</li>
					<?php endif;?>
				</ul>  
				<br class="clear" />
			</div>
		</div>
		<div class="bottom_col">
		<h3><?php _e("Tags","bpdev");?></h3>
			<div class="recent-tags">										
			  <?php wp_tag_cloud('smallest=12&largest=24&number=30&orderby=count&order=RAND&unit=px'); ?>
			  <br class="clear" />
			</div>
		</div>
		<br class="clear" />
	</div><!--end of bottom content -->
	<br class="clear" />
</div><!-- end of featured footer -->