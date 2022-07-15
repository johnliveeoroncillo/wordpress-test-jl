<?php
  use Elementor\Utils;

class CarleaderAboutTab extends \Elementor\Widget_Base {




	public function get_name() {
		return 'CarleaderAboutTab';
	}

	public function get_title() {
		return esc_html__( 'About Tab', 'caleader-core' );
	}

	public function get_icon() {
		return '';
	}

	public function get_categories() {
		return array( 'Carleader' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'abouttab',
			array(
				'label' => __( 'About tab', 'caleader-core' ),
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'tab_cat',
			array(
				'label'   => __( 'Tab Category', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Architecture', 'caleader-core' ),

			)
		);
		$repeater->add_control(
			'tab_content',
			array(
				'label' => __( 'Tab Content', 'caleader-core' ),
				'type'  => \Elementor\Controls_Manager::WYSIWYG,

			)
		);
		$repeater->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'items1',
			array(
				'label'   => __( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => __( 'Title #1', 'caleader-core' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
					array(
						'list_title'   => __( 'Title #2', 'caleader-core' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
				),
			)
		);
		$this->end_controls_section();

	}   protected function render() {
		$settings = $this->get_settings_for_display();
		$items1   = $settings['items1'];

		?>




<div class="tt-product-page__tabs tt-tabs-02 js-tabs">
	<div class="tt-tabs__head">
		<?php
		$category_arr       = array();
		$category_arr_class = array();
		foreach ( $items1 as $key => $item ) {
			$cat                        = $item['tab_cat'];
			$child_categories_ex        = explode( ',', $cat );
			$child_categories           = str_replace( ',', ' ', $cat );
			$category_arr_class[ $key ] = strtolower( $child_categories );
			foreach ( $child_categories_ex as $child_category ) {
				 $category_arr[] = $child_category;
			}
		}
		?>
		<ul>
		<?php
		$category_arr = array_unique( $category_arr );
		$i            = 0;
		foreach ( $category_arr as $category ) {
			$i++;
			if ( $i == 1 ) {
				   echo '<li data-active="true"><span>' . $category . '</span></li>';
			} else {
				echo '<li><span>' . $category . '</span></li>';
			}
		}
		?>
		</ul>
		<div class="tt-tabs__border"></div>
	</div>
	<div class="tt-tabs__body">
		<?php
		foreach ( $items1 as $key => $item ) {
			$image_url   = ( $item['image']['id'] != '' ) ? wp_get_attachment_url( $item['image']['id'], 'full' ) : $item['image']['url'];
			$tab_cat     = $item['tab_cat'];
			$tab_content = $item['tab_content'];
			?>

		<div>
			<span class="tt-tabs__title"><?php echo $tab_cat; ?></span>
			<div class="tt-tabs__content">
				<img src="<?php echo esc_url( $image_url ); ?>" class="tt-img-extra-right" alt="<?php echo esc_html__( 'about', 'caleader-core' ); ?>">
			<?php echo wp_kses_post( $tab_content ); ?>
			</div>
		</div>

		<?php } ?>
	</div>

</div>


		<?php

	}

	protected function content_template() {
	}
}

  \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarleaderAboutTab() );
