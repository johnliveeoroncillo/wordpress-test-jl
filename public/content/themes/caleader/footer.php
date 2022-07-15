<?php
$back_to_top = caleader_footer( 'back_to_top' );
$layout      = caleader_footer( 'footer_style' );
if ( $layout == '' ) {
	$layout = 'layout1';
}
get_template_part( 'footer-' . $layout );

if ( $back_to_top == '1' ) {
	get_template_part( 'back-to-top' );
}

get_template_part( 'template-part/modal-test-drive' );
get_template_part( 'template-part/modal-add-item' );
wp_footer();
?>
</body>
</html>
