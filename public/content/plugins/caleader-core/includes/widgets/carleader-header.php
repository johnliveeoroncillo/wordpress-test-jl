<?php
use Elementor\Utils;
class CarLeaderHeading extends \Elementor\Widget_Base {
	public function get_name() {
		return 'CarleaderHeading';
	}
	public function get_title() {
		return esc_html__( 'Carleader Heading', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-type-tool';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'carleaderHeading', 'caleader-core' ),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'caleader-core' ),
				'selector' => '{{WRAPPER}} .tt-block-title',
			)
		);

		$this->add_control(
			'show_decstop',
			array(
				'label'   => esc_html__( 'Show This Section On Deckstop', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'show_mobile',
			array(
				'label'   => esc_html__( 'Show This Section On Mobile', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Reasons to Buy From Car Leader', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'html_tag',
			array(
				'label'   => __( 'Html Tag', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1' => __( 'h1', 'caleader-core' ),
					'h2' => __( 'h2', 'caleader-core' ),
					'h3' => __( 'h3', 'caleader-core' ),
					'h4' => __( 'h4', 'caleader-core' ),
					'h5' => __( 'h5', 'caleader-core' ),
					'h6' => __( 'h6', 'caleader-core' ),

				),
				'default' => __( 'h3', 'caleader-core' ),
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => __( 'Subtitle', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( "We're here for whatever you need", 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'   => __( 'BG TEXT', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'bg_text_class',
			array(
				'label'   => __( 'BG TEXT Class', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'has_direct_link',
			array(
				'label'   => esc_html__( 'Has Direct Link', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'false',
			)
		);
		$this->add_control(
			'hide_direct_mobile',
			array(
				'label'     => esc_html__( 'Hide On Mobile', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'default'   => 'false',
				'condition' => array(
					'has_direct_link' => 'yes',
				),
			)
		);

		$this->add_control(
			'direct_link_name',
			array(
				'label'     => esc_html__( 'Direct Link Name', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => array( 'active' => true ),
				'condition' => array(
					'has_direct_link' => 'yes',
				),
			)
		);
		$this->add_control(
			'direct_link_url',
			array(
				'label'     => esc_html__( 'Direct Link URL', 'caleader-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '',
				'dynamic'   => array( 'active' => true ),
				'condition' => array(
					'has_direct_link' => 'yes',
				),
			)
		);
		$this->add_control(
			'css_classes',
			array(
				'label'   => esc_html__( 'CSS Classes ', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'dynamic' => array( 'active' => true ),
			)
		);
		  $this->end_controls_section();

	}

	protected function render() {
		$settings           = $this->get_settings_for_display();
		$show_mobile        = $settings['show_mobile'];
		$show_decstop       = $settings['show_decstop'];
		$bg_text            = $settings['bg_text'];
		$bg_text_class      = $settings['bg_text_class'];
		$hide_direct_mobile = $settings['hide_direct_mobile'];

		?>
	  
		<?php
		if ( ! empty( $bg_text ) ) {
			echo '<div class="tt-custom-bg-text ' . $bg_text_class . '">' . esc_html( $bg_text ) . '</div>';}
		?>
		<?php if ( ! empty( $settings['title'] ) ) { ?>
   <div class="tt-block-title <?php echo $settings['css_classes']; ?> <?php
	if ( $show_mobile == '' ) {
		echo 'hidden-xs'; }
	if ( $show_decstop == '' ) {
		echo 'visible-xs'; }
	?>
	">
		<?php } else { ?>
   <div class="<?php echo $settings['css_classes']; ?>">
		<?php } ?>
		<?php if ( ! empty( $settings['title'] ) ) { ?>
	<<?php echo $settings['html_tag']; ?> class="tt-title">
			<?php
				  echo wp_kses_post( $settings['title'] );
			?>
	</<?php echo $settings['html_tag']; ?>>
	<?php } ?>
		<?php if ( $settings['subtitle'] != '' ) { ?>
	<div class="tt-description"><?php echo $settings['subtitle']; ?></div>
	<?php } ?>
		<?php if ( $settings['has_direct_link'] && $settings['direct_link_url'] != '' ) { ?>
			<div class="d-none d-md-block">
			<a href="<?php echo $settings['direct_link_url']; ?>" class="tt-link-redirect 
						  <?php
							if ( $hide_direct_mobile != false ) {
								echo 'hidden-xs';}
							?>
			"><?php echo $settings['direct_link_name']; ?><span class="icon-right icon-arrowdown"></span></a>
				</div>
	  
	<?php } ?>
		</div>
		<?php
	}

	protected function content_template() {

	}


}
 // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderHeading() );
