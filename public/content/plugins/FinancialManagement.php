<?php
/*
Plugin Name: Carsada Financial Institute Management
Plugin URI: 
Description: Custom plugin for carsada's financial Institute management
Version: 0.0.1
Author: JL
Author
License: Education
Text Domain: carsada_finance
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// define( 'MYPLUGIN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// define( 'MYPLUGIN_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

function carsada_finance_posttype() {
    $labels = array(
        'name' => _x( 'Carsada Financial IM', 'Post Type General Name', 'carsada_finance' ),
        'singular_name' => _x( 'Carsada Financial IM', 'Post Type Singular Name', 'carsada_finance' ),
        'menu_name' => __( 'Financial IM', 'carsada_finance' ),
        'name_admin_bar' => __( 'Post Type', 'carsada_finance' ),
        'archives' => __( 'Item Archives', 'carsada_finance' ),
        'parent_item_colon' => __( 'Parent Item:', 'carsada_finance' ),
        'all_items' => __( 'All Items', 'carsada_finance' ),
        'add_new_item' => __( 'Create New ', 'carsada_finance' ),
        'add_new' => __( 'Create ', 'carsada_finance' ),
        'new_item' => __( 'New Item', 'carsada_finance' ),
        'edit_item' => __( 'View', 'carsada_finance' ),
        'update_item' => __( 'Update Item', 'carsada_finance' ),
        'view_item' => __( 'View Item', 'carsada_finance' ),
        'search_items' => __( 'Search Item', 'carsada_finance' ),
        'not_found' => __( 'Not found', 'carsada_finance' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'carsada_finance' ),
        'featured_image' => __( 'Featured Image', 'carsada_finance' ),
        'set_featured_image' => __( 'Set featured image', 'carsada_finance' ),
        'remove_featured_image' => __( 'Remove featured image', 'carsada_finance' ),
        'use_featured_image' => __( 'Use as featured image', 'carsada_finance' ),
        'insert_into_item' => __( 'Insert into item', 'carsada_finance' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'carsada_finance' ),
        'items_list' => __( 'Items list', 'carsada_finance' ),
        'items_list_navigation' => __( 'Items list navigation', 'carsada_finance' ),
        'filter_items_list' => __( 'Filter items list', 'carsada_finance' ),
    );

    $args = array(
        'label' => __( 'Carsada Financial IM', 'carsada_finance' ),
        'description' => __( 'Carsada Financial IM', 'carsada_finance' ),
        'labels' => $labels,
        'supports' => array( ),
        'taxonomies' => array( ),
        'hierarchical' => true,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => __( 'dashicons-buddicons-topics', 'carsada_finance' ),
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true
    );
    register_post_type( 'Carsada Financial IM', $args ); // register new post type


    add_filter( 'post_updated_messages', 'rw_post_updated_messages_clone' );
}

function rw_post_updated_messages_clone($messages) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['carsadafinancialim'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Financial institute successfully updated.' ),
        2  => __( 'Financial institute successfully updated.' ),
        3  => __( 'Financial institute successfully deleted.'),
        4  => __( 'Financial institute successfully updated.' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'My Post Type restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Financial institute successfully published.' ),
        7  => __( 'Financial institute successfully saved.' ),
        8  => __( 'Financial institute successfully created.' ),
        9  => sprintf(
            __( 'Financial institute scheduled for: <strong>%1$s</strong>.' ),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Financial institute draft updated.' )
    );

        //you can also access items this way
        // $messages['post'][1] = "I just totally changed the Updated messages for standards posts";

        //return the new messaging 
    return $messages;
}

function wpse_add_custom_meta_box_finance() {
    add_meta_box(
        'dealer-finance',       // $id
        'Additional Information', // $title
        'show_custom_info_finance',  // $callback
        'carsadafinancialim',                 // $page
        'normal',                  // $context
        'high'                     // $priority
    );
}

function show_custom_info_finance() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );

    if (!empty($post->ID)) {
        $finance_address = get_post_meta( $post->ID, 'finance_address', true );
        $finance_contact_person = get_post_meta( $post->ID, 'finance_contact_person', true );
        $finance_spoc_designation = get_post_meta( $post->ID, 'finance_spoc_designation', true );
        $finance_email = get_post_meta( $post->ID, 'finance_email', true );
        $finance_mobile_number = get_post_meta( $post->ID, 'finance_mobile_number', true );
        $finance_contact_info = get_post_meta( $post->ID, 'finance_contact_info', true );
        $finance_operating_hours = get_post_meta( $post->ID, 'finance_operating_hours', true );
    }
    ?>

    <!-- my custom value input -->
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <label>Company Adress</label>
                </td>
                <td>
                    <input type="text" name="finance_address" style="width: 100%;" value="<?=(!empty($finance_address) ? $finance_address : '');?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Contact Person</label>
                </td>
                <td>
                    <input type="text" name="finance_contact_person" style="width: 100%;" value="<?=(!empty($finance_contact_person) ? $finance_contact_person : '');?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>SPOC Designation</label>
                </td>
                <td>
                    <input type="text" name="finance_spoc_designation" style="width: 100%;" value="<?=(!empty($finance_spoc_designation) ? $finance_spoc_designation : '');?>">
                </td>  
            </tr>
            <tr>
                <td>
                    <label>Email Address</label>
                </td>
                <td>
                    <input type="email" name="finance_email" style="width: 100%;" value="<?=(!empty($finance_email) ? $finance_email : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Mobile Number</label>
               </td>
                <td>
                    <input type="number" name="finance_mobile_number" style="width: 100%;" value="<?=(!empty($finance_mobile_number) ? $finance_mobile_number : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Contact Info</label>
                </td>
                <td>
                    <input type="text" name="finance_contact_info" style="width: 100%;" value="<?=(!empty($finance_contact_info) ? $finance_contact_info : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Operating Hours</label>
                </td>
                <td>
                    <input type="text" name="finance_operating_hours" style="width: 100%;" value="<?=(!empty($finance_operating_hours) ? $finance_operating_hours : '');?>">
                </td> 
            </tr>
    </table>

    <?php
}

function save_post_finance($post_id) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;
    if ( ( isset ( $_POST['wpse_our_nonce'] ) ) && ( ! wp_verify_nonce( $_POST['wpse_our_nonce'], plugin_basename( __FILE__ ) ) ) )
        return;
    if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }    
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    update_post_meta( $post_id, 'finance_address', (!empty($_POST['finance_address']) ? $_POST['finance_address'] : ''));
    update_post_meta( $post_id, 'finance_contact_person', (!empty($_POST['finance_contact_person']) ? $_POST['finance_contact_person'] : ''));
    update_post_meta( $post_id, 'finance_spoc_designation', (!empty($_POST['finance_spoc_designation']) ? $_POST['finance_spoc_designation'] : ''));
    update_post_meta( $post_id, 'finance_email', (!empty($_POST['finance_email']) ? $_POST['finance_email'] : ''));
    update_post_meta( $post_id, 'finance_mobile_number', (!empty($_POST['finance_mobile_number']) ? $_POST['finance_mobile_number'] : ''));
    update_post_meta( $post_id, 'finance_contact_info', (!empty($_POST['finance_contact_info']) ? $_POST['finance_contact_info'] : ''));
    update_post_meta( $post_id, 'finance_operating_hours', (!empty($_POST['finance_operating_hours']) ? $_POST['finance_operating_hours'] : ''));
}

add_action('add_meta_boxes', 'wpse_add_custom_meta_box_finance');
add_action( 'init', 'carsada_finance_posttype', 0 ); // hook with init function
add_action( 'save_post', 'save_post_finance');

?>