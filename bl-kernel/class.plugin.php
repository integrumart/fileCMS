<?php
/**
 * Plugin Class
 * Base class for all plugins
 */

class Plugin {
    protected $data;
    
    public function __construct() {
        $this->data = array();
    }
    
    public function init() {
        // Override in plugin
    }
    
    public function install() {
        // Override in plugin
        return true;
    }
    
    public function uninstall() {
        // Override in plugin
        return true;
    }
    
    public function form() {
        // Override in plugin
        return '';
    }
    
    public function adminHead() {
        // Override in plugin
    }
    
    public function adminBodyBegin() {
        // Override in plugin
    }
    
    public function adminBodyEnd() {
        // Override in plugin
    }
    
    public function siteHead() {
        // Override in plugin
    }
    
    public function siteBodyBegin() {
        // Override in plugin
    }
    
    public function siteBodyEnd() {
        // Override in plugin
    }
}
