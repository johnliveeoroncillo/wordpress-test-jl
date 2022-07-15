<?php
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;
class CarLeaderBrowsType extends Widget_Base {

	public function get_name() {
		return 'carleader_brows_type';
	}
	public function get_title() {
		return esc_html__( 'CarLeader Browse Type', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'browsVehicle', 'caleader-core' ),
			]
		);
		$this->add_control(
			'select_layout',
			[
				'label'   => esc_html__( 'Select Layout', 'caleader-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'layout_1' => esc_html__( 'layout 1', 'caleader-core' ),
					'layout_2' => esc_html__( 'layout 2', 'caleader-core' ),

				],
				'default' => esc_html__( 'layout_1', 'caleader-core' ),
			]
		);

		$this->add_control(
			'has_url',
			[
				'label'   => esc_html__( 'Has Direct Link', 'caleader-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'false',
			]
		);
		$this->add_control(
			'url_name',
			[
				'label'     => esc_html__( 'Direct Link Name', 'caleader-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'has_url' => 'yes',
				],
			]
		);
		$this->add_control(
			'url',
			[
				'label'     => esc_html__( 'Direct Link URL', 'caleader-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'has_url' => 'yes',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
	<div class="js-carousel-brand tt-arrow-bottom">
		<?php
		$terms = get_terms(
			array(
				'taxonomy'   => 'make-brand',
				'hide_empty' => false,
			)
		);
		foreach ( $terms as $key => $term ) {
			$image = get_term_meta( $term->term_id, 'image_advanced', false );
			if ( isset( $image ) && ! empty( $image ) ) {
				$image_url = wp_get_attachment_image_src( $image[0] );
			}
			?>
		<a class="tt-brand" href="<?php echo get_term_link( $term ); ?>" target="_blank">
		  <div class="tt-img">
			<img src='<?php echo $image_url[0]; ?>' alt="brand">
		  </div>
		</a>
			<?php
		}
		?>
  </div>
  <div class="tt-link-redirect-wrapper d-block d-md-none visible-mobile">
				<a href="<?php echo $settings['url']; ?>" class="tt-link-redirect"><?php echo $settings['url_name']; ?><span class="icon-right icon-arrowdown"></span></a>
			</div>
		<?php
	}


}
Plugin::instance()->widgets_manager->register_widget_type( new CarLeaderBrowsType() );
