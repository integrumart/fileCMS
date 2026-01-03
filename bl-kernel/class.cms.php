<?php
/**
 * CMS Main Class
 * Core application controller
 */

class CMS {
    private $page;
    private $slug;
    private $theme;
    
    public function __construct() {
        global $site;
        $this->theme = new Theme($site->theme());
    }
    
    public function init() {
        $this->parseURL();
        $this->loadPage();
    }
    
    private function parseURL() {
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        $uri = strtok($uri, '?');
        $uri = trim($uri, '/');
        
        // Parse slug from URI
        if (empty($uri)) {
            $this->slug = 'index';
        } elseif ($uri === 'admin') {
            $this->adminPanel();
            exit;
        } else {
            $this->slug = $uri;
        }
    }
    
    private function loadPage() {
        global $pages, $site;
        
        $pageData = $pages->getPage($this->slug);
        
        if ($pageData) {
            $this->page = new Page($pageData);
        } else {
            // Try homepage or 404
            $homepage = $site->get('homepage');
            if ($homepage && $this->slug !== $homepage) {
                $pageData = $pages->getPage($homepage);
                if ($pageData) {
                    $this->page = new Page($pageData);
                } else {
                    $this->page = $this->create404Page();
                }
            } else {
                $this->page = $this->create404Page();
            }
        }
    }
    
    private function create404Page() {
        return new Page(array(
            'title' => 'Page Not Found',
            'content' => 'The page you are looking for does not exist.',
            'slug' => '404'
        ));
    }
    
    public function render() {
        global $site, $pages;
        
        $data = array(
            'site' => $site,
            'page' => $this->page,
            'pages' => $pages
        );
        
        $this->theme->render('header', $data);
        $this->theme->render('page', $data);
        $this->theme->render('footer', $data);
    }
    
    private function adminPanel() {
        // Check if user is logged in
        if (!security_isLogged()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->processLogin();
            } else {
                $this->showLogin();
            }
            return;
        }
        
        // Admin dashboard
        include(PATH_KERNEL . 'admin' . DS . 'dashboard.php');
    }
    
    private function showLogin() {
        include(PATH_KERNEL . 'admin' . DS . 'login.php');
    }
    
    private function processLogin() {
        global $users;
        
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
        
        if (security_validateCsrfToken($token)) {
            $user = $users->authenticate($username, $password);
            if ($user) {
                security_login($username);
                header('Location: /admin');
                exit;
            }
        }
        
        $this->showLogin();
    }
}
