<?php
function caleader_get_custom_colors() {
	$top_bar_color         = caleader_options( 'top_bar_color' );
	$footer_bottom_color         = caleader_options( 'footer_bottom_color' );
	$copy_text_color         = caleader_options( 'copy_text_color' );
	$caleader_custom_css = '';

		ob_start();
		?>
#tt-header.tt-header-01 .tt-panel-info {
background-color: <?php echo esc_attr( $top_bar_color ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-footer-copyright {
background-color: <?php echo esc_attr( $footer_bottom_color ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-footer-copyright {
color: <?php echo esc_attr( $copy_text_color ); ?> !important;
}
<?php

	$caleader_custom_css = ob_get_clean();
	return $caleader_custom_css;

}

?>