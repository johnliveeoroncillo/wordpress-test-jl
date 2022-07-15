<?php
class Products {	

	public function __construct() {
        /**
         * CUSTOM ADMIN PRODUCT
         */
        add_action('admin_head', 'custom_metabox_styles');
        function custom_metabox_styles() {
        echo '
        <style>
            .rwmb-column-3, .rwmb-row .rwmb-column {
                width: 100% !important;
                margin-top: 10px !important; 
            }
            .rwmb-input input:not([type=radio]), .rwmb-input-group, .rwmb-input select, .rwmb-input .select2-container, .rwmb-input textarea {
                width: 50% !important;
            }
        </style>';
        }
        function alter_meta_box($post_type, $priority, $post) {
            global $wp_meta_boxes;	
            $carleader_metabox = carleader_listings_spec_fields();	

            $wp_meta_boxes = metabox_details_alter(0, 'type', 'number');
            $wp_meta_boxes = metabox_details_alter(0, 'min', '0');
            $wp_meta_boxes = metabox_details_alter(0, 'max', '9999999');
            $wp_meta_boxes = metabox_details_alter(0, 'step', '0.01');

            metabox_details_unset(1);
            // $wp_meta_boxes = metabox_details_alter(1, 'type', 'number');
            // $wp_meta_boxes = metabox_details_alter(1, 'min', '0');
            // $wp_meta_boxes = metabox_details_alter(1, 'max', '99999');
            // $wp_meta_boxes = metabox_details_alter(1, 'step', '0.01');

            $wp_meta_boxes = metabox_details_alter(2, 'type', 'number');
            $wp_meta_boxes = metabox_details_alter(2, 'min', '0');
            $wp_meta_boxes = metabox_details_alter(2, 'max', '9999999');
            $wp_meta_boxes = metabox_details_alter(2, 'step', '0.01');

            $wp_meta_boxes = metabox_details_alter(3, 'type', 'number');
            $wp_meta_boxes = metabox_details_alter(3, 'min', '0');
            $wp_meta_boxes = metabox_details_alter(3, 'max', '9999999');
            $wp_meta_boxes = metabox_details_alter(3, 'step', '0.01');

            metabox_details_unset(4);

            metabox_details_unset(6);

            unset($wp_meta_boxes['carleader-listing']['normal']['high']['_carleader_listing_video']);

            $int_color_index = array_search("int_color", array_keys($carleader_metabox));	
            metabox_specs_unset($int_color_index);
            
            $vin_index = array_search("vin", array_keys($carleader_metabox));	
            metabox_specs_unset($vin_index);
            
            $engine_index = array_search("engine", array_keys($carleader_metabox));	
            metabox_specs_unset($engine_index);
            
            $stock_index = array_search("stock", array_keys($carleader_metabox));	
            metabox_specs_unset($stock_index);
            
            $model_engine_fuel_index = array_search("model_engine_fuel", array_keys($carleader_metabox));	
            metabox_specs_unset($model_engine_fuel_index);
            
            $hours_index = array_search("hours", array_keys($carleader_metabox));	
            metabox_specs_unset($hours_index);
            
            $wheelbase_index = array_search("wheelbase", array_keys($carleader_metabox));	
            metabox_specs_unset($wheelbase_index);	
            
            $wheels_index = array_search("wheels", array_keys($carleader_metabox));	
            metabox_specs_unset($wheels_index);

            $front_axle_index = array_search("front_axle", array_keys($carleader_metabox));	
            metabox_specs_unset($front_axle_index);

            $rear_axle_index = array_search("rear_axle", array_keys($carleader_metabox));	
            metabox_specs_unset($rear_axle_index);

            $ratio_index = array_search("ratio", array_keys($carleader_metabox));	
            $wp_meta_boxes = metabox_specs_alter($ratio_index, 'name', 'No. of seats');

            $suspension_index = array_search("suspension", array_keys($carleader_metabox));	
            metabox_specs_unset($suspension_index);

            $breaks_index = array_search("breaks", array_keys($carleader_metabox));	
            metabox_specs_unset($breaks_index);

            $frame_index = array_search("frame", array_keys($carleader_metabox));	
            metabox_specs_unset($frame_index);

            $front_tires_index = array_search("front_tires", array_keys($carleader_metabox));	
            metabox_specs_unset($front_tires_index);

            $rear_tires_index = array_search("rear_tires", array_keys($carleader_metabox));	
            metabox_specs_unset($rear_tires_index);

            $gvwr_index = array_search("gvwr", array_keys($carleader_metabox));	
            metabox_specs_unset($gvwr_index);

            $tare_index = array_search("tare", array_keys($carleader_metabox));	
            $wp_meta_boxes = metabox_specs_alter($tare_index, 'name', 'Wheel size');

            $fuel_tanks_index = array_search("fuel_tanks", array_keys($carleader_metabox));	
            metabox_specs_unset($fuel_tanks_index);

            $code_index = array_search("code", array_keys($carleader_metabox));	
            metabox_specs_unset($code_index);

            $product_index = array_search("product", array_keys($carleader_metabox));	
            metabox_specs_unset($product_index);

            $shell_material_index = array_search("shell_material", array_keys($carleader_metabox));	
            metabox_specs_unset($shell_material_index);	

            $options_description_index = array_search("options_description", array_keys($carleader_metabox));	
            $wp_meta_boxes = metabox_specs_alter($options_description_index, 'name', 'Other Specs');
            
            return $wp_meta_boxes;
        }
        add_action( 'do_meta_boxes', 'alter_meta_box', 0, 3);
        function metabox_specs_unset($index) {
            global $wp_meta_boxes;

            unset($wp_meta_boxes['carleader-listing']['normal']['low']['_carleader_listing_specs']['callback'][0]->meta_box['fields'][$index]);
        }
        function metabox_specs_alter($index, $key, $value) {
            global $wp_meta_boxes;
            
            if(isset($wp_meta_boxes['carleader-listing']['normal']['low']['_carleader_listing_specs']['callback'][0]->meta_box['fields'][$index])){
                $wp_meta_boxes['carleader-listing']['normal']['low']['_carleader_listing_specs']['callback'][0]->meta_box['fields'][$index][$key] = $value;		
            }            
            return $wp_meta_boxes;
        }
        function metabox_details_unset($index) {
            global $wp_meta_boxes;

            unset($wp_meta_boxes['carleader-listing']['side']['high']['_carleader_listing_details']['callback'][0]->meta_box['fields'][$index]);
        }
        function metabox_details_alter($index, $key, $value) {
            global $wp_meta_boxes;
            
            if(isset($wp_meta_boxes['carleader-listing']['side']['high']['_carleader_listing_details']['callback'][0]->meta_box['fields'][$index])){
                $wp_meta_boxes['carleader-listing']['side']['high']['_carleader_listing_details']['callback'][0]->meta_box['fields'][$index][$key] = $value;	
            }            
            return $wp_meta_boxes;
        }
        function carsada_listings_title($id = '') {
            if($id == '') {
                $car_slug = get_query_var('carleader-listing');
                $post = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
            } else {		
                $post = get_post($id);
            }

            return $post->post_title;
        }
	}
}
new Products();


