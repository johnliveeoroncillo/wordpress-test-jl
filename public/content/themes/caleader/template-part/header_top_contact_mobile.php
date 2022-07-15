<?php
$header_address      = caleader_options( 'header_address' );
$header_layout       = caleader_options( 'header_style' );
$header_phone        = caleader_options( 'header_address_phone' );
$header_time         = caleader_options( 'header_address_time' );
$header_mail         = caleader_options( 'header_address_email' );
$map_image           = caleader_footer( 'header_map_image' );
$header_phone_title  = caleader_options( 'header_phone_title' );
$top_header_cart     = caleader_options( 'top_header_cart' );
$header_address_wapp = caleader_options( 'header_address_wapp' );
$top_bar_menu        = caleader_options( 'top_bar_menu' );

$add_your_item_btn = caleader_options( 'add_your_item_btn' );
$add_button_func   = caleader_options( 'add_button_func' );
if ( ! isset( $add_button_func ) || $add_button_func == '' ) {
	$add_button_func = 'shortcode';
}


?>
<div class="tt-mobile-quickLinks">
	<div class="container-fluid">
		<div class="row no-gutters">
			<div class="col">
				<a class="btn-toggle" href="<?php echo esc_js( 'javascript:void(0)' ); ?>"><i class="icon-149984"></i></a>
				<div class="quickLinks-layout">
					<div class="quickLinks-map">
						<address>
							<i class="icon-149984"></i><?php echo caleader_kses_basic( $header_address ); ?>
						</address>
		<?php
		$footer_map_type = caleader_options( 'footer_map_type', 'image' );
		if ( $footer_map_type == 'map' ) {
			?>
						<div id="googleMapHeader" class="google-map"></div>
		<?php } else { ?>
						<img src="<?php echo esc_url( $map_image ); ?>"
							alt="<?php echo esc_attr__( 'Image', 'caleader' ); ?>">
			<?php
		}
		?>
					</div>
				</div>
			</div>

			<div class="col">
				<a class="btn-toggle" href="<?php echo esc_js( 'javascript:void(0)' ); ?>"><i class="icon-15874"></i></a>
				<div class="quickLinks-layout">
					<div class="quickLinks-address">
						<h6 class="tt-title"><?php echo caleader_kses_basic( $header_phone_title ); ?></h6>
						<ul>
							<li>
								<a href="tel:<?php echo wp_specialchars_decode( $header_phone ); ?>"><i
										class="icon-15874"></i><?php echo caleader_kses_basic( $header_phone ); ?></a>
							</li>
							<li>
								<i class="icon-icon"></i> <?php echo caleader_kses_basic( $header_time ); ?>
							</li>
							<li>
								<a href="<?php echo esc_url( 'mailto:' . $header_mail ); ?>"><i class="icon-mail"></i>
			<?php echo caleader_kses_basic( $header_mail ); ?></a>
							</li>
		<?php
		if ( isset( $header_address_wapp ) & $header_address_wapp != '' ) {
			?>
							<li>
								<a
									href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( $header_address_wapp ); ?>">
									<i
										class="icon-whatsapp"></i><?php echo caleader_kses_basic( $header_address_wapp ); ?>
								</a>
							</li>
		<?php } ?>
						</ul>
					</div>
				</div>
			</div>

			<?php if ( $add_your_item_btn ) { ?>

			<div class="col">
				<?php
				if ( $add_button_func == 'shortcode' ) {
					?>
									<a data-toggle="modal" data-target="#modalAddYourItem" class="btn-toggle no-popup"
					href="<?php echo esc_js( 'javascript:void(0)' ); ?>"><i class="icon-addcar"></i></a>
							<?php
				} else {
					$add_button_url = caleader_options( 'add_button_url' );

					if ( ! isset( $add_button_url ) || $add_button_url == '' ) {
						$add_button_url = home_url();
					}
					?>
									<a class="btn-toggle no-popup" 
					href="<?php echo esc_url( $add_button_url ); ?>"><i class="icon-addcar"></i></a>
						</a>
							<?php
				}
				?>
				
			</div>

			<?php } ?>

	<?php
	if ( $top_bar_menu ) {
		?>
			<div class="col tt-account">
				<a class="btn-toggle is-popup tt-account" href="<?php echo esc_js( 'javascript:void(0)' ); ?>">
					<i class="icon-user"></i>
				</a>
				<div class="tt-dropdown-menu">
					<div class="tt-row-close">
						<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-btn-close icon-close"></a>
					</div>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'account-menu',
				'menu_class'     => 'nav navbar-nav',
				'container'      => 'ul',
			)
		);
		?>
				</div>
			</div>

	<?php } ?>

			<div class="col tt-searcher">
				<a class="btn-toggle is-popup tt-searcher" href="<?php echo esc_js( 'javascript:void(0)' ); ?>">
					<i class="icon-musica-searcher"></i>
				</a>
				<div class="tt-dropdown-menu">
					<div class="container">
		<?php get_template_part( 'template-part/top-search' ); ?>
					</div>
				</div>
			</div>

	<?php if ( $top_header_cart ) { ?>

		<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			<div class="col tt-cart head-cart">
			<?php $count = WC()->cart->cart_contents_count; ?>
				<div class="cart-count-wrap">
					<a class="tt-dropdown-toggle cart-contents cart-count hidden-xs"
						href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
						title="<?php esc_attr_e( 'View your shopping cart', 'caleader' ); ?>">
			<?php
			if ( $count > 0 ) {
				?>
						<i class="icon-cart"></i>
						<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
				<?php
			} else {
				?>
						<i class="icon-cart"></i>
			<?php } ?>
					</a>

					<a class="btn-toggle is-popup cart-count visible-xs"
						href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
						title="<?php esc_attr_e( 'View your shopping cart', 'caleader' ); ?>">
			<?php if ( $count > 0 ) { ?>
						<i class="icon-cart"></i>
						<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
			<?php } else { ?>
						<i class="icon-cart"></i>
			<?php } ?>
					</a>
				</div>
				<div class="tt-dropdown-menu mini-cart-head">
					<h6 class="tt-dropdown-title">
						<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-btn-close icon-close"></a>
			<?php echo esc_html__( 'Products in Cart', 'caleader' ); ?>
					</h6>
			<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
		</div>
	</div>
</div>
