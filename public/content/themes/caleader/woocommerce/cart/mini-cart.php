<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 5.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="tt-search-results menu-cart-item">
	<ul>
		<?php if ( ! WC()->cart->is_empty() ) : ?>
			<?php do_action( 'woocommerce_before_mini_cart_contents' ); ?>
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					if ( isset( $cart_item['service_list'] ) ) {
						$thumbnail = get_the_post_thumbnail( $cart_item['product_id'] );
					}
					?>
		<li class="item_in_cart">

			<div class="thumbnail">
					<?php
					if ( ! $product_permalink ) {
						echo caleader_kses_basic( $thumbnail );
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
					}
					?>
			</div>
			<div class="tt-description">
				<h3 class="tt-title">
					<?php
					if ( ! $product_permalink ) {
						echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
					} else {
						echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
					}

											// Meta data
											echo wc_get_formatted_cart_item_data( $cart_item );

											// Backorder notification
					if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
						echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'caleader' ) . '</p>';
					}
					?>
				</h3>
				<div class="price">
					<?php
						echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
				</div>
			</div>
					<?php
					if ( isset( $cart_item['service_list'] ) ) {
						$product_id = '';
					}

					?>
					<?php
						echo apply_filters(
							'woocommerce_cart_item_remove_link',
							sprintf(
								__( '<a href="javascript:void(0)" class="icon-close remove" aria-label="%1$s" data-product_sku="%2$s"  data-pro_id="%3$s" data-cart_item_key="%4$s"></a>', 'caleader' ),
								esc_attr__( 'Remove this item', 'caleader' ),
								esc_attr( $_product->get_sku() ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key )
							)
						);
					?>
		</li>
					<?php
				}
			}
			?>
			<?php do_action( 'woocommerce_mini_cart_contents' ); ?>
		<?php else : ?>
		<li class="empty"><?php echo esc_html__( 'No products in the cart .', 'caleader' ); ?></li>
		<?php endif; ?>
	</ul>
</div>
<?php if ( ! WC()->cart->is_empty() ) : ?>
<div class="header-cart-total">
	<div class="pull-left price-total"><?php echo esc_html__( 'Total', 'caleader' ); ?>:</div>
	<div class="pull-right tt-price"> <?php echo WC()->cart->get_cart_subtotal(); ?></div>
</div>
	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
<div class="header-checkout-bton">
	<p class="buttons">
		<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
	</p>
</div>
	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
<?php endif; ?>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
