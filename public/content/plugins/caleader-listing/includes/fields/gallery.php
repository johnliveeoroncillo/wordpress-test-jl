<?php
$prefix = '_carleader_listing_';
$fields     = [];
$fields[] = [
	'name' => esc_html__( 'Image Gallery', 'caleader-listing' ),
	'id'   => $prefix . 'gallery',
	'type' => 'image_advanced',
];
return [
	'id'         => $prefix . 'galleries',
	'title'      => esc_html__( 'Gallery', 'caleader-listing' ),
	'post_types' => 'carleader-listing',
	'priority'   => 'low',
	'fields'     => $fields,
	'tab_style' => 'left',
];
?>