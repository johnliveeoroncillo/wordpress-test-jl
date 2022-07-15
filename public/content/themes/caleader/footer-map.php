<?php
$layout            = caleader_footer( 'footer_style' );
$footer_back_image = caleader_footer( 'footer_back_image' );
$map_image         = caleader_footer( 'map_image' );
$layout            = 'layout1';
if ( $layout == 'layout1' ) {
	$map_icon = 'tt-btn-toggle';
} elseif ( $layout == 'layout2' ) {
	$map_icon = 'tt-btn-toggle tt-style-02';
}
$foot_image_class = '';
if ( $footer_back_image != '' ) {
	$foot_image_class = 'no_color';
}

?>
<div class="tt-mobile-hidden">
	<div class="tt-map <?php echo esc_attr( $foot_image_class ); ?>">
		<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="<?php echo esc_attr( $map_icon ); ?>"></a>
		<div class="tt-box-map">
			<?php
			$footer_map_type = caleader_options( 'footer_map_type', 'image' );
			if ( $footer_map_type == 'map' ) {
				?>
			  <div id="googleMapFooter" class="google-map"></div>
			<?php } else { ?>
				 <img src="<?php echo esc_url( $map_image ); ?>" alt="<?php echo esc_attr__( 'Image', 'caleader' ); ?>">
				<?php
			}
			?>
		</div>
	</div>
</div>
