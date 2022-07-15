<?php

require_once 'AsyncUpload.php';

class RestApi {
    public static $uploader;
    public function __construct() {
        self::init();
        self::$uploader = new AsyncUpload();
    }

    /**
     * REGISTER CUSTOM REST API
     */
    public static function init() {
        add_action( 'rest_api_init', function () {
            register_rest_route('rest-api', '/apply-a-loan', array(
                'methods' => 'POST',
                'callback' => array('RestApi', 'apply_a_loan'),
                'permission_callback' => '__return_true'
            ));
            register_rest_route('rest-api', '/book-a-visit', array(
                'methods' => 'POST',
                'callback' => array('RestApi', 'book_a_visit'),
                'permission_callback' => '__return_true'
            ));
            register_rest_route('rest-api', '/buy-now', array(
                'methods' => 'POST',
                'callback' => array('RestApi', 'buy_now'),
                'permission_callback' => '__return_true'
            ));
        });
    }

   /**
    * APPLY A LOAN
    */
    public static function apply_a_loan(WP_REST_Request $request) {
        $posts = $_POST;

        $loan_reference = 'L' . strtotime(date('Y-m-d H:i:s'));
        
        $apply_a_loan_nonce_field = (isset($posts['apply_a_loan_nonce_field']) ? $posts['apply_a_loan_nonce_field'] : '');
        $_wp_http_referer = (isset($posts['_wp_http_referer']) ? $posts['_wp_http_referer'] : '');

        $terms = explode(',', CARSADA_PERIOD);
        if (empty($terms)) $terms = array();

        $maritals = array('Single','Married','Widow','Separated');
        $sexs = array('Male','Female');
        
        $dps = explode(',', CARSADA_DOWNPAYMENT);
        if (empty($dps)) $dps = array(); 

        $first_name = (isset($posts['first_name']) ? $posts['first_name'] : '');
        $last_name = (isset($posts['last_name']) ? $posts['last_name'] : '');
        $email = (isset($posts['email']) ? $posts['email'] : '');
        $contact_number = (isset($posts['contact_number']) ? $posts['contact_number'] : '');
        $address = (isset($posts['address']) ? $posts['address'] : '');
        $citizenship = (isset($posts['citizenship']) ? $posts['citizenship'] : '');
        $term = (isset($posts['terms']) ? $posts['terms'] : '');
        $marital_status = (isset($posts['marital_status']) ? $posts['marital_status'] : '');
        $sex = (isset($posts['sex']) ? $posts['sex'] : '');
        $down_payment = (isset($posts['downpayment_percentage']) ? $posts['downpayment_percentage'] : '');
        $tnc = (isset($posts['tnc']) ? $posts['tnc'] : '');
        $globe = (isset($posts['globe']) ? $posts['globe'] : '');
        $files = (isset($_FILES['files']) ? $_FILES['files'] : array());
        $files_proof = (isset($_FILES['files_proof']) ? $_FILES['files_proof'] : array());
        $car_slug = (isset($posts['car_slug']) ? $posts['car_slug'] : '');


        /**
         * TEMPORARILY REMOVED
         */
        // if (
        //     empty ( $apply_a_loan_nonce_field )
        //     || ! wp_verify_nonce( $apply_a_loan_nonce_field, 'apply_a_loan_submit' )
        // ) {
        //     return new WP_REST_Response('Invalid nonce : '.$apply_a_loan_nonce_field, 403);
        // } 

        /**
         * ADDITIONAL VALIDATION
         */
        if (empty($first_name)) return new WP_REST_Response('Invalid first name', 422);
        else if (empty($last_name)) return new WP_REST_Response('Invalid last name', 422);
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return new WP_REST_Response('Invalid email address', 422);
        else if (strlen($contact_number) !== 10) return new WP_REST_Response('Invalid contact number', 422);
        else if (!empty($optional_contact_number) && strlen($contact_number) !== 10) return new WP_REST_Response('Invalid contact number', 422);
        else if (empty($address)) return new WP_REST_Response('Invalid address', 422);
        else if (empty($citizenship)) return new WP_REST_Response('Invalid citizenship', 422);
        else if (empty($term) || !in_array($term, $terms)) return new WP_REST_Response('Invalid terms', 422);
        else if (empty($marital_status) || !in_array($marital_status, $maritals)) return new WP_REST_Response('Invalid marital status', 422);
        else if (empty($sex) || !in_array($sex, $sexs)) return new WP_REST_Response('Invalid sex', 422);
        else if (empty($down_payment) || !in_array($down_payment, $dps)) return new WP_REST_Response('Invalid down payment', 422);
        else if (empty($tnc)) return new WP_REST_Response('Please check terms and conditions', 422);
        else if (empty($files) || count($files) < 2) return new WP_REST_Response('Please upload atleast 2 valid ids', 422);
        else if (empty($files_proof || count($files_proof) < 2)) return new WP_REST_Response('Please upload atleast 2 proof of billing', 422);
        else if (empty($car_slug)) return new WP_REST_Response('Invalid selected car', 422);

        $max_size = 1e+7; //10mb
        /**
         * PARSE FILES
         */
        $modified_files = array();
        $data_files = array();
        
        /**
         * OUTPUT:
         * FROM:
         * name: [1,2],
         * size: [1,2]
         * TO:
         * name[0] = 1
         * name[1] = 2
         * size[0] = 1
         * size[1] = 2
         */
        foreach ($files as $key => $value) {
            foreach($value as $subkey => $subvalue) {
                $modified_files['id'][$subkey][$key] = $subvalue;
                if ($key === 'size' && $subvalue > $max_size) return new WP_REST_Response(__('Max file size allowed is 10mb.'), 422); 
            }
        }

        foreach ($files_proof as $key => $value) {
            foreach($value as $subkey => $subvalue) {
                $modified_files['proof'][$subkey][$key] = $subvalue;
                if ($key === 'size' && $subvalue > $max_size) return new WP_REST_Response(__('Max file size allowed is 10mb.'), 422); 
            }
        }

        /**
         * REMOTE UPLOAD
         */
        if (!empty($modified_files)) {
            /**
             * VALIDATE SIZE
             */

            foreach($modified_files as $key => $value) {
                foreach ($value as $subkey => $subvalue) {
                    if (!empty($subvalue)) {
                        /**
                         * KEY = id or proof
                         */
                        $attachment_id = self::$uploader->upload($subvalue);
                        if (!empty($attachment_id)) $data_files[$key][] = $attachment_id;
                    }
                }
            }
        }


        // Create post object
        $post = array(
            'post_title'    => $loan_reference.' - '.$first_name.' '.$last_name,
            'post_content'  => $first_name.' '.$last_name,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'carsadaloan',
        );
        
        // Insert the post into the database
        $post_id = wp_insert_post( $post );
        if (!empty($post_id)) {
            update_post_meta( $post_id, 'first_name', $first_name );
            update_post_meta( $post_id, 'last_name', $last_name );
            update_post_meta( $post_id, 'email', $email );
            update_post_meta( $post_id, 'contact_number', "0" . $contact_number );
            update_post_meta( $post_id, 'address', $address );
            update_post_meta( $post_id, 'citizenship', $citizenship );
            update_post_meta( $post_id, 'terms', $term );
            update_post_meta( $post_id, 'marital_status', $marital_status );
            update_post_meta( $post_id, 'sex', $sex );
            update_post_meta( $post_id, 'down_payment', $down_payment );
            update_post_meta( $post_id, 'tnc', $tnc );
            update_post_meta( $post_id, 'globe', $globe );
            update_post_meta( $post_id, 'car_slug', $car_slug );
            update_post_meta( $post_id, 'loan_reference_number', $loan_reference );
            update_post_meta( $post_id, 'uploads', $data_files );
            update_post_meta( $post_id, 'status', 'Pending');

            self::send_email(
                    array(
                        'first_name' => $first_name,
                        'email' => $email,
                        'loan_reference_number' => $loan_reference,
                        'car_slug' => $car_slug,
                    ),
                    'loan_reference_number',
                    'Carsada - Loan Reference Number:' . $loan_reference,
                    'loan-template',
                );
        }
        
        return array('id' => $post_id, 'loan_reference_number' => $loan_reference);
    }

