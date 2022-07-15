<?php
namespace CarLeader;

class Scripts {






	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'required_assets' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'required_script' ) );
	}
	public function required_script() {
		wp_enqueue_script( 'car-leader-elemt-slick', get_template_directory_uri() . '/external/slick/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'car-leader-elemt-slick', get_template_directory_uri() . '/external/isotope/isotope.pkgd.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'car-leader-element-slick', CAR_LEADERS_CORE_PLUGIN_URI . 'js/custom.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'review-script', CAR_LEADERS_CORE_PLUGIN_URI . 'js/review-custom.js', array( 'jquery' ), '', true );
		$option       = get_option( 'carleader_listings_options' );
		$currency_pos = isset( $option['currency_position'] ) ? $option['currency_position'] : 'before';

		$curr = '$';
		if ( function_exists( 'carleader_listings_currency_symbol' ) ) {
			$curr = carleader_listings_currency_symbol();
		}

		wp_localize_script(
			'review-script',
			'ajax_object',
			array(
				'ajax_url'     => esc_url( admin_url( 'admin-ajax.php' ) ),
				'star_text'    => esc_html__( 'Stars', 'caleader' ),
				'currency'     => $curr,
				'currency_pos' => $currency_pos,
			)
		);

	}
	public function required_assets() {
	}
}
