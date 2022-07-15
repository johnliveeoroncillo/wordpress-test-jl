<?php

return [
	'id'             => 'speciffications_setup',
	'title'          => esc_html__( 'Speciffications', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'listings',
	'fields'         => [
		[
			'name'    => esc_html__( 'Condition', 'caleader-listing' ),
			'desc'    => esc_html__( 'Condition of the Car', 'caleader-listing' ),
			'id'      => 'carleader_condition_type',
			'type'    => 'checkbox_list',
			'options' => [
				'NEW'       => esc_html__( 'NEW', 'caleader-listing' ),
				'CERTIFIED' => esc_html__( 'CERTIFIED', 'caleader-listing' ),
				'USED'      => esc_html__( 'USED', 'caleader-listing' ),
				'sold_out'  => esc_html__( 'Sold Out', 'caleader-listing' ),
			],
		],
		[
			'name' => esc_html__( 'Additional Conditions', 'caleader-listing' ),
			'desc' => esc_html__( 'Put Your Extra Conditions In a New Line Spearated String', 'caleader-listing' ),
			'id'   => 'additional_condition',
			'type' => 'textarea',
		],
		[
			'name'    => esc_html__( 'Drivetrain', 'caleader-listing' ),
			'desc'    => esc_html__( 'Drivetrain of the Car', 'caleader-listing' ),
			'id'      => 'carleader_drivetrain',
			'type'    => 'checkbox_list',
			'options' => [
				'awd'  => esc_html__( 'All-Wheel Drive', 'caleader-listing' ),
				'frwd' => esc_html__( 'Four-Wheel Drive', 'caleader-listing' ),
				'fwd'  => esc_html__( 'Front-Wheel Drive', 'caleader-listing' ),
				'rwd'  => esc_html__( 'Rear-Wheel Drive', 'caleader-listing' ),
			],
		],
		[
			'name' => esc_html__( 'Additional Drivetrains', 'caleader-listing' ),
			'desc' => esc_html__( 'Put Your Extra Drivetrains In a New Line Spearated String', 'caleader-listing' ),
			'id'   => 'additional_drivetrain',
			'type' => 'textarea',
		],
		[
			'name'    => esc_html__( 'Transmission Types', 'caleader-listing' ),
			'desc'    => esc_html__( 'Transmission types of the Cars', 'caleader-listing' ),
			'id'      => 'carleader_transmission',
			'type'    => 'checkbox_list',
			'options' => [
				'at'  => esc_html__( 'Automatic Transmission', 'caleader-listing' ),
				'mt'  => esc_html__( 'Manual Transmission', 'caleader-listing' ),
				'am'  => esc_html__( 'Automated Manual Transmission', 'caleader-listing' ),
				'cvt' => esc_html__( 'Continuously Variable Transmission', 'caleader-listing' ),
			],
		],
		[
			'name' => esc_html__( 'Additional Transmission Types', 'caleader-listing' ),
			'desc' => esc_html__( 'Put Your Extra Transmission Types In a New Line Spearated String', 'caleader-listing' ),
			'id'   => 'additional_transmission',
			'type' => 'textarea',
		],
		[
			'name'    => esc_html__( 'Fuel Types', 'caleader-listing' ),
			'desc'    => esc_html__( 'Fuel types of the Cars', 'caleader-listing' ),
			'id'      => 'carleader_fuels',
			'type'    => 'checkbox_list',
			'options' => [
				'petrol'  => esc_html__( 'Petrol', 'caleader-listing' ),
				'gas'     => esc_html__( 'Gasoline', 'caleader-listing' ),
				'diesel'  => esc_html__( 'Diesel', 'caleader-listing' ),
				'cng'     => esc_html__( 'Compressed Natural Gas', 'caleader-listing' ),
				'lp'      => esc_html__( 'Liquefied Petroleum', 'caleader-listing' ),
				'bdiesel' => esc_html__( 'Bio-diesel', 'caleader-listing' ),
				'ethanol' => esc_html__( 'Ethanol', 'caleader-listing' ),
			],
		],
		[
			'name' => esc_html__( 'Additional Fuel Types Types', 'caleader-listing' ),
			'desc' => esc_html__( 'Put Your Extra Fuel Types Types In a New Line Spearated String', 'caleader-listing' ),
			'id'   => 'additional_fuels',
			'type' => 'textarea',
		],
	],
];
