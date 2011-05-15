<?php

require_once('utils.php');

class Thcfg_Main {

    private $values, $structure;
        
    function action() {
        $this->values = json_decode(file_get_contents(THCFG_PATH . '/data.json'), true);
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));

        $this->display();
    }
    
    private function display() {
    
        $structure = $this->structure;
        
        $images = $this->values['images'];
        $phrases = $this->values['phrases'];
        $contents = $this->values['contents'];
        $colors = $this->values['colors'];
        
        $uri_admin = thcfg_get_uri(true);

        include('tpl/main.php');

    }
    
    public function header() {
    	echo '<link rel="stylesheet" href="' . plugins_url( 'style.css', __FILE__ ) . '" type="text/css">';
   		echo '<script type="text/javascript" src="' . plugins_url( 'js/main.js', __FILE__ ) . '"></script>';
		echo '<script type="text/javascript" src="' . plugins_url( '3rd/farbtastic/farbtastic.js', __FILE__ ) . '"></script>';
		echo '<link rel="stylesheet" href="' . plugins_url( '3rd/farbtastic/farbtastic.css', __FILE__ ) . '" type="text/css">';	
    }
}

