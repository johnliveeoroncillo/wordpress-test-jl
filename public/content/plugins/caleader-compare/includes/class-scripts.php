<?php

class Caleader_Compare_ClassScripts {


	public static function required_scripts() {
		wp_enqueue_script( 'compare-main-script', CAR_LEADERS_PLUGIN_URI . 'js/main.js', array( 'jquery' ) );
	}
}

new Caleader_Compare_ClassScripts();
