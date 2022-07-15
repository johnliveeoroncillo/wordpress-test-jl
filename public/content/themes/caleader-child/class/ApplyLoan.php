<?php 

class ApplyLoan {
    function __construct() {
        add_action('init', function() {
            add_rewrite_rule('^apply-a-loan/(.?.+?)(?:/([0-9]+))?/?$', 'index.php?apply-a-loan=1&loan-car=$matches[1]', 'top');
            flush_rewrite_rules();
        });        

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
        
        add_filter('query_vars', function($query_vars) {
            $query_vars[] = 'loan-car';
            $query_vars[] = 'apply-a-loan';
            return $query_vars;
        });
        
        add_action('template_include', function($template) {
            wp_enqueue_style('style_book_a_visit', CARSADA_DIR . '/assets/css/book_a_visit.css?v=' . time());

            $car_slug = get_query_var('loan-car');
            $apply_a_loan_slug = get_query_var('apply-a-loan');
        
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
    
            if(!empty($apply_a_loan_slug)) return BASE_PATH . '/template-part/apply-a-loan.php';
        });
    }
}
new ApplyLoan();

