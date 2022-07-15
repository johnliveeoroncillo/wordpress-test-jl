<?php
$archive_layout = carleader_listings_option( 'archive_layout' );

$archive_style = carleader_listings_option( 'archive_style' );


$test_drive        = carleader_listings_option( 't_drive_bt' );
$test_drive_button = carleader_listings_option( 'test_drive_button' );


if ( ! isset( $test_drive_button ) || $test_drive_button == '' ) {
	$test_drive_button = false;

}

if ( ! isset( $test_drive ) || $test_drive == '' ) {
	$test_drive = esc_html__( 'test drive', 'caleader-listing' );

}
$test_drive = strtoupper( str_replace( ' ', '-', $test_drive ) );

if ( ! isset( $archive_style ) || $archive_style == '' || is_single() ) {
	$archive_style = 'grid';
}
if ( ! isset( $archive_layout ) || $archive_layout == '' ) {
	$archive_layout = 1;
}
if ( isset( $_GET['layout'] ) && $_GET['layout'] != '' ) {
	$archive_layout = $_GET['layout'];
}

if ( ! isset( $ga_i ) || $ga_i == '' ) {
	$ga_i = false;
}

if ( ! isset( $comp_i ) || $comp_i == '' ) {
	$comp_i = false;
}

if ( isset( $_GET['showstyle'] ) ) {
	if ( $_GET['showstyle'] != '' ) {
		$archive_style = $_GET['showstyle'];
	}
}

 $class = 'col-6 col-md-4 tt-col-item';
if ( $archive_layout == '2' ) {
	$class = 'col-6 col-md-4 col-lg-3 tt-col-item';
}
	$status       = carleader_listings_meta( 'condition' );
	$make         = carleader_listings_meta( 'make_display' );
	$curent_time  = current_time( 'd' );
	$post_time    = get_the_date( 'd' );
	$diff_time    = $curent_time - $post_time;
	$miles        = carleader_listings_meta( 'miles' );
	$model_name   = carleader_listings_meta( 'model_name' );
	$price        = carleader_listings_meta( 'price' );
	$old_price    = carleader_listings_meta( 'old_price' );
	$fuel_type    = carleader_listings_meta( 'model_engine_fuel' );
	$transmission = carleader_listings_meta( 'model_transmission_type' );
	$drive        = carleader_listings_meta( 'drivetrain' );
	$color        = carleader_listings_meta( 'color' );
	$int_color    = carleader_listings_meta( 'int_color' );
	$vin          = carleader_listings_meta( 'vin' );
	$engine       = carleader_listings_meta( 'engine' );
	$stock        = carleader_listings_meta( 'stock' );
	$hp           = carleader_listings_meta( 'hp' );
	$est_loan     = carleader_listings_meta( 'loan_payment' );
	$ga_i 		  = carleader_listings_option( 'ga_i' );
	$comp_i		  = carleader_listings_option( 'comp_i' );

if ( $drive == 'awd' ) {
	$drive = esc_html__( 'All-Wheel Drive', 'caleader-listing' );
} elseif ( $drive == 'fwd' ) {
	$drive = esc_html__( 'Four-Wheel Drive', 'caleader-listing' );
} elseif ( $drive == 'frwd' ) {
	$drive = esc_html__( 'Front-Wheel Drive', 'caleader-listing' );
} elseif ( $drive == 'rwd' ) {
	$drive = esc_html__( 'Rear-Wheel Drive', 'caleader-listing' );
} else {
	$drive = str_replace( '_', ' ', ucwords( $drive ) );
}

if ( $transmission == 'at' ) {
	$transmission = esc_html__( 'Automatic', 'caleader-listing' );
} elseif ( $transmission == 'mt' ) {
	$transmission = esc_html__( 'Manual', 'caleader-listing' );
} elseif ( $transmission == 'am' ) {
	$transmission = esc_html__( 'Automated', 'caleader-listing' );
} elseif ( $transmission == 'cvt' ) {
	$transmission = esc_html__( 'Variable', 'caleader-listing' );
} else {
	$transmission = str_replace( '_', ' ', ucwords( $transmission ) );
}

