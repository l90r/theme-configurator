<?php

require_once('utils.php');

class Thcfg_Page {

    var $saver, $msg, $data;
        
    function action() {
        $this->display();
    }
    
    function loader() {
        if($this->data === null) {
            if($_POST) {
                $this->save();
            } else {
                $this->load();
            }
        }
    }
    
    function queue() { }
    
    function displayHead() {
        $this->loader();
        $this->head();
    }
    
    function displayBody() {
        $this->loader();
        $this->display();
    }
    
    function load() { }
    function display() { }    
    function save() { }
    
}

