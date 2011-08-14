<?php

require_once('Page.php');

class Thcfg_Colors extends Thcfg_Page {

    var $values, $structure;

    function Thcfg_Colors() {
    }
    
    function load() {
        $this->values = json_decode(file_get_contents(THCFG_PATH . '/data.json'), true);
        $this->structure = json_decode(file_get_contents(THCFG_PATH . '/structure.json'));
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
    }
    
    function body() {
    
        $structure = $this->structure;
        
        $images = $this->values['images'];
        $phrases = $this->values['phrases'];
        $contents = $this->values['contents'];
        $colors = $this->values['colors'];
        
        $uri_admin = thcfg_get_uri(true);

        $msg = $this->msg;
        include('tpl/colors.php');

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
    
    function header() {
    }
}

