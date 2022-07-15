<?php

function kirki_caleader_sections( $wp_customize ) {
	 /**
   * Add panels
   */
	$wp_customize->add_panel(
		'theme_options',
		array(
			'priority' => 10,
			'title'    => esc_html__( 'Caleader Theme Options', 'caleader' ),
		)
	);

	/**
	 * Add sections
	 */

	$wp_customize->add_section(
		'general_settings',
		array(
			'title'    => esc_html__( 'General Settings', 'caleader' ),
			'priority' => 10,
			'panel'    => 'theme_options',
		)
	);

	$wp_customize->add_section(
		'header_top',
		array(
			'title'    => esc_html__( 'Header', 'caleader' ),
			'priority' => 10,
			'panel'    => 'theme_options',
		)
	);

	$wp_customize->add_section(
		'typography',
		array(
			'title'    => esc_html__( 'Typography', 'caleader' ),
			'priority' => 10,
			'panel'    => 'theme_options',
		)
	);

	$wp_customize->add_section(
		'blog',
		array(
			'title'    => esc_html__( 'Blog Setting', 'caleader' ),
			'priority' => 25,
			'panel'    => 'theme_options',
		)
	);
	$wp_customize->add_section(
		'footer',
		array(
			'title'    => esc_html__( 'Footer Style', 'caleader' ),
			'priority' => 30,
			'panel'    => 'theme_options',
		)
	);
	$wp_customize->add_section(
		'modal_shortcode',
		array(
			'title'    => esc_html__( 'Modal Setting', 'caleader' ),
			'priority' => 40,
			'panel'    => 'theme_options',
		)
	);
	$wp_customize->add_section(
		'extra_setting',
		array(
			'title'    => esc_html__( 'Extra Setting', 'caleader' ),
			'priority' => 40,
			'panel'    => 'theme_options',
		)
	);

}
add_action( 'customize_register', 'kirki_caleader_sections' );

function kirki_caleader_fields( $fields ) {
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/top_header.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/general_settings.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/footer_style.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/typography.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/modal.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/blog.php';
	include_once CALEADER_FREAMWORK_DIRECTORY . '/customizer/extra_setting.php';
	return $fields;

}
add_filter( 'kirki/fields', 'kirki_caleader_fields' );
