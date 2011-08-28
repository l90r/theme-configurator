<?php

require_once('utils.php');

class Thcfg_Page {

    var $saver, $msg, $data;
            
    private function loader() {
        if($this->data === null) {
            if($_POST) {
                $this->save();
            } else {
                $this->load();
            }
        }
    }
    
    public function queue() { }
    
    public function displayHead() {
        $this->loader();
        $this->head();
    }
    
    public function displayBody() {
        $this->loader();
        $this->display();
    }
    
    protected function load() { }
    protected function display() { }    
    protected function save() { }
    protected function head() { }
    
}

