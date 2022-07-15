<?php
/**
 * Ordering
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/orderby.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
if ( 1 === $wp_query->found_posts ) {
	return;
}


$orderby   = carleader_listings_option( 'inv_orderby' );

if(!isset($orderby) || $orderby == ''){
	$orderby = 'date';
}

$orderby         = isset( $_GET['orderby'] ) ? esc_html__( $_GET['orderby'] ) : $orderby;
$orderby_options = apply_filters(
	'carleader_listings_listings_orderby',
	array(
		'date'       => esc_html__( 'New First', 'caleader-listing' ),
		'date-old'   => esc_html__( 'Old First', 'caleader-listing' ),
		'price'      => esc_html__( 'Price (Low to High)', 'caleader-listing' ),
		'price-high' => esc_html__( 'Price (High to Low)', 'caleader-listing' ),
	)
);
$page_url        = caleader_listing_get_url();
$archive_style   = carleader_listings_option( 'archive_style' );
$result_count    = carleader_listings_option( 'result_count' );
if ( ! isset( $archive_style ) || $archive_style == '' ) {
	$archive_style = 'grid';
}
if ( ! isset( $result_count ) || $result_count == '' ) {
	$result_count = 1;
}

if ( isset( $_GET['showstyle'] ) ) {
	if ( $_GET['showstyle'] != '' ) {
		$archive_style = $_GET['showstyle'];
	}
}

?>
<form class="carleader-listings-ordering tt-sort tt-col" method="get" action="<?php echo $page_url; ?>">
	<input class="showclass" type="hidden" name="showstyle" value="<?php echo $archive_style; ?>">
	<div class="tt-skinSelect-01">
		<select name= "orderby" class="tt-select tt-skin-01">
			<?php foreach ( $orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>
		<?php if ( $result_count ) { ?>
		<div class="tt-sort-total">
			<?php			
				$post_per_page = 9;
				
				$parent = ['key' => 'car_variant_parent_car', 'value' => ''];
				$condition = isset($_GET['condition'])? ['key' => '_carleader_listing_condition', 'value' => $_GET['condition']] : [];
				$the_year = isset($_GET['the_year'])? ['key' => '_carleader_listing_model_year', 'value' => $_GET['the_year']] : [];
				$make = isset($_GET['make'])? ['key' => '_carleader_listing_make_display', 'value' => $_GET['make']] : [];
				// $model_transmission_type = isset($_GET['model_transmission_type'])? ['key' => '_carleader_listing_model_transmission_type', 'value' => $_GET['model_transmission_type']] : [];
				// $model_transmission_type = isset($_GET['drivetrain'])? ['key' => 'drivetrain', 'value' => $_GET['drivetrain']] : [];
				
				$args = array(
					'numberposts' => $post_per_page,
					'post_type' => 'carleader-listing',
					'meta_query' => array(
						$condition,
						$the_year,
						$make,
						// $parent,
					),
					'post_parent' => 0,					
				);

				$args2 = array(
					'post_type' => 'carleader-listing',
					'post_parent' => 0,		
					'meta_query' => array(
						$condition,
					),			
				);

				// var_dump(count(get_posts($args)));die;
				$post_count = $wp_query->post_count;
				$post_count2 = count(get_posts($args2));
				$total_count = count(get_posts($args));
				$post_count = $post_count > $total_count? $post_count2 : $post_count;
				// $total_count = ($post_count > $post_per_page)? $total_count : $post_count;
			?>		
			<strong><?php echo $post_count; ?></strong> <?php echo esc_html__( 'Results of ', 'caleader-listing' ); ?><strong><?php echo $total_count; ?></strong>				
		</div>
		<?php } ?>
	</div>
	<?php
		// Keep query string vars intact
	foreach ( $_GET as $key => $val ) {
		if ( 'orderby' === $key || 'submit' === $key ) {
			continue;
		}
		if ( is_array( $val ) ) {
			foreach ( $val as $innerVal ) {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
			}
		} else {
			if ( $key != 'showstyle' ) {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	}
	?>
</form>
