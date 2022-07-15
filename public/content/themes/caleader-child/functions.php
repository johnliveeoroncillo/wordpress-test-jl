<?php
defined('ABSPATH') || exit;
/**
 * Set Locale
 */
setlocale(LC_ALL, 'en_US');

/**
 * Initialize global variables
 */
require_once 'constants.php';
require_once 'settings.php';
require_once 'metaboxes/meta_box.php';

if (wp_get_theme() === 'caleader') {
	require_once 'class/Products.php';
	require_once 'class/Navigation.php';
	require_once 'class/Footer.php';
	require_once 'class/Listings.php'; 
	require_once 'class/Single.php'; 
	require_once 'class/CustomSearch.php';
	require_once 'class/CarleaderListingCustom.php';
	require_once 'class/CarleaderListingCustomDetails.php';

	require_once 'widgets/carleader-calculator-widget.php';
	require_once 'class/ApplyLoan.php';
	require_once 'class/BookAVisit.php';
	require_once 'class/BuyNow.php';
	require_once 'class/RestApi.php';
	require_once 'class/ProductVariants.php';
// require_once ELEMENTOR_PATH . 'elementor.php';
}


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'init_admin_styles' );
function my_theme_enqueue_styles() {

	$parent_style = 'caleader-style'; // This is 'caleader-style' for the caleader theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('main-style', CARSADA_DIR . '/assets/css/main.css?v=' . time());			
	wp_enqueue_style('toast-style', CARSADA_DIR . '/assets/css/jquery.toast.min.css');			

	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css?v='. time(),
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script('toast-script', CARSADA_DIR . '/assets/js/jquery.toast.min.js');			
	wp_enqueue_script('jquery-validate', CARSADA_DIR . '/assets/js/jquery.validate.min.js');			
	wp_enqueue_script('toast-custom-script', CARSADA_DIR . '/assets/js/toast.js?v='. time());		
	wp_enqueue_script('main-script', CARSADA_DIR . '/assets/js/main.js?v='. time());		
}
function init_admin_styles() {
	wp_enqueue_style('toast-style', CARSADA_DIR . '/assets/css/jquery.toast.min.css');			
	wp_enqueue_script('main-script', CARSADA_DIR . '/assets/js/main.js?v='. time());			
	wp_enqueue_script('toast-script', CARSADA_DIR . '/assets/js/jquery.toast.min.js');			
	wp_enqueue_script('toast-custom-script', CARSADA_DIR . '/assets/js/toast.js?v='. time());		
}

/**
 * CUSTOM WDIGET FOR ELEMENTOR
 */
add_action( 'elementor/widgets/widgets_registered', 'register_custom_elementor_widgets');
function register_custom_elementor_widgets() {
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
		require_once BASE_PATH . '/widgets/featured-products.php';
		require_once BASE_PATH . '/widgets/apply-a-loan.php';
		require_once BASE_PATH . '/widgets/book-a-visit.php';
		require_once BASE_PATH . '/widgets/buy-now.php';
		require_once BASE_PATH . '/widgets/car-summary.php';
	}
}


add_action( 'wp_head', 'load_homepage_style' );
function load_homepage_style() {
    if ( is_front_page() ) {    
		wp_enqueue_style('homepage-style', CARSADA_DIR . '/assets/css/homepage.css?v=' . time());			
    }
}

//   // Area 1, located at the top of the sidebar.
//   register_sidebar( array(
//     'name' => __( 'Primary Widget Area', 'starkers' ),
//     'id' => 'primary-widget-area',
//     'description' => __( 'The primary widget area', 'starkers' ),
//     'before_widget' => '<li>',
//     'after_widget' => '</li>',
//     'before_title' => '<h3>',
//     'after_title' => '</h3>',
//   ) );
/**
 * FOR UI TESTING PURPOSES
 */
// add_action('init', 'sms_otp_verification');
// function sms_otp_verification() {
// 	add_rewrite_rule('^test','index.php?test_page=1&post_type=custom_post_type','top');
//     flush_rewrite_rules();
// }
// add_action('query_vars', 'set_query_var1');
// function set_query_var1($vars) {
// 	array_push($vars, 'test_page');
// 	return $vars;
// }
// add_filter('template_include', 'inlude_template1', 1000, 1);
// function inlude_template1($template){
// 	$new_template = $template;
// 	if(get_query_var('test_page')){
// 		wp_head();	
// 		$new_template = BASE_PATH . '/template-part/forms/apply-loan.php';
// 		wp_footer();	
// 	}
// 	return $new_template;
// }

/**
 * FACEBOOK MESSENGER
 */
add_filter('wp_head', function(){
	echo "
	<!-- Messenger Chat Plugin Code -->
    <div id='fb-root'></div>

    <!-- Your Chat Plugin code -->
    <div id='fb-customer-chat' class='fb-customerchat'>
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute('page_id', '102333229207231');
      chatbox.setAttribute('attribution', 'biz_inbox');
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	";
});



