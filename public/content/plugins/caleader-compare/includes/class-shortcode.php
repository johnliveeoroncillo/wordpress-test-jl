<?php
class CompareShortCode {

	public function __construct() {
		add_shortcode( 'caleader_compare_result', [ $this, 'compare_result' ] );
	}

	public function compare_result( $atts ) {

		if ( isset( $_SESSION['products'] ) || isset( $_POST['tDta'] ) ) {

			?>
	<div class="container-inner section-wrapper-01">
	
		<div class="tt-compare-table02" id="tt-compare-table02">
			<div class="tt-col-title">
				<div class="title-item js_one-height-01"></div>
				<div class="title-item js_one-height-02">
			<?php echo esc_html__( 'FUEL TYPE:', 'caleader-compare' ); ?>
				</div>
				<div class="title-item js_one-height-03">
			<?php echo esc_html__( 'TRANSMission:', 'caleader-compare' ); ?>
				</div>
				<div class="title-item js_one-height-04">
			<?php echo esc_html__( 'Int. Color:', 'caleader-compare' ); ?>
				</div>
				<div class="title-item js_one-height-05">
			<?php echo esc_html__( 'Drive Type:', 'caleader-compare' ); ?>
				</div>
				<div class="title-item js_one-height-06">
			<?php echo esc_html__( 'Car Milage:', 'caleader-compare' ); ?>
				</div>
				<div class="title-item js_one-height-07"></div>
			</div>
			<?php
			if ( ! empty( $_POST['tDta'] ) ) {
				$td = $_POST['tDta'];
			} else {
				$td = '';
			}
			$_SESSION['products'][] = $td;
			$_SESSION['products']   = array_unique( $_SESSION['products'] );
			$args                   = array(
				'post_type' => 'carleader-listing',
				'post__in'  => $_SESSION['products'],
			);
			$query                  = new WP_Query( $args );

			$compare_size = count( $query->posts );

			?>
	
			<div class="tt-col-item">
				<div class="compare-init-slider">
					<input class="compare-slider-size" type="hidden" value="<?php echo $compare_size; ?>">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$status       = carleader_listings_meta( 'condition' );
				$curent_time  = current_time( 'd' );
				$post_time    = get_the_date( 'd' );
				$diff_time    = $curent_time - $post_time;
				$dataId       = get_the_ID();
				$miles        = carleader_listings_meta( 'miles' );
				$price        = carleader_listings_meta( 'price' );
				$old_price    = carleader_listings_meta( 'old_price' );
				$fuel_type    = carleader_listings_meta( 'model_engine_fuel' );
				$transmission = carleader_listings_meta( 'model_transmission_type' );
				$drive        = carleader_listings_meta( 'model_drive' );
				$color        = carleader_listings_meta( 'color' );
				$sku          = '';
				$qntyty       = '';
				$title        = '';
				if ( $drive == 'awd' ) {
					$drive = esc_html__( 'ALL-WHEEL DRIVE', 'carleader-listings' );
				} elseif ( $drive == 'fwd' ) {
					$drive = esc_html__( 'FOUR-WHEEL DRIVE', 'carleader-listings' );
				} elseif ( $drive == 'frwd' ) {
					$drive = esc_html__( 'FRONT-WHEEL DRIVE', 'carleader-listings' );
				} elseif ( $drive == 'rwd' ) {
					$drive = esc_html__( 'REAR-WHEEL DRIVE', 'carleader-listings' );
				}

				if ( $transmission == 'at' ) {
					$transmission = esc_html__( 'Automatic', 'carleader-listings' );
				} elseif ( $transmission == 'mt' ) {
					$transmission = esc_html__( 'Manual', 'carleader-listings' );
				} elseif ( $transmission == 'am' ) {
					$transmission = esc_html__( 'Automated', 'carleader-listings' );
				} elseif ( $transmission == 'cvt' ) {
					$transmission = esc_html__( 'Variable', 'carleader-listings' );
				}

				if ( $fuel_type == 'gas' ) {
					$fuel_type = esc_html__( 'Gasoline', 'carleader-listings' );
				} elseif ( $fuel_type == 'diesel' ) {
					$fuel_type = esc_html__( 'Diesel', 'carleader-listings' );
				} elseif ( $fuel_type == 'cng' ) {
					$fuel_type = esc_html__( 'CNG', 'carleader-listings' );
				} elseif ( $fuel_type == 'lp' ) {
					$fuel_type = esc_html__( 'LP', 'carleader-listings' );
				} elseif ( $fuel_type == 'bdiesel' ) {
					$fuel_type = esc_html__( 'Bio-diesel', 'carleader-listings' );
				} elseif ( $fuel_type == 'ethanol' ) {
					$fuel_type = esc_html__( 'Ethanol', 'carleader-listings' );
				}

				?>
					<div class="tt-item">
						<div class="tt-image-box js_one-height-01">
							<a href="#" class="tt-remove-item js-remove-item item-close" tabindex="0"></a>
							<div id="divid" class="pidclass" style="display: none;"><?php echo get_the_ID(); ?></div>
							<a href="<?php the_permalink(); ?>" class="tt-img">
				<?php the_post_thumbnail(); ?>
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
										class="tt-label-info02"><?php echo esc_html__( 'Just Arrived:', 'caleader-compare' ); ?></span>
					<?php } ?>
					<?php if ( ! empty( $hp ) ) { ?>
									<span class="tt-label-info">
						<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-compare' ); ?>
									</span>
					<?php } ?>
								</span>
				<?php } elseif ( $status == 'sold_out' ) { ?>
								<span class="tt-label-custom"><i class="icon-soldout"></i></span>
					<?php
				} else {
					$promo = carleader_listings_meta( 'promo' );
					if ( $promo == '1' ) {
						?>
								<span class="tt-label-location">
									<span class="tt-label-promo">
						<?php echo esc_html__( 'Great Deal!', 'caleader-compare' ); ?>
									</span>
						<?php if ( ! empty( $hp ) ) { ?>
									<span class="tt-label-info">
							<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-compare' ); ?>
									</span>
						<?php } ?>
								</span>
						<?php
					}
				}
				?>
							</a>
							<div class="tt-box-price">
								<span class="tt-price"><?php echo carleader_listings_price( $price ); ?></span>
				<?php if ( $old_price != '' ) { ?>
								<span class="tt-old-price"><?php echo carleader_listings_price( $old_price ); ?></span>
				<?php } ?>
							</div>
						</div>
						<div class="tt-value js_one-height-02">
				<?php echo $fuel_type; ?>
						</div>
						<div class="tt-value  js_one-height-03">
				<?php echo $transmission; ?>
						</div>
						<div class="tt-value  js_one-height-04">
				<?php echo $color; ?>
						</div>
						<div class="tt-value  js_one-height-05">
				<?php echo $drive; ?>
						</div>
						<div class="tt-value  js_one-height-06">
				<?php echo carleader_listings_miles( $miles ); ?>
						</div>
						<div class="tt-value  js_one-height-07">
							<a href="javascript:void(0)" class="tt-btn-addtocart add-to-cart-custom"
								data-price="<?php echo $price; ?>" data-id="<?php echo $dataId; ?>"
								data-quantity="<?php echo $qntyty; ?>" data-product_id="<?php echo $dataId; ?>"
								data-product_sku="<?php echo $sku; ?>" data-service-title="<?php echo $title; ?>"
								id="target-btn-1"><?php echo esc_html__( 'Add To Cart', 'caleader-compares' ); ?></a>
						</div>
					</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
	
				</div>
			</div>
		</div>
	</div>
			<?php
		} else {
			?>
	<div class="container-inner section-wrapper-01">
	
		<div class="tt-compare-table02" id="tt-compare-table02">
			<div class="not-found-compare">
			<?php
			$msg = Caleader_Compare_ClassGeneral::carleader_compare_option( 'compare_not_found' );
			echo $msg;
			?>
			</div>
		</div>
	</div>
	
			<?php
		}
	}
}
new CompareShortCode();
