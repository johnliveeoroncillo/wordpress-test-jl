<?php
get_header();

$page_name = carleader_listings_option( 'archive_name' );
if ( ! isset( $page_name ) || $page_name == '' ) {
	$page_name = esc_html__( 'Inventory', 'caleader-listing' );
}

$test_drive = carleader_listings_option( 't_drive_bt' );
if ( ! isset( $test_drive ) || $test_drive == '' ) {
	$test_drive = esc_html__( 'test drive', 'caleader-listing' );
}
$test_drive_button = carleader_listings_option( 'test_drive_button' );
if ( ! isset( $test_drive_button ) || $test_drive_button == '' ) {
	$test_drive_button = false;

}

$liicense_text = carleader_listings_option( 'liicense_text' );
if ( ! isset( $liicense_text ) || $liicense_text == '' ) {
	$liicense_text = esc_html__( 'Taxes & Licensing included', 'caleader-listing' );

}
$int_sec = carleader_listings_option( 'int_sec' );
if ( ! isset( $int_sec ) || $int_sec == '' ) {
	$int_sec = 1 ;
}
$interested_text = carleader_listings_option( 'interested_text' );
if ( ! isset( $interested_text ) || $interested_text == '' ) {
	$interested_text = esc_html__( 'You May Also Be Interested In', 'caleader-listing' );
}
$breadcrumbs             = carleader_listings_option( 'breadcrumbs' );
$can_enquire             = carleader_listings_option( 'can_enquire' );
$single_gal_change             = carleader_listings_option( 'single_gal_change' );
if(!$single_gal_change){
	$single_gal_change = 'click';
}
$can_add_cart            = carleader_listings_option( 'can_add_cart' );
$contact_bt_for_product  = carleader_listings_option( 'contact_bt_for_product' );
$contact_bt_for_spc_prod = carleader_listings_option( 'contact_bt_for_spc_prod' );
$sold_badge_single_page = carleader_listings_option( 'sold_badge_single_page' );
?>
<div class="tt-subpages-wrapper">
	<h1 class="tt-title"><?php echo $page_name; ?></h1>
	<?php if ( $breadcrumbs ) { ?>
	<div class="tt-breadcrumb">
		<ul>
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</ul>
	</div>
	<?php } ?>
