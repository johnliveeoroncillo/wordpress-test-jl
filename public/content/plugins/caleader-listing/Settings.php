<?php
class Settings {







	public function __construct() {
		add_filter( 'mb_settings_pages', [ $this, 'register_settings_pages' ] );
		add_filter( 'rwmb_meta_boxes', [ $this, 'register_settings_fields' ] );
	}
	public function register_settings_pages( $settings_pages ) {
		$settings_pages['carleader-listings'] = [
			'id'          => 'carleader-listings',
			'option_name' => 'carleader_listings_options',
			'menu_title'  => esc_html__( 'Settings', 'caleader-listing' ),
			'parent'      => 'edit.php?post_type=carleader-listing',
			'tabs'        => [
				'general'              => esc_html__( 'General', 'caleader-listing' ),
				'page_settings'        => esc_html__( 'Page Settings', 'caleader-listing' ),
				'listings'             => esc_html__( 'Listings', 'caleader-listing' ),
				'search'               => esc_html__( 'Filtering', 'caleader-listing' ),
				'enquiry_settings_tab' => esc_html__( 'Enquiry Settings', 'caleader-listing' ),
			],
		];
		return $settings_pages;
	}
	public function register_settings_fields( $meta_boxes ) {
		$files = glob( __DIR__ . '/settings/*.php' );
		foreach ( $files as $file ) {
			$meta_boxes[] = include $file;
		}
		return $meta_boxes;
	}
}
new Settings();
