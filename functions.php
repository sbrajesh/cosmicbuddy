<?php
/* Stop the theme from killing WordPress if BuddyPress is not enabled. */
if ( !class_exists( 'BP_Core_User' ) )
	return false;

class CosmicBuddyThemeHelper{
    private static $instance;
    
    private function __construct(){
        
        $this->include_files();//or you can call $this->include_files just makes no difference
        add_action( 'wp_enqueue_scripts', array( $this, 'load_js' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_css' ) );
       
        //a work around for admin panel buddybar
        add_action( 'admin_print_styles', array( $this, 'fix_buddybar_position' ) );
        
        //register widgetized sidebars
        
        add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
        
        add_action( 'after_setup_theme', array( $this, 'setup' ) );

        
    }
    /**
     * Factory method for singleton instance
     * @return CosmicBuddyThemeHelper
     */
    public static function get_instance(){
        if( !isset( self::$instance ) )
                self::$instance = new self();
        return self::$instance;
    }
    
    public function include_files(){
        //load theme admin functions
                /* Load the AJAX functions for the theme */
        require_once( TEMPLATEPATH . '/_inc/ajax.php' );
        //include library for unified search
        include_once( TEMPLATEPATH . '/lib/global-search.php' );	
        include_once( TEMPLATEPATH . '/lib/borrowed-bp-functions.php' );	

        if( is_admin() )
            include_once( TEMPLATEPATH . '/theme-admin/admin.php' );

    }
  
    public function setup(){
        
        $this->setup_nav();
        
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'cosmicbuddy' );
        
        $thumb_size = cb_get_thumb_size();
        
        set_post_thumbnail_size( $thumb_size['thumb']['width'],$thumb_size['thumb']['height'], true );
        add_image_size( 'single-post-thumbnail', $thumb_size['full']['width'],$thumb_size['full']['height'] ); // Permalink thumbnail size


    }
    public function setup_nav(){
        register_nav_menus( array(
                    'top-main-nav' => __( 'Top Main Navigation', "cb" ),
            ) );
        register_nav_menus( array(
                    'bottom-nav' => __( 'Footer Navigation Links', "cb" ),
           ) );
    }
    
    public function register_sidebars(){
       
        /* Register the widget columns */
        //for welcome section
        register_sidebar(  
                array( 
                    'name'          => 'Welcome Section',
                    'id'            => 'welcome-section',
                    'before_widget' => '<div id="%1$s" class=" box widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div>',
                    'before_title'  => '<h2 class="widgettitle">',
                    'after_title'   => '</h2>'
                ) 
        );
        //for homepage first section
        register_sidebar( 
                array( 
                    'name'          => 'Home Page First section',
                    'id'            => 'homepage-first-section',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h2 class="widgettitle">',
                    'after_title'   => '</h2><div class="widget-content">'
                ) 
        );
        register_sidebar( 
                array( 
                    'name'          => 'Home Page Main Column 1',
                    'id'            => 'homepage-main-col1',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h2 class="widgettitle">',
                    'after_title'   => '</h2><div class="widget-content">'
                ) 
        );
        register_sidebar( 
                array( 
                    'name'          => 'Homepage Main Column 2',
                    'id'            => 'homepage-main-col2',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h2 class="widgettitle">',
                    'after_title'   => '</h2><div class="widget-content">'
                ) 
        );
        //for homepage/register/activation page
        register_sidebar( array( 
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h3 class="widgettitle">',
                    'after_title'   => '</h3><div class="widget-content">'
                ) 
        );
        
        //for blog pages
        register_sidebar(array( 
                    'name'          => 'Blog Sidebar',
                    'id'            => 'blog-sidebar',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h3 class="widgettitle">',
                    'after_title'   => '</h3><div class="widget-content">'
                ) 
        );

        register_sidebar( array( 
                    'name'          => 'Profile Sideabr Top',
                    'id'            => 'profile-sidebar-top',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '<div class="clear"></div></div></div>',
                    'before_title'  => '<h3 class="widgettitle">',
                    'after_title'   => '</h3><div class="widget-content">'
                ) 
        );
    }


      /**
     * load javascript on the front end
     */
    public function load_js(){
            $template_dir = get_template_directory_uri();
            if( apply_filters( 'cb_has_overlayed_login', true ) )
                wp_enqueue_script( 'jquerytools',  $template_dir . '/_inc/jquery.tools.min.js', array( 'jquery' ) );
            
            wp_enqueue_script( 'dtheme-ajax-js', $template_dir . '/_inc/global.js', array( 'jquery') );

                // Add words that we need to use in JS to the end of the page so they can be translated and still used.
            $params = array(
                    'my_favs'           => __( 'My Favorites', 'cosmicbuddy' ),
                    'accepted'          => __( 'Accepted', 'cosmicbuddy' ),
                    'rejected'          => __( 'Rejected', 'cosmicbuddy' ),
                    'show_all_comments' => __( 'Show all comments for this thread', 'cosmicbuddy' ),
                    'show_all'          => __( 'Show all', 'cosmicbuddy' ),
                    'comments'          => __( 'comments', 'cosmicbuddy' ),
                    'close'             => __( 'Close', 'cosmicbuddy' ),
                    'mention_explain'   => sprintf( __( "%s is a unique identifier for %s that you can type into any message on this site. %s will be sent a notification and a link to your message any time you use it.", 'cosmicbuddy' ), '@' . bp_get_displayed_user_username(), bp_get_user_firstname( bp_get_displayed_user_fullname() ), bp_get_user_firstname( bp_get_displayed_user_fullname() ) )
            );
            wp_localize_script( 'dtheme-ajax-js', 'BP_DTheme', $params );

      
    }
    public function load_css(){
        
        wp_register_style( 'theme-css', get_stylesheet_uri() );
        wp_enqueue_style( 'theme-css' );
    }
    
    function fix_buddybar_position(){?>
    <style type="text/css">
        div#wp-admin-bar{
            position:fixed;
        }
    </style>
    <?php    
    }
}//end of helper class

