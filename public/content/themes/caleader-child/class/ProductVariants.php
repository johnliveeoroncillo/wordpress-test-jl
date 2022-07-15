<?php 

class ProductVariants extends carleaderListing {
    function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );

        $product_variant = array(
            array( 
                'label'    => 'Parent Car',                
                'id'    => 'car_variant_parent_car',
                'type'    => 'post_select',
                'post_type' => 'carleader-listing',
                'required' => true,
            ),
            array( 
                'label'    => 'Color',                
                'id'    => 'car_variant_color',
                'type'    => 'color',
                'required' => true,
            ),
        );

        new custom_add_meta_box('product_variant', 'Car Variant', $product_variant, 'carleader-listing');

        add_action('admin_head', array($this, 'admin_head'));

        add_action('wp_ajax_carsada_variant_init', array($this, 'carsada_variant_init'));
        add_action('wp_ajax_nopriv_carsada_variant_init', array($this, 'carsada_variant_init'));

        add_action('wp_ajax_carsada_color_variants', array($this, 'carsada_color_variants'));
        add_action('wp_ajax_nopriv_carsada_color_variants', array($this, 'carsada_color_variants'));        

        add_filter('wp_footer', function() {
            if(is_singular('carleader-listing')) {
                $car_slug = get_query_var('carleader-listing');
                $CARSADA_URL = CARSADA_URL;
                echo "
                <script>
                    jQuery(document).ready(function($) {                        
                        $.ajax({
                            type: 'POST',                            
                            url: listing_obj.ajax_url,
                            data: {
                                action: 'carsada_variant_init',
                                car_slug: '$car_slug',
                            },
                            success: function(res) {
                                var obj = JSON.parse(res)
                                var n = obj.next;
                                var c = obj.result;
                                
                                $('.color-overlay').hide();
                                $('.variant-overlay').hide();
                                $('.car-variants .SumoSelect select').show();
                                $('.car-variants .SumoSelect .CaptionCont').show();

                                $.each(obj.colors, function(key, value){
                                    var color_template = $('.car-colors-wrapper').first().clone();
                                    color_template.removeClass('d-none')
                                        .find('.car-colors').css('background-color', value);
                                                                        
                                    if(obj.active === value) {
                                        color_template.find('.car-colors-active').addClass('active');
                                    }

                                    $('.car-colors-container').append(color_template);
                                })

                                $.each(obj.models, function(key, value){
                                    $('#car-variant-models')[0].sumo.add(value.slug, value.name);                                    
                                });

                                var title = $('.tt-title-single .tt-title').text();
                                $('.car-variants span.placeholder').removeClass('placeholder').text(title);

                                function getBgColorHex(elem){
                                    var color = elem.css('background-color')
                                    var hex;
                                    if(color.indexOf('#')>-1){
                                        //for IE
                                        hex = color;
                                    } else {
                                        var rgb = color.match(/\d+/g);
                                        hex = '#'+ ('0' + parseInt(rgb[0], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[1], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[2], 10).toString(16)).slice(-2);
                                    }
                                    return hex;
                                }

                                $('.car-colors').click(function() {
                                    var color = getBgColorHex($(this));
                                    $('.car-colors-active').removeClass('active')
                                    $(this).parent().addClass('active');
                                    $('.variant-overlay').show();

                                    $('.car-variants .SumoSelect select').hide();
                                    $('.car-variants .SumoSelect .CaptionCont').hide();
                                    $('.variant-overlay').show();

                                    $.ajax({
                                        type: 'POST',                            
                                        url: listing_obj.ajax_url,
                                        data: {
                                            action: 'carsada_color_variants',
                                            car_slug: '$car_slug',
                                            car_color: color,
                                        },
                                        success: function(res) {
                                            var obj = JSON.parse(res)
                                            var n = obj.next;
                                            var c = obj.result;
                                            
                                            $('.variant-overlay').hide();

                                            $('#car-variant-models')[0].sumo.unload();
                                            $('#car-variant-models').val('');
                                            $('#car-variant-models').empty();
                                            $('#car-variant-models').SumoSelect();
                                            $.each(obj, function(key, value){
                                                console.log(value)
                                                $('#car-variant-models')[0].sumo.add(value.slug, value.name);                                    
                                            });
                                        }
                                    });
                                });
                            },
                        });

                        $('#car-variant-models').on('change', function() {
                            var car_slug = $('#car-variant-models').val();                            
                            window.location.href = '$CARSADA_URL/listing/' + car_slug;
                        })
                    });
                </script>
                ";
            }            
        });
    }

    function carsada_variant_init() {        
        $car_slug = $_POST['car_slug'];

        $post = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
        $parent_car = get_post_meta($post->ID, 'car_variant_parent_car', true);
        $color = get_post_meta($post->ID, 'car_variant_color', true);
        $model = get_post_meta($post->ID, 'car_variant_model', true);        

        if($parent_car == NULL) {
            $parent_id = $post->ID;
            
            $colors = [$color];
            $active = $color;
        } else {
            $parent_id = $parent_car;
            
            $parent_color = get_post_meta($parent_id, 'car_variant_color', true);
            $colors = [$parent_color];
            $active = $color;
        }

        $posts = get_posts(
            array(
                'post_type' => 'carleader-listing',
                'meta_key' => 'car_variant_parent_car',  
                'meta_value' => $parent_id,
            )
        );            
        $car_variant_colors = array_map(function ($post) {                
            return get_post_meta($post->ID, 'car_variant_color', true);
        }, $posts);
        $colors = array_merge($colors, $car_variant_colors);
        $colors = array_unique($colors);

        $posts = get_posts(
            array(
                'post_type' => 'carleader-listing',
                'meta_key' => 'car_variant_color',  
                'meta_value' => $active,
            )
        );        
        $car_variant_models = array_map(function ($post) {                
            $post = get_post($post->ID);
            return $models[] = [
                'name' => $post->post_title,
                'slug' => $post->post_name,
            ];
        }, $posts);
        $models = $car_variant_models;

        echo json_encode([
            'colors' => $colors,
            'active' => $active,
            'models' => $models,
        ]);       
        die();            
    }

    function carsada_color_variants() {
        $car_slug = $_POST['car_slug'];        

        $post = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
        $parent_car = get_post_meta($post->ID, 'car_variant_parent_car', true);
        $models = [];

        $parent_id = $parent_car;

        if(!empty($parent_id)) {
            $post = get_post($parent_id);
            $color = get_post_meta($post->ID, 'car_variant_color', true);
            if($color == $_POST['car_color']) {
                $models[] = [
                    'name' => $post->post_title,
                    'slug' => $post->post_name,
                ];
            }
        }

        $posts = get_posts(
            array(
                'post_type' => 'carleader-listing',
                'meta_key' => 'car_variant_parent_car',  
                'meta_value' => $parent_id,
            )
        );        
        $car_variants = array_map(function ($post) {                
            $color = get_post_meta($post->ID, 'car_variant_color', true);
            if($color == $_POST['car_color']) {
                $post = get_post($post->ID);
                return $models[] = [
                    'name' => $post->post_title,
                    'slug' => $post->post_name,
                ];
            } else {
                return;
            }          
        }, $posts);
        $car_variants = array_filter($car_variants, function($value) { 
            return !is_null($value) && $value !== '';
        });
        $models = array_merge($models, $car_variants);        

        echo json_encode($models);
        die();
    }

    function admin_head() {
        echo '
        <style>
            .parent-id-label-wrapper,
            #parent_id {
                display: none;
            } 
        </style>';    

        echo '
        <script type="text/javascript">
            jQuery(function($) {
                $("#car_variant_parent_car").on("change", function() {                     
                    $("#parent_id").val($(this).val())
                })
                if($("#_carleader_listing_condition").val() == "USED") {
                    $("#car_variant_parent_car").val("");
                    $("#product_variant").hide();
                } else {
                    $("#product_variant").show();
                }
                $("#_carleader_listing_condition").on("change", function() {
                    if($(this).val() == "USED") {
                        $("#car_variant_parent_car").val("");
                        $("#product_variant").hide();
                    } else {
                        $("#product_variant").show();
                    }
                })
            });
        </script>';
	}

    public function register_post_type() {
		$slug = carleader_listings_option( 'l_slug' );
		if ( ! isset( $slug ) || $slug == '' ) {
			$slug = 'carleader-listing';
		}

		$cpt_name = carleader_listings_option( 'cpt_name' );
		if ( ! isset( $cpt_name ) || $cpt_name == '' ) {
			$cpt_name = esc_html__( 'Caleader Listing', 'caleader-listing' );
		}

		$labels = array(
			'name'                  => sprintf( _x( '%s', '%s post type name', 'caleader-listing' ), $cpt_name, $cpt_name ),
			'singular_name'         => sprintf( _x( '%s', 'Singular %s post type name', 'caleader-listing' ), $cpt_name, $cpt_name ),
			'add_new'               => sprintf( esc_html__( 'New %s', 'caleader-listing' ), $cpt_name ),
			'add_new_item'          => sprintf( esc_html__( 'Add New %s', 'caleader-listing' ), $cpt_name ),
			'edit_item'             => sprintf( esc_html__( 'Edit %s', 'caleader-listing' ), $cpt_name ),
			'new_item'              => sprintf( esc_html__( 'New %s', 'caleader-listing' ), $cpt_name ),
			'all_items'             => sprintf( esc_html__( '%s', 'caleader-listing' ), $cpt_name ),
			'view_item'             => sprintf( esc_html__( 'View %s', 'caleader-listing' ), $cpt_name ),
			'search_items'          => sprintf( esc_html__( 'Search %s', 'caleader-listing' ), $cpt_name ),
			'not_found'             => sprintf( esc_html__( 'No listings found', 'caleader-listing' ), $cpt_name ),
			'not_found_in_trash'    => sprintf( esc_html__( 'No listings found in Trash', 'caleader-listing' ), $cpt_name ),
			'parent_item_colon'     => '',
			'menu_name'             => sprintf( _x( '%s', '%s post type menu name', 'caleader-listing' ), $cpt_name ),
			'filter_items_list'     => sprintf( esc_html__( '%s Filtered List', 'caleader-listing' ), $cpt_name ),
			'items_list_navigation' => sprintf( esc_html__( '%s list navigation', 'caleader-listing' ), $cpt_name ),
			'items_list'            => sprintf( esc_html__( '%s list', 'caleader-listing' ), $cpt_name ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-dashboard',
			'menu_position'      => 56,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => untrailingslashit( $slug ),
				'with_front' => false,
				'feeds'      => true,
			),
			'map_meta_cap'       => true,
			'has_archive'        => ( $archive_page = carleader_listings_option( 'archive_page' ) ) && get_post( $archive_page ) ? get_page_uri( $archive_page ) : 'listings',
			'hierarchical'       => true,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		);
		register_post_type( 'carleader-listing', $args );
	}
}

new ProductVariants();