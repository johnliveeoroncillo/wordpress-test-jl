<?php
class Listings {	

	public function __construct() {

		add_shortcode('listing', function() {
            wp_enqueue_style('style_listing', CARSADA_DIR . '/assets/css/listing.css?v=' . time());          

			add_filter('gettext', array($this, 'change_automatic_transmission'));
			add_filter('gettext', array($this, 'change_manual_transmission'));
			add_filter('gettext', array($this, 'change_cvt_transmission'));
			add_filter('gettext', array($this, 'change_case_drivetrain'));
        });     

		add_shortcode('action_redirect', function($args) {
			$id = $args['id'];
			$segment = $args['type'];

			$post = get_post($id);
			return CARSADA_URL . '/' . $segment .'/' . $post->post_name;
		});

		add_filter('wp_head', function(){
			if(is_archive()) {
				$this->render();
			}
		});

		add_filter('wp_footer', function(){
			$condition = $this->set_page_title();
			if(is_archive()) {
				echo "
                <script>
                    jQuery(document).ready(function($) {                        
						$('.tt-wrapper-aside form').prepend('<input class=condition_hidden type=hidden name=condition value=$condition>')
						$('#tt-filters-aside').find('.tt-col-btn a').attr('href', '?condition=$condition&s=')

						//NOTE: Remove select multiple functionality
						$('#tt-filters-aside #id_condition').removeAttr('multiple');
						$('#tt-filters-aside #id_the_year').removeAttr('multiple');
						$('#tt-filters-aside #id_make').removeAttr('multiple');
						$('#tt-filters-aside #id_body_type').removeAttr('multiple');
						$('#tt-filters-aside #id_model_transmission_type').removeAttr('multiple');
						$('#tt-filters-aside #id_drivetrain').removeAttr('multiple');

						//NOTE: Cleanse UI
						$('.tt-btn-moreinfo').removeClass('tt-btn-moreinfo');
						$('.tt-icon').each(function() {							
							$(this).parent().find('.tt-row-01')
								.append($(this))																						
						})						
						$('.tt-icon').each(function() {
							var _this = $(this);
							_this.insertAfter(_this.closest('.tt-row-01').find('.tt-box-price'))
						})
						$('.SumoSelect li.opt').click(function() {
							$('.SumoSelect').removeClass('open');
						})

						//NOTE: Fix get params from URL to form serialize data
						//PREV VERSION: Previous search params will disappear on submitting another request
						function getUrlVars()
						{
							var vars = [], hash;
							var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
							for(var i = 0; i < hashes.length; i++)
							{
								hash = hashes[i].split('=');
								vars.push(hash[0]);
								vars[hash[0]] = hash[1];
							}
							return vars;
						}    
						$.each(getUrlVars(), function(i, v) {							  
							if(v.replace('%5B%5D', '') != 'orderby') {
								var val = getUrlVars()[v];
								if(v === 'condition') {
									val = val.toUpperCase();
								}
								console.log(v.replace('%5B%5D', ''), '=>', val) 
								$('[name=\'' + v.replace('%5B%5D', '[]') + '\']').val(val).change();
							}						  	
						})  

						//NOTE: Fix min and max price value on change
						//PREV VERSION: min and max value will only change value if both min and max slider was change
						$('.slider-value').on('DOMSubtreeModified', function(){
							let min_price = $('#slider-snap-value-lower').text()
							let max_price = $('#slider-snap-value-upper').text()
							$('#minp').val(min_price);
							$('#maxp').val(max_price);
						});						
                    });
                </script>";
			}
		});
	}

	public function set_page_title() {		
		$condition = isset($_GET['condition'])? $_GET['condition'] : '';
		// var_dump($condition);
		$condition = is_array($condition)? $condition[0] : $condition;
		return strtoupper($condition);
	}

	public static function change_automatic_transmission($text) {		
		$text = str_ireplace('Automatic Transmission', 'Automatic', $text);		
		return $text;
	}

	public static function change_manual_transmission($text) {
		$text = str_ireplace('Manual Transmission', 'Manual', $text);		
		return $text;
	}

	public static function change_cvt_transmission($text) {
		$text = str_ireplace('Continuously Variable Transmission', 'CVT', $text);		
		return $text;
	}

	public static function change_case_drivetrain($text) {
		$text = str_ireplace('WHEEL DRIVE', 'Wheel Drive', $text);		
		return $text;
	}

	private function render() {
        echo do_shortcode('[listing]');   
    }
}
new Listings();
