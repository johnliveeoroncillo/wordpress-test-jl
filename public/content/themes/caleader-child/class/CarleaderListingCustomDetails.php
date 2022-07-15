<?php 

class CarleaderListingCustomDetails {

    public function __construct() {
        add_action( 'add_meta_boxes', array($this, 'add_custom_box') );
        add_action( 'save_post', array($this, 'save_all') );
    }

    public function add_custom_box() {
        add_meta_box(
            'Carsada Dealers', // ID, should be a string.
            'Dealer', // Meta Box Title.
            array($this, 'dealer_metabox'), // Your call back function, this is where your form field will go.
            'carleader-listing', // The post type you want this to show up on, can be post, page, or custom post type.
            'side', // The placement of your meta box, can be normal or side.
            'high' // The priority in which this will be displayed.
        );

        add_meta_box(
            'Carsada Financial IM', // ID, should be a string.
            'Financial Institute    ', // Meta Box Title.
            array($this, 'financial_metabox'), // Your call back function, this is where your form field will go.
            'carleader-listing', // The post type you want this to show up on, can be post, page, or custom post type.
            'side', // The placement of your meta box, can be normal or side.
            'high' // The priority in which this will be displayed.
        );
    }

    function dealer_metabox($post) {
        wp_nonce_field( 'my_awesome_nonce', 'awesome_nonce' );    
        $checkboxMeta = get_post_meta( $post->ID );

        $dealers = get_posts(array('post_type' => 'carsadadealer'));
        $saved_dealers = get_post_meta( $post->ID, '_carsada_dealers', true ); ?>
            <select class="select2-custom" name="_carsada_dealers" style="width: 100%;" data-placeholder="Select Dealer" data-value="<?=$saved_dealers;?>">
    <?php if (!empty($dealers)) { 
            foreach($dealers as $dealer) { ;?>
                <option value="<?=$dealer->ID;?>"><?=$dealer->post_title;?></option>
                <!-- <label>
                    <input type="checkbox" name="_carsada_dealers[]" id="_carsada_dealer_<?=$dealer->ID;?>" value="<?=$dealer->ID;?>" <?=in_array($dealer->ID, $saved_dealers) ? 'checked="checked"' : '';?> /><?=$dealer->post_title;?>
                </label> -->
        <?php }
        } ;?>
            </select>
<?php }

    function financial_metabox($post) {
        wp_nonce_field( 'my_awesome_nonce', 'awesome_nonce' );    
        $checkboxMeta = get_post_meta( $post->ID );

        $finances = get_posts(array('post_type' => 'carsadafinancialim'));
        $saved_finances = get_post_meta( $post->ID, '_carsada_financialim', true ); ?>
         <select class="select2-custom" name="_carsada_financialim" style="width: 100%;" data-placeholder="Select Financial Institute" data-value="<?=$saved_finances;?>">
    <?php if (!empty($finances)) { 
            foreach($finances as $finance) { ;?>
                <option value="<?=$finance->ID;?>"><?=$finance->post_title;?></option>
                <!-- <label>
                    <input type="checkbox" name="_carsada_financialim[]" id="_carsada_financialim<?=$finance->ID;?>" value="<?=$finance->ID;?>" <?=in_array($finance->ID, $saved_finances) ? 'checked="checked"' : '';?> /><?=$finance->post_title;?>
                </label> -->
        <?php }
        } ;?>
        </select>
<?php }

    public function save_all($post_id) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;
        if ( ( isset ( $_POST['my_awesome_nonce'] ) ) && ( ! wp_verify_nonce( $_POST['my_awesome_nonce'], plugin_basename( __FILE__ ) ) ) )
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

        $dealers = (isset($_POST['_carsada_dealers']) ? $_POST['_carsada_dealers'] : '');
        update_post_meta( $post_id, '_carsada_dealers', $dealers );

        $finance = (isset($_POST['_carsada_financialim']) ? $_POST['_carsada_financialim'] : '');
        update_post_meta( $post_id, '_carsada_financialim', $finance );
    }
}

new CarleaderListingCustomDetails();

// function get_dealer_name($dealer_id) {
//     return get_the_title( $dealer_id );
//     die();
// }

// echo get_dealer_name(2910);