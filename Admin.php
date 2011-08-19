<?php

require_once('Page.php');

class Thcfg_Admin extends Thcfg_Page {

	private $values;
	
    function Thcfg_Admin() {
    }
    	
    function display() {
		$colors = $this->data->color;
		$dimensions = $this->data->dimension;
		$text = $this->data->text;
        include('tpl/admin.php');
    }
	
	function load() {
		$this->data = json_decode(thcfg_get_option(
			'thcfg_structure',
			array("color" => array(), "text" => array(), "dimension" => array())
		));		
	}
    
    function head() {
		$structure = $this->data;
        include 'tpl/admin_hdr.php';
    }
    
    function queue() {
   		wp_enqueue_script( 'jquery-ui-sortable' );
    }
	
	function save() {
		$this->data = json_decode(thcfg_request('structure'));
		thcfg_add_option('thcfg_structure', json_encode($this->data));
	}
}

