<?php
class carleaderListingFields{
	public function __construct() {
		add_filter( 'rwmb_meta_boxes', [ $this, 'register_meta_boxes' ] );
		add_action( 'rwmb_enqueue_scripts', [ $this, 'enqueue' ] );
		add_filter( 'rwmb_meta_boxes', [ $this, 'carleader_register_taxonomy_meta_boxes' ] );
	}
	public function register_meta_boxes( $meta_boxes ) {
		$files = glob( __DIR__ . '/fields/*.php' );
		foreach ( $files as $file ) {
			$meta_boxes[] = include $file;
		}
		return $meta_boxes;
	}
	
	public function carleader_register_taxonomy_meta_boxes( $meta_boxes ){
	    $meta_boxes[] = array(
	        'title'      => 'Field Image',
	        'taxonomies' => array(
	        				'body-type', 'make-brand',
	        				),
	        'context'    => 'side', // List of taxonomies. Array or string
	        'fields' => array(
	            array(
	                'name'             => 'Featured Image',
	                'id'               => 'image_advanced',
	                'type' 			   => 'image_advanced',
	                'max_file_uploads' => 1,
	            ),
	        ),
	        'admin_columns' => 'before title',
	    );
	    return $meta_boxes;
	}
	public function enqueue( $meta_box ) {
		if ( ! $this->is_screen() || '_carleader_listing_select' != $meta_box->id ) {
			return;
		}
		$css_dir = CARLEADER_LISTING_URL . 'assets/admin/css/';
		$js_dir  = CARLEADER_LISTINGS_URL . 'assets/admin/js/';
	}
	public function is_screen() {
		if ( ! is_admin() ) {
			return true;
		}
		return 'carleader-listing' === get_current_screen()->post_type;
	}
}
new carleaderListingFields();