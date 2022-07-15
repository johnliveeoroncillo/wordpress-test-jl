<?php
if ( ! function_exists( 'woocommerce_get_sidebar' ) ) {

	function woocommerce_get_sidebar() {
		if ( ! is_product() ) {
			dynamic_sidebar( 'woo_shop_sideber' );
		}
	}
}

if ( ! function_exists( 'woocommerce_pagination' ) ) {

	function woocommerce_pagination( $a = false ) {
		if ( ! $a ) {
			wc_get_template( 'loop/pagination.php' );
		} else {
			wc_get_template( 'loop/pagination-top.php' );
		}
	}
}

if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {

	function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn wc-forward">' . esc_html__( 'View cart', 'caleader' ) . '</a>';
	}
}
if ( ! function_exists( 'woocommerce_widget_shopping_cart_proceed_to_checkout' ) ) {

	function woocommerce_widget_shopping_cart_proceed_to_checkout() {
		echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-invert checkout wc-forward">' . esc_html__( 'Checkout', 'caleader' ) . '</a>';
	}
}

/*---Move Product Title*/

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );


remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );



function woocommerce_template_loop_product_title() {
	global $product;
	$title_info = get_post_meta( $product->get_id(), 'title_info', true );
	?>
<h2 class="tt-title"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
	<div class="tt-title-info">
	<?php echo esc_html( $title_info ); ?>
</div>
	<?php
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 11 );


remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 19 );

add_filter( 'woocommerce_checkout_fields', 'wokiee_billing_checkout_fields', 20, 1 );
function wokiee_billing_checkout_fields( $fields ) {
	$fields['billing']['billing_phone']['placeholder'] = esc_html__('Phone','caleader');
	$fields['billing']['billing_email']['placeholder'] = esc_html__('Email','caleader');
	return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'wokiee_default_address_checkout_fields', 20, 1 );
function wokiee_default_address_checkout_fields( $address_fields ) {
	$address_fields['first_name']['placeholder'] = esc_html__('First name','caleader');
	$address_fields['last_name']['placeholder']  = esc_html__('Last name','caleader');
	$address_fields['company']['placeholder']    = esc_html__('Company name (optional)','caleader');
	$address_fields['address_1']['placeholder']  = esc_html__('Street address','caleader');
	$address_fields['postcode']['placeholder']   = esc_html__('Postcode / ZIP (optional)','caleader');
	$address_fields['city']['placeholder']       = esc_html__('Town / City','caleader');
	return $address_fields;
}



// WooCommerce Checkout Fields Hook
add_filter( 'woocommerce_checkout_fields', 'caleader_wc_checkout_fields_no_label' );

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function caleader_wc_checkout_fields_no_label( $fields ) {
	// loop by category
	foreach ( $fields as $category => $value ) {
		// loop by fields
		foreach ( $fields[ $category ] as $field => $property ) {
			// remove label property
			unset( $fields[ $category ][ $field ]['label'] );
		}
	}
	return $fields;
}

add_action( 'woocommerce_product_options_general_product_data', 'caleader_product_options' );
function caleader_product_options() {
	echo '<div class="options_group">';

	$field = array(
		'id'        => 'title_info',
		'label'     => esc_html__( 'Extra Product Info', 'caleader' ),
		'data_type' => 'info',
	);

	  woocommerce_wp_text_input( $field );

	echo '</div>';

}


add_action( 'woocommerce_process_product_meta', 'caleader_product_save_fields', 10, 2 );
function caleader_product_save_fields( $id, $post ) {
	if ( ! empty( $_POST['title_info'] ) ) {
		update_post_meta( $id, 'title_info', $_POST['title_info'] );
	} else {
		delete_post_meta( $id, 'title_info' );
	}

}