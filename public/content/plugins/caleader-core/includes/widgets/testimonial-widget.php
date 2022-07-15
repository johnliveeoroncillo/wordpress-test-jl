<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
  use Elementor\Utils;
class CarLeaderTestimonial extends \Elementor\Widget_Base {








	public function get_name() {
		return 'testimonial';
	}
	public function get_title() {
		return esc_html__( 'Testimonial', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'custom_testimonial_section',
			array(
				'label' => esc_html__( 'Testimonial', 'caleader-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label' => __( 'Title', 'caleader-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'box-reviews'    => esc_html__( 'Layout 1', 'caleader-core' ),
					'box-reviews-02' => esc_html__( 'Layout 2', 'caleader-core' ),
					'three'          => esc_html__( 'Layout 3', 'caleader-core' ),
				),
				'default' => esc_html__( 'box-reviews', 'caleader-core' ),
			)
		);
		$this->add_control(
			'title_position',
			array(
				'label'        => esc_html__( 'Title Position On Top', 'caleader-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => array(
					'style' => 'box-reviews',
				),
			)
		);
		$repeater = new \Elementor\Repeater();
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
			'rating',
			array(
				'label'   => esc_html__( 'Rating', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( '1', 'caleader-core' ),
					'2' => esc_html__( '2', 'caleader-core' ),
					'3' => esc_html__( '3', 'caleader-core' ),
					'4' => esc_html__( '4', 'caleader-core' ),
					'5' => esc_html__( '5', 'caleader-core' ),
				),
				'default' => esc_html__( '4', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'comment',
			array(
				'label'   => esc_html__( 'Comment', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__(
					'Great treatment right form the get go. Was looking at a car that had just arrived on the lot so it wasn\'t immediately available for
                a test drive and didn\'t have a price yet, but my salesman, kept me fully apprised of the situation. Offered a refundable deposit
                until I could test drive it and make a decision. Great car, great sales team.
                ',
					'caleader-core'
				),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'author',
			array(
				'label'   => esc_html__( 'Author', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Charles M. Worsham', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'designation',
			array(
				'label'   => esc_html__( 'Designation', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Toyota C-HR Eclipse', 'caleader-core' ),
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
		$style    = $settings['style'];
		$title    = $settings['title'];

		?>

		<?php if ( $style == 'three' ) { ?>
<div class="container-indent section-bg-01 section-wrapper-01">
	<div class="box-reviews02">
		<div class="container">
			<div class="tt-custom-bg-text tt-text-white"><?php esc_html_e( 'testimonials', 'caleader-core' ); ?></div>
			<div class="reviews02-col-indent" style="position: relative;">
				<div class="tt-reviews-carousel js-reviews-carousel tt-arrow-center slick-alignment-arrows"
					data-dots="true">
			<?php foreach ( $settings['items'] as $item ) { ?>
					<div class="tt-item">
						<div class="row no-gutters">
							<div class="col-md-6 d-none d-lg-block">
								<div class="tt-reviews-marker">
									<div class="wrapper-marker"></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="tt-reviews-content02">
									<div class="tt-block-title text-left tt-block-title-border">
										<h4 class="tt-title">
				<?php echo $title; ?>
										</h4>
									</div>
									<blockquote class="tt-blockquote-02">
										<p><?php echo $item['comment']; ?></p>
										<div class="tt-caption">
											<span><?php echo $item['author']; ?></span>
				<?php echo $item['designation']; ?>
										</div>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
			<?php } ?>

				</div>
			</div>
		</div>
		<div class="tt-mobile-marker">
				<div class="tt-wrapper">
				</div>
			</div>
			<div class="box-reviews-img">
			<?php
			$i = 0;
			foreach ( $settings['items'] as $item ) {
				$image_url = ( $item['image']['id'] != '' ) ? wp_get_attachment_url( $item['image']['id'], 'full' ) : $item['image']['url'];
				?>
			<div class="slide-img<?php echo $i; ?> <?php
			if ( $i == 0 ) {
				echo ' tt-show';
			}
			$i++;
			?>
			"><img src="<?php echo esc_url( $image_url ); ?>" alt="testimonial image"></div>
			<?php } ?>
		</div>
	</div>
</div>
		<?php } else { ?>



<div class="tt-reviews-carousel js-reviews-carousel tt-arrow-center slick-alignment-arrows" data-dots="true" 
			<?php
			if ( $settings['style'] == 'box-reviews-02' ) {
				echo 'data-item="2"';
			}
			?>
>
			<?php foreach ( $settings['items'] as $item ) { ?>
	<div class="
				<?php
				if ( $settings['style'] == 'box-reviews-02' ) {
					echo 'tt-reviews-content02';
				} else {
					echo 'tt-reviews-content';
				}
				?>
						  ">
				<?php

				if ( $settings['style'] == 'box-reviews-02' ) {
					echo '<div class="tt-border">';
					echo '<div class="tt-box-icon"><img src="' . get_theme_file_uri() . '/assets/images//img-icon.png" alt=""></div>';
					$image_url = ( $item['image']['id'] != '' ) ? wp_get_attachment_url( $item['image']['id'], 'full' ) : $item['image']['url'];
				}
				?>
		<div class="box-show-rating 
				<?php
				if ( $settings['title_position'] == 'yes' ) {
					echo( 'no-separator' );
				}
				?>
					">
			<div class="tt-rating">
				<?php for ( $i = 1;$i <= (int) $item['rating'];$i++ ) { ?>
				<i class="icon-star"></i>
				<?php } ?>
			</div>
		</div>
				<?php if ( $settings['title_position'] == 'yes' ) { ?>
		<p class="tt-title">
					<?php echo $item['author']; ?>, <span> <?php echo $item['designation']; ?></span>
		</p>
				<?php } ?>
				<?php echo $item['comment']; ?>
				<?php if ( $settings['style'] == 'box-reviews' ) { ?>
					<?php if ( $settings['title_position'] == '' ) { ?>
		<p class="tt-title">
						<?php echo $item['author']; ?>, <span> <?php echo $item['designation']; ?></span>
		</p>
					<?php } ?>
				<?php } else { ?>
	</div>
	<div class="tt-title">
		<i class="tt-obj"></i><?php echo $item['author']; ?>
	</div>
				<?php } ?>
</div>
			<?php } ?>
</div>
</div> <!-- end of container-->
			<?php if ( $settings['style'] == 'box-reviews' ) { ?>
				<div class="box-reviews-img">
				<?php
				$slide_id = 0;
				foreach ( $settings['items'] as $item ) {
					$image_url = ( $item['image']['id'] != '' ) ? wp_get_attachment_url( $item['image']['id'], 'full' ) : $item['image']['url'];
					?>
	<div class="slide-img0<?php echo $slide_id; ?> <?php
	if ( $slide_id == 1 ) {
		?>
tt-show
		<?php
	}
	$slide_id++;
	?>
	">
		
		<img src="<?php echo esc_url( $image_url ); ?>" alt="">
		
	</div>
				<?php } //end image foreach ?>

			<?php } ?>

			<?php
		}
	}
}
// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderTestimonial() );
