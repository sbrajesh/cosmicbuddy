<div id="comments"><h3><?php comments_number(__('No Comments Yet - be the First!','bpmag'), __('One Comment So Far...','bpmag'),__('% Comments Already!','bpmag' ));?></h3>	

<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (__('Please do not load this page directly. Thanks!','bpmag'));
if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.",'bpmag');?></p>
<?php
	return;
}

// add a microid to all the comments
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;	
}
add_filter('comment_class','comment_add_microid');

// show the comments
if ( have_comments() ) : ?>
	
	<ol class="commentlist" id="singlecomments">	
	<?php wp_list_comments(array('avatar_size'=>64, 'reply_text'=>__('Reply','bpmag'))); ?>
	</ol>
	
	
	
	
	
	
	<div class="navigation">
		<div class="alignleft old"><?php previous_comments_link(__('older comments','bpmag')) ?></div>
		<div class="alignright new"><?php next_comments_link(__('newer comments','bpmag')) ?></div>
	</div>


	
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) :
		// If comments are open, but there are no comments.
	else : 
		// comments are closed 
	endif;
endif; 

if ('open' == $post-> comment_status) : 

// show the form
?>
<div id="respond"><h3 id="response-title"><?php comment_form_title(); ?></h3>
<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>



<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p><?php echo sprintf(__("You must be <a href='%s'>login</a>  to post a comment.",'bpmag'),site_url('wp-login.php','login')."?redirect_to=".urlencode(get_permalink()));?></p>

<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php echo sprintf(__("Logged in as %s","bpmag"),bp_core_get_userlink($user_ID));?></a>.
<a href="<?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?>" title="Log out of this account"><?php _e("Logout","bpmag");?> &raquo;</a></p>

<?php else : ?>
<div class="comment-form-labels"><?php _e("Name","bpmag");?> <small><?php if ($req) echo "[*]"; ?></small></div>
<p><input type="text" name="author" id="author"  size="50" value="<?php echo $comment_author; ?>" class="comment-form-input-fields"  tabindex="1" /></p>

<div class="comment-form-labels"><?php _e("Email","bpmag");?> <small> <?php if ($req) echo "[*]"; ?></small></div>
<p><input type="text" name="email" id="email"  size="50" value="<?php echo $comment_author_email; ?>" class="comment-form-input-fields" tabindex="2" /> </p>

<div class="comment-form-labels"><?php _e("Website","bpmag");?> <small><?php _e("Optional","bpmag");?></small></div>
<p><input type="text" name="url" id="url"  size="50" value="<?php echo $comment_author_url; ?>" class="comment-form-input-fields"  tabindex="3" /></p>

<?php endif; ?>

<div>
<?php comment_id_fields(); ?>
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" /></div>

<div class="comment-form-labels"><?php _e("Comment","bpmag");?> <small>[*]</small></div>
<p><textarea name="comment" id="comment" class="comment-form-input-fields"  cols="65" rows="15" tabindex="4"></textarea></p>

<?php if (get_option("comment_moderation") == "1") { ?>
 <p><small><strong><?php _e("Please note:","bpmag");?></strong> <?php _e("Comment moderation is enabled and may delay your comment. There is no need to resubmit your comment.","bpmag");?></small></p>
<?php } ?>

<p><input name="submit" type="submit" id="submit" class="send-comment" tabindex="5" value="Submit" /></p>
<?php do_action('comment_form', $post->ID); ?>
<p class='required-desc'><?php _e("Please Note,The fields marked as * are required fields*","bpmag");?></p>
</form>
<?php endif; ?>
</div>
<?php endif; ?>
</div>