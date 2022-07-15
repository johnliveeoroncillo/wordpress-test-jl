<?php
use Elementor\Utils;
class CarLeaderWeOffer extends \Elementor\Widget_Base {
	public function get_name() {
		return 'WeOffer';
	}
	public function get_title() {
		return esc_html__( 'We Offer', 'caleader-core' );
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
				'label' => esc_html__( 'WeOffer', 'caleader-core' ),
			)
		);

		$this->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Style', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'tt-layout01'    => esc_html__( 'Layout Car', 'caleader-core' ),
					'tt-layout01-02' => esc_html__( 'Layout Motor', 'caleader-core' ),
				),
				'default' => esc_html__( 'tt-layout01', 'caleader-core' ),
			)
		);
		/*
		$this->add_control(
		  'style',
		  [
			'label' => esc_html__( 'Style', 'caleader-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			  'options' => [
				  '1'  => esc_html__('Layout 1', 'caleader-core' ),
				  '2'  => esc_html__('Layout 2', 'caleader-core' ),
				  '3'  => esc_html__('Layout 3', 'caleader-core' ),
				],
			'default' => esc_html__( '1', 'caleader-core' ),
		  ]
		);
		*/
		$this->add_control(
			'backgroud_image',
			array(
				'label'   => esc_html__( 'Image Dekstop View', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'backgroud_image_mobile',
			array(
				'label'   => esc_html__( 'Image Mobile View', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label'   => esc_html__( 'Extra Class', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'col-12 col-xl-6  ml-auto', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);

				$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon_text',
			array(
				'label'   => esc_html__( 'Icon Text', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Pre-Sale Preparation', 'caleader-core' ),

				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'default' => esc_html__( 'icon-4', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'icon_content',
			array(
				'label'   => esc_html__( 'Icon Content', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Before you sell your car, or trade it in to get something bigger or better, we can help you make your car look as good as possible before anyone comes to see it.', 'caleader-core' ),
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
		$settings    = $this->get_settings_for_display();
		$extra_class = $settings['extra_class'];
		$style       = $settings['style'];

		$image_url = ( $settings['backgroud_image']['id'] != '' ) ? wp_get_attachment_url( $settings['backgroud_image']['id'], 'full' ) : $settings['backgroud_image']['url'];

		$image_url_mobile = ( $settings['backgroud_image_mobile']['id'] != '' ) ? wp_get_attachment_url( $settings['backgroud_image_mobile']['id'], 'full' ) : $settings['backgroud_image_mobile']['url'];

		?>

  <div class="container-indent no-margin">
	  <div class="<?php echo $style; ?>" style="background-image: url('<?php echo $image_url; ?>')">
		<div class="layout01-desctope">
		  <div class="container">
			<?php
			if ( $style == 'tt-layout01-02' ) {
				echo '<div class="' . $extra_class . '">';
			}
			?>
			  <?php
				$counter = 0;
				foreach ( $settings['items'] as $item ) {
					$counter++;
					if ( $style == 'tt-layout01' ) {
						if ( ( $counter % 4 ) == 0 ) {
							echo '<div class="col-6 col-lg-4  ml-auto">';
							echo '<div class="tt-item  tt-icon-bottom">';
						} elseif ( ( $counter % 3 ) == 0 ) {
							echo '<div class="row no-gutters">';
							echo '<div class="col-6 col-lg-4">';
							echo '<div class="tt-item tt-icon-right tt-icon-bottom">';
						} elseif ( ( $counter % 2 ) == 0 ) {
							echo '<div class="col-6 col-lg-4  ml-auto">';
							echo '<div class="tt-item">';
						} else {
							echo '<div class="row no-gutters">';
							echo '<div class="col-6 col-lg-4">';
							echo '<div class="tt-item tt-icon-right">';
						}
					} else {
						echo '<div class="tt-item">';
					}

					?>
				  <div class="tt-item-icon">
					<i class="<?php echo $item['icon']; ?>"></i>
				  </div>
				
				  <div class="tt-item-content">
					<h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
					<p>
					  <?php echo $item['icon_content']; ?>
					</p>
				  </div>
					<?php
					if ( $style == 'tt-layout01' ) {
						if ( ( $counter % 4 ) == 0 ) {
							echo '</div>';
							echo '</div>';
							echo '</div>';
						} elseif ( ( $counter % 3 ) == 0 ) {
							echo '</div>';
							echo '</div>';

						} elseif ( ( $counter % 2 ) == 0 ) {
							echo '</div>';
							echo '</div>';
							echo '</div>';
						} else {
							echo '</div>';
							echo '</div>';

						}
					} else {
						echo '</div>';
					}
					?>
				  <?php } ?>
				<?php
				if ( $style == 'tt-layout01-02' ) {
					echo '</div>';
				}
				?>
			   
			   
			</div>
			
		  </div>
		<div class="layout01-mobile">
		  <div class="slider-layout">
			<?php foreach ( $settings['items'] as $item ) { ?>
			
			<div class="tt-item">
			  <div class="tt-item-icon">
				<i class="<?php echo $item['icon']; ?>"></i>
			  </div>
			  <div class="tt-item-content">
				<h6 class="tt-title"><?php echo $item['icon_text']; ?></h6>
				<p>
				  <?php echo $item['icon_content']; ?>
				</p>
			  </div>
			</div>
			<?php } ?>
		   
		  </div>
		</div>  
	  </div>
		

	</div>
		<?php
	}

}
	  // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderWeOffer() );
