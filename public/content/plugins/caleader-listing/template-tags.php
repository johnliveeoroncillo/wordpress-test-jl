<?php
function carleader_listings_template_path() {
	return apply_filters( 'carleader_listings_template_path', 'listings/' );
}
function carleader_listings_get_part( $part ) {
	if ( ! $part ) {
		return;
	}
	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		[
			trailingslashit( carleader_listings_template_path() ) . $part,
			$part,
		]
	);

	// Get template from plugin directory
	if ( ! $template ) {
		$dirs = apply_filters(
			'carleader_listings_template_directory',
			[
				CARLEADER_LISTING_PLUGIN_DIR . 'templates/',
			]
		);

		foreach ( $dirs as $dir ) {
			if ( file_exists( trailingslashit( $dir ) . $part ) ) {
				$template = $dir . $part;
			}
		}
	}
	if ( $template ) {
		include $template;
	}
}
function carleader_listings_productLoop() {
	 carleader_listings_get_part( 'car-products.php' );
}
function carleader_listings_pagination() {
	carleader_listings_get_part( 'pagination.php' );
}
function carleader_listings_ordering() {
	carleader_listings_get_part( 'loop/orderby.php' );
}
function carleader_listings_searchBox() {
	carleader_listings_get_part( 'loop/search-form.php' );
}
function carleader_listings_cart_button( $price, $dataId, $qntyty, $productId, $sku, $title ) {
	$add_cart_text = carleader_listings_option( 'add_cart_text' );
	if ( ! isset( $add_cart_text ) || $add_cart_text == '' ) {
		$add_cart_text = esc_html__( 'Add to Cart', 'caleader-listing' );
	}

	if (class_exists('WOOCS')) {
        global $WOOCS;
		$price=$WOOCS->woocs_exchange_value($price);
    }

	?>
<input type="hidden" class="open-cart-inp" value="<?php echo carleader_listings_option( 'open_cart' ); ?>">
<a href="javascript:void(0)" class="btn btn-xl add-to-cart-custom" data-price="<?php echo $price; ?>"
    data-id="<?php echo $dataId; ?>" data-quantity="<?php echo $qntyty; ?>" data-product_id="<?php echo $productId; ?>"
    data-product_sku="<?php echo $sku; ?>" data-service-title="<?php echo $title; ?>" id="target-btn-1"><i
        class="added-class"></i><?php echo $add_cart_text; ?></a>
<?php
}

function caleader_listings_getpost_type( &$address_post_type ) {
		$address_post_type = 'carleader-listing';
}

function caleader_listings_checkpost_type( &$address_post_type ) {
	if ( is_post_type_archive( 'carleader-listing' ) ) {
		$address_post_type = true;
	} else {
		$address_post_type = false;
	}
}

function caleader_listings_checkoption( &$check_opt ) {
	if ( function_exists( 'carleader_listings_option' ) ) {
		$check_opt = true;
	} else {
		$check_opt = false;
	}
}