CosmicBuddyThemeHelper::get_instance();


//global vars for logo, topbar logo and bottombar log
$cb_logo=get_option("cb_cb_header_logo");
$cb_topbar_logo=get_option("cb_cb_topbar_logo");
$cb_bottombar_logo=get_option("cb_cb_bottombar_logo");
//use default if logos are not set
if(empty($cb_logo))
	$cb_logo=get_stylesheet_directory_uri()."/_inc/images/logo-big.gif";
if(empty($cb_topbar_logo))
	$cb_topbar_logo=get_stylesheet_directory_uri()."/_inc/images/topbar_logo.gif";
if(empty($cb_bottombar_logo))
	$cb_bottombar_logo=get_stylesheet_directory_uri()."/_inc/images/bottombar_logo.gif";

/*** This was removed by Bp 1.2	*/
/**
 * add the blog-page & internal-page class to body 
 */
function cb_get_the_body_class( $wp_classes, $custom_classes ) {
		global $bp;

				
		if ( bp_is_blog_page() || bp_is_register_page() || bp_is_activation_page() )
			$bp_classes[] = 'blog-page';
		
		if ( !bp_is_blog_page() && !bp_is_register_page() && !bp_is_activation_page() )
			$bp_classes[] = 'internal-page';
				
	
		
 
		/* Merge WP classes with BP classes */
		$classes = array_merge( (array) $bp_classes, (array) $wp_classes );
		
		/* Remove any duplicates */
		$classes = array_unique( $classes );
		
		return apply_filters( 'bp_get_the_body_class', $classes, $bp_classes, $wp_classes, $custom_classes );
	}
	add_filter( 'body_class', 'cb_get_the_body_class', 11, 2 );




//add the login box in the footer as hidden
if(apply_filters("cb_has_overlayed_login",true))
    add_action("wp_footer","cb_include_login_box");

