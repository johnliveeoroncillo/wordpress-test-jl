<?php
use Elementor\Utils;
class CarLeaderWeeklyTWO extends \Elementor\Widget_Base {


	public function get_name() {
		return 'carleader_weekly_two';
	}
	public function get_title() {
		return esc_html__( 'CarLeader Weekly Two', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}

	private function get_caleader_listings() {
		$options = array();

		$args = array(
			'post_type'   => array( 'carleader-listing' ),
			'post_status' => 'publish',
			'showposts'   => -1,
		);

		$causes = new WP_Query( $args );

		// The Loop
		if ( $causes->have_posts() ) {

			while ( $causes->have_posts() ) {
				$causes->the_post();
				$options[ get_the_ID() ] = get_the_title();
			}
		}

		wp_reset_postdata();

		return $options;
	}
	private function get_sold_cars() {
		$options = array();

		$args = array(
			'post_type'   => array( 'carleader-listing' ),
			'post_status' => 'publish',
			'showposts'   => -1,
		);

		$causes = new WP_Query( $args );

		// The Loop
		if ( $causes->have_posts() ) {

			while ( $causes->have_posts() ) {
				$causes->the_post();
				$status = carleader_listings_meta( 'condition' );

				if ( $status == 'sold_out' ) {
					$options[ get_the_ID() ] = get_the_title();
				}
			}
		}

		wp_reset_postdata();

		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'General', 'caleader-core' ),
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
			'select_car_type',
			array(
				'label'   => esc_html__( 'Select Car Types', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'all'   => esc_html__( 'All Cars', 'caleader-core' ),
					'solds' => esc_html__( 'Sold Cars', 'caleader-core' ),

				),
				'default' => esc_html__( 'all', 'caleader-core' ),

			)
		);

