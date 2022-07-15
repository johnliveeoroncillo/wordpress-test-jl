<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
<div class="container-indent">
	<section class="related products ">
			<div class="tt-block-title">
				<h3 class="tt-title"><?php echo esc_html__( 'Similar', 'caleader' ); ?>
					<span class="color"><?php echo esc_html__( 'Products', 'caleader' ); ?></span>
				</h3>
			</div>
		<div class="js-carousel-col-4 tt-slider-product tt-arrow-center slick-alignment-arrows">
			<?php foreach ( $related_products as $related_product ) : ?>
				<div>
				<?php
					$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					wc_get_template_part( 'content', 'product' );
				?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>
	<?php
endif;
wp_reset_postdata();
