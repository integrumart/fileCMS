<?php
/**
 * Site Configuration Database
 * Manages site settings
 */

class dbSite extends Database {
    
    public function __construct() {
        parent::__construct(PATH_DATABASES . 'site.php');
        
        // Set defaults
        if (empty($this->data)) {
            $this->setDefaults();
        }
    }
    
    protected function setDefaults() {
        $defaults = array(
            'title' => 'FileCMS',
            'slogan' => 'Advanced Flat-File CMS',
            'description' => 'A powerful flat-file content management system',
            'url' => '',
            'language' => 'en',
            'timezone' => 'UTC',
            'theme' => 'default',
            'itemsPerPage' => 10,
            'orderBy' => 'date',
            'uriPage' => '/page/',
            'uriTag' => '/tag/',
            'uriCategory' => '/category/',
            'homepage' => '',
            'pageNotFound' => '',
            'urlencode' => false,
            'autosave' => true,
            'currentBuild' => BLUDIT_BUILD,
            'admin' => 'admin'
        );
        
        foreach ($defaults as $key => $value) {
            if (!$this->exists($key)) {
                $this->set($key, $value);
            }
        }
    }
    
    public function title() {
        return $this->get('title');
    }
    
    public function slogan() {
        return $this->get('slogan');
    }
    
    public function description() {
        return $this->get('description');
    }
    
    public function url() {
        return $this->get('url');
    }
    
    public function language() {
        return $this->get('language');
    }
    
    public function theme() {
        return $this->get('theme');
    }
}
