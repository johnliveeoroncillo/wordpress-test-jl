<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
class CarleaderProductList extends Widget_Base {



	public function get_name() {
		return 'carleader_product_list';
	}
	public function get_title() {
		return esc_html__( 'Carleader Product List', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-post';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	private function get_bodytype_list() {
		$options  = array();
		$taxonomy = 'body-type';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}
	private function get_make_list() {
		$options  = array();
		$taxonomy = 'make-brand';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'Carleader Product List', 'caleader-core' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Our Inventory', 'caleader-core' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'select_layout',
			[
				'label'   => esc_html__( 'Select layout', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( 'With Slider', 'caleader-core' ),
					'2' => esc_html__( 'Without Slider', 'caleader-core' ),

				],
				'default' => '1',
			]
		);

		$this->add_control(
			'number_of_coloumns',
			[
				'label'   => __( 'Number Of Coloumns', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'col-xl-6' => __( '2', 'cameron-core' ),
					'col-xl-4' => __( '3', 'cameron-core' ),
					'col-xl-3' => __( '4', 'cameron-core' ),
				],
				'default' => 'col-xl-4',

			]
		);

		$this->add_control(
			'select_query',
			[
				'label'   => esc_html__( 'Select Query', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( 'All Products', 'caleader-core' ),
					'2' => esc_html__( 'Only Sold', 'caleader-core' ),
					'3' => esc_html__( 'Without Sold', 'caleader-core' ),
					'4' => esc_html__( 'Without Price (0)', 'caleader-core' ),
					'5' => esc_html__( 'Only Body Types', 'caleader-core' ),
					'6' => esc_html__( 'Only Makes', 'caleader-core' ),
					'7' => esc_html__( 'Only Fuel Types', 'caleader-core' ),
				],
				'default' => '1',
			]
		);

		$this->add_control(
			'body_type',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => esc_html__( 'Body Type', 'caleader-core' ),
				'options'   => $this->get_bodytype_list(),
				'condition' => [
					'select_query' => '5',
				],
			]
		);
		$this->add_control(
			'make',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => esc_html__( 'Makes', 'caleader-core' ),
				'options'   => $this->get_make_list(),
				'condition' => [
					'select_query' => '6',
				],
			]
		);
		$this->add_control(
			'fuel_types',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => esc_html__( 'Fuel Types', 'caleader-core' ),
				'options'   => carleader_listings_available_fuels(),
				'condition' => [
					'select_query' => '7',
				],
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts per Page', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 2000,
				'step'    => 1,
				'default' => 10,
			]
		);

		$this->add_control(
			'sort_by',
			[
				'label'   => esc_html__( 'Sort By', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date'       => esc_html__( 'New First', 'caleader-core' ),
					'date-old'   => esc_html__( 'Old First', 'caleader-core' ),
					'price'      => esc_html__( 'Price (Low to High)', 'caleader-core' ),
					'price-high' => esc_html__( 'Price (High to Low)', 'caleader-core' ),
				],
				'default' => esc_html__( 'desc', 'caleader-core' ),
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings           = $this->get_settings();
		$settings           = $this->get_settings_for_display();
		$title              = $settings['title'];
		$select_layout      = $settings['select_layout'];
		$number_of_coloumns = $settings['number_of_coloumns'];
		$posts_per_page     = $settings['posts_per_page'];
		$sort_by            = $settings['sort_by'];
		$select_query       = $settings['select_query'];

		$slider_class = 'js-carousel-col-4';

		if ( $select_layout == 2 ) {
			$slider_class = 'row';
		}

		$args = array(
			'post_type'      => 'carleader-listing',
			'posts_per_page' => $posts_per_page,
		);

		$args['orderby']  = 'date';
		$args['order']    = 'OLD' === $sort_by ? 'ASC' : 'DESC';
		$args['meta_key'] = '';
		switch ( $sort_by ) {
			case 'date':
				$args['orderby'] = 'date-old';
				$args['order']   = 'OLD' === $sort_by ? 'DESC' : 'ASC' ;
				break;
			case 'price':
				$args['orderby']  = 'meta_value_num ID';
				$args['order']    = 'HIGH' === $sort_by ? 'DESC' : 'ASC';
				$args['meta_key'] = '_carleader_listing_price';
				break;
		}

		if ( $select_query == '2' ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_carleader_listing_condition',
					'value'   => 'sold_out',
					'compare' => '==',
				),
			);
		} elseif ( $select_query == '3' ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_carleader_listing_condition',
					'value'   => 'sold_out',
					'compare' => 'NOT IN',
				),
			);
		} elseif ( $select_query == '4' ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_carleader_listing_price',
					'value'   => 0,
					'compare' => '!=',
				),
			);
		} elseif ( $select_query == '5' ) {
			$body_type         = $settings['body_type'];
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'body-type',
					'field'    => 'slug',
					'terms'    => $body_type,
				),
			);
		} elseif ( $select_query == '6' ) {
			$make              = $settings['make'];
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'make-brand',
					'field'    => 'slug',
					'terms'    => $make,
				),
			);
		} elseif ( $select_query == '7' ) {
			$fuel               = $settings['fuel_types'];
			$args['meta_query'] = array(
				array(
					'key'     => '_carleader_listing_model_engine_fuel',
					'value'   => $fuel,
					'compare' => 'IN',
				),
			);
		}

		if ( ! isset( $test_drive_button ) || $test_drive_button == '' ) {
			$test_drive_button = false;

		}

		if ( ! isset( $ga_i ) || $ga_i == '' ) {
			$ga_i = false;
		}

		if ( ! isset( $comp_i ) || $comp_i == '' ) {
			$comp_i = false;
		}

		if ( ! isset( $test_drive ) || $test_drive == '' ) {
			$test_drive = esc_html__( 'test drive', 'caleader-core' );

		}
		$test_drive = strtoupper( str_replace( ' ', '-', $test_drive ) );

		?>
