<?php
namespace CarLeader;

class Element {
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
	}
	public function widgets_registered() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
			require_once CAR_LEADER_INCLUDES . '/widgets/testimonial-widget.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/our-staff-widget.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/make-it-easy.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/we-offer.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/IconBox.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-header.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-video.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-counter.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-news.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-services.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/slickslider.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-faq.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-infobox.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/weekly-specials.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/weekly-specials-two.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/types-of-vehicle.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/brows-by-type.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/ws-short-struct.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/blog-mesonary.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/parallax-image.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-about-tab.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/carleader-reviews.php';
			if ( class_exists( 'carleaderListing' ) ) {
				require_once CAR_LEADER_INCLUDES . '/widgets/caleader-product-list-addon.php';
			}
			require_once CAR_LEADER_INCLUDES . '/widgets/footer_contact.php';
			require_once CAR_LEADER_INCLUDES . '/widgets/footer_schedule.php';
		}
	}
}
