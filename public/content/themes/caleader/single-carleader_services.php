<?php get_header();
if ( function_exists( 'caleader_breadcrumb_custom' ) ) {
	caleader_breadcrumb_custom();
}
?>
<div class="container-inner section-wrapper-01">
	<div class="container">
		<div class="row flex-sm-row-reverse">
			<?php
			if ( is_active_sidebar( 'service_page_sideber' ) ) {
				?>
			<div class="col-12 col-lg-8 tt-typography-02">
				<?php
			} else {
				?>
				<div class="col-12 col-lg-12 tt-typography-02">
					<?php
			}
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
					<p>
						<?php echo get_the_post_thumbnail( get_the_ID(), 'caleader-services-full' ); ?>
						<p>
							<?php } ?>
							<div class="tt-block-title text-left tt-block-title-border">
								<h1 class="tt-title"><?php the_title(); ?></h1>
							</div>
							<?php the_content(); ?>
							<?php
				} // end while
			} // end if
			?>
							<!-- end post-->
				</div>
				<?php if ( is_active_sidebar( 'service_page_sideber' ) ) { ?>
				<div class="col-12 col-lg-4 asideColumn asideColumn-left">
					<?php

						dynamic_sidebar( 'service_page_sideber' );

					?>

				</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
	get_footer();
