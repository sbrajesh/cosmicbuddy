<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bp_page_title() ?></title>
		<?php do_action( 'bp_head' ) ?>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

		<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>
		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>

<body <?php body_class() ?> id="cosmicbuddy">
   <div id="page">
       <div id="top-bar">
        <a id="top-bar-logo" href="<?php bp_root_domain();?>"><img src="<?php global $cb_topbar_logo;echo $cb_topbar_logo;  ?>" alt="logo" /> </a>
        <!-- top navigation -->
		<ul id="top-nav-bar">
				<li<?php if ( bp_is_front_page() ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo get_option('home') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?>
					</a>
				</li>
				
				<li<?php if ( is_page( 'blog' )||is_single()||is_search()||is_archive() ) : ?> class="selected"<?php endif; ?>><a href="<?php echo get_option('home') ?>/blog" title="<?php _e( 'Blog', 'buddypress' ) ?>"><?php _e( 'Blog', 'buddypress' ) ?></a></li>
				<li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>><a href="<?php echo get_option('home') ?>/<?php echo BP_MEMBERS_SLUG ?>" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a></li>

				<?php if ( bp_is_active( 'groups' ) ) : ?>
					<li<?php if ( bp_is_page( BP_GROUPS_SLUG ) ) : ?> class="selected"<?php endif; ?>><a href="<?php echo get_option('home') ?>/<?php echo BP_GROUPS_SLUG ?>" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a></li>
				<?php endif; ?>

				<?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
					<li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>><a href="<?php echo get_option('home') ?>/<?php echo BP_FORUMS_SLUG ?>" title="<?php _e( 'Forums', 'buddypress' ) ?>"><?php _e( 'Forums', 'buddypress' ) ?></a></li>
				<?php endif; ?>
				
				<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
					<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
						<a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'buddypress' ) ?>"><?php _e( 'Blogs', 'buddypress' ) ?></a>
					</li>
				<?php endif; ?>

				<?php do_action( 'bp_nav_items' ); ?>
        </ul>
		<!-- end of top navigation -->
		<div id="search-user-bar">
			
	        <div class='user-info'>
			<?php if(is_user_logged_in()):?>
			<?php bp_loggedin_user_avatar( 'width=20&height=20' ) ?> &nbsp; <?php bp_loggedinuser_link() ?> / <?php bp_log_out_link() ?>
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
