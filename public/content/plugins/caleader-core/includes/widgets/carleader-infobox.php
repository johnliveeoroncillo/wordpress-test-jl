<?php
use Elementor\Utils;
class CarLeaderInfobox extends \Elementor\Widget_Base {
	public function get_name() {
		return 'carleader_infobox';
	}
	public function get_title() {
		return esc_html__( 'CarLeader Infobox', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'CarleaderInfobox', 'caleader-core' ),
			)
		);

				$repeater = new \Elementor\Repeater();
				$repeater->add_control(
					'title',
					array(
						'label'   => esc_html__( 'Title', 'caleader-core' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Buy a Yacht ', 'caleader-core' ),
						'dynamic' => array( 'active' => true ),
					)
				);
				$repeater->add_control(
					'subtitle',
					array(
						'label'   => esc_html__( 'Subtitle', 'caleader-core' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'No fee Agents!', 'caleader-core' ),
						'dynamic' => array( 'active' => true ),
					)
				);
				$repeater->add_control(
					'description',
					array(
						'label'       => esc_html__( 'Description', 'caleader-core' ),
						'type'        => \Elementor\Controls_Manager::TEXTAREA,
						'rows'        => 5,
						'default'     => __( 'Default description', 'caleader-core' ),
						'placeholder' => __( 'Type your description here', 'caleader-coren' ),
					)
				);
				$repeater->add_control(
					'image',
					array(
						'label'   => esc_html__( 'Image', 'caleader-core' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => array(
							'url' => Utils::get_placeholder_image_src(),
						),
					)
				);
				$repeater->add_control(
					'url',
					array(
						'label'         => esc_html__( 'Icon URL', 'caleader-core' ),
						'type'          => \Elementor\Controls_Manager::URL,
						'placeholder'   => __( 'https://your-link.com', 'caleader-core' ),
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
		$settings = $this->get_settings_for_display();
		?>
		  <div class="tt-box-wrapper">
			<div class="container">
				<div class="js-carousel-col-3">
					<?php foreach ( $settings['items'] as $item ) { ?>
					<div>
						<a class="tt-media-box01" href="<?php echo $item['url']['url']; ?>" target="_blank">
							<div class="tt-img">
								<?php
									$image_url = ( $item['image']['id'] != '' ) ? wp_get_attachment_url( $item['image']['id'], 'full' ) : $item['image']['url'];
								?>
								<img src="<?php echo $image_url; ?>" alt="">
								<i class="icon-right-arrow1"></i>
							</div>
							<div class="tt-description">
								<h6 class="tt-title"><?php echo $item['title']; ?><span><?php echo $item['subtitle']; ?></span></h6>
								<p>
									<?php echo $item['description']; ?>
								</p>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}
}
  // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderInfobox() );
