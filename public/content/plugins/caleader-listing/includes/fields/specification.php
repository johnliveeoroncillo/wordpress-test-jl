<?php
$prefix      = '_carleader_listing_';
$fields      = [];
$spec_fields = carleader_listings_spec_fields();
$display     = carleader_listings_option( 'field_display' );
foreach ( $spec_fields as $id => $value ) {
	if ( is_array( $display ) && ! in_array( $id, $display ) ) {
		continue;
	}

	if ( $value['label'] == esc_html__( 'Make', 'caleader-listing' ) ) {
		$fields[] = [
			'name'     => $value['label'],
			'id'       => $prefix . $id,
			'type'     => 'taxonomy',
			'taxonomy' => 'make-brand',
			'columns'  => 3,
		];
	} elseif ( $value['type'] == 'select' ) {
		$fields[] = [
			'name'    => $value['label'],
			'id'      => $prefix . $id,
			'type'    => $value['type'],
			'options' => $value['options'],
			'columns' => 3,
		];
	} else {
		$fields[] = [
			'name'    => $value['label'],
			'id'      => $prefix . $id,
			'type'    => $value['type'],
			'columns' => 3,
		];
	}
}
$fields = apply_filters( 'carleader_listings_metabox_specifications', $fields );
ksort( $fields );
return [
	'id'         => $prefix . 'specs',
	'title'      => esc_html__( 'Specifications', 'caleader-listing' ),
	'post_types' => 'carleader-listing',
	'priority'   => 'low',
	'fields'     => $fields,
];
