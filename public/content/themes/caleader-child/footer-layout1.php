<?php
$foot_map          = caleader_footer( 'footer_map' );
$footer_back_image = caleader_footer( 'footer_back_image' );
$lat               = caleader_footer( 'lattitude' );
$long              = caleader_footer( 'longi' );
$footer_menu_show  = caleader_footer( 'footer_menu_show' );
$footer_system     = caleader_footer( 'footer_system' );

if ( ! isset( $footer_system ) || $footer_system == '' ) {
	$footer_system = 'default';
}

if ( ! isset( $footer_menu_show ) || $footer_menu_show == '' ) {
	$footer_menu_show = false;
}

$foot_image_class = '';
$no_color_class   = '';

if ( $footer_back_image != '' ) {
	$foot_image_class = ' foot_back_image';
	$no_color_class   = ' no_color';
}

$footermargin = ' ';

$check_caleader_post_type = false;
$is_service_singular      = false;

if ( has_action( 'caleader_listings_check_post_type' ) ) {
	do_action_ref_array( 'caleader_listings_check_post_type', array( &$check_caleader_post_type ) );

}
if ( has_action( 'caleader_sevice_is_singular' ) ) {
	do_action_ref_array( 'caleader_sevice_is_singular', array( &$is_service_singular ) );
}

if ( $check_caleader_post_type || $is_service_singular ) {
	$footermargin = 'nomargin';
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


<footer id="tt-footer" class="<?php echo esc_attr( $footermargin ); ?><?php echo esc_attr( $foot_image_class ); ?>">
	<?php
	if ( $foot_map == '1' ) {
		get_template_part( 'footer-map' );
	}
	?>
	<div class="tt-footer-layout bg-white <?php echo esc_attr( $no_color_class ); ?>">
		<div class="container">

        <div class="row text-dark">
            <div class="col col-12 col-md-6 col-lg-4 d-flex flex-column">
                <?php caleader_footer_logo(); ?>
                <?php $copyright = caleader_footer( 'copyright' ); ?>
                <small class="mt-3 text-gray-200">&copy; 
                    <?php //echo caleader_kses_basic( $copyright ); ?>
                    2022 Carsada. All rights reserved
                </small>
                <ul class="tt-social-icon padding-o mt-3 mx-auto mx-md-0">
                    <?php
                    foreach ( $social_array as $social ) {
                        ?>
                        <li class="mr-2 mr-md-3 ml-2 ml-md-0"><a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" class="<?php echo esc_attr( $social['icon'] ); ?>"></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <a href="mailto:support@carsada.com" class="text-primary mt-3 mb-3 mb-md-5 font-weight-bold">support@carsada.com</a>
            </div>
            <div class="col col-12 col-md-6 col-lg-4">
                <?php caleader_footer_menu(); ?>
            </div>
            <div class="col col-12 col-md-12 col-lg-4">
                <?=do_shortcode('[mc4wp_form name="Newsletter"]');?>
            </div>
        </div>

	<?php if ( $footer_menu_show ) { ?>
		<?php if ( function_exists( 'caleader_footer_menu' ) ) : ?>
			<div class="row justify-content-center">
				<div id="tt-footer-menu">
			<?php caleader_footer_menu(); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php } ?>
			<div class="row justify-content-center d-none">
				<div class="col col-auto">
	<?php caleader_footer_logo(); ?>
				</div>
			</div>
	<?php
	if ( $footer_system == 'default' ) {
		if ( is_active_sidebar( 'footer_sideber_1' ) ) {
			?>
			<div class="footer-dynamic-sidebar footer-widget-up-01">
			<?php
			dynamic_sidebar( 'footer_sideber_1' );
			?>
			</div>
			<?php
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
	<?php
	$copyright              = caleader_footer( 'copyright' );
	$privacy                = caleader_footer( 'privacy' );
	$privacy_link           = caleader_footer( 'privacy_link' );
	$tremsandcondition      = caleader_footer( 'tremsandcondition' );
	$tremsandcondition_link = caleader_footer( 'tremsandcondition_link' );
	?>
	<div class="tt-footer-copyright d-none">
		<div class="container">
			<span>&copy; <?php echo caleader_kses_basic( $copyright ); ?></span>
	<?php
	if ( $privacy_link != '' ) {
		?>
			<a href="<?php echo esc_url( $privacy_link ); ?>"><?php echo caleader_kses_basic( $privacy ); ?></a>
		<?php
	}
	if ( $tremsandcondition != '' ) {
		?>
			<a
				href="<?php echo esc_url( $tremsandcondition_link ); ?>"><?php echo caleader_kses_basic( $tremsandcondition ); ?></a>
		<?php
	}
	?>
		</div>
	</div>
</footer>
