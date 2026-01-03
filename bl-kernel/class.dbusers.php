<?php
/**
 * Users Database
 * Manages user accounts
 */

class dbUsers extends Database {
    
    public function __construct() {
        parent::__construct(PATH_DATABASES . 'users.php');
    }
    
    public function add($username, $data) {
        if ($this->exists($username)) {
            return false;
        }
        
        $data['username'] = $username;
        $data['password'] = security_password($data['password']);
        $data['registered'] = date('Y-m-d H:i:s');
        $data['role'] = isset($data['role']) ? $data['role'] : 'editor';
        
        return $this->set($username, $data);
    }
    
    public function edit($username, $data) {
        if ($this->exists($username)) {
            $existing = $this->get($username);
            
            // Don't update password if not provided
            if (empty($data['password'])) {
                unset($data['password']);
            } else {
                $data['password'] = security_password($data['password']);
            }
            
            $data = array_merge($existing, $data);
            return $this->set($username, $data);
        }
        return false;
    }
    
    public function authenticate($username, $password) {
        $user = $this->get($username);
        if ($user && security_verifyPassword($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
    public function getUser($username) {
        return $this->get($username);
    }
    
    public function count() {
        return count($this->data);
    }
}
