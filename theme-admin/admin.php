<?php

////////////////////////////////////////////////////////////////////////////////
// theme option menu for buddycorp - june 2009
////////////////////////////////////////////////////////////////////////////////
//use settings api for storing values

class CosmicBuddyThemeAdmin {
    private $themename = 'Cosmic Buddy';
    private $themeversion = "1.0";
    private $shortname = "cb";
    private $shortprefix = "_cb_";
    
    private static $instance;
         
    private function __construct(){
    //add hooks here
        add_action('admin_menu', array($this,'theme_admin_register'));
     
    }
    
    public function get_instance(){
        if(!isset (self::$instance))
                self::$instance=new self();
        return self::$instance;
    }
    
    


    function get_theme_options_info(){
        $shortprefix=$this->shortprefix;
        $theme_options = array (
        array(
            "name" => __("Insert your logo full url here<br /><em>*you can upload your logo in <a href='media-new.php'>media panel</a> and copy paste the url here</em>"),
            "id" => $shortname . $shortprefix . "header_logo",
            "type" => "text",
            "std" => "",
        ),
        array(
            "name" => __("Insert your Top bar logo(164x30px) full url here<br /><em>*you can upload your logo in <a href='media-new.php'>media panel</a> and copy paste the url here</em>"),
            "id" => $shortname . $shortprefix . "topbar_logo",
            "type" => "text",
            "std" => "",
        ),
        array(
            "name" => __("Insert your Bottom Nav bar logo(164x30px) full url here<br /><em>*you can upload your logo in <a href='media-new.php'>media panel</a> and copy paste the url here</em>"),
            "id" => $shortname . $shortprefix . "bottombar_logo",
            "type" => "text",
            "std" => "",
        )
    );

        return $theme_options;
    }

    function theme_admin_options() {

            echo "<div id=\"theme-options\">";
    $themename=$this->themename;
    $shortname=$this->shortname;
    $theme_options=$this->get_theme_options_info();
   
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    ?>



            <h4><?php echo "$themename"; ?> <?php _e('Theme Options'); ?></h4>

            <form action="" method="post">
    <div class="options">


    <div class="option">

    <?php foreach ($theme_options as $value) { ?>

    <?php if($value['type'] == "text") { //and we don't check for other types as we don't have other types ?>

            <div class="description"><?php echo $value['name']; ?></div>
            <p><input name="<?php echo $value['id']; ?>"  id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

    <?php   } } ?>

    </div>

    </div>
    <p id="top-margin" class="save-p">
    <input name="save" type="submit" class="sbutton" value="<?php echo esc_attr(__('Save Options')); ?>" />

    <input name="reset" type="submit" class="sbutton" value="<?php echo esc_attr(__('Reset Options')); ?>" />
    <input type="hidden" name="action" value="save" />
    </p>
    </form>





    </div>

    <?php
    }

    function theme_admin_register() {
             $themename=$this->themename;
              $shortname=$this->shortname;
              $theme_options=$this->get_theme_options_info();
            if ( $_GET['page'] == "cb-theme-admin-options" ) {
                    if ( 'save' == $_REQUEST['action'] ) {
                            foreach ($theme_options as $value) {
                                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                                    foreach ($theme_options as $value) {
                                            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                                                    header("Location: themes.php?page=cb-theme-admin-options&saved=true");
                                    die;
                            } 
                    else if( 'reset' == $_REQUEST['action'] ) {
                                    foreach ($theme_options as $value) {
                                    delete_option( $value['id'] ); }
                                    header("Location: themes.php?page=cb-theme-admin-options&reset=true");
                                    die;
    }
    }
    add_theme_page(( __($themename.' Options')),  (__('Theme Options')),  'edit_themes', "cb-theme-admin-options", array($this,'theme_admin_options'));
    }


}

CosmicBuddyThemeAdmin::get_instance();
?>