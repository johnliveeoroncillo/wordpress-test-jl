<?php
class Caleader_Compare_ClassSettings {

	public function __construct() {

	}

	public function register_compare_settings() {

	}

	public static function register_settings_pages( $settings_pages ) {

		$settings_pages['carleader-compare'] = [
			'id'          => 'carleader-compare',
			'option_name' => 'carleader_compare_options',
			'menu_title'  => esc_html__( 'Compare Settings', 'caleader-compare' ),
			'parent'      => 'edit.php?post_type=carleader-listing',
			'tabs'        => [
				'general' => esc_html__( 'General', 'caleader-compare' ),
			],
		];
		return $settings_pages;
	}
	public static function register_settings_fields( $meta_boxes ) {

		$files = glob( CARLEADER_COMPARE_PLUGIN_SETTINGS_DIR . '*.php' );
		foreach ( $files as $file ) {

			$meta_boxes[] = include $file;
		}
		return $meta_boxes;
	}
}
new Caleader_Compare_ClassSettings();
