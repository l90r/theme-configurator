<?php

define('THCFG_DEFAULT', 0);
define('THCFG_CLEAN', 1);
define('THCFG_DIRTY', 2);

class Model {
    private $cache;
    private $dirty;
    
    private static $instance = null;
    
    public function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new Model();
            self::$instance->init();
        }
        return self::$instance;
    }
    
    private function Model() {
        $this->cache = array();
        $this->dirty = null;
    }

    private function init() {
        $this->prefix = get_option($this->prefixOption(), null);
        if($this->prefix === null) {
            $this->loadFiles();
        }
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
    
    public function prefixOption() {
        return 'thcfg_pre_' . get_stylesheet();
    }
    
    public function getPrefix() {
        if($this->prefix === null) {
            $this->prefix = get_option($this->prefixOption(), null);
        }
        return $this->prefix;
    }
    
    public function setPrefix($new) {
        if($new === null) {
            $new = get_stylesheet() . '_';
        }
        $old = $this->getPrefix();
        if($old != $new) {
            $this->renameSettings($old, $new);
            $this->setDirty(THCFG_DIRTY);
            update_option($this->prefixOption(), $new);
        }
        $this->prefix = $new;
    }
    
    public function renameSettings($old, $new) {
        $struct = $this->getStructure();
        if($struct === NULL) {
            return;
        }
        foreach($struct as $section) {
            foreach($section as $item) {
                $this->rename($old, $new, $item->id);
            }
        }
        $this->rename($old, $new, '_structure');
        $this->rename($old, $new, '_screens');
    }
    
    public function rename($old, $new, $id) {
        $val = get_option($old . $id, null);
        if($val !== null) {
            update_option($new . $id, $val);
            delete_option($old . $id);
        }
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
    
    function getScreens() {
        return $this->getEncoded('_screens');
    }
    
    function setScreens($value) {
        $this->setEncoded('_screens', $value);
    }
    
    function getItems($section) {
        $structure = $this->getStructure();
        return $structure->$section;
    }
    
    function getValues($section) {
        $values = array();
        $structure = $this->getStructure();
        foreach($structure->$section as $item) {
            $values[$item->id] = $this->get($item->id);
        }
        return $values;
    }
    
    function setValue($section, $id, $value) {
        $this->set($id, $value);
    }

    function loadFromTheme() {
        $file = $this->themeStructureFile();
        if(!file_exists($file)) {
            return false;
        }
        if(!$this->loadStructure($file)) {
            return false;
        }
        if(!$this->loadSettings($this->themeSettingsFile())) {
            return false;
        }
        $this->setDirty(THCFG_CLEAN);
        return true;
    }
    
    function loadFromPlugin() {
        $file = $this->defaultStructureFile();
        if(!file_exists($file)) {
            return false;
        }
        if(!$this->loadStructure($file)) {
            return false;
        }
        if(!$this->loadSettings($this->defaultSettingsFile())) {
            return false;
        }
        $this->setDirty(THCFG_DEFAULT);
        return true;
    }
    
    function loadFiles() {
        if(!$this->loadFromTheme()) {
            $this->loadFromPlugin();
        }
    }
    
    function dumpStructure() {
        return json_encode(array(
            'prefix' => $this->getPrefix(),
            'screens' => $this->getScreens(),
            'structure' => $this->getStructure()
        ));
    }
    
    function saveToTheme() {
        $settings = $this->dumpSettings();
		$structure = $this->dumpStructure();
        $result = @file_put_contents($this->themeSettingsFile(), $settings);
		if($result === false) {
			return false;
		}
		$result = @file_put_contents($this->themeStructureFile(), $structure);
		if($result === false) {
			return false;
		}
        return true;
    }
    
    function dumpSettings() {
        $structure = $this->getStructure();
        $data = array(
            'text' => array(),
            'dimension' => array(),
            'color' => array()
        );
        foreach($structure->text as $option)
            $data['text'][$option->id] = $this->get($option->id);
        foreach($structure->dimension as $option)
            $data['dimension'][$option->id] = $this->get($option->id);
        foreach($structure->color as $option)
            $data['color'][$option->id] = $this->get($option->id);
        return json_encode($data);
    }
        
    function loadStructure($file) {
        $content = @file_get_contents($file);
        if($content === false) {
            return false;
        }
        $data = json_decode($content);
        if($data === NULL) {
            return false;
        }
        $this->setPrefix($data->prefix);
        $this->setScreens($data->screens);
        $this->setStructure($data->structure);
        return true;
    }
    
    function loadSettings($file) {
        $content = @file_get_contents($file);
        if($content === false) {
            return false;
        }
        $settings = json_decode($content, true);
        if($settings === NULL) {
            return false;
        }
        $prefix = $this->getPrefix();
        foreach($settings as $section) {
            foreach($section as $id => $value) {
                $this->set($id, $value);
            }
        }
        return true;
    }
    
    function themeStructureFile() {
        return TEMPLATEPATH . '/thcfg-structure.json';
    }

    function themeSettingsFile() {
        return TEMPLATEPATH . '/thcfg-settings.json';
    }

    function defaultStructureFile() {
        return plugin_dir_path( __FILE__ ) . '/structure.json';
    }

    function defaultSettingsFile() {
        return plugin_dir_path( __FILE__ ) . '/settings.json';
    }
    
}


