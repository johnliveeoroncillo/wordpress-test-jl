<?php
global $post;
$display_name     = get_the_author_meta( 'display_name', $post->post_author );
$user_description = get_the_author_meta( 'user_description', $post->post_author );
$user_avatar      = get_avatar( $post->post_author, 133 );
$blog_author      = caleader_options( 'blog_author' );
$userfb_url       = get_theme_mod( 'userfb' );
$usertw_url       = get_theme_mod( 'usertw' );
$usergp_url       = get_theme_mod( 'usergp' );

if ( ! isset( $blog_author ) ) {
	$blog_author = true;
}
if ( $blog_author ) {
	if ( isset( $user_description ) && ! empty( $user_description ) ) {
		?>
	<div class="tt-personal-blog">
		<div class="tt-img">
		<?php echo wp_kses( $user_avatar, 'author_avatar' ); ?>
		</div>
		<div class="tt-description">
			<h6 class="tt-title"><?php echo caleader_kses_basic( ucfirst( $display_name ) ); ?></h6>
			<p>
		<?php echo caleader_kses_basic( $user_description ); ?>.
			</p>
			<ul class="tt-socialicon-02">
				<li><a href="<?php echo esc_url( $userfb_url ); ?>" target="_blank" class="icon-226234"></a></li>
				<li><a href="<?php echo esc_url( $usertw_url ); ?>" target="_blank" class="icon-8800"></a></li>
				<li><a href="<?php echo esc_url( $usergp_url ); ?>" target="_blank" class="icon-733613"></a></li>
			</ul>
		</div>
	</div>
		<?php
	}
}
