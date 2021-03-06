<?php
class Shortcodes {
	public function __construct() {
		add_filter( 'wp', [ $this, 'has_shortcode' ] );
		add_shortcode( 'carleader_listings_listing', [ $this, 'listing' ] );
		add_shortcode( 'carleader_listings_listings', [ $this, 'listings' ] );
	}
	/**
	 * Check if we have the shortcode displayed
	 */
	public function has_shortcode() {
		global $post;
		if ( ! is_a( $post, 'WP_Post' ) ) {
			return;
		}
		if ( has_shortcode( $post->post_content, 'carleader_listings_listings' ) ||
		     has_shortcode( $post->post_content, 'carleader_listings_listings' ) ||
		     has_shortcode( $post->post_content, 'carleader_listings_listings' )
		) {
			add_filter( 'is_auto_listings', '__return_true' );
		}
		if ( has_shortcode( $post->post_content, 'carleader_listings_listings' ) ) {
			add_filter( 'is_listing', '__return_true' );
		}
	}
	/**
	 * Display a single listing.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function listing( $atts ) {
		$atts = shortcode_atts( [
			'id' => 0,
		], $atts );
		$args  = [
			'post_type'      => 'carleader-listing',
			'posts_per_page' => 1,
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'p'              => $atts['id'],
		];
		$query = new \WP_Query( apply_filters( 'carleader_listings_shortcode_listing_query', $args, $atts ) );
		if ( ! $query->have_posts() ) {
			return '';
		}
		ob_start();
		?>
		<div id="listing-<?php the_ID(); ?>" class="carleader-listings-single">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				// <?php auto_listings_get_part( 'content-single-listing.php' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
	}
	/**
	 * List multiple listings shortcode.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function listings( $atts ) {
		$atts = shortcode_atts( [
			'orderby' => 'date',
			'order'   => 'asc',
			'number'  => '20',
			'seller'  => '', // id of the seller
			'ids'     => '',
			'compact' => '',
		], $atts );
		$query_args = [
			'post_type'           => 'carleader-listing',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'posts_per_page'      => $atts['number'],
		];
		if ( ! empty( $atts['ids'] ) ) {
			$query_args['post__in'] = array_map( 'trim', explode( ',', $atts['ids'] ) );
		}
		// if we are in compact mode
		if ( ! empty( $atts['compact'] ) && $atts['compact'] == 'true' ) {
			remove_action( 'auto_listings_listings_loop_item', 'auto_listings_template_loop_at_a_glance', 40 );
			remove_action( 'auto_listings_listings_loop_item', 'auto_listings_template_loop_description', 50 );
			add_filter( 'post_class', [ $this, 'listings_compact_mode' ] );
		}
		return $this->listing_loop( $query_args, $atts, 'listings' );
	}
	/**
	 * Add the compact class to the listings
	 *
	 * @param array $classes Post classes.
	 *
	 * @return array
	 */
	public function listings_compact_mode( $classes ) {
		$classes[] = 'compact';
		return $classes;
	}
	/**
	 * Loop over found listings.
	 *
	 * @param  array  $query_args
	 * @param  array  $atts
	 * @param  string $loop_name
	 *
	 * @return string
	 */
	protected function listing_loop( $query_args, $atts, $loop_name ) {
		$query = new \WP_Query( apply_filters( 'carleader_listings_shortcode_listings_query', $query_args, $atts, $loop_name ) );
		if ( ! $query->have_posts() ) {
			ob_start();
			do_action( "carleader_listings_shortcode_{$loop_name}_loop_no_results" );
			return ob_get_clean();
		}
		ob_start();
		?>
		<?php do_action( "carleader_listings_shortcode_before_{$loop_name}_loop" ); ?>
		<ul class="carleader-listings-items">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php auto_listings_get_part( 'content-listing.php' ); ?>
			<?php endwhile; ?>
		</ul>
		<?php do_action( "carleader_listings_shortcode_after_{$loop_name}_loop" ); ?>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
	}
}
new Shortcodes();