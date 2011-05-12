<?php

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
        
        include('tpl/main.php');

    }
}

