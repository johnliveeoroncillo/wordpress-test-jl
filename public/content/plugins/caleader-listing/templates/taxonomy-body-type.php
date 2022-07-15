<?php
get_header();
$archive_layout = carleader_listings_option( 'archive_layout' );
$archive_style  = carleader_listings_option( 'archive_style' );
$layout_elector = carleader_listings_option( 'layout_elector' );

$page_name    = carleader_listings_option( 'archive_name' );
$archive_desc = carleader_listings_option( 'archive_desc' );
$has_sidebar  = carleader_listings_option( 'has_sidebar' );
$breadcrumbs  = caleader_options( 'breadcrumbs' );
$page_url     = caleader_listing_get_url();
if ( ! isset( $page_name ) || $page_name == '' ) {
	$page_name = esc_html__( 'Inventory', 'caleader-listing' );
}
if ( ! isset( $archive_desc ) || $archive_desc == '' ) {
	$archive_desc = esc_html__( 'New and Used Inventory Listings:', 'caleader-listing' );
}
if ( ! isset( $has_sidebar ) || $has_sidebar == '' ) {
	$has_sidebar = 1;
}

if ( ! isset( $archive_style ) || $archive_style == '' ) {
	$archive_style = 'grid';
}

if ( ! isset( $layout_elector ) || $layout_elector == '' ) {
	$layout_elector = 1;
}

if ( isset( $_GET['showstyle'] ) ) {
	if ( $_GET['showstyle'] != '' ) {
		$archive_style = $_GET['showstyle'];
	}
}




?>
<div class="tt-subpages-wrapper">
	<h1 class="tt-title"><?php echo $page_name; ?></h1>
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
$sidebar = 1;

if ( isset( $archive_layout ) && $archive_layout != '' ) {
	$sidebar = $archive_layout;
}
if ( isset( $_GET['layout'] ) ) {
	if ( $_GET['layout'] == '2' ) {
		$sidebar = $_GET['layout'];
	}
}

if ( $sidebar == 1 ) {
	$class = 'col-lg-9 col-xl-9 col-md-12';
} else {
	$class = 'col-12';
}
if ( ! $has_sidebar ) {
	$class = 'col-lg-12 col-xl-12 col-md-12';
}

$current_term = get_queried_object();

$paged            = get_query_var( 'paged' );
$term_slug        = $current_term->slug;
	$taxonomyName = $current_term->taxonomy;
	$args         = array(
		'post_type' => 'carleader-listing',
		'paged'     => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'body-type',
				'field'    => 'slug',
				'terms'    => $current_term->name,
			),
		),
	);
	$loop         = new WP_Query( $args );

	?>
<div id="tt-pageContent">
	<div class="section-wrapper-03">
		<div class="container-inner">
			<div class="container">
				<div class="row">
					<?php if ( $has_sidebar ) { ?>
						<?php if ( $sidebar == 1 ) { ?>
					<div class="col-md-4 col-lg-3 col-xl-3 leftColumn tt-aside02 js-sticky-sidebar" id="aside-js">
						<?php } else { ?>
						<div class="col-md-4 col-lg-3 col-xl-3 leftColumn tt-aside02 desctop-no-sidebar" id="aside-js">

						<?php } ?>

							<div class="tt-content listings-search-filter">
						<?php
						if ( is_active_sidebar( 'caleader_list_widget' ) ) {
							dynamic_sidebar( 'caleader_list_widget' );
						}
						?>
								<div class="tt-wrapper-aside">
									<div class="tt-aside-box">
										<h3 class="tt-aside-title"><?php esc_html_e( 'Search', 'caleader-listing' ); ?>
										</h3>
										<div class="tt-content">
											<form role="search" method="get" class="tt-form-search tt-form-default"
												action="<?php echo $page_url; ?>">
												<label>
													<span
														class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'caleader-listing' ); ?>
													</span>
													<input type="search" class="search-field"
														placeholder="<?php echo esc_html__( 'Search …', 'caleader-listing' ); ?>"
														value="" name="s">
													<input type="hidden" name="post_type" value="carleader-listing" />
												</label>
												<button type="submit" class="btn"><i
														class="icon-musica-searcher"></i><?php esc_html_e( 'search', 'caleader-listing' ); ?></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
						<div class="<?php echo $class; ?>">
							<?php if ( $sidebar == 2 ) { ?>
							<div class="js-sticky-panel-wrap">
								<form class="tt-filters-fullwidth js-sticky-panel" id="tt-filters-fullwidth"
									autocomplete="off" action="<?php echo home_url( 'listings/?layout=2' ); ?>"
									method="GET" role="search">
								</form>
							</div>
							<?php } ?>
							<div class="tt-filters-options">
								<div class="tt-btn-toggle" id="tt-btn-toggle-js">
									<a href="#"></a>
								</div>
								<?php do_action( 'carleader_listings_before_listings_loop' ); ?>
								<?php
								if ( $layout_elector ) {
									?>
						<div class="tt-quantity">
							<a href="#" class="icon-grid 
									<?php
									if ( $archive_style == 'grid' ) {
										echo 'active';
									}
									?>
							" data-value="icon-listing"></a>
							<a href="#" class="tt-grid-switch icon-listing 
									<?php
									if ( $archive_style == 'list' ) {
										echo 'active';
									}
									?>
							"></a>
						</div>
								<?php } ?>
							</div>
							<ul class="tt-filter-value">
								<?php

								foreach ( $_GET as $key => $value ) {
									if ( $key == 'condition' ) {
										if ( is_array( $value ) ) {
											foreach ( $value as $k => $val ) {
												// code...
												echo '<li class="tt-item"><a href="#">' . $val . '</a></li>';
											}
										} else {
											echo '<li class="tt-item"><a href="#">' . $value . '</a></li>';
										}
									}
								}
								?>
							</ul>
							<div id="tt-product-listing" class="tt-product-listing row 
													<?php
													if ( $archive_style == 'list' ) {
														echo 'tt-row-view';
													}
													?>
													">
													<?php

													if ( $loop->have_posts() ) {
														$counter = 1;
														while ( $loop->have_posts() ) {
															$loop->the_post();
															do_action( 'carleader_listings_product_loop' );
														} // end while
													} // end if
													?>
							</div>
							<?php
							// paggination
							do_action( 'carleader_listings_after_listings_loop' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
