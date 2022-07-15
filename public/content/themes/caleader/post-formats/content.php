<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<?php
	if ( has_post_thumbnail() ) {
		?>
	<div class="tt-img">
		<?php
		$thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
		printf( '<a href="%s" data-featherlight="image">', $thumbnail_url );
		the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) );
		echo '</a>';
		?>
	</div>
		<?php
	}
	?>


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