    /**
    * BOOK A VISIT
    */
    public static function book_a_visit(WP_REST_Request $request) {
        $posts = $_POST;

        $book_reference = 'BV' . strtotime(date('Y-m-d H:i:s'));
        
        $book_a_visit_nonce_field = (isset($posts['book_a_visit_nonce_field']) ? $posts['book_a_visit_nonce_field'] : '');
        // $_wp_http_referer = (isset($posts['_wp_http_referer']) ? $posts['_wp_http_referer'] : '');

        
        // $explode = explode('/', $_wp_http_referer);
        // /**
        //  * LOCAL SLUG
        //  */
        // if (!empty($explode[3])) {
        //     $car_slug = $explode[3];
        // } else if (!empty($explode[2])) { // LIVE SLUG
        //     $car_slug = $explode[2];
        // }
        
        // $terms = explode('/', CARSADA_PERIOD);
        // if (empty($terms)) $terms = array();

        // $maritals = array('Single','Married','Widow','Separated');
        // $sexs = array('Male','Female');
        
        // $dps = explode('/', CARSADA_DOWNPAYMENT);
        // if (empty($dps)) $dps = array(); 

        $car_slug = (isset($posts['car_slug']) ? $posts['car_slug'] : '');
        $variant = (isset($posts['variant']) ? $posts['variant'] : '');
        $first_name = (isset($posts['first_name']) ? $posts['first_name'] : '');
        $last_name = (isset($posts['last_name']) ? $posts['last_name'] : '');
        $email = (isset($posts['email']) ? $posts['email'] : '');
        $contact_number = (isset($posts['contact_number']) ? "0" . $posts['contact_number'] : '');
        $optional_contact_number = (isset($posts['optional_contact_number']) ? "0" . $posts['optional_contact_number'] : '');
        $preffered_date = (isset($posts['preffered_date']) ? $posts['preffered_date'] : '');
        $time = (isset($posts['time']) ? $posts['time'] : '');
        $twelve_hours_clock = (isset($posts['twelve_hours_clock']) ? $posts['twelve_hours_clock'] : '');

        // $address = (isset($posts['address']) ? $posts['address'] : '');
        // $citizenship = (isset($posts['citizenship']) ? $posts['citizenship'] : '');
        // $term = (isset($posts['terms']) ? $posts['terms'] : '');
        // $marital_status = (isset($posts['marital_status']) ? $posts['marital_status'] : '');
        // $sex = (isset($posts['sex']) ? $posts['sex'] : '');
        // $down_payment = (isset($posts['downpayment_percentage']) ? $posts['downpayment_percentage'] : '');
        $tnc = (isset($posts['tnc']) ? $posts['tnc'] : '');
        $globe = (isset($posts['globe']) ? $posts['globe'] : '');
        // $files = (isset($_FILES['files']) ? $_FILES['files'] : array());
        // $files_proof = (isset($_FILES['files_proof']) ? $_FILES['files_proof'] : array());

        /**
         * TEMPORARILY REMOVED
         */
        // if (
        //     empty ( $book_a_visit_nonce_field )
        //     || ! wp_verify_nonce( $book_a_visit_nonce_field, 'book_a_visit_submit' )
        // ) {
        //     return new WP_REST_Response('Invalid nonce : '.$book_a_visit_nonce_field, 403);
        // } 

        /**
         * ADDITIONAL VALIDATION
         */
        if (empty($first_name)) return new WP_REST_Response('Invalid first name', 422);
        else if (empty($last_name)) return new WP_REST_Response('Invalid last name', 422);
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return new WP_REST_Response('Invalid email address', 422);
        else if (strlen($contact_number) !== 11) return new WP_REST_Response('Invalid contact number', 422);
        // else if (strlen($optional_contact_number) !== 11) return new WP_REST_Response('Invalid alternative contact number', 422);
        else if (empty($preffered_date)) return new WP_REST_Response('Invalid preffered date to visit', 422);
        else if (empty($time)) return new WP_REST_Response('Invalid time to visit', 422);
        else if (empty($twelve_hours_clock)) return new WP_REST_Response('Invalid Am/PM twelve hourse clock', 422);        
        else if (empty($car_slug)) return new WP_REST_Response('Invalid selected car', 422);

        // Create post object
        $post = array(
            'post_title'    => $book_reference.' - '.$first_name.' '.$last_name,
            'post_content'  => $first_name.' '.$last_name,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'carsadabook',
        );
        
        // Insert the post into the database
        $post_id = wp_insert_post( $post );
        if (!empty($post_id)) {
            update_post_meta( $post_id, 'first_name', $first_name );
            update_post_meta( $post_id, 'last_name', $last_name );
            update_post_meta( $post_id, 'email', $email );
            update_post_meta( $post_id, 'contact_number', $contact_number );
            update_post_meta( $post_id, 'optional_contact_number', $optional_contact_number );
            update_post_meta( $post_id, 'preffered_date', $preffered_date );
            update_post_meta( $post_id, 'time', $time );
            update_post_meta( $post_id, 'twelve_hours_clock', $twelve_hours_clock );
            // update_post_meta( $post_id, 'marital_status', $marital_status );
            // update_post_meta( $post_id, 'sex', $sex );
            // update_post_meta( $post_id, 'down_payment', $down_payment );
            update_post_meta( $post_id, 'tnc', $tnc );
            update_post_meta( $post_id, 'globe', $globe );
            update_post_meta( $post_id, 'car_slug', $car_slug );
            update_post_meta( $post_id, 'book_reference_number', $book_reference );
            // update_post_meta( $post_id, 'uploads', $data_files );
            update_post_meta( $post_id, 'status', 'Pending');

            self::send_email(
                    array(
                        'first_name' => $first_name,
                        'email' => $email,
                        'book_reference_number' => $book_reference
                    ),
                    'book_reference_number',
                    'Welcome to Carsada',
                    'book-template',
                );
        }
        
        return array('id' => $post_id, 'book_reference_number' => $book_reference);
    }

