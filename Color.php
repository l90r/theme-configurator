<?php

require_once('Settings.php');

class Thcfg_Color extends Thcfg_Settings {

    function __construct() {
		parent::__construct('color', 'Color Scheme');
    }
            
    function queue() {
		parent::queue();
        wp_enqueue_style( 'farbtastic' );
        wp_enqueue_script( 'farbtastic' );
        wp_register_script( 'thcfg_main', plugins_url( 'js/main.js', __FILE__ ), array('jquery', 'farbtastic'));
   		wp_enqueue_script( 'thcfg_main' );
    }    
}

