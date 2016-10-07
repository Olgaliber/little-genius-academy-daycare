<?php




	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','vcard'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div class="comment_part">
	<h4><?php	printf( _n( 'One Comment to %2$s', '%1$s Coments%2$s', get_comments_number() ),
									number_format_i18n( get_comments_number() ), '' ); ?></h4></div>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<div class="col-sm-12 blg-sin-post-cmntpart2">
	<?php wp_list_comments('callback=reversal_comment');?>
	</div>

	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','vcard'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

<h4><?php comment_form_title( __('Leave a Comments','vcard'), __('Leave A Comment to %s','vcard' ) ); ?></h4>

<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" class="contact-form" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account'); ?>"><?php _e('Log out &raquo;','vcard'); ?></a></p>

<?php else : ?>
<div class="row custom-contact">
	<div class="col-md-4">
<p><input class="form-control blg-in-n"  placeholder="Your name here" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
	
	
<p><input class="form-control blg-in-e"  placeholder="Your email here" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
	


	
<p><input class="form-control blg-in-w"  placeholder="Your site" type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
</p>
	</div>


<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>','vcard'), allowed_tags()); ?></small></p>-->

	<div class="col-md-8">
<p><textarea class="form-control" rows="6" name="comment" id="comment" cols="100" tabindex="4" placeholder="<?php echo __('Message...', 'vcard'); ?>"></textarea></p>
	



	<div class="contact1">
<p align="center"><input class="blg-submit" name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Send Message'); ?>" />
<?php comment_id_fields(); ?>
</p>
	</div>
	</div>
</div>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
