<?php

class Thcfg_Admin {

    private $values, $structure;
        
    function action() {
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));

        $this->display();
    }
    
    private function display() {
        $structure = $this->structure;        
        include('tpl/admin.php');
    }
    
    public function header() {
   		echo '<script type="text/javascript" src="' . plugins_url( 'js/admin.js', __FILE__ ) . '"></script>';
    }
}

