<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
class CarsadaFeaturedProducts extends Widget_Base {

	public function get_name() {
		return 'carsada_product_list';
	}
	public function get_title() {
		return esc_html__( 'Carsada Product List', 'caleader-core' );
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
			'select_dots',
			[
				'label'   => esc_html__( 'Slick Dots', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( 'With Dots', 'caleader-core' ),
					'2' => esc_html__( 'Without Dots', 'caleader-core' ),

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
					'col-lg-6' => __( '2', 'cameron-core' ),
					'col-lg-4' => __( '3', 'cameron-core' ),
					'col-lg-3' => __( '4', 'cameron-core' ),
				],
				'default' => 'col-lg-3',

			]
		);

		$this->add_control(
			'select_query',
			[
				'label'   => esc_html__( 'Select Query', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( 'All Products', 'caleader-core' ),
					'2' => esc_html__( 'Featured Products', 'caleader-core' ),
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
				'default' => 2000,
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
		$select_dots       = $settings['select_dots'];

		$slider_class = 'featured-carousel-col-3';

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
					'key'     => '_carleader_listing_featured',
					'value'   => '1',
					'compare' => '==',
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

	<style>
		.tt-filter-nav {
			gap: 10px;
		}

		<?php
			if ($select_dots == 2) { ;?>
			.tt-slider-product.slick-slider .slick-dots {
				display: none !important;
				margin: 0 !important;
				padding: 0 !important;
			}
		<?php } ;?>

		.slick-filter-add {animation: fadeIn}

		.tt-portfolio-masonry .tt-filter-nav .button {
			font-family: 'Exo 2';
			color: #313131;
			font-weight: 700;
			font-size: 18px;
			line-height: 30px;
			padding: 0;
			letter-spacing: 0px;
		}

		.tt-arrow-center .slick-prev, .tt-arrow-center .slick-next {
			margin-top: 0 !important;
			top: 50%;
    		transform: translateY(-50%);

			border-radius: 50%;
			background: rgb(113 126 149 / 50%);
			color: #fff;
    		border: 0;

			width: 56px;
			height: 56px;
		}

		.tt-arrow-center .slick-prev:hover, .tt-arrow-center .slick-next:hover {
			background: rgb(90 101 120 / 50%);
		}

		.tt-arrow-center .slick-prev:before, .tt-arrow-center .slick-next:before { 
			position: absolute;
			left: 0;
			right: 0;
			content: url("data:image/svg+xml,%0A%3Csvg width='25' height='25' viewBox='0 0 25 25' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.3415 4.80255C9.0486 4.50965 9.0486 4.03478 9.3415 3.74189C9.63439 3.44899 10.1093 3.44899 10.4022 3.74189L9.3415 4.80255ZM17.8718 12.2722L18.4022 11.7419C18.695 12.0348 18.695 12.5097 18.4022 12.8025L17.8718 12.2722ZM10.4022 20.8025C10.1093 21.0954 9.63439 21.0954 9.3415 20.8025C9.0486 20.5097 9.0486 20.0348 9.3415 19.7419L10.4022 20.8025ZM10.4022 3.74189L18.4022 11.7419L17.3415 12.8025L9.3415 4.80255L10.4022 3.74189ZM18.4022 12.8025L10.4022 20.8025L9.3415 19.7419L17.3415 11.7419L18.4022 12.8025Z' fill='white'/%3E%3C/svg%3E%0A");
		}

		.tt-arrow-center .slick-prev:before {
			top: 46%;
			transform: translateY(-50%) rotate(180deg);
		}

		.tt-arrow-center .slick-next:before {
			top: 53%;
			transform: translateY(-50%);
		}

		.tt-product-02 .tt-box-price .price-amount {
			font-size: 25.93px !important;
			font-weight: 700;
			font-family: 'Exo 2';
			padding-left: 7px;
			line-height: 38.9px;
		}

		.tt-box-title > .tt-description {
			display: block !important;
		}

		.tt-product-02 .badge {
			border-radius: 4px;
			font-weight: 700;
			font-size: 14px;
			line-height: 17px;
			margin-bottom: 12.64px;
		}

		.tt-product-02 .tt-title a {
			line-height: 30px;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-title .tt-title, .tt-product-02 .tt-wrapper-description .tt-box-title .tt-description {
			font-size: 23px !important;
			line-height: 34.58px !important;
			font-weight: 400 !important;
			font-family: 'Exo 2' !important;
		}

		.product-list-addon-class {
			margin-top: 0;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-info {
			height: auto;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-info .item {
			padding: 18px 10px !important;
			line-height: 1;
			height: auto;
			gap: 6px;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-info .item i+.tt-text {
			font-size: 20.17px !important;
    		line-height: 24.2px;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-info .item i {
			font-size: 28px;
			color: #8E8E93;
		}

		.tt-product-02 .tt-wrapper-description .tt-box-info .item .tt-text {
			line-height: 24px;
    		font-size: 18px !important;
		}

		.tt-product-02 .tt-image-box {
			border-radius: 8px 8px 0 0;
		}

		.featured-carousel-col-3 .tt-product-02 {
			border-radius: 8px;
		}

		@media (max-width: 575px) {
			.tt-portfolio-masonry .tt-filter-nav {
				-webkit-flex-direction: row;
				-ms-flex-direction: row;
				flex-direction: row;
			}
		}

		.slick-list {
			height: 100% !important;
		}

		@media (max-width: 425px) {
			.tt-custom-bg-text {
				font-size: 4.5em;
    			margin-top: -22px;
			}
		}

		@media (min-width: 576px) {
			.tt-custom-bg-text {
				font-size: 5.5em;
    			margin-top: -42px;
			}
		}

		@media (min-width: 1024px) {
			.tt-product-02 .tt-wrapper-description .tt-box-info .item .tt-text {
				line-height: 24px;
				font-size: 14px !important;
			}

			.tt-product-02 .tt-wrapper-description .tt-box-title .tt-title, .tt-product-02 .tt-wrapper-description .tt-box-title .tt-description {
				font-size: 20px !important;
			}
		}

		@media (min-width: 1200px) {

			.tt-custom-bg-text {
				font-size: 128px;
				margin-top: -50px;
			}

			.tt-product-02 .tt-wrapper-description .tt-box-info .item .tt-text {
				line-height: 24px;
				font-size: 20px !important;
			}

			.tt-product-02 .tt-wrapper-description .tt-box-title .tt-title, .tt-product-02 .tt-wrapper-description .tt-box-title .tt-description {
				font-size: 23px !important;
			}
		}


	</style>
	<div>
		<div class="container">
			<div class="portfolio-masonry-layout">
				<div class="tt-portfolio-masonry">
					<div class="tt-filter-nav">
						<div class="button active" data-filter="">All (<span>0</span>)</div> 
						<div class="button" data-filter="NEW">New (<span>0</span>)</div> 
						<div class="button" data-filter="USED">Used (<span>0</span>)</div> 
					</div>
				</div>
			</div>
			<div class="<?php echo esc_attr( $slider_class ); ?> tt-slider-product tt-arrow-center slick-alignment-arrows">
				<?php
				$loop = new WP_Query( $args );
				?>

				<input type="hidden" id="interested_slider_result" value="<?php echo $posts_per_page; ?>">

				<?php
				if ( $loop->have_posts() ) {
					$used = 0;
					$new = 0;
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
						

						if ($status == 'USED') $used ++;
						else if($status == 'NEW') $new ++;
						
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
				<div data-status="<?=$status;?>" class="tt-col-item product-list-addon-class
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
								<span class="tt-data">
									<?php echo carleader_listings_miles( $miles ); ?>
								</span>
							</a>
						</div>
						<div class="tt-wrapper-description">
							<div class="tt-row-01">
								<div class="tt-box-title">
									
									<span class="badge badge-dark"><?=strtoupper($status);?></span>

									<h2 class="tt-title"><a
											href="<?php the_permalink(); ?>"><?php echo carsada_listings_title(get_the_ID()); ?></a>
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
										<div><i class="icon-road"></i></div>
										
										<div class="tt-text"><?php echo $miles; ?></div>
									</div>
									<?php } ?>
									<?php if ( isset( $fuel_type ) && $fuel_type != '' ) { ?>
									<div class="item">
										<div><i class="icon-565374"></i></div>
										
										<div class="tt-text"><?php echo $fuel_type; ?></div>
									</div>
									<?php } ?>
									<?php if ( isset( $transmission ) && $transmission != '' ) { ?>
									<div class="item">
										<div><i class="icon-2087677"></i></div>
										
										<div class="tt-text"><?php echo $transmission; ?></div>
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
		

		<script>
			jQuery('document').ready(function() {
				jQuery('.tt-filter-nav [data-filter="NEW"] span').html('<?=$new;?>');
				jQuery('.tt-filter-nav [data-filter="USED"] span').html('<?=$used;?>');
				jQuery('.tt-filter-nav [data-filter=""] span').html('<?=$new+$used;?>');


				jQuery('.tt-filter-nav [data-filter]').on('click', function() {
					const filter = jQuery(this).data('filter');
					jQuery('.tt-filter-nav [data-filter]').removeClass('active');
					jQuery(this).addClass('active');

					jQuery('.featured-carousel-col-3').slick('slickUnfilter');
					if (filter != '') jQuery('.featured-carousel-col-3').slick('slickFilter','[data-status="' + filter + '"]');
					center(filter);
				});

				function center(filter = 'ALL') {
					const count = jQuery('.tt-filter-nav [data-filter="' + filter + '"] span').text();
					if (Number(count) <= 2) jQuery('.slick-track').addClass('mx-auto');
					else jQuery('.slick-track').removeClass('mx-auto');
				}

				jQuery('.featured-carousel-col-3').not('.slick-initialized').slick({
					dots: false,
					arrows: true,
					infinite: true,
					speed: 500,
					slidesToShow: 3,
					slidesToScroll: 1,
					adaptiveHeight: true,
					autoplay: true,
					// variableWidth: true,
					autoplaySpeed: 6000,
					responsive: [{
							breakpoint: 1370,
							settings: {
								arrows: false,
							}
						},
						{
							breakpoint: 1229,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 1,
								arrows: false,
							}
						},
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
								arrows: false,
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
								arrows: false,
							}
						}
					]
				});

				center();
			});
		</script>

		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new CarsadaFeaturedProducts() );
?>
