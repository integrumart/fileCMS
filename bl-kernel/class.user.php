<?php
/**
 * User Class
 * Represents a user account
 */

class User {
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function username() {
        return isset($this->data['username']) ? $this->data['username'] : '';
    }
    
    public function email() {
        return isset($this->data['email']) ? $this->data['email'] : '';
    }
    
    public function firstName() {
        return isset($this->data['firstName']) ? $this->data['firstName'] : '';
    }
    
    public function lastName() {
        return isset($this->data['lastName']) ? $this->data['lastName'] : '';
    }
    
    public function role() {
        return isset($this->data['role']) ? $this->data['role'] : 'editor';
    }
    
    public function nickname() {
        return isset($this->data['nickname']) ? $this->data['nickname'] : $this->username();
    }
    
    public function registered($format = 'Y-m-d H:i:s') {
        $date = isset($this->data['registered']) ? $this->data['registered'] : '';
        return cms_date_format(strtotime($date), $format);
    }
}
