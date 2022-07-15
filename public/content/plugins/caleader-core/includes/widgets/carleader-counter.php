<?php
use Elementor\Utils;
class CarLeaderCounter extends \Elementor\Widget_Base {
	public function get_name() {
		return 'CarladerCounter';
	}
	public function get_title() {
		return esc_html__( 'Carlader Counter', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-counter';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {

		$this->start_controls_section(
			'content',
			array(
				'label' => esc_html__( 'Content', 'caleader-core' ),
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
				'label' => esc_html__( 'carleaderCounter', 'caleader-core' ),
			)
		);
			$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'title',
				array(
					'label'   => esc_html__( 'Title', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Vehicles In Stock', 'caleader-core' ),
					'dynamic' => array( 'active' => true ),
				)
			);
			$repeater->add_control(
				'start_point',
				array(
					'label'   => esc_html__( 'Start Point', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'min'     => 0,
					'max'     => 1000,
					'step'    => 1,
					'default' => 1,
				)
			);
			$repeater->add_control(
				'end_point',
				array(
					'label'   => esc_html__( 'End Point', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'min'     => 1,
					'max'     => 10000,
					'step'    => 1,
					'default' => 100,
				)
			);
			$repeater->add_control(
				'end_point_2',
				array(
					'label'   => esc_html__( '2nd End Point', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'default' => '',
					'dynamic' => array( 'active' => true ),
				)
			);
			$repeater->add_control(
				'symbel',
				array(
					'label'   => esc_html__( 'Symbel', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'dynamic' => array( 'active' => true ),
				)
			);
			$repeater->add_control(
				'icon',
				array(
					'label'   => esc_html__( 'Icon', 'caleader-core' ),
					'type'    => \Elementor\Controls_Manager::ICON,
					'default' => esc_html__( 'eicon-counter', 'caleader-core' ),
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
			<div class="tt-layout-counter counter-js">

			<?php foreach ( $settings['items'] as $item ) { ?>	
				<div class="tt-col-item">
					<div class="tt-counter-number">
						<span class="tt-counter" data-from="<?php echo $item['start_point']; ?>" data-to="<?php echo $item['end_point']; ?>"><?php echo $item['start_point']; ?></span>
																	   <?php
																		if ( empty( $item['end_point_2'] ) ) {
																			echo $item['symbel']; }
																		?>
						
						<?php
						if ( ! empty( $item['end_point_2'] ) ) {
							?>
	,<span class="tt-counter" data-from="<?php echo $item['start_point']; ?>" data-to="<?php echo $item['end_point_2']; ?>"><?php echo $item['start_point']; ?></span><?php echo $item['symbel']; ?>
					<?php } ?>
					</div>
					<div class="tt-counter-title"><?php echo $item['title']; ?></div>
				</div>
				<?php } ?>
			</div>

		<?php } else { ?>
			<div class="container tt-promo-layout counter-js slider-layout">
			<?php foreach ( $settings['items'] as $item ) { ?>	
				<div class="tt-item">
					<div class="box-value">
						<i class="<?php echo $item['icon']; ?>"></i>
						<span><span class="tt-counter" data-from="<?php echo $item['start_point']; ?>" data-to="<?php echo $item['end_point']; ?>"></span><?php echo $item['start_point']; ?></span>
					</div>
					<h6 class="tt-title"><?php echo $item['title']; ?></h6>
				</div>
			<?php } ?>
			</div>
			<?php
		}
	}

	protected function content_template() {

	}


}
 // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderCounter() );
