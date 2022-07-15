<?php

/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdi
 */

namespace OCDI;

$predefined_themes = $this->import_files;


function envato_demo_theme_license_let_to_num($size)
{
	$l    = substr($size, -1);
	$ret  = substr($size, 0, -1);
	$byte = 1024;

	switch (strtoupper($l)) {
		case 'P':
			$ret *= 1024;
			// No break.
		case 'T':
			$ret *= 1024;
			// No break.
		case 'G':
			$ret *= 1024;
			// No break.
		case 'M':
			$ret *= 1024;
			// No break.
		case 'K':
			$ret *= 1024;
			// No break.
	}
	return $ret;
}

function get_demo_environment_info()
{
	global $wpdb;

	class plugin_list
	{
		use \pluginlist;
	}
	$plugin_list	= new plugin_list();
	$dashboard_slug = $plugin_list->dashboard_slug;

	// Figure out cURL version, if installed.
	$curl_version = '';
	if (function_exists('curl_version')) {
		$curl_version = curl_version();
		$curl_version = $curl_version['version'] . ', ' . $curl_version['ssl_version'];
	}

	// WP memory limit.
	$wp_memory_limit = envato_demo_theme_license_let_to_num(WP_MEMORY_LIMIT);
	if (function_exists('memory_get_usage')) {
		$wp_memory_limit = max($wp_memory_limit, envato_demo_theme_license_let_to_num(@ini_get('memory_limit')));
	}

	// Test POST requests.
	$post_response            = wp_safe_remote_post(
		'https://www.paypal.com/cgi-bin/webscr',
		array(
			'timeout'     => 10,
			'user-agent'  => $dashboard_slug . '/' . wp_get_theme()->version,
			'httpversion' => '1.1',
			'body'        => array(
				'cmd' => '_notify-validate',
			),
		)
	);
	$post_response_successful = false;
	if (!is_wp_error($post_response) && $post_response['response']['code'] >= 200 && $post_response['response']['code'] < 300) {
		$post_response_successful = true;
	}

	// Test GET requests.
	$get_response            = wp_safe_remote_get('https://woocommerce.com/wc-api/product-key-api?request=ping&network=' . (is_multisite() ? '1' : '0'));
	$get_response_successful = false;
	if (!is_wp_error($post_response) && $post_response['response']['code'] >= 200 && $post_response['response']['code'] < 300) {
		$get_response_successful = true;
	}

	// Return all environment info. Described by JSON Schema.
	return array(
		'home_url'                  => home_url(),
		'site_url'                  => get_option('siteurl'),
		'version'                   => wp_get_theme()->version,

		'wp_version'                => get_bloginfo('version'),
		'wp_multisite'              => is_multisite(),
		'wp_memory_limit'           => $wp_memory_limit,
		'wp_debug_mode'             => (defined('WP_DEBUG') && WP_DEBUG),
		'wp_cron'                   => !(defined('DISABLE_WP_CRON') && DISABLE_WP_CRON),
		'language'                  => get_locale(),
		'external_object_cache'     => wp_using_ext_object_cache(),
		'php_version'               => phpversion(),
		'php_post_max_size'         => envato_demo_theme_license_let_to_num(ini_get('post_max_size')),
		'php_max_execution_time'    => ini_get('max_execution_time'),
		'php_max_input_vars'        => ini_get('max_input_vars'),
		'curl_version'              => $curl_version,
		'suhosin_installed'         => extension_loaded('suhosin'),
		'max_upload_size'           => wp_max_upload_size(),
		'default_timezone'          => date_default_timezone_get(),
		'fsockopen_or_curl_enabled' => (function_exists('fsockopen') || function_exists('curl_init')),
		'soapclient_enabled'        => class_exists('SoapClient'),
		'domdocument_enabled'       => class_exists('DOMDocument'),
		'gzip_enabled'              => is_callable('gzopen'),
		'mbstring_enabled'          => extension_loaded('mbstring'),
		'remote_post_successful'    => $post_response_successful,
		'remote_post_response'      => (is_wp_error($post_response) ? $post_response->get_error_message() : $post_response['response']['code']),
		'remote_get_successful'     => $get_response_successful,
		'remote_get_response'       => (is_wp_error($get_response) ? $get_response->get_error_message() : $get_response['response']['code']),
	);
}


