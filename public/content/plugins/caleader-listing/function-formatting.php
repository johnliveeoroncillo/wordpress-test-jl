<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Metric and imperial formatting
 */
function carleader_listings_metric() {
	$return = carleader_listings_option( 'metric' ) ? carleader_listings_option( 'metric' ) : 'yes';
	return $return;
}
function carleader_listings_miles_kms_label_short() {
	$return = carleader_listings_metric() == 'no' ? esc_html__( 'mi', 'caleader-listing' ) : esc_html__( 'km', 'caleader-listing' );
	return $return;
}
function carleader_listings_per_hour_unit() {
	$return = carleader_listings_metric() == 'yes' ? esc_html__( 'mph', 'caleader-listing' ) : esc_html__( 'kph', 'caleader-listing' );
	return $return;
}
/*
 * Run date formatting through here
 */
function carleader_listings_format_date( $date ) {
	$timestamp = strtotime( $date );
	$date      = date_i18n( get_option( 'date_format' ), $timestamp, false );
	return apply_filters( 'carleader_listings_format_date', $date, $timestamp );
}
/**
 * Do we include the decimals
 *
 * @since  1.0.0
 * @return string
 */
function carleader_listings_include_decimals() {
	$option = get_option( 'carleader_listings_options' );
	$return = isset( $option['include_decimals'] ) ? stripslashes( $option['include_decimals'] ) : 'no';
	return $return;
}
/**
 * Get the price format depending on the currency position.
 *
 * @return string
 */
function carleader_listings_format_price_format() {
	 $option      = get_option( 'carleader_listings_options' );
	$currency_pos = isset( $option['currency_position'] ) ? $option['currency_position'] : 'before';
	$format       = '%1$s%2$s';
	switch ( $currency_pos ) {
		case 'before':
			$format = '%1$s%2$s';
			break;
		case 'after':
			$format = '%2$s%1$s';
			break;
		case 'before_space':
			$format = '%1$s&nbsp;%2$s';
			break;
		case 'after_space':
			$format = '%2$s&nbsp;%1$s';
			break;
	}
	return apply_filters( 'carleader_listings_format_price_format', $format, $currency_pos );
}
/**
 * Return the currency_symbol for prices.
 *
 * @since  1.0.0
 * @return string
 */
function carleader_listings_currency_symbol() {
	 $option = get_option( 'carleader_listings_options' );
	$return  = isset( $option['currency'] ) ? stripslashes( $option['currency'] ) : '$';
	return $return;
}
/**
 * Return the thousand separator for prices.
 *
 * @since  1.0.0
 * @return string
 */
function carleader_listings_thousand_separator() {
	$option = get_option( 'carleader_listings_options' );
	$return = isset( $option['thousand_separator'] ) ? stripslashes( $option['thousand_separator'] ) : ',';
	return $return;
}
/**
 * Return the decimal separator for prices.
 *
 * @since  1.0.0
 * @return string
 */
function carleader_listings_decimal_separator() {
	$option = get_option( 'carleader_listings_options' );
	$return = isset( $option['decimal_separator'] ) ? stripslashes( $option['decimal_separator'] ) : '.';
	return $return;
}
/**
 * Return the number of decimals after the decimal point.
 *
 * @since  1.0.0
 * @return int
 */
function carleader_listings_decimals() {
	$option = get_option( 'carleader_listings_options' );
	$return = isset( $option['caleader_prec'] ) ? $option['caleader_prec'] : 2;
	return absint( $return );
}
/**
 * Trim trailing zeros off prices.
 *
 * @param  mixed $price
 * @return string
 */
function carleader_listings_trim_zeros( $price ) {
	return preg_replace( '/' . preg_quote( carleader_listings_decimal_separator(), '/' ) . '0++$/', '', $price );
}
/**
 * Format the price with a currency symbol.
 *
 * @param  float $price
 * @param  array $args  (default: array())
 * @return string
 */
function carleader_listings_format_price( $price, $args = array() ) {
	extract(
		apply_filters(
			'carleader_listings_format_price_args',
			wp_parse_args(
				$args,
				array(
					'currency_symbol'    => carleader_listings_currency_symbol(),
					'decimal_separator'  => carleader_listings_decimal_separator(),
					'thousand_separator' => carleader_listings_thousand_separator(),
					'decimals'           => carleader_listings_decimals(),
					'price_format'       => carleader_listings_format_price_format(),
					'include_decimals'   => carleader_listings_include_decimals(),
				)
			)
		)
	);
	$return     = null;
	$negative   = $price < 0;
	$price      = apply_filters( 'carleader_listings_raw_price', floatval( $negative ? $price * -1 : $price ) );

	if (class_exists('WOOCS')) {
        global $WOOCS;

		$price=$WOOCS->woocs_exchange_value($price);
		$currency_symbol = get_woocommerce_currency_symbol($WOOCS->current_currency);
    }

	$price      = apply_filters( 'carleader_listings_formatted_price', number_format( $price, $decimals, $decimal_separator, $thousand_separator ), $price, $decimals, $decimal_separator, $thousand_separator );
	$trailzeros = carleader_listings_option( 'trail_zeros' );

	if ( ! isset( $trailzeros ) || $trailzeros == '' ) {
		$trailzeros = false;

	}
	if ( ! $trailzeros ) {
		$decim = explode( $decimal_separator, $price );
		if ( isset( $decim[1] ) ) {
			if ( $decim[1] <= 0 ) {
				$price = $decim[0];
			}
		}
	}

	if ( $include_decimals == 'no' ) {
		$price = carleader_listings_trim_zeros( $price );
	}

	$formatted_price = ( $negative ? '-' : '' ) . sprintf( $price_format, '<span class="currency-symbol">' . $currency_symbol . '</span>', $price );
	$return          = '<span class="price-amount">' . $formatted_price . '</span>';

	return apply_filters( 'carleader_listings_format_price', $return, $price, $args );
}
function carleader_listings_format_miles( $miles, $args = array() ) {
	extract(
		apply_filters(
			'carleader_listings_format_price_args',
			wp_parse_args(
				$args,
				array(
					'decimal_separator'  => carleader_listings_decimal_separator(),
					'thousand_separator' => carleader_listings_thousand_separator(),
					'decimals'           => carleader_listings_decimals(),
				)
			)
		)
	);
	$return   = null;
	$negative = $miles < 0;
	if ( $miles == '' ) {
		$miles = 0;
	}
	$miles = str_replace(' ', '', $miles);
	$miles = apply_filters( 'carleader_listings_formatted_price', number_format( $miles, $decimals, $decimal_separator, $thousand_separator ), $miles, $decimals, $decimal_separator, $thousand_separator );

	$trailzeros = carleader_listings_option( 'trail_zeros' );

	if ( ! isset( $trailzeros ) || $trailzeros == '' ) {
		$trailzeros = false;

	}
	if ( ! $trailzeros ) {
		$decim = explode( $decimal_separator, $miles );
		if ( $decim[1] <= 0 ) {
			$miles = $decim[0];
		}
	}

	$formatted_miles = ( $negative ? '-' : '' ) . sprintf( $miles );
	$return          = '<span class="price-amount">' . $formatted_miles . '</span>';
	return apply_filters( 'carleader_listings_format_miles', $return, $miles, $args );
}
/**
 * Format the price with a currency symbol.
 *
 * @param  float $price
 * @param  array $args  (default: array())
 * @return string
 */
function carleader_listings_raw_price( $price ) {
	return strip_tags( carleader_listings_format_price( $price ) );
}