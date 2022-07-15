<?php
class Carleader_Posts_Grid extends WP_Widget {
    public $defaults;
    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Featured Posts', 'caleader-core'),
            'limit' => '2',
            'orderby' => 'date',
            'order' => 'DESC',
        );
        parent::__construct(
                'smart_posts_grid', // Base ID  
                esc_html__('Car Leader Posts Grid', 'caleader-core'), // Name  
                array(
            'description' => esc_html__('This widget will display posts grid on sidebars.', 'caleader-core')
                )
        );
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, $this->defaults);
        extract($instance);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'caleader-core') ?>:</strong><br /><input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p>
        <p><label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_html_e('Order By:', 'caleader-core') ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('orderby')); ?>" name="<?php echo esc_attr($this->get_field_name('orderby')); ?>">
                <option value="ID" <?php selected($orderby, 'ID'); ?>><?php esc_html_e('ID', 'caleader-core') ?></option>
                <option value="date" <?php selected($orderby, 'date'); ?>><?php esc_html_e('Date', 'caleader-core') ?></option>
                <option value="comment_count" <?php selected($orderby, 'comment_count'); ?>><?php esc_html_e('Comments', 'caleader-core') ?></option>
                <option value="rand" <?php selected($orderby, 'rand'); ?>><?php esc_html_e('Random', 'caleader-core') ?></option>
            </select>
        </p>
        <p><label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php esc_html_e('Order:', 'caleader-core') ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order')); ?>" name="<?php echo esc_attr($this->get_field_name('order')); ?>">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php esc_html_e('Descending', 'caleader-core') ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php esc_html_e('Ascending', 'caleader-core') ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">
                <strong><?php esc_html_e('Posts Limit', 'caleader-core') ?>:</strong><br /><input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" value="<?php echo esc_attr($instance['limit']); ?>" />
            </label>
        </p>
        <?php
    }
    function widget($args, $instance) {
        global $post;
        extract($args);
        echo wp_kses_post($before_widget);
        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        $query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => $instance['orderby'],
            'order' => $instance['order'],
            'posts_per_page' => (int) $instance['limit']
        );
        $results = get_posts($query_args);
        if (!empty($results) && !is_wp_error($results)): 
            ?>
            <div class="tt-block02-content tt-listingpost-aside">
        <?php
            foreach ($results as $post): setup_postdata($post);
            ?>
                <div <?php post_class('tt-post'); ?>>
                    <div class="tt-img">
                        <a href="<?php the_permalink() ?>">
                        <?php echo the_post_thumbnail('carleader-blog-post-featured-image'); ?>
                        </a>
                    </div>
                    <div class="tt-layout">
                        <h3 class="tt-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <div class="tt-layout-bottom">
                        <?php caleader_posted_on(); ?>
                            <a href="<?php the_permalink() ?>" target="_blank" class="tt-icon-link"></a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
        endif;
        wp_reset_postdata();
        echo wp_kses_post($after_widget);
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['orderby'] = strip_tags($new_instance['orderby']);
        $instance['order'] = strip_tags($new_instance['order']);
        $instance['limit'] = strip_tags($new_instance['limit']);
        return $instance;
    }
}
function Carleader_Posts_Grid_widget() {
    register_widget( 'Carleader_Posts_Grid' );
}
add_action( 'widgets_init', 'Carleader_Posts_Grid_widget' );