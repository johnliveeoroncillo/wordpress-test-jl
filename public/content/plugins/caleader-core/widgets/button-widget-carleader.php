<?php
class Buttonwidget_Widget_test extends WP_Widget {
    public function __construct() {
        parent::__construct(
                'buttonwidget_widget_test', // Base ID  
                'Button Widget For Carleader', // Name  
                array('description' =>esc_html__('Add buttons ','caleader-core')  )
        );
        add_action('admin_enqueue_scripts', array($this, 'image_upload_scripts'));
    }
    public function form($instance){
      
        $defaults = array(
            'title' => esc_html__('Button Widget For Carleader','caleader-core'), 
            'buttons' => array() ); 
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'caleader-core'); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"  />
    </p>
    <ul class="button_add_container">
     
        <?php foreach ($instance['buttons'] as $button) : 
            if(!is_array($button))
                $button = (array)$button;
        ?>
     
        <li>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('bt_text')); ?>"><?php esc_html_e('Button Txt for your widget', 'caleader-core'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bt_text')); ?>[]" type="text" class="image-url" 
                name="<?php echo esc_attr($this->get_field_name('bt_text')); ?>[]"  value="<?php print $button['bt_text'] ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('URl :', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('url')); ?>[]" name="<?php echo esc_attr($this->get_field_name('url')); ?>[]" value="<?php print $button['url'] ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('shortcode_content')); ?>"><?php esc_html_e('Shortcode Content:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('shortcode_content')); ?>[]" name="<?php echo esc_attr($this->get_field_name('shortcode_content')); ?>[]" value="<?php echo str_replace('"', "'",$button['shortcode_content']); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icin Name:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('icon')); ?>[]" name="<?php echo esc_attr($this->get_field_name('icon')); ?>[]" value="<?php print $button['icon'] ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('class')); ?>"><?php esc_html_e('Class:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('class')); ?>[]" name="<?php echo esc_attr($this->get_field_name('class')); ?>[]" value="<?php print $button['class'] ?>">
            </p>
            <input class="button remove" type="button" value="<?php esc_html_e('Remove', 'caleader-core'); ?>">
        </li>
    <?php endforeach; ?>
    </ul>
      <p>
        <a href="#" class="button_add_new button"><?php esc_html_e('Add New', 'caleader-core'); ?></a>
      </p>
      <!-- new button add mark up -->
      <div class="button_clone" style="display:none;">
            <p>
                <label><?php esc_html_e('Button Txt for your widget', 'caleader-core'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bt_text')); ?>[]" type="text" class="image-url" 
                name="<?php echo esc_attr($this->get_field_name('bt_text')); ?>[]" value="">
            </p>
            <p>
                <label><?php esc_html_e('URL:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>[]" name="<?php echo esc_attr($this->get_field_name('url')); ?>[]" value="">
            </p>
             <p>
                <label><?php esc_html_e('Shortcode Content:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat" id="<?php echo esc_attr($this->get_field_id('shortcode_content')); ?>[]" name="<?php echo esc_attr($this->get_field_name('shortcode_content')); ?>[]" value="">
            </p>
            <p>
                <label><?php esc_html_e('Icon Name:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('icon')); ?>[]" name="<?php echo esc_attr($this->get_field_name('icon')); ?>[]" value="">
            </p>
            <p>
                <label><?php esc_html_e('Class:', 'caleader-core'); ?></label>
                <input type="text" class="alttext widefat"  id="<?php echo esc_attr($this->get_field_id('class')); ?>[]" name="<?php echo esc_attr($this->get_field_name('class')); ?>[]" value="">
            </p>
            <input class="button remove" type="button" value="<?php esc_html_e('Remove', 'caleader-core'); ?>">
      </div>
      <!-- close button add new-->
<?php
    }
    public function image_upload_scripts()
    {
        $screen = get_current_screen();
        if(isset($screen->base) && $screen->base == 'widgets'){
            wp_enqueue_script('upload_media_widget',  plugin_dir_url( dirname(__FILE__) ) . 'js/upload-media.js', array('jquery'),'', true);
        }
    }
    public function update($new_instance, $old_instance) {
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['bt_text'] = strip_tags($new_instance['bt_text']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['shortcode_content'] = str_replace('"', "'", $new_instance['shortcode_content']);
        $instance['icon'] = strip_tags($new_instance['icon']);
        $instance['class'] = strip_tags($new_instance['class']);
        $instance['buttons'] = array();
 
            if(!empty($new_instance['bt_text'])){
                for ($i=0; $i <count($new_instance['bt_text'])-1 ; $i++) { 
                    $button = array();
                    $button['bt_text'] = strip_tags( $new_instance['bt_text'][$i] );
                    $button['url'] = strip_tags( $new_instance['url'][$i] );
                    $button['shortcode_content'] = str_replace('"', "'", $new_instance['shortcode_content'][$i]);
                    $button['icon'] = strip_tags($new_instance['icon'][$i]);
                    $button['class'] = strip_tags($new_instance['class'][$i]);
                    $instance['buttons'][] = $button;
                }
            }
        return $instance;
    }
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $buttons=$instance['buttons'];
        ?>
        <div class="tt-aside-btn">
        <?php
        foreach ($buttons as $button => $value) {
            $target_id = rand(1, 1000000);?>
        <?php
        if(!empty($value['url'])){
        ?>
        <a href="<?php echo $value['url']?>" class="btn btn-fullwidth <?php echo $value['class'];?>"><i class="<?php echo $value['icon'];?>"></i><?php echo $value['bt_text'];?></a>
        <?php
      }else{?>
          <a href="#" class="btn btn-fullwidth <?php echo $value['class'];?>" data-toggle="modal" data-target="#modalOfferPrice<?php echo $target_id;?>"><i class="<?php echo $value['icon'];?>"></i><?php echo $value['bt_text'];?></a>
        <?php
        }
        if(empty($value['url'])){
    ?>
    <!-- modal (AddTestDrive) -->
        <div class="modal fade" id="modalOfferPrice<?php echo $target_id;?>" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content ">
              <div class="modal-body modal-layout-dafault">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-close"></span></button>
                            <?php echo do_shortcode($value['shortcode_content']);?>
              </div>
            </div>
          </div>
        </div>
        <?php
        }  
    }?>
            </div>
<?php
}
}
new Buttonwidget_Widget_test();
function register_onetomany_widget() {
    register_widget( 'Buttonwidget_Widget_test' );
}
add_action( 'widgets_init', 'register_onetomany_widget' );