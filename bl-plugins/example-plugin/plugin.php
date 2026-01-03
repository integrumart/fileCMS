<?php
/**
 * Example Plugin for FileCMS
 * Demonstrates plugin functionality
 */

class ExamplePlugin extends Plugin {
    
    public function init() {
        $this->data = array(
            'name' => 'Example Plugin',
            'description' => 'A simple example plugin for FileCMS',
            'version' => '1.0.0',
            'author' => 'FileCMS',
            'website' => 'https://example.com'
        );
    }
    
    public function install() {
        // Code to run on plugin installation
        return true;
    }
    
    public function uninstall() {
        // Code to run on plugin uninstallation
        return true;
    }
    
    public function siteHead() {
        // Add custom CSS or meta tags
        echo '<!-- Example Plugin Active -->' . "\n";
    }
    
    public function siteBodyEnd() {
        // Add custom JavaScript before </body>
        echo '<script>console.log("Example Plugin Loaded");</script>' . "\n";
    }
    
    public function adminHead() {
        // Add custom admin panel CSS
    }
    
    public function form() {
        // Plugin settings form
        return '<div>
            <h3>Example Plugin Settings</h3>
            <p>This is an example plugin. You can add settings here.</p>
        </div>';
    }
}
