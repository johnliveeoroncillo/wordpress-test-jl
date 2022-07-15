<?php
use Elementor\Utils;
class CarLeaderOurStaff extends \Elementor\Widget_Base {
	public function get_name() {
		return 'our_staff';
	}
	public function get_title() {
		return esc_html__( 'Our Staff', 'caleader-core' );
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
				'label' => esc_html__( 'OurStaff', 'caleader-core' ),
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'staff_image',
			array(
				'label'   => esc_html__( 'Staff Image', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'staff_name',
			array(
				'label'   => esc_html__( 'Staff Name', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lazaro Gonzalez', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'staff_designation',
			array(
				'label'   => esc_html__( 'Staff Designation', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'General Manager', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'staff_number',
			array(
				'label'   => esc_html__( 'Staff Number', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '405-895-2359', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'staff_mail',
			array(
				'label'   => esc_html__( 'Staff Email', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'info@youremal.com', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'default' => array(
					array( 'tab_title' => esc_html__( 'Item', 'caleader-core' ) ),
					array( 'tab_title' => esc_html__( 'Item', 'caleader-core' ) ),
					array( 'tab_title' => esc_html__( 'Item', 'caleader-core' ) ),
				),
				'fields'  => $repeater->get_controls(),

			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			<div class="js-carousel-custom01 tt-arrow-bottom">
					<?php foreach ( $settings['items'] as $item ) { ?>
						<div>
							<a href="tel:<?php echo $item['staff_number']; ?>" class="tt-media03">
								<div class="tt-img">
									<?php
									$image_url = ( $item['staff_image']['id'] != '' ) ? wp_get_attachment_url( $item['staff_image']['id'], 'full' ) : $item['staff_image']['url'];
									?>
									<img src="<?php echo esc_url( $image_url ); ?>" alt="team image">
								</div>
								<div class="tt-layot">
									<h6 class="title"><?php echo $item['staff_name']; ?></h6>
									<p>
									<?php echo $item['staff_designation']; ?>
									</p>
									<?php if (!empty('staff_number')){ ?>
									<address>
										<i class="icon-15874"></i> <?php echo $item['staff_number']; ?>
									</address>
									<?php } ?>
									<?php if ('staff_mail' != ''){ ?>
									<address>
										<i class="icon-mail"></i> <?php echo $item['staff_mail']; ?>
									</address>
									<?php } ?>
								</div>
							</a>
						</div>
					<?php } ?>
		</div>
		<?php

	}

}
  // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderOurStaff() );
