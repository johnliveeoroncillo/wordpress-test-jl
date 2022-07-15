<?php
return [
	'id'             => 'single_page_set',
	'title'          => esc_html__( 'Single Page Settings', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'page_settings',
	'fields'         => [
		[
			'name'    => esc_html__( 'Interested Section on/off', 'caleader-listing' ),
			'id'      => 'int_sec',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name' => esc_html__( 'Interested Section Text', 'caleader-listing' ),
			'id'   => 'interested_text',
			'std'  => esc_html__( 'You May Also Be Interested In', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Single Page Licensing Text', 'caleader-listing' ),
			'id'   => 'liicense_text',
			'std'  => esc_html__( 'Taxes & Licensing included', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Contact Button Text', 'caleader-listing' ),
			'desc' => esc_html__( 'Only if "Contact Button For The Product" option is checked to yes.', 'caleader-listing' ),
			'id'   => 'contact_bt_text',
			'std'  => esc_html__( 'Contact Us', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Contact Button Url', 'caleader-listing' ),
			'desc' => esc_html__( 'Only if "Contact Button For The Product" option is checked to yes. "#contact_now" will scroll down to the enquiry form. Other links will take to the link', 'caleader-listing' ),
			'id'   => 'contact_bt_url',
			'std'  => '#contact_now',
			'type' => 'text',
		],
	],
];