		$this->add_control(
			'has_all_tab',
			array(
				'label'   => esc_html__( 'Has All Tab', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->add_control(
			'all_text',
			array(
				'label'     => esc_html__( 'All Tab Text', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => esc_html__( 'All', 'caleader-core' ),
				'dynamic'   => array( 'active' => true ),
				'condition' => array(
					'has_all_tab' => 'yes',
				),
			)
		);
		$this->add_control(
			'has_url',
			array(
				'label'   => esc_html__( 'Has Direct Link', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			)
		);
		$this->add_control(
			'url_name',
			array(
				'label'     => esc_html__( 'Direct Link Name', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => array( 'active' => true ),
				'condition' => array(
					'has_url' => 'yes',
				),
			)
		);
		$this->add_control(
			'url',
			array(
				'label'     => esc_html__( 'Direct Link URL', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => array( 'active' => true ),
				'condition' => array(
					'has_url' => 'yes',
				),
			)
		);

		$this->add_control(
			'req_text',
			array(
				'label'   => esc_html__( 'Request Text', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
				'default' => esc_html__( 'Request', 'caleader-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tabs',
			array(
				'label'     => esc_html__( 'Tabs', 'caleader-core' ),
				'condition' => array(
					'select_car_type' => 'all',
				),
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'all',
			array(
				'label'       => esc_html__( 'Tab Title', 'caleader-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'All', 'caleader-core' ),
				'placeholder' => esc_html__( 'Type your button title here', 'caleader-core' ),
			)
		);
		$repeater->add_control(
			'show_count',
			array(
				'label'   => esc_html__( 'Show Post Count Under This Tab', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			)
		);
		$repeater->add_control(
			'posts_count',
			array(
				'label'     => esc_html__( 'Posts Under This Tab', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => 1000,
				'step'      => 1,
				'default'   => 10,
				'condition' => array(
					'show_count' => 'yes',
				),
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

		$this->start_controls_section(
			'content',
			array(
				'label'     => esc_html__( 'Content', 'caleader-core' ),
				'condition' => array(
					'select_car_type' => 'all',
				),
			)
		);

		$repeatertwo = new \Elementor\Repeater();

		$repeatertwo->add_control(
			'post_name',
			array(
				'label'   => esc_html__( 'Select Posts', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_caleader_listings(),
			)
		);
		$repeatertwo->add_control(
			'post_condition',
			array(
				'label'       => esc_html__( 'Tab of the post', 'caleader-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'All', 'caleader-core' ),
				'placeholder' => esc_html__( 'Name of the tab where the post will be shown', 'caleader-core' ),
			)
		);

		$repeatertwo->add_control(
			'show_external_name',
			array(
				'label'   => esc_html__( 'Show external name for this post', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			)
		);

		$repeatertwo->add_control(
			'external_name',
			array(
				'label'       => esc_html__( 'Name of the post', 'caleader-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'External name of the post', 'caleader-core' ),
				'condition'   => array(
					'show_external_name' => 'yes',
				),
			)
		);

		$repeatertwo->add_control(
			'external_image',
			array(
				'label'   => esc_html__( 'Show external image for this post', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			)
		);

		$repeatertwo->add_control(
			'post_image',
			array(
				'label'     => esc_html__( 'Post image', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'external_image' => 'yes',
				),
			)
		);

		$repeatertwo->add_control(
			'post_image_size',
			array(
				'label'   => __( 'Number Of Coloumns', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'big'   => __( 'Big Image', 'loveus-core' ),
					'small' => __( 'Small Image', 'loveus-core' ),
				),
				'default' => 'small',

			)
		);

		$this->add_control(
			'items1',
			array(
				'label'   => esc_html__( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeatertwo->get_controls(),
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
		$settings        = $this->get_settings_for_display();
		$all_text        = $settings['all_text'];
		$select_car_type = $settings['select_car_type'];
		$req_text        = $settings['req_text'];
		$has_all_tab     = $settings['has_all_tab'];

		$all_tem_class = 'allitemclass';
		$show_all      = 'all';

		if ( ! isset( $has_all_tab ) || ! $has_all_tab ) {

			$all_tem_class = '';
			$show_all      = '';

		}

		?>
		<?php
		if ( $settings['select_layout'] == 'layout_2' ) {
			echo '<div class="container">';
		}
		?>
	<div class="portfolio-masonry-layout">
	  <div class="container hidden-mobile">
		<a href="<?php echo $settings['url']; ?>" class="extra-link"><?php echo $settings['url_name']; ?>
		<span class="icon-right icon-arrowdown"></span>
	</a>
	  </div>
	  <div class="tt-portfolio-masonry">
		<?php
		if ( $select_car_type == 'all' ) {

			?>
		<div class="tt-filter-nav">
			<?php $i = 1; ?>
			<?php
			foreach ( $settings['items'] as $item ) {
				$posts_count = '';
				if ( isset( $item['posts_count'] ) ) {
					$posts_count = ' (' . $item['posts_count'] . ')';
				}

				$all = $item['all'];
				?>
		  <div class="button <?php echo $i == '1' ? 'active ' . $all_tem_class : ''; ?>" data-filter="
				<?php
				$item['all'] === $all_text;
				if ( $i == '1' ) {
					echo '.all';
				} else {
					echo '.' . str_replace( ' ', '_', strtolower( $item['all'] ) );
				}

				?>
			  "> 
				<?php
				echo strtolower( $all ) . $posts_count;
				?>
				 
		  </div>
				<?php
				$i++;
			}
			?>
		</div>
		<?php } ?>
		<div class="tt-portfolio-content 
		<?php
		if ( $settings['select_layout'] == 'layout_1' ) {
			echo 'layout-default';
		} else {
			echo 'layout-col-03';
		}
		?>
		">
		<?php
		if ( $select_car_type == 'all' ) {

			foreach ( $settings['items1'] as $item ) {

				$post_condition     = $item['post_condition'];
				$post_image_size    = $item['post_image_size'];
				$external_image     = $item['external_image'];
				$show_external_name = $item['show_external_name'];

				$args = array(
					'p'         => $item['post_name'],
					'post_type' => 'carleader-listing',
				);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) :
						$loop->the_post();
						$status      = carleader_listings_meta( 'condition' );
						$curent_time = current_time( 'd' );
						$post_time   = get_the_date( 'd' );
						$diff_time   = $curent_time - $post_time;
						$status      = carleader_listings_meta( 'condition' );
						$price       = carleader_listings_meta( 'price' );
						$old_price   = carleader_listings_meta( 'old_price' );
						?>
		  <div class="element-item <?php echo $show_all; ?>
						<?php
						if ( $post_image_size == 'big' ) {
							   echo 'element-item-2x element-item-2x-all ';
						} echo str_replace( ' ', '_', strtolower( $post_condition ) );
						?>
			">
			<a class="tt-portfolio-item" href="<?php echo the_permalink(); ?>">
			  <figure>
						<?php
						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						if ( $settings['select_layout'] == 'layout_1' ) {
							if ( $post_image_size == 'big' ) {

								if ( $external_image == 'yes' ) {
										   $image_url = $item['post_image']['url'];
								} else {
									$image_url = wp_get_attachment_url( $post_thumbnail_id );
								}

								$temp_url = aq_resize( $image_url, 640, 640, true );

								if ( $temp_url != null && $temp_url != '' ) {
									$image_url = $temp_url;
								}
							} else {
								if ( $external_image == 'yes' ) {
									$image_url = $item['post_image']['url'];
								} else {
									$image_url = wp_get_attachment_url( $post_thumbnail_id );
								}

								$temp_url = aq_resize( $image_url, 320, 320, true );

								if ( $temp_url != null && $temp_url != '' ) {
									$image_url = $temp_url;
								}
							}
						} else {
							if ( $external_image == 'yes' ) {
								$image_url = $item['post_image']['url'];
							} else {
								$image_url = wp_get_attachment_url( $post_thumbnail_id );
							}
							$temp_url = aq_resize( $image_url, 370, 290, true );
							if ( $temp_url != null && $temp_url != '' ) {
								$image_url = $temp_url;
							}
						}
						?>
				<img src="<?php echo $image_url; ?>" alt="">
				<figcaption>
				  <h5 class="tt-title">
						<?php
						if ( $status == 'NEW' ) {
							?>
						<span><?php echo $status; ?></span> 
									 <?php
						}
						?>
						<?php
						if ( $show_external_name == 'yes' ) {
							   echo $item['external_name'];
						} else {
								  the_title();
						}
						?>
					</h5>
						<?php if ( $price != 0 && $status != 'sold_out' ) { ?>
				  <span class="tt-price"><?php echo carleader_listings_price( $price ); ?></span>
							<?php
						} else {
							?>
						<span class="tt-info-price"><?php echo $req_text; ?></span>
									 <?php
						}
						?>
				</figcaption>
			  </figure>
			</a>
		  </div>
						<?php
					endwhile;
				}
			}
		} else {

			$args = array(
				'status'    => 'published',
				'post_type' => 'carleader-listing',
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) :
					$loop->the_post();
					$status      = carleader_listings_meta( 'condition' );
					$curent_time = current_time( 'd' );
					$post_time   = get_the_date( 'd' );
					$diff_time   = $curent_time - $post_time;
					$miles       = carleader_listings_meta( 'miles' );
					$model_name  = carleader_listings_meta( 'model_name' );
					$price       = carleader_listings_meta( 'price' );
					$old_price   = carleader_listings_meta( 'old_price' );
					?>
					<?php if ( $status == 'sold_out' ) { ?>
	  <div class="element-item">
		<a class="tt-portfolio-item" href="<?php echo the_permalink(); ?>">
		  <figure>
						<?php
						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						if ( $settings['select_layout'] == 'layout_1' ) {
							$image_url = wp_get_attachment_url( $post_thumbnail_id );
							$temp_url  = aq_resize( $image_url, 370, 370, true );

							if ( $temp_url != null && $temp_url != '' ) {
								$image_url = $temp_url;
							}
						} else {
							$image_url = wp_get_attachment_url( $post_thumbnail_id );
							$temp_url  = aq_resize( $image_url, 370, 290, true );

							if ( $temp_url != null && $temp_url != '' ) {
								$image_url = $temp_url;
							}
						}
						?>
			<img src="<?php echo $image_url; ?>" alt="">
			<figcaption>
			  <h5 class="tt-title">
						<?php
						the_title();
						?>
				</h5>
						<?php if ( $price != 0 && $status != 'sold_out' ) { ?>
				  <span class="tt-price"><?php echo carleader_listings_price( $price ); ?></span>
							<?php
						} else {
							?>
						<span class="tt-info-price"><?php echo $req_text; ?></span>
							<?php
						}
						?>
			</figcaption>
		  </figure>
		</a>
	  </div>
						<?php
					}
				endwhile;
			}
		}
		?>
		</div>
	  </div>
	  <div class="container d-block d-md-none text-center visible-mobile">
		<a href="<?php echo $settings['url']; ?>" class="extra-link"><?php echo $settings['url_name']; ?> <span class="icon-right icon-arrowdown"></span></a>
	  </div>
	</div>
		<?php
		if ( $settings['select_layout'] == 'layout_2' ) {
			echo '</div>';
		}
		?>
  
		<?php
	}

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderWeeklyTWO() );
