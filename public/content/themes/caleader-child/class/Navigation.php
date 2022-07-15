<?php

class Navigation {
    function __construct() {
        add_shortcode('navigation', function() {
            wp_enqueue_style('style_navigation', CARSADA_DIR . '/assets/css/navigation.css?v='.time() );
            add_filter('wp_footer', function() {
                $CARSADA_URL = CARSADA_URL;
                echo "
                <script>
                    jQuery(document).ready(function($) {
                        $('.mmpanels').find('.dropdown-menu')
                            .removeClass('dropdown-menu');

                        $(document).ready(function(){
                            $('#nav-icon1').click(function() {
                                $(this).toggleClass('open');
                            });
                            $('.mm-fullscreen-bg').click(function() {
                                if($('#mobile-menu')) {                
                                    $('#nav-icon1').toggleClass('open');
                                }            
                            })
                            $('.mm-close').click(function() {
                                $('#nav-icon1').toggleClass('open');
                            })
                        });

                        $('#search_cars').click(function() {
                            let car = $('.search_cars_wrapper input').val();
                            window.location.href = '$CARSADA_URL/listings/?s=' + car;
                        });

                        $('#check_status').click(function() {
                            let ref_no = $('.check_status_wrapper input').val();
                            $(this).prop('disabled', true);
                            $.ajax({
                                type: 'POST',                            
                                url: listing_obj.ajax_url,
                                data: {
                                    action: 'carsada_check_loan_status',                                    
                                    reference_number: ref_no,
                                },
                                success: function(res) {
                                    var obj = JSON.parse(res)
                                    var n = obj.next;
                                    var c = obj.result;
                                    
                                    switch(obj.status) {
                                        case 'Approved':
                                            $('#check_status_response').removeClass('bg-orange-400')
                                                .removeClass('text-orange-100').addClass('bg-green-200')
                                                    .addClass('text-green-100').find('.bullet')
                                                        .removeClass('text-orange-200').addClass('text-green-100');

                                            $('#check_status_response').find('strong').text('Approved');
                                            break;
                                        case 'Not found':
                                            $('#check_status_response').find('.txt').text('Your loan is');
                                            $('#check_status_response').find('strong').text(obj.status);   
                                            break;
                                        default:                                            
                                            $('#check_status_response').find('strong').text(obj.status);                                          
                                    }

                                    $('#check_status_response').fadeIn(500);
                                    $('#check_status').prop('disabled', false);
                                },
                                error: function(err, status, error) {                                    
                                    showToast({
                                        type: 'error',
                                        heading: 'Error !',
                                        message: err.responseText.toString(),
                                    });                                    
                                }
                            });                            
                        });
                    });
                </script>";
            });          
        });        
        
        add_filter('wp_head', function() {
            self::style();
        });

        add_action('wp_ajax_carsada_check_loan_status', array($this, 'carsada_check_loan_status'));
        add_action('wp_ajax_nopriv_carsada_check_loan_status', array($this, 'carsada_check_loan_status'));
    }

    function carsada_check_loan_status() {        
        $reference_number = $_POST['reference_number'];
        
        $post = get_posts(
            array(
                'post_type' => 'carsadaloan',
                'meta_key' => 'loan_reference_number',  
                'meta_value' => $reference_number,
            )
        );
        if(!isset($post[0])) {
            echo json_encode([
                'status' => 'Not found',                      
            ]);
            die();
        }
        $status = get_post_meta($post[0]->ID, 'status', true);                

        echo json_encode([
            'status' => $status,                      
        ]);       
        die();            
    }

    private function style() {
        echo do_shortcode('[navigation]');        
    }
}
return new Navigation();