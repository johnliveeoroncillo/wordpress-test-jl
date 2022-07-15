<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see   https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<div class="container-indent">
	<div class="container">
		<div class="tt-product-page__tabs tt-tabs js-tabs">
			<div class="tt-tabs__head" style="visibility: visible;">
				<?php $i = 1; ?>
				<ul>
					<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>_tab <?php echo caleader_kses_basic( $i == '1' ? 'active' : '' ); ?>"
						aria-controls="tab-<?php echo esc_attr( $key ); ?>">
						<span><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $product_tab['title'] ), $key ); ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
				<div class="tt-tabs__border" style="left: 0px; width: 115px;"></div>
			</div>
			<div class="tt-tabs__body">
				<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<div class=" woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab "
					role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">

					<?php call_user_func( $product_tab['callback'], $key, $product_tab ); ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
