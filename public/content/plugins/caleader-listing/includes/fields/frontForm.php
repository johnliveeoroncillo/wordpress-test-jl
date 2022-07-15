<?php
$prefix              = '_listing_enqury_';
$fields              = [];
$has_phone           = carleader_listings_option( 'has_phone' );
$has_secondary_email = carleader_listings_option( 'has_secondary_email' );


if ( is_admin() ) {
	$fields[10] = [
		'id'         => $prefix . 'listing_id',
		'name'       => __( 'Enquiry Id', 'caleader-listing' ),
		'type'       => 'text',
		'attributes' => array(
			'disabled' => true,
		),
	];
	$fields[20] = [
		'id'         => $prefix . 'listing_title',
		'name'       => __( 'Listing Name', 'caleader-listing' ),
		'type'       => 'text',
		'attributes' => array(
			'disabled' => true,
		),
	];
}

$fields[] = [
	'id'          => $prefix . 'name',
	'type'        => 'text',
	'required'    => true,
	'placeholder' => esc_html__( 'Name*', 'caleader-listing' ),
];


$fields[] = [
	'id'          => $prefix . 'email',
	'type'        => 'text',
	'required'    => true,
	'placeholder' => esc_html__( 'E-mail*', 'caleader-listing' ),
];

if ( $has_secondary_email ) {
	$require_sec_mail = carleader_listings_option( 'require_sec_mail' );
	if ( $require_sec_mail ) {
		$fields[] = [
			'id'          => $prefix . 'sec_mail',
			'type'        => 'text',
			'required'    => true,
			'placeholder' => esc_html__( 'Second Mail*', 'caleader-listing' ),
		];
	} else {
		$fields[] = [
			'id'          => $prefix . 'sec_mail',
			'type'        => 'text',
			'placeholder' => esc_html__( 'Second Mail', 'caleader-listing' ),
		];
	}
}

	if ( $has_phone ) {
	$require_phone = carleader_listings_option( 'require_phone' );
	if ( $require_phone ) {
		$fields[] = [
			'id'          => $prefix . 'phone',
			'type'        => 'text',
			'required'    => true,
			'placeholder' => esc_html__( 'Phone Number*', 'caleader-listing' ),
		];
	} else {
		$fields[] = [
			'id'          => $prefix . 'phone',
			'type'        => 'text',
			'placeholder' => esc_html__( 'Phone Number', 'caleader-listing' ),
		];
	}
}


$fields[] = [
	'id'          => $prefix . 'msg',
	'type'        => 'textarea',
	'required'    => true,
	'placeholder' => esc_html__( 'Message*', 'caleader-listing' ),
];
$fields   = apply_filters( 'carleader_listings_metabox_front_form', $fields );
ksort( $fields );
return [
	'id'         => 'carleader_listing_contact_form',
	'title'      => esc_html__( 'Frontend Form', 'caleader-listing' ),
	'post_types' => 'contact-posting',
	'fields'     => $fields,
];
