<?php
use Elementor\Utils;
class CarLeaderFAQ extends \Elementor\Widget_Base {

	public function get_name() {
		return 'CarLeaderFAQ';
	}
	public function get_title() {
		return esc_html__( 'CarLeader FAQ', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return array( 'CarLeader' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'carleaderFAQ', 'caleader-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Buying a car with Car Leader', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'is_active',
			array(
				'label'        => esc_html__( 'Is Active?', 'caleader-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
		$repeater->add_control(
			'questions',
			array(
				'label'   => esc_html__( 'Questions', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Can I finance my car with Car Leader?', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'answer1',
			array(
				'label'   => esc_html__( 'Answer 1', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( ' Yes! We help our customers save through our vast network of lending partners. We work with over 15 banks and financial institutions to make sure you get the best rate available.', 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$repeater->add_control(
			'answer2',
			array(
				'label'   => esc_html__( 'Answer 2', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( "  Yes! We help our customers save through our vast network of lending partners. We work with over 15 banks and financial institutions to make sure you get the best rate available.  The application process takes place online – simply find the car you want, click Start Purchase, choose Finance with Car Leader, and then enter some basic financial information. We'll call you with your terms once you've completed the form.", 'caleader-core' ),
				'dynamic' => array( 'active' => true ),
			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'caleader-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'caleader-core' ),
					),
				),
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
	  <div class="tt-faq-layout">
			
			<h3 class="tt-title"><?php echo $settings['title']; ?></h3>
		<?php
		foreach ( $settings['items'] as $item ) {
			$is_active = $item['is_active'];
			?>
			<div class="tt-faq 
			<?php
			if ( $is_active == 'yes' ) {
				   echo 'active';
			}
			?>
			">
				<a href="#" class="tt-title">
			<?php echo $item['questions']; ?>
				</a>
				<div class="tt-content">
					<p>
			<?php echo $item['answer1']; ?>
					</p>
					<p>
			<?php echo $item['answer2']; ?>
					</p>
				</div>
			</div>    
		<?php } ?>            
		</div>
		<?php
	}

}
  // Register widget
  \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderFAQ() );
