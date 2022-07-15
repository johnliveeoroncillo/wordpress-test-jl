<?php get_header();
$blog_breadcrumbs = caleader_options( 'blog_breadcrumbs' );
$breadcrumbs      = caleader_options( 'breadcrumbs' );
if ( ! is_front_page() && $blog_breadcrumbs ) {
	?>
<div class="tt-subpages-wrapper">
	<h1 class="tt-title"><?php echo esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ); ?></h1>
	<?php if ( $breadcrumbs ) { ?>
	<div class="tt-breadcrumb">
		<ul>
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</ul>
	</div>
	<?php } ?>
</div>
	<?php
}
?>
<?php
if ( is_active_sidebar( 'blog_sideber' ) ) {
	$leftclass   = 'col-sm-12 col-md-8 col-lg-9 blog-center-right blog-area';
	$rightclass  = 'col-sm-12 col-md-4 col-lg-3 rightColumn';
	$has_sidebar = true;
} else {
	$leftclass   = 'col-sm-12 col-md-12 col-lg-12 blog-center-right blog-area';
	$rightclass  = '';
	$has_sidebar = false;
}
?>

<div id="tt-pageContent">
	<div class="section-wrapper-01">
		<div class="container-indent">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $leftclass ); ?>">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
											<?php if ( has_post_thumbnail() ) { ?>
						<div class="tt-singlepost-img">
												<?php echo get_the_post_thumbnail(); ?>
						</div>
											<?php } ?>
						<div class="tt-single-post">
							<div class="singlepost-indent">
								<div class="singlepost-wrapper">
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
									<h2 class="tt-title"><?php the_title(); ?></h2>
									<?php the_content(); ?>
									<?php
									wp_link_pages(
										array(
											'before' => '<div class="tt-page-pagination single-post-pagination">',
											'after'  => '</div>',
										)
									);
									?>
									<?php if ( has_tag() ) { ?>
									<div class="row single-indent-top align-items-center">
										<div class="col-auto col-12 col-lg-9">
											<?php caleader_entry_footer(); ?>
										</div>
										<?php
										$social_share = get_theme_mod( 'social_share' );
										if ( $social_share == 1 ) {
											caleader_post_social_share();
										}
										?>
									</div>
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
									</div>
								</div>
							</div>
						</div>
						<div class="singlepost-indent post-commnet-are-me">
							<?php get_template_part( 'post-formats/author', 'box' ); ?>
							<?php if ( get_comments_number() ) { ?>
							<div class="have-for-comment"></div>
							<?php } else { ?>
							<div class="have-no-for-comment"></div>
							<?php } ?>
							<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>
						</div>

											<?php
						endwhile;
						?>
					</div>
					<?php if ( $has_sidebar ) { ?>
					<div class="divider divider-lg d-block d-md-none"></div>
					<div class="<?php echo esc_attr( $rightclass ); ?> ">
						<?php get_sidebar(); ?>
					</div>
					<?php } ?>
				</div><!-- end of row-->
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