if ( $fuel_type == 'gas' ) {
	$fuel_type = esc_html__( 'Gasoline', 'caleader-listing' );
} elseif ( $fuel_type == 'diesel' ) {
	$fuel_type = esc_html__( 'Diesel', 'caleader-listing' );
} elseif ( $fuel_type == 'cng' ) {
	$fuel_type = esc_html__( 'CNG', 'caleader-listing' );
} elseif ( $fuel_type == 'lp' ) {
	$fuel_type = esc_html__( 'LP', 'caleader-listing' );
} elseif ( $fuel_type == 'bdiesel' ) {
	$fuel_type = esc_html__( 'Bio-diesel', 'caleader-listing' );
} elseif ( $fuel_type == 'ethanol' ) {
	$fuel_type = esc_html__( 'Ethanol', 'caleader-listing' );
} elseif ( $fuel_type == 'petrol' ) {
	$fuel_type = esc_html__( 'Petrol', 'caleader-listing' );
} else {
	$fuel_type = str_replace( '_', ' ', ucwords( $fuel_type ) );
}

?>
<div class="<?php echo esc_attr( $class ); ?>">
	<div class="tt-product-02 
	<?php
	if ( $archive_style == 'list' ) {
		echo 'tt-view';
	}
	?>
	<?php
	if ( $status == 'sold_out' ) {
		echo 'tt-not-hover';
	}
	?>
">
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
						class="tt-label-info02"><?php echo esc_html__( 'Just Arrived:', 'caleader-listing' ); ?></span>
					<?php } ?>
					<?php if ( ! empty( $hp ) ) { ?>
					<span class="tt-label-info">
						<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-listing' ); ?>
					</span>
					<?php } ?>
				</span>
					<?php
				} elseif ( $status == 'sold_out' ) {
					$sold_out_badge = carleader_listings_option( 'sold_out_badge' );
					if ( $sold_out_badge != '' ) {
						$sold_out_badge = wp_get_attachment_url( $sold_out_badge[0] );
						?>
				<span class="tt-label-custom"><img class="img-sold-out" src="<?php echo esc_url( $sold_out_badge ); ?>"
						alt="<?php echo esc_html__( 'Related Header Image', 'caleader-listing' ); ?>"> </span>
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
						<?php echo esc_html__( 'Great Deal!', 'caleader-listing' ); ?>
					</span>
						<?php if ( ! empty( $hp ) ) { ?>
					<span class="tt-label-info">
							<?php echo $hp; ?> <?php echo esc_html__( 'HP:', 'caleader-listing' ); ?>
					</span>
					<?php } ?>
				</span>
						<?php
					}
				}
				?>
