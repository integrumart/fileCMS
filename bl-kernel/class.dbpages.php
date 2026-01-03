<?php
/**
 * Pages Database
 * Manages all pages/posts
 */

class dbPages extends Database {
    
    public function __construct() {
        parent::__construct(PATH_DATABASES . 'pages.php');
    }
    
    public function add($slug, $data) {
        $data['slug'] = $slug;
        $data['key'] = $slug;
        $data['date'] = isset($data['date']) ? $data['date'] : date('Y-m-d H:i:s');
        $data['dateModified'] = date('Y-m-d H:i:s');
        
        // Create page directory and content file
        $pageDir = PATH_PAGES . $slug;
        if (!file_exists($pageDir)) {
            mkdir($pageDir, 0755, true);
        }
        
        // Save content to index.txt
        $content = "Title: " . $data['title'] . "\n";
        $content .= "Content:\n" . $data['content'] . "\n";
        file_put_contents($pageDir . DS . 'index.txt', $content);
        
        return $this->set($slug, $data);
    }
    
    public function edit($slug, $data) {
        if ($this->exists($slug)) {
            $existing = $this->get($slug);
            $data = array_merge($existing, $data);
            $data['dateModified'] = date('Y-m-d H:i:s');
            
            // Update content file
            $pageDir = PATH_PAGES . $slug;
            $content = "Title: " . $data['title'] . "\n";
            $content .= "Content:\n" . $data['content'] . "\n";
            file_put_contents($pageDir . DS . 'index.txt', $content);
            
            return $this->set($slug, $data);
        }
        return false;
    }
    
    public function getPage($slug) {
        return $this->get($slug);
    }
    
    public function getAll($published = true) {
        $pages = parent::getAll();
        
        if ($published) {
            $pages = array_filter($pages, function($page) {
                return isset($page['published']) && $page['published'];
            });
        }
        
        // Sort by date
        usort($pages, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
        
        return $pages;
    }
    
    public function search($query) {
        $results = array();
        foreach ($this->data as $page) {
            if (stripos($page['title'], $query) !== false || 
                stripos($page['content'], $query) !== false) {
                $results[] = $page;
            }
        }
        return $results;
    }
}
