<?php
/*
  Plugin Name: Caleader Compare
  Plugin URI: http://smartdatasoft.com/
  Description: Helping  Compare Plug In for the SmartDataSoft  theme.
  Author: SmartDataSoft Team
  Version: 1.6
  Author URI: http://smartdatasoft.com/
*/

// Define Constants

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( has_action( 'caleader_theme_init' ) ) {


	add_action( 'caleader_theme_init', 'check_caleader_theme_active' );

	function check_caleader_theme_active() {
		if ( ! function_exists( 'caleader_setup' ) ) {
			return;
		}
	}
}


if ( ! defined( 'CAR_LEADER_THEME_URI' ) ) {
	define( 'CAR_LEADER_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'CAR_LEADERS_THEME_URI' ) ) {
	define( 'CAR_LEADERS_THEME_URI', get_template_directory_uri() );
}

if ( ! defined( 'CAR_LEADERS_PLUGIN_URI' ) ) {
	define( 'CAR_LEADERS_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'CARLEADER_COMPARE_PLUGIN_DIR' ) ) {
	define( 'CARLEADER_COMPARE_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
}

if ( ! defined( 'CARLEADER_COMPARE_PLUGIN_SETTINGS_DIR' ) ) {
	define( 'CARLEADER_COMPARE_PLUGIN_SETTINGS_DIR', dirname( __FILE__ ) . '/settings/' );
}



add_action( 'plugins_loaded', 'carleader_compare_load_textdomain' );

function carleader_compare_load_textdomain() {
	load_plugin_textdomain( 'caleader-compare', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

// Require Init Class

require_once CARLEADER_COMPARE_PLUGIN_DIR . 'includes/caleader-comapre-class-init.php';

use CALEADER_COMPARE\includes\CompareClassActivate\Caleader_Compare_Activate;

// Call when activate the plugin

register_activation_hook( __FILE__, 'activate_caleader_compare' );
function activate_caleader_compare() {
	Caleader_Compare_Activate::carleader_compare_activation_func();
	Caleader_Compare_Activate::caleader_compare_create_page();

}
