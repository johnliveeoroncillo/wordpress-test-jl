<?php
use Elementor\Utils;
class CarLeaderFooterSchedule extends \Elementor\Widget_Base {


	public function get_name() {
		return 'caleader_footer_schedule';
	}
	public function get_title() {
		return esc_html__( 'Caleader Footer Schedule', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'caleader-core' ),
			]
		);
		$this->add_control(
			'select_style',
			[
				'label'   => __( 'Select Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => __( 'Car', 'caleader-core' ),
					'two' => __( 'Motor', 'caleader-core' ),

				],

			]
		);

		$this->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'default' => esc_html__( 'icon-149984', 'caleader-core' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [ 'active' => true ],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text',
			[
				'label'   => esc_html__( 'Text', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'items',
			[
				'label'   => esc_html__( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'list_title'   => esc_html__( 'Title #1', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					],
					[
						'list_title'   => esc_html__( 'Title #2', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					],
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings     = $this->get_settings_for_display();
		$select_style = $settings['select_style'];

		$icon  = $settings['icon'];
		$title = $settings['title'];

		if ( $select_style == 'one' ) {
			?>
<div class="tt-col">
	<div class="tt-box-info">
		<div class="tt-item">
			<h6 class="tt-ttile"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo $title; ?></h6>
			<ul>
				<?php
				foreach ( $settings['items'] as $item ) {
					$text = $item['text'];
					?>
				<li><?php echo $text; ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php } elseif ( $select_style == 'two' ) { ?>

<div class="tt-box-info">
	<div class="tt-item">
		<h6 class="tt-ttile"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo $title; ?></h6>
		<ul>
			<?php
			foreach ( $settings['items'] as $item ) {
				$text = $item['text'];
				?>
			<li><?php echo $text; ?></li>
			<?php } ?>
		</ul>
	</div>
</div>
			<?php
}

	}

}
	// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderFooterSchedule() );