if (!empty($this->import_files) && isset($_GET['import-mode']) && 'manual' === $_GET['import-mode']) {
	$predefined_themes = array();
}

?>
<?php do_action('add_tab_menu_for_dashboard', 'demo') ?>
<div class="ocdi  wrap  about-wrap">

	<?php ob_start(); ?>
	<h1 class="ocdi__title  dashicons-before  dashicons-upload"><?php esc_html_e('One Click Demo Import', 'pt-ocdi'); ?></h1>
	<?php
	$plugin_title = ob_get_clean();

	// Display the plugin title (can be replaced with custom title text through the filter below).
	echo wp_kses_post(apply_filters('pt-ocdi/plugin_page_title', $plugin_title));

	// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
	if (ini_get('safe_mode')) {
		printf(
			esc_html__('%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'pt-ocdi'),
			'<div class="notice  notice-warning  is-dismissible"><p>',
			'<strong>',
			'</strong>',
			'</p></div>'
		);
	}

	// Start output buffer for displaying the plugin intro text.
	ob_start();
	?>

	<div class="ocdi__intro-notice  notice  notice-warning  is-dismissible">
		<p><?php esc_html_e('Before you begin, make sure all the required plugins are activated.', 'pt-ocdi'); ?></p>
	</div>

	<div class="ocdi__intro-text">
		<p class="about-description">
			<?php esc_html_e('Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.', 'pt-ocdi'); ?>
			<?php esc_html_e('It will allow you to quickly edit everything instead of creating content from scratch.', 'pt-ocdi'); ?>
		</p>

		<hr>

		<p><?php esc_html_e('When you import the data, the following things might happen:', 'pt-ocdi'); ?></p>

		<ul>
			<li><?php esc_html_e('No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'pt-ocdi'); ?></li>
			<li><?php esc_html_e('Posts, pages, images, widgets, menus and other theme settings will get imported.', 'pt-ocdi'); ?></li>
			<li><?php esc_html_e('Please click on the Import button only once and wait, it can take a couple of minutes.', 'pt-ocdi'); ?></li>
		</ul>



		<hr>
	</div>

	<?php
	$plugin_intro_text = ob_get_clean();

	// Display the plugin intro text (can be replaced with custom text through the filter below).
	echo wp_kses_post(apply_filters('pt-ocdi/plugin_intro_text', $plugin_intro_text));
	?>

	<?php if (empty($this->import_files)) : ?>
		<div class="notice  notice-info  is-dismissible">
			<p><?php esc_html_e('There are no predefined import files available in this theme. Please upload the import files manually!', 'pt-ocdi'); ?></p>
		</div>
	<?php endif; ?>

	<?php if (empty($predefined_themes)) : ?>

		<div class="ocdi__file-upload-container">
			<h2><?php esc_html_e('Manual demo files upload', 'pt-ocdi'); ?></h2>

			<div class="ocdi__file-upload">
				<h3><label for="content-file-upload"><?php esc_html_e('Choose a XML file for content import:', 'pt-ocdi'); ?></label></h3>
				<input id="ocdi__content-file-upload" type="file" name="content-file-upload">
			</div>

			<div class="ocdi__file-upload">
				<h3><label for="widget-file-upload"><?php esc_html_e('Choose a WIE or JSON file for widget import:', 'pt-ocdi'); ?></label></h3>
				<input id="ocdi__widget-file-upload" type="file" name="widget-file-upload">
			</div>

			<div class="ocdi__file-upload">
				<h3><label for="customizer-file-upload"><?php esc_html_e('Choose a DAT file for customizer import:', 'pt-ocdi'); ?></label></h3>
				<input id="ocdi__customizer-file-upload" type="file" name="customizer-file-upload">
			</div>

			<?php if (class_exists('ReduxFramework')) : ?>
				<div class="ocdi__file-upload">
					<h3><label for="redux-file-upload"><?php esc_html_e('Choose a JSON file for Redux import:', 'pt-ocdi'); ?></label></h3>
					<input id="ocdi__redux-file-upload" type="file" name="redux-file-upload">
					<div>
						<label for="redux-option-name" class="ocdi__redux-option-name-label"><?php esc_html_e('Enter the Redux option name:', 'pt-ocdi'); ?></label>
						<input id="ocdi__redux-option-name" type="text" name="redux-option-name">
					</div>
				</div>
			<?php endif; ?>
		</div>

		<p class="ocdi__button-container">
			<button class="ocdi__button  button  button-hero  button-primary  js-ocdi-import-data"><?php esc_html_e('Import Demo Data', 'pt-ocdi'); ?></button>
		</p>

	<?php
	elseif (1 === count($predefined_themes)) :

	?>
		<div class="ocdi__demo-import-notice  js-ocdi-demo-import-notice">
			<?php
			// include get_template_directory() . '/framework/dashboard/admin/system-status.php';

			// $system_status = new \SDS_REST_System_Status_Controller();
			$environment   = get_demo_environment_info();

			$req_arr = array();

			?>
			<ul>

				<?php
				if (version_compare($environment['php_version'], '7.2', '>=')) {
					$req_arr['php_version'] = 1;
					echo '<li class="success">' . esc_html__('PHP Version: OK.', 'pt-ocdi') . '</li>';
				} else {
					$req_arr['php_version'] = 0;
					echo '<li class="error">' . esc_html__('PHP Version: Not Ok', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				$max_size = $environment['wp_memory_limit'] / 1048576;
				if ($max_size >= 128) {
					$req_arr['wp_memory_limit'] = 1;
				} else {
					$req_arr['wp_memory_limit'] = 0;
					echo '<li class="error">' . esc_html__('PHP memory limit: You need to increase your WordPress memory limit', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				$max_size = $environment['php_post_max_size'] / 1048576;
				if ($max_size >= 64) {
					$req_arr['php_post_max_size'] = 1;
				} else {
					$req_arr['php_post_max_size'] = 0;
					echo '<li class="error">' . esc_html__('PHP post max size: You need to increase your post max size', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				if ($environment['php_max_execution_time'] >= 300) {
					$req_arr['php_max_execution_time'] = 1;
				} else {
					$req_arr['php_max_execution_time'] = 0;
					echo '<li class="error">' . esc_html__('PHP max execution time: You need to increase your PHP Max execution time', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				if ($environment['php_max_input_vars'] >= 1000) {
					$req_arr['php_max_input_vars'] = 1;
				} else {
					$req_arr['php_max_input_vars'] = 0;
					echo '<li class="error">' . esc_html__('PHP max input vars:: You need to increase your PHP Max Input Vars', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				$max_size = $environment['max_upload_size'] / 1048576;
				if ($max_size >= 32) {
					$req_arr['max_upload_size'] = 1;
				} else {
					$req_arr['max_upload_size'] = 0;
					echo '<li class="error">' . esc_html__('PHP max upload size:: You need to increase your PHP Max Upload Size', 'pt-ocdi') . '</li>';
				}
				?>
				<?php
				$flag = 0;
				if (isset($req_arr)) {
					if (is_array($req_arr) && !empty($req_arr)) {
						foreach ($req_arr as $req) {
							if ($req == 1) {
								$flag = 1;
							} else {
								$flag = 0;
								break;
							}
						}
					}
				}
				?>
				<?php
				if ($flag) {
					echo '<li class="success"><p>' . esc_html__('You are all set to import your demo', 'pt-ocdi') . '</p></li>';
				} else {
				?>
					<li>
						<a class="syst-link" href="<?php menu_page_url('envato-theme-license-system-status'); ?>">
							<?php
							echo esc_html__('Go to System Status Page to See Your Server System Status', 'pt-ocdi');
							?>
						</a>
					</li>
				<?php
				}
				?>


			</ul>
		</div>

		<?php
		if ($flag) {
		?>
			<p class="ocdi__button-container">
				<button class="ocdi__button  button  button-hero  button-primary  js-ocdi-import-data"><?php esc_html_e('Import Demo Data', 'pt-ocdi'); ?></button>
			</p><?php
			}
				?>

	<?php else : ?>

		<!-- OCDI grid layout -->
		<div class="ocdi__gl  js-ocdi-gl">
			<?php
			// Prepare navigation data.
			$categories = Helpers::get_all_demo_import_categories($predefined_themes);
			?>
			<?php if (!empty($categories)) : ?>
				<div class="ocdi__gl-header  js-ocdi-gl-header">
					<nav class="ocdi__gl-navigation">
						<ul>
							<li class="active"><a href="#all" class="ocdi__gl-navigation-link  js-ocdi-nav-link"><?php esc_html_e('All', 'pt-ocdi'); ?></a></li>
							<?php foreach ($categories as $key => $name) : ?>
								<li><a href="#<?php echo esc_attr($key); ?>" class="ocdi__gl-navigation-link  js-ocdi-nav-link"><?php echo esc_html($name); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</nav>
					<div clas="ocdi__gl-search">
						<input type="search" class="ocdi__gl-search-input  js-ocdi-gl-search" name="ocdi-gl-search" value="" placeholder="<?php esc_html_e('Search demos...', 'pt-ocdi'); ?>">
					</div>
				</div>
			<?php endif; ?>
			<div class="ocdi__gl-item-container  wp-clearfix  js-ocdi-gl-item-container">
				<?php foreach ($predefined_themes as $index => $import_file) : ?>
					<?php
					// Prepare import item display data.
					$img_src = isset($import_file['import_preview_image_url']) ? $import_file['import_preview_image_url'] : '';
					// Default to the theme screenshot, if a custom preview image is not defined.
					if (empty($img_src)) {
						$theme   = wp_get_theme();
						$img_src = $theme->get_screenshot();
					}

					?>
					<div class="ocdi__gl-item js-ocdi-gl-item" data-categories="<?php echo esc_attr(Helpers::get_demo_import_item_categories($import_file)); ?>" data-name="<?php echo esc_attr(strtolower($import_file['import_file_name'])); ?>">
						<div class="ocdi__gl-item-image-container">
							<?php if (!empty($img_src)) : ?>
								<img class="ocdi__gl-item-image" src="<?php echo esc_url($img_src); ?>">
							<?php else : ?>
								<div class="ocdi__gl-item-image  ocdi__gl-item-image--no-image">
									<?php esc_html_e('No preview image . ', 'pt - ocdi'); ?></div>
							<?php endif; ?>
						</div>
						<div class="ocdi__gl-item-footer<?php echo !empty($import_file['preview_url']) ? '  ocdi__gl-item-footer--with-preview' : ''; ?>">
							<h4 class="ocdi__gl-item-title" title="<?php echo esc_attr($import_file['import_file_name']); ?>">
								<?php echo esc_html($import_file['import_file_name']); ?></h4>
							<button class="ocdi__gl-item-button  button  button-primary  js-ocdi-gl-import-data" value="<?php echo esc_attr($index); ?>"><?php esc_html_e('Import', 'pt - ocdi'); ?></button>
							<?php if (!empty($import_file['preview_url'])) : ?>
								<a class="ocdi__gl-item-button  button" href="<?php echo esc_url($import_file['preview_url']); ?>" target="_blank"><?php esc_html_e('Preview', 'pt - ocdi'); ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div id="js-ocdi-modal-content"></div>

	<?php endif; ?>

	<p class="ocdi__ajax-loader  js-ocdi-ajax-loader">
		<span class="spinner"></span> <?php esc_html_e('Importing, please wait!', 'pt-ocdi'); ?>
	</p>

	<div class="ocdi__response  js-ocdi-ajax-response"></div>
</div>