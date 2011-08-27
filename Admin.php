<?php

require_once('Page.php');
require_once('Model.php');

class Thcfg_Admin extends Thcfg_Page {

	private $values;
	
    function Thcfg_Admin() {
		$this->model = new Model();
    }
    	
    function display() {
		$colors = $this->structure->color;
		$dimensions = $this->structure->dimension;
		$text = $this->structure->text;
		$prefix = $this->prefix;
		$dirty = $this->dirty;
        include('tpl/admin.php');
    }
	
	function load() {
		$this->prefix = $this->model->getPrefix();
		$this->structure = $this->model->getStructure();
		$this->dirty = $this->model->getDirty();
	}
    
    function head() {
		$structure = $this->structure;
        include 'tpl/admin_hdr.php';
    }
    
    function queue() {
   		wp_enqueue_script( 'jquery-ui-sortable' );
    }
	
	function save() {
		$this->prefix = thcfg_request('prefix');
		$this->structure = thcfg_request_encoded('structure');
		$this->model->setPrefix($this->prefix);
		$this->model->setStructure($this->structure);
		$this->dirty = $this->model->getDirty();
	}
}

