<?php

return [
	'id'             => 'listing_setup',
	'title'          => esc_html__( 'Listing Setup', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'listings',
	'fields'         => [
		[
			'name' => esc_html__( 'Custom Post Name', 'caleader-listing' ),
			'id'   => 'cpt_name',
			'type' => 'text',
			'std'  => 'Caleader Listing',
		],
		[
			'name' => esc_html__( 'Listing Slug', 'caleader-listing' ),
			'desc' => esc_html__( 'What will be shown in the url box followed by the listing item name.', 'caleader-listing' ),
			'id'   => 'l_slug',
			'std'  => 'carleader-listing',
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Posts Per Page', 'caleader-listing' ),
			'desc' => esc_html__( 'How many posts to show in archive listing', 'caleader-listing' ),
			'id'   => 'listing_post_per_page',
			'type' => 'number',
			'min'  => 3,
			'step' => 1,
		],
		[
			'name' => esc_html__( 'Add to cart Button Text', 'carleader-listings' ),
			'id'   => 'add_cart_text',
			'type' => 'text',
			'std'  => esc_html__( 'Add to Cart', 'carleader-listings' ),
		],
		[
			'name'     => esc_html__( 'Select Listing Title Format', 'caleader-listing' ),
			'id'       => 'title_format',
			'type'     => 'select_advanced',
			'multiple' => true,
			'options'  => [
				'listing_title'           => esc_html__( 'Listing Title', 'caleader-listing' ),
				'make_display'            => esc_html__( 'Make', 'caleader-listing' ),
				'model_name'              => esc_html__( 'Model', 'caleader-listing' ),
				'model_year'              => esc_html__( 'Year', 'caleader-listing' ),
				'body_display'            => esc_html__( 'Body Type', 'caleader-listing' ),
				'model_transmission_type' => esc_html__( 'Transmission', 'caleader-listing' ),
				'drivetrain'              => esc_html__( 'Drivetrain', 'caleader-listing' ),
				'engine'                  => esc_html__( 'Engine', 'caleader-listing' ),
				'model_engine_fuel'       => esc_html__( 'Fuel Type', 'caleader-listing' ),
			],
		],
	],
];
