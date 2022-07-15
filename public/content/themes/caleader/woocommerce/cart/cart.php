<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php echo esc_html__( 'Product', 'caleader' ); ?></th>
				<th class="product-price"><?php echo esc_html__( 'Price', 'caleader' ); ?></th>
				<th class="product-quantity"><?php echo esc_html__( 'Quantity', 'caleader' ); ?></th>
				<th class="product-subtotal"><?php echo esc_html__( 'Subtotal', 'caleader' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
			<tr
				class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
				<td class="product-remove">
					<?php
								echo apply_filters(
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'caleader' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
					?>
				</td>
				<td class="product-thumbnail">
					<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					if ( isset( $cart_item['service_list'] ) ) {
						$thumbnail = get_the_post_thumbnail( $cart_item['product_id'] );
					}
					if ( ! $product_permalink ) {
						echo sprintf( __( '%s', 'caleader' ), $thumbnail );
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
					}
					?>
				</td>
				<td class="product-name" data-title="<?php echo esc_attr__( 'Product', 'caleader' ); ?>">
					<?php
					if ( ! $product_permalink ) {
						echo caleader_kses_basic( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
					} else {
						echo caleader_kses_basic( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
					}
								echo wc_get_formatted_cart_item_data( $cart_item );
					if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
						echo caleader_kses_basic( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'caleader' ) . '</p>', $product_id ) );
					}

					?>
				</td>
				<td class="product-price" data-title="<?php echo esc_attr__( 'Price', 'caleader' ); ?>">
					<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
				</td>
				<td class="product-quantity" data-title="<?php echo esc_attr__( 'Quantity', 'caleader' ); ?>">
					<?php
					if ( $_product->is_sold_individually() ) {
						$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
					} else {
						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							),
							$_product,
							false
						);
					}
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
					?>
				</td>
				<td class="product-subtotal" data-title="<?php echo esc_attr__( 'Subtotal', 'caleader' ); ?>">
					<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
					?>
				</td>
			</tr>
					<?php
				}
			}
			?>
			<?php do_action( 'woocommerce_cart_contents' ); ?>
			<tr>
				<td colspan="6" class="actions">
					<?php
					$add_class = '';
					if ( wc_coupons_enabled() ) {
						$add_class = 'col-md-6';
						?>
					<div class="coupon-custom col-md-6">
						<label for="coupon_code"><?php echo esc_html__( 'Coupon:', 'caleader' ); ?></label> <input
							type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
							placeholder="<?php echo esc_attr__( 'Coupon code', 'caleader' ); ?>" /> 

							<button
							type="submit" class="apply-coupon btn btn-invert" name="apply_coupon"
							value="<?php echo esc_attr__( 'Apply coupon', 'caleader' ); ?>"><?php echo esc_attr__( 'Apply coupon', 'caleader' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
					<?php } ?>
					<div class="up_cart <?php echo caleader_kses_basic( $add_class ); ?>">
						<button type="submit" class="btn btn-invert" name="update_cart"
							value="<?php echo esc_attr__( 'Update cart', 'caleader' ); ?>"><?php echo esc_attr__( 'Update cart', 'caleader' ); ?></button>
					</div>
					<?php do_action( 'woocommerce_cart_actions' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>
<?php do_action( 'woocommerce_after_cart' ); ?>
