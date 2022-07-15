<?php
use Elementor\Utils;
class CarLeaderIconBox extends \Elementor\Widget_Base {
	public function get_name() {
		return 'IconBox';
	}
	public function get_title() {
		return esc_html__( 'Carleader Icon Box', 'caleader-core' );
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
				'label' => esc_html__( 'IconBox', 'caleader-core' ),
			)
		);
		$this->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'tt-col-icon'     => esc_html__( 'Layout 01', 'caleader-core' ),
					'tt-box-layout02' => esc_html__( 'Layout 02', 'caleader-core' ),
					'tt-box-layout03' => esc_html__( 'Layout 03', 'caleader-core' ),
				),
				'default' => esc_html__( 'tt-box-layout02', 'caleader-core' ),
			)
		);

				$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'default' => esc_html__( 'icon-vehicles', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'icon_text',
			array(
				'label'   => esc_html__( 'Icon Content', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Certified Vehicles That Look and Feel New', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'icon_content',
			array(
				'label'   => esc_html__( 'Icon Content', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Each vehicle is detailed and washed to guarantee that you feel like the first owner. ', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
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
		$style    = 'tt-box-layout02 pdnNone';
		?>
		<?php
		if ( $settings['style'] == 'tt-box-layout03' ) {
			$style = 'tt-box-layout03';
			?>
			<?php
		} elseif ( $settings['style'] == 'tt-col-icon' ) {
			$style = 'tt-col-icon';
		}
		?>


		<?php if ( $style == 'tt-box-layout03' ) { ?>
		  <div class="tt-list-icon">
			<?php foreach ( $settings['items'] as $item ) { ?>
			  <div class="tt-item">
				<div class="tt-item-icon">
				  <i class="<?php echo $item['icon']; ?>"></i>
				</div>
				<div class="tt-item-description">
				  <h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
				  <p>
				  <?php echo $item['icon_content']; ?>
				  </p>
				</div>
			  </div>
			<?php } ?>
		  </div>
		<?php } else { ?>
		<div class="<?php echo $style; ?> ">
			<?php
			$counter = 0;
			foreach ( $settings['items'] as $item ) {

				?>
				<?php
				if ( $settings['style'] == 'tt-box-layout03' ) {
					?>
			<h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
					<?php
				}
				?>
						<div class="tt-item">
							<div class="tt-col-icon">
								<div class="tt-icon">
									<i class="<?php echo $item['icon']; ?>"></i>
								</div>
							</div>
							<div class="tt-col-description">
								<?php
								if ( $settings['style'] == 'tt-box-layout02' || $settings['style'] == 'tt-col-icon' ) {
									?>
			<h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
									<?php
								}
								?>
							<p>	<?php echo $item['icon_content']; ?></p>
							</div>
						</div>
							<?php $counter++; } ?>
		</div>
			<?php
		}
	}


}
// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderIconBox() );
