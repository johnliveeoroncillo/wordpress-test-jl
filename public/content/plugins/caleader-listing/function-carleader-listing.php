<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function carleader_listings_spec_fields() {
	 $spec_fields = array(
		 'model_year'              => array(
			 'label' => esc_html__( 'Year', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'make_display'            => array(
			 'label' => esc_html__( 'Make', 'caleader-listing' ),
			 'type'  => 'taxonomy',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'model_description'       => array(
			 'label' => esc_html__( 'Description', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'model_name'              => array(
			 'label' => esc_html__( 'Model', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'color'                   => array(
			 'label' => esc_html__( 'Color', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'int_color'               => array(
			 'label' => esc_html__( 'Intereior Color', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'drivetrain'              => array(
			 'label'            => esc_html__( 'Drivetrain', 'caleader-listing' ),
			 'type'             => 'select',
			 'show_option_none' => true,
			 'options'          => carleader_listings_available_drivetrains(),
		 ),
		 'model_transmission_type' => array(
			 'label'   => esc_html__( 'Transmission Type', 'caleader-listing' ),
			 'type'    => 'select',
			 'options' => carleader_listings_available_transmissions(),
		 ),
		 'vin'                     => array(
			 'label' => esc_html__( 'VIN', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'engine'                  => array(
			 'label' => esc_html__( 'Engine', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'stock'                   => array(
			 'label' => esc_html__( 'Stock Number', 'caleader-listing' ),
			 'type'  => 'text',
			 'desc'  => esc_html__( ' (Recommended)', 'caleader-listing' ),
		 ),
		 'model_engine_fuel'       => array(
			 'label'   => esc_html__( 'Fuel Type', 'caleader-listing' ),
			 'type'    => 'select',
			 'options' => carleader_listings_available_fuels(),
		 ),
		 'hours'                   => array(
			 'label' => esc_html__( 'Hours', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'wheelbase'               => array(
			 'label' => esc_html__( 'Wheelbase', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'wheels'                  => array(
			 'label' => esc_html__( 'Wheels', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'front_axle'              => array(
			 'label' => esc_html__( 'Front Axle', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'rear_axle'               => array(
			 'label' => esc_html__( 'Rear Axle', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'ratio'                   => array(
			 'label' => esc_html__( 'Ratio', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'suspension'              => array(
			 'label' => esc_html__( 'Suspension', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'breaks'                  => array(
			 'label' => esc_html__( 'Brakes', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'frame'                   => array(
			 'label' => esc_html__( 'Frame', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'front_tires'             => array(
			 'label' => esc_html__( 'Front Tires', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'rear_tires'              => array(
			 'label' => esc_html__( 'Rear Tires', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'gvwr'                    => array(
			 'label' => esc_html__( 'GVWR', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'tare'                    => array(
			 'label' => esc_html__( 'Tare', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'fuel_tanks'              => array(
			 'label' => esc_html__( 'Fuel Tanks', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'code'                    => array(
			 'label' => esc_html__( 'Code', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'product'                 => array(
			 'label' => esc_html__( 'Product', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'shell_material'          => array(
			 'label' => esc_html__( 'Shell Material', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
		 'options_description'     => array(
			 'label' => esc_html__( 'Options/ Description', 'caleader-listing' ),
			 'type'  => 'text',
		 ),
	 );
	 $fields      = array_merge( $spec_fields );
	 return $fields;
}
function carleader_listings_price( $price = null ) {
	if ( $price == null ) {
		$price = carleader_listings_meta( 'price' );
	}
	return carleader_listings_format_price( $price );
}
function carleader_listings_miles( $miles = null, $suff = true ) {
	if ( ! $miles ) {
		$miles = carleader_listings_meta( 'miles' );
	}
	if ( $suff ) {
		return carleader_listings_format_miles( $miles ) . ' ' . carleader_listings_option( 'odometer' );

	} else {
		return carleader_listings_format_miles( $miles );

	}
}
/*
 * Outputs the vehicle
 */
function carleader_listings_vehicle() {
	 $output = carleader_listings_meta( 'model_vehicle' );
	return $output;
}
function carleader_listings_title() {
	$title_format = carleader_listings_option( 'title_format' );

	if ( ! isset( $title_format ) || $title_format == '' ) {
		$title_format = array(
			'0' => 'model_year',
			'1' => 'make_display',
			'2' => 'model_name',
		);
	}

	if ( ! is_array( $title_format ) ) {
		$title_format = array( $title_format );
	}

	$listing_title = '';

	foreach ( $title_format as $val ) {
		$component = carleader_listings_meta( $val );
		if ( $component == 'awd' ) {
			$component = esc_html__( 'All-Wheel Drive', 'caleader-listing' );
		} elseif ( $component == 'fwd' ) {
			$component = esc_html__( 'Four-WHEEL DRIVE', 'caleader-listing' );
		} elseif ( $component == 'frwd' ) {
			$component = esc_html__( 'Front-Wheel Drive', 'caleader-listing' );
		} elseif ( $component == 'rwd' ) {
			$component = esc_html__( 'Rear-Wheel Drive', 'caleader-listing' );
		} elseif ( $component == 'at' ) {
			$component = esc_html__( 'Automatic Transmission', 'caleader-listing' );
		} elseif ( $component == 'mt' ) {
			$component = esc_html__( 'Manual Transmission', 'caleader-listing' );
		} elseif ( $component == 'am' ) {
			$component = esc_html__( 'Automated Manual Transmission', 'caleader-listing' );
		} elseif ( $component == 'cvt' ) {
			$component = esc_html__( 'Continuously Variable Transmission', 'caleader-listing' );
		} elseif ( $component == 'gas' ) {
			$component = esc_html__( 'Gasoline', 'caleader-listing' );
		} elseif ( $component == 'diesel' ) {
			$component = esc_html__( 'Diesel', 'caleader-listing' );
		} elseif ( $component == 'cng' ) {
			$component = esc_html__( 'Compressed Natural Gas', 'caleader-listing' );
		} elseif ( $component == 'lp' ) {
			$component = esc_html__( 'Liquefied Petroleum', 'caleader-listing' );
		} elseif ( $component == 'bdiesel' ) {
			$component = esc_html__( 'Bio-diesel', 'caleader-listing' );
		} elseif ( $component == 'ethanol' ) {
			$component = esc_html__( 'Ethanol', 'caleader-listing' );
		} elseif ( $component == 'petrol' ) {
			$component = esc_html__( 'Petrol', 'caleader-listing' );
		}

		$listing_title .= $component . ' ';
	}

	return $listing_title;
}
function carleader_listings_description() {
	 $description = carleader_listings_meta( 'model_description' );
	return $description;
}
function carleader_listings_model() {
	$model = carleader_listings_meta( 'model_name' );
	return $model;
}
/**
 * Get the meta af any item
 */
function carleader_listings_meta( $meta, $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	if ( $meta == 'enquiries' ) {
		$meta_key = '_listing_enqury_' . $meta;
	} else {
		$meta_key = '_carleader_listing_' . $meta;
	}

	if ( function_exists( 'rwmb_meta' ) ) {

		$data = rwmb_meta( $meta_key );

	} else {
		$data = get_post_meta( $post_id, $meta_key, true );

	}
	if ( is_object( $data ) ) {
		$data = $data->name;
	}

	return $data;
}
function carleader_listings_available_listing_conditions() {
	$data                 = carleader_listings_option( 'carleader_condition_type' );
	$additional_condition = carleader_listings_option( 'additional_condition' );

	if ( ! isset( $data ) || empty( $data ) ) {
		$data = array();
	}
	if ( isset( $additional_condition ) && $additional_condition != '' ) {
		$additional_condition = explode( "\n", $additional_condition );
		$data                 = array_merge( $data, $additional_condition );
	}

	$array = array();
	if ( $data ) {
		foreach ( $data as $d ) {
			if ( $d == 'NEW' ) {
				$array[ $d ] = esc_html__( 'NEW', 'caleader-listing' );
			} elseif ( $d == 'CERTIFIED' ) {
				$array[ $d ] = esc_html__( 'CERTIFIED', 'caleader-listing' );
			} elseif ( $d == 'USED' ) {
				$array[ $d ] = esc_html__( 'USED', 'caleader-listing' );
			} elseif ( $d == 'sold_out' ) {
				$array[ $d ] = esc_html__( 'Sold Out', 'caleader-listing' );
			} else {
				$key           = str_replace( ' ', '_', strtolower( $d ) );
				$array[ $key ] = $d;
			}
		}
	}
	return $array;
}
function carleader_listings_available_drivetrains() {
	$data = carleader_listings_option( 'carleader_drivetrain' );
	if ( ! isset( $data ) || empty( $data ) ) {
		$data = array();
	}
	$additional_drivetrain = carleader_listings_option( 'additional_drivetrain' );
	if ( isset( $additional_drivetrain ) && $additional_drivetrain != '' ) {
		$additional_drivetrain = explode( "\n", $additional_drivetrain );
		$data                  = array_merge( $data, $additional_drivetrain );
	}

	$array = array();
	if ( $data ) {
		foreach ( $data as $d ) {
			if ( $d == 'awd' ) {
				$array[ $d ] = esc_html__( 'All-Wheel Drive', 'caleader-listing' );
			} elseif ( $d == 'fwd' ) {
				$array[ $d ] = esc_html__( 'Four-WHEEL DRIVE', 'caleader-listing' );
			} elseif ( $d == 'frwd' ) {
				$array[ $d ] = esc_html__( 'Front-Wheel Drive', 'caleader-listing' );
			} elseif ( $d == 'rwd' ) {
				$array[ $d ] = esc_html__( 'Rear-Wheel Drive', 'caleader-listing' );
			} else {
				$key           = str_replace( ' ', '_', strtolower( $d ) );
				$key           = trim( $key );
				$array[ $key ] = $d;
			}
		}
	}

	return $array;
}


add_action( 'wp_ajax_caleader_ajax_search', 'caleader_listing_ajax_search' );
add_action( 'wp_ajax_nopriv_caleader_ajax_search', 'caleader_listing_ajax_search' );

function caleader_listing_ajax_search() {
	$home_filter_fileds = carleader_listings_option( 'home_filter_fileds' );
	$val                = $_POST['value_select'];
	$key                = $_POST['key_select'];

	$fileds = array(
		'condition',
		'the_year',
		'make',
		'model',
		'price',
	);

	if ( ! isset( $home_filter_fileds ) || empty( $home_filter_fileds ) ) {
		$home_filter_fileds = $fileds;
	}
	if ( $key == 'ext_color' ) {
		$key = 'color';
	} elseif ( $key == 'model_transmission_type' ) {
		$key = 'transmission';
	} elseif ( $key == 'model_engine_fuel' ) {
		$key = 'fuel_type';
	}
	$current = array_search( $key, $home_filter_fileds );
	$next    = $home_filter_fileds[ $current + 1 ];

	if ( $next == 'transmission' ) {
		$next = 'model_transmission_type';
	}

	$return = get_meta_vals( $val, $key, $next );
	if ( $next == 'color' ) {
		$next = 'ext_color';
	} elseif ( $next == 'fuel_type' ) {
		$next = 'model_engine_fuel';
	}
	$return['next'] = $next;
	$return         = json_encode( $return );

	echo $return;
	die();
}

function get_meta_vals( $meta, $dependon, $dependant ) {
	$args  = array();
	$q_key = '';

	if ( $dependon == 'make' ) {
		$q_key = 'make-brand';
	} elseif ( $dependon == 'body_type' ) {
		$q_key = 'body-type';
	} elseif ( $dependon == 'model' ) {
		$q_key = 'model_name';
	} elseif ( $dependon == 'odometer' ) {
		$q_key = 'miles';
	} elseif ( $dependon == 'the_year' ) {
		$q_key = 'model_year';
	} elseif ( $dependon == 'ext_color' ) {
		$q_key = 'color';
	} elseif ( $dependon == 'transmission' ) {
		$q_key = 'model_transmission_type';
	} elseif ( $dependon == 'fuel_type' ) {
		$q_key = 'model_engine_fuel';
	} else {
		$q_key = $dependon;
	}

	if ( $q_key == 'make-brand' || $q_key == 'body-type' ) {
		$args['tax_query'][] = array(
			'taxonomy' => $q_key,
			'field'    => 'slug',
			'terms'    => $meta,
		);
	} else {
		if ( $q_key == 'price' || $q_key == 'miles' ) {
			$min  = 0;
			$type = '';
			if ( $q_key == 'price' ) {
				$type = 'DECIMAL';
			} else {
				$meta = floatval( $meta );
				$type = 'NUMERIC';
			}
			$args['meta_query'][] = array(
				'key'     => '_carleader_listing_' . $q_key,
				'value'   => array( $min, $meta ),
				'compare' => 'BETWEEN',
				'type'    => $type,
			);
		} else {
			$compare = 'IN';
			if ( $q_key == 'color' || $q_key == 'model_name' ) {
				$compare = '=';
			}
			$args['meta_query'][] = array(
				'key'     => '_carleader_listing_' . $q_key,
				'value'   => $meta,
				'compare' => $compare,
				'orderby' => 'value',
				'order' => 'ASC',
			);
		}
	}

	$args['post_type'] = 'carleader-listing';
	$query             = new WP_Query( $args );
	$post_ids          = wp_list_pluck( $query->posts, 'ID' );
	$return            = get_metavals_by_posts( $dependant, $post_ids );

	
	if ( $dependant == 'make' || $dependant == 'body' ) {
		asort($return);
	}else{
		sort($return);
	}
	$return['result'] = $query->found_posts;
	return $return;
}

function get_metavals_by_posts( $needle, $haystack ) {
	global $wpdb;
	$pref = '_carleader_listing_';
	if ( $needle == 'model' ) {
		$needle = $pref . 'model_name';
		$needle = trim( $needle );
	} elseif ( $needle == 'odometer' ) {
		$needle = $pref . 'miles';
		$needle = trim( $needle );
	} elseif ( $needle == 'make' ) {
		$needle = 'make-brand';
	} elseif ( $needle == 'body_type' ) {
		$needle = 'body-type';
	} elseif ( $needle == 'transmission' ) {
		$needle = $pref . 'model_transmission_type';
		$needle = trim( $needle );
	} elseif ( $needle == 'the_year' ) {
		$needle = $pref . 'model_year';
		$needle = trim( $needle );
	} elseif ( $needle == 'fuel_type' ) {
		$needle = $pref . 'model_engine_fuel';
		$needle = trim( $needle );
	} else {
		$needle = $pref . $needle;
		$needle = trim( $needle );
	}

	if ( $needle == 'make-brand' || $needle == 'body-type' ) {
		$my_terms   = wp_get_object_terms( $haystack, $needle );
		$term_slugs = wp_list_pluck( $my_terms, 'name', 'slug' );
		return $term_slugs;
	} else {
		$haystack = implode( ',', $haystack );
		$query    = $wpdb->prepare(
			"SELECT distinct(meta_value) FROM {$wpdb->postmeta} WHERE  meta_key='%s' AND post_id IN ($haystack) ",
			$needle
		);
		return $wpdb->get_col( $query );
	}
}

// add_action( 'wp_ajax_caleader_multiple_ajax_search', 'caleader_listing_multiple_ajax_search' );
// add_action( 'wp_ajax_nopriv_caleader_multiple_ajax_search', 'caleader_listing_multiple_ajax_search' );

// function caleader_listing_multiple_ajax_search(){

// 	$key_select = $_POST['key_select'];
// 	$key_select = str_replace('[]','',$key_select);
// 	$value_select = $_POST['value_select'];

// 	$archive_filter_fileds = carleader_listings_option( 'archive_filter_fileds' );
// 	$fields               = array(
// 		'condition',
// 		'the_year',
// 		'make',
// 		'model',
// 		'body_type',
// 		'odometer',
// 		'transmission',
// 		'drivetrain',
// 		'color',
// 		'int_color',
// 		'price',
// 	);

// 	if ( ! isset( $archive_filter_fileds ) || empty( $archive_filter_fileds ) ) {
// 		$archive_filter_fileds = $fields;
// 	}

// 	$curr_key = array_search($key_select, $archive_filter_fileds);
// 	if($curr_key){
// 		unset($archive_filter_fileds[$curr_key]);
// 		$archive_filter_fileds = array_values($archive_filter_fileds);
// 	}

// 	foreach($archive_filter_fileds as $nextfield){

		

// 	}
// }

function carleader_listings_available_transmissions() {
	 $data = carleader_listings_option( 'carleader_transmission' );
	if ( ! isset( $data ) || empty( $data ) ) {
		$data = array();
	}
	$additional_transmission = carleader_listings_option( 'additional_transmission' );
	if ( isset( $additional_transmission ) && $additional_transmission != '' ) {
		$additional_transmission = explode( "\n", $additional_transmission );
		$data                    = array_merge( $data, $additional_transmission );
	}
	$array = array();
	if ( $data ) {
		foreach ( $data as $d ) {
			if ( $d == 'at' ) {
				$array[ $d ] = esc_html__( 'Automatic Transmission', 'caleader-listing' );
			} elseif ( $d == 'mt' ) {
				$array[ $d ] = esc_html__( 'Manual Transmission', 'caleader-listing' );
			} elseif ( $d == 'am' ) {
				$array[ $d ] = esc_html__( 'Automated Manual Transmission', 'caleader-listing' );
			} elseif ( $d == 'cvt' ) {
				$array[ $d ] = esc_html__( 'Continuously Variable Transmission', 'caleader-listing' );
			} else {
				$key           = str_replace( ' ', '_', strtolower( $d ) );
				$key           = trim( $key );
				$array[ $key ] = $d;
			}
		}
	}

	return $array;
}
function carleader_listings_available_fuels() {
	 $data = carleader_listings_option( 'carleader_fuels' );
	if ( ! isset( $data ) || empty( $data ) ) {
		$data = array();
	}
	$additional_fuels = carleader_listings_option( 'additional_fuels' );
	if ( isset( $additional_fuels ) && $additional_fuels != '' ) {
		$additional_fuels = explode( "\n", trim( $additional_fuels ) );

		$data = array_merge( $data, $additional_fuels );
	}
	$array = array();
	if ( $data ) {
		foreach ( $data as $d ) {
			$d = trim( $d );
			if ( $d == 'gas' ) {
				$array[ $d ] = esc_html__( 'Gasoline', 'caleader-listing' );
			} elseif ( $d == 'diesel' ) {
				$array[ $d ] = esc_html__( 'Diesel', 'caleader-listing' );
			} elseif ( $d == 'cng' ) {
				$array[ $d ] = esc_html__( 'Compressed Natural Gas', 'caleader-listing' );
			} elseif ( $d == 'lp' ) {
				$array[ $d ] = esc_html__( 'Liquefied Petroleum', 'caleader-listing' );
			} elseif ( $d == 'bdiesel' ) {
				$array[ $d ] = esc_html__( 'Bio-diesel', 'caleader-listing' );
			} elseif ( $d == 'ethanol' ) {
				$array[ $d ] = esc_html__( 'Ethanol', 'caleader-listing' );
			} elseif ( $d == 'petrol' ) {
				$array[ $d ] = esc_html__( 'Petrol', 'caleader-listing' );
			} else {
				$key = str_replace( ' ', '_', strtolower( $d ) );
				$key = trim( $key );

				$array[ $key ] = $d;
			}
		}
	}

	return $array;
}
function carleader_listings_available_listing_years() {
	 $data = carleader_listings_option( 'product_year' );
	if ( ! is_array( $data ) ) {
		$optArray = explode( PHP_EOL, $data );
	} else {
		$optArray = $data;
	}
	$array = array();
	if ( $optArray ) {
		foreach ( $optArray as $d ) {
			$array[ $d ] = $d;
		}
	}
	return $array;
}
function carleader_listings_available_listing_models() {
	$data = carleader_listings_option( 'product_model' );
	if ( ! is_array( $data ) ) {
		$optArray = explode( PHP_EOL, $data );
	} else {
		$optArray = $data;
	}
	$array = array();
	if ( $optArray ) {
		foreach ( $optArray as $d ) {
			$array[ $d ] = $d;
		}
	}
	return $array;
}
function carleader_listings_available_prices() {
	$data = carleader_listings_option( 'product_price' );
	if ( ! is_array( $data ) ) {
		$optArray = explode( PHP_EOL, $data );
	} else {
		$optArray = $data;
	}
	$array = array();
	if ( $optArray ) {
		foreach ( $optArray as $d ) {
			$array[ $d ] = $d;
		}
	}
	return $array;
}
function carleader_listings_available_listing_colors() {
	$data = carleader_listings_option( 'product_color' );
	if ( ! is_array( $data ) ) {
		$optArray = explode( PHP_EOL, $data );
	} else {
		$optArray = $data;
	}
	$array = array();
	if ( $optArray ) {
		foreach ( $optArray as $d ) {
			$array[ $d ] = $d;
		}
	}
	return $array;
}
/*
 * Get vehicles in the database to populate search fields
 */
function carleader_listings_search_data() {
	$args  = apply_filters(
		'carleader_listings_search_get_vehicle_data_args',
		array(
			'post_type'   => 'carleader-listing',
			'numberposts' => -1,
			'post_status' => array( 'publish' ),
			'fields'      => 'ids',
		)
	);
	$items = get_posts( $args );
	$data  = array();
	if ( $items ) {
		foreach ( $items as $id ) {
			$data['year'][]      = get_post_meta( $id, '_carleader_listing_model_year', true );
			$data['model'][]     = get_post_meta( $id, '_carleader_listing_model_name', true );
			$data['color'][]     = get_post_meta( $id, '_carleader_listing_color', true );
			$data['int_color'][] = get_post_meta( $id, '_carleader_listing_int_color', true );
			$data['odometer'][]  = get_post_meta( $id, '_carleader_listing_miles', true );
			$data['price'][]     = get_post_meta( $id, '_carleader_listing_price', true );
			$data['price'][]     = get_post_meta( $id, '_carleader_listing_price', true );
		}
	}
	// remove empties and make unique
	foreach ( $data as $key => $value ) {
		$data[ $key ] = array_filter( $data[ $key ] );
		$data[ $key ] = array_unique( $data[ $key ] );
	}
	return $data;
}
function carleader_listings_enquiry_meta( $meta, $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	$meta_key = '_listing_enqury_' . $meta;
	$data     = get_post_meta( $post_id, $meta_key, true );
	return $data;
}
/**
 * Get any option
 */
function carleader_listings_option( $option ) {
	 $options = get_option( 'carleader_listings_options' );
	$return   = isset( $options[ $option ] ) ? $options[ $option ] : false;
	return $return;
}

function caleader_listing_get_url() {
	$search_page = carleader_listings_option( 'archive_page' );
	if ( isset( $search_page ) && $search_page != '' ) {
		$post        = get_post( $search_page );
		$search_page = $post->post_name;
	} else {
		$search_page = 'listings';
	}

	return home_url( '/' . $search_page );

}

function caleader_listing_set_posts_per_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'carleader-listing' ) ) {
		$per_page = carleader_listings_option( 'listing_post_per_page' );
		$query->set( 'posts_per_page', $per_page );
	}
}
add_action( 'pre_get_posts', 'caleader_listing_set_posts_per_page' );

add_image_size( 'thumbnail_listing', 770, 478, true );
add_image_size( 'archive_listing', 654, 525, true );

add_action( 'wp_footer', 'caleader_listing_footer_search' );
function caleader_listing_footer_search() {
	 $page_url = caleader_listing_get_url();

	$home_sticky_seacrh = carleader_listings_option( 'home_sticky_seacrh' );

	if ( ! isset( $home_sticky_seacrh ) ) {
		$home_sticky_seacrh = true;
	}

	if ( $home_sticky_seacrh ) {

		?>
<form id="tt-filters-aside-home" class="caleader-listings-search" autocomplete="off" action="<?php echo $page_url; ?>"
    method="GET" role="search">
    <div id="tt-detach-search-madal"></div>
</form>

<?php
	}

}

add_filter( 'body_class', 'caleader_listing_body_class' );
function caleader_listing_body_class( $classes ) {
	if ( is_singular( 'carleader-listing' ) ) {
		$classes[] = 'single-caleader-listing';
	}

	return $classes;
}


add_action( 'mb_settings_page_load', 'caleader_listing_flush_permalink' );

function caleader_listing_flush_permalink() {
	flush_rewrite_rules();
}

function caleader_listing_icon_arr() {
	$icon_arr = array(
		'none'                     => esc_html__( 'No Icon', 'caleader-listing' ),
		'icon-handsshake'          => 'icon-handsshake',
		'icon-icon'                => 'icon-icon',
		'icon-mail'                => 'icon-mail',
		'icon-15874'               => 'icon-15874',
		'icon-user'                => 'icon-user',
		'icon-cart'                => 'icon-cart',
		'icon-addcar'              => 'icon-addcar',
		'icon-mail1'               => 'icon-mail1',
		'icon-menu'                => 'icon-menu',
		'icon-musica-searcher'     => 'icon-musica-searcher',
		'icon-car-washing-machine' => 'icon-car-washing-machine',
		'icon-financing'           => 'icon-financing',
		'icon-carsearch2'          => 'icon-carsearch2',
		'icon-payment'             => 'icon-payment',
		'icon-tradein'             => 'icon-tradein',
		'icon-tradein2'            => 'icon-tradein2',
		'icon-testdrive'           => 'icon-testdrive',
		'icon-photo-camera'        => 'icon-photo-camera',
		'icon-compare'             => 'icon-compare',
		'icon-play'                => 'icon-play',
		'icon-price-tag1'          => 'icon-price-tag1',
		'icon-refresh-button'      => 'icon-refresh-button',
		'icon-left-arrow'          => 'icon-left-arrow',
		'icon-right-arrow'         => 'icon-right-arrow',
		'icon-right-arrow1'        => 'icon-right-arrow1',
		'icon-road'                => 'icon-road',
		'icon-soldout'             => 'icon-soldout',
		'icon-star'                => 'icon-star',
		'icon-user1'               => 'icon-user1',
		'icon-vehicles'            => 'icon-vehicles',
		'icon-report'              => 'icon-report',
		'icon-price-tag'           => 'icon-price-tag',
		'icon-awards'              => 'icon-awards',
		'icon-customers'           => 'icon-customers',
		'icon-staff'               => 'icon-staff',
		'icon-3665'                => 'icon-3665',
		'icon-8800'                => 'icon-8800',
		'icon-226234'              => 'icon-226234',
		'icon-733613'              => 'icon-733613',
		'icon-84466'               => 'icon-84466',
		'icon-546419'              => 'icon-546419',
		'icon-130415'              => 'icon-130415',
		'icon-149984'              => 'icon-149984',
		'icon-arrowdown'           => 'icon-arrowdown',
		'icon-arrowup'             => 'icon-arrowup',
		'icon-arrowsdown'          => 'icon-arrowsdown',
		'icon-arrowsup'            => 'icon-arrowsup',
		'icon-attachment'          => 'icon-attachment',
		'icon-calculator'          => 'icon-calculator',
		'icon-carsearch'           => 'icon-carsearch',
		'icon-check-mark'          => 'icon-check-mark',
		'icon-close'               => 'icon-close',
		'icon-done-tick'           => 'icon-done-tick',
		'icon-filer'               => 'icon-filer',
		'icon-grid'                => 'icon-grid',
		'icon-listing'             => 'icon-listing',
		'icon-5'                   => 'icon-5',
		'icon-618867'              => 'icon-618867',
		'icon-tools'               => 'icon-tools',
		'icon-y1'                  => 'icon-y1',
		'icon-y2'                  => 'icon-y2',
		'icon-y3'                  => 'icon-y3',
		'icon-y4'                  => 'icon-y4',
		'icon-y5'                  => 'icon-y5',
		'icon-1'                   => 'icon-1',
		'icon-2'                   => 'icon-2',
		'icon-3'                   => 'icon-3',
		'icon-4'                   => 'icon-4',
		'icon-inventory'           => 'icon-inventory',
		'icon-financing1'          => 'icon-financing1',
		'icon-tradein1'            => 'icon-tradein1',
		'icon-payment1'            => 'icon-payment1',
		'icon-trophy'              => 'icon-trophy',
		'icon-118669'              => 'icon-118669',
		'icon-2087677'             => 'icon-2087677',
		'icon-565374'              => 'icon-565374',
		'icon-pencil'              => 'icon-pencil',
		'icon-pencil2'             => 'icon-pencil2',
		'icon-lifebuoy'            => 'icon-lifebuoy',
		'icon-phone'               => 'icon-phone',
		'icon-phone-hang-up'       => 'icon-phone-hang-up',
		'icon-printer'             => 'icon-printer',
		'icon-mobile'              => 'icon-mobile',
		'icon-mobile2'             => 'icon-mobile2',
		'icon-hammer2'             => 'icon-hammer2',
		'icon-menu21'              => 'icon-menu21',
		'icon-tongue'              => 'icon-tongue',
		'icon-point-up'            => 'icon-point-up',
		'icon-point-right'         => 'icon-point-right',
		'icon-point-down'          => 'icon-point-down',
		'icon-point-left'          => 'icon-point-left',
		'icon-pause'               => 'icon-pause',
		'icon-scissors'            => 'icon-scissors',
		'icon-filter'              => 'icon-filter',
		'icon-amazon'              => 'icon-amazon',
		'icon-instagram'           => 'icon-instagram',
		'icon-whatsapp'            => 'icon-whatsapp',
		'icon-vine'                => 'icon-vine',
		'icon-vk1'                 => 'icon-vk1',
		'icon-youtube2'            => 'icon-youtube2',
		'icon-vimeo'               => 'icon-vimeo',
		'icon-behance'             => 'icon-behance',
		'icon-blogger'             => 'icon-blogger',
		'icon-tumblr'              => 'icon-tumblr',
		'icon-yahoo'               => 'icon-yahoo',
		'icon-skype'               => 'icon-skype',
		'icon-linkedin2'           => 'icon-linkedin2',
		'icon-lastfm'              => 'icon-lastfm',
		'icon-stumbleupon'         => 'icon-stumbleupon',
		'icon-menu2'               => 'icon-menu2',
		'icon-vk'                  => 'icon-vk',
		'icon-youtube'             => 'icon-youtube',
	);
	return $icon_arr;
}

function price_val( $end = 'max', $meta ) {
	 global $wpdb;
	$query = $wpdb->prepare(
		'SELECT ' . $end . "( cast( meta_value as UNSIGNED ) ) FROM {$wpdb->postmeta} WHERE meta_key='%s'",
		$meta
	);
	return $wpdb->get_var( $query );
}