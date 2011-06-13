<div id="footer">
         <div class='lc'></div>
         <div id="bottom-nav">
                <a id="bottom-nav-logo" href="<?php bp_root_domain();?>"><img src="<?php global $cb_bottombar_logo;echo $cb_bottombar_logo;?>"  alt='logo'/> </a>
        
                <?php wp_nav_menu( array( 'container_class' => '','container'=>'', 'theme_location' => 'bottom-nav','menu_id'=>'bottom-nav-bar',"fallback_cb"=>"cb_footer_alt_menu" ) );?>
                    
                <div id='credits'>
           	   <a href="http://BuddyDev.com/themes/cosmic-buddy" title="Cosmic Buddy Theme">Cosmic Buddy</a>
                </div>
                <div class="clear" ></div>
          </div>
	  <div class='rc'></div>
	  <br class="clear" />
</div>
        <!--footer ends here -->
</div>
   <!--end of page div -->
<?php wp_footer();?>
</body>

</html>