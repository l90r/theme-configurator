<?php

define('THCFG_DEFAULT', 0);
define('THCFG_CLEAN', 1);
define('THCFG_DIRTY', 2);

class Model {
    private $cache;
    private $dirty;
    
    function Model() {
        $this->cache = array();
        $this->dirty = null;
    }

    private function get($name, $default=null) {
        $cached = $this->cache[$name];
        if($cached) {
            return $cached;
        }
        return get_option($this->getPrefix() . $name, $default);
    }
    
    private function set($name, $value) {
        $previous = $this->get($name);
        if($previous != $value) {
            $this->cache[$name] = $value;
            update_option($this->getPrefix() . $name, $value);
            $this->setDirty(THCFG_DIRTY);
        }
    }

    private function getEncoded($name) {
        $code = $this->get($name);
        if($code) {
            return json_decode($code);
        } else {
            return null;
        }
    }
    
    private function setEncoded($name, $value) {
        $this->set($name, json_encode($value));
    }
    
    public function getPrefix() {
        if($this->prefix === null) {
            $this->prefix = get_option('thcfg_prefix', null);
            if($this->prefix === null) {
                $this->loadFiles();
            }
        }
        return $this->prefix;
    }
    
    public function setPrefix($value) {
        if($this->prefix != $value) {
            // @todo Rename all existing settings
            $this->prefix = $value;
            update_option('thcfg_prefix', $value);
            $this->setDirty(THCFG_DIRTY);        }
    }
    
    public function getDirty() {
        if($this->dirty === null) {
            $this->dirty = get_option('thcfg_dirty', THCFG_DEFAULT);
        }
        return $this->dirty;
    }
    
    private function setDirty($value) {
        if($value != $this->dirty) {
            $this->dirty = $value;
            update_option('thcfg_dirty', $value);
        }
    }
    
    function getStructure() {
        return $this->getEncoded('_structure');
    }
    
    function setStructure($value) {
        $this->setEncoded('_structure', $value);
    }
    
    function getVisibility() {
        return $this->getEncoded('visibility');
    }
    
    function setVisibility($value) {
        $this->setEncoded('visibility', $value);
    }
    
    function loadFiles() {
        $file = $this->themeStructureFile();
        if(file_exists($file)) {
            $this->loadStructure($file);
            $this->loadSettings($this->themeSettingsFile());
            $this->setDirty(THCFG_CLEAN);
        } else {
            $this->loadStructure($this->defaultStructureFile());
            $this->loadSettings($this->defaultSettingsFile());            
            $this->setDirty(THCFG_DEFAULT);
        }
    }
    
    function loadStructure($file) {
        $data = json_decode(file_get_contents($file));
        $this->setPrefix($data->prefix);
        $this->setVisibility($data->visibility);
        $this->setStructure($data->structure);
    }
    
    function loadSettings($file) {
        // @todo To be implemented
    }
    
    function themeStructureFile() {
        return get_stylesheet_directory() . '/thcfg-structure.json';
    }

    function themeSettingsFile() {
        return get_stylesheet_directory() . '/thcfg-settings.json';
    }

    function defaultStructureFile() {
        return plugins_url( 'structure.json', __FILE__ );
    }

    function defaultSettingsFile() {
        return plugins_url( 'settings.json', __FILE__ );
    }
    
}


