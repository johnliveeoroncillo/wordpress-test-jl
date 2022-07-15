<?php
use Elementor\Utils;
class CarLeaderWeekly extends \Elementor\Widget_Base {



	public function get_name() {
		return 'carleader_weekly';
	}
	public function get_title() {
		return esc_html__( 'CarLeader Weekly', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	private function get_conditions() {
		$options = array();
		$options = carleader_listings_available_listing_conditions();

		$optionsarr = [
			'ALL' => esc_html__( 'ALL', 'caleader-core' ),
		];

		$options = array_merge( $optionsarr, $options );

		unset( $options['sold_out'] );
		return $options;
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'CarleaderWeekly', 'caleader-core' ),
			]
		);
		$this->add_control(
			'select_layout',
			[
				'label'   => esc_html__( 'Select Layout', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout_1' => esc_html__( 'layout 1', 'caleader-core' ),
					'layout_2' => esc_html__( 'layout 2', 'caleader-core' ),

				],
				'default' => esc_html__( 'layout_1', 'caleader-core' ),
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
			'has_url',
			[
				'label'   => esc_html__( 'Has Direct Link', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			]
		);
		$this->add_control(
			'url_name',
			[
				'label'     => esc_html__( 'Direct Link Name', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'has_url' => 'yes',
				],
			]
		);
		$this->add_control(
			'url',
			[
				'label'     => esc_html__( 'Direct Link URL', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'has_url' => 'yes',
				],
			]
		);
		$this->add_control(
			'req_text',
			[
				'label'   => esc_html__( 'Request Text', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => [ 'active' => true ],
				'default' => esc_html__( 'Request', 'caleader-core' ),
			]
		);
		$this->add_control(
			'big_image_position',
			[
				'label'   => esc_html__( 'Big Image Position ', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 5,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'all',
			[
				'label'   => esc_html__( 'Group Titile', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_conditions(),
				'default' => esc_html__( 'ALL', 'caleader-core' ),
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
		$settings        = $this->get_settings_for_display();
		$req_text        = $settings['req_text'];
		$query_all       = new WP_Query( array( 'post_type' => 'carleader-listing' ) );
		$count_all       = $query_all->found_posts;
		$query_new       = new WP_Query(
			array(
				'post_type'  => 'carleader-listing',
				'meta_key'   => '_carleader_listing_condition',
				'meta_value' => 'NEW',
			)
		);
		$count_new       = $query_new->found_posts;
		$query_old       = new WP_Query(
			array(
				'post_type'  => 'carleader-listing',
				'meta_key'   => '_carleader_listing_condition',
				'meta_value' => 'USED',
			)
		);
		$count_old       = $query_old->found_posts;
		$query_certified = new WP_Query(
			array(
				'post_type'  => 'carleader-listing',
				'meta_key'   => '_carleader_listing_condition',
				'meta_value' => 'CERTIFIED',
			)
		);
		$count_certfied  = $query_certified->found_posts;

		
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
		<div class="tt-filter-nav">
		<?php $i = 1; ?>
		<?php
		foreach ( $settings['items'] as $item ) {
			
			?>
		  <div class="button <?php echo $i == '1' ? 'active' : ''; ?>" data-filter="
			<?php
			if ( $item['all'] === 'ALL' ) {
				echo '*';
			} else {
				echo '.' . $item['all'];
			}
			?>
			  "> 
			<?php
			if ( $item['all'] === 'ALL' ) {
				echo strtolower( $item['all'] ) . ' (' . $count_all . ')';
			} elseif ( $item['all'] === 'NEW' ) {
				echo strtolower( $item['all'] ) . ' (' . $count_new . ')';
			} elseif ( $item['all'] === 'USED' ) {
				echo strtolower( $item['all'] ) . ' (' . $count_old . ')';
			} elseif ( $item['all'] === 'CERTIFIED' ) {
				echo strtolower($item['all'] ) . ' (' . $count_certfied . ')';
			}else{
				$query_custom = new WP_Query(
					array(
						'post_type'  => 'carleader-listing',
						'meta_key'   => '_carleader_listing_condition',
						'meta_value' => 'CERTIFIED',
					)
				);
				$count_custom  = $query_custom->found_posts;
				echo  $item['all']. ' (' . $count_custom . ')';
			}
			?>
				 
		  </div>
			<?php
			$i++;
		}
		?>
		</div>
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
		$metarr = array();
		foreach ( $settings['items'] as $item ) {
		$metarr[] = $item['all'];
		}
		$args = array(
			'post_type'      => 'carleader-listing',
			'posts_per_page' => $settings['posts_per_page'],
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => '_carleader_listing_condition',
					'value'   => $metarr,
					'compare' => 'IN',
				),
			),
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			$counter = 0;
			while ( $loop->have_posts() ) :
				$loop->the_post();
				$status      = carleader_listings_meta( 'condition' );
				$curent_time = current_time( 'd' );
				$post_time   = get_the_date( 'd' );
				$diff_time   = $curent_time - $post_time;
				$price       = carleader_listings_meta( 'price' );
				$old_price   = carleader_listings_meta( 'old_price' );
				?>
				<?php
				if ( $status != 'sold_out' ) {
					$counter++;
					?>
		  <div class="element-item 
					<?php
					if ( $counter == $settings['big_image_position'] ) {
						echo 'element-item-2x element-item-2x-all ';
					} echo $status;
					?>
			">
			<a class="tt-portfolio-item" href="<?php echo the_permalink(); ?>">
			  <figure>
					<?php
					$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
					if ( $settings['select_layout'] == 'layout_1' ) {
						if ( $counter == $settings['big_image_position'] ) {
							$image_url = wp_get_attachment_url( $post_thumbnail_id );
							$image_url = aq_resize( $image_url, 640, 640, true );
						} else {
							$image_url = wp_get_attachment_url( $post_thumbnail_id );
							$image_url = aq_resize( $image_url, 320, 320, true );
						}
					} else {
						$image_url = wp_get_attachment_url( $post_thumbnail_id );
						$image_url = aq_resize( $image_url, 370, 290, true );
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
					<?php the_title(); ?></h5>
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
				<?php } ?>
				<?php
			endwhile;
		}
		?>
		</div>
	  </div>
	  <div class="container d-block d-md-none text-center visible-mobile">
		<a href="<?php echo $settings['url']; ?>" class="extra-link"><?php echo $settings['url_name']; ?></a>
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
  \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderWeekly() );
