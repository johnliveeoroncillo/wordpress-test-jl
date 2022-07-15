<?php
$custom_logo_id       = get_theme_mod( 'custom_logo' );
$logo                 = wp_get_attachment_image_src( $custom_logo_id, 'full' );
$header_transparent   = caleader_options( 'header_transparent' );
$top_header_visiblity = caleader_options( 'top_header_visiblity' );
$add_your_item_btn    = caleader_options( 'add_your_item_btn' );
$add_button_func      = caleader_options( 'add_button_func' );
$top_bar_menu         = caleader_options( 'top_bar_menu' );
$top_header_cart      = caleader_options( 'top_header_cart' );
$top_header_search    = caleader_options( 'top_header_search' );

if ( ! isset( $top_header_search ) || $top_header_search == '' ) {
	$top_header_search = false;
}

if ( ! isset( $add_button_func ) || $add_button_func == '' ) {
	$add_button_func = 'shortcode';
}



$top_header_class = '';
if ( is_front_page() && ! is_home() && ( $header_transparent == '1' ) ) {
	$top_header_class = 'tt-on-top';
}
?>
<?php get_template_part( 'template-part/header/nav' ); ?>
<header id="tt-header" class="<?php echo esc_attr( $top_header_class ); ?>  tt-header-01">
	<?php if ( $top_header_visiblity == 1 ) { ?>
	<!-- quickLinks -->
	<div class="tt-quickLinks-popup">
	</div>
		<?php get_template_part( 'template-part/header_top_contact_mobile' ); ?>
	<!-- panel-info -->
	<div class="tt-panel-info">
		<div class="container">
			<div class="row no-gutters align-items-center">
				<div class="col-auto mr-auto">
					<?php get_template_part( 'template-part/header_top_contact' ); ?>
				</div>
				<div class="col-auto head-cart">
					<?php
					if ( is_active_sidebar( 'top_lang_sidebar' ) ) {
						?>
						<?php
						dynamic_sidebar( 'top_lang_sidebar' );
						?>
						<?php
					}
					?>
					<?php
					if ( $top_header_search ) {
						?>
					<div class="tt-dropdown-obj tt-searcher">
						<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-dropdown-toggle">
							<i class="icon-musica-searcher"></i>
						</a>
						<div class="tt-dropdown-menu">
							<div class="container">
							<?php get_template_part( 'template-part/top-search' ); ?>
							</div>

						</div>
					</div>
						<?php
					}
					?>
					<?php
					if ( $top_bar_menu ) {
						?>
					<div class="tt-dropdown-obj tt-account">
						<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-dropdown-toggle">
							<i class="icon-user"></i>
						</a>
						<div class="tt-dropdown-menu">
							<div class="tt-row-close">
								<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
									class="tt-btn-close icon-close"></a>
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
					<div class="tt-dropdown-obj tt-compare">
						<?php
						$compare_plugin = caleader_options( 'compare_plugin' );
						if ( $compare_plugin == '1' ) {
							echo do_shortcode( '[caleader_compare]' );
						}
						?>
					</div>
					<?php if ( $top_header_cart ) { ?>

					<div class="tt-dropdown-obj tt-cart ">
						<?php if ( class_exists( 'WooCommerce' ) ) { ?>
							<?php $count = WC()->cart->cart_contents_count; ?>
						<div class="cart-count-wrap">
							<a class="btn-toggle tt-dropdown-toggle is-popup cart-count"
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
								<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
									class="tt-btn-close icon-close"></a>
								<?php echo esc_html__( 'Products in Cart', 'caleader' ); ?>
							</h6>
							<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php } ?>

	<!-- header-holder -->
	<div class="header-holder">
		<div class="container">
			<div class="row align-items-center no-gutters">
				<!--logo-->

				<!--desctope-menu-->

				<!--btn toggle modal-->

				<!--btn toggle mobile menu-->
				<div class="col-logo col-auto">
					<a class="tt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						if ( has_custom_logo() ) {
							?>
						<img src="<?php echo esc_url( $logo[0] ); ?>"
							alt="<?php echo esc_attr__( 'Logo', 'caleader' ); ?>">
							<?php
						} else {
							?>
						<img src="<?php echo esc_url( CALEADER_IMG_URL . 'logo-dark.svg' ); ?>"
							alt="<?php echo esc_attr__( 'Logo', 'caleader' ); ?>">
							<?php
						}
						?>


					</a>
				</div>
				<div class="col-menu col-auto ml-auto">
					<div class="tt-desctop-menu" id="tt-desctop-menu">
						<nav>
							<?php echo caleader_primary_menu(); ?>
						</nav>
					</div>
				</div>
				<?php if ( $add_your_item_btn ) { ?>
				<div class="col-btn-toggle-modal col-auto">
					
						<?php
						if ( $add_button_func == 'shortcode' ) {
							?>
									<a class="btn btn-toggle-modal" href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
						data-toggle="modal" data-target="#modalAddYourItem"><i class="icon-addcar"></i><span
							class="tt-text"><?php echo esc_html__( 'add your item', 'caleader' ); ?></span>
						</a>
									<?php
						} else {
							$add_button_url = caleader_options( 'add_button_url' );

							if ( ! isset( $add_button_url ) || $add_button_url == '' ) {
								$add_button_url = home_url();
							}
							?>
									<a class="btn btn-toggle-modal" href="<?php echo esc_url( $add_button_url ); ?>"><i class="icon-addcar"></i><span
							class="tt-text"><?php echo esc_html__( 'add your item', 'caleader' ); ?></span>
						</a>
									<?php
						}
						?>
				</div>
				<?php } ?>
				<div class="col-menu-toggle col-auto">
					<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-menu-toggle icon-menu"></a>
				</div>
			</div>
		</div>
	</div>
	<!-- stuck nav -->

	<?php

	$sticky_header = caleader_options( 'sticky_header' );
	if ( $sticky_header ) {
		?>
	<div id="tt-stuck" class="">
		<div class="container">
			<div class="tt-stuck-row">
			</div>
		</div>
	</div>
		<?php
	}

	?>


</header>
