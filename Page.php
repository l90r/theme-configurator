<?php

require_once('utils.php');

class Thcfg_Page {

    var $saver, $msg;
        
    function action() {
        $this->load();

        if($_POST) {
            $this->save();
        }
        $this->display();
    }
    
    function queue() { }
    
    function head() { }
    
    function display() { }
    
    function save() { }
    
}

