<?php
/*
  Plugin Name: Caleader Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the SmartDataSoft  theme.
  Author: SmartDataSoft
  Version: 2.9
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

if ( ! defined( 'CAR_LEADERS_CORE_PLUGIN_URI' ) ) {
	define( 'CAR_LEADERS_CORE_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}


define( 'CARLEADER_PLUGIN_DIR', dirname( __FILE__ ) . '/' );


/*
	post type includes
*/
require_once CARLEADER_PLUGIN_DIR . '/post_type/custom-post-services.php';
/*
 * Meta Box Configuration Post Meta Option
 */
require_once CARLEADER_PLUGIN_DIR . '/includes/config.meta.box.php';
require_once CARLEADER_PLUGIN_DIR . 'breadcrumb-navxt/breadcrumb-navxt.php';
require_once CARLEADER_PLUGIN_DIR . 'aq_resizer/aq_resizer.php';
add_action( 'admin_enqueue_scripts', 'cacarleader_core_admin_enqueue' );
function cacarleader_core_admin_enqueue( $hook ) {
	// laod custom post type js
	if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
		return;
	}
	wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . '/js/admin.js' );
}
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'plugins_loaded', 'carleader_core_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function carleader_core_load_textdomain() {
	 load_plugin_textdomain( 'caleader-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
/*
widget load
*/
$classesWidgetsDir = CARLEADER_PLUGIN_DIR . 'widgets/';
function __autoloadWidgets( $directory ) {
	foreach ( glob( $directory . '*.php' ) as $filename ) {
		if ( file_exists( $filename ) ) {
			include_once $filename;
		}
	}
}
__autoloadWidgets( $classesWidgetsDir );
/**
 * Main initiation class
 *
 * @since 1.0.0
 */
class CarLeader_Elementor {







	/**
	 * Add-on Version
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $version = '1.0.1';
	/**
	 * Minimum PHP version required
	 *
	 * @var string
	 */
	private $min_php = '5.4.0';
	/**
	 * Constructor for the class
	 *
	 * Sets up all the appropriate hooks and actions
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'auto_deactivate' ) );
		if ( ! $this->is_supported_php() ) {
			return;
		}
		$this->define_constants();
		$this->includes();
		$this->instantiate();
		$this->init_hooks();
	}
	/**
	 * Initializes the class
	 *
	 * Checks for an existing instance
	 * and if it does't find one, creates it.
	 *
	 * @since 1.0.0
	 *
	 * @return object Class instance
	 */
	public static function init() {

		$option = get_option( 'caleader_name_change', 2.0 );

		if ( $option == 2.0 ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'postmeta';
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"Make It Easy\"', '\"widgetType\":\"MakeItEasy\"')" );
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"Carlader Counter\"', '\"widgetType\":\"CarladerCounter\"')" );
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"CarLeader FAQ\"', '\"widgetType\":\"CarLeaderFAQ\"')" );
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"Carleader Heading\"', '\"widgetType\":\"CarleaderHeading\"')" );
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"Icon Box\"', '\"widgetType\":\"IconBox\"')" );
			$wpdb->query( "UPDATE `$table_name` SET `meta_value` = replace(`meta_value`, '\"widgetType\":\"We Offer\"', '\"widgetType\":\"WeOffer\"')" );
			update_option( 'caleader_name_change', 2.1 );
		}

		static $instance = false;
		if ( ! $instance ) {
			$instance = new self();
		}
		return $instance;
	}
	/**
	 * Define constants
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function define_constants() {
		define( 'CAR_LEADER_VERSION', $this->version );
		define( 'CAR_LEADER_FILE', __FILE__ );
		define( 'CAR_LEADER_PATH', dirname( CAR_LEADER_FILE ) );
		define( 'CAR_LEADER_INCLUDES', CAR_LEADER_PATH . '/includes' );
		define( 'CAR_LEADER_URL', plugins_url( '', CAR_LEADER_FILE ) );
		define( 'CAR_LEADER_ASSETS', CAR_LEADER_URL . '/assets' );
		define( 'CAR_LEADER_VIEWS', CAR_LEADER_PATH . '/views' );
		define( 'CAR_LEADERI_TEMPLATES_DIR', CAR_LEADER_PATH . '/templates' );
		define( 'CAR_LEADER_ICON_DIR', CAR_LEADER_PATH . '/icon' );
	}
	/**
	 * Include required files
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function includes() {
		include CAR_LEADER_INCLUDES . '/functions.php';
		include CAR_LEADER_INCLUDES . '/class-element.php';
		include CAR_LEADER_INCLUDES . '/class-scripts.php';
		// require CAR_LEADER_ICON_DIR . '/icon.php';
	}
	/**
	 * Init Hooks
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function init_hooks() {
		// Localize our plugin
		add_action( 'init', array( $this, 'localization_setup' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
	}
	/**
	 * Initialize plugin for localization
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function localization_setup() {
		load_plugin_textdomain( 'caleader-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	/**
	 * Instantiate classes
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function instantiate() {
		new \CarLeader\Element();
		new \CarLeader\Scripts();
	}
	/**
	 * Plugin action links
	 *
	 * @param array $links
	 *
	 * @return array
	 */
	function plugin_action_links( $links ) {
		// $links[] = '<a href="' . admin_url( 'admin.php?page=' ) . '">' . __( 'Settings', '' ) . '</a>';
		return $links;
	}
	/**
	 * Check if the PHP version is supported
	 *
	 * @return bool
	 */
	public function is_supported_php( $min_php = null ) {
		$min_php = $min_php ? $min_php : $this->min_php;
		if ( version_compare( PHP_VERSION, $min_php, '<=' ) ) {
			return false;
		}
		return true;
	}
	/**
	 * Show notice about PHP version
	 *
	 * @return void
	 */
	function php_version_notice() {
		if ( $this->is_supported_php() || ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$error  = __( 'Your installed PHP Version is: ', 'caleader-core' ) . PHP_VERSION . '. ';
		$error .= __( 'The <strong>Team Members for Elementor</strong> plugin requires PHP version <strong>', 'caleader-core' ) . $this->min_php . __( '</strong> or greater.', 'caleader-core' );
		?>
<div class="error">
    <p><?php printf( $error ); ?></p>
</div>
<?php
	}
	/**
	 * Bail out if the php version is lower than
	 *
	 * @return void
	 */
	function auto_deactivate() {
		if ( $this->is_supported_php() ) {
			return;
		}
		deactivate_plugins( plugin_basename( __FILE__ ) );
		$error  = __( '<h1>An Error Occured</h1>', 'caleader-core' );
		$error .= __( '<h2>Your installed PHP Version is: ', 'caleader-core' ) . PHP_VERSION . '</h2>';
		$error .= __( 'You should update your PHP software or contact your host regarding this matter.</p>', 'caleader-core' );
		wp_die( $error, __( 'Plugin Activation Error', 'caleader-core' ), array( 'back_link' => true ) );
	}
}
return CarLeader_Elementor::init();




function caleader_post_social_share() {
	?>
<div class="divider divider-sm d-block d-lg-none"></div>
<div class="col-auto ml-lg-auto">
    <ul class="tt-socialicon-02">
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>"
                target="_blank" class="icon-226234"></a></li>
        <li><a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?>" target="_blank"
                class="icon-8800"></a></li>
        <li><a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"
                class="icon-733613"></a></li>
    </ul>
</div>
<?php
}