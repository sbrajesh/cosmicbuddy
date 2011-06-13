<?php if(bp_is_home()): //show option bar only when user is at his/her profile?>
<?php do_action( 'bp_before_options_bar' ) ?>
	<?php do_action( 'bp_inside_before_options_bar' ) ?>
		<ul id="options-nav">
			<?php bp_get_options_nav() ?>
		</ul>
	
	<?php do_action( 'bp_inside_after_options_bar' ) ?>
	
<div class="clear" >
</div>

<?php do_action( 'bp_after_options_bar' ) ?>
<?php endif;?>