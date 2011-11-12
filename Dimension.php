<?php

require_once('Settings.php');

class Thcfg_Dimension extends Thcfg_Settings {

    function __construct() {
		parent::__construct('dimension', 'Dimensions');
	}
	
    function queue() {
		parent::queue();
	    wp_enqueue_style( 'ui-thcfg-custom-css', plugins_url( '3rd/jquery/css/ui-thcfg-custom.css', __FILE__ ));
        wp_register_script( 'ui-thcfg-custom', plugins_url( '3rd/jquery/ui-thcfg-custom.min.js', __FILE__ ), array('jquery'));
        wp_register_script( 'thcfg_dimension', plugins_url( 'js/dimension.js', __FILE__ ), array('ui-thcfg-custom'));
   		wp_enqueue_script( 'thcfg_dimension' );
    }    
}