<div class="container-indent">
	<div class="container">
		<div class="tt-block-title">
			<h3 class="tt-title"><?php echo $title; ?></h3>
		</div>
		<div class="<?php echo esc_attr( $slider_class ); ?> tt-slider-product tt-arrow-center slick-alignment-arrows">
			<?php
			$loop = new WP_Query( $args );
			?>

			<input type="hidden" id="interested_slider_result" value="<?php echo $posts_per_page; ?>">
			<?php
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) {
					$loop->the_post();
					$status            = carleader_listings_meta( 'condition' );
					$make              = carleader_listings_meta( 'make_display' );
					$curent_time       = current_time( 'd' );
					$post_time         = get_the_date( 'd' );
					$diff_time         = $curent_time - $post_time;
					$miles             = carleader_listings_meta( 'miles' );
					$price             = carleader_listings_meta( 'price' );
					$old_price         = carleader_listings_meta( 'old_price' );
					$fuel_type         = carleader_listings_meta( 'model_engine_fuel' );
					$transmission      = carleader_listings_meta( 'model_transmission_type' );
					$drive             = carleader_listings_meta( 'drivetrain' );
					$hp                = carleader_listings_meta( 'hp' );
					$est_loan          = carleader_listings_meta( 'loan_payment' );
					$test_drive        = carleader_listings_option( 't_drive_bt' );
					$test_drive_button = carleader_listings_option( 'test_drive_button' );
					$ga_i 			   = carleader_listings_option( 'ga_i' );
					$comp_i 		   = carleader_listings_option( 'comp_i' );

					if ( $drive == 'awd' ) {
						$drive = esc_html__( 'All-Wheel Drive', 'caleader-core' );
					} elseif ( $drive == 'fwd' ) {
						$drive = esc_html__( 'Four-Wheel Drive', 'caleader-core' );
					} elseif ( $drive == 'frwd' ) {
						$drive = esc_html__( 'Front-Wheel Drive', 'caleader-core' );
					} elseif ( $drive == 'rwd' ) {
						$drive = esc_html__( 'Rear-Wheel Drive', 'caleader-core' );
					} else {
						$drive = str_replace( '_', ' ', ucwords( $drive ) );
					}

					if ( $transmission == 'at' ) {
						$transmission = esc_html__( 'Automatic', 'caleader-core' );
					} elseif ( $transmission == 'mt' ) {
						$transmission = esc_html__( 'Manual', 'caleader-core' );
					} elseif ( $transmission == 'am' ) {
						$transmission = esc_html__( 'Automated', 'caleader-core' );
					} elseif ( $transmission == 'cvt' ) {
						$transmission = esc_html__( 'Variable', 'caleader-core' );
					} else {
						$transmission = str_replace( '_', ' ', ucwords( $transmission ) );
					}

					if ( $fuel_type == 'gas' ) {
						$fuel_type = esc_html__( 'Gasoline', 'caleader-core' );
					} elseif ( $fuel_type == 'diesel' ) {
						$fuel_type = esc_html__( 'Diesel', 'caleader-core' );
					} elseif ( $fuel_type == 'cng' ) {
						$fuel_type = esc_html__( 'CNG', 'caleader-core' );
					} elseif ( $fuel_type == 'lp' ) {
						$fuel_type = esc_html__( 'LP', 'caleader-core' );
					} elseif ( $fuel_type == 'bdiesel' ) {
						$fuel_type = esc_html__( 'Bio-diesel', 'caleader-core' );
					} elseif ( $fuel_type == 'ethanol' ) {
						$fuel_type = esc_html__( 'Ethanol', 'caleader-core' );
					} elseif ( $fuel_type == 'petrol' ) {
						$fuel_type = esc_html__( 'Petrol', 'caleader-core' );
					} else {
						$fuel_type = str_replace( '_', ' ', ucwords( $fuel_type ) );
					}

					?>
			<div class="<?php echo esc_attr( $number_of_coloumns ); ?> col-md-6 col-sm-12 tt-col-item product-list-addon-class
					<?php
					if ( $status == 'sold_out' ) {
						echo 'tt-not-hover';
					}
					?>
			">
				<div class="tt-product-02 ">
					<div class="tt-image-box">
						<a href="<?php the_permalink(); ?>" class="tt-img">
							<?php the_post_thumbnail( 'archive_listing' ); ?>
							<?php
							if ( $status == 'NEW' ) {
								?>
							<span class="tt-label-location">
								<span class="tt-label-new">
									<?php
									echo $status;
									?>
								</span>
								<?php
								if ( $diff_time > carleader_listings_option( 'just_arrived' ) ) {
									?>
								<span
									class="tt-label-info02"><?php echo esc_html__( 'Just Arrived:', 'caleader-core' ); ?></span>
								<?php } ?>
								<?php if ( ! empty( $hp ) ) { ?>
								<span class="tt-label-info">
									<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-core' ); ?>
								</span>
								<?php } ?>
							</span>
								<?php
							} elseif ( $status == 'sold_out' ) {
								$sold_out_badge = carleader_listings_option( 'sold_out_badge' );
								if ( $sold_out_badge != '' ) {
									$sold_out_badge = wp_get_attachment_url( $sold_out_badge[0] );
									?>
							<span class="tt-label-custom"><img class="img-sold-out"
									src="<?php echo esc_url( $sold_out_badge ); ?>"
									alt="<?php echo esc_html__( 'Related Header Image', 'caleader-core' ); ?>"> </span>
									<?php
								} else {
									?>
							<span class="tt-label-custom"><i class="icon-soldout"></i></span>
									<?php
								}
							} else {
								$promo = carleader_listings_meta( 'promo' );
								if ( $promo == '1' ) {
									?>
							<span class="tt-label-location">
								<span class="tt-label-promo">
									<?php echo esc_html__( 'Great Deal!', 'caleader-core' ); ?>
								</span>
									<?php if ( ! empty( $hp ) ) { ?>
								<span class="tt-label-info">
										<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-core' ); ?>
								</span>
								<?php } ?>
							</span>
									<?php
								}
							}
							?>

							<span class="tt-data">
								<?php echo carleader_listings_miles( $miles ); ?>
							</span>
						</a>
						<ul class="tt-icon">
							<?php if ( $test_drive_button ) { ?>
							<li><a href="JavaScript:void(0)" data-toggle="modal" data-target="#modalAddTestDrive"
									title="<?php echo $test_drive; ?>" class="tooltip"><i
										class="icon-testdrive"></i></a></li>
							<?php } ?>
							<?php
							$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
							$linkJson  = '';
							if($ga_i == 1){
							if ( ! empty( $galleries ) ) {

								foreach ( $galleries as $single ) {
									$linkJson .= '{"src" :' . '"' . wp_get_attachment_url( $single ) . '"' . '},';
								}
								$linkJson = rtrim( $linkJson, ',' );


							
								?>							
							<li><a href="" title="<?php echo esc_html__( 'GALLERY', 'caleader-core' ); ?>"
									class="tooltip tt-btn-zomm" data-gallary='[<?php echo $linkJson; ?>]'><i
										class="icon-photo-camera"></i></a></li>
								<?php
							}
							}
							if( $comp_i == 1){
							?>
							<li>
								<?php
								$product_id = get_the_ID();
								echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '"  page = "archive" device="decstop"]' );
								?>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="tt-wrapper-description">
						<div class="tt-row-01">
							<div class="tt-box-title">
								<h2 class="tt-title"><a
										href="<?php the_permalink(); ?>"><?php echo carleader_listings_title(); ?></a>
								</h2>
								<div class="tt-description">
									<a href="<?php the_permalink(); ?>">
										<?php
										echo carleader_listings_description();
										?>
									</a>

								</div>
							</div>
							<div class="tt-box-price">
								<?php
								if ( $price != 0 && $status != 'sold_out' ) {
									?>
								<span class="tt-text"><?php echo esc_html__( 'MSRP:', 'caleader-core' ); ?></span>
								<span class="tt-price">
									<?php
									echo carleader_listings_price( $price );
									?>
								</span>
								<span class="tt-old-price">
									<?php
									if ( ! empty( $old_price ) ) {
										echo carleader_listings_price( $old_price );
									}
									?>
								</span>
											<?php if ( ! empty( $est_loan ) ) { ?>
								<span class="tt-info"><?php echo esc_html__( 'Estimated Loan:', 'caleader-core' ); ?>
									<span><?php echo carleader_listings_price( $est_loan ); ?><?php echo esc_html__( '/mo', 'caleader-core' ); ?></span></span>
								<?php } ?>
								<?php } else { ?>
								<span
									class="tt-info-price"><?php echo esc_html__( 'Request', 'caleader-core' ); ?></span>
								<?php } ?>
							</div>
							<div class="tt-box-info">
								<?php if ( isset( $miles ) && $miles != '' ) { ?>
								<div class="item">
									<i class="icon-road"></i>
									<span class="tt-text"><?php echo $miles; ?></span>
								</div>
								<?php } ?>
								<?php if ( isset( $fuel_type ) && $fuel_type != '' ) { ?>
								<div class="item">
									<i class="icon-565374"></i>
									<span class="tt-text"><?php echo $fuel_type; ?></span>
								</div>
								<?php } ?>
								<?php if ( isset( $transmission ) && $transmission != '' ) { ?>
								<div class="item">
									<i class="icon-2087677"></i>
									<span class="tt-text"><?php echo $transmission; ?></span>
								</div>
								<?php } ?>
							</div>
						</div>
						<ul class="tt-icon">
							<?php if ( $test_drive_button ) { ?>
							<li><a href="JavaScript:void(0)" data-toggle="modal" data-target="#modalAddTestDrive"
									title="<?php echo $test_drive; ?>" class="tooltip"><i
										class="icon-testdrive"></i></a></li>

							<?php
							}
							$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
							$linkJson  = '';
							if($ga_i == 1){
							if ( ! empty( $galleries ) ) {

								foreach ( $galleries as $single ) {
									$linkJson .= '{"src" :' . '"' . wp_get_attachment_url( $single ) . '"' . '},';
								}
								$linkJson = rtrim( $linkJson, ',' );
							}
							?>
							<?php if ( ! empty( $galleries ) ) { ?>
							<li><a href="" title="<?php echo esc_html__( 'GALLERY', 'caleader-core' ); ?>"
									class="tooltip tt-btn-zomm" data-gallary='[<?php echo $linkJson; ?>]'><i
										class="icon-photo-camera"></i></a></li>
							<?php }
							}
							if( $comp_i == 1){
							 ?>
							<li>
								<?php
								$product_id = get_the_ID();
								echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '"  page = "archive" device="mobile"]' );
								?>
							</li>
							<?php } ?>
						</ul>
						<div class="tt-btn">
							<a href="<?php the_permalink(); ?>"
								class="tt-btn-moreinfo"><?php echo esc_html__( 'more info', 'caleader-core' ); ?></a>
						</div>
					</div>
				</div>
			</div>
					<?php

				}
			}
			?>

		</div>
	</div>
</div>

		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new CarleaderProductList() );
?>
