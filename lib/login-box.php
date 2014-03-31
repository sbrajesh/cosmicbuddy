<?php

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