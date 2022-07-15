<?php
use Elementor\Utils;
class CarLeaderTypeVehicle extends \Elementor\Widget_Base {



















	public function get_name() {
		return 'carleader_type_vehicle';
	}
	public function get_title() {
		return esc_html__( 'CarLeader Type Vehicle', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'typeVehicle', 'caleader-core' ),
			)
		);
		$this->add_control(
			'select_layout',
			array(
				'label'   => esc_html__( 'Select Layout', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'layout_1' => esc_html__( 'layout 1', 'caleader-core' ),
					'layout_2' => esc_html__( 'layout 2', 'caleader-core' ),

				),
				'default' => esc_html__( 'layout_1', 'caleader-core' ),
			)
		);
		$this->add_control(
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
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if ( $settings['select_layout'] == 'layout_1' ) { ?>
			  <div class="js-carousel tt-arrow-center-fluid tt-arrow-color02 slick-alignment-arrows" data-item="5" data-dots="true">
			<?php
			$terms = get_terms(
				array(
					'taxonomy'   => 'body-type',
					'hide_empty' => false,
				)
			);
			foreach ( $terms as $key => $term ) {
				   $image = get_term_meta( $term->term_id, 'image_advanced', false );

				   $image_url = wp_get_attachment_image_url( $image[0], 'full' );

				?>
						<a href="<?php echo get_term_link( $term->term_id, 'body-type' ); ?>" class="tt-media-02">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="">
							<div class="tt-description">
								<h5 class="tt-title"><?php echo $term->name; ?> <?php
								if ( $term->count > 0 ) {
									?>
									 <span class="tt-total"><?php echo $term->count; ?><span><?php echo esc_html__( 'Offers', 'caleader-core' ); ?></span></span> 
																	   <?php
								}
								?>
								</h5>
								<span class="tt-link-marker"><?php echo esc_html__( 'view cars', 'caleader-core' ); ?></span>
							</div>
						</a>
				<?php
			}
			?>
   
		 </div>
			<?php
		} else {
			$terms = get_terms(
				array(
					'taxonomy'   => 'body-type',
					'hide_empty' => false,
				)
			);
			?>
		
	  <div class="container">
	   <div class="row tt-list-media-02">
			<?php
			foreach ( $terms as $key => $term ) {
				$image = get_term_meta( $term->term_id, 'image_advanced', false );
				if ( isset( $image ) && ! empty( $image ) ) {
					  $image_url = wp_get_attachment_image_url( $image[0], 'full' );
				}
				?>
		  <div class="col-6 col-md-4 col-lg-3">       
			<a href="<?php echo get_term_link( $term->term_id, 'body-type' ); ?>" class="tt-media-02">        
			<img src="<?php echo $image_url; ?>" alt="">         
			<div class="tt-description">       
			  <h5 class="tt-title"><?php echo $term->name; ?>
				<?php
				if ( $term->count > 0 ) {
					?>
					 <span class="tt-total"><?php echo $term->count; ?><span><?php echo esc_html__( 'Offers', 'caleader-core' ); ?></span></span>
						<?php
				}
				?>
				</h5>           
				  <span class="tt-link-marker"><?php echo esc_html__( 'view cars', 'caleader-core' ); ?></span>          
			</div>          
			</a>          
		  </div> 
				<?php
			}
			?>
		 </div> 
	</div>
			<?php
		}
	}


}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderTypeVehicle() );
