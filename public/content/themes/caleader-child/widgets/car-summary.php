<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
class CarsadaCarSummary extends Widget_Base {

	public function get_name() {
		return 'carsada_product_summary';
	}
	public function get_title() {
		return esc_html__( 'Carsada Product Summary', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-single-post';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}

    function carleader_listings_miles( $miles = null, $suff = true ) {
        if ( ! $miles ) {
            $miles = carleader_listings_meta( 'miles' );
        }
        if ( $suff ) {
            return carleader_listings_format_miles( $miles ) . ' ' . carleader_listings_option( 'odometer' );
    
        } else {
            return carleader_listings_format_miles( $miles );
    
        }
    }

	protected function render() {
        $car_slug = get_query_var('loan-car');
        $car_slug = (!empty($car_slug))? $car_slug : get_query_var('book-car');
        $car_slug = (!empty($car_slug))? $car_slug : get_query_var('buy-car');
        $post = get_page_by_path($car_slug, OBJECT, 'carleader-listing');

        $post_id = (isset($post->ID))? $post->ID : '';
        $post_title = (isset($post->post_title))? $post->post_title : 'Sample Car';

        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), '');
        $product_name = $post_title;
        $featured_image = isset($src[0])? $src[0] : 'https://fakeimg.pl/150/';
        $color = get_post_meta($post_id, '_carleader_listing_color', true);
        $color = !empty($color)? $color : 'Color';
        $price = get_post_meta($post_id, '_carleader_listing_price', true);        
        $body_type_data = rwmb_meta('_carleader_listing_body_display', [], $post_id);        
        $body_type = isset($body_type_data->name)? $body_type_data->name : '';
        $mileage = get_post_meta($post_id, '_carleader_listing_miles', true);        
        $fuel_type = get_post_meta($post_id, '_carleader_listing_model_engine_fuel', true);        
        $year = get_post_meta($post_id, '_carleader_listing_model_year', true);        
        $drive = get_post_meta($post_id, '_carleader_listing_drivetrain', true);        
        $ratio = get_post_meta($post_id, '_carleader_listing_ratio', true);        
        $tare = get_post_meta($post_id, '_carleader_listing_tare', true);        
        $options_description = get_post_meta($post_id, '_carleader_listing_options_description', true);        
        
        /**
         * Cleanse abbreviation 
         */
        if ( $fuel_type == 'gas' ) {
            $fuel_type = esc_html__( 'Gasoline', 'caleader-listing' );
        } elseif ( $fuel_type == 'diesel' ) {
            $fuel_type = esc_html__( 'Diesel', 'caleader-listing' );
        } elseif ( $fuel_type == 'cng' ) {
            $fuel_type = esc_html__( 'CNG', 'caleader-listing' );
        } elseif ( $fuel_type == 'lp' ) {
            $fuel_type = esc_html__( 'LP', 'caleader-listing' );
        } elseif ( $fuel_type == 'bdiesel' ) {
            $fuel_type = esc_html__( 'Bio-diesel', 'caleader-listing' );
        } elseif ( $fuel_type == 'ethanol' ) {
            $fuel_type = esc_html__( 'Ethanol', 'caleader-listing' );
        } elseif ( $fuel_type == 'petrol' ) {
            $fuel_type = esc_html__( 'Petrol', 'caleader-listing' );
        } else {
            $fuel_type = str_replace( '_', ' ', ucwords( $fuel_type ) );
        }
        $transmission = get_post_meta($post_id, '_carleader_listing_model_transmission_type', true);        
        if ( $transmission == 'at' ) {
            $transmission = esc_html__( 'Automatic', 'caleader-listing' );
        } elseif ( $transmission == 'mt' ) {
            $transmission = esc_html__( 'Manual', 'caleader-listing' );
        } elseif ( $transmission == 'am' ) {
            $transmission = esc_html__( 'Automated', 'caleader-listing' );
        } elseif ( $transmission == 'cvt' ) {
            $transmission = esc_html__( 'Variable', 'caleader-listing' );
        } else {
            $transmission = str_replace( '_', ' ', ucwords( $transmission ) );
        }
        if ( $drive == 'awd' ) {
            $drive = esc_html__( 'All-Wheel Drive', 'caleader-listing' );
        } elseif ( $drive == 'fwd' ) {
            $drive = esc_html__( 'Four-Wheel Drive', 'caleader-listing' );
        } elseif ( $drive == 'frwd' ) {
            $drive = esc_html__( 'Front-Wheel Drive', 'caleader-listing' );
        } elseif ( $drive == 'rwd' ) {
            $drive = esc_html__( 'Rear-Wheel Drive', 'caleader-listing' );
        } else {
            $drive = str_replace( '_', ' ', ucwords( $drive ) );
        }
    ?>

	<style>
        .product-summary-wrapper {
            --padding: 40px;
            --max-width: 554px;

            padding: var(--padding);
            max-width: var(--max-width);
            margin-left: 0 !important;
            margin-right: auto;
            border: 1px solid rgba(18, 17, 39, 0.17);
        }
        .product-summary-wrapper h1 {
            font-size: 12px;
            font-weight: 800;
            line-height: 11px;
            padding-bottom: 9px;
            border-bottom: 1px solid #BDBDBD;
        }
        .product-summary-wrapper > .product-summary-header {
            padding: 32px 0;
        }
        .product-summary-wrapper > .product-summary-header .featured_image {
            max-height: 150px;
            margin-right: 31px;
            border-radius: 12px;            
        }
        @media (max-width: 1024px) {  
            .product-summary-wrapper > .product-summary-header .featured_image {
                margin-right: 0;
                max-height: 100%;
            }
        }  
        .product-summary-wrapper > .product-summary-header .product_name {
            font-family: 'Exo 2';
            font-weight: 800;
            font-size: 24px;            
            line-height: 36px;
            margin-bottom: 8px;
            color: #313131;
        }
        .product-summary-wrapper > .product-summary-header .color {
            font-family: 'Exo 2';
            font-weight: 600;
            font-size: 24px;            
            line-height: 36px;
            margin-bottom: 19px;
            color: #636366;
        }
        .product-summary-wrapper > .product-summary-header .price {
            font-family: 'Exo 2';
            font-weight: 700;
            font-size: 32px;            
            line-height: 24px;
            margin-bottom: 0px;
            color: #313131;
        }
        .price .woocommerce-Price-currencySymbol {
            margin-right: 11px;
        }
        .tt-aside03-box > .tt-aside03-title {
            font-family: inherit !important;
            padding-bottom: 19px !important;
        }
        .tt-table-options {
            border-spacing: 4px !important;
        }
        .tt-table-options tr td:nth-child(odd) {
            background: #E5E5EA !important;
            color: #48484A !important;
            padding-left: 11px;
        }
        .tt-table-options tr td:nth-child(even) {
            background: #F2F2F7 !important;
            color: #313131 !important;
            padding-left: 22px;
            font-weight: 600 !important;
        }
	</style>
	<div>
		<div class="card product-summary-wrapper">
			<h1>PRODUCT DETAILS</h1>
            <div class="product-summary-header d-flex flex-column flex-xl-row" style="gap: 1.5em;">
                <div>
                    <img src="<?= $featured_image ?>" alt="product_image" class="img-fluid d-inline featured_image">
                </div>
                <div class="d-inline d-flex flex-column align-self-center">
                    <h2 class="product_name"><?= $product_name ?></h2>
                    <span class="color"><?= $color ?></span>
                    <h2 class="price"><?= wc_price($price) ?></h2>
                </div>
            </div>
            <div class="product-summary-body">
            <div class="tt-aside03-box">
                <h6 class="tt-aside03-title">Details								</h6>
                <div class="tt-aside03-content">
                    <table class="tt-table-options mb-0">
                        <tbody>
                            <tr>
                                <td>Body Type:</td>
                                <td><?= $body_type ?></td>
                            </tr>
                            <tr>
                                <td>Mileage:</td>
                                <td><?= carleader_listings_miles($mileage) ?></td>
                            </tr>
                            <tr>
                                <td>Fuel Type:</td>
                                <td><?= $fuel_type ?></td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td><?= $year ?></td>
                            </tr>
                            <tr>
                                <td>Transmission:												</td>
                                <td><?= $transmission ?></td>
                            </tr>
                            <tr>
                                <td>Drive Type:</td>
                                <td><?= $drive ?></td>
                            </tr>
                            <tr>
                                <td>Color:</td>
                                <td><?= $color ?></td>
                            </tr>
                            <tr>
                                <td>No. of seats:</td>
                                <td><?= $ratio ?></td>
                            </tr>
                            <tr>
                                <td>Wheel size:</td>
                                <td><?= $tare ?></td>
                            </tr>
                            <tr>
                                <td>Other Specs:</td>
                                <td><?= $options_description ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new CarsadaCarSummary() );
?>
