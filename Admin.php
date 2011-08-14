<?php

require_once('Page.php');

class Thcfg_Admin extends Thcfg_Page {

    function Thcfg_Admin() {
    }
    
    function load() {
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));
    }
    
    function display() {
		$colors = array();
        $msg = $this->msg;
        include('tpl/admin.php');
    }
    
    function header() {
        include 'tpl/admin_hdr.php';
    }
    
    function queue() {
   		wp_enqueue_script( 'jquery-ui-sortable' );
    }
}

