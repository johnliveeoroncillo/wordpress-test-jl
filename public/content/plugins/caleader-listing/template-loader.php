<?php
class TemplateLoader {

	public function __construct() {
		 add_filter( 'template_include', array( $this, 'template_include' ) );
	}
	public function template_include( $template ) {
		 $file = '';
		if ( is_single() && get_post_type() == 'carleader-listing' ) {
			$file = 'single-carleader-listing.php';
		}
		if ( is_listing_archive()
			|| is_listing_search()
		) {
			$file = 'archive-carleader-listing.php';
		} elseif ( is_listing_taxonomy() ) {
			$taxonomyName = get_query_var( 'taxonomy' );
			if ( $taxonomyName == 'body-type' ) {
				$file = 'taxonomy-body-type.php';
			} elseif ( $taxonomyName == 'make-brand' ) {
				$file = 'taxonomy-make-brand.php';
			}
		}
		$file = apply_filters( 'carleader_listings_template_file', $file );
		if ( ! $file ) {
			return $template;
		}
		$template = carleader_listings_get_part( $file );

		return $template;
	}
}
new TemplateLoader();
