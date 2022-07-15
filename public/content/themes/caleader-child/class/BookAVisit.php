<?php 

class BookAVisit {
    function __construct() {

        add_shortcode('book_a_visit', function() {
            wp_enqueue_style('style_book_a_visit', CARSADA_DIR . '/assets/css/book_a_visit.css?v=' . time());
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
            add_rewrite_rule('^book-a-visit/(.?.+?)(?:/([0-9]+))?/?$', 'index.php?book-a-visit=1&book-car=$matches[1]', 'top');	
        });
        
        add_filter('query_vars', function($query_vars) {
            $query_vars[] = 'book-car';
            $query_vars[] = 'book-a-visit';
            return $query_vars;
        });
        
        add_action('template_include', function($template) {
            $car_slug = get_query_var('book-car');
            $book_a_visit_slug = get_query_var('book-a-visit');
        
            if (
                $car_slug == false || 
                $car_slug == '' || 
                !get_page_by_path($car_slug, OBJECT, 'carleader-listing')
            ) {
                // global $wp_query;
                // $wp_query->set_404();
                // status_header( 404 );
                // $template = locate_template( '404.php' );                
                return $template;
            }                        
            
            $this->render();

            // var_dump(!empty($book_a_visit_slug));            
            if(!empty($book_a_visit_slug)) return BASE_PATH . '/template-part/book-a-visit.php';            
            // if(!empty($book_a_visit_slug)) echo 123;die;            
        });
    }

    private function render() {
        echo do_shortcode('[book_a_visit]');   
    }
}
return new BookAVisit();

