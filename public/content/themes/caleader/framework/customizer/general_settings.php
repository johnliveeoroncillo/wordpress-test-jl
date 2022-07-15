<?php


$fields[] = array(
	'type'     => 'switch',
	'settings' => 'sticky_header',
	'label'    => esc_html__( 'Sticky Header Show/Hide', 'caleader' ),
	'section'  => 'general_settings',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'title_section',
	'label'    => esc_html__( 'Page Title Section Show/Hide', 'caleader' ),
	'section'  => 'general_settings',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'breadcrumbs',
	'label'    => esc_html__( 'Breadcrumbs Show/Hide', 'caleader' ),
	'section'  => 'general_settings',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'        => 'image',
	'settings'    => 'sticky_logo',
	'label'       => esc_html__( 'Sticky Header Logo', 'caleader' ),
	'description' => esc_html__( 'Sticky Header Logo', 'caleader' ),
	'section'     => 'general_settings',
);




$fields[] = array(
	'type'     => 'radio-image',
	'settings' => 'site_color',
	'label'    => esc_html__( 'Radio Control', 'caleader' ),
	'section'  => 'general_settings',
	'default'  => 'red',
	'priority' => 10,
	'choices'  => array(
		'default' => esc_url( get_template_directory_uri() . '/assets/images/customizer/default.png' ),
		'one'     => esc_url( get_template_directory_uri() . '/assets/images/customizer/one.png' ),
		'two'     => esc_url( get_template_directory_uri() . '/assets/images/customizer/two.png' ),
		'three'   => esc_url( get_template_directory_uri() . '/assets/images/customizer/three.png' ),
		'four'    => esc_url( get_template_directory_uri() . '/assets/images/customizer/four.png' ),
		'five'    => esc_url( get_template_directory_uri() . '/assets/images/customizer/five.png' ),
		'six'     => esc_url( get_template_directory_uri() . '/assets/images/customizer/six.png' ),
		'seven'   => esc_url( get_template_directory_uri() . '/assets/images/customizer/custom.png' ),
	),
);

$fields[] = array(
	'type'            => 'color',
	'settings'        => 'color_setting_hex',
	'label'           => __( 'Color Control (hex-only)', 'caleader' ),
	'description'     => esc_html__( 'This is a color control - without alpha channel.', 'caleader' ),
	'section'         => 'general_settings',
	'default'         => '#0088CC',
	'priority'        => 10,
	'active_callback' => array(
		array(
			'setting'  => 'site_color',
			'operator' => '==',
			'value'    => 'seven',
		),
	),

);

$fields[] = array(
	'type'            => 'color',
	'settings'        => 'top_bar_color',
	'label'           => __( 'Top Bar Background Color (hex-only)', 'caleader' ),
	'description'     => esc_html__( 'This is a color control - without alpha channel.', 'caleader' ),
	'section'         => 'general_settings',
	'default'         => '#333333',
	'priority'        => 10,
);

$fields[] = array(
	'type'            => 'color',
	'settings'        => 'footer_bottom_color',
	'label'           => __( 'Footer Bottom Background Color (hex-only)', 'caleader' ),
	'description'     => esc_html__( 'This is a color control - without alpha channel.', 'caleader' ),
	'section'         => 'general_settings',
	'default'         => '#fff',
	'priority'        => 10,
);

$fields[] = array(
	'type'            => 'color',
	'settings'        => 'copy_text_color',
	'label'           => __( 'Copywrite Text Color (hex-only)', 'caleader' ),
	'description'     => esc_html__( 'This is a color control - without alpha channel.', 'caleader' ),
	'section'         => 'general_settings',
	'default'         => '#707070',
	'priority'        => 10,
);