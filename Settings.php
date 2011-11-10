<?php

require_once('Page.php');
require_once('Model.php');

class Thcfg_Settings extends Thcfg_Page {

    var $values, $structure;

    function __construct($section, $title) {
		$this->section = $section;
		$this->title = $title;
		$this->model = Model::getInstance();
    }
        
    protected function save() {
		$this->load();
		foreach($this->items as $item) {
			$this->model->setValue($this->section, $item->id, thcfg_request($item->id));
		}
    }
    
    protected function body() {
        $items = $this->items;
        $values = $this->values;
        
        $uri_admin = thcfg_get_uri(true);

        $msg = $this->msg;
        include('tpl/' . $this->section . '.php');

    }
	
	protected function load() {
		$this->items = $this->model->getItems($this->section);
		$this->values = $this->model->getValues($this->section);
	}

    protected function top() {
        $heading = $this->title;
		$section = $this->section;
        include('tpl/maintop.php');
    }
    
    protected function bottom() {
        include('tpl/mainbottom.php');
    }
    
    protected function display() {
        $this->top();
        $this->body();
        $this->bottom();
    }
    
	public function queue() {
	    wp_enqueue_style( 'thcfg_style', plugins_url( 'style.css', __FILE__ ));
	}
}

