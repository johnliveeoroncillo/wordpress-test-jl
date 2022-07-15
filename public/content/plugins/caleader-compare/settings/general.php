<?php
return [
	'id'             => 'compare',
	'title'          => esc_html__( 'General Settings', 'caleader-compare' ),
	'settings_pages' => 'carleader-compare',
	'tab'            => 'general',
	'fields'         => [
		[
			'name'    => esc_html__( 'Comparing Layout Style', 'caleader-compare' ),
			'id'      => 'compare_style',
			'type'    => 'radio',
			'options' => array(
				'popup'   => 'Pop Up',
				'newpage' => 'New Page',
			),
			// Show choices in the same line?
			'inline'  => false,
		],
		[
			'name'        => esc_html__( 'Select Compare Result Page', 'caleader-compare' ),
			'id'          => 'compare_page',
			'type'        => 'post',
			'post_type'   => 'page',
			'field_type'  => 'select_advanced',
			'placeholder' => 'Select a page',
			'query_args'  => array(
				'post_status'    => 'publish',
				'posts_per_page' => - 1,
			),
			'hidden'      => array( 'compare_style', '!=', 'newpage' ),
		],
		[
			'name' => esc_html__( 'Not Found Text', 'caleader-compare' ),
			'id'   => 'compare_not_found',
			'type' => 'text',
			'std'  => esc_html__( 'Not Found Any Car To Compare', 'caleader-compare' ),
		],
	],
];