    /**
    * BUY NOW
    */
    public static function buy_now(WP_REST_Request $request) {
        $posts = $_POST;

        $buy_reference = 'BN' . strtotime(date('Y-m-d H:i:s'));
        
        $buy_now_nonce_field = (isset($posts['buy_now_nonce_field']) ? $posts['buy_now_nonce_field'] : '');
        // $_wp_http_referer = (isset($posts['_wp_http_referer']) ? $posts['_wp_http_referer'] : '');

        
        // $explode = explode('/', $_wp_http_referer);
        // /**
        //  * LOCAL SLUG
        //  */
        // if (!empty($explode[3])) {
        //     $car_slug = $explode[3];
        // } else if (!empty($explode[2])) { // LIVE SLUG
        //     $car_slug = $explode[2];
        // }
        
        // $terms = explode('/', CARSADA_PERIOD);
        // if (empty($terms)) $terms = array();

        // $maritals = array('Single','Married','Widow','Separated');
        // $sexs = array('Male','Female');
        
        // $dps = explode('/', CARSADA_DOWNPAYMENT);
        // if (empty($dps)) $dps = array(); 

        $car_slug = (isset($posts['car_slug']) ? $posts['car_slug'] : '');
        $variant = (isset($posts['variant']) ? $posts['variant'] : '');
        $first_name = (isset($posts['first_name']) ? $posts['first_name'] : '');
        $last_name = (isset($posts['last_name']) ? $posts['last_name'] : '');
        $email = (isset($posts['email']) ? $posts['email'] : '');
        $contact_number = (isset($posts['contact_number']) ? "0" . $posts['contact_number'] : '');
        $optional_contact_number = (isset($posts['optional_contact_number']) ? "0" . $posts['optional_contact_number'] : '');
        $preffered_date = (isset($posts['preffered_date']) ? $posts['preffered_date'] : '');
        $time = (isset($posts['time']) ? $posts['time'] : '');
        $twelve_hours_clock = (isset($posts['twelve_hours_clock']) ? $posts['twelve_hours_clock'] : '');
        $address = (isset($posts['address']) ? $posts['address'] : '');
        $citizenship = (isset($posts['citizenship']) ? $posts['citizenship'] : '');

        // $address = (isset($posts['address']) ? $posts['address'] : '');
        // $citizenship = (isset($posts['citizenship']) ? $posts['citizenship'] : '');
        // $term = (isset($posts['terms']) ? $posts['terms'] : '');
        // $marital_status = (isset($posts['marital_status']) ? $posts['marital_status'] : '');
        // $sex = (isset($posts['sex']) ? $posts['sex'] : '');
        // $down_payment = (isset($posts['downpayment_percentage']) ? $posts['downpayment_percentage'] : '');
        $tnc = (isset($posts['tnc']) ? $posts['tnc'] : '');
        $globe = (isset($posts['globe']) ? $posts['globe'] : '');
        // $files = (isset($_FILES['files']) ? $_FILES['files'] : array());
        // $files_proof = (isset($_FILES['files_proof']) ? $_FILES['files_proof'] : array());

        /**
         * TEMPORARILY REMOVED
         */
        // if (
        //     empty ( $buy_now_nonce_field )
        //     || ! wp_verify_nonce( $buy_now_nonce_field, 'buy_now_submit' )
        // ) {
        //     return new WP_REST_Response('Invalid nonce : '.$buy_now_nonce_field, 403);
        // } 

        /**
         * ADDITIONAL VALIDATION
         */
        if (empty($first_name)) return new WP_REST_Response('Invalid first name', 422);
        else if (empty($last_name)) return new WP_REST_Response('Invalid last name', 422);
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return new WP_REST_Response('Invalid email address', 422);
        else if (strlen($contact_number) !== 11) return new WP_REST_Response('Invalid contact number', 422);
        // else if (strlen($optional_contact_number) !== 11) return new WP_REST_Response('Invalid alternative contact number', 422);
        else if (empty($preffered_date)) return new WP_REST_Response('Invalid preffered date to visit', 422);
        else if (empty($time)) return new WP_REST_Response('Invalid time to visit', 422);
        else if (empty($twelve_hours_clock)) return new WP_REST_Response('Invalid Am/PM twelve hourse clock', 422);        
        else if (empty($address)) return new WP_REST_Response('Invalid address', 422);
        else if (empty($citizenship)) return new WP_REST_Response('Invalid citizenship', 422);
        else if (empty($car_slug)) return new WP_REST_Response('Invalid selected car', 422);

        // Create post object
        $post = array(
            'post_title'    => $buy_reference.' - '.$first_name.' '.$last_name,
            'post_content'  => $first_name.' '.$last_name,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'carsadabuy',
        );
        
        // Insert the post into the database
        $post_id = wp_insert_post( $post );
        if (!empty($post_id)) {
            update_post_meta( $post_id, 'first_name', $first_name );
            update_post_meta( $post_id, 'last_name', $last_name );
            update_post_meta( $post_id, 'email', $email );
            update_post_meta( $post_id, 'contact_number', $contact_number );
            update_post_meta( $post_id, 'optional_contact_number', $optional_contact_number );
            update_post_meta( $post_id, 'preffered_date', $preffered_date );
            update_post_meta( $post_id, 'time', $time );
            update_post_meta( $post_id, 'twelve_hours_clock', $twelve_hours_clock );
            update_post_meta( $post_id, 'address', $address );
            update_post_meta( $post_id, 'citizenship', $citizenship );
            // update_post_meta( $post_id, 'down_payment', $down_payment );
            update_post_meta( $post_id, 'tnc', $tnc );
            update_post_meta( $post_id, 'globe', $globe );
            update_post_meta( $post_id, 'car_slug', $car_slug );
            update_post_meta( $post_id, 'buy_reference_number', $buy_reference );
            // update_post_meta( $post_id, 'uploads', $data_files );
            update_post_meta( $post_id, 'status', 'Pending');

            self::send_email(
                    array(
                        'first_name' => $first_name,
                        'email' => $email,
                        'buy_reference_number' => $buy_reference
                    ),
                    'buy_reference_number',
                    'Welcome to Carsada',
                    'buy-template',
                );
        }
        
        return array('id' => $post_id, 'buy_reference_number' => $buy_reference);
    }

