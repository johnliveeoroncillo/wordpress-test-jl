<?php 
class ContactPost {
	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );
	}
	public function register_post_type() {
		$labels = [
			'name'                  => _x( 'Listing Enquiries', 'Enquiry post type name', 'caleader-listing' ),
			'singular_name'         => _x( 'Listing Enquiry', 'Singular enquiry post type name', 'caleader-listing' ),
			'add_new'               => esc_html__( 'New Listing Enquiry', 'caleader-listing' ),
			'add_new_item'          => esc_html__( 'Add New Listing Enquiry', 'caleader-listing' ),
			'edit_item'             => esc_html__( 'Edit Listing Enquiry', 'caleader-listing' ),
			'new_item'              => esc_html__( 'New Listing Enquiry', 'caleader-listing' ),
			'all_items'             => esc_html__( 'Listing Enquiries', 'caleader-listing' ),
			'view_item'             => esc_html__( 'View Listing Enquiry', 'caleader-listing' ),
			'search_items'          => esc_html__( 'Search Listing Enquiries', 'caleader-listing' ),
			'not_found'             => esc_html__( 'No Listing Enquiries found', 'caleader-listing' ),
			'not_found_in_trash'    => esc_html__( 'No Listing Enquiries found in Trash', 'caleader-listing' ),
			'menu_name'             => _x( 'Listing Enquiries', 'enquiry post type menu name', 'caleader-listing' ),
			'filter_items_list'     => esc_html__( 'Filter Listing Enquiries ', 'caleader-listing' ),
			'items_list_navigation' => esc_html__( 'Listing Enquiry navigation', 'caleader-listing' ),
			'items_list'            => esc_html__( 'Listing Enquiry', 'caleader-listing' ),
		];
		$args = [
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'show_in_menu'        => 'edit.php?post_type=carleader-listing',
			'show_in_admin_bar'   => false,
			'menu_icon'           => 'dashicons-email',
			'menu_position'       => 56,
			'query_var'           => true,
			//'rewrite'            => array('slug' => 'listings-enquiry', 'with_front' => false),
			'capability_type'     => 'post',
			'capabilities'        => [
				'create_posts' 	  => 'do_not_allow',
				// Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
			],
			'map_meta_cap'        => true, // Set to `false`, if users are not allowed to edit/delete existing posts
			//'has_archive'        => '',
			'hierarchical'        => false,
			'supports'            => [ 'title', 'revisions' ],
		];
		register_post_type( 'contact-posting', $args );
	}
}
new ContactPost();