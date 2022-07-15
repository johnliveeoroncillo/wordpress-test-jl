<?php

class Caleader_Compare_Actions {









	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->register_actions();
		add_action( 'caleader_listing_init', [ $this, 'register_compare_settings' ] );
	}


	public function register_compare_settings() {

		add_filter( 'mb_settings_pages', [ 'Caleader_Compare_ClassSettings', 'register_settings_pages' ] );
		add_filter( 'rwmb_meta_boxes', [ 'Caleader_Compare_ClassSettings', 'register_settings_fields' ] );
	}

	/**
	 * Register_actions All Actions
	 *
	 * @return void
	 */
	private function register_actions() {

		// SCript Enqueue.
		add_action( 'wp_enqueue_scripts', [ 'Caleader_Compare_ClassScripts', 'required_scripts' ] );

		$compare_style = Caleader_Compare_ClassGeneral::carleader_compare_option( 'compare_style' );
		if ( $compare_style == false ) {
			$compare_style = 'newpage';
		}

		if ( $compare_style == 'popup' ) {
			add_action( 'wp_footer', [ 'Caleader_Compare_ClassGeneral', 'fotter_pop' ], 100 );
		}

		// Ajx Callbacks
		add_action( 'wp_ajax_car_item_remove', [ 'Caleader_Compare_ClassAjaxFunc', 'carleader_compare_car_item_remove' ] );
		add_action( 'wp_ajax_nopriv_car_item_remove', [ 'Caleader_Compare_ClassAjaxFunc', 'carleader_compare_item_remove' ] );

	}

}
