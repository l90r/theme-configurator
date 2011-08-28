<?php

require_once('Page.php');
require_once('Model.php');

class Thcfg_Color extends Thcfg_Page {

    var $values, $structure;

    function __construct() {
		$this->model = new Model();
    }
        
    function getKeysFromArray($arr) {
        $keys = array();
        foreach( $arr as $item ) {
            $keys[] = $item->id;
        }
        return $keys;
    }

    function getKeys() {
        return array_merge($this->getKeysFromArray($this->structure->colors),
            $this->getKeysFromArray($this->structure->images),
            $this->getKeysFromArray($this->structure->contents),
            $this->getKeysFromArray($this->structure->phrases));
    }
    
    function toDb() {
        $keys = $this->getKeys();
        foreach( $keys as $key ) {
            update_option( $key, $_POST[$key]);
        }
    }
    
    function save() {
		$this->load();
		foreach($this->items as $item) {
			$this->model->setValue('color', $item->id, thcfg_request($item->id));
		}
    }
    
    function body() {
    
        $items = $this->items;
        $values = $this->values;
        
        $uri_admin = thcfg_get_uri(true);

        $msg = $this->msg;
        include('tpl/colors.php');

    }
	
	function load() {
		$this->items = $this->model->getItems('color');
		$this->values = $this->model->getValues('color');
	}

    function top() {
        $heading = 'Theme Colors';
        include('tpl/maintop.php');
    }
    
    function bottom() {
        include('tpl/mainbottom.php');
    }
    
    function display() {
        $this->top();
        $this->body();
        $this->bottom();
    }
    
    function queue() {
        wp_enqueue_style( 'farbtastic' );
        wp_enqueue_script( 'farbtastic' );
        wp_register_script( 'thcfg_main', plugins_url( 'js/main.js', __FILE__ ), array('jquery', 'farbtastic'));
   		wp_enqueue_script( 'thcfg_main' );
        wp_enqueue_style( 'thcfg_style', plugins_url( 'style.css', __FILE__ ));
    }
    
    function head() {
    }
}

