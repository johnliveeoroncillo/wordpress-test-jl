<?php
$is_child = get_post_meta(get_the_ID(), 'car_variant_parent_car', true);
if ($is_child) return;

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

$condition = isset($_GET['condition'])? $_GET['condition'] : 'ALL';
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
		<?php $hast_thumbnail = has_post_thumbnail(get_the_ID()) ?>
		<div class="tt-image-box d-flex" style="background-color: <?= $hast_thumbnail? '#222' : '#C4C4C4' ?>">			
			<a href="<?php the_permalink(); ?>" class="tt-img align-self-center mx-auto" style="background-color: <?= $hast_thumbnail? '#222' : '#C4C4C4; position: unset;' ?>">
				<?php if($hast_thumbnail): ?>
					<?php the_post_thumbnail( 'archive_listing' ) ?>
				<?php else: ?>
					<svg width="99" height="65" viewBox="0 0 99 65" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M97.5032 19.4368C97.1926 18.5142 96.5716 17.9914 95.609 17.9914C92.6591 17.9606 89.7402 17.9606 86.8213 17.9914C85.8587 17.9914 85.2066 18.5142 84.8961 19.4061C84.7408 19.8366 84.6166 20.2672 84.4303 20.8823C82.443 15.4387 80.5177 10.1797 78.5925 4.95147C77.4125 1.753 75.0526 0.0615089 71.6369 0.0307544C56.6077 0 41.5786 0 26.5494 0C23.1027 0 20.7427 1.69149 19.5627 4.88996C18.4759 7.84238 17.3891 10.8256 16.3023 13.778C15.4639 16.0846 14.6255 18.3604 13.6939 20.8515C13.5076 20.2364 13.3834 19.8059 13.2592 19.4061C12.9797 18.4834 12.3276 17.9606 11.365 17.9606C8.41508 17.9298 5.4962 17.9298 2.54626 17.9606C1.58365 17.9606 0.931559 18.4834 0.621039 19.4061C0.403676 20.1134 0.217364 20.8515 0 21.5896V23.4964C0.124208 23.9885 0.279468 24.4498 0.403676 24.9419C0.931559 26.7564 1.36629 27.0947 3.32256 27.0947C5.68251 27.0947 8.04246 27.0947 10.4024 27.0947C10.7129 27.0947 10.9924 27.1254 11.3029 27.1562C11.2719 27.3099 11.2719 27.4022 11.2408 27.433C11.1787 27.4945 11.0856 27.556 10.9924 27.5867C8.97402 28.4786 8.13561 30.0778 8.13561 32.1999C8.13561 41.8876 8.13561 51.606 8.13561 61.2936C8.13561 63.2004 8.97402 64 10.8682 64.0308C14.2218 64.0308 17.5754 64.0308 20.929 64.0308C22.8232 64.0308 23.6616 63.2004 23.6616 61.2936C23.6926 59.11 23.6616 56.9265 23.6616 54.7429V51.2062H74.3695V52.2826C74.3695 55.2042 74.3695 58.1567 74.3695 61.1091C74.3695 63.2311 75.1768 64.0308 77.3194 64.0308C80.5488 64.0308 83.7782 64.0308 86.9766 64.0308C89.1191 64.0308 89.8954 63.2311 89.9265 61.1091C89.9265 58.0951 89.9265 55.112 89.9265 52.098C89.9265 45.5166 89.9265 38.9659 89.9265 32.3844C89.9265 30.2009 89.1502 28.5094 87.0697 27.5867C86.9455 27.5252 86.8523 27.4022 86.5729 27.1562C87.0697 27.1254 87.3492 27.0947 87.6597 27.0947C90.1439 27.0947 92.628 27.0947 95.1122 27.0947C96.5406 27.0947 97.0684 26.6334 97.5342 25.3109C98.2795 23.3119 98.1553 21.3743 97.5032 19.4368ZM20.4322 26.2028C22.5437 20.4517 24.6242 14.7006 26.7047 8.94954C26.9221 8.3037 27.2015 8.08842 27.9157 8.08842C42.0133 8.11917 56.1109 8.11917 70.2085 8.08842C70.7364 8.08842 71.1401 8.08842 71.3574 8.76502C73.5 14.7314 75.7047 20.6977 77.8783 26.6641C77.9404 26.8179 77.9404 26.9409 78.0025 27.1869H20.1217C20.2459 26.7871 20.308 26.4796 20.4322 26.2028ZM28.2262 40.6574C25.1831 40.7189 22.109 40.7189 19.0349 40.6574C16.8302 40.6266 15.3086 39.0274 15.3707 36.9668C15.4328 34.9986 17.0165 33.5223 19.1591 33.4916C20.6496 33.4608 22.1711 33.4916 23.6616 33.4916C25.121 33.4916 26.6115 33.4916 28.071 33.4916C30.2446 33.5223 31.7972 34.9678 31.8593 36.9361C31.9214 39.0274 30.4309 40.6266 28.2262 40.6574ZM79.2446 40.6574C76.0773 40.7496 72.9411 40.7496 69.7738 40.6574C67.6312 40.5959 66.2028 38.9659 66.2959 36.9361C66.358 34.9986 67.9417 33.5839 70.0532 33.5531C71.5437 33.5223 73.0653 33.5531 74.5558 33.5531C76.0463 33.5531 77.5678 33.5223 79.0583 33.5531C81.1698 33.5839 82.7224 35.0293 82.7845 36.9668C82.8466 38.9659 81.3872 40.5959 79.2446 40.6574Z" fill="#6E6E70"/>
					</svg>

				<?php endif ?>
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
				<?php //if ( $test_drive_button ) { ?>
				<!-- <li><a href="JavaScript:void(0)" data-toggle="modal" data-target="#modalAddTestDrive"
						title="<?php echo $test_drive; ?>" class="tooltip"><i class="icon-testdrive"></i></a></li> -->
				<?php //} ?>
				<?php

				// $galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
				// $linkJson  = '';
				
				// if($ga_i == 1){
				// if ( ! empty( $galleries ) ) {

				// 	foreach ( $galleries as $single ) {
				// 		$linkJson .= '{"src" :' . '"' . wp_get_attachment_url( $single ) . '"' . '},';
				// 	}
				// 	$linkJson = rtrim( $linkJson, ',' );

				// 	?>
				<!-- <li><a href="" title="<?php echo esc_html__( 'GALLERY', 'caleader-listing' ); ?>"
						class="tooltip tt-btn-zomm" data-gallary='[<?php echo $linkJson; ?>]'><i
							class="icon-photo-camera"></i></a></li> -->
					<?php
			// 	}
			// }
				?>
				<?php
				// if( $comp_i == 1){
				// if ( class_exists( 'CompareElement' ) ) {
					?>
				<!-- <li> -->
					<?php
					// $product_id = get_the_ID();
					// echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '"  page = "archive" device="decstop"]' );
					?>
				<!-- </li> -->
			<?php //} }?>
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="buy-now"]') ?>" title="Buy Now" class="tooltip">						
						<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7 18C5.9 18 5.01 18.9 5.01 20C5.01 21.1 5.9 22 7 22C8.1 22 9 21.1 9 20C9 18.9 8.1 18 7 18ZM1 2V4H3L6.6 11.59L5.25 14.04C5.09 14.32 5 14.65 5 15C5 16.1 5.9 17 7 17H19V15H7.42C7.28 15 7.17 14.89 7.17 14.75L7.2 14.63L8.1 13H15.55C16.3 13 16.96 12.59 17.3 11.97L20.88 5.48C20.96 5.34 21 5.17 21 5C21 4.45 20.55 4 20 4H5.21L4.27 2H1ZM17 18C15.9 18 15.01 18.9 15.01 20C15.01 21.1 15.9 22 17 22C18.1 22 19 21.1 19 20C19 18.9 18.1 18 17 18Z" fill="white"/>
						</svg>
					</a>
				</li>
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="apply-a-loan"]') ?>" title="Apply for Loan" class="tooltip">						
						<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.57625 4.3105C7.80325 3.71 9.81625 3 12.0192 3C14.1762 3 16.1362 3.6805 17.3567 4.273L17.4257 4.3065C17.7937 4.4885 18.0907 4.6605 18.2997 4.8L16.4527 7.5C20.7107 11.853 23.9997 20.9985 12.0192 20.9985C0.0387449 20.9985 3.23925 12.019 7.53425 7.5L5.69925 4.8C5.84075 4.7075 6.02025 4.6 6.23425 4.486C6.34025 4.429 6.45425 4.37 6.57625 4.3105ZM15.2657 7.464L16.7442 5.3025C15.3692 5.4015 13.7332 5.7245 12.1582 6.1805C11.0332 6.5055 9.78325 6.456 8.62575 6.2425C8.33406 6.18842 8.04438 6.12405 7.75725 6.0495L8.71725 7.463C10.7747 8.1955 13.2077 8.1955 15.2657 7.464ZM8.13975 8.315C10.5472 9.245 13.4407 9.245 15.8482 8.314C16.8532 9.37335 17.6938 10.5772 18.3422 11.8855C19.0182 13.2645 19.3862 14.643 19.3262 15.831C19.2682 16.9775 18.8172 17.957 17.7872 18.685C16.7137 19.4435 14.9082 19.9985 12.0187 19.9985C9.12625 19.9985 7.31225 19.453 6.22875 18.703C5.19125 17.984 4.73575 17.018 4.67125 15.887C4.60375 14.712 4.96375 13.3405 5.63725 11.952C6.27975 10.628 7.17625 9.3535 8.13975 8.315ZM7.56475 4.958C7.96475 5.077 8.38275 5.1805 8.80675 5.259C9.88175 5.457 10.9597 5.486 11.8797 5.2195C12.9519 4.90717 14.0423 4.66154 15.1447 4.484C14.2247 4.207 13.1487 4 12.0187 4C10.2962 4 8.68975 4.4805 7.56475 4.958Z" fill="white"/>
							<path d="M15.6428 12.9644H14.8098C14.8291 12.8583 14.8389 12.7508 14.8392 12.643C14.8384 12.5362 14.8294 12.4296 14.8124 12.3242H15.5972C15.6541 12.3242 15.7086 12.3016 15.7488 12.2614C15.7889 12.2213 15.8115 12.1668 15.8115 12.1099C15.8115 12.0531 15.7889 11.9986 15.7488 11.9584C15.7086 11.9182 15.6541 11.8956 15.5972 11.8956H14.6946C14.5219 11.4786 14.2283 11.1229 13.8517 10.8742C13.475 10.6255 13.0325 10.4952 12.5812 10.5001H10.2857C10.2147 10.5001 10.1466 10.5284 10.0963 10.5786C10.0461 10.6288 10.0179 10.6969 10.0179 10.768V11.893H9.21432C9.15749 11.893 9.10298 11.9155 9.0628 11.9557C9.02261 11.9959 9.00004 12.0504 9.00004 12.1072C9.00004 12.1641 9.02261 12.2186 9.0628 12.2588C9.10298 12.299 9.15749 12.3215 9.21432 12.3215H10.0179V12.9644H9.21432C9.15749 12.9644 9.10298 12.987 9.0628 13.0271C9.02261 13.0673 9.00004 13.1218 9.00004 13.1787C9.00004 13.2355 9.02261 13.29 9.0628 13.3302C9.10298 13.3704 9.15749 13.3929 9.21432 13.3929H10.0179V17.7321C10.0179 17.8032 10.0461 17.8713 10.0963 17.9215C10.1466 17.9718 10.2147 18 10.2857 18C10.3568 18 10.4249 17.9718 10.4751 17.9215C10.5254 17.8713 10.5536 17.8032 10.5536 17.7321V14.7858H12.5812C13.0322 14.7906 13.4742 14.6605 13.8508 14.4124C14.2273 14.1642 14.5212 13.8092 14.6946 13.3929H15.6428C15.6996 13.3929 15.7541 13.3704 15.7943 13.3302C15.8345 13.29 15.8571 13.2355 15.8571 13.1787C15.8571 13.1218 15.8345 13.0673 15.7943 13.0271C15.7541 12.987 15.6996 12.9644 15.6428 12.9644ZM10.5536 11.0358H12.5812C12.8878 11.0324 13.1898 11.1098 13.4569 11.2602C13.7241 11.4107 13.9468 11.629 14.1026 11.893H10.5536V11.0358ZM10.5536 12.3215H14.2687C14.3151 12.5333 14.3151 12.7526 14.2687 12.9644H10.5536V12.3215ZM12.5812 14.2501H10.5536V13.3929H14.1026C13.9468 13.6569 13.7241 13.8752 13.4569 14.0257C13.1898 14.1762 12.8878 14.2536 12.5812 14.2501Z" fill="white"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.57625 4.3105C7.80325 3.71 9.81625 3 12.0192 3C14.1762 3 16.1362 3.6805 17.3567 4.273L17.4257 4.3065C17.7937 4.4885 18.0907 4.6605 18.2997 4.8L16.4527 7.5C20.7107 11.853 23.9997 20.9985 12.0192 20.9985C0.0387449 20.9985 3.23925 12.019 7.53425 7.5L5.69925 4.8C5.84075 4.7075 6.02025 4.6 6.23425 4.486C6.34025 4.429 6.45425 4.37 6.57625 4.3105ZM15.2657 7.464L16.7442 5.3025C15.3692 5.4015 13.7332 5.7245 12.1582 6.1805C11.0332 6.5055 9.78325 6.456 8.62575 6.2425C8.33406 6.18842 8.04438 6.12405 7.75725 6.0495L8.71725 7.463C10.7747 8.1955 13.2077 8.1955 15.2657 7.464ZM8.13975 8.315C10.5472 9.245 13.4407 9.245 15.8482 8.314C16.8532 9.37335 17.6938 10.5772 18.3422 11.8855C19.0182 13.2645 19.3862 14.643 19.3262 15.831C19.2682 16.9775 18.8172 17.957 17.7872 18.685C16.7137 19.4435 14.9082 19.9985 12.0187 19.9985C9.12625 19.9985 7.31225 19.453 6.22875 18.703C5.19125 17.984 4.73575 17.018 4.67125 15.887C4.60375 14.712 4.96375 13.3405 5.63725 11.952C6.27975 10.628 7.17625 9.3535 8.13975 8.315ZM7.56475 4.958C7.96475 5.077 8.38275 5.1805 8.80675 5.259C9.88175 5.457 10.9597 5.486 11.8797 5.2195C12.9519 4.90717 14.0423 4.66154 15.1447 4.484C14.2247 4.207 13.1487 4 12.0187 4C10.2962 4 8.68975 4.4805 7.56475 4.958Z" stroke="white" stroke-width="0.5"/>
							<path d="M15.6428 12.9644H14.8098C14.8291 12.8583 14.8389 12.7508 14.8392 12.643C14.8384 12.5362 14.8294 12.4296 14.8124 12.3242H15.5972C15.6541 12.3242 15.7086 12.3016 15.7488 12.2614C15.7889 12.2213 15.8115 12.1668 15.8115 12.1099C15.8115 12.0531 15.7889 11.9986 15.7488 11.9584C15.7086 11.9182 15.6541 11.8956 15.5972 11.8956H14.6946C14.5219 11.4786 14.2283 11.1229 13.8517 10.8742C13.475 10.6255 13.0325 10.4952 12.5812 10.5001H10.2857C10.2147 10.5001 10.1466 10.5284 10.0963 10.5786C10.0461 10.6288 10.0179 10.6969 10.0179 10.768V11.893H9.21432C9.15749 11.893 9.10298 11.9155 9.0628 11.9557C9.02261 11.9959 9.00004 12.0504 9.00004 12.1072C9.00004 12.1641 9.02261 12.2186 9.0628 12.2588C9.10298 12.299 9.15749 12.3215 9.21432 12.3215H10.0179V12.9644H9.21432C9.15749 12.9644 9.10298 12.987 9.0628 13.0271C9.02261 13.0673 9.00004 13.1218 9.00004 13.1787C9.00004 13.2355 9.02261 13.29 9.0628 13.3302C9.10298 13.3704 9.15749 13.3929 9.21432 13.3929H10.0179V17.7321C10.0179 17.8032 10.0461 17.8713 10.0963 17.9215C10.1466 17.9718 10.2147 18 10.2857 18C10.3568 18 10.4249 17.9718 10.4751 17.9215C10.5254 17.8713 10.5536 17.8032 10.5536 17.7321V14.7858H12.5812C13.0322 14.7906 13.4742 14.6605 13.8508 14.4124C14.2273 14.1642 14.5212 13.8092 14.6946 13.3929H15.6428C15.6996 13.3929 15.7541 13.3704 15.7943 13.3302C15.8345 13.29 15.8571 13.2355 15.8571 13.1787C15.8571 13.1218 15.8345 13.0673 15.7943 13.0271C15.7541 12.987 15.6996 12.9644 15.6428 12.9644ZM10.5536 11.0358H12.5812C12.8878 11.0324 13.1898 11.1098 13.4569 11.2602C13.7241 11.4107 13.9468 11.629 14.1026 11.893H10.5536V11.0358ZM10.5536 12.3215H14.2687C14.3151 12.5333 14.3151 12.7526 14.2687 12.9644H10.5536V12.3215ZM12.5812 14.2501H10.5536V13.3929H14.1026C13.9468 13.6569 13.7241 13.8752 13.4569 14.0257C13.1898 14.1762 12.8878 14.2536 12.5812 14.2501Z" stroke="white" stroke-width="0.5"/>
						</svg>
					</a>
				</li>
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="book-a-visit"]') ?>" title="Book a Visit" class="tooltip">						
						<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V8H20V21Z" fill="white"/>
						</svg>
					</a>
				</li>
			</ul>
		</div>
		<div class="tt-wrapper-description">
			<div class="tt-row-01">
				<div class="tt-box-title">
					<?php if($condition === 'ALL'): ?>
						<span class="tt-label-new bg-dark text-white badge badge-dark">
							<?php
							echo $status;
							?>
						</span>
					<?php endif ?>
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
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="buy-now"]') ?>" title="Buy Now" class="tooltip">						
						<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7 18C5.9 18 5.01 18.9 5.01 20C5.01 21.1 5.9 22 7 22C8.1 22 9 21.1 9 20C9 18.9 8.1 18 7 18ZM1 2V4H3L6.6 11.59L5.25 14.04C5.09 14.32 5 14.65 5 15C5 16.1 5.9 17 7 17H19V15H7.42C7.28 15 7.17 14.89 7.17 14.75L7.2 14.63L8.1 13H15.55C16.3 13 16.96 12.59 17.3 11.97L20.88 5.48C20.96 5.34 21 5.17 21 5C21 4.45 20.55 4 20 4H5.21L4.27 2H1ZM17 18C15.9 18 15.01 18.9 15.01 20C15.01 21.1 15.9 22 17 22C18.1 22 19 21.1 19 20C19 18.9 18.1 18 17 18Z" fill="#dd3d53"/>
						</svg>
					</a>
				</li>
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="apply-a-loan"]') ?>" title="Apply for Loan" class="tooltip">						
					<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.57649 4.3105C7.80349 3.71 9.81649 3 12.0195 3C14.1765 3 16.1365 3.6805 17.357 4.273L17.426 4.3065C17.794 4.4885 18.091 4.6605 18.3 4.8L16.453 7.5C20.711 11.853 24 20.9985 12.0195 20.9985C0.0389891 20.9985 3.23949 12.019 7.53449 7.5L5.69949 4.8C5.84099 4.7075 6.02049 4.6 6.23449 4.486C6.34049 4.429 6.45449 4.37 6.57649 4.3105ZM15.266 7.464L16.7445 5.3025C15.3695 5.4015 13.7335 5.7245 12.1585 6.1805C11.0335 6.5055 9.78349 6.456 8.62599 6.2425C8.33431 6.18842 8.04463 6.12405 7.75749 6.0495L8.71749 7.463C10.775 8.1955 13.208 8.1955 15.266 7.464ZM8.13999 8.315C10.5475 9.245 13.441 9.245 15.8485 8.314C16.8534 9.37335 17.6941 10.5772 18.3425 11.8855C19.0185 13.2645 19.3865 14.643 19.3265 15.831C19.2685 16.9775 18.8175 17.957 17.7875 18.685C16.714 19.4435 14.9085 19.9985 12.019 19.9985C9.12649 19.9985 7.31249 19.453 6.22899 18.703C5.19149 17.984 4.73599 17.018 4.67149 15.887C4.60399 14.712 4.96399 13.3405 5.63749 11.952C6.27999 10.628 7.17649 9.3535 8.13999 8.315ZM7.56499 4.958C7.96499 5.077 8.38299 5.1805 8.80699 5.259C9.88199 5.457 10.96 5.486 11.88 5.2195C12.9521 4.90717 14.0425 4.66154 15.145 4.484C14.225 4.207 13.149 4 12.019 4C10.2965 4 8.68999 4.4805 7.56499 4.958Z" fill="#DC3C54"/>
						<path d="M15.643 12.9644H14.81C14.8293 12.8583 14.8392 12.7508 14.8395 12.643C14.8386 12.5362 14.8297 12.4296 14.8127 12.3242H15.5975C15.6543 12.3242 15.7088 12.3016 15.749 12.2614C15.7892 12.2213 15.8118 12.1668 15.8118 12.1099C15.8118 12.0531 15.7892 11.9986 15.749 11.9584C15.7088 11.9182 15.6543 11.8956 15.5975 11.8956H14.6948C14.5221 11.4786 14.2285 11.1229 13.8519 10.8742C13.4753 10.6255 13.0328 10.4952 12.5815 10.5001H10.286C10.2149 10.5001 10.1468 10.5284 10.0966 10.5786C10.0463 10.6288 10.0181 10.6969 10.0181 10.768V11.893H9.21456C9.15773 11.893 9.10323 11.9155 9.06304 11.9557C9.02286 11.9959 9.00028 12.0504 9.00028 12.1072C9.00028 12.1641 9.02286 12.2186 9.06304 12.2588C9.10323 12.299 9.15773 12.3215 9.21456 12.3215H10.0181V12.9644H9.21456C9.15773 12.9644 9.10323 12.987 9.06304 13.0271C9.02286 13.0673 9.00028 13.1218 9.00028 13.1787C9.00028 13.2355 9.02286 13.29 9.06304 13.3302C9.10323 13.3704 9.15773 13.3929 9.21456 13.3929H10.0181V17.7321C10.0181 17.8032 10.0463 17.8713 10.0966 17.9215C10.1468 17.9718 10.2149 18 10.286 18C10.357 18 10.4251 17.9718 10.4754 17.9215C10.5256 17.8713 10.5538 17.8032 10.5538 17.7321V14.7858H12.5815C13.0324 14.7906 13.4745 14.6605 13.851 14.4124C14.2276 14.1642 14.5214 13.8092 14.6948 13.3929H15.643C15.6998 13.3929 15.7544 13.3704 15.7945 13.3302C15.8347 13.29 15.8573 13.2355 15.8573 13.1787C15.8573 13.1218 15.8347 13.0673 15.7945 13.0271C15.7544 12.987 15.6998 12.9644 15.643 12.9644ZM10.5538 11.0358H12.5815C12.888 11.0324 13.1901 11.1098 13.4572 11.2602C13.7243 11.4107 13.947 11.629 14.1029 11.893H10.5538V11.0358ZM10.5538 12.3215H14.2689C14.3154 12.5333 14.3154 12.7526 14.2689 12.9644H10.5538V12.3215ZM12.5815 14.2501H10.5538V13.3929H14.1029C13.947 13.6569 13.7243 13.8752 13.4572 14.0257C13.1901 14.1762 12.888 14.2536 12.5815 14.2501Z" fill="#DC3C54"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.57649 4.3105C7.80349 3.71 9.81649 3 12.0195 3C14.1765 3 16.1365 3.6805 17.357 4.273L17.426 4.3065C17.794 4.4885 18.091 4.6605 18.3 4.8L16.453 7.5C20.711 11.853 24 20.9985 12.0195 20.9985C0.0389891 20.9985 3.23949 12.019 7.53449 7.5L5.69949 4.8C5.84099 4.7075 6.02049 4.6 6.23449 4.486C6.34049 4.429 6.45449 4.37 6.57649 4.3105ZM15.266 7.464L16.7445 5.3025C15.3695 5.4015 13.7335 5.7245 12.1585 6.1805C11.0335 6.5055 9.78349 6.456 8.62599 6.2425C8.33431 6.18842 8.04463 6.12405 7.75749 6.0495L8.71749 7.463C10.775 8.1955 13.208 8.1955 15.266 7.464ZM8.13999 8.315C10.5475 9.245 13.441 9.245 15.8485 8.314C16.8534 9.37335 17.6941 10.5772 18.3425 11.8855C19.0185 13.2645 19.3865 14.643 19.3265 15.831C19.2685 16.9775 18.8175 17.957 17.7875 18.685C16.714 19.4435 14.9085 19.9985 12.019 19.9985C9.12649 19.9985 7.31249 19.453 6.22899 18.703C5.19149 17.984 4.73599 17.018 4.67149 15.887C4.60399 14.712 4.96399 13.3405 5.63749 11.952C6.27999 10.628 7.17649 9.3535 8.13999 8.315ZM7.56499 4.958C7.96499 5.077 8.38299 5.1805 8.80699 5.259C9.88199 5.457 10.96 5.486 11.88 5.2195C12.9521 4.90717 14.0425 4.66154 15.145 4.484C14.225 4.207 13.149 4 12.019 4C10.2965 4 8.68999 4.4805 7.56499 4.958Z" stroke="#DC3C54" stroke-width="0.5"/>
						<path d="M15.643 12.9644H14.81C14.8293 12.8583 14.8392 12.7508 14.8395 12.643C14.8386 12.5362 14.8297 12.4296 14.8127 12.3242H15.5975C15.6543 12.3242 15.7088 12.3016 15.749 12.2614C15.7892 12.2213 15.8118 12.1668 15.8118 12.1099C15.8118 12.0531 15.7892 11.9986 15.749 11.9584C15.7088 11.9182 15.6543 11.8956 15.5975 11.8956H14.6948C14.5221 11.4786 14.2285 11.1229 13.8519 10.8742C13.4753 10.6255 13.0328 10.4952 12.5815 10.5001H10.286C10.2149 10.5001 10.1468 10.5284 10.0966 10.5786C10.0463 10.6288 10.0181 10.6969 10.0181 10.768V11.893H9.21456C9.15773 11.893 9.10323 11.9155 9.06304 11.9557C9.02286 11.9959 9.00028 12.0504 9.00028 12.1072C9.00028 12.1641 9.02286 12.2186 9.06304 12.2588C9.10323 12.299 9.15773 12.3215 9.21456 12.3215H10.0181V12.9644H9.21456C9.15773 12.9644 9.10323 12.987 9.06304 13.0271C9.02286 13.0673 9.00028 13.1218 9.00028 13.1787C9.00028 13.2355 9.02286 13.29 9.06304 13.3302C9.10323 13.3704 9.15773 13.3929 9.21456 13.3929H10.0181V17.7321C10.0181 17.8032 10.0463 17.8713 10.0966 17.9215C10.1468 17.9718 10.2149 18 10.286 18C10.357 18 10.4251 17.9718 10.4754 17.9215C10.5256 17.8713 10.5538 17.8032 10.5538 17.7321V14.7858H12.5815C13.0324 14.7906 13.4745 14.6605 13.851 14.4124C14.2276 14.1642 14.5214 13.8092 14.6948 13.3929H15.643C15.6998 13.3929 15.7544 13.3704 15.7945 13.3302C15.8347 13.29 15.8573 13.2355 15.8573 13.1787C15.8573 13.1218 15.8347 13.0673 15.7945 13.0271C15.7544 12.987 15.6998 12.9644 15.643 12.9644ZM10.5538 11.0358H12.5815C12.888 11.0324 13.1901 11.1098 13.4572 11.2602C13.7243 11.4107 13.947 11.629 14.1029 11.893H10.5538V11.0358ZM10.5538 12.3215H14.2689C14.3154 12.5333 14.3154 12.7526 14.2689 12.9644H10.5538V12.3215ZM12.5815 14.2501H10.5538V13.3929H14.1029C13.947 13.6569 13.7243 13.8752 13.4572 14.0257C13.1901 14.1762 12.888 14.2536 12.5815 14.2501Z" stroke="#DC3C54" stroke-width="0.5"/>
					</svg>
					</a>
				</li>
				<li>
					<a href="<?= do_shortcode('[action_redirect id=' . get_the_ID() . ' type="book-a-visit"]') ?>" title="Book a Visit" class="tooltip">						
						<svg class="listing-hvr-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V8H20V21Z" fill="#dd3d53"/>
						</svg>
					</a>
				</li>
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
