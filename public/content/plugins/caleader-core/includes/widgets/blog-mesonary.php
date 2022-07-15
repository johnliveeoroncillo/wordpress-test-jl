<?php
class Blogmesonary extends \Elementor\Widget_Base {

	public function get_name() {
		return 'blog_mesonari';
	}
	public function get_title() {
		return esc_html__( 'Blog Mesonary', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Blog', 'caleader-core' ),
			]
		);
		$this->add_control(
			'extra_class',
			[
				'label' => esc_html__( 'Extra Class', 'caleader-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$args     = array(
			'post_type'   => array( 'post' ),
			'post_status' => array( 'publish' ),
			'nopaging'    => true,
			'orderby'     => 'ID',
			'order'       => 'DESC',
		);
		?>
		<div class="tt-blog-masonry">
			<div class="tt-blog-init tt-grid-col-3 tt-layout-01-post tt-add-item" >
			<?php
				$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
						<div class="element-item">
						<?php
						get_template_part( 'post-formats/content', get_post_format() );
						?>
						</div>
					<?php
				}
			}
			?>
			</div>
		</div>
		<?php
	}
	protected function content_template() {    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Blogmesonary() );
