<?php
/*helper function*/
function cb_get_thumb_size(){

   $thumb_size = array( 
       'full'  => array(
            'width'     => 350,
            'height'    => 350
            ),
       'thumb'  => array(
            'width'     => 150,
            'height'    => 150
           )
       );
   
   return apply_filters( 'cb_get_post_thumb_sizes', $thumb_size );
   
}

 function cb_get_theme_option($option){
    return true;
}

/**
 * Main nav fallback
 * 
 * @param type $args
 */
function cb_main_nav_fallback( $args ) {
	$pages_args = array(
		'depth'      => 1,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
	$menu = wp_page_menu( $pages_args );
	$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul id="top-nav-bar">', '</ul><!-- #top-nav-bar -->' ), $menu );
	echo $menu;

	do_action( 'bp_nav_items' );
}

/**
 * when footer navigation links are not assigned, let us suggest the user to add a menu with the links
 */
function cb_footer_alt_menu(){?>
    <ul id="bottom-nav-bar"> <li>
            <a href="<?php echo get_bloginfo('url').'/wp-admin/nav-menus.php'?>"><?php _e("Please add the Footer Navigation Links using Appearance->Menu in the dashboard","cb");?></a></li>
    </ul>
    <?php
    
}