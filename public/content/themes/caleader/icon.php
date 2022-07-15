<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * A Font Icon select box.
 */
if ( class_exists( '\Elementor\Base_Data_Control' ) ) {

	class caleader_Elementor_Control_Icon extends \Elementor\Base_Data_Control {

		public static $icon;

		public function __construct( $icon ) {
			self::$icon = $icon;
			parent::__construct();
		}

		public function get_type() {
			return 'icon';
		}
		public static function get_icons() {

			global $wp_filesystem;
			if ( empty( $wp_filesystem ) ) {
				require_once ABSPATH . '/wp-admin/includes/file.php';
				WP_Filesystem();
			}
			$jsonfile = get_theme_file_path() . '/font/selection.json';

			if ( file_exists( $jsonfile ) ) {
				$jsonresponse = $wp_filesystem->get_contents( $jsonfile );
			}
			$file_contents = json_decode( $jsonresponse );
			$icons         = $file_contents->icons;
			foreach ( $icons as $icon ) {
				$icon_name                          = $icon->properties->name;
				self::$icon[ 'icon-' . $icon_name ] = $icon_name;
			}
			wp_enqueue_style( 'caleader-add-icon-css-style', get_theme_file_uri() . '/font/style.css', '', null );
			return self::$icon;
		}

		protected function get_default_settings() {
			$default_settings = parent::get_default_settings();
			return [
				'icons' => self::get_icons(),
			];
		}

		public function content_template() {
			?>
			<div class="elementor-control-field">
				<label class="elementor-control-title">{{{ data.label }}}</label>
				<div class="elementor-control-input-wrapper">
					<select class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php esc_html_e( 'Select Icon', 'caleader' ); ?>">
						<option value=""><?php esc_html_e( 'Select Icon', 'caleader' ); ?></option>
						<# _.each( data.icons, function( option_title, option_value ) { #>
						<option value="{{ option_value }}">{{{ option_title }}}</option>
						<# } ); #>
					</select>
				</div>
			</div>
			<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{ data.description }}</div>
			<# } #>
			<?php
		}
	}

}
add_action(
	'elementor/controls/controls_registered',
	function( $el ) {
		$preicon = $el->get_control( 'icon' )->get_settings( 'options' );
		$el->register_control( 'icon', new caleader_Elementor_Control_Icon( $preicon ) );
	}
);

add_action( 'wp_enqueue_scripts', 'caleader_icon_scripts_add' );
function caleader_icon_scripts_add() {
	if ( file_exists( get_theme_file_path() . '/font/style.css' ) ) {
		wp_enqueue_style( 'caleader-add-icon-css-style', get_theme_file_uri() . '/font/style.css', 'caleader-style', null );
	}
}
