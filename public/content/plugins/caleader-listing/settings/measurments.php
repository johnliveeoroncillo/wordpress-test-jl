<?php
return [
	'id'             => 'units',
	'title'          => esc_html__( 'Measurements', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'general',
	'fields'         => [
		[
			'name' => esc_html__( 'Just Arrived', 'caleader-listing' ),
			'desc' => esc_html__( 'How many Days to show Just Arrived tag in listing', 'caleader-listing' ),
			'id'   => 'just_arrived',
			'type' => 'text',
		],
		[
			'name'    => esc_html__( 'Metric or Imperial', 'caleader-listing' ),
			'id'      => 'odometer',
			'type'    => 'select',
			'options' => [
				'miles' => esc_html__( 'Miles', 'caleader-listing' ),
				'km'    => esc_html__( 'KiloMeters', 'caleader-listing' ),
			],
		],
		[
			'name' => esc_html__( 'Payment Currency', 'caleader-listing' ),
			'desc' => esc_html__( 'What Currency Payment', 'caleader-listing' ),
			'id'   => 'currency',
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Numbers after decimal', 'carleader-listings' ),
			'id'   => 'caleader_prec',
			'type' => 'number',
			'min'  => 2,
			'step' => 1,
		],
		[
			'name' => esc_html__( 'Thousand Seperator', 'carleader-listings' ),
			'id'   => 'thousand_separator',
			'type' => 'text',
			'std'  => ',',
		],
		[
			'name' => esc_html__( 'Decimal Seperator', 'carleader-listings' ),
			'id'   => 'decimal_separator',
			'type' => 'text',
			'std'  => '.',
		],
		[
			'name'    => esc_html__( 'Currency Position', 'caleader-listing' ),
			'id'      => 'currency_position',
			'type'    => 'select_advanced',
			'options' => [
				'before'       => esc_html__( 'Before', 'caleader-listing' ),
				'after'        => esc_html__( 'After', 'caleader-listing' ),
				'before_space' => esc_html__( 'Before Space', 'caleader-listing' ),
				'after_space'  => esc_html__( 'After Space', 'caleader-listing' ),
			],
		],
		[
			'name'    => esc_html__( 'Show Trailing Zeros After Decimal', 'caleader-listing' ),
			'id'      => 'trail_zeros',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
	],
];
