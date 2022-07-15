<?php
/*
Plugin Name: Carsada Loan Management
Plugin URI: 
Description: Custom plugin for carsada's loan
Version: 0.0.1
Author: JL
Author
License: Education
Text Domain: carsada_loan
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ABSPATH . 'wp-content/themes/caleader-child/class/AsyncUpload.php';

class LoanManagement {

    var $uploader;

    public function __construct() {
        $this->uploader = new AsyncUpload();
        add_action( 'init', array($this, 'carsada_loan_posttype'), 0 ); // hook with init function
        add_action('add_meta_boxes', array($this, 'add_custom_metabox'));
        add_action( 'save_post', array($this, 'save_all'), 10, 1);
        add_action('post_edit_form_tag', array($this, 'add_post_enctype'));
        add_action( 'pre_get_posts', array($this, 'wpex_order_category'), 1 );
    }


    public function add_post_enctype() {
        echo ' enctype="multipart/form-data" ';
    }
        
    public function carsada_loan_posttype() {
        $labels = array(
            'name' => _x( 'Carsada Loan', 'Post Type General Name', 'carsada_loan' ),
            'singular_name' => _x( 'Carsada Loan', 'Post Type Singular Name', 'carsada_loan' ),
            'menu_name' => __( 'Loans', 'carsada_loan' ),
            'name_admin_bar' => __( 'Post Type', 'carsada_loan' ),
            'archives' => __( 'Item Archives', 'carsada_loan' ),
            'parent_item_colon' => __( 'Parent Item:', 'carsada_loan' ),
            'all_items' => __( 'All Items', 'carsada_loan' ),
            'add_new_item' => __( 'Create New ', 'carsada_loan' ),
            'add_new' => __( 'Create ', 'carsada_loan' ),
            'new_item' => __( 'New Item', 'carsada_loan' ),
            'edit_item' => __( 'View', 'carsada_loan' ),
            'update_item' => __( 'Update Item', 'carsada_loan' ),
            'view_item' => __( 'View Item', 'carsada_loan' ),
            'search_items' => __( 'Search Item', 'carsada_loan' ),
            'not_found' => __( 'Not found', 'carsada_loan' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'carsada_loan' ),
            'featured_image' => __( 'Featured Image', 'carsada_loan' ),
            'set_featured_image' => __( 'Set featured image', 'carsada_loan' ),
            'remove_featured_image' => __( 'Remove featured image', 'carsada_loan' ),
            'use_featured_image' => __( 'Use as featured image', 'carsada_loan' ),
            'insert_into_item' => __( 'Insert into item', 'carsada_loan' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'carsada_loan' ),
            'items_list' => __( 'Items list', 'carsada_loan' ),
            'items_list_navigation' => __( 'Items list navigation', 'carsada_loan' ),
            'filter_items_list' => __( 'Filter items list', 'carsada_loan' ),
        );

        $args = array(
            'label' => __( 'Carsada Loan', 'carsada_loan' ),
            'description' => __( 'Carsada Loan', 'carsada_loan' ),
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
            'menu_icon' => __( 'dashicons-format-aside', 'carsada_loan' ),
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
        register_post_type( 'Carsada Loan', $args ); // register new post type

        add_filter( 'post_updated_messages', array($this, 'rw_post_updated_message') );
    }

    public function rw_post_updated_message($messages) {
        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        $messages['carsadaloan'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => __( 'Loan successfully updated.' ),
            2  => __( 'Loan successfully updated.' ),
            3  => __( 'Loan successfully deleted.'),
            4  => __( 'Loan successfully updated.' ),
            /* translators: %s: date and time of the revision */
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'My Post Type restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( 'Loan successfully published.' ),
            7  => __( 'Loan successfully saved.' ),
            8  => __( 'Loan successfully created.' ),
            9  => sprintf(
                __( 'Loan scheduled for: <strong>%1$s</strong>.' ),
                // translators: Publish box date format, see http://php.net/date
                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
            ),
            10 => __( 'Loan draft updated.' )
        );

            //you can also access items this way
            // $messages['post'][1] = "I just totally changed the Updated messages for standards posts";

            //return the new messaging 
        return $messages;
    }

    public function add_custom_metabox() {
        add_meta_box(
            'loan-info',       // $id
            'Loan Information', // $title
            array($this, 'show_custom_info_loan'),  // $callback
            'carsadaloan',                 // $page
            'normal',                  // $context
            'high'                     // $priority
        );

        add_meta_box(
            'loan-info-status',       // $id
            'Loan Status', // $title
            array($this, 'show_custom_info_status'),  // $callback
            'carsadaloan',                 // $page
            'side',                  // $context
            'high'                     // $priority
        );

        add_meta_box(
            'loan-info-car',       // $id
            'Selected Car', // $title
            array($this, 'show_custom_info_car'),  // $callback
            'carsadaloan',                 // $page
            'side',                  // $context
            'high'                     // $priority
        );

        add_meta_box(
            'loan-info-media',       // $id
            'Media', // $title
            array($this, 'show_custom_info_media'),  // $callback
            'carsadaloan',                 // $page
            'normal',                  // $context
            'high'                     // $priority
        );
    }

    public function show_custom_info_car() {
        global $post;

        $car_slug = get_post_meta( $post->ID, 'car_slug', true );
        $car = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
        $car_meta = get_post_meta( $car->ID );
        ?>

        <table style="width: 100%; table-layout: fixed;">
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
            <!-- <tr>
                <td> Variant: </td>
                <td>  </td>
            </td>
            <tr>
                <td> Color: </td>
                <td> 
                    <div style="width: 15px; height: 15px; border-radius: 100%; background-color: #000"></div>
                </td>
            </td> -->
        </table>
<?php }

    public function show_custom_info_media() {
        global $post;

        // Use nonce for verification to secure data sending
        if (!empty($post->ID)) {
            $files = get_post_meta( $post->ID, 'uploads', true );
            $ids = (!empty($files['id']) ? $files['id'] : array());
            $proofs = (!empty($files['proof']) ? $files['proof'] : array());
        }

        ?>
        <style>
            .media {
                display: flex;
                flex-direction: column;
            }

            .media img {
                max-width: 100%;
                max-height: 400px;
                height: auto;
                width: auto;
            }
        </style>
        <!-- my custom value input -->
        <div style="display: flex; flex-direction: row; width: 100%; gap: 20px;">
        <?php
        global $error;
        if (!empty($error)) echo $error->get_error_message();
        ;?>
            <div style="flex: 1;">
                <h4>Valid ID</h4>

                <div class="media-container" style="display: flex; flex-direction: column; gap: 25px;">
                    <?php 
                        foreach($ids as $value) { ?>
                            <div class="media">
                                <?=wp_get_attachment_image( $value, 'full');?>
                                <input type="hidden" name="ids_text[]" value='<?=$value;?>' readonly />
                                <div style="display: block;">
                                    <a style="font-weight: 400; color: #b32d2e; text-decoration: underline; cursor: pointer;" onclick="removeFile('<?=$value;?>', 'ids', this);">Remove File</a>
                                </div>
                            </div>
                    <?php } ;?>
                </div>

                <button class="button button-primary button-large" style="margin-top: 20px;" type="button" onclick="triggerUpload(this, 'ids');">Add New File</button>
            </div>
            <div style="flex: 1;">
                <h4>Proof of Billing</h4>

                <div class="media-container" style="display: flex; flex-direction: column; gap: 25px;">
                    <?php 
                        foreach($proofs as $value) { ;?>
                            <div class="media">
                                <?=wp_get_attachment_image( $value, 'full');?>
                                <input type="hidden" name="proofs_text[]" value='<?=$value;?>' readonly />

                                <div style="display: block;">
                                    <a style="font-weight: 400; color: #b32d2e; text-decoration: underline; cursor: pointer;" onclick="removeFile('<?=$value;?>', 'proofs', this);">Remove File</a>
                                </div>
                            </div>
                    <?php } ;?>
                </div>

                <button class="button button-primary button-large" style="margin-top: 20px;" type="button" onclick="triggerUpload(this, 'proofs');">Add New File</button>
            </div>
        </div>

        <script>
            const base = `
                        <div class="media">
                            <img src="<src>" style="max-width: 100%; max-height: 300px;" >
                            <div style="display: block;">
                                <a style="font-weight: 400; color: #b32d2e; text-decoration: underline; cursor: pointer;" onclick="removeFile('<url>', 'ids', this);">Remove File</a>
                            </div>
                        </div>`;
            const ids = <?=json_encode($ids)?>;
            const proofs = <?=json_encode($proofs)?>;

            function removeFile(id, type, element) {
                const array = eval(type);
                const index = array.findIndex(el => {
                    const id = !el.id ? el : el.id;
                    console.log(id);
                    return Number(id) == Number(id)
                });
                if (index !== -1) {
                    array.splice(index, 1);
                    jQuery(element).closest('.media').remove();
                }
            }

            function triggerUpload(e, type) {
                const self = jQuery(e);
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.setAttribute('name', type + '[]');
                input.style = "display: none;";
                input.onchange = async () => {
                    const file = input.files[0];
                    const size = (file.size / (1024*1024));

                    if (size > 10) {
                        showToast({
                            type: 'error',
                            heading: 'Error !',
                            message: 'Max file size allowed is 10mb.',
                        })
                        return;
                    }
                    // file type is only image.
                    if (/^image\//.test(file.type)) {
                        const toBase64 = await convert(file).catch(e => Error(e));
                        if(toBase64 instanceof Error) {
                            // toBase64.message;
                            showToast({
                                type: 'error',
                                heading: 'Error !',
                                message: 'Sorry, we encountered an issue. Please try again.',
                            })
                        }
                        
                        addFile({ base64: toBase64, file }, self, type, input);

                    } else {
                        showToast({
                            type: 'error',
                            heading: 'Error !',
                            message: 'File type not allowed',
                        })
                    }
                };
                input.click();
            }

            function convert(file) {
                return new Promise((resolve, reject) => {
                const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        resolve(reader.result);
                    }
                    reader.onerror = reject;
                });
            }

            function addFile(data, element, type, input_file) {
                const parent = element.closest('div').find('div.media-container');

                const index = (type === 'ids' ? ids.push(data) : proofs.push(data)) - 1;
                const size = (data.file.size / (1024*1024)).toFixed(2);

                data.id = '<?=time();?>';
                parent.append(base.replace(/<src>/g, data.base64).replace(/<url>/g, data.id));
                const last_added = parent.find('.media').last();
                last_added.append(input_file);
            }
        </script>

        <?php
    }

    public function show_custom_info_status() {
        global $post;

        // Use nonce for verification to secure data sending
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

    public function show_custom_info_loan() {
        global $post;

        // Use nonce for verification to secure data sending
        wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce_loan' );

        if (!empty($post->ID)) {
            $first_name = get_post_meta( $post->ID, 'first_name', true );
            $loan_reference_number = get_post_meta( $post->ID, 'loan_reference_number', true );
            $last_name = get_post_meta( $post->ID, 'last_name', true );
            $email = get_post_meta( $post->ID, 'email', true );
            $contact_number = get_post_meta( $post->ID, 'contact_number', true );
            $optional_contact_number = get_post_meta( $post->ID, 'optional_contact_number', true );
            $address = get_post_meta( $post->ID, 'address', true );
            $citizenship = get_post_meta( $post->ID, 'citizenship', true );
            $terms = get_post_meta( $post->ID, 'terms', true );
            $marital_status = get_post_meta( $post->ID, 'marital_status', true );
            $sex = get_post_meta( $post->ID, 'sex', true );
            $down_payment = get_post_meta( $post->ID, 'down_payment', true );
        }
        ?>

        <!-- my custom value input -->
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <label>Loan Reference #</label>
                    </td>
                    <td style="font-weight: 700; font-size: 1.4em;">
                        <?=(!empty($loan_reference_number) ? $loan_reference_number : '');?>
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
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" style="width: 100%;" value="<?=(!empty($address) ? $address : '');?>">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Citizenship</label>
                    </td>
                    <td>
                        <input type="text" name="citizenship" style="width: 100%;" value="<?=(!empty($citizenship) ? $citizenship : '');?>">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Terms</label>
                    </td>
                    <td>
                    <?php
                            $term_array = array();
                            $term = CARSADA_PERIOD;
                            if (!empty($term)) {
                                $terms_exploded = explode(',', $term);
                                if (!empty($terms_exploded)) $term_array = $terms_exploded;
                            }

                            if (!empty($term_array)) {
                                foreach($term_array as $value) { ;?>
                                    <label>
                                        <input type="radio" name="terms" value="<?=trim($value);?>">
                                        <?=trim($value);?> yr<?=(int) trim($value) > 1 ? 's' : '';?>
                                    </label>
                        <?php   }
                            }
                            else { ;?>
                            <label>
                                <input type="radio" name="terms" value="6">
                                6yrs
                            </label>
                            <label>
                                <input type="radio" name="terms" value="12">
                                12yrs
                            </label>
                            <label>
                                <input type="radio" name="terms" value="18">
                                18yrs
                            </label>
                            <label>
                                <input type="radio" name="terms" value="24">
                                24yrs
                            </label>
                            <label>
                                <input type="radio" name="terms" value="30">
                                30yrs
                            </label>
                            <label>
                                <input type="radio" name="terms" value="36">
                                36yrs
                            </label>
                        <?php } ;?>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Marital Status</label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="marital_status" value="Single">
                            Single
                        </label>
                        <label>
                            <input type="radio" name="marital_status" value="Married">
                            Married
                        </label>
                        <label>
                            <input type="radio" name="marital_status" value="Widow">
                            Widow
                        </label>
                        <label>
                            <input type="radio" name="marital_status" value="Separated">
                            Separated
                        </label>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Sex</label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="sex" value="Male">
                            Male
                        </label>
                        <label>
                            <input type="radio" name="sex" value="Female">
                            Female
                        </label>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label>Downpayment Percentage</label>
                    </td>
                    <td>
                        <?php
                            $downpayment_array = array();
                            $downpayment = CARSADA_DOWNPAYMENT;
                            if (!empty($downpayment)) {
                                $downpayments_exploded = explode(',', $downpayment);
                                if (!empty($downpayments_exploded)) $downpayment_array = $downpayments_exploded;
                            }

                            if (!empty($downpayment_array)) {
                                foreach($downpayment_array as $value) { ;?>
                                    <label>
                                        <input type="radio" name="down_payment" value="<?=trim($value);?>">
                                        <?=trim($value);?>%
                                    </label>
                        <?php   }
                            }
                            else { ;?>
                            <label>
                                <input type="radio" name="down_payment" value="15">
                                15%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="20">
                                20%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="30">
                                30%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="40">
                                40%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="50">
                                50%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="60">
                                60%
                            </label>
                            <label>
                                <input type="radio" name="down_payment" value="70">
                                70%
                            </label>
                        <?php } ;?>
                    </td> 
                </tr>
        </table>

        <script>
            jQuery('input[type="radio"][name="terms"][value="<?=$terms;?>"]').attr('checked', 'checked');
            jQuery('input[type="radio"][name="marital_status"][value="<?=$marital_status;?>"]').attr('checked', 'checked');
            jQuery('input[type="radio"][name="sex"][value="<?=$sex;?>"]').attr('checked', 'checked');
            jQuery('input[type="radio"][name="down_payment"][value="<?=$down_payment;?>"]').attr('checked', 'checked');
        </script>

        <?php
    }

    public function save_all($post_id) {
        global $error;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( ( isset ( $_POST['wpse_our_nonce_loan'] ) ) && ( ! wp_verify_nonce( $_POST['wpse_our_nonce_loan'], plugin_basename( __FILE__ ) ) ) ) {
            return;
        }
        if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }    
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        $ids_text = (!empty($_POST['ids_text']) ? $_POST['ids_text'] : array());
        $proofs_text = (!empty($_POST['proofs_text']) ? $_POST['proofs_text'] : array());
        $ids = (!empty($_FILES['ids']) ? $_FILES['ids'] : array());
        $proofs = (!empty($_FILES['proofs']) ? $_FILES['proofs'] : array());

        $max_size = 1e+7;
        $modified_files = array();
        $new_ids = array();
        $new_proofs = array();


        if (!empty($ids_text)) {
            $new_ids['id'] = $ids_text;
        }

        if (!empty($proofs_text)) {
            $new_ids['proof'] = $proofs_text;
        }

        if (!empty($ids)) {
            foreach ($ids as $key => $value) {
                foreach($value as $subkey => $subvalue) {
                    $modified_files['id'][$subkey][$key] = $subvalue;
                }
            }
        }

        if (!empty($proofs)) {
            foreach ($proofs as $key => $value) {
                foreach($value as $subkey => $subvalue) {
                    $modified_files['proof'][$subkey][$key] = $subvalue;
                }
            }
        }   


        if (!empty($modified_files)) {
            /**
             * VALIDATE SIZE
             */

            foreach($modified_files as $key => $value) {
                foreach ($value as $subkey => $subvalue) {
                    if (!empty($subvalue)) {
                        if ($subvalue['size'] <= $max_size) {
                            /**
                             * KEY = id or proof
                             */
                            // $upload_file = wp_handle_upload($subvalue, array(
                            //     'test_form' => false,
                            //     'mimes' => get_allowed_mime_types()
                            // ));
                            // $new_ids[$key][] = $upload_file;

                            $attachment_id = $this->uploader->upload($subvalue);
                            if (!empty($attachment_id)) {
                                $new_ids[$key][] = $attachment_id;
                            }
                        }
                    }
                }
            }
        }
        
        update_post_meta( $post_id, 'first_name', (!empty($_POST['first_name']) ? $_POST['first_name'] : ''));
        update_post_meta( $post_id, 'last_name', (!empty($_POST['last_name']) ? $_POST['last_name'] : ''));
        update_post_meta( $post_id, 'email', (!empty($_POST['email']) ? $_POST['email'] : ''));
        update_post_meta( $post_id, 'contact_number', (!empty($_POST['contact_number']) ? $_POST['contact_number'] : ''));
        update_post_meta( $post_id, 'optional_contact_number', (!empty($_POST['optional_contact_number']) ? $_POST['optional_contact_number'] : ''));
        update_post_meta( $post_id, 'address', (!empty($_POST['address']) ? $_POST['address'] : ''));
        update_post_meta( $post_id, 'citizenship', (!empty($_POST['citizenship']) ? $_POST['citizenship'] : ''));
        update_post_meta( $post_id, 'terms', (!empty($_POST['terms']) ? $_POST['terms'] : ''));
        update_post_meta( $post_id, 'marital_status', (!empty($_POST['marital_status']) ? $_POST['marital_status'] : ''));
        update_post_meta( $post_id, 'sex', (!empty($_POST['sex']) ? $_POST['sex'] : ''));
        update_post_meta( $post_id, 'down_payment', (!empty($_POST['down_payment']) ? $_POST['down_payment'] : ''));
        update_post_meta( $post_id, 'status', (!empty($_POST['status']) ? $_POST['status'] : ''));
        update_post_meta( $post_id, 'uploads', $new_ids);

    }

    function wpex_order_category( $query ) {
        $query->set( 'order' , 'desc' );
        $query->set( 'orderby', 'date');
        return;
    }
}

new LoanManagement();
?>