<?php
use Elementor\Utils;
class CarLeaderMakeItEasy extends \Elementor\Widget_Base {


	public function get_name() {
		return 'MakeItEasy';
	}
	public function get_title() {
		return esc_html__( 'Make It Easy', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_makeEasy',
			array(
				'label' => esc_html__( 'MakeEasy', 'caleader-core' ),
			)
		);
		$this->add_control(
			'select_style',
			array(
				'label'   => __( 'Select Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => __( 'Style One', 'caleader-core' ),
					'two' => __( 'Style Two', 'caleader-core' ),

				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Item List', 'caleader-core' ),
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Main Icon', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'default' => esc_html__( 'icon-carsearch2', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'icon_text',
			array(
				'label'   => esc_html__( 'Title', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Our Inventory', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'content',
			array(
				'label'   => esc_html__( 'Content', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'url',
			array(
				'label'         => esc_html__( 'URL', 'caleader-core' ),
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
		$settings     = $this->get_settings_for_display();
		$select_style = $settings['select_style'];
		?>
		<?php if ( $select_style == 'two' ) { ?>
					<div class="tt-listing-col">
						<div class="row">

			<?php
			$counter = 0;
			foreach ( $settings['items'] as $item ) {
				$counter++;
				?>
				  <div class="col-sm-6">
					<div class="tt-promo02">
					  <div class="tt-bg-text"><?php echo $counter; ?></div>
					  <div class="tt-icon <?php echo $item['icon']; ?>"></div>
					  <a href="<?php echo $item['url']['url']; ?>" class="tt-item"> <h6 class="tt-title"><?php echo $item['icon_text']; ?></h6></a>
					  <p><?php echo $item['content']; ?></p>
					</div>
				  </div>
			<?php } ?>
					
						</div>
					</div>
		<?php } else { ?>
			  <div class="tt-promo-02-layout">
			<?php
			$counter = 0;
			foreach ( $settings['items'] as $item ) {
				$counter++;
				?>
				<a href="<?php echo $item['url']['url']; ?>" class="tt-item">
				  <div class="box-icon">
				<?php if ( $counter > 1 && $counter <= count( $settings['items'] ) ) { ?>
					<div class="tt-line-dotted tt-left"></div>
				<?php } ?>
				<?php if ( $counter > 0 && $counter < count( $settings['items'] ) ) { ?>
					<div class="tt-line-dotted tt-right"></div>
				<?php } ?>
					<i class="<?php echo $item['icon']; ?>"></i>
				  </div>
				  <h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
				</a>
				
				<?php if ( $counter < sizeof( $settings['items'] ) ) { ?>
				<div class="tt-item-smal">
				  <div class="box-icon">
					<i class="icon-right-arrow"></i>
				  </div>
				</div>
				<?php } ?>
			<?php } ?>
			  </div>
		<?php } ?>
	  
		<?php

	}

}
	// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderMakeItEasy() );
