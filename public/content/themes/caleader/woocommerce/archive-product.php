<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

if ( function_exists( 'caleader_breadcrumb_custom' ) ) {
	caleader_breadcrumb_custom();
}
?>
<div id="tt-pageContent">
	<div class="section-wrapper-01">
		<div class="container-indent">
			<div class="container">
				<div class="tt-description">
					<?php
						/**
						 * woocommerce_archive_description hook.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
				</div>
				<?php
						/**
						 * Hook: woocommerce_before_main_content.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 * @hooked WC_Structured_Data::generate_website_data() - 30
						 */
						do_action( 'woocommerce_before_main_content' );
				?>
				<div class="row">
					<?php if ( is_active_sidebar( 'woo_shop_sideber' ) ) { ?>
					<div class="col-md-4 col-lg-3 col-xl-3 leftColumn tt-aside" id="aside-js">
						<div class="tt-wrapper-aside">
							<div class="tt-label-aside tt-small">
								<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-btn-col-close"><i
										class="icon-close"></i></a>
								<div class="tt-icon">
									<i class="icon-cart"></i>
								</div>
								<div class="tt-title">
									<?php echo esc_html__( 'Online', 'caleader' ); ?>
									<br>
									<?php echo esc_html__( 'Shopping', 'caleader' ); ?>
								</div>
							</div>
							<?php
							/**
							 * woocommerce_sidebar hook.
							 *
							 * @hooked woocommerce_get_sidebar - 10
							 */


							dynamic_sidebar( 'woo_shop_sideber' );

							?>
						</div>
					</div>
					<?php } ?>
					<?php if ( is_active_sidebar( 'woo_shop_sideber' ) ) { ?>
					<div class="col-md-12 col-lg-9 col-xl-9">
						<?php } else { ?>
						<div class="col-md-12 col-lg-12 col-xl-12">
							<?php } ?>
							<div class="tt-filters-options tt-skinSelect-01">
								<?php if ( is_active_sidebar( 'woo_shop_sideber' ) ) { ?>
								<div class="tt-btn-toggle" id="tt-btn-toggle-js">
									<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>"></a>
								</div>
								<?php } ?>
								<div class="tt-sort tt-col">
									<?php
									/**
									 * woocommerce_before_shop_loop hook.
									 *
									 * @hooked wc_print_notices - 10
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									do_action( 'woocommerce_before_shop_loop' );
									?>
								</div>
								<div class="tt-quantity">
									<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="icon-grid active"
										data-value="icon-listing"></a>
									<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
										class="tt-grid-switch icon-listing"></a>
								</div>
							</div>

							<div id="tt-product-listing" class="tt-product-listing row">
								<?php woocommerce_product_loop_start(); ?>
								<?php	if ( wc_get_loop_prop( 'total' ) ) { ?>
									<?php
									while ( have_posts() ) :
										the_post();
										?>
								<div class="col-6 col-md-4 tt-col-item">
										<?php
										/**
										 * woocommerce_shop_loop hook.
										 *
										 * @hooked WC_Structured_Data::generate_product_data() - 10
										 */
										do_action( 'woocommerce_shop_loop' );
										?>
										<?php wc_get_template_part( 'content', 'product' ); ?>
								</div>
								<?php endwhile; // end of the loop. ?>
								<?php } ?>
								<?php woocommerce_product_loop_end(); ?>
							</div>
							<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer( 'shop' );