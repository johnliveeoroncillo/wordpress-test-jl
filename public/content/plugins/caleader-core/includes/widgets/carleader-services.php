<?php
use Elementor\Utils;
class CarLeaderServices extends \Elementor\Widget_Base {

	public function get_name() {
		return 'CarleaderServices';
	}
	public function get_title() {
		return esc_html__( 'Carleader Services', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Car Leader Services', 'caleader-core' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts per Page', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__( 'Order by', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date'       => esc_html__( 'Date', 'caleader-core' ),
					'ID'         => esc_html__( 'ID', 'caleader-core' ),
					'author'     => esc_html__( 'Author', 'caleader-core' ),
					'title'      => esc_html__( 'Title', 'caleader-core' ),
					'modified'   => esc_html__( 'Modified', 'caleader-core' ),
					'rand'       => esc_html__( 'Random', 'caleader-core' ),
					'menu_order' => esc_html__( 'Menu order', 'caleader-core' ),

				],
				'default' => esc_html__( 'ID', 'caleader-core' ),
			]
		);
		$this->add_control(
			'sort_by',
			[
				'label'   => esc_html__( 'Sort By', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'desc' => esc_html__( 'desc', 'caleader-core' ),
					'asc'  => esc_html__( 'asc', 'caleader-core' ),

				],
				'default' => esc_html__( 'desc', 'caleader-core' ),
			]
		);

		$this->end_controls_section();

	}


	protected function render() {
		$settings       = $this->get_settings_for_display();
		$posts_per_page = $settings['posts_per_page'];
		$order_by       = $settings['order_by'];
		$sort_by        = $settings['sort_by'];
		?>
		
			<?php
			$args = array(
				'post_type'      => 'carleader_services',
				'posts_per_page' => $posts_per_page,
				'orderby'        => $order_by,
				'order'          => $sort_by,
			);
			?>
	  <div class="js-carousel-news tt-arrow-bottom">
		<?php

			$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) :
				$loop->the_post();
				$icon              = get_post_meta( get_the_ID(), 'framework_service_icon', true );
				$short_description = get_post_meta( get_the_ID(), 'framework_service_short_description', true );
				?>
				  <div>
					<a href="<?php the_permalink(); ?>" target="_blank" class="tt-media-03">
				  <?php
					$attachement = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carleader-services-thumbnail' );
					?>
					  <div class="tt-img">
						<img src="<?php echo esc_url( $attachement[0] ); ?>" alt="service image">
					  </div>                                
					  <div class="tt-layout">
						<h3 class="tt-title"><?php the_title(); ?></h3>
						<p>
						<?php
						if ( ! empty( $short_description ) ) {
							echo $short_description;
						} else {
							the_content();
						}
						?>
						</p>
						<div class="tt-layout-bottom">
						  <div class="tt-icon-link"></div>
						</div>
					  </div>                     
					</a>
								</div>
							
	
				<?php
			endwhile;
		} else {
			echo esc_html__( 'No products found' );
		}
			wp_reset_postdata();
		?>
	  </div>    
		<?php

	}



}
	  // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderServices() );
