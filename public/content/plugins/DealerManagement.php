<?php
/*
Plugin Name: Carsada Dealer Management
Plugin URI: 
Description: Custom plugin for carsada's dealer
Version: 0.0.1
Author: JL
Author
License: Education
Text Domain: carsada_dealer
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// define( 'MYPLUGIN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// define( 'MYPLUGIN_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

function carsada_dealer_posttype() {
    $labels = array(
        'name' => _x( 'Carsada Dealer', 'Post Type General Name', 'carsada_dealer' ),
        'singular_name' => _x( 'Carsada Dealer', 'Post Type Singular Name', 'carsada_dealer' ),
        'menu_name' => __( 'Dealers', 'carsada_dealer' ),
        'name_admin_bar' => __( 'Post Type', 'carsada_dealer' ),
        'archives' => __( 'Item Archives', 'carsada_dealer' ),
        'parent_item_colon' => __( 'Parent Item:', 'carsada_dealer' ),
        'all_items' => __( 'All Items', 'carsada_dealer' ),
        'add_new_item' => __( 'Create New ', 'carsada_dealer' ),
        'add_new' => __( 'Create ', 'carsada_dealer' ),
        'new_item' => __( 'New Item', 'carsada_dealer' ),
        'edit_item' => __( 'View', 'carsada_dealer' ),
        'update_item' => __( 'Update Item', 'carsada_dealer' ),
        'view_item' => __( 'View Item', 'carsada_dealer' ),
        'search_items' => __( 'Search Item', 'carsada_dealer' ),
        'not_found' => __( 'Not found', 'carsada_dealer' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'carsada_dealer' ),
        'featured_image' => __( 'Featured Image', 'carsada_dealer' ),
        'set_featured_image' => __( 'Set featured image', 'carsada_dealer' ),
        'remove_featured_image' => __( 'Remove featured image', 'carsada_dealer' ),
        'use_featured_image' => __( 'Use as featured image', 'carsada_dealer' ),
        'insert_into_item' => __( 'Insert into item', 'carsada_dealer' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'carsada_dealer' ),
        'items_list' => __( 'Items list', 'carsada_dealer' ),
        'items_list_navigation' => __( 'Items list navigation', 'carsada_dealer' ),
        'filter_items_list' => __( 'Filter items list', 'carsada_dealer' ),
    );

    $args = array(
        'label' => __( 'Carsada Dealer', 'carsada_dealer' ),
        'description' => __( 'Carsada Dealer', 'carsada_dealer' ),
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
        'menu_icon' => __( 'dashicons-tag', 'carsada_dealer' ),
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true
    );
    register_post_type( 'Carsada Dealer', $args ); // register new post type


    add_filter( 'post_updated_messages', 'rw_post_updated_messages' );
}

function rw_post_updated_messages($messages) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['carsadadealer'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Dealer successfully updated.' ),
        2  => __( 'Dealer successfully updated.' ),
        3  => __( 'Dealer successfully deleted.'),
        4  => __( 'Dealer successfully updated.' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'My Post Type restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Dealer successfully published.' ),
        7  => __( 'Dealer successfully saved.' ),
        8  => __( 'Dealer successfully created.' ),
        9  => sprintf(
            __( 'Dealer scheduled for: <strong>%1$s</strong>.' ),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Dealer draft updated.' )
    );

        //you can also access items this way
        // $messages['post'][1] = "I just totally changed the Updated messages for standards posts";

        //return the new messaging 
    return $messages;
}

function wpse_add_custom_meta_box() {
    add_meta_box(
        'dealer-info',       // $id
        'Additional Information', // $title
        'show_custom_info',  // $callback
        'carsadadealer',                 // $page
        'normal',                  // $context
        'high'                     // $priority
    );
}

function show_custom_info() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );

    if (!empty($post->ID)) {
        $dealer_address = get_post_meta( $post->ID, 'dealer_address', true );
        $dealer_contact_person = get_post_meta( $post->ID, 'dealer_contact_person', true );
        $dealer_spoc_designation = get_post_meta( $post->ID, 'dealer_spoc_designation', true );
        $dealer_email = get_post_meta( $post->ID, 'dealer_email', true );
        $dealer_mobile_number = get_post_meta( $post->ID, 'dealer_mobile_number', true );
        $dealer_contact_info = get_post_meta( $post->ID, 'dealer_contact_info', true );
        $dealer_operating_hours = get_post_meta( $post->ID, 'dealer_operating_hours', true );
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
                    <input type="text" name="dealer_address" style="width: 100%;" value="<?=(!empty($dealer_address) ? $dealer_address : '');?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Contact Person</label>
                </td>
                <td>
                    <input type="text" name="dealer_contact_person" style="width: 100%;" value="<?=(!empty($dealer_contact_person) ? $dealer_contact_person : '');?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>SPOC Designation</label>
                </td>
                <td>
                    <input type="text" name="dealer_spoc_designation" style="width: 100%;" value="<?=(!empty($dealer_spoc_designation) ? $dealer_spoc_designation : '');?>">
                </td>  
            </tr>
            <tr>
                <td>
                    <label>Email Address</label>
                </td>
                <td>
                    <input type="email" name="dealer_email" style="width: 100%;" value="<?=(!empty($dealer_email) ? $dealer_email : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Mobile Number</label>
               </td>
                <td>
                    <input type="number" name="dealer_mobile_number" style="width: 100%;" value="<?=(!empty($dealer_mobile_number) ? $dealer_mobile_number : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Contact Info</label>
                </td>
                <td>
                    <input type="text" name="dealer_contact_info" style="width: 100%;" value="<?=(!empty($dealer_contact_info) ? $dealer_contact_info : '');?>">
                </td> 
            </tr>
            <tr>
                <td>
                    <label>Operating Hours</label>
                </td>
                <td>
                    <input type="text" name="dealer_operating_hours" style="width: 100%;" value="<?=(!empty($dealer_operating_hours) ? $dealer_operating_hours : '');?>">
                </td> 
            </tr>
    </table>

    <?php
}

function save_all($post_id) {
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

    update_post_meta( $post_id, 'dealer_address', (!empty($_POST['dealer_address']) ? $_POST['dealer_address'] : ''));
    update_post_meta( $post_id, 'dealer_contact_person', (!empty($_POST['dealer_contact_person']) ? $_POST['dealer_contact_person'] : ''));
    update_post_meta( $post_id, 'dealer_spoc_designation', (!empty($_POST['dealer_spoc_designation']) ? $_POST['dealer_spoc_designation'] : ''));
    update_post_meta( $post_id, 'dealer_email', (!empty($_POST['dealer_email']) ? $_POST['dealer_email'] : ''));
    update_post_meta( $post_id, 'dealer_mobile_number', (!empty($_POST['dealer_mobile_number']) ? $_POST['dealer_mobile_number'] : ''));
    update_post_meta( $post_id, 'dealer_contact_info', (!empty($_POST['dealer_contact_info']) ? $_POST['dealer_contact_info'] : ''));
    update_post_meta( $post_id, 'dealer_operating_hours', (!empty($_POST['dealer_operating_hours']) ? $_POST['dealer_operating_hours'] : ''));
}

add_action('add_meta_boxes', 'wpse_add_custom_meta_box');
add_action( 'init', 'carsada_dealer_posttype', 0 ); // hook with init function
add_action( 'save_post', 'save_all');
?>