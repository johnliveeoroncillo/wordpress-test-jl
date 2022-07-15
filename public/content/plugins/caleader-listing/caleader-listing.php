<?php
/*
  Plugin Name: Caleader Listing
  Plugin URI: http://smartdatasoft.com/
  Description: Helping  Listing Plug In for the SmartDataSoft  theme.
  Author: SmartDataSoft Team
  Version: 3.2
  Author URI: http://smartdatasoft.com/
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( has_action( 'caleader_theme_init' ) ) {


	add_action( 'caleader_theme_init', 'check_caleader_theme_active' );

	function check_caleader_theme_active() {
		if ( ! function_exists( 'caleader_setup' ) ) {
			return;
		}
	}
}

if ( ! defined( 'CAR_LEADER_THEME_URI' ) ) {
	define( 'CAR_LEADER_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'CAR_LEADERS_THEME_URI' ) ) {
	define( 'CAR_LEADERS_THEME_URI', get_template_directory_uri() );
}

if ( ! defined( 'CAR_LEADERS_LISTING_PLUGIN_URI' ) ) {
	define( 'CAR_LEADERS_LISTING_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}



define( 'CARLEADER_LISTING_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
add_action( 'admin_enqueue_scripts', 'cacarleader_listing_admin_enqueue' );
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/carleader-listing-cpt.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/contact-cpt.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/carleader-listing-fields.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/CarleaderAdminColoumn.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/ContachAdminColoumn.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'includes/Contact.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'template-loader.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'template-tags.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'template-hooks.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'functions-conditionals.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'function-formatting.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'Query.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'search-form.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'Shortcodes.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'Settings.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'SearchQuery.php';
/*meta box extension*/
require_once CARLEADER_LISTING_PLUGIN_DIR . 'extensions/meta-box-columns/meta-box-columns.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'extensions/meta-box-group/meta-box-group.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'extensions/mb-term-meta/mb-term-meta.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'extensions/mb-settings-page/mb-settings-page.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'extensions/mb-frontend-submission/mb-frontend-submission.php';
require_once CARLEADER_LISTING_PLUGIN_DIR . 'aq_resizer/aq_resizer.php';

function cacarleader_listing_admin_enqueue( $hook ) {
//	wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . '/js/admin.js' );
	wp_enqueue_style( 'cal-lisiting-font', get_template_directory_uri() . '/font/style.css' );
}
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'plugins_loaded', 'carleader_listing_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function carleader_listing_load_textdomain() {
	load_plugin_textdomain( 'caleader-listing', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
function carleader_listing_add_scripts() {
	wp_enqueue_script( 'carleader-listing-main-script', CAR_LEADERS_LISTING_PLUGIN_URI . 'js/main.js', array( 'jquery' ), time() );
	wp_localize_script(
		'carleader-listing-main-script',
		'listing_obj',
		array(
			'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
		)
	);
	wp_enqueue_style( 'carleader-listing-style', CAR_LEADERS_LISTING_PLUGIN_URI . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'carleader_listing_add_scripts' );
function footer_video_pop() {   ?>
<div class="modal fade show" id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel">
	<div class="modal-dialog modal-video">
		<div class="modal-content ">
			<div class="modal-body modal-layout-dafault">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
						class="icon-close"></span></button>
				<div class="modal-video-content">

				</div>
			</div>
		</div>
	</div>
</div>
	<?php
}
add_action( 'wp_footer', 'footer_video_pop', 100 );

require_once 'function-carleader-listing.php';
do_action( 'caleader_listing_init' );
