<?php 

require_once WP_PLUGIN_DIR . '/caleader-listing/includes/CarleaderAdminColoumn.php';
class CarleaderListingCustom extends CarleaderAdminColumns {

    public function __construct() {
        parent::__construct();
        if (isset($_GET['post_id']) && isset($_GET['featured'])) {
            $featured = (!empty($_GET['featured']) ? 1 : 0);
            update_post_meta($_GET['post_id'], '_carleader_listing_featured', $featured);
            header('location: '.$_GET['redirect']);
            exit;
        }
	}

	public function columns( $columns ) {
		$columns['featured']   = esc_html__( 'Featured', 'caleader-listing' );
		return $columns;
	}

	public function show( $column_name, $post_id ) {
		if ( $column_name == 'featured' ) {
			$featured = carleader_listings_meta( 'featured', $post_id );
            echo '<a href="'.$_SERVER['REQUEST_URI'].'&post_id='.$post_id .'&featured='. !$featured .'&redirect='.$_SERVER['REQUEST_URI'].'">';
			if (!empty($featured)) echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2271b1" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>';
            else  echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="transparent" stroke="#313131"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>';
            echo '</a>';
		}
	}
}

new CarleaderListingCustom();