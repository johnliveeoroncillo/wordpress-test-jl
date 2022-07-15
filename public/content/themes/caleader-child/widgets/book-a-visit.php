<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
class CarsadaBookVisitForm extends Widget_Base {

	public function get_name() {
		return 'carsada_book_visit_form';
	}
	public function get_title() {
		return esc_html__( 'Carsada Book Visit Form', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-calendar';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'Carsada Book Visit Form', 'caleader-core' ),
			]
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings           = $this->get_settings();
		$settings           = $this->get_settings_for_display();

		ob_start();
        include(BASE_PATH .'/template-part/forms/book-a-visit.php');
        $content = ob_get_clean();
		echo $content;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new CarsadaBookVisitForm() );
?>
