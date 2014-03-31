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
function cb_activity_filter_links( $args = false ) {
	echo cb_get_activity_filter_links( $args );//fix for bp activity filter issue with empty activities
}
function cb_get_activity_filter_links( $args = false ) {
        global $activities_template, $bp;

        $defaults = array(
                'style' => 'list'
        );

        $r = wp_parse_args( $args, $defaults );
        extract( $r, EXTR_SKIP );

        /* Fetch the names of components that have activity recorded in the DB */
        $components = BP_Activity_Activity::get_recorded_components();

        if ( !$components )
                return false;

        foreach ( (array) $components as $component ) {
                /* Skip the activity comment filter */
                if ( 'activity' == $component )
                        continue;

                if ( isset( $_GET['afilter'] ) && $component == $_GET['afilter'] )
                        $selected = ' class="selected"';
                else
                        unset($selected);

                $component = esc_attr( $component );

                switch ( $style ) {
                        case 'list':
                                $tag = 'li';
                                $before = '<li id="afilter-' . $component . '"' . $selected . '>';
                                $after = '</li>';
                        break;
                        case 'paragraph':
                                $tag = 'p';
                                $before = '<p id="afilter-' . $component . '"' . $selected . '>';
                                $after = '</p>';
                        break;
                        case 'span':
                                $tag = 'span';
                                $before = '<span id="afilter-' . $component . '"' . $selected . '>';
                                $after = '</span>';
                        break;
                }

                $link = add_query_arg( 'afilter', $component );
                $link = remove_query_arg( 'acpage' , $link );

                $link = apply_filters( 'bp_get_activity_filter_link_href', $link, $component );

                /* Make sure all core internal component names are translatable */
                $translatable_components = array( __( 'profile', 'cosmicbuddy'), __( 'friends', 'cosmicbuddy' ), __( 'groups', 'cosmicbuddy' ), __( 'status', 'cosmicbuddy' ), __( 'blogs', 'cosmicbuddy' ) );

                $component_links[] = $before . '<a href="' . esc_attr( $link ) . '">' . ucwords( __( $component, 'cosmicbuddy' ) ) . '</a>' . $after;
        }

        $link = remove_query_arg( 'afilter' , $link );

        if ( isset( $_GET['afilter'] ) )
                $component_links[] = '<' . $tag . ' id="afilter-clear"><a href="' . esc_attr( $link ) . '"">' . __( 'Clear Filter', 'cosmicbuddy' ) . '</a></' . $tag . '>';
        $links='';
        if(!empty($component_links))
                $links= implode( "\n", $component_links );
        return apply_filters( 'bp_get_activity_filter_links',$links );
}


/**
 * Includes sidebar in pages
 * Filter on cb_show_sidebar to hide it for specific component
 * @param type $name : name passed to get_sidebar
 */
function cb_get_sidebar($name){
   if( apply_filters( 'cb_show_sidebar', true ) ) //filter on this for specific page/component to hide the sidebar
       get_sidebar ( $name );
}



function cb_friends_filter_content() {
	$current_filter = bp_action_variable( 0 );

	switch ( $current_filter ) {
		case 'recently-active': default:
			
			 locate_template( array( 'members/single/friends/active-friends.php' ), true );
			 
			break;
		case 'newest':
			_e( 'Newest', 'cosmicbuddy' );
			break;
		case 'alphabetically':
			_e( 'Alphabetically', 'cosmicbuddy' );
			break;
	}
}
        

