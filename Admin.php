<?php

require_once('Page.php');

class Thcfg_Admin extends Thcfg_Page {

	private $values;
	
    function Thcfg_Admin() {
		$this->values = array("colors" => array());
    }
    	
    function display() {
		extract($this->values);
        include('tpl/admin.php');
    }
    
    function header() {
		extract($this->values);
        include 'tpl/admin_hdr.php';
    }
    
    function queue() {
   		wp_enqueue_script( 'jquery-ui-sortable' );
    }
}

