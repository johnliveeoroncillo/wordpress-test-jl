<?php

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'blog_breadcrumbs',
	'label'    => esc_html__( 'Breadcrumbs Show/Hide', 'caleader' ),
	'section'  => 'blog',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'blog_author',
	'label'    => esc_html__( 'Author Show/Hide', 'caleader' ),
	'section'  => 'blog',
	'default'  => 1,
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'blog_date',
	'label'    => esc_html__( 'Date Show/Hide', 'caleader' ),
	'section'  => 'blog',
	'default'  => 1,
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);


$fields[] = array(
	'type'     => 'switch',
	'settings' => 'social_share',
	'label'    => esc_html__( 'Social Share', 'caleader' ),
	'section'  => 'blog',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'userfb',
	'label'    => esc_html__( 'User Facebook Url', 'caleader' ),
	'section'  => 'blog',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);

$fields[] = array(
	'type'     => 'text',
	'settings' => 'usertw',
	'label'    => esc_html__( 'User Twitter Url', 'caleader' ),
	'section'  => 'blog',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'text',
	'settings' => 'usergp',
	'label'    => esc_html__( 'User Google plus Url', 'caleader' ),
	'section'  => 'blog',
	'default'  => esc_url( '#' ),
	'priority' => 10,
);
$fields[] = array(
	'type'     => 'switch',
	'settings' => 'menu_deafult',
	'label'    => esc_html__( 'Menu default', 'caleader' ),
	'section'  => 'blog',
	'default'  => '1',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Enable', 'caleader' ),
		'off' => esc_html__( 'Disable', 'caleader' ),
	),
);

$fields[] = array(
	'type'     => 'switch',
	'settings' => 'page_design_layout',
	'label'    => esc_html__( 'Page design layout', 'caleader' ),
	'section'  => 'blog',
	'default'  => '0',
	'priority' => 10,
	'choices'  => array(
		'on'  => esc_html__( 'Blog style', 'caleader' ),
		'off' => esc_html__( 'Page style', 'caleader' ),
	),
);
