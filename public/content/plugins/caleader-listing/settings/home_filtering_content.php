<?php
return [
	'id'             => 'home_search_set',
	'title'          => esc_html__( 'Homepage Filtering Content', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'search',
	'fields'         => [
		[
			'name' => esc_html__( 'Home Page Search Bar Top Text', 'caleader-listing' ),
			'id'   => 'h_search_top',
			'std'  => esc_html__( 'Car Search', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Home Page Search Bar Bottom Text', 'caleader-listing' ),
			'id'   => 'h_search_bot',
			'std'  => esc_html__( 'Find your next car', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Home Page Search Bar Count Text', 'caleader-listing' ),
			'id'   => 'h_search_count',
			'std'  => esc_html__( 'cars', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Homepage Select Model Text', 'caleader-listing' ),
			'id'   => 'h_select_model_text',
			'std'  => __( 'Select a Model', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Homepage Select Make Text', 'caleader-listing' ),
			'id'   => 'h_select_make_text',
			'std'  => __( 'Select a Make', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Homepage Year Text', 'caleader-listings' ),
			'id'   => 'h_select_year_text',
			'std'  => __( 'Year', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Homepage Price Text', 'caleader-listings' ),
			'id'   => 'h_select_price_text',
			'std'  => __( 'Price', 'caleader-listing' ),
			'type' => 'text',
		],
	],
];
