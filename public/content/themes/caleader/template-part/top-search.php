<?php
$search_post_type = caleader_options( 'header_search_type' );

if ( ! isset( $search_post_type ) || $search_post_type == '' ) {
	$search_post_type = 'post';
}
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="tt-row-search">
		<?php if ( $search_post_type != 'post' ) { ?>
					<input type="hidden" name="post_type" value="<?php echo esc_attr( $search_post_type ); ?>">
		<?php } ?>
		<input type="text" class="tt-search-input" name="s" placeholder="<?php echo esc_attr__( 'Type your search request...', 'caleader' ); ?>" value="<?php echo get_search_query(); ?>">
		<button class="tt-btn-search" type="submit"></button>
		<button class="tt-btn-close icon-g-80"></button>
	</div>
</form>
