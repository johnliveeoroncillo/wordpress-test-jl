<?php 

class BuyNow {
    function __construct() {

        add_shortcode('buy_now', function() {
            wp_enqueue_style('style_buy_now', CARSADA_DIR . '/assets/css/buy_now.css?v=' . time());
            add_filter('wp_footer', function() {
                echo "
                <script>
                    jQuery(document).ready(function($) {
                        $('.btn-back').click(function() {
                            window.history.back();
                        })
                    });
                </script>";
            });  
        });

        add_action('init', function() {
            add_rewrite_rule('^buy-now/(.?.+?)(?:/([0-9]+))?/?$', 'index.php?buy-now=1&buy-car=$matches[1]', 'top');	
        });
        
        add_filter('query_vars', function($query_vars) {
            $query_vars[] = 'buy-car';
            $query_vars[] = 'buy-now';
            return $query_vars;
        });
        
        add_action('template_include', function($template) {
            $car_slug = get_query_var('buy-car');
            $buy_now_slug = get_query_var('buy-now');
        
            if (
                $car_slug == false || 
                $car_slug == '' || 
                !get_page_by_path($car_slug, OBJECT, 'carleader-listing')
            ) {
                // global $wp_query;
                // $wp_query->set_404();
                // status_header( 404 );
                // $template = locate_template( '404.php' );  
                // var_dump($car_slug);
                // var_dump(get_page_by_path('2015-mersedes-bens/2016-hunday-elentra-copy-copy-2-copy', OBJECT, 'carleader-listing'));
                return $template;
            }                        
            
            $this->render();

            // var_dump(!empty($buy_now_slug));            
            if(!empty($buy_now_slug)) return BASE_PATH . '/template-part/buy-now.php';            
            // if(!empty($buy_now_slug)) echo 123;die;            
        });
    }

    private function render() {
        echo do_shortcode('[buy_now]');   
    }
}
return new BuyNow();

