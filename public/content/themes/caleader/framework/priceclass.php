<?php
/**
 * caleader_WC_Product_Device
 *
 * @author   Smartdatasoft
 * @package  caleader
 * @version  1.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Product_Simple' ) ) {
	return;
}

global $woocommerce;

if ( ! class_exists( 'caleader_WC_Product_Device' ) ) {
	/**
	 * Class caleader_WC_Product_Device
	 */
	class caleader_WC_Product_Device extends WC_Product_Simple {

		/**
		 * @var
		 */
		public $total;
		public $product;

		/**
		 * CR_WC_Product_Device constructor.
		 *
		 * @param int $product
		 */
		public function __construct( $product = 0 ) {
			// Should not call constructor of parent
			// parent::__construct( $product );


			if ( is_numeric( $product ) && $product > 0 ) {
				$this->set_id( $product );
				$this->product = $product;
			} elseif ( $product instanceof self ) {
				$this->set_id( absint( $product->get_id() ) );
				$this->product = absint( $product->get_id() );
			} elseif ( ! empty( $product->ID ) ) {
				$this->set_id( absint( $product->ID ) );
				$this->product = absint( $product->ID );
			}
		}

		/**
		 * @param string $context
		 *
		 * @return string
		 */
		public function get_price( $context = 'view' ) {
			return WC()->session->get( 'custom_price' . $this->product );
		}

		/**
		 * Check if a product is purchasable.
		 *
		 * @param string $context
		 *
		 * @return bool
		 */
		public function is_purchasable( $context = 'view' ) {
			return true;
		}

		/**
		 * @param string $context
		 *
		 * @return string
		 */
		public function get_stock_status( $context = 'view' ) {
			return $this->get_stock_quantity( $context ) > 0 ? 'instock' : '';
		}

		/**
		 * @param string $context
		 *
		 * @return bool
		 */
		public function exists( $context = 'view' ) {
			$caleader_listing_post_type = '';

			if ( has_action( 'caleader_listings_get_post_type' ) ) {
				do_action_ref_array( 'caleader_listings_get_post_type', array( &$caleader_listing_post_type ) );

			}
			return $this->get_id() && ( get_post_type( $this->get_id() ) == $caleader_listing_post_type ) && ( ! in_array(
				get_post_status( $this->get_id() ),
				array(
					'draft',
					'auto-draft',
				)
			) );
		}

		/**
		 * @return bool
		 */
		public function is_virtual() {
			return true;
		}

		/**
		 * @param string $context
		 *
		 * @return string
		 */
		public function get_name( $context = 'view' ) {
			return get_the_title( $this->get_id() );
		}

		/**
		 * @return bool
		 */
		public function is_in_stock() {
			return true;
		}

		/**
		 * @param $value
		 */
		public function set_check_in_date( $value ) {
			$this->data['check_in_date'] = $value;
		}

		/**
		 * @param $value
		 */
		public function set_check_out_date( $value ) {
			$this->data['check_out_date'] = $value;
		}

		/**
		 * @param int $value
		 */
		public function set_parent_id( $value ) {
			$this->data['parent_id'] = $value;
		}

		/**
		 * @param $value
		 */
		public function set_product_id( $value ) {
			$this->data['product_id'] = $value;
		}

		/**
		 * @param $value
		 */
		public function set_woo_cart_id( $value ) {
			$this->data['woo_cart_id'] = $value;
		}
	}
}