<?php
return [
	'id'             => 'search_set',
	'title'          => esc_html__( 'Archive Filtering Content', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'search',
	'fields'         => [
		[
			'name'    => esc_html__( 'Show Result Count', 'caleader-listing' ),
			'id'      => 'result_count',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Price filter type', 'caleader-listing' ),
			'id'      => 'pft',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Slide Bar', 'caleader-listing' ),
				'0' => esc_html__( 'Text Input', 'caleader-listing' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name' => esc_html__( 'Inventory Page Search Text', 'caleader-listing' ),
			'id'   => 'inv_search_text',
			'std'  => __( 'Search Our<br>Inventory', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Filter Text', 'caleader-listings' ),
			'id'   => 'filter_text',
			'std'  => esc_html__( 'Filter', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Reset Filter Text', 'caleader-listing' ),
			'id'   => 'reset_text',
			'std'  => esc_html__( 'Reset Filters', 'caleader-listing' ),
			'type' => 'text',
		],
	],
];
