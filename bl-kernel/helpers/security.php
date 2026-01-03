<?php
/**
 * Security Helper Functions
 */

function security_csrfToken() {
    return isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '';
}

function security_validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function security_sanitize($string, $type = 'text') {
    switch ($type) {
        case 'html':
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        case 'url':
            return filter_var($string, FILTER_SANITIZE_URL);
        case 'email':
            return filter_var($string, FILTER_SANITIZE_EMAIL);
        default:
            return strip_tags($string);
    }
}

function security_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function security_verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

function security_isLogged() {
    return isset($_SESSION['user_logged']) && $_SESSION['user_logged'] === true;
}

function security_login($username) {
    $_SESSION['user_logged'] = true;
    $_SESSION['username'] = $username;
}

function security_logout() {
    session_destroy();
}
