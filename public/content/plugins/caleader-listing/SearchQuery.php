<?php
class SearchQuery {







	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ), 999 );
	}
	public function pre_get_posts( \WP_Query $query ) {
		if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'carleader-listing' ) || ! is_search() ) {
			return;
		}
		$meta_query = array();

		$year_query[]       = $this->year_query();
		$make_query[]       = $this->make_query();
		$model_query[]      = $this->model_query();
		$condition_query[]  = $this->condition_query();
		$odometer_query     = $this->odometer_query();
		$price_query[]      = $this->price_meta_query();
		$price_home_query[] = $this->price_meta_home_query();
		$body_type_query[]  = $this->body_type_query();
		$color_query        = $this->color_query();
		$int_color_query    = $this->int_color_query();
		$trans_query        = $this->trans_query();
		$drive_query        = $this->drive_query();
		$fuel_query         = $this->fuel_query();
		$query_1            = array_merge( $year_query, $make_query, $model_query, $condition_query, $trans_query, $fuel_query, $drive_query, $price_query, $price_home_query, $body_type_query, $odometer_query, $color_query, $int_color_query );

		if ( empty( $_GET['s'] ) ) {
			$query_1['relation'] = 'AND';
			$meta_query[]        = $query_1;
		}
		if ( ! empty( $_GET['s'] ) ) {
			$query_2['relation']    = 'OR';
			$meta_query[]           = $query_1;
			$meta_query[]           = $query_2;
			$meta_query['relation'] = 'AND';
		}
		$query->set( 'meta_query', $meta_query );
		$query->set( 'tax_query', array( $body_type_query, $make_query ) );
		$query->set( 'post_type', 'carleader-listing' );
	}
	/**
	 * Return a meta query for filtering by year.
	 *
	 * @return array
	 */

	private function year_query() {
		if ( isset( $_GET['the_year'] ) && ! empty( $_GET['the_year'] ) ) {
			if ( is_array( $_GET['the_year'] ) ) {
				$data = array_map( 'sanitize_text_field', wp_unslash( $_GET['the_year'] ) );
				return array(
					'key'     => '_carleader_listing_model_year',
					'value'   => $data,
					'compare' => 'IN',
				);
			}
			return array(
				'key'     => '_carleader_listing_model_year',
				'value'   => $_GET['the_year'],
				'compare' => '=',
			);

		}
		return array();
	}
	/**
	 * Return a meta query for filtering by make.
	 *
	 * @return array
	 */

	private function make_query() {
		if ( isset( $_GET['make'] ) && ! empty( $_GET['make'] ) ) {
			$tax_query[] = array(
				'taxonomy' => 'make-brand',
				'field'    => 'slug',
				'terms'    => $_GET['make'],
			);
			return $tax_query;
		}
		return null;
	}
	/**
	 * Return a meta query for filtering by model.
	 *
	 * @return array
	 */
	private function model_query() {
		if ( isset( $_GET['model'] ) && ! empty( $_GET['model'] ) ) {
			if ( is_array( $_GET['model'] ) ) {
				$data = array_map( 'sanitize_text_field', wp_unslash( $_GET['model'] ) );
				return array(
					'key'     => '_carleader_listing_model_name',
					'value'   => $data,
					'compare' => 'IN',
				);
			}
			return array(
				'key'     => '_carleader_listing_model_name',
				'value'   => $_GET['model'],
				'compare' => '=',
			);

		}
		return array();
	}
	/**
	 * Return a meta query for filtering by condition.
	 *
	 * @return array
	 */
	private function condition_query() {
		if ( isset( $_GET['condition'] ) && ! empty( $_GET['condition'] ) ) {
			return array(
				'key'     => '_carleader_listing_condition',
				'value'   => $_GET['condition'],
				'compare' => 'IN',
			);
		}
		return array();
	}
	private function color_query() {
		if ( isset( $_GET['ext_color'] ) && ! empty( $_GET['ext_color'] ) ) {
			if ( is_array( $_GET['ext_color'] ) ) {
				$data = array_map( 'sanitize_text_field', wp_unslash( $_GET['ext_color'] ) );
				return array(
					'key'     => '_carleader_listing_color',
					'value'   => $data,
					'compare' => 'IN',
				);
			}
			return array(
				'key'     => '_carleader_listing_color',
				'value'   => trim( $_GET['ext_color'] ),
				'compare' => '=',
			);

		}
		return array();
	}
	private function int_color_query() {
		if ( isset( $_GET['int_color'] ) && ! empty( $_GET['int_color'] ) ) {
			return array(
				'key'     => '_carleader_listing_int_color',
				'value'   => $_GET['int_color'],
				'compare' => 'IN',
			);
		}
		return array();
	}

	/**
	 * Return a meta query for filtering by odometer.
	 *
	 * @return array
	 */
	private function odometer_query() {
		if ( isset( $_GET['odometer'] ) && ! empty( $_GET['odometer'] ) ) {

			$min = 0;
			if ( is_array( $_GET['odometer'] ) ) {
				$max = max( $_GET['odometer'] );
			} else {
				$max = $_GET['odometer'];
			}

			$max = floatval( $max );
			return array(
				'key'     => '_carleader_listing_miles',
				'value'   => array( $min, $max ),
				'compare' => 'BETWEEN',
				'type'    => 'NUMERIC',
			);
		}
		return array();
	}
	/**
	 * Return a taxonomy query for filtering by body type.
	 *
	 * @return array
	 */
	private function body_type_query() {
		if ( isset( $_GET['body_type'] ) && ! empty( $_GET['body_type'] ) ) {
			$tax_query[] = array(
				'taxonomy' => 'body-type',
				'field'    => 'slug',
				'terms'    => $_GET['body_type'],
			);
			return $tax_query;
		}
		return null;
	}
	private function fuel_query() {
		if ( isset( $_GET['model_engine_fuel'] ) && ! empty( $_GET['model_engine_fuel'] ) ) {
			return array(
				'key'     => '_carleader_listing_model_engine_fuel',
				'value'   => $_GET['model_engine_fuel'],
				'compare' => 'IN',
			);
		}
		return array();
	}

	private function trans_query() {
		if ( isset( $_GET['model_transmission_type'] ) && ! empty( $_GET['model_transmission_type'] ) ) {
			return array(
				'key'     => '_carleader_listing_model_transmission_type',
				'value'   => $_GET['model_transmission_type'],
				'compare' => 'IN',
			);
		}
		return array();
	}
	private function drive_query() {
		if ( isset( $_GET['drivetrain'] ) && ! empty( $_GET['drivetrain'] ) ) {
			return array(
				'key'     => '_carleader_listing_drivetrain',
				'value'   => $_GET['drivetrain'],
				'compare' => 'IN',
			);
		}
		return array();
	}
	/**
	 * Return a meta query for filtering by price.
	 *
	 * @return array
	 */
	private function price_meta_home_query() {
		if ( isset( $_GET['price'] ) ) {
			$price = floatval( $_GET['price'] );
			$min   = 0;
			return array(
				'key'          => '_carleader_listing_price',
				'value'        => array( $min, $price ),
				'compare'      => 'BETWEEN',
				'type'         => 'DECIMAL',
				'price_filter' => true,
			);
		}
		return array();
	}
	private function price_meta_query() {
		if ( isset( $_GET['max_price'] ) && ! empty( $_GET['max_price'] ) || isset( $_GET['min_price'] ) && ! empty( $_GET['min_price'] ) ) {
			$min = floatval( $_GET['min_price'] );
			$max = floatval( $_GET['max_price'] );
			return array(
				'key'          => '_carleader_listing_price',
				'value'        => array( $min, $max ),
				'compare'      => 'BETWEEN',
				'type'         => 'DECIMAL',
				'price_filter' => true,
			);
		}
		return array();
	}
}
new SearchQuery();
