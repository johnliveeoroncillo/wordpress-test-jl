<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
class Slickslider extends Widget_Base {

	public function get_name() {
		return 'slick_slider';
	}
	public function get_title() {
		return esc_html__( 'Slick Slider', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_script_depends() {
		return array( 'custom-elementor-js', 'slick-carousel-js' );
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'carleader_content_settings',
			array(
				'label' => esc_html__( 'CarleaderSliclSlider', 'caleader-core' ),
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'layout_1' => esc_html__( 'Layout 1', 'caleader-core' ),
					'layout_2' => esc_html__( 'Layout 2', 'caleader-core' ),
					'layout_3' => esc_html__( 'Layout 3', 'caleader-core' ),
				),
				'default' => esc_html__( 'layout_1', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'imageSlider Image', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_responsive_control(
			'css_image',
			array(
				'label'     => esc_html__( 'CSS Image', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'condition' => array(
					'style' => 'layout_1',
				),
			)
		);
		$repeater->add_control(
			'caption_1',
			array(
				'label'   => esc_html__( 'Caption One', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'caption_2',
			array(
				'label'   => esc_html__( 'Caption Two', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'caption_3',
			array(
				'label'   => esc_html__( 'Caption Three', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'caption_4',
			array(
				'label'   => esc_html__( 'Caption Four', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'btn_text',
			array(
				'label'   => esc_html__( 'Button text', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'view inventory' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'url',
			array(
				'label'         => esc_html__( 'Button URL', 'caleader-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
				),
			)
		);
		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings();
		?>
<div class="mainSlider-layout">
			<div class="loading-content">
				<div class="loading-dots">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</div>
			</div>
			<div class="mainSlider">
		<?php
		$flag = 1;
		foreach ( $settings['items'] as $tab ) {

			$image     = ( $tab['image']['id'] != '' ) ? wp_get_attachment_url( $tab['image']['id'], 'full' ) : $tab['image']['url'];
			$caption_1 = $tab['caption_1'];
			$caption_2 = $tab['caption_2'];
			$caption_3 = $tab['caption_3'];
			$caption_4 = $tab['caption_4'];
			$css_image = ( $tab['css_image']['id'] != '' ) ? wp_get_attachment_url( $tab['css_image']['id'], 'full' ) : $tab['css_image']['url'];

			$url      = $tab['url']['url'];
			$btn_text = $tab['btn_text'];
			?>
			<?php if ( $tab['style'] == 'layout_1' ) { ?>
					<div class="slide">
						<div class="img--holder" data-bg="<?php echo esc_url( $image ); ?>"></div>
						<div class="slide-content">
							<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">
								<a href="<?php echo esc_url( $url ); ?>" class="tt-caption-custom" 
				<?php
				if ( $css_image ) {
					echo 'style = "background : url(' . $css_image . ')" ';
				}
				?>
								>
									<div class="tt-title">
										<div class="text-small"><?php echo $caption_1; ?></div>
										<div class="text-large"><?php echo $caption_2; ?></div>
									</div>
									<span><i class="icon-handsshake"></i><?php echo esc_html( $btn_text ); ?></span>
								</a>
							</div>
						</div>
					</div>
			<?php } elseif ( $tab['style'] == 'layout_2' ) { ?>
				<div class="slide">
					<div class="img--holder"  data-bg="<?php echo esc_url( $image ); ?>"></div>
					<div class="slide-content tt-point-h-r">
						<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">
							<div class="tp-caption-wrapper">
								<div class="wrapper-marker"></div>
								<div class="tp-caption-02-01"><?php echo wp_kses_post( $caption_1 ); ?></div>
								<div class="tp-caption-02-02"><?php echo wp_kses_post( $caption_2 ); ?></div>
								<div class="tp-caption-02-03"><a href="<?php echo esc_url( $url ); ?>" class="extra-link"><?php echo esc_html( $btn_text ); ?></a></div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
					<div class="slide">
					<div class="img--holder"  data-bg="<?php echo esc_url( $image ); ?>"></div>
					<div class="slide-content">
						<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">
							<div class="tp-caption-01-01" ><?php echo $caption_1; ?></div>
							<div class="tp-caption-01-02"><?php echo $caption_2; ?></div>
							<div class="tp-caption-01-03"><?php echo $caption_3; ?></div>
					<?php if ( ! empty( $caption_4 ) ) { ?>
								<div class="tp-caption-01-04"><?php echo $caption_4; ?></div>
					<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Slickslider() );
