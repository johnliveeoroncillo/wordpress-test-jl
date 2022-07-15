<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!--  only change p tag to span tag  -->
<div class="tt-sort-total">

<?php
if ( 1 === $total ) {
	_e( 'Showing the single result', 'caleader' );
} elseif ( $total <= $per_page || -1 === $per_page ) {
	/* translators: %d: total results */
	echo esc_html__( 'Showing all ', 'caleader' ) . $total . esc_html__( ' results', 'caleader' );

} else {
	$first = ( $per_page * $current ) - $per_page + 1;
	$last  = min( $total, $per_page * $current );
	/* translators: 1: first result 2: last result 3: total results */
	echo esc_html__( 'Showing ', 'caleader' ) . $first . ' ' . $last . esc_html__( ' of ', 'caleader' ) . $total . esc_html__( ' results', 'caleader' );
}
?>

</div>
