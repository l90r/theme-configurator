<?php

require_once('utils.php');

class Thcfg_Page {

    var $saver, $msg;
        
    function action() {
        $this->load();

        if($_POST) {
            switch($_POST['saveas']) {
                case 'db':
                    $this->toDb();
                    $this->msg = "Changes saved to database.";
                    break;
                case 'theme':
                    $filename = '';
                    if($this->toTheme($filename)) {
                        $this->msg = "Changes saved to theme file " . $filename;
                    } else {
                        $this->msg = "Error while writing to theme file " . $filename .
                            ' . Please check file permissions or use the "See Code" option to set it manually';
                    }
                    break;
                default:
                    $this->msg = "Unknown operation.";
                    break;
            }
        }
        $this->display();
    }
    
}

