<?php

require_once('Page.php');
require_once('Model.php');

class Thcfg_Admin extends Thcfg_Page {

	private $values;
	
    function Thcfg_Admin() {
		$this->model = Model::getInstance();
    }
    	
    function display() {
		$colors = $this->structure->color;
		$dimensions = $this->structure->dimension;
		$text = $this->structure->text;
		$prefix = $this->prefix;
		$dirty = $this->dirty;
		$screens = $this->screens;
		$msg = $this->msg;
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
	
	function resetToTheme() {
		if($this->model->loadFromTheme()) {
			$this->message('Settings successfully reset to theme defaults.');
		} else {
			$this->message('Error loading settings from theme.');
		}
	}
	
	function resetToDefault() {
		if($this->model->loadFromPlugin()) {
			$this->message('Settings successfully reset to plugin defaults.');
		} else {
			$this->message('Internal error. Could not load settings from plugin.');
		}
	}
	
	function saveToTheme() {
		if($this->model->saveToTheme()) {
			$this->message('Settings successfully stored to the theme.');
		} else {
			$this->message('Could write to the theme. Did you check file permissions? Alternatively you can update those files manually.');
		}
	}

	function save() {
		$this->data = 'dummy';
		if(thcfg_request('reset_to_theme')) {
			$this->resetToTheme();
		} elseif(thcfg_request('reset_to_default')) {
			$this->resetToDefault();
		} elseif(thcfg_request('save_to_theme')) {
			$this->saveToTheme();
		} else {
			$this->saveSettings();
		}
		$this->load();
	}
	
	function saveSettings() {
		$this->prefix = thcfg_request('prefix');
		$this->structure = thcfg_request_encoded('structure');
		$this->screens = thcfg_request_array('screens');
		$this->model->setPrefix($this->prefix);
		$this->model->setStructure($this->structure);
		$this->model->setScreens($this->screens);
		$this->dirty = $this->model->getDirty();
		$this->message('Settings saved');
	}
}

