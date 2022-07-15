<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li class="tt-product-aside">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<div class="tt-img">
		<a
			href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo sprintf( __( '%s', 'caleader' ), $product->get_image() ); ?></a>
	</div>
	<div class="tt-description">
		<h6 class="tt-title">
			<a
				href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo caleader_kses_basic( $product->get_name() ); ?></a>
		</h6>
		<div class="tt-rating">
			<i class="icon-star-empty"></i>
			<i class="icon-star-empty"></i>
			<i class="icon-star-empty"></i>
			<i class="icon-star-empty"></i>
			<i class="icon-star-empty"></i>
		</div>
		<div class="tt-price"><?php echo sprintf( __( '%s', 'caleader' ), $product->get_price_html() ); ?></div>
	</div>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>