</div>
<?php
$layout = 1;
if ( isset( $_GET['layout_single'] ) ) {
	$layout = $_GET['layout_single'];
}
the_post();
$post_id      = get_the_ID();
$status       = carleader_listings_meta( 'condition' );
$miles        = carleader_listings_meta( 'miles' );
$year         = carleader_listings_meta( 'model_year' );
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
$body_type    = carleader_listings_meta( 'body_display' );
$est_loan     = carleader_listings_meta( 'loan_payment' );

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
<div id="tt-pageContent">
	<div class="section-wrapper-03">
		<div class="container-indent">
			<div class="container">
				<div class="row">
				<div class="col-12">
					<div class="tt-title-single d-flex">
								<div class="d-flex btn-back-container">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left align-self-center" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
									</svg>
									<h2 class="page-back align-self-center mb-0">
									Back
									</h2>
								</div>
								<h1 class="tt-title"><?php echo carsada_listings_title(); ?></h1>
							</div>
				</div>
				<input type="hidden" id="gal_change" value="<?php echo esc_attr($single_gal_change ); ?>"> 
					<div class="col-12 col-md-8 
				<?php
				if ( $layout == '2' ) {
					echo 'col-lg-8 col-xl-8';
				}
				?>
				">
						<?php if($status == 'NEW'): ?>
                        <div class="car-variant d-flex">
                            <h6 class="car-variant-colors align-self-center">Colors</h6>
							<div class="d-flex car-colors-container">
								<div class="d-none car-colors-wrapper align-self-center">
									<div class="car-colors-active">
										<div class="car-colors border rounded-circle mx-auto"></div>
									</div>                                
								</div>

								<div class="color-overlay"></div>
								<div class="color-overlay"></div>
								<div class="color-overlay"></div>
							</div>

                            <div class="car-variants form-group">                                									
                                <select id="car-variant-models" class="tt-select tt-skin-01 SumoUnder" style="display: none;" tabindex="-1">
                                </select>

								<div class="variant-overlay"></div>
                            </div>                              
                        </div>
						<?php endif ?>
						<div class="tt-aside-btn 
	<?php
	if ( $layout == '1' ) {
		echo 'visible-xs';
	}
	?>
					">
							<?php if ( $test_drive_button ) { ?>
							<a href="JavaScript:void(0)" class="btn btn-color02" data-toggle="modal"
								data-target="#modalAddTestDrive"><i
									class="icon-testdrive"></i><?php echo $test_drive; ?></a>
							<?php } ?>
							<?php
							if ( function_exists( 'caleader_options' ) ) {
								$compare_plugin = caleader_options( 'compare_plugin' );

								if ( $compare_plugin == '1' ) {
									$product_id = get_the_ID();



									echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '" page = "single" device="mobile"]' );
									?>
									<?php
								}
							}
							?>
						</div>
						<div class="tt-mobile-product-layout visible-xs">
							<div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
								<?php
								$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
								if ( ! empty( $galleries ) ) {

									foreach ( $galleries as $single ) {
										?>
								<div>
										  <?php
											$link = wp_get_attachment_url( $single );
											?>
										  <?php
											$imgurl   = wp_get_attachment_url( $single );
											$temp_url = aq_resize( $imgurl, 400, 295, true );

											if ( $temp_url != null && $temp_url != '' ) {
																  $imgurl = $temp_url;
											}
											?>
									<img src="<?php echo esc_url( $imgurl ); ?>" alt="">
									<?php if ( $sold_badge_single_page == '1' ) {
										if ( $status == 'sold_out' ) {
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
										}} ?>
								</div>
										<?php
									}
								}
								?>
								<?php
								$videos = get_post_meta( get_the_ID(), '_carleader_listing_videos', true );
								if ( ! empty( $videos ) ) {
									foreach ( $videos as $video => $val ) {
										if ( ! empty( $val['video_url'] ) ) {
											?>
								<div>
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="<?php echo $val['video_url']; ?>"
											allowfullscreen></iframe>
									</div>
								</div>
																	<?php
										}
									}
								}
								?>
							</div>
						</div>
						
						<?php
						if ( $layout == '1' ) {
							?>
						<div class="tt-layout-preview hidden-xs">
							<div class="tt-product-single-img">
								<div>
								
									<?php
									$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
									$big_link          = wp_get_attachment_url( (int) $post_thumbnail_id );
									$small_link        = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail_listing' );

									$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
									?>
									<?php if(!has_post_thumbnail(get_the_ID())): ?>
										<!-- <svg width="99" height="65" viewBox="0 0 99 65" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M97.5032 19.4368C97.1926 18.5142 96.5716 17.9914 95.609 17.9914C92.6591 17.9606 89.7402 17.9606 86.8213 17.9914C85.8587 17.9914 85.2066 18.5142 84.8961 19.4061C84.7408 19.8366 84.6166 20.2672 84.4303 20.8823C82.443 15.4387 80.5177 10.1797 78.5925 4.95147C77.4125 1.753 75.0526 0.0615089 71.6369 0.0307544C56.6077 0 41.5786 0 26.5494 0C23.1027 0 20.7427 1.69149 19.5627 4.88996C18.4759 7.84238 17.3891 10.8256 16.3023 13.778C15.4639 16.0846 14.6255 18.3604 13.6939 20.8515C13.5076 20.2364 13.3834 19.8059 13.2592 19.4061C12.9797 18.4834 12.3276 17.9606 11.365 17.9606C8.41508 17.9298 5.4962 17.9298 2.54626 17.9606C1.58365 17.9606 0.931559 18.4834 0.621039 19.4061C0.403676 20.1134 0.217364 20.8515 0 21.5896V23.4964C0.124208 23.9885 0.279468 24.4498 0.403676 24.9419C0.931559 26.7564 1.36629 27.0947 3.32256 27.0947C5.68251 27.0947 8.04246 27.0947 10.4024 27.0947C10.7129 27.0947 10.9924 27.1254 11.3029 27.1562C11.2719 27.3099 11.2719 27.4022 11.2408 27.433C11.1787 27.4945 11.0856 27.556 10.9924 27.5867C8.97402 28.4786 8.13561 30.0778 8.13561 32.1999C8.13561 41.8876 8.13561 51.606 8.13561 61.2936C8.13561 63.2004 8.97402 64 10.8682 64.0308C14.2218 64.0308 17.5754 64.0308 20.929 64.0308C22.8232 64.0308 23.6616 63.2004 23.6616 61.2936C23.6926 59.11 23.6616 56.9265 23.6616 54.7429V51.2062H74.3695V52.2826C74.3695 55.2042 74.3695 58.1567 74.3695 61.1091C74.3695 63.2311 75.1768 64.0308 77.3194 64.0308C80.5488 64.0308 83.7782 64.0308 86.9766 64.0308C89.1191 64.0308 89.8954 63.2311 89.9265 61.1091C89.9265 58.0951 89.9265 55.112 89.9265 52.098C89.9265 45.5166 89.9265 38.9659 89.9265 32.3844C89.9265 30.2009 89.1502 28.5094 87.0697 27.5867C86.9455 27.5252 86.8523 27.4022 86.5729 27.1562C87.0697 27.1254 87.3492 27.0947 87.6597 27.0947C90.1439 27.0947 92.628 27.0947 95.1122 27.0947C96.5406 27.0947 97.0684 26.6334 97.5342 25.3109C98.2795 23.3119 98.1553 21.3743 97.5032 19.4368ZM20.4322 26.2028C22.5437 20.4517 24.6242 14.7006 26.7047 8.94954C26.9221 8.3037 27.2015 8.08842 27.9157 8.08842C42.0133 8.11917 56.1109 8.11917 70.2085 8.08842C70.7364 8.08842 71.1401 8.08842 71.3574 8.76502C73.5 14.7314 75.7047 20.6977 77.8783 26.6641C77.9404 26.8179 77.9404 26.9409 78.0025 27.1869H20.1217C20.2459 26.7871 20.308 26.4796 20.4322 26.2028ZM28.2262 40.6574C25.1831 40.7189 22.109 40.7189 19.0349 40.6574C16.8302 40.6266 15.3086 39.0274 15.3707 36.9668C15.4328 34.9986 17.0165 33.5223 19.1591 33.4916C20.6496 33.4608 22.1711 33.4916 23.6616 33.4916C25.121 33.4916 26.6115 33.4916 28.071 33.4916C30.2446 33.5223 31.7972 34.9678 31.8593 36.9361C31.9214 39.0274 30.4309 40.6266 28.2262 40.6574ZM79.2446 40.6574C76.0773 40.7496 72.9411 40.7496 69.7738 40.6574C67.6312 40.5959 66.2028 38.9659 66.2959 36.9361C66.358 34.9986 67.9417 33.5839 70.0532 33.5531C71.5437 33.5223 73.0653 33.5531 74.5558 33.5531C76.0463 33.5531 77.5678 33.5223 79.0583 33.5531C81.1698 33.5839 82.7224 35.0293 82.7845 36.9668C82.8466 38.9659 81.3872 40.5959 79.2446 40.6574Z" fill="#6E6E70"/>
										</svg> -->
										<!-- <img class="zoom-product" src="<?php echo esc_url( CARSADA_ASSETS_LIVE_URL . '/images/listing/no-car-image.png' ); ?>"
											data-zoom-image="<?php echo esc_url( CARSADA_ASSETS_LIVE_URL . '/images/listing/no-car-image.png' ); ?>"
											alt="<?php echo esc_html__( 'Single Image', 'caleader-listing' ); ?>"> -->
										<img class="zoom-product" src="<?php echo esc_url( $small_link ); ?>"
											data-zoom-image="<?php echo esc_url( $small_link ); ?>"
											alt="<?php echo esc_html__( 'Single Image', 'caleader-listing' ); ?>">
									<?php else: ?>
										<img class="zoom-product" src="<?php echo esc_url( $small_link ); ?>"
											data-zoom-image="<?php echo esc_url( $small_link ); ?>"
											alt="<?php echo esc_html__( 'Single Image', 'caleader-listing' ); ?>">
									<?php endif ?>
										<?php  if ( $sold_badge_single_page == '1' ) {
											if ( $status == 'sold_out' ) {
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
										}} ?>
								</div>
							</div>
							<div class="product-images-carousel">
								<ul id="smallGallery" class="tt-arrow-center-small slick-animated-show-js">
									<?php
									$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
									if ( ! empty( $galleries ) ) {
										$i = 0;
										foreach ( $galleries as $single ) {
											 $i++;

											 $link     = wp_get_attachment_image_src( $single, 'thumbnail_listing' );
											 $imgurl   = wp_get_attachment_url( $single );
											 $temp_url = aq_resize( $imgurl, 370, 295, true );

											if ( $temp_url != null && $temp_url != '' ) {
												$imgurl = $temp_url;
											}
											?>
											<?php if ( $single == $post_thumbnail_id ) { ?>
									<li><a class="zoomGalleryActive" href="#"
											data-image="<?php echo esc_url( $link[0] ); ?>"
											data-zoom-image="<?php echo esc_url( $link[0] ); ?>"><img
												src="<?php echo esc_url( $imgurl ); ?>" alt="" /></a>
									</li>
											<?php } else { ?>
									<li><a href="#" data-image="<?php echo esc_url( $link[0] ); ?>"
											data-zoom-image="<?php echo esc_url( $link[0] ); ?>"><img
												src="<?php echo esc_url( $imgurl ); ?>" alt="" /></a>
									</li>
												<?php
											}
										}
									}
									?>
									<?php
									$videos = get_post_meta( get_the_ID(), '_carleader_listing_videos', true );
									if ( ! empty( $videos ) ) {
										foreach ( $videos as $video => $val ) {
											if ( ! empty( $val['video_url'] ) ) {
												?>
									<li>
										<div class="video-link-product" data-toggle="modal" data-type="youtube"
											data-target="#modalVideoProduct"
											data-value="<?php echo esc_url( $val['video_url'] ); ?>">
												<?php
												if ( isset( $val['video_image'] ) ) {
													$imgurlvideo = wp_get_attachment_url( $val['video_image'][0] );
													$temp_url    = aq_resize( $imgurlvideo, 270, 217, true );

													if ( $temp_url != null && $temp_url != '' ) {
															 $imgurlvideo = $temp_url;
													}

													?>

											<img src="<?php echo esc_url( $imgurlvideo ); ?>" alt="">
													<?php
												} else {
													$y_img_url = explode( '/', $val['video_url'] );
													$y_img_url = array_reverse( $y_img_url );
													$y_img_url = $y_img_url[0];
													?>
													<img src="<?php echo esc_url( 'https://img.youtube.com/vi/' . $y_img_url . '/hqdefault.jpg' ); ?>" alt="">
													<?php
												}
												?>
											<div>
												<i class="icon-play"></i>
											</div>
										</div>
									</li>
												<?php
											}
										}
									}
									?>
								</ul>
							</div>
						</div>
						<div class="tt-boxindent-listing">
							<?php the_content(); ?>

							<?php if ( $can_enquire ) { ?>
							<div class="tt-box-indent" id="contact_now">
								<div class="row">
									<div class="col-lg-9">
										<h6 class="tt-title-subpages">
											<?php echo esc_html__( 'Contact Us About this Car', 'caleader-listing' ); ?>
										</h6>
										<?php echo do_shortcode( '[carleader_listing_contact_form]' ); ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="tt-aside03-layout">
							<div class="tt-aside-btn hidden-xs">
								<?php if ( $test_drive_button ) { ?>
								<a href="JavaScript:void(0)" class="btn btn-color02" data-toggle="modal"
									data-target="#modalAddTestDrive"><i
										class="icon-testdrive"></i><?php echo $test_drive; ?></a>
								<?php } ?>
								<?php
								if ( function_exists( 'caleader_options' ) ) {
									$compare_plugin = caleader_options( 'compare_plugin' );
									if ( $compare_plugin == '1' ) {

												 $product_id = get_the_ID();
												 echo do_shortcode( '[caleader_compare prod_id = "' . $product_id . '" page = "single" device="decstop"]' );
										?>
										<?php
									}
								}
								?>
							</div>
							<div class="tt-aside-promo <?= $status == 'NEW'? 'mt-5' : ''?>">
								<div class="tt-wrapper">
									<?php if ( $price != 0 && $status != 'sold_out' ) { ?>
										<?php if ( isset( $old_price ) && $old_price != '' ) { ?>
									<span class="tt-old-price">
										<span class="price-amount">
											<?php echo carleader_listings_price( $old_price ); ?>
										</span>
									</span>
										<?php } ?>
									<div class="tt-value"><?php echo carleader_listings_price( $price ); ?></div>
									<p>
										<?php echo $liicense_text; ?>
									</p>
										<?php if ( $can_add_cart ) { ?>
											<?php do_action( 'carleader_listings_add_to_cart_button', $price, $post_id, $qntyty = '', $post_id, $sku = '', $title = '' ); ?>
										<?php } ?>
										<?php
										if ( $contact_bt_for_spc_prod == '1' ) {
											$contact_bt_text = carleader_listings_option( 'contact_bt_text' );
											$contact_bt_url  = carleader_listings_option( 'contact_bt_url' );
											if ( ! isset( $contact_bt_text ) || $contact_bt_text == '' ) {
												$contact_bt_text = esc_html__( 'Contact Us', 'caleader-listing' );
											}
											if ( ! isset( $contact_bt_url ) || $contact_bt_url == '' ) {
												$contact_bt_url = '#contact_now';
											}
											?>
												
											<a href="<?php echo esc_url( $contact_bt_url ); ?>" class="btn btn-xl">
												<?php echo $contact_bt_text; ?>
											</a>
										<?php } ?>
										<?php
									} else {
										?>

									<p class="tt-info-price"><?php echo esc_html__( 'Request', 'caleader-listing' ); ?>
									</p>
										<?php
										if ( $contact_bt_for_product ) {
											$contact_bt_text = carleader_listings_option( 'contact_bt_text' );
											$contact_bt_url  = carleader_listings_option( 'contact_bt_url' );
											if ( ! isset( $contact_bt_text ) || $contact_bt_text == '' ) {
												$contact_bt_text = esc_html__( 'Contact Us', 'caleader-listing' );
											}
											if ( ! isset( $contact_bt_url ) || $contact_bt_url == '' ) {
												$contact_bt_url = '#contact_now';
											}
											?>
												
											<a href="<?php echo esc_url( $contact_bt_url ); ?>" class="btn btn-xl">
												<?php echo $contact_bt_text; ?>
											</a>
										<?php } ?>
										<?php
									}
									?>


								</div>
								<?php if ( $est_loan != '' ) { ?>
								<div class="tt-info">
									<?php echo esc_html__( 'Estimated Loan', 'caleader-listing' ); ?>
									<span><?php echo carleader_listings_price( $est_loan ); ?><?php echo esc_html__( '/mo', 'caleader-listing' ); ?></span>
								</div>
								<?php } ?>
							</div>
							<div class="tt-aside03-box">
								<h6 class="tt-aside03-title"><?php echo esc_html__( 'Options', 'caleader-listing' ); ?>
								</h6>
								<div class="tt-aside03-content">
									<table class="tt-table-options">
										<tbody>
										<?php if ( isset( $body_type ) && $body_type != '' ){ ?>
											<tr>
												<td><?php echo esc_html__( 'Body Type:', 'caleader-listing' ); ?></td>
												<td><?php echo $body_type; ?></td>
											</tr>
										<?php } ?>
											<?php if ( isset( $miles ) && $miles != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Mileage:', 'caleader-listing' ); ?></td>
												<td><?php echo carleader_listings_miles( $miles ); ?> </td>
											</tr>
											<?php } ?>
											<?php if ( isset( $fuel_type ) && $fuel_type != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Fuel Type:', 'caleader-listing' ); ?></td>
												<td><?php echo $fuel_type; ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $year ) && $year != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Year:', 'caleader-listing' ); ?></td>
												<td><?php echo $year; ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $transmission ) && $transmission != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Transmission:', 'caleader-listing' ); ?>
												</td>
												<td><?php echo $transmission; ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $drive ) && $drive != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Drive Type:', 'caleader-listing' ); ?></td>
												<td><?php echo $drive; ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $color ) && $color != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Color:', 'caleader-listing' ); ?></td>
												<td><?php echo ucwords( strtolower( $color ) ); ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $int_color ) && $int_color != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Int. Color:', 'caleader-listing' ); ?></td>
												<td><?php echo ucwords( strtolower( $int_color ) ); ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $vin ) && $vin != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'VIN:', 'caleader-listing' ); ?></td>
												<td><?php echo $vin; ?></td>
											</tr>
											<?php } ?>
											<?php if ( isset( $engine ) && $engine != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Engine:', 'caleader-listing' ); ?></td>
												<td><?php echo $engine; ?> </td>
											</tr>
											<?php } ?>
											<?php if ( isset( $stock ) && $stock != '' ) { ?>
											<tr>
												<td><?php echo esc_html__( 'Stock Number:', 'caleader-listing' ); ?>
												</td>
												<td><?php echo $stock; ?></td>
											</tr>
											<?php } ?>
											<?php
											$category = carleader_listings_meta( 'category' );
											if ( isset( $category ) && $category != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Category:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $category;
												echo '</td>';
												echo '</tr>';
											}

											$hours = carleader_listings_meta( 'hours' );
											if ( isset( $hours ) && $hours != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Hours:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $hours;
												echo '</td>';
												echo '</tr>';
											}
											$wheelbase = carleader_listings_meta( 'wheelbase' );
											if ( isset( $wheelbase ) && $wheelbase != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Wheelbase:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $wheelbase;
												echo '</td>';
												echo '</tr>';
											}
											$wheels = carleader_listings_meta( 'wheels' );
											if ( isset( $wheels ) && $wheels != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Wheels:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $wheels;
												echo '</td>';
												echo '</tr>';
											}
											$front_axle = carleader_listings_meta( 'front_axle' );
											if ( isset( $front_axle ) && $front_axle != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Front Axle:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $front_axle;
												echo '</td>';
												echo '</tr>';
											}
											$rear_axle = carleader_listings_meta( 'rear_axle' );
											if ( isset( $rear_axle ) && $rear_axle != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Rear Axle:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $rear_axle;
												echo '</td>';
												echo '</tr>';
											}
											$ratio = carleader_listings_meta( 'ratio' );
											if ( isset( $ratio ) && $ratio != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Ratio:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $ratio;
												echo '</td>';
												echo '</tr>';
											}
											$suspension___ = carleader_listings_meta( 'suspension___' );
											if ( isset( $suspension___ ) && $suspension___ != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Suspension :', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $suspension___;
												echo '</td>';
												echo '</tr>';
											}
											$brakes = carleader_listings_meta( 'brakes' );
											if ( isset( $brakes ) && $brakes != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Brakes:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $brakes;
												echo '</td>';
												echo '</tr>';
											}
											$frame = carleader_listings_meta( 'frame' );
											if ( isset( $frame ) && $frame != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Frame:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $frame;
												echo '</td>';
												echo '</tr>';
											}
											$front_tires = carleader_listings_meta( 'front_tires' );
											if ( isset( $front_tires ) && $front_tires != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Front Tires:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $front_tires;
												echo '</td>';
												echo '</tr>';
											}
											$rear_tires = carleader_listings_meta( 'rear_tires' );
											if ( isset( $rear_tires ) && $rear_tires != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Rear Tires:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $rear_tires;
												echo '</td>';
												echo '</tr>';
											}
											$gvwr = carleader_listings_meta( 'gvwr' );
											if ( isset( $gvwr ) && $gvwr != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'GVWR:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $gvwr;
												echo '</td>';
												echo '</tr>';
											}
											$tare = carleader_listings_meta( 'tare' );
											if ( isset( $tare ) && $tare != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Tare:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $tare;
												echo '</td>';
												echo '</tr>';
											}
											$fuel_tanks = carleader_listings_meta( 'fuel_tanks' );
											if ( isset( $fuel_tanks ) && $fuel_tanks != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Fuel Tanks:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $fuel_tanks;
												echo '</td>';
												echo '</tr>';
											}
											$code = carleader_listings_meta( 'code' );
											if ( isset( $code ) && $code != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Code:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $code;
												echo '</td>';
												echo '</tr>';
											}
											$product = carleader_listings_meta( 'product' );
											if ( isset( $product ) && $product != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Product:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $product;
												echo '</td>';
												echo '</tr>';
											}
											$shell_material = carleader_listings_meta( 'shell_material' );
											if ( isset( $shell_material ) && $shell_material != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Shell Material:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $shell_material;
												echo '</td>';
												echo '</tr>';
											}
											$options_description = carleader_listings_meta( 'options_description' );
											if ( isset( $options_description ) && $options_description != '' ) {
												echo '<tr>';
												echo '<td>';
												echo esc_html__( 'Options/ Description:', 'caleader-listing' );
												echo '</td>';
												echo '<td>';
												echo $options_description;
												echo '</td>';
												echo '</tr>';
											}

											?>
										</tbody>
									</table>
								</div>
							</div>
							<?php
							if ( is_active_sidebar( 'caleader_listing_details' ) ) {
								dynamic_sidebar( 'caleader_listing_details' );
							}
							?>
						</div>

						<?php } elseif ( $layout == '2' ) { ?>
						<div class="tt-boxindent-listing">
							<div class="tt-box-indent">
								<h6 class="tt-title-subpages"><?php echo esc_html__( 'Options', 'caleader-listing' ); ?>
								</h6>
								<div class="tt-table-listing">
									<div class="row">
										<div class="col-12 col-lg-6">
											<table class="tt-table-options">
												<tbody>
													<tr>
														<td><?php echo esc_html__( 'Body Type:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $body_type; ?></td>
													</tr>
													<?php if ( isset( $miles ) && $miles != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Mileage:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo carleader_listings_miles( $miles ); ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $fuel_type ) && $fuel_type != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Fuel Type:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $fuel_type; ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $year ) && $year != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Year:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $year; ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $transmission ) && $transmission != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Transmission:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $transmission; ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $drive ) && $drive != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Drive Type:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $drive; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										<div class="col-12 col-lg-6">
											<table class="tt-table-options">
												<tbody>
													<?php if ( isset( $color ) && $color != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Color:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo ucwords( strtolower( $color ) ); ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $int_color ) && $int_color != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Int. Color:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo ucwords( strtolower( $int_color ) ); ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $vin ) && $vin != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'VIN:', 'caleader-listing' ); ?></td>
														<td><?php echo $vin; ?></td>
													</tr>
													<?php } ?>
													<?php if ( isset( $engine ) && $engine != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Engine:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $engine; ?> </td>
													</tr>
													<?php } ?>
													<?php if ( isset( $stock ) && $stock != '' ) { ?>
													<tr>
														<td><?php echo esc_html__( 'Stock Number:', 'caleader-listing' ); ?>
														</td>
														<td><?php echo $stock; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<?php the_content(); ?>
							<?php if ( $can_enquire ) { ?>
							<div class="tt-box-indent" id="contact_now">
								<div class="row">
									<div class="col-lg-9">
										<h6 class="tt-title-subpages">
											<?php echo esc_html__( 'Contact Us About this Car', 'caleader-listing' ); ?>
										</h6>
										<?php echo do_shortcode( '[carleader_listing_contact_form]' ); ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-4 col-xl-4">
						<div class="tt-aside03-layout">
							<div class="tt-aside-promo">
								<div class="tt-wrapper">
									<?php if ( $price != 0 && $status != 'sold_out' ) { ?>
										<?php if ( isset( $old_price ) && $old_price != '' ) { ?>
									<span class="tt-old-price">
										<span class="price-amount">
											<?php echo carleader_listings_price( $old_price ); ?>
										</span>
									</span>
										<?php } ?>
									<div class="tt-value"><?php echo carleader_listings_price( $price ); ?></div>
									<p>
										<?php echo $liicense_text; ?>
									</p>
										<?php if ( $can_add_cart ) { ?>
											<?php do_action( 'carleader_listings_add_to_cart_button', $price, $post_id, $qntyty = '', $post_id, $sku = '', $title = '' ); ?>
										<?php } ?>
										<?php
										if ( $contact_bt_for_spc_prod == '1' ) {
											$contact_bt_text = carleader_listings_option( 'contact_bt_text' );
											$contact_bt_url  = carleader_listings_option( 'contact_bt_url' );
											if ( ! isset( $contact_bt_text ) || $contact_bt_text == '' ) {
												$contact_bt_text = esc_html__( 'Contact Us', 'caleader-listing' );
											}
											if ( ! isset( $contact_bt_url ) || $contact_bt_url == '' ) {
												$contact_bt_url = '#contact_now';
											}
											?>
												
											<a href="<?php echo esc_url( $contact_bt_url ); ?>" class="btn btn-xl">
												<?php echo $contact_bt_text; ?>
											</a>
										<?php } ?>
										<?php
									} else {
										?>

									<p class="tt-info-price"><?php echo esc_html__( 'Request', 'caleader-listing' ); ?>
									</p>

										<?php
										if ( $contact_bt_for_product ) {
											$contact_bt_text = carleader_listings_option( 'contact_bt_text' );
											$contact_bt_url  = carleader_listings_option( 'contact_bt_url' );
											if ( ! isset( $contact_bt_text ) || $contact_bt_text == '' ) {
												$contact_bt_text = esc_html__( 'Contact Us', 'caleader-listing' );
											}
											?>
											
											<a href="<?php echo esc_url( $contact_bt_url ); ?>" class="btn btn-xl">
												<?php echo $contact_bt_text; ?>
											</a>
										<?php } ?>

										<?php
									}
									?>

								</div>
								<?php if ( $est_loan != '' ) { ?>
								<div class="tt-info">
									<?php echo esc_html__( 'Estimated Loan', 'caleader-listing' ); ?>
									<span><?php echo carleader_listings_price( $est_loan ); ?><?php echo esc_html__( '/mo', 'caleader-listing' ); ?></span>
								</div>
								<?php } ?>
							</div>
							<div class="tt-aside03-box hidden-xs">
								<div class="tt-aside03-content">
									<div class="tt-aside-gallery">
										<div class="tt-img-large">
											<?php
											$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
											$big_link          = wp_get_attachment_url( (int) $post_thumbnail_id );
											?>
											<img src="<?php echo $big_link; ?>" alt="">
											<?php
											$promo = carleader_listings_meta( 'promo' );
											if ( $promo == '1' ) {
												?>
											<div class="tt-label-location">
												<span
													class="tt-label-promo"><?php echo esc_html__( 'Great Deal!', 'caleader-listing' ); ?></span>
											</div>
											<?php } ?>
										</div>
										<ul class="tt-img-thumbnails">
											<?php
											$galleries = get_post_meta( get_the_ID(), '_carleader_listing_gallery' );
											if ( ! empty( $galleries ) ) {
												$countpic = 1;
												foreach ( $galleries as $single ) {
													$link = wp_get_attachment_url( $single );
													?>
											<li class="
													<?php
													if ( $countpic > 4 ) {
																				   echo 'tt-more-hide';
													}
													?>
										"><a href="<?php echo $link; ?>"><img src="<?php echo $link; ?>" alt=""></a></li>
													<?php
													$countpic++;
												}
												?>
											<li><a class="tt-more" href="#"><img
														src="<?php echo CALEADER_IMG_URL . 'custom/preview_splash.png'; ?>"
														alt=""><span><?php echo esc_html__( 'MORE PHOTOS', 'caleader-listing' ); ?></span></a>
											</li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<?php
							if ( is_active_sidebar( 'caleader_listing_details' ) ) {
								dynamic_sidebar( 'caleader_listing_details' );
							}
							?>
						</div>

						<?php } ?>
					</div>
				</div>
			</div>
			<?php 
			
			
			if( $int_sec ){ ?>
			<div class="container-indent">
				<div class="container">
					<div class="tt-block-title">
						<h3 class="tt-title"><?php echo $interested_text; ?></h3>
					</div>
					<?php
					$args = array(
						'post_type' => 'carleader-listing',
					);
					$loop = new WP_Query( $args );

					?>
					<input type="hidden" id="interested_slider_result" value="<?php echo $loop->found_posts; ?>">

					<div class="js-carousel-col-4 tt-slider-product tt-arrow-center slick-alignment-arrows">

						<?php
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) :
								$loop->the_post();
								do_action( 'carleader_listings_product_loop' );

							endwhile;
						}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