<?php if ( isset( $miles ) && $miles != '' ) { ?>
				<span class="tt-data">
					<?php echo carleader_listings_miles( $miles ); ?>
				</span>
<?php } ?>
			</a>
			<ul class="tt-icon">
				<?php if ( $test_drive_button ) { ?>
				<li><a href="JavaScript:void(0)" data-toggle="modal" data-target="#modalAddTestDrive"
						title="<?php echo $test_drive; ?>" class="tooltip"><i class="icon-testdrive"></i></a></li>
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
				<li><a href="" title="<?php echo esc_html__( 'GALLERY', 'caleader-listing' ); ?>"
						class="tooltip tt-btn-zomm" data-gallary='[<?php echo $linkJson; ?>]'><i
							class="icon-photo-camera"></i></a></li>
					<?php
				}
			}
				?>
				<?php
				if( $comp_i == 1){
				if ( class_exists( 'CompareElement' ) ) {
					?>
				<li>
					<?php
					$product_id = get_the_ID();
					echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '"  page = "archive" device="decstop"]' );
					?>
				</li>
			<?php } }?>
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
					<span class="tt-text"><?php echo esc_html__( 'MSRP:', 'caleader-listing' ); ?></span>
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
					<span class="tt-info"><?php echo esc_html__( 'Estimated Loan:', 'caleader-listing' ); ?>
						<span><?php echo carleader_listings_price( $est_loan ); ?><?php echo esc_html__( '/mo', 'caleader-listing' ); ?></span></span>
					<?php } ?>
					<?php } else { ?>
					<span class="tt-info-price"><?php echo esc_html__( 'Request', 'caleader-listing' ); ?></span>
					<?php } ?>
				</div>
				<div class="tt-box-info">
					<?php
					if ( isset( $miles ) && $miles != '' ) {
						$miles_icon = carleader_listings_option( 'miles_icon' );
						if ( ! isset( $miles_icon ) || $miles_icon == '' ) {
							$miles_icon = 'icon-road';
						} elseif ( $miles_icon == 'none' ) {
							$miles_icon = '';
						}
						?>
						
					<div class="item">
						<i class="<?php echo esc_attr( $miles_icon ); ?>"></i>
						<span class="tt-text"><?php echo carleader_listings_miles( $miles, false ); ?></span>
					</div>
					<?php } ?>
					<?php
					if ( isset( $fuel_type ) && $fuel_type != '' ) {

						$fuel_icon = carleader_listings_option( 'fuel_icon' );
						if ( ! isset( $fuel_icon ) || $fuel_icon == '' ) {
							$fuel_icon = 'icon-565374';
						} elseif ( $fuel_icon == 'none' ) {
							$fuel_icon = '';
						}
						?>

					<div class="item">
						<i class="<?php echo esc_attr( $fuel_icon ); ?>"></i>
						<span class="tt-text"><?php echo $fuel_type; ?></span>
					</div>
					<?php } ?>
					<?php
					if ( isset( $transmission ) && $transmission != '' ) {
						$trans_icon = carleader_listings_option( 'trans_icon' );
						if ( ! isset( $trans_icon ) || $trans_icon == '' ) {
							$trans_icon = 'icon-2087677';
						} elseif ( $trans_icon == 'none' ) {
							$trans_icon = '';
						}
						?>
					<div class="item">
						<i class="<?php echo esc_attr( $trans_icon ); ?>"></i>
						<span class="tt-text"><?php echo $transmission; ?></span>
					</div>
					<?php } ?>
				</div>
			</div>
			<ul class="tt-icon">
				<li><a href="JavaScript:void(0)" data-toggle="modal" data-target="#modalAddTestDrive"
						title="<?php echo $test_drive; ?>" class="tooltip"><i class="icon-testdrive"></i></a></li>
				<?php
				$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
				 $linkJson = '';
				 if($ga_i == 1){
				if ( ! empty( $galleries ) ) {

					foreach ( $galleries as $single ) {
						$linkJson .= '{"src" :' . '"' . wp_get_attachment_url( $single ) . '"' . '},';
					}
					$linkJson = rtrim( $linkJson, ',' );
				}
				?>
				<?php if ( ! empty( $galleries ) ) { ?>
				<li><a href="" title="<?php echo esc_html__( 'GALLERY', 'caleader-listing' ); ?>"
						class="tooltip tt-btn-zomm" data-gallary='[<?php echo $linkJson; ?>]'><i
							class="icon-photo-camera"></i></a></li>
				<?php } }?>

				<?php
				if( $comp_i == 1){
				if ( class_exists( 'CompareElement' ) ) {
					?>
				<li>
					<?php
					$product_id = get_the_ID();
					echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '"  page = "archive" device="mobile"]' );
					?>
				</li>
			<?php } }?>


			</ul>
			<div class="tt-row-02">
				<ul class="tt-add-info">
					<?php if ( isset( $fuel_type ) && $fuel_type != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Fuel Type:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $fuel_type; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $transmission ) && $transmission != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Transmission:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $transmission; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $color ) && $color != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Color:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $color; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $drive ) && $drive != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Drive Type:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $drive; ?></span>
					</li>
					<?php } ?>
				</ul>
				<?php
				if ( $archive_layout == '2' ) {
					?>
				<ul class="tt-add-info">
					<?php if ( isset( $int_color ) && $int_color != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Int. Color:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $int_color; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $vin ) && $vin != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'VIN:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $vin; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $engine ) && $engine != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Engine:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $engine; ?></span>
					</li>
					<?php } ?>
					<?php if ( isset( $stock ) && $stock != '' ) { ?>
					<li>
						<span class="col-title"><?php echo esc_html__( 'Stock Number:', 'caleader-listing' ); ?></span>
						<span class="col-designation"><?php echo $stock; ?></span>
					</li>
					<?php } ?>
				</ul>
					<?php
				}
				?>
			</div>
			<div class="tt-btn">
				<a href="<?php the_permalink(); ?>"
					class="tt-btn-moreinfo"><?php echo esc_html__( 'more info', 'caleader-listing' ); ?></a>
			</div>
		</div>
	</div>
</div>