    /**
     * REMOTE UPLOAD FUNCTION
     */
    public static function upload_media($file) {
        $upload_file = wp_handle_upload($file, array(
            'test_form' => false,
            'mimes' => get_allowed_mime_types()
        ));
       
        return $upload_file;
    }

    /**
     * TODO: Temporary
     *       Move to mailchimp
     * SEND EMAIL
     * @param
     * $info = array('first_name', 'loan_reference_number', 'email', 'car_slug')
     * key = 'loan_reference_number'
     */
    public static function send_email($info, $key, $subject, $template) {
        $replace = array('*|base_url|*' => CARSADA_URL, '*|domain|*' => CARSADA_DOMAIN, '*|first_name|*' => $info['first_name'], '*|reference_number|*' => $info[$key], '*|support_email|*' => SUPPORT_EMAIL, '*|car_slug|*' => (!empty($info['car_slug']) ? $info['car_slug'] : ''));

        $keys = array_keys($replace);
        $values = array_values($replace);

        ob_start();
        include(BASE_PATH.'/template-part/email/' . $template . '.php');
        $content = ob_get_clean();
        $content = str_replace($keys, $values, $content);

        $to = $info['email'];
        $subject = $subject;
        $message = $content;
        $headers = array('Content-Type: text/html; charset=UTF-8');

        wp_mail( $to, $subject, $message, $headers );
    }
}

new RestApi();