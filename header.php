<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
	<head >
		<meta  charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php bp_head(); ?>
		<?php wp_head(); ?>

	</head>

<body <?php body_class() ?> id="cosmicbuddy">
   <div id="page">
       <div id="top-bar">
        <a id="top-bar-logo" href="<?php bp_root_domain();?>"><img src="<?php global $cb_topbar_logo;echo $cb_topbar_logo;  ?>" alt="logo" /> </a>
        <!-- top navigation -->
		<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'top-nav-bar', 'theme_location' => 'primary', 'fallback_cb' => 'cb_main_nav_fallback' ) ); ?>
		
		<!-- end of top navigation -->
		<div id="search-user-bar">
			
	        <div class='user-info'>
			<?php if(is_user_logged_in()):?>
			<?php bp_loggedin_user_avatar( 'width=20&height=20' ) ?> &nbsp; <?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?>/ <a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Log Out', 'buddypress' ) ?></a>

	         <?php else:?>
				
					<a href="<?php echo site_url('wp-login.php','login');?>" id="login-link"><?php _e("Login","cb");?></a> 
					<?php if ( bp_get_signup_allowed() ) : ?>
					|&nbsp;<a href="<?php echo bp_signup_page() ?>"><?php _e("Signup","cb");?></a>
					<?php endif;?>
			<?php endif;?>
	        </div>

		</div><!--end of user/search bar -->
         <div class="clear" ></div>
       </div><!-- end of top menu bar -->
	   <?php if(bp_is_blog_page()):?>
		   <div id="top-banner">
		   <a href="<?php bp_root_domain();?>"><img src="<?php global $cb_logo; echo $cb_logo;?>" alt="Logo" /></a>
		   
		   </div>
	  <?php endif;?> 
        <!--end of top bar -->
        <!--may be header can fit here -->
