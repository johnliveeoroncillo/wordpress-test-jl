<?php

$fields[] = array(
	'type'     => 'radio-image',
	'settings' => 'header_style',
	'label'    => esc_html__( 'Header Style', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '1',
	'priority' => 10,
	'choices'  => array(
		'1' => esc_url( get_template_directory_uri() . '/assets/images/customizer/header-1.png' ),
		'2' => esc_url( get_template_directory_uri() . '/assets/images/customizer/header-2.png' ),
		'3' => esc_url( get_template_directory_uri() . '/assets/images/customizer/header-3.png' ),
	),
);


$fields[] = array(
	'type'     => 'switch',
	'settings' => 'top_header_visiblity',
	'label'    => esc_html__( 'Top Header Show/Hide', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'image',
	'settings' => 'header_map_image',
	'label'    => esc_html__( 'Header Map Image ', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '',
	'priority' => 10,
	'required' => array(
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'image',
		),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'top_header_search',
	'label'    => esc_html__( 'Top Header Search', 'caleader' ),
	'section'  => 'header_top',
	'default'  => 1,
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'            => 'select',
	'settings'        => 'header_search_type',
	'label'           => esc_html__( 'Select Post Type for Top Search', 'caleader' ),
	'section'         => 'header_top',
	'default'         => 'default',
	'priority'        => 10,
	'choices'         => get_post_type_lists(),
	'active_callback' => array(
		array(
			'setting'  => 'top_header_search',
			'operator' => '==',
			'value'    => 1,
		),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'language_widget',
	'label'    => esc_html__( 'Have Language Widget', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);
$fields[] = array(
	'type'     => 'switch',
	'settings' => 'top_header_cart',
	'label'    => esc_html__( 'Top Header  Cart Show/Hide', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);
$fields[] = array(
	'type'     => 'image',
	'settings' => 'breadcrumb_image',
	'label'    => esc_html__( 'Breadcrumb Image', 'caleader' ),
	'section'  => 'header_top',
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'add_your_item_btn',
	'label'    => esc_html__( 'Add your Button On/Off', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'            => 'select',
	'settings'        => 'add_button_func',
	'label'           => esc_html__( 'Header Button Functionality', 'caleader' ),
	'section'         => 'header_top',
	'default'         => 'shortcode',
	'priority'        => 10,
	'choices'         => array(
		'url'       => esc_html__( 'URL', 'caleader' ),
		'shortcode' => esc_html__( 'Shortcode', 'caleader' ),

	),
	'active_callback' => array(
		array(
			'setting'  => 'add_your_item_btn',
			'operator' => '==',
			'value'    => 1,
		),
	),
);


$fields[] = array(
	'type'            => 'text',
	'settings'        => 'add_button_url',
	'label'           => esc_html__( 'Header Button Url', 'caleader' ),
	'section'         => 'header_top',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'add_button_func',
			'operator' => '==',
			'value'    => 'url',
		),
		array(
			'setting'  => 'add_your_item_btn',
			'operator' => '==',
			'value'    => 1,
		),
	),

);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'top_bar_menu',
	'label'    => esc_html__( 'Top Bar Menu on/off', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'header_transparent',
	'label'    => esc_html__( 'Header Background Transparent', 'caleader' ),
	'section'  => 'header_top',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);
if ( class_exists( 'CompareElement' ) ) {
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'compare_plugin',
		'label'    => esc_html__( 'Compare between products??', 'caleader' ),
		'section'  => 'header_top',
		'default'  => '0',
		'priority' => 10,
		'choices'  => array(
			'on'  => esc_html__( 'Enable', 'caleader' ),
			'off' => esc_html__( 'Disable', 'caleader' ),
		),
	);
}


$fields[] = array(
	'type'     => 'textarea',
	'settings' => 'header_address',
	'label'    => esc_html__( 'Header Address', 'caleader' ),
	'section'  => 'header_top',
	'default'  => esc_html__( '3261 Anmoore Road, NY 11230', 'caleader' ),
	'priority' => 10,

);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'header_phone_title',
	'label'    => esc_html__( 'Header Phone Title', 'caleader' ),
	'section'  => 'header_top',
	'default'  => esc_html__( 'Call Us:', 'caleader' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'header_address_phone',
	'label'    => esc_html__( 'Header Phone', 'caleader' ),
	'section'  => 'header_top',
	'default'  => esc_html__( '+01 123 456 78', 'caleader' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'textarea',
	'settings' => 'header_address_time',
	'label'    => esc_html__( 'Header Time', 'caleader' ),
	'section'  => 'header_top',
	'default'  => esc_html__( '9:00 AM – 8:00 PM', 'caleader' ),
	'priority' => 10,
);

// email

$fields[] = array(
	'type'     => 'text',
	'settings' => 'header_address_email',
	'label'    => esc_html__( 'Header Email', 'caleader' ),
	'section'  => 'header_top',
	'default'  => esc_html__( 'info@youremal.com', 'caleader' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'header_address_wapp',
	'label'    => esc_html__( 'Header Whatsapp No.', 'caleader' ),
	'section'  => 'header_top',
	'priority' => 10,
);
