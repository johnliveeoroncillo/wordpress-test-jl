<?php



$fields[] = array(
	'type'     => 'radio-image',
	'settings' => 'footer_style',
	'label'    => esc_html__( 'Footer Style', 'caleader' ),
	'section'  => 'footer',
	'default'  => 'layout1',
	'priority' => 10,
	'choices'  => array(
		'layout1' => esc_url( get_template_directory_uri() . '/assets/images/car_footer.png' ),
		'layout2' => esc_url( get_template_directory_uri() . '/assets/images/moto_footer.png' ),
		'layout3' => esc_url( get_template_directory_uri() . '/assets/images/yacht_footer.png' ),
	),
);

$fields[] = array(
	'type'     => 'select',
	'settings' => 'footer_system',
	'label'    => esc_html__( 'Footer Type', 'caleader' ),
	'section'  => 'footer',
	'default'  => 'default',
	'priority' => 10,
	'choices'  => array(
		'default'   => esc_html__( 'Default', 'caleader' ),
		'elementor' => esc_html__( 'Elementor', 'caleader' ),

	),
);

$fields[] = array(
	'type'            => 'select',
	'settings'        => 'footer_elementor_template',
	'label'           => esc_html__( 'Select Elemenotr Templates', 'caleader' ),
	'section'         => 'footer',
	'default'         => 'default',
	'priority'        => 10,
	'choices'         => caleader_get_elementor_saved_templates(),
	'active_callback' => array(
		array(
			'setting'  => 'footer_system',
			'operator' => '==',
			'value'    => 'elementor',
		),
	),
);

$fields[] = array(
	'type'     => 'image',
	'settings' => 'footer_back_image',
	'label'    => esc_html__( 'Footer Background', 'caleader' ),
	'section'  => 'footer',
);
$fields[] = array(
	'type'        => 'image',
	'settings'    => 'footer_logo',
	'label'       => esc_html__( 'Footer Site Logo', 'caleader' ),
	'description' => esc_html__( 'Dark Logo for header', 'caleader' ),
	'section'     => 'footer',
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'footer_menu_show',
	'label'    => esc_html__( 'Footer Menu', 'caleader' ),
	'section'  => 'footer',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'footer_bottom_widget',
	'label'    => esc_html__( 'Footer widget', 'caleader' ),
	'section'  => 'footer',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'select',
	'settings' => 'footer_map_type',
	'label'    => esc_html__( 'Footer Map Type', 'caleader' ),
	'section'  => 'footer',
	'default'  => 'image',
	'priority' => 10,
	'choices'  => array(
		'image' => esc_html__( 'Image', 'caleader' ),
		'map'   => esc_html__( 'Map', 'caleader' ),

	),
);


$fields[] = array(
	'type'            => 'image',
	'settings'        => 'map_image',
	'label'           => esc_html__( 'Footer Map Image', 'caleader' ),
	'section'         => 'footer',
	'default'         => '',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'image',
		),
	),
);



$fields[] = array(
	'type'            => 'switch',
	'settings'        => 'footer_map',
	'label'           => esc_html__( 'Footer Map', 'caleader' ),
	'section'         => 'footer',
	'default'         => '0',
	'priority'        => 10,
	'choices'         => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'text',
	'settings'        => 'zoom',
	'label'           => esc_html__( 'Zoom', 'caleader' ),
	'section'         => 'footer',
	'default'         => '14',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'text',
	'settings'        => 'marker_name',
	'label'           => esc_html__( 'Marker Name', 'caleader' ),
	'section'         => 'footer',
	'default'         => esc_html__( 'caleader', 'caleader' ),
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'image',
	'settings'        => 'marker_image',
	'label'           => esc_html__( 'Marker Image', 'caleader' ),
	'section'         => 'footer',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'text',
	'settings'        => 'lattitude',
	'label'           => esc_html__( 'Lattitude', 'caleader' ),
	'section'         => 'footer',
	'default'         => '59.3',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'text',
	'settings'        => 'longi',
	'label'           => esc_html__( 'Longitude', 'caleader' ),
	'section'         => 'footer',
	'default'         => '18.0941403',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'            => 'text',
	'settings'        => 'google_api',
	'label'           => esc_html__( 'Google Map Api Key', 'caleader' ),
	'section'         => 'footer',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'footer_map',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'footer_map_type',
			'operator' => '==',
			'value'    => 'map',
		),
	),
);

$fields[] = array(
	'type'        => 'image',
	'settings'    => 'footer_subscriber_bg_image',
	'label'       => esc_html__( 'Footer Subscriber Background', 'caleader' ),
	'description' => esc_html__( 'Footer Subscriber Background', 'caleader' ),
	'section'     => 'footer',
);

$fields[] = array(
	'type'     => 'textarea',
	'settings' => 'footer_subscriber_content',
	'label'    => esc_html__( 'Subscribe', 'caleader' ),
	'section'  => 'footer',
	'default'  => '',
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'copyright',
	'label'    => esc_html__( 'Copyright text', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_html__( 'Copyright 2019', 'caleader' ),
	'priority' => 10,
);


$fields[] = array(
	'type'     => 'text',
	'settings' => 'privacy',
	'label'    => esc_html__( 'Privacy Statement', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_html__( 'PRIVACY POLICY', 'caleader' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'privacy_link',
	'label'    => esc_html__( 'Privacy Statement Link', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'tremsandcondition',
	'label'    => esc_html__( 'Terms Of Use', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_html__( 'terms of use', 'caleader' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'tremsandcondition_link',
	'label'    => esc_html__( 'Terms Of Use Link', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);


$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialfb',
	'label'    => esc_html__( 'Facebook Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialtw',
	'label'    => esc_html__( 'Twitter Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialgp',
	'label'    => esc_html__( 'Google plus Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialig',
	'label'    => esc_html__( 'Instagram Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialyt',
	'label'    => esc_html__( 'Youtube Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialvk',
	'label'    => esc_html__( 'Vkontakte Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialvm',
	'label'    => esc_html__( 'Vimeo Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialwhtsapp',
	'label'    => esc_html__( 'WhatsApp Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialli',
	'label'    => esc_html__( 'LinkedIn Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialsk',
	'label'    => esc_html__( 'Skype Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'socialam',
	'label'    => esc_html__( 'Amazon Url', 'caleader' ),
	'section'  => 'footer',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'back_to_top',
	'label'    => esc_html__( 'Back To Top', 'caleader' ),
	'section'  => 'footer',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);
