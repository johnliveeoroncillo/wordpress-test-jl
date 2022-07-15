<?php
class carleaderListing {




















	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'register_taxonomy' ) );
		add_action( 'add_meta_boxes', array( $this, 'remove_body_type_meta_box' ) );
		add_action( 'add_meta_boxes', array( $this, 'remove_make_brand_meta_box' ) );
	}
	public function register_post_type() {
		$slug = carleader_listings_option( 'l_slug' );
		if ( ! isset( $slug ) || $slug == '' ) {
			$slug = 'carleader-listing';
		}

		$cpt_name = carleader_listings_option( 'cpt_name' );
		if ( ! isset( $cpt_name ) || $cpt_name == '' ) {
			$cpt_name = esc_html__( 'Caleader Listing', 'caleader-listing' );
		}

		$labels = array(
			'name'                  => sprintf( _x( '%s', '%s post type name', 'caleader-listing' ), $cpt_name, $cpt_name ),
			'singular_name'         => sprintf( _x( '%s', 'Singular %s post type name', 'caleader-listing' ), $cpt_name, $cpt_name ),
			'add_new'               => sprintf( esc_html__( 'New %s', 'caleader-listing' ), $cpt_name ),
			'add_new_item'          => sprintf( esc_html__( 'Add New %s', 'caleader-listing' ), $cpt_name ),
			'edit_item'             => sprintf( esc_html__( 'Edit %s', 'caleader-listing' ), $cpt_name ),
			'new_item'              => sprintf( esc_html__( 'New %s', 'caleader-listing' ), $cpt_name ),
			'all_items'             => sprintf( esc_html__( '%s', 'caleader-listing' ), $cpt_name ),
			'view_item'             => sprintf( esc_html__( 'View %s', 'caleader-listing' ), $cpt_name ),
			'search_items'          => sprintf( esc_html__( 'Search %s', 'caleader-listing' ), $cpt_name ),
			'not_found'             => sprintf( esc_html__( 'No listings found', 'caleader-listing' ), $cpt_name ),
			'not_found_in_trash'    => sprintf( esc_html__( 'No listings found in Trash', 'caleader-listing' ), $cpt_name ),
			'parent_item_colon'     => '',
			'menu_name'             => sprintf( _x( '%s', '%s post type menu name', 'caleader-listing' ), $cpt_name ),
			'filter_items_list'     => sprintf( esc_html__( '%s Filtered List', 'caleader-listing' ), $cpt_name ),
			'items_list_navigation' => sprintf( esc_html__( '%s list navigation', 'caleader-listing' ), $cpt_name ),
			'items_list'            => sprintf( esc_html__( '%s list', 'caleader-listing' ), $cpt_name ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-dashboard',
			'menu_position'      => 56,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => untrailingslashit( $slug ),
				'with_front' => false,
				'feeds'      => true,
			),
			'map_meta_cap'       => true,
			'has_archive'        => ( $archive_page = carleader_listings_option( 'archive_page' ) ) && get_post( $archive_page ) ? get_page_uri( $archive_page ) : 'listings',
			'hierarchical'       => false,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		);
		register_post_type( 'carleader-listing', $args );
	}
	public function register_taxonomy() {
		$taxonomies   = array(
			array(
				'slug'        => 'body-type',
				'single_name' => esc_html__( 'Body Type', 'caleader-listing' ),
				'plural_name' => esc_html__( 'Body Types', 'caleader-listing' ),
				'post_type'   => 'carleader-listing',
				'rewrite'     => array( 'slug' => 'body-type' ),
			),
			array(
				'slug'         => 'make-brand',
				'single_name'  => esc_html__( 'Make', 'caleader-listing' ),
				'plural_name'  => esc_html__( 'Makes', 'caleader-listing' ),
				'post_type'    => 'carleader-listing',
				'rewrite'      => array( 'slug' => 'make-brand' ),
				'hierarchical' => false,
			),
		);
		$archive_page = carleader_listings_option( 'archive_page' );
		$slug         = get_post( $archive_page ) ? get_page_uri( $archive_page ) : 'listings';

		foreach ( $taxonomies as $taxonomy ) {
			$labels = array(
				'name'          => $taxonomy['plural_name'],
				'singular_name' => $taxonomy['single_name'],
				'search_items'  => esc_html__( 'Search ', 'caleader-listing' ) . $taxonomy['plural_name'],
				'all_items'     => esc_html__( 'All ', 'caleader-listing' ) . $taxonomy['plural_name'],
				'edit_item'     => esc_html__( 'Edit ', 'caleader-listing' ) . $taxonomy['single_name'],
				'add_new_item'  => esc_html__( 'Add New ', 'caleader-listing' ) . $taxonomy['single_name'],
				'menu_name'     => $taxonomy['plural_name'],
			);

			$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

			register_taxonomy(
				$taxonomy['slug'],
				$taxonomy['post_type'],
				array(
					'labels'    => $labels,
					'show_ui'   => true,
					'query_var' => true,
					'rewrite'   => array(
						'slug'       => $slug . '/' . $taxonomy['slug'],
						'with_front' => false,
					),
				)
			);
		}
	}

	public function remove_body_type_meta_box() {
		remove_meta_box( 'tagsdiv-body-type', 'carleader-listing', 'side' );
	}
	public function remove_make_brand_meta_box() {
		remove_meta_box( 'tagsdiv-make-brand', 'carleader-listing', 'side' );
	}
}
new carleaderListing();
