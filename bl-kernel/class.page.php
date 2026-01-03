<?php
/**
 * Page Class
 * Represents a single page/post
 */

class Page {
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function title() {
        return isset($this->data['title']) ? $this->data['title'] : '';
    }
    
    public function content($raw = false) {
        $content = isset($this->data['content']) ? $this->data['content'] : '';
        return $raw ? $content : text_markdown($content);
    }
    
    public function slug() {
        return isset($this->data['slug']) ? $this->data['slug'] : '';
    }
    
    public function date($format = 'Y-m-d H:i:s') {
        $date = isset($this->data['date']) ? $this->data['date'] : '';
        return cms_date_format(strtotime($date), $format);
    }
    
    public function description() {
        $content = $this->content(true);
        return text_truncate($content, 150);
    }
    
    public function author() {
        return isset($this->data['author']) ? $this->data['author'] : 'admin';
    }
    
    public function tags() {
        return isset($this->data['tags']) ? $this->data['tags'] : array();
    }
    
    public function category() {
        return isset($this->data['category']) ? $this->data['category'] : '';
    }
    
    public function published() {
        return isset($this->data['published']) ? $this->data['published'] : true;
    }
    
    public function coverImage() {
        return isset($this->data['coverImage']) ? $this->data['coverImage'] : '';
    }
    
    public function permalink() {
        global $site;
        return $site->url() . '/' . $this->slug();
    }
}
