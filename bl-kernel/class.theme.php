<?php
/**
 * Theme Class
 * Handles theme rendering
 */

class Theme {
    private $path;
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
        $this->path = PATH_THEMES . $name . DS;
    }
    
    public function render($template, $data = array()) {
        extract($data);
        
        $file = $this->path . $template . '.php';
        if (file_exists($file)) {
            include($file);
        }
    }
    
    public function partial($name, $data = array()) {
        extract($data);
        
        $file = $this->path . 'partials' . DS . $name . '.php';
        if (file_exists($file)) {
            include($file);
        }
    }
    
    public function asset($file) {
        return $this->path . 'assets' . DS . $file;
    }
}
