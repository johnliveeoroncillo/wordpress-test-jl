<?php

/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>



	<?php if ( have_comments() ) : ?>
		<h6 class="tt-title-sub tt-title-top">
				<?php	printf( _nx( 'Comment (%s)', 'Comments (%s) ', get_comments_number(), 'comments title', 'caleader' ), number_format_i18n( get_comments_number() ) ); ?>
		</h6>

		<?php caleader_comment_nav(); ?>
			<div class="tt-comments-layout">
				<div class="tt-item">
				<?php
                wp_list_comments(array(
                    'style' => 'div',
                    'callback' => 'caleader_comments',
                    'short_ping' => true,
                ));
                ?>
				</div><!--.commentList -->
			</div>
		<?php caleader_comment_nav(); ?>

	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php echo esc_html__( 'Comments are closed.', 'caleader' ); ?></p>
	<?php endif;

    $user = wp_get_current_user();
    $user_identity = $user->display_name;
    $req = get_option( 'require_name_email' );
    $aria_req = $req ? " aria-required='true'" : '';
	$formargs = array(
		'id_form'           => 'commentform',
		'id_submit' => 'submit',
		'class_form'		=>	'',
		'title_reply'       => esc_html__( 'Leave a Reply','caleader' ),
		'title_reply_to'    => esc_html__( 'Leave a Reply to %s','caleader' ),
		'title_reply_before' => '<h6 id="reply-title" class="tt-title-sub tt-title-top comment-respond-title">',
		'title_reply_after'	=> '</h6>',
		'cancel_reply_link' => esc_html__('Cancel Reply', 'caleader'),
		'label_submit' => esc_html__('Post Comment', 'caleader'),
		'comment_notes_before' => '<p class="email-not-publish">' .
		esc_html__('Your email address will not be published.', 'caleader') . ( $req ? '<span class="required">*</span>' : '' ) .
		'</p>',
		'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s btn">%4$s</button>',
		'comment_field' => '<div class="row clearfix"><div class="col-lg-12 col-md-12 col-sm-12 form-group"><textarea id="comment" name="comment" placeholder="' . esc_attr__('Your Comments *', 'caleader') . '"  >' .
		'</textarea></div></div>',
		'must_log_in' => '<div>' .
		sprintf(
				wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'caleader'), array('a' => array('href' => array()))), wp_login_url(apply_filters('the_permalink', get_permalink()))
		) . '</div>',
		'logged_in_as' => '<div class="logged-in-as">' .
		sprintf(
				wp_kses(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="%4$s">Log out?</a>', 'caleader'), array('a' => array('href' => array()))), esc_url(admin_url('profile.php')), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink())), esc_attr__('Log out of this account', 'caleader')
		) . '</div>',
		
		'comment_notes_after' => '',
		'fields' => apply_filters('comment_form_default_fields', array(
			'author' =>
			'<div class="row clearfix"><div class="col-lg-6 col-md-6 col-sm-12  form-group">'
			. '<input id="author"  name="author" placeholder="' . esc_attr__('Your Name *', 'caleader') . '" type="text" value="' . esc_attr($commenter['comment_author']) .
			'" size="30"' . $aria_req . ' /></div>',
			'email' =>
			'<div class="col-lg-6 form-group">'
			. '<input id="email" name="email" type="text"  placeholder="' . esc_attr__('Your Email *', 'caleader') . '" value="' . esc_attr($commenter['comment_author_email']) .
			'" size="30"' . $aria_req . ' /></div></div>'
				)
		),
	);
	?>
	<div class="row">
	<div class="col-lg-10 col-xl-8">
		<div class="tt-form-default tt-form-review">
		<?php comment_form($formargs); ?> 
		</div>
	</div>
	</div>