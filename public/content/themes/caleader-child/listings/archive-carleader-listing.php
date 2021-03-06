<?php
get_header();
global $wp_query;

$archive_layout = carleader_listings_option( 'archive_layout' );
$archive_style  = carleader_listings_option( 'archive_style' );
$layout_elector = carleader_listings_option( 'layout_elector' );
$page_name      = carleader_listings_option( 'archive_name' );
$archive_desc   = carleader_listings_option( 'archive_desc' );
$has_sidebar    = carleader_listings_option( 'has_sidebar' );
$breadcrumbs    = caleader_options( 'breadcrumbs' );
$page_url       = caleader_listing_get_url();
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

$page_url = caleader_listing_get_url();

$condition = isset($_GET['condition'])? $_GET['condition'] : 'ALL';

$condition = is_array($condition)? $condition[0] : $condition;

?>
<div class="tt-subpages-wrapper">
    <h1 class="tt-title"><?= strtoupper($condition) ?> <?php echo $page_name; ?></h1>
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

if($condition !== 'ALL') {
    $args = array(    
        'post_type' => 'carleader-listing',
        'meta_query' => array(
            ['key' => '_carleader_listing_condition', 'value' => $condition]
        )
    );
    
    $total_count = count(get_posts($args));
    if(!$total_count) {
        $has_sidebar = 0;
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
                                                        placeholder="<?php echo esc_html__( 'Search ???', 'caleader-listing' ); ?>"
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
                                    autocomplete="off" action="<?php echo $page_url . '/?layout=2'; ?>" method="GET"
                                    role="search">
                                </form>
                            </div>
                            <?php } ?>
                            <?php if(!in_array($wp_query->found_posts, [0, 1])) : ?>
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
                            <?php endif ?>
                            <?php

	$filter_vars = array();
	if ( isset( $_POST ) && ! empty( $_POST ) ) {
		$filter_vars = $_POST;
	} elseif ( isset( $_GET ) && ! empty( $_GET ) ) {
		$filter_vars = $_GET;
	}

	if ( isset( $filter_vars['s'] ) && $filter_vars['s'] == '' ) {
		unset( $filter_vars['s'] );
	}
	unset( $filter_vars['showstyle'] );
	unset( $filter_vars['layout'] );
	unset( $filter_vars['post_type'] );
	unset( $filter_vars['orderby'] );
	if ( isset( $filter_vars ) && ! empty( $filter_vars ) ) {
		?>
                            <ul class="tt-filter-value">
                                <?php 
		$min_price = '';
		$max_price = '';
		if ( isset( $filter_vars['min_price'] ) && $filter_vars['min_price'] != '' ) {
			$min_price = $filter_vars['min_price'];
		}
		if ( isset( $filter_vars['max_price'] ) && $filter_vars['max_price'] != '' ) {
			$max_price = $filter_vars['max_price'];
		}

		if(isset( $filter_vars['price'] ) && $filter_vars['price'] != ''){
			$min_price = price_val('min', '_carleader_listing_price');
			$max_price = $filter_vars['price'];
		}

		unset( $filter_vars['currency'] );
		unset( $filter_vars['min_price'] );
		unset( $filter_vars['max_price'] );
		unset( $filter_vars['price'] );
		foreach ( $filter_vars as $filter_var => $value ) {

			if ( is_array( $value ) && ! empty( $value ) ) {
				foreach ( $value as $k => $val ) {
					echo '<li class="tt-item"><a href="javascript:void(0)" class="var-filter" data-var_filter="' . $val . '" data-var_name="' . $filter_var . '">' . $val . '</a></li>';
				}
				?>
                                <?php
			} else {
				echo '<li class="tt-item"><a href="javascript:void(0)" class="var-filter">' . $value . '</a></li>';
			}
		} 
		if ( $min_price != '' && $max_price != '' ) { 
			echo '<li class="tt-item"><a href="javascript:void(0)" class="var-filter-price">' . carleader_listings_price( $min_price ) . " - " . carleader_listings_price( $max_price ) . '</a></li>';
		}
		?>
                            </ul>
                            <?php 
	}
	?>
    <?php        
    if (0 === $wp_query->found_posts) {        
        ?>
        <div class="no-result-wrapper text-center">
            <img src="<?= CARSADA_ASSETS_LIVE_URL ?>/images/listing/no-result.png" alt="" class="no-result-img">
            <p class="text-dark no-result-description">Sorry! No available cars</p>
            <a href="" class="btn btn-primary no-result">
                Go back to homepage
            </a>
        </div>
        <?php
    }

    ?>
    
                            <div id="tt-product-listing" class="tt-product-listing row 
	<?php
	if ( $archive_style == 'list' ) {
		echo 'tt-row-view';
	}
	?>
					">
                                <?php
    
	if ( have_posts() ) {
		$counter = 1;        
		while ( have_posts() ) {
			the_post();            
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