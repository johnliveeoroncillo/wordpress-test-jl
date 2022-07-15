<?php
$prefix   = '_carleader_listing_';
$fields   = [];
$fields[] = [
	'name' => esc_html__( 'Price', 'caleader-listing' ),
	'id'   => $prefix . 'price',
	'type' => 'text',
];
$fields[] = [
	'name' => esc_html__( 'Old Price', 'caleader-listing' ),
	'id'   => $prefix . 'old_price',
	'type' => 'text',
];
$fields[] = [
	'name' => esc_html__( 'Estimated Loan Payment', 'caleader-listing' ),
	'id'   => $prefix . 'loan_payment',
	'type' => 'text',
];
$fields[] = [
	'name' => esc_html__( 'Miles', 'caleader-listing' ),
	'desc' => '',
	'id'   => $prefix . 'miles',
	'type' => 'text',
];
$fields[] = [
	'name' => esc_html__( 'Horse Power', 'caleader-listing' ),
	'desc' => '',
	'id'   => $prefix . 'hp',
	'type' => 'text',
];
$fields[] = [
	'name'             => esc_html__( 'Condition', 'caleader-listing' ),
	'id'               => $prefix . 'condition',
	'type'             => 'select',
	'show_option_none' => true,
	'options'          => carleader_listings_available_listing_conditions(),
];
$fields[] = [
	'name'      => esc_html__( 'Have Promo?', 'caleader-listing' ),
	'id'        => $prefix . 'promo',
	'type'      => 'switch',

	// Style: rounded (default) or square
	'style'     => 'rounded',
	// On label: can be any HTML
	'on_label'  => esc_html__( 'Yes', 'caleader-listing' ),
	// Off label
	'off_label' => esc_html__( 'No', 'caleader-listing' ),
];
$fields[] = [
	'name'     => esc_html__( 'Body Type', 'caleader-listing' ),
	'id'       => $prefix . 'body_display',
	'type'     => 'taxonomy',
	'taxonomy' => 'body-type',
];
$fields   = apply_filters( 'auto_listings_metabox_details', $fields );
ksort( $fields );
return [
	'id'         => $prefix . 'details',
	'title'      => esc_html__( 'Details', 'caleader-listing' ),
	'post_types' => 'carleader-listing',
	'fields'     => $fields,
	'context'    => 'side',
];
