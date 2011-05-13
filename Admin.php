<?php

class Thcfg_Admin {

    private $values, $structure;
        
    function __construct() {
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));
    }
    
    function action() {
        $this->display();
    }
    
    private function display() {
        $structure = $this->structure;        
        include('tpl/admin.php');
    }
    
    public function header() {
        include 'tpl/admin_hdr.php';
    }
}

