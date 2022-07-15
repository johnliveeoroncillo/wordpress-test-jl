<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="tt-layout">
		<div class="tt-meta">
			<?php
			$blog_author = caleader_options( 'blog_author' );

			if ( ! isset( $blog_author ) ) {
				$blog_author = true;
			}
			if ( $blog_author ) {
				?>
				<?php caleader_posted_author(); ?>
			<?php } ?>
		</div>
		<h3 class="tt-title"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
		<?php echo the_excerpt(); ?>
		<?php
		$quote = get_post_meta( get_the_ID(), 'framework_quote', true );
		if ( $quote ) {
			?>
		<blockquote class="tt-blockquote"><?php echo caleader_kses_basic( $quote ); ?></blockquote>
		<?php } ?>
		<div class="tt-layout-bottom">
			<?php
			$blog_date = caleader_options( 'blog_date' );

			if ( ! isset( $blog_date ) ) {
				$blog_date = true;
			}
			if ( $blog_date ) {
				?>
				<?php caleader_posted_on(); ?>
			<?php } ?>
			<a href="<?php echo esc_url( the_permalink() ); ?>" target="_blank" class="tt-icon-link"></a>
		</div>
		<?php

		wp_link_pages(
			array(
				'before'      => '<div class="tt-page-pagination single-post-pagination">',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'caleader' ) . ' </span>%',

			)
		);
		?>
	</div>
</div>
