<?php
if (!defined('ABSPATH')) {
    exit;
}
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class CarleaderNews extends Widget_Base {
    public function get_name() {
        return 'carleader-news';
    }
    public function get_title() {
        return esc_html__('Carleader News', 'caleader-core');
    }
    public function get_icon() {
        return 'eicon-post';
    }
    public function get_categories() {
        return ['CarLeader'];
    }
    private function get_blog_categories() {
        $options = array();
        $taxonomy = 'category';
        if (!empty($taxonomy)) {
            $terms = get_terms(
                    array(
                        'parent' => 0,
                        'taxonomy' => $taxonomy,
                        'hide_empty' => true,
                    )
            );
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    if (isset($term)) {
                        if (isset($term->slug) && isset($term->name)) {
                            $options[$term->slug] = $term->name;
                        }
                    }
                }
            }
        }
        return $options;
    }
    protected function register_controls() {
        $this->start_controls_section(
                'section_blogs', [
                	'label' => esc_html__('carleader-news', 'caleader-core'),
                ]
        );
        $this->add_control(
                'catagory_name', [
            'type' => Controls_Manager::SELECT,
            'label' => esc_html__('Category', 'caleader-core'),
            'options' => $this->get_blog_categories()
                ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__( 'Posts per Page', 'caleader-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 20,
                'step' => 1,
                'default' => 10,
            ]
        );      
        $this->add_control(
	        'order_by',
	        [
	          'label' => esc_html__( 'Order by', 'caleader-core' ),
	          'type' => Controls_Manager::SELECT,
	            'options' => [
	                'date'  => esc_html__('Date', 'caleader-core' ),
					'ID'  => esc_html__('ID', 'caleader-core' ),
					'author'  => esc_html__('Author', 'caleader-core' ),
					'title'  => esc_html__('Title', 'caleader-core' ),
					'modified'  => esc_html__('Modified', 'caleader-core' ),
					'rand'  => esc_html__('Random', 'caleader-core' ),
					'menu_order'  => esc_html__('Menu order', 'caleader-core' ),
			
	            ],
	          'default' => esc_html__( 'ID', 'caleader-core' ),
	        ]
	      );      
        $this->add_control(
	        'sort_by',
	        [
	          'label' => esc_html__( 'Sort By', 'caleader-core' ),
	          'type' => Controls_Manager::SELECT,
	            'options' => [
	                'desc'  => esc_html__('desc', 'caleader-core' ),
					'asc'  => esc_html__('asc', 'caleader-core' ),
			
	            ],
	          'default' => esc_html__( 'desc', 'caleader-core' ),
	        ]
	      ); 
        $this->add_control(
                'extra_class', [
            'label' => esc_html__('Add Extra Class', 'caleader-core'),
            'type' => Controls_Manager::TEXT
                ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings();
        $settings =  $this->get_settings_for_display();
        $posts_per_page = $settings['posts_per_page'];
        $catagory_name = ucwords($settings['catagory_name']);
        $order_by = $settings['order_by'];
        $sort_by = $settings['sort_by'];
        ?>
		<div class="js-carousel-news tt-media-carousel tt-arrow-center slick-alignment-arrows dots-error content-erro">
        <?php
        $args = array(
            'posts_per_page' => $posts_per_page,
            'category_name' => $catagory_name,
            'orderby' => $order_by,
            'order' => $sort_by,
            'posts_per_page' => $posts_per_page,
        );
        global $wpdb;
        $loop = new WP_Query($args);
            if ($loop->have_posts()) {
            	while ($loop->have_posts()) : $loop->the_post();
	       ?>             
				<div>
                    <a href="<?php the_permalink(); ?>" class="tt-media">
                        <?php if(has_post_thumbnail()){?>
						<div class="tt-img">
                            <?php the_post_thumbnail('caleader-blog-post-home-image');?>
                        </div>
                        <?php } ?>
						<div class="tt-layout">
							<h3 class="tt-title"><?php the_title(); ?></h3>
							<div class="tt-layout-bottom">
								<div class="tt-time"><?php echo get_the_date(); ?></div>
								<div class="tt-icon-link"></div>
							</div>
						</div>
					</a>
				</div>
	       <?php
                endwhile;
            } else {
                echo esc_html__('No products found','caleader-core');
            }
            wp_reset_postdata();
        ?>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new CarleaderNews());