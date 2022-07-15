<?php
class CPT_CarLeader_Services {






	/**
	 * Construct
	 */
	function __construct() {
		add_action( 'init', array( $this, 'carleader_services_services_post_type' ) );
		add_filter( 'archive_template', array( &$this, 'carleader_services_tpl_archive' ) );
	}
	// Register Custom Post Type
	function carleader_services_services_post_type() {
		$labels = array(
			'name'                  => _x( 'Services', 'Post Type General Name', 'caleader-core' ),
			'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'caleader-core' ),
			'menu_name'             => esc_html__( 'Services', 'caleader-core' ),
			'name_admin_bar'        => esc_html__( 'Service', 'caleader-core' ),
			'archives'              => esc_html__( 'Item Archives', 'caleader-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'caleader-core' ),
			'all_items'             => esc_html__( 'All Services', 'caleader-core' ),
			'add_new_item'          => esc_html__( 'Add New Service', 'caleader-core' ),
			'add_new'               => esc_html__( 'Add New Service', 'caleader-core' ),
			'new_item'              => esc_html__( 'New Service Item', 'caleader-core' ),
			'edit_item'             => esc_html__( 'Edit Service Item', 'caleader-core' ),
			'update_item'           => esc_html__( 'Update Service Item', 'caleader-core' ),
			'view_item'             => esc_html__( 'View Service Item', 'caleader-core' ),
			'search_items'          => esc_html__( 'Search Item', 'caleader-core' ),
			'not_found'             => esc_html__( 'Not found', 'caleader-core' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'caleader-core' ),
			'featured_image'        => esc_html__( 'Featured Image', 'caleader-core' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'caleader-core' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'caleader-core' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'caleader-core' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'caleader-core' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'caleader-core' ),
			'items_list'            => esc_html__( 'Items list', 'caleader-core' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'caleader-core' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'caleader-core' ),
		);

		$slug_postype_carleader_services = 'carleader-services';

		if ( function_exists( 'caleader_options' ) ) {
			$slug_postype_carleader_services = caleader_options( 'servide_slug' );
		}

		if ( ! isset( $slug_postype_carleader_services ) || $slug_postype_carleader_services == '' ) {
			$slug_postype_carleader_services = 'carleader-services';
		}

		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'caleader-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => apply_filters( 'carleader_services_postype_slug', $slug_postype_carleader_services ) ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);
		register_post_type( 'carleader_services', $args );
	}
	// route archive- template
	function carleader_services_tpl_archive( $template ) {
		if ( is_post_type_archive( 'carleader_services' ) ) {
			$theme_files     = array( 'archive-carleader_services.php' );
			$exists_in_theme = locate_template( $theme_files, false );
			if ( $exists_in_theme == '' ) {
				  return CARLEADER_PLUGIN_DIR . '/templates/archive-carleader_services.php';
			}
		}
		return $template;
	}
}
$CPT_CarLeader_Services = new CPT_CarLeader_Services();
