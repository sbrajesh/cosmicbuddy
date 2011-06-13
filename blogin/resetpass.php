<?php get_header(); ?>
<div id="container">
<div id="contents">
<?php do_action( 'bp_before_branded_login' ) ?>
	<div id="content">
	<div class="widget">
	<div class="widgettitle"><?php _e("Resetting Password!");?></div>
		<div class="widget-content">
			<?php do_action( 'template_notices' ) ?>
                 <form name="lostpasswordform" id="lostpasswordform" action="<?php echo site_url('resetpass', 'login_post') ?>" method="post">
                          <p>
                               <label><?php _e('Username or E-mail:') ?><br />
                                 <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" tabindex="10" /></label>
                           </p>
                        <?php do_action('lostpassword_form'); ?>
                                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Get New Password'); ?>" tabindex="100" /></p>
                        </form>

                        <p id="nav">
                        <?php if (get_option('users_can_register')) : ?>
                            <a href="<?php echo site_url(BP_LOGIN_SLUG, 'login') ?>"><?php _e('Log in') ?></a> |
                        <a href="<?php echo site_url(BP_REGISTER_SLUG, 'login') ?>"><?php _e('Register') ?></a>
                        <?php else : ?>
                        <a href="<?php echo site_url(BP_LOGIN_SLUG, 'login') ?>"><?php _e('Log in') ?></a>
                        <?php endif; ?>
                        </p>
					<script type="text/javascript">
                        try{document.getElementById('user_login').focus();}catch(e){}
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
