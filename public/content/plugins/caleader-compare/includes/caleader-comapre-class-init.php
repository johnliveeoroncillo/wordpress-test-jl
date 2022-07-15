<?php

class Caleader_Compare_Init {


	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->caleader_compare_require_all();
		$this->caleader_compare_actions();
	}

	/**
	 * Sds_require_all require all files
	 *
	 * @return void
	 */
	private function caleader_compare_require_all() {

		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-activate.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-genarals.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-settings.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-ajax.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-actions.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/class-scripts.php';
		include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/class-element.php';
		$compare_style = Caleader_Compare_ClassGeneral::carleader_compare_option( 'compare_style' );
		if ( $compare_style == false ) {
			$compare_style = 'newpage';
		}

		if ( $compare_style == 'popup' ) {
			include_once CARLEADER_COMPARE_PLUGIN_DIR . 'templates/compare-slide.php';
		} else {

			include_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/class-shortcode.php';
		}

	}

	private function caleader_compare_actions() {

		new Caleader_Compare_Actions();
	}



}

new Caleader_Compare_Init();
