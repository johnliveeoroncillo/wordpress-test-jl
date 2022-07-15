<?php
return [
	'id'             => 'enquiry_settings',
	'title'          => esc_html__( 'Enquiry Settings', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'enquiry_settings_tab',
	'fields'         => [
		[
			'name'    => esc_html__( 'Has Phone Field', 'caleader-listing' ),
			'id'      => 'has_phone',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Require Phone Field', 'caleader-listing' ),
			'id'      => 'require_phone',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Has Secondary Email Field', 'caleader-listing' ),
			'id'      => 'has_secondary_email',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Require Secondary Email Field', 'caleader-listing' ),
			'id'      => 'require_sec_mail',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
	],
];
