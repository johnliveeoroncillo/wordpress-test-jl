<?php

class Footer {
    function __construct() {
        add_shortcode('footer', function() {
            wp_enqueue_style('style_footer', CARSADA_DIR . '/assets/css/footer.css?v='.time() );          
        });     
        
        add_filter('wp_head', array($this, 'style'));        
    }

    public function style() {
        echo do_shortcode('[footer]');
    }
}
return new Footer();