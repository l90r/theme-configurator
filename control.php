<?php

class Thcfg_Controller {

    private $values, $structure;
    
    function __construct() {
        $this->values = json_decode(file_get_contents(THCFG_PATH . '/data.json'), true);
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));
    }
    
    function action() {
        $this->display();
    }
    
    private function display() {
    
        $structure = $this->structure;
        
        $images = $this->values['images'];
        $phrases = $this->values['phrases'];
        $contents = $this->values['contents'];
        $colors = $this->values['colors'];
        
        include('template.php');

    }
}

