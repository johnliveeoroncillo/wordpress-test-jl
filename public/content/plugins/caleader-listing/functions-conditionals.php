<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * is_carleader_listings_admin - Returns true if on a listings page in the admin
 */
function is_carleader_listing_admin() {
	$post_type 	= get_post_type();
	$screen 	= get_current_screen();
	$return = false;
	if( in_array( $post_type, array( 'carleader-listing', 'listing-enquiry' ) ) ) {
		$return = true;
	}
	if ( in_array( $screen->id, array( 'carleader-listing', 'edit-carleader-listing', 'listing-enquiry', 'edit-listing-enquiry', 'settings_page_carleader_listings_options' ) ) ) {
		$return = true;
	}
	return apply_filters( 'is_carleader_listings_admin', $return );
}
/**
 * is_carleader_listings - Returns true if on a page which uses carleader_listings templates
 */
function is_carleader_listing() {
	// include on sellers page
	$is_seller = false;
	if ( is_author() ) {
		$user = new WP_User( carleader_listings_seller_ID() );
		$user_roles = $user->roles;
		if ( in_array( 'carleader_listings_seller', $user_roles ) ) {
			$is_seller = true;
		}
	}
	$result = apply_filters( 'is_carleader_listings', ( is_listing_archive() || is_listing() || is_listing_search() || is_listing_taxonomy() || $is_seller ) ? true : false );
	return $result;
}
/**
 * is_listing_archive - Returns true when viewing the listing type archive.
 */
if ( ! function_exists( 'is_listing_archive' ) ) {
	function is_listing_archive() {
		return ( is_post_type_archive( 'carleader-listing' ) );
	}
}
/**
 * is_listing_taxonomy - Returns true when viewing the listing taxonomy.
 */
if ( ! function_exists( 'is_listing_taxonomy' ) ) {
	function is_listing_taxonomy() {
		return ( is_tax( get_object_taxonomies( 'carleader-listing' ) ) );
	}
}
/**
 * is_lisitng - Returns true when viewing a single listing.
 */
if ( ! function_exists( 'is_listing' ) ) {
	function is_listing() {
		$result = false;
		if( is_singular( 'carleader-listing' ) ) {
			$result = true;
		}
		if( is_single() && get_post_type() == 'carleader-listing' ) {
			$result = true;
		}
		return apply_filters( 'is_listing', $result );
	}
}
/**
 * is_lisitng - Returns true when viewing listings search results page
 */
if ( ! function_exists( 'is_listing_search' ) ) {
	function is_listing_search() {
		if ( ! is_search() || ! is_page() ) {
			return false;
		}
        $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
        $result = $current_page->name == 'listing';
		return apply_filters( 'is_listing_search', $result );
	}
}