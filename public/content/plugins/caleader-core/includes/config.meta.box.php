<?php
function cacarleader_get_meta_box( $meta_boxes ) {
	$prefix       = 'framework';
	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-quote',
		'title'     => esc_html__( 'Post Format Data', 'caleader' ), 'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Quote Text', 'caleader' ),
				'desc' => esc_html__( 'Insert Quote Text.', 'caleader' ),
				'id'   => "{$prefix}_quote",
				'type' => 'textarea',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-video',
		'title'     => esc_html__( 'Post Format Data', 'caleader' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Video Markup', 'caleader' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'caleader' ),
				'id'   => "{$prefix}_video_markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);
	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-audio',
		'title'     => esc_html__( 'Post Format Data', 'caleader' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Audio Markup', 'caleader' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'caleader' ),
				'id'   => "{$prefix}_audio_markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);
	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-link',
		'title'     => esc_html__( 'Post Format Data', 'caleader' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Link', 'caleader' ),
				'desc' => esc_html__( 'Works with link post format.', 'caleader' ),
				'id'   => "{$prefix}_link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Link title', 'caleader' ),
				'desc' => esc_html__( 'Works with link post format.', 'caleader' ),
				'id'   => "{$prefix}_link_title",
				'type' => 'text',
			),
		),
	);
	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-gallery',
		'title'     => esc_html__( 'Post Format Data', 'caleader' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(

			array(
				'name'             => esc_html__( 'Upload Gallery Images', 'caleader' ),
				'id'               => "{$prefix}_gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 24,

			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'framework-meta-box-carleader',
		'title'      => esc_html__( 'Manage Services Meta Fields', 'caleader-core' ),
		'post_types' => array( 'carleader_services' ),
		'context'    => 'normal',
		'priority'   => 'default',
		'autosave'   => 'false',
		'fields'     => array(
			array(
				'id'   => $prefix . '_service_icon',
				'type' => 'text',
				'name' => esc_html__( 'Service Icon', 'caleader-core' ),
				'desc' => esc_html__( 'Hover Service Icon', 'caleader-core' ),
			),
			array(
				'id'   => $prefix . '_service_short_description',
				'type' => 'textarea',
				'name' => esc_html__( 'Short Description', 'caleader-core' ),
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'cacarleader_get_meta_box' );