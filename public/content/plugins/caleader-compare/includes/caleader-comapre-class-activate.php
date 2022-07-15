<?php
namespace CALEADER_COMPARE\includes\CompareClassActivate;

class Caleader_Compare_Activate {

	public static function carleader_compare_activation_func() {
		file_put_contents( __DIR__ . '/my_log.txt', ob_get_contents() );
	}

	public static function caleader_compare_create_page() {

		$exist_page = get_page_by_title( 'comparing', 'page' );

		if ( $exist_page == null ) {
			$post_details = array(
				'post_title'   => esc_html__( 'Comparing', 'caleader-compare' ),
				'post_content' => '[caleader_compare_result]',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_type'    => 'page',
			);
			wp_insert_post( $post_details );
		}
	}

}
