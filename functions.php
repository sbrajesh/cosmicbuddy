<?php
/* Stop the theme from killing WordPress if BuddyPress is not enabled. */
if ( !class_exists( 'BP_Core_User' ) )
	return false;

class CosmicBuddyThemeHelper{
    
    private static $instance;
    
    private function __construct(){
        
        //or you can call $this->include_files just makes no difference
        add_action( 'wp_enqueue_scripts', array( $this, 'load_js' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_css' ) );
       
     
        
        //register widgetized sidebars
        
        add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
        
        add_action( 'after_setup_theme', array( $this, 'setup' ) );

        add_filter( 'body_class', array( $this, 'filter_body_class' ), 11, 2 );
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
    

    public function setup(){
        $this->load();
        
        $this->setup_nav();
        
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'cosmicbuddy' );
        
        $thumb_size = cb_get_thumb_size();
        
        set_post_thumbnail_size( $thumb_size['thumb']['width'],$thumb_size['thumb']['height'], true );
        add_image_size( 'single-post-thumbnail', $thumb_size['full']['width'],$thumb_size['full']['height'] ); // Permalink thumbnail size


    }
    /**
     * Load required files
     */
    public function load(){
        
        $files = array(
                'lib/template.php',
                'lib/compat.php',
                'lib/login-box.php',
                '_inc/ajax.php',
                'lib/global-search.php',
                
        );
        
        if( is_admin() )
            $files[] = 'theme-admin/admin.php';
        
        $path = get_template_directory();
        
        foreach( $files as $file )
            require_once $path . '/' . $file;
       
       

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
    
    function filter_body_class( $wp_classes, $custom_classes ) {
				
        if ( bp_is_blog_page() || bp_is_register_page() || bp_is_activation_page() )
                $wp_classes[] = 'blog-page';

        if ( !bp_is_blog_page() && !bp_is_register_page() && !bp_is_activation_page() )
                $wp_classes[] = 'internal-page';


        return $wp_classes ;
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

