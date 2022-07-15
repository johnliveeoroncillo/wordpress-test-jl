<?php
/*
Plugin Name: Carsada Book Management
Plugin URI: 
Description: Custom plugin for carsada's book
Version: 0.0.1
Author: JL
Author
License: Education
Text Domain: carsada_book
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class BookManagement {

    public function __construct() {
        add_action( 'init', array($this, 'carsada_book_posttype'), 0 ); // hook with init function
        add_action('post_edit_form_tag', array($this, 'add_post_enctype'));
        add_action('add_meta_boxes', array($this, 'add_custom_metabox'));
        add_action( 'save_post', array($this, 'save_all'));
    }


    public function add_post_enctype() {
        echo ' enctype="multipart/form-data"';
    }
        
    public function carsada_book_posttype() {
        $labels = array(
            'name' => _x( 'Carsada Book', 'Post Type General Name', 'carsada_book' ),
            'singular_name' => _x( 'Carsada Book', 'Post Type Singular Name', 'carsada_book' ),
            'menu_name' => __( 'Books', 'carsada_book' ),
            'name_admin_bar' => __( 'Post Type', 'carsada_book' ),
            'archives' => __( 'Item Archives', 'carsada_book' ),
            'parent_item_colon' => __( 'Parent Item:', 'carsada_book' ),
            'all_items' => __( 'All Items', 'carsada_book' ),
            'add_new_item' => __( 'Create New ', 'carsada_book' ),
            'add_new' => __( 'Create ', 'carsada_book' ),
            'new_item' => __( 'New Item', 'carsada_book' ),
            'edit_item' => __( 'View', 'carsada_book' ),
            'update_item' => __( 'Update Item', 'carsada_book' ),
            'view_item' => __( 'View Item', 'carsada_book' ),
            'search_items' => __( 'Search Item', 'carsada_book' ),
            'not_found' => __( 'Not found', 'carsada_book' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'carsada_book' ),
            'featured_image' => __( 'Featured Image', 'carsada_book' ),
            'set_featured_image' => __( 'Set featured image', 'carsada_book' ),
            'remove_featured_image' => __( 'Remove featured image', 'carsada_book' ),
            'use_featured_image' => __( 'Use as featured image', 'carsada_book' ),
            'insert_into_item' => __( 'Insert into item', 'carsada_book' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'carsada_book' ),
            'items_list' => __( 'Items list', 'carsada_book' ),
            'items_list_navigation' => __( 'Items list navigation', 'carsada_book' ),
            'filter_items_list' => __( 'Filter items list', 'carsada_book' ),
        );

        $args = array(
            'label' => __( 'Carsada Book', 'carsada_book' ),
            'description' => __( 'Carsada Book', 'carsada_book' ),
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
            'menu_icon' => __( 'dashicons-book', 'carsada_book' ),
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => false,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'supports' => array('title'),
            'capabilities' => array(
                'create_posts' => false
            )
        );
        register_post_type( 'Carsada Book', $args ); // register new post type

        add_filter( 'post_updated_messages', array($this, 'rw_post_updated_message') );
    }

    public function rw_post_updated_message($messages) {
        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        $messages['carsadabook'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => __( 'Book successfully updated.' ),
            2  => __( 'Book successfully updated.' ),
            3  => __( 'Book successfully deleted.'),
            4  => __( 'Book successfully updated.' ),
            /* translators: %s: date and time of the revision */
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'My Post Type restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( 'Book successfully published.' ),
            7  => __( 'Book successfully saved.' ),
            8  => __( 'Book successfully created.' ),
            9  => sprintf(
                __( 'Book scheduled for: <strong>%1$s</strong>.' ),
                // translators: Publish box date format, see http://php.net/date
                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
            ),
            10 => __( 'Book draft updated.' )
        );

            //you can also access items this way
            // $messages['post'][1] = "I just totally changed the Updated messages for standards posts";

            //return the new messaging 
        return $messages;
    }

    public function add_custom_metabox() {
        add_meta_box(
            'book-info',       // $id
            'Book Information', // $title
            array($this, 'show_custom_info_book'),  // $callback
            'carsadabook',                 // $page
            'normal',                  // $context
            'high'                     // $priority
        );

        add_meta_box(
            'book-info-car',       // $id
            'Selected Car', // $title
            array($this, 'show_custom_info_car'),  // $callback
            'carsadabook',                 // $page
            'side',                  // $context
            'high'                     // $priority
        );
    }

    public function show_custom_info_car() {
        global $post;

        $car_slug = get_post_meta( $post->ID, 'car_slug', true );
        $car = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
        $car_meta = get_post_meta( $car->ID );
        ?>

        <table style="width: 100%">
            <tr>
                <td colspan="2">
                    <?php
                        $featured = (!empty($car_meta['_carleader_listing_gallery'][0]) ? $car_meta['_carleader_listing_gallery'][0] : '');
                        if (!empty($featured)) {
                            $img_atts = wp_get_attachment_image_src( $featured, 'full' );
                            $img_src = (!empty($img_atts[0]) ? $img_atts[0] : '');
                            if (!empty($img_src)) { ;?>
                                <img src="<?=$img_src;?>" style="max-width: 100%; border-radius: 8px;">
                        <?php }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: 600; font-size: 1.3em; line-height: 14px;">
                    <?=(!empty($car->post_title) ? $car->post_title : '');?>
                </td>
            </td>
            <tr>
                <td colspan="2" style="font-weight: 600; font-size: 1.2em;">
                    ₱ <?=number_format((!empty($car_meta['_carleader_listing_price'][0]) ? $car_meta['_carleader_listing_price'][0] : 0), 2, '.', ',');?>
                </td>
            </td>
            <tr>
                <td> Year: </td>
                <td> <?=(!empty($car_meta['_carleader_listing_model_year'][0]) ? $car_meta['_carleader_listing_model_year'][0] : '--');?> </td>
            </td>
            <tr>
                <td> Make: </td>
                <td> <?=(!empty($car_meta['_carleader_listing_make_display'][0]) ? $car_meta['_carleader_listing_make_display'][0] : '--');?> </td>
            </td>
            <tr>
                <td> Model: </td>
                <td> <?=(!empty($car_meta['_carleader_listing_model_name'][0]) ? $car_meta['_carleader_listing_model_name'][0] : '--');?> </td>
            </td>
            <tr>
                <td> Condition: </td>
                <td> <?=(!empty($car_meta['_carleader_listing_condition'][0]) ? $car_meta['_carleader_listing_condition'][0] : '--');?> </td>
            </td>
        </table>
<?php }

    public function show_custom_info_status() {
        global $post;

        // Use nonce for verification to secure data sending
        wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );

        if (!empty($post->ID)) {
            $status = get_post_meta( $post->ID, 'status', true );
        }

        $statuses = array('Pending', 'Approved', 'Disapproved', 'For Approval');
        ?>

        <!-- my custom value input -->
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <select name="status" style="width: 100%;">
                            <?php
                                foreach($statuses as $value) { ;?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            jQuery('select[name="status"]').val('<?=$status;?>').change();
        </script>

        <?php
    }

    public function show_custom_info_book() {
        global $post;

        // Use nonce for verification to secure data sending
        wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );

        if (!empty($post->ID)) {
            $first_name = get_post_meta( $post->ID, 'first_name', true );
            $book_reference_number = get_post_meta( $post->ID, 'book_reference_number', true );
            $last_name = get_post_meta( $post->ID, 'last_name', true );
            $email = get_post_meta( $post->ID, 'email', true );
            $contact_number = get_post_meta( $post->ID, 'contact_number', true );
            $optional_contact_number = get_post_meta( $post->ID, 'optional_contact_number', true );
            $preffered_date = get_post_meta( $post->ID, 'preffered_date', true );
            $time = get_post_meta( $post->ID, 'time', true );
            $twelve_hours_clock = get_post_meta( $post->ID, 'twelve_hours_clock', true );
            $twelve_hours_clock = get_post_meta( $post->ID, 'twelve_hours_clock', true );
        }
        ?>

        <!-- my custom value input -->
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <label>Book Reference #</label>
                    </td>
                    <td style="font-weight: 700; font-size: 1.4em;">
                        <?=(!empty($book_reference_number) ? $book_reference_number : '');?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>First Name</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" style="width: 100%;" value="<?=(!empty($first_name) ? $first_name : '');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Last Name</label>
                    </td>
                    <td>
                        <input type="text" name="last_name" style="width: 100%;" value="<?=(!empty($last_name) ? $last_name : '');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" style="width: 100%;" value="<?=(!empty($email) ? $email : '');?>">
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label>Contact Number</label>
                    </td>
                    <td>
                        <input type="number" name="contact_number" style="width: 100%;" value="<?=(!empty($contact_number) ? $contact_number : '');?>">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Alternative Contact Number (Optional)</label>
                    </td>
                    <td>
                        <input type="number" name="optional_contact_number" style="width: 100%;" value="<?=(!empty($optional_contact_number) ? $optional_contact_number : '');?>">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Preffered date to Visit</label>
                    </td>
                    <td>
                        <input type="text" name="preffered_date" style="width: 100%;" value="<?=(!empty($preffered_date) ? $preffered_date : '');?>">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Time</label>
                    </td>
                    <td>
                        <?php $time_temp = $time ?>
                        <!-- <input type="text" name="time" style="width: 100%;" value="<?=(!empty($time) ? $time : '');?>"> -->
                        <select name="time" id="time" style="width: 100%">
                            <?php                                
                                $time_array = array();
                                $time = CARSADA_TIME;
                                if (!empty($time)) {
                                    $times = explode(',', $time);
                                    if (!empty($times)) $time_array = $times;
                                }
                            ?>
                            <?php if (!empty($time_array)) : ?>
                                <?php foreach($time_array as $value) : ?>
                                    <option value="<?= $value ?>:00" <?= $value . ':00' == $time_temp? 'selected' : '' ?>><?= $value ?>:00</option>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option value="9:00">9:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="1:00">1:00</option>
                                <option value="2:00">2:00</option>
                            <?php endif ?>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>AM/PM</label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="twelve_hours_clock" value="AM">
                            AM
                        </label>
                        <label>
                            <input type="radio" name="twelve_hours_clock" value="PM">
                            PM
                        </label>
                    </td> 
                </tr>
        </table>

        <script>
            jQuery('input[type="radio"][name="twelve_hours_clock"][value="<?=$twelve_hours_clock;?>"]').attr('checked', 'checked');            
        </script>

        <?php
    }

    public function save_all($post_id) {

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

        // $ids_text = (!empty($_POST['ids_text']) ? $_POST['ids_text'] : array());
        // $proofs_text = (!empty($_POST['proofs_text']) ? $_POST['proofs_text'] : array());
        // $ids = (!empty($_FILES['ids']) ? $_FILES['ids'] : array());
        // $proofs = (!empty($_FILES['proofs']) ? $_FILES['proofs'] : array());

        // $max_size = 1000000; //10mb
        // $modified_files = array();
        // $new_ids = array();
        // $new_proofs = array();

        

        // if (!empty($ids_text)) {
        //     foreach($ids_text as $value) {
        //         $value = stripslashes(html_entity_decode($value));
        //         if (!empty($value)) $new_ids['id'][] = json_decode($value, true);
        //     }
        // }

        // if (!empty($proofs_text)) {
        //     foreach($proofs_text as $value) {
        //         $value = stripslashes(html_entity_decode($value));
        //         if (!empty($value)) $new_ids['proof'][] = json_decode($value, true);
        //     }
        // }

        // if (!empty($ids)) {
        //     foreach ($ids as $key => $value) {
        //         foreach($value as $subkey => $subvalue) {
        //             $modified_files['id'][$subkey][$key] = $subvalue;
        //             if ($key === 'size' && $subvalue > $max_size) return new WP_REST_Response(__('Max file size allowed is 10mb.'), 422); 
        //         }
        //     }
        // }

        // if (!empty($proofs)) {
        //     foreach ($proofs as $key => $value) {
        //         foreach($value as $subkey => $subvalue) {
        //             $modified_files['proof'][$subkey][$key] = $subvalue;
        //             if ($key === 'size' && $subvalue > $max_size) return new WP_REST_Response(__('Max file size allowed is 10mb.'), 422); 
        //         }
        //     }
        // }

        // if (!empty($modified_files)) {
        //     /**
        //      * VALIDATE SIZE
        //      */

        //     foreach($modified_files as $key => $value) {
        //         foreach ($value as $subkey => $subvalue) {
        //             if (!empty($subvalue)) {
        //                 /**
        //                  * KEY = id or proof
        //                  */
        //                 $upload_file = wp_handle_upload($subvalue, array(
        //                     'test_form' => false,
        //                     'mimes' => get_allowed_mime_types()
        //                 ));
        //                 $new_ids[$key][] = $upload_file;
        //             }
        //         }
        //     }
        // }
        
        update_post_meta( $post_id, 'first_name', (!empty($_POST['first_name']) ? $_POST['first_name'] : ''));
        update_post_meta( $post_id, 'last_name', (!empty($_POST['last_name']) ? $_POST['last_name'] : ''));
        update_post_meta( $post_id, 'email', (!empty($_POST['email']) ? $_POST['email'] : ''));
        update_post_meta( $post_id, 'contact_number', (!empty($_POST['contact_number']) ? $_POST['contact_number'] : ''));
        update_post_meta( $post_id, 'optional_contact_number', (!empty($_POST['optional_contact_number']) ? $_POST['optional_contact_number'] : ''));
        update_post_meta( $post_id, 'preffered_date', (!empty($_POST['preffered_date']) ? $_POST['preffered_date'] : ''));
        update_post_meta( $post_id, 'time', (!empty($_POST['time']) ? $_POST['time'] : ''));
        update_post_meta( $post_id, 'twelve_hours_clock', (!empty($_POST['twelve_hours_clock']) ? $_POST['twelve_hours_clock'] : ''));

    }
}

new BookManagement();
?>