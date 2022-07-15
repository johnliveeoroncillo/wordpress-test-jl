<?php
use Elementor\Utils;
use Elementor\Modules\DynamicTags\Module as TagsModule;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Elementor video widget.
 *
 * Elementor widget that displays a video player.
 *
 * @since 1.0.0
 */
class CarLeaderVideo extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve video widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'video';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve video widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Car Leader Video', 'caleader-core' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve video widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-youtube';
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the video widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'CarLeader' );
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since  2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'video', 'player', 'embed', 'youtube', 'vimeo', 'dailymotion' );
	}

	/**
	 * Register video widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_video',
			array(
				'label' => esc_html__( 'Video', 'caleader-core' ),
			)
		);
		$this->add_control(
			'video_type',
			array(
				'label'   => esc_html__( 'Video Type', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'youtube' => esc_html__( 'Youtube', 'caleader-core' ),
					'video'   => esc_html__( 'Video', 'caleader-core' ),
				),
				'default' => esc_html__( 'youtube', 'caleader-core' ),
			)
		);
		$this->add_control(
			'hosted_url',
			array(
				'label'      => esc_html__( 'URL', 'elementor' ),
				'type'       => \Elementor\Controls_Manager::MEDIA,
				'dynamic'    => array(
					'active'     => true,
					'categories' => array(
						TagsModule::POST_META_CATEGORY,
						TagsModule::MEDIA_CATEGORY,
					),
				),
				'media_type' => 'video',
				'condition'  => array(
					'video_type' => 'video',
				),

			)
		);

		$this->add_control(
			'utube_url',
			array(
				'label'         => esc_html__( 'YouTube Video URL', 'caleader-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'caleader-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'condition'     => array(
					'video_type' => 'youtube',
				),

			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_image_overlay',
			array(
				'label' => esc_html__( 'Image Overlay', 'elementor' ),
			)
		);
		$this->add_control(
			'image_overlay',
			array(
				'label'   => esc_html__( 'Image', 'elementor' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'dynamic' => array(
					'active' => true,
				),
			)
		);
		$this->end_controls_section();

	}
	/**
	 * Render video widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings   = $this->get_settings_for_display();
		$video_url  = '';
		$video_type = $settings['video_type'];

		$image_url = ( $settings['image_overlay']['id'] != '' ) ? wp_get_attachment_url( $settings['image_overlay']['id'], 'full' ) : $settings['image_overlay']['url'];

		?>
<div class="tt-video-block">

		<?php
		if ( $video_type == 'video' ) {
			$video_url = $this->get_hosted_video_url();
			?>
	<a href="#" class="link-video"></a>
	<video class="movie" src="<?php echo $video_url; ?>" poster="<?php echo $image_url; ?>"></video>
			<?php
		} else {
			$video_url = $settings['utube_url']['url'];
			// print_r( $settings );
			echo $video_url;
			?>
	<iframe width="420" height="315" src="<?php echo esc_url( $video_url ); ?>">
	</iframe>
			<?php
		}
		?>



</div>
		<?php

	}
	private function get_hosted_video_url() {
		$settings  = $this->get_settings_for_display();
		$video_url = $settings['hosted_url']['url'];
		if ( ! $video_url ) {
			return '';
		}
		return $video_url;
	}
}
// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderVideo() );
