<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;

class ParallaxImage extends Widget_Base {
	public function get_name() {
		return 'ParallaxImage';
	}
	public function get_title() {
		return esc_html__( 'Parallax Image', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-image';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {

		$this->start_controls_section(
			'content',
			array(
				'label' => __( 'Content', 'diaco' ),
			)
		);
		$this->add_control(
			'select_style',
			array(
				'label'   => __( 'Select Style', 'caleader-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => __( 'Image Parallax Left', 'caleader-core' ),
					'two' => __( 'Image Parallax Right', 'caleader-core' ),

				),

			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Parallax Image', 'caleader-core' ),
			)
		);
		$this->add_control(
			'image_one',
			array(
				'label'   => esc_html__( 'Image One', 'caleader-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'image_two',
			array(
				'label'   => esc_html__( 'Image Two', 'caleader-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'caleader-core' ),
				'type'    => Controls_Manager::ICON,
				'default' => esc_html__( 'icon-trophy', 'caleader-core' ),
			)
		);
		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'caleader-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Best Dealer Award' ),
			)
		);
		$this->add_control(
			'badge_url',
			array(
				'label' => esc_html__( 'Badge URL', 'caleader-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],			
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings     = $this->get_settings_for_display();
		$image_one    = ( $settings['image_one']['id'] != '' ) ? wp_get_attachment_url( $settings['image_one']['id'], 'full' ) : $settings['image_one']['url'];
		$image_two    = ( $settings['image_two']['id'] != '' ) ? wp_get_attachment_url( $settings['image_two']['id'], 'full' ) : $settings['image_two']['url'];
		$icon         = $settings['icon'];
		$badge_text   = $settings['badge_text'];
		$select_style = $settings['select_style'];
		$target = $settings['badge_url']['is_external'];
		$nofollow = $settings['badge_url']['nofollow'];
		if ( ! empty( $settings['badge_url']['url'] ) ) {
			$this->add_link_attributes( 'badge_url', $settings['badge_url'] );
		}
		?>
		<?php if ( $select_style == 'two' ) { ?>
		  <div class="tt-img-parallax-right">
						<div class="tt-img-main">
							<img src="<?php echo esc_url( $image_one ); ?>" class="js-init-parallax" data-orientation="up" data-overflow="true" data-scale="1.4" alt="parallax Image">
						</div>
						<div class="tt-img-sub">
							<img src="<?php echo esc_url( $image_two ); ?>" class="js-init-parallax" data-orientation="down" data-overflow="true"  data-scale="1.4" alt="parallax Image">
						</div>
			<?php
			
			if ( ! empty( $settings['badge_url']['url'] ) ) {
				if ( !empty( $badge_text ) ) {
					?>
			  <a <?php echo $this->get_render_attribute_string( 'badge_url' ); ?> class="tt-box-custom js-init-paralla" data-orientation="up" data-overflow="true" data-scale="1.4">
				<span class="tt-icon <?php echo $icon; ?>"></span>
				<h6 class="tt-title"><?php echo wp_kses_post( $badge_text ); ?></h6>
			  </a>
				<?php } ?>
				<?php
			} else {
				if ( ! empty( $badge_text ) ) {
					?>
						<div class="tt-box-custom js-init-paralla" data-orientation="up" data-overflow="true" data-scale="1.4">
							<span class="tt-icon <?php echo $icon; ?>"></span>
							<h6 class="tt-title"><?php echo wp_kses_post( $badge_text ); ?></h6>
			</div>
					<?php
				}
			}
			?>
		  </div>
	  <?php } else { ?>
					<div class="tt-img-parallax-left">
						<div class="tt-img-main">
							<img src="<?php echo esc_url( $image_one ); ?>" class="js-init-parallax" data-orientation="up" data-overflow="true" data-scale="1.4" alt="parallax Image">
						</div>
						<div class="tt-img-sub">
							<img src="<?php echo esc_url( $image_two ); ?>" class="js-init-parallax" data-orientation="down" data-overflow="true"  data-scale="1.4" alt="parallax Image">
						</div>
			<?php
			if ( !empty( $settings['badge_url']['url'] ) ) {
				if ( !empty( $badge_text ) ) {
					?>
						<a <?php echo $this->get_render_attribute_string( 'badge_url' ); ?> class="tt-box-custom01 js-init-paralla" data-orientation="up" data-overflow="true" data-scale="1.4">
							<span class="tt-icon <?php echo $icon; ?>"></span>
							<h6 class="tt-title"><?php echo wp_kses_post( $badge_text ); ?></h6>
			</a>
			   <?php } ?>
				<?php
			} else {
				if ( ! empty( $badge_text ) ) {
					?>
						<div class="tt-box-custom01 js-init-paralla" data-orientation="up" data-overflow="true" data-scale="1.4">
							<span class="tt-icon <?php echo $icon; ?>"></span>
							<h6 class="tt-title"><?php echo wp_kses_post( $badge_text ); ?></h6>
			</div>
					<?php
				}
			}
			?>
					</div>
	  <?php } ?>
		<?php

	}

}
Plugin::instance()->widgets_manager->register_widget_type( new ParallaxImage() );
