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
		$screens = $this->screens;
        include('tpl/admin.php');
    }
	
	function load() {
		$this->prefix = $this->model->getPrefix();
		$this->structure = $this->model->getStructure();
		$this->dirty = $this->model->getDirty();
		$this->screens = $this->model->getScreens();
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
		$this->screens = thcfg_request_array('screens');
		$this->model->setPrefix($this->prefix);
		$this->model->setStructure($this->structure);
		$this->model->setScreens($this->screens);
		$this->dirty = $this->model->getDirty();
	}
}

