<?php
use Elementor\Utils;
class WSShortStruct extends \Elementor\Widget_Base {


	public function get_name() {
		return 'ws_short_structure';
	}
	public function get_title() {
		return esc_html__( 'WS Short Structure', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return [ 'caleader-core' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'short-structure', 'caleader-core' ),
			]
		);
		$this->add_control(
			'show_part',
			[
				'label'       => esc_html__( 'First Part', 'caleader-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => esc_html__( 'Default description', 'caleader-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'caleader-core' ),
			]
		);
		$this->add_control(
			'hide_part',
			[
				'label'       => esc_html__( 'Second part', 'caleader-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => esc_html__( 'Default description', 'caleader-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'caleader-core' ),
			]
		);

		$this->add_control(
			'url',
			[
				'label'   => esc_html__( 'URL', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
			]
		);

		$this->add_control(
			'css_classes',
			[
				'label'   => esc_html__( 'CSS Classes ', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$url      = $settings['url'];
		?>
		<div class="tt-text-center ws-short-structure <?php echo $settings['css_classes']; ?>">
			<p><?php echo $settings['show_part']; ?></p>
		<?php echo $settings['hide_part']; ?>
		</div>
	<a href="<?php echo esc_url( $url ); ?>" class="btn-border btn-top"><?php echo esc_html__( 'read more', 'caleader-core' ); ?> <span class="icon-right icon-arrowdown"></span></a>
		<?php
	}

	protected function content_template() {
	}


}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \WSShortStruct() );
