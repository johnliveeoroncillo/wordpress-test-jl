<?php
return [
	'id'             => 'general_settings',
	'title'          => esc_html__( 'General', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'general',
	'fields'         => [
		[
			'name'    => esc_html__( 'Can Add To Cart', 'caleader-listing' ),
			'id'      => 'can_add_cart',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Open Cart On Add Product', 'caleader-listing' ),
			'id'      => 'open_cart',
			'desc'    => esc_html__( 'Only if you add to cart.', 'caleader-listing' ),
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Contact Button For The Product', 'caleader-listing' ),
			'id'      => 'contact_bt_for_product',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Show Contact Button For', 'caleader-listing' ),
			'id'      => 'contact_bt_for_spc_prod',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'All Products', 'caleader-listing' ),
				'2' => esc_html__( 'Only Products With Price 0 or "Sold out"', 'caleader-listing' ),
			),
			'std'     => '2',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Show Sold Out Badge on single listing page', 'caleader-listing' ),
			'id'      => 'sold_badge_single_page',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Test Drive', 'karde-listing' ),
			'id'      => 'test_drive_button',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'karde-listing' ),
				'0' => esc_html__( 'No', 'karde-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name' => esc_html__( 'Test Drive Button Text', 'caleader-listing' ),
			'desc' => esc_html__( 'Only if "Test Drive" option is checked to yes.', 'caleader-listing' ),
			'id'   => 't_drive_bt',
			'std'  => esc_html__( 'test drive', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name'    => esc_html__( 'Can Enquiry', 'caleader-listing' ),
			'id'      => 'can_enquire',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name'             => esc_html__( 'Sold Out Badge', 'caleader-listing' ),
			'id'               => 'sold_out_badge',
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		],
		[
			'name'    => esc_html__( 'Change Single Page Gallery Image On', 'caleader-listing' ),
			'id'      => 'single_gal_change',
			'type'    => 'radio',
			'options' => array(
				'hover' => esc_html__( 'Hover', 'caleader-listing' ),
				'click' => esc_html__( 'Click', 'caleader-listing' ),
			),
			'std'     => 'click',
			'inline'  => true,
		],
	],
];
