<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	$gallery = get_post_meta( get_the_ID(), 'framework_gallery' );
	if ( ! empty( $gallery ) ) {
		?>
	<div class="tt-img">
		<div class="tt-slick-slider tt-slick-nav01"
			data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": true,}'>
			<?php
			foreach ( $gallery as $single ) {
				$link = wp_get_attachment_url( (int) $single );
				?>
			<div>
				<a href="<?php echo esc_url( the_permalink() ); ?>">
					<?php echo wp_get_attachment_image( $single, 'post-thumbnail' ); ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
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
