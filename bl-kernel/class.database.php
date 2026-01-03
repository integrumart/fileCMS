<?php
/**
 * Database Base Class
 * Handles flat-file database operations
 */

class Database {
    protected $file;
    protected $data;
    
    public function __construct($file) {
        $this->file = $file;
        $this->data = array();
        $this->load();
    }
    
    protected function load() {
        if (file_exists($this->file)) {
            $content = file_get_contents($this->file);
            $this->data = json_decode($content, true);
            if ($this->data === null) {
                $this->data = array();
            }
        }
    }
    
    public function save() {
        $dir = dirname($this->file);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        $json = json_encode($this->data, JSON_PRETTY_PRINT);
        return file_put_contents($this->file, $json, LOCK_EX);
    }
    
    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
    
    public function set($key, $value) {
        $this->data[$key] = $value;
        return $this->save();
    }
    
    public function delete($key) {
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
            return $this->save();
        }
        return false;
    }
    
    public function getAll() {
        return $this->data;
    }
    
    public function exists($key) {
        return isset($this->data[$key]);
    }
}
