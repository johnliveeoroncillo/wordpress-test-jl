<?php
class Single {	

	public function __construct() {

		add_shortcode('single', function() {
            wp_enqueue_style('style_single', CARSADA_DIR . '/assets/css/single.css?v=' . time());          

            add_filter('gettext', array($this, 'change_options'));            
            add_filter('gettext', array($this, 'change_specs'));            
        });     

		add_filter('wp_head', function(){
			if(is_singular('carleader-listing')) {
				$this->render();
			}
		});

        add_filter('wp_footer', function(){			
			if(is_singular('carleader-listing')) {
                $calculate_url = '#';
                $calculate_class = 'btn btn-fullwidth btn_calculate mt-1';
                $apply_for_loan = '<a href="' . $calculate_url . '" class="' . $calculate_class . '">Apply for Loan</a>';
                $car_slug = get_query_var('carleader-listing');
				echo "
                <script>
                    jQuery(document).ready(function($) {
                        $('.btn-back-container').click(function(event) {
                            event.preventDefault();
                            history.back(1);
                        });

                        if($('li.slick-slide').length !== 1) {
                            $('.tt-product-single-img')
                            .prepend('<div class=custom-slick-prev></div>')
                                .append('<div class=custom-slick-next></div>');
                        }
                    
                        let first_slick_index = 0;
                        let last_slick_index = $('li.slick-slide').length;
                        let limit_slick_index = 8;

                        $('.custom-slick-prev').click(function(){  
                            $('.slick-prev').click()                                           
                            let current_slick_index = $('.slick-slide.slick-active').not('.slick-clone').find('.zoomGalleryActive').parent().data('slick-index');                            
                            current_slick_index = (typeof current_slick_index == 'undefined')? limit_slick_index : current_slick_index;
                            current_slick_index -= 1;
                            current_slick_index = current_slick_index == first_slick_index - 1? last_slick_index - 1 : current_slick_index;                                                       
                            $('.slick-slide.slick-active[data-slick-index=' + current_slick_index + ']').find('a').click();                         
                        });

                        $('.custom-slick-next').click(function(){                           
                            $('.slick-next').click()                            
                            let current_slick_index = $('.slick-slide.slick-active').not('.slick-clone').find('.zoomGalleryActive').parent().data('slick-index');                            
                            current_slick_index = (typeof current_slick_index == 'undefined')? 1 : current_slick_index;
                            current_slick_index += 1;       
                            current_slick_index = current_slick_index == last_slick_index? first_slick_index : current_slick_index;                            
                            $('.slick-slide.slick-active[data-slick-index=' + current_slick_index + ']').find('a').click();                         
                        });

                        var width = $(window).width();
                        if (width <= 425) {
                            $('.tt-aside03-layout').insertAfter($('.tt-mobile-product-layout.visible-xs'));
                        }

                        //TODO: make this dynamic onto widget
                        var url = window.location.href;
                        url = url.split('/')
                        url.splice(url.length - 1, 1);                        
                        var car_slug = url.pop();
                        $('.book-visit').attr('href', '" . CARSADA_URL . "/book-a-visit/" . $car_slug . "');
                        $('.apply-loan').attr('href', '" . CARSADA_URL . "/apply-a-loan/" . $car_slug . "');
                        $('.buy-now').attr('href', '" . CARSADA_URL . "/buy-now/" . $car_slug . "');

                    });
                </script>";
			}
		});
	}

    public static function change_options($text) {		        
		$text = str_ireplace('Options', 'Details', $text);		
		return $text;
	}

    public static function change_specs($text) {
		$text = str_ireplace('Ratio', 'No. of seats', $text);
        $text = str_ireplace('Tare', 'Wheel size', $text);
        $text = str_ireplace('Details/ Description', 'Other Specs', $text);		
		return $text;
	}
    
	private function render() {
        echo do_shortcode('[single]');   
    }
}
new Single();


