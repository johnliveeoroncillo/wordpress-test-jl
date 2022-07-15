<?php
$footer_map        = caleader_footer( 'footer_map' );
$footer_back_image = caleader_footer( 'footer_back_image' );
$footer_menu_show  = caleader_footer( 'footer_menu_show' );
$footer_system     = caleader_footer( 'footer_system' );

if ( ! isset( $footer_system ) || $footer_system == '' ) {
	$footer_system = 'default';
}

$foot_image_class = '';
$no_color_class   = '';

if ( $footer_back_image != '' ) {
	$foot_image_class = ' foot_back_image';
	$no_color_class   = ' no_color';
}

if ( ! isset( $footer_menu_show ) || $footer_menu_show == '' ) {
	$footer_menu_show = false;
}


if ( $footer_map == '1' ) {
	$footermargin = 'tt-footer-02';
} else {
	$footermargin = 'tt-footer-02 container-indent-03';
}
?>
<footer id="tt-footer" class="<?php echo esc_attr( $footermargin ); ?><?php echo esc_attr( $foot_image_class ); ?>">
	<?php
	if ( $footer_map == '1' ) {
		get_template_part( 'footer-map' );
	}
	?>
	<div class="tt-footer-layout <?php echo esc_attr( $no_color_class ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-3 col-lg-4">
					<?php
					caleader_footer_logo();
					if ( is_active_sidebar( 'moto_footer_logo' ) ) {
						dynamic_sidebar( 'moto_footer_logo' );
					}
					$social_array = array();

					$socialfb      = caleader_footer( 'socialfb' );
					$socialtw      = caleader_footer( 'socialtw' );
					$socialgp      = caleader_footer( 'socialgp' );
					$socialig      = caleader_footer( 'socialig' );
					$socialyt      = caleader_footer( 'socialyt' );
					$socialvk      = caleader_footer( 'socialvk' );
					$socialvm      = caleader_footer( 'socialvm' );
					$socialwhtsapp = caleader_footer( 'socialwhtsapp' );
					$socialli      = caleader_footer( 'socialli' );
					$socialsk      = caleader_footer( 'socialsk' );
					$socialam      = caleader_footer( 'socialam' );

					if ( $socialfb != '' ) {
						$social_array['socialfb']['url']  = $socialfb;
						$social_array['socialfb']['icon'] = 'icon-226234';
					}

					if ( $socialtw != '' ) {
						$social_array['socialtw']['url']  = $socialtw;
						$social_array['socialtw']['icon'] = 'icon-8800';
					}

					if ( $socialgp != '' ) {
						$social_array['socialgp']['url']  = $socialgp;
						$social_array['socialgp']['icon'] = 'icon-733613';
					}

					if ( $socialig != '' ) {
						$social_array['socialig']['url']  = $socialig;
						$social_array['socialig']['icon'] = 'icon-instagram';
					}

					if ( $socialyt != '' ) {
						$social_array['socialyt']['url']  = $socialyt;
						$social_array['socialyt']['icon'] = 'icon-youtube';
					}

					if ( $socialvk != '' ) {
						$social_array['socialvk']['url']  = $socialvk;
						$social_array['socialvk']['icon'] = 'icon-vk';
					}

					if ( $socialvm != '' ) {
						$social_array['socialvm']['url']  = $socialvm;
						$social_array['socialvm']['icon'] = 'icon-vimeo';
					}

					if ( $socialwhtsapp != '' ) {
						$social_array['socialwhtsapp']['url']  = $socialwhtsapp;
						$social_array['socialwhtsapp']['icon'] = 'icon-whatsapp';
					}

					if ( $socialli != '' ) {
						$social_array['socialli']['url']  = $socialli;
						$social_array['socialli']['icon'] = 'icon-linkedin2';
					}

					if ( $socialsk != '' ) {
						$social_array['socialsk']['url']  = $socialsk;
						$social_array['socialsk']['icon'] = 'icon-skype';
					}

					if ( $socialam != '' ) {
						$social_array['socialam']['url']  = $socialam;
						$social_array['socialam']['icon'] = 'icon-amazon';
					}
					?>
					<?php
					$count      = 0;
					$flag_multi = 0;
					foreach ( $social_array as $social ) {
						if ( $count == 0 ) {
							if ( $flag_multi == 0 ) {
								?>
								<ul class="tt-social-icon hidden-xs">
										<?php
							} else {
								?>
					<ul class="tt-social-icon multiple-row-social hidden-xs">
								<?php
							}
						}
						?>
						<li><a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank"
								class="<?php echo esc_attr( $social['icon'] ); ?>"></a></li>
						<?php
						if ( $count == 3 ) {
							$count      = 0;
							$flag_multi = 1;
							?>
					</ul>

							<?php
						} else {
							$count++;
						}
					}
					if ( $count < 3 ) {
						?>
					</ul>

						<?php
					}
					?>
				</div>

				<div class="col-12 col-md-9 col-lg-8">
					<?php if ( $footer_menu_show ) { ?>
					<div id="tt-footer-menu">
						<?php caleader_footer_menu(); ?>
					</div>
					<?php } ?>
					<?php
					if ( $footer_system == 'default' ) {
						if ( is_active_sidebar( 'footer_sideber_1' ) ) {
							dynamic_sidebar( 'footer_sideber_1' );
						}
					} else {
						$footer_elementor = caleader_footer( 'footer_elementor_template' );

						$footer_template = '';
						if ( class_exists( '\\Elementor\\Plugin' ) ) {
							$pluginElementor = \Elementor\Plugin::instance();
							$footer_template = $pluginElementor->frontend->get_builder_content( $footer_elementor );
							echo do_shortcode( $footer_template );
						}
					}
					?>
				</div>
			</div>
			<div class="row justify-content-center visible-xs">
				<div class="col col-auto">
				<?php
					$count      = 0;
					$flag_multi = 0;
				foreach ( $social_array as $social ) {
					if ( $count == 0 ) {
						if ( $flag_multi == 0 ) {
							?>
								<ul class="tt-social-icon">
									<?php
						} else {
							?>
					<ul class="tt-social-icon multiple-row-social">
							<?php
						}
					}
					?>
						<li><a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank"
								class="<?php echo esc_attr( $social['icon'] ); ?>"></a></li>
						<?php
						if ( $count == 3 ) {
							$count      = 0;
							$flag_multi = 1;
							?>
					</ul>

							<?php
						} else {
							$count++;
						}
				}
				if ( $count < 3 ) {
					?>
					</ul>

					<?php
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
	$copyright              = caleader_footer( 'copyright' );
	$privacy                = caleader_footer( 'privacy' );
	$privacy_link           = caleader_footer( 'privacy_link' );
	$tremsandcondition      = caleader_footer( 'tremsandcondition' );
	$tremsandcondition_link = caleader_footer( 'tremsandcondition_link' );
	?>
	<div class="container">
		<div class="tt-footer-bottom  <?php echo esc_attr( $no_color_class ); ?>">
			<div class="tt-col-left">
				<span>&copy; <?php echo caleader_kses_basic( $copyright ); ?></span>
			</div>
			<div class="tt-col-right">
				<ul class="tt-list">
					<?php if ( $privacy_link != '' ) { ?>
					<li><a
							href="<?php echo esc_url( $privacy_link ); ?>"><?php echo caleader_kses_basic( $privacy ); ?></a>
					</li>
					<?php } ?>
					<?php if ( $tremsandcondition_link != '' ) { ?>
					<li><a
							href="<?php echo esc_url( $tremsandcondition_link ); ?>"><?php echo caleader_kses_basic( $tremsandcondition ); ?></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</footer>