function cb_include_login_box(){
?>
<div class="welcomebar-wrap widget" id="login_box">
<?php if(apply_filters("cb_show_default_login_overlay",true)):?>
	<h3 class="widgettitle"><?php _e("Login Please","cb");?> </h3>
					
						<?php do_action( 'bp_before_sidebar_login_form' ) ?>

						<p id="login-text">
							<?php _e( 'To start connecting please log in first.', 'cb' ) ?>
							<?php if ( bp_get_signup_allowed() ) : ?>
								<?php printf( __( ' You can also <a href="%s" title="Create an account">create an account</a>.', 'cb' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?>
							<?php endif; ?>
						</p>

						<form name="login-form"  class="standard-form" action="<?php echo site_url('wp-login.php', 'login' );?>" method="post">
							<label><?php _e( 'Username', 'cb' ) ?><br />
                                                            <input type="text" name="log" id="sidebar-user-login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" tabindex="1" /></label>
							<br class="clear"/>
							<label><?php _e( 'Password', 'cb' ) ?><br />
                                                            <input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="2" /></label>
							<br class="clear"/>	
                                                        <p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="3"/> <?php _e( 'Remember Me', 'cb' ) ?></label></p>

							<?php do_action( 'bp_sidebar_login_form' ) ?>
							<br class="clear"/>
							<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e('Log In','cb'); ?>" tabindex="100" />
							<input type="hidden" name="testcookie" value="1" />
						<br class="clear"/>
						</form>

						<?php do_action( 'bp_after_sidebar_login_form' ) ?>
	
<?php endif;?>
<?php do_action("cb_login_overlay_content");?>
</div>
<?php
}
//support for recent profile visitors plugin if enabled
add_action("cb_after_profile_fields","cb_show_my_recent_visitor");//hook this to template
function cb_show_my_recent_visitor(){
    global $bp;
   if(!function_exists("visitors_is_active_visitor_recording"))
   return;

   if(!bp_is_my_profile()||!visitors_is_active_visitor_recording($bp->displayed_user->id))//show only for logged in users and on their Home if they have set a prefence of showing it
        return;
    $recent_visitors=visitors_get_recent_visitors();
   
   if(empty($recent_visitors))
       return;//if no visists yest, do not show at all
	   ?>
<div class='box recent-visitors'>
				
<div id="profile-activity" class='box-content'>
	<div class="bp-widget">
	<h4><?php _e("Recent Visitors","cb");?></h4>

<?php				
    
    foreach($recent_visitors as $visitor){
       echo visitors_build_visitor_html($visitor);
    }
?>
	</div>
  </div>
 </div> 
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
 * when footer navigation links are not assigned, let us suggest the user to add a menu with the links
 */
 function cb_footer_alt_menu(){?>
<ul id="bottom-nav-bar"><li><a href="<?php echo get_bloginfo('url').'/wp-admin/nav-menus.php'?>"><?php _e("Please add the Footer Navigation Links using Appearance->Menu in the dashboard","cb");?></a></li>
</ul>
<?php
     
 }
/*helper function*/
function cb_get_thumb_size(){

   $thumb_size=array('full'=>array('width'=>350,'height'=>350),'thumb'=>array('width'=>150,'height'=>150));
   return apply_filters("cb_get_post_thumb_sizes", $thumb_size);
}

 function cb_get_theme_option($option){
    return true;
}


/***extra new functions*/
/**
 * Includes sidebar in pages
 * Filter on cb_show_sidebar to hide it for specific component
 * @param type $name : name passed to get_sidebar
 */
function cb_get_sidebar($name){
   if(apply_filters("cb_show_sidebar",true)) //filter on this for specific page/component to hide the sidebar
       get_sidebar ($name);
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
        

function cb_main_nav_fallback( $args ) {
	$pages_args = array(
		'depth'      => 1,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
	$menu = wp_page_menu( $pages_args );
	$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul id="top-nav-bar">', '</ul><!-- #nav -->' ), $menu );
	echo $menu;

	do_action( 'bp_nav_items' );
}