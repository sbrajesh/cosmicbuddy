<?php get_header(); ?>
<div id="container">
<div id="contents">
<?php do_action( 'bp_before_branded_login' ) ?>
	<div id="content">
	<div class="widget">
	<div class="widgettitle"><?php _e("Login! Please","cb");?></div>
		<div class="widget-content">
			<?php do_action( 'template_notices' ) ?>
			              <?php do_action( 'template_notices' ) ?>
			  <?php do_action('login_form_login');?>
					<!-- while changing this page, just make sure 2 things, keep the input names in form same -->
						<form name="loginform" id="loginform" action="<?php echo site_url('login', 'login_post') ?>" method="post">
                             <p>
                               <label><?php _e('Username') ?><br />
									<input type="text" name="log" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" tabindex="10" /></label>
                              </p>
                              <p>
                                <label><?php _e('Password') ?><br />
                                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
                              </p>
                               <?php do_action('login_form'); ?>
                               <p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> <?php esc_attr_e('Remember Me'); ?></label></p>
                                <p class="submit">
                                 <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Log In'); ?>" tabindex="100" />
                               <?php	if ( $interim_login ) { ?>
                                           <input type="hidden" name="interim-login" value="1" />
                                 <?php	} else { ?>
                                                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect_to); ?>" />
                                <?php 	} ?>
                                                    <input type="hidden" name="testcookie" value="1" />
                                    </p>
                                 </form>
                                

                                 <?php if ( !$interim_login ) { ?>
                                    <p id="nav">
                                        <?php if (get_option('users_can_register')) : ?>
                                            <a href="<?php echo site_url(BP_REGISTER_SLUG, 'login') ?>"><?php _e('Register') ?></a> |
                                        <?php endif;?>
                                       <a href="<?php echo bl_get_reset_pass_link() ?>" title="<?php _e('Password Lost and Found') ?>"><?php _e('Lost your password?') ?></a>
                                                           
                                    </p>
                                    <?php } ?>
                                    

                                    <script type="text/javascript">
                                    <?php if ( $user_login || $interim_login ) { ?>
                                    setTimeout( function(){ try{
                                    d = document.getElementById('user_pass');
                                    d.value = '';
                                    d.focus();
                                    } catch(e){}
                                    }, 200);
                                    <?php } else { ?>
                                    try{document.getElementById('user_login').focus();}catch(e){}
                                    <?php } ?>
                                    </script>


					

			<br class="clear" />
		</div>
	

	</div>
	<?php do_action( 'bp_after_branded_login' ) ?>
	</div>
	<?php get_sidebar("register");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
