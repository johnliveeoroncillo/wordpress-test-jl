<?php
/*
 * Plugin Name: Caleader Customer Reviews
 * Plugin URI: http://smartdatasoft.com/
 * Description: Allows your visitors to leave business / product reviews.
 * Version: 1.4
 * Author: http://smartdatasoft.com/
 * Author URI: http://smartdatasoft.com/
 * Text Domain: carleader-reviews
 * License: MIT
 *
 */
 // 1. we will add custom post type review

 if(has_action('caleader_theme_init')){


	add_action('caleader_theme_init', 'check_caleader_theme_active');
	
	function check_caleader_theme_active(){
		if ( ! function_exists( 'caleader_setup' ) ) {
			return;
		}
	}
	
	}
class CarLeaderCustomerReviews {

	public $meta_box_reviews = '';
	public $prefix           = 'carleader_review';
	public $setting_array    = array();
	/**
	 * Construct
	 */
	function __construct() {
		add_action( 'init', array( &$this, 'custom_post_type' ) );
		add_action( 'admin_init', array( &$this, 'add_meta_field' ) );
		add_action( 'save_post', array( &$this, 'admin_save_post' ), 10, 3 );
		add_filter( 'archive_template', array( &$this, 'carleader_review_Tpl_archive' ) );
		add_action( 'wp_ajax_carleader_review_submit_ajax', array( &$this, 'carleader_review_submit_ajax' ) );
		add_action( 'wp_ajax_nopriv_carleader_review_submit_ajax', array( &$this, 'carleader_review_submit_ajax' ) );
	}
	function carleader_review_submit_ajax() {
		if ( ! isset( $_POST['carleader_review_submit_nonce'] ) || ! wp_verify_nonce( $_POST['carleader_review_submit_nonce'], 'carleader_review_submit_ajax' ) ) {
			print 'Sorry, your nonce did not verify.';
			exit;
		} else {
			ini_set( 'display_errors', 1 );
			error_reporting( 'E_ALL' );
			$parse_uri = explode( 'wp-admin', $_SERVER['SCRIPT_FILENAME'] );
			include_once $parse_uri[0] . 'wp-load.php';

			$my_post = array(
				'post_title'   => $_POST['send-name'] . "'S Review",
				'post_content' => $_POST['send-review'],
				'post_status'  => 'pending',
				'post_type'    => 'carleader_review',
				'meta_input'   => array(
					'carleader_review_review_name'     => $_POST['send-name'],
					'carleader_review_review_email'    => $_POST['send-email'],
					'carleader_review_review_rating'   => $_POST['rating'],
					'carleader_review_review_location' => $_POST['send-car'],
				),
			);
			// Insert the post into the database
			$post_ID = wp_insert_post( $my_post );
			update_post_meta( $post_ID, 'carleader_review_review_name', $_POST['send-name'] );
			update_post_meta( $post_ID, 'carleader_review_review_email', $_POST['send-email'] );
			update_post_meta( $post_ID, 'carleader_review_review_rating', $_POST['rating'] );
			update_post_meta( $post_ID, 'carleader_review_review_car', $_POST['send-car'] );
			echo esc_html__( 'Your Review Is Added Successsfully', 'carleader-review' );
		}
		exit();
	}
	public function custom_post_type() {
		$labels                        = array(
			'name'                  => _x( 'Reviews', 'Post Type General Name', 'carleader-review' ),
			'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'carleader-review' ),
			'menu_name'             => __( 'Reviews', 'carleader-review' ),
			'name_admin_bar'        => __( 'Review', 'carleader-review' ),
			'archives'              => __( 'Item Archives', 'carleader-review' ),
			'parent_item_colon'     => __( 'Parent Item:', 'carleader-review' ),
			'all_items'             => __( 'All Reviews', 'carleader-review' ),
			'add_new_item'          => __( 'Add New Review', 'carleader-review' ),
			'add_new'               => __( 'Add New Review', 'carleader-review' ),
			'new_item'              => __( 'New Review Item', 'carleader-review' ),
			'edit_item'             => __( 'Edit Review Item', 'carleader-review' ),
			'update_item'           => __( 'Update Review Item', 'carleader-review' ),
			'view_item'             => __( 'View Review Item', 'carleader-review' ),
			'search_items'          => __( 'Search Item', 'carleader-review' ),
			'not_found'             => __( 'Not found', 'carleader-review' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'carleader-review' ),
			'featured_image'        => __( 'Featured Image', 'carleader-review' ),
			'set_featured_image'    => __( 'Set featured image', 'carleader-review' ),
			'remove_featured_image' => __( 'Remove featured image', 'carleader-review' ),
			'use_featured_image'    => __( 'Use as featured image', 'carleader-review' ),
			'insert_into_item'      => __( 'Insert into item', 'carleader-review' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'carleader-review' ),
			'items_list'            => __( 'Items list', 'carleader-review' ),
			'items_list_navigation' => __( 'Items list navigation', 'carleader-review' ),
			'filter_items_list'     => __( 'Filter items list', 'carleader-review' ),
		);
		$slug_postype_carleader_review = 'carleader-review';

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'carleader-review' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => apply_filters( 'carleader_review_postype_slug', $slug_postype_carleader_review ) ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => true,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);
		register_post_type( 'carleader_review', $args );
	}
	public function add_meta_field() {
		$this->meta_box_reviews = array(
			'id'       => $this->prefix . '-meta-box-reviews',
			'title'    => __( 'Review Details Fields', 'carleader-review' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				array(
					'name' => __( 'Reviewer Name', 'carleader-review' ),
					'desc' => '',
					'id'   => $this->prefix . '_review_name',
					'type' => 'text',
				),
				array(
					'name' => __( 'Email Address', 'carleader-review' ),
					'desc' => '',
					'id'   => $this->prefix . '_review_email',
					'type' => 'text',
				),
				array(
					'name' => __( 'Review Car', 'carleader-review' ),
					'desc' => '',
					'id'   => $this->prefix . '_review_car',
					'type' => 'text',
				),
				array(
					'name'    => __( 'Rating', 'carleader-review' ),
					'desc'    => '',
					'id'      => $this->prefix . '_review_rating',
					'type'    => 'select',
					'options' => array(
						'1'   => '1 star',
						'1.5' => '1.5 star',
						'2'   => '2 stars',
						'2.5' => '2.5 star',
						'3'   => '3 stars',
						'3.5' => '3.5 star',
						'4'   => '4 stars',
						'4.5' => '4.5 star',
						'5'   => '5 stars',
					),
				),
				array(
					'name' => __( 'Admin Response to Review', 'carleader-review' ),
					'desc' => '',
					'id'   => $this->prefix . '_review_admin_response',
					'type' => 'textarea',
				),
			),
		);
		// add for reviews
		add_meta_box(
			$this->meta_box_reviews['id'],
			$this->meta_box_reviews['title'],
			array( &$this, 'show_meta_box_fields' ),
			'carleader_review',
			$this->meta_box_reviews['context'],
			$this->meta_box_reviews['priority'],
			array( 'type' => 'meta_box_reviews' )
		);
	}
	function show_meta_box_fields( $post, $args ) {
		 $my_args = $args['args'];
		$my_type  = $this->{$my_args['type']};
		echo '<table class="form-table">';
		foreach ( $my_type['fields'] as $field ) {
			$meta = get_post_meta( $post->ID, $field['id'], true );
			echo '<tr>',
			'<th style="width:30%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
			'<td>';
			switch ( $field['type'] ) {
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : '', '" size="30" style="width:97%" />';
					break;
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : '', '</textarea>';
					break;
				case 'select':
					   echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ( $field['options'] as $value => $label ) {
						echo '<option value="' . $value . '" ', $meta == $value ? ' selected="selected"' : '', '>', $label, '</option>';
					}
					echo '</select>';
					break;
				case 'checkbox':
					echo '<input value="1" type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
			}
			echo '<div style="padding-top:5px;"><small>' . $field['desc'] . '</small></div>';
			echo '<td></tr>';
		}
		echo '</table>';
	}
	function admin_save_post( $post_id, $post, $update = false ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		if ( $post->post_type == 'carleader_review' ) {
			foreach ( $this->meta_box_reviews['fields'] as $field ) {
				$old = get_post_meta( $post_id, $field['id'], true );
				if ( isset( $field['id'] ) ) {
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$new = $_POST[ $field['id'] ];
						if ( $new && $new != $old ) {
							   update_post_meta( $post_id, $field['id'], $new );
						} elseif ( $new == '' && $old ) {
							delete_post_meta( $post_id, $field['id'], $old );
						}
					}
				} else {
					delete_post_meta( $post_id, $field['id'], $old );
				}
			}
		}
		return $post_id;
	}
	// route archive- template
	// route archive- template
	function carleader_review_Tpl_archive( $template ) {
		if ( is_post_type_archive( 'carleader_review' ) ) {
			wp_enqueue_script( 'carleader_review_js', plugin_dir_url( __FILE__ ) . 'assets/js/carleader-review.js', array( 'jquery' ), '', true );
			wp_localize_script(
				'carleader_review_js',
				'carleader_review_js_obj',
				array(
					'carleader_review_ajax_url' => admin_url( 'admin-ajax.php' ),
					'already_used'              => get_option( 'review_helpful_already_used_text' ),
					'text_error'                => esc_html__( 'Your Review Is Not Submitted. Something went wrong', 'carleader-reviews' ),
				)
			);
			$theme_files     = array( 'archive-carleader_review.php' );
			$exists_in_theme = locate_template( $theme_files, false );
			if ( $exists_in_theme == '' ) {
				   return plugin_dir_path( __FILE__ ) . '/templates/archive-carleader_review.php';
			}
		}
		return $template;
	}
}
 $CarLeaderCustomerReviews = new CarLeaderCustomerReviews();

add_action( 'plugins_loaded', 'carleader_review_load_textdomain' );
function carleader_review_load_textdomain() {
	load_plugin_textdomain( 'carleader-review', false, basename( dirname( __FILE__ ) ) . '/languages' );
}