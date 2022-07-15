<?php
use Elementor\Utils;
class CarLeaderFooterContact extends \Elementor\Widget_Base {


	public function get_name() {
		return 'caleader_footer_contact';
	}
	public function get_title() {
		return esc_html__( 'Caleader Footer Contact', 'caleader-core' );
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

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'default' => esc_html__( 'icon-149984', 'caleader-core' ),
			]
		);

		$repeater->add_control(
			'select_type',
			[
				'label'   => __( 'Select Type', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'   => __( 'Text', 'caleader-core' ),
					'two'   => __( 'Phone', 'caleader-core' ),
					'three' => __( 'Email', 'caleader-core' ),

				],

			]
		);

		$repeater->add_control(
			'text',
			[
				'label'     => esc_html__( 'Content', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'select_type' => 'one',
				],
			]
		);

		$repeater->add_control(
			'url',
			[
				'label'     => esc_html__( 'Url', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'select_type' => array( 'two', 'three' ),
				],
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

		if ( $select_style == 'one' ) {

			?>
<div class="tt-col">

	<ul class="tt-list-info">
			<?php
			foreach ( $settings['items'] as $item ) {
				$select_type = $item['select_type'];
				$icon        = $item['icon'];

				if ( $select_type == 'one' ) {
					$text = $item['text'];
					?>
				<li>
					<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<?php echo $text; ?>
				</li>
							<?php
				} elseif ( $select_type == 'two' ) {
					$url = $item['url'];
					?>
				<li>
					<a href="tel:<?php echo $url; ?>">
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<?php echo $url; ?>
					</a>
				</li>
							<?php
				} else {
					$url = $item['url'];
					?>
				<li>
					<a href="mailto:<?php echo $url; ?>">
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<?php echo $url; ?>
					</a>
				</li>
							<?php
				}
				?>
				<?php } ?>
	</ul>
</div>
			<?php } elseif ( $select_style == 'two' ) { ?>
			<?php
			foreach ( $settings['items'] as $item ) {
				$select_type = $item['select_type'];
				$icon        = $item['icon'];
				?>
			<div class="tt-box-info02">
				<div class="tt-item">
					<?php
					if ( $select_type == 'one' ) {
						$text = $item['text'];
						?>
											<i class="<?php echo esc_attr( $icon ); ?>"></i>

							<?php echo $text; ?>
							<?php
					} elseif ( $select_type == 'two' ) {
						$url = $item['url'];
						?>
					<a href="tel:<?php echo $url; ?>">
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<?php echo $url; ?>
					</a>
							<?php
					} else {
						$url = $item['url'];
						?>
					<a href="mailto:<?php echo $url; ?>">
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<?php echo $url; ?>
					</a>
							<?php
					}
					?>
				</div>
			</div>
				<?php
			}
			}
			?>

		<?php

	}

}
	// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderFooterContact() );
