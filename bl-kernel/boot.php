<?php
/**
 * FileCMS Boot Loader
 * Initializes the CMS system
 */

// Define constant
define('BLUDIT', true);

// Directory separator
define('DS', DIRECTORY_SEPARATOR);

// PHP version check
if (version_compare(phpversion(), '7.0', '<')) {
    exit('FileCMS requires PHP 7.0 or higher');
}

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Timezone
date_default_timezone_set('UTC');

// Session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Load helpers
require(PATH_KERNEL . 'helpers' . DS . 'filesystem.php');
require(PATH_KERNEL . 'helpers' . DS . 'security.php');
require(PATH_KERNEL . 'helpers' . DS . 'text.php');
require(PATH_KERNEL . 'helpers' . DS . 'date.php');

// Load classes
require(PATH_KERNEL . 'class.database.php');
require(PATH_KERNEL . 'class.dbpages.php');
require(PATH_KERNEL . 'class.dbusers.php');
require(PATH_KERNEL . 'class.dbsite.php');
require(PATH_KERNEL . 'class.page.php');
require(PATH_KERNEL . 'class.user.php');
require(PATH_KERNEL . 'class.plugin.php');
require(PATH_KERNEL . 'class.theme.php');
require(PATH_KERNEL . 'class.cms.php');

// Load configuration
$site = new dbSite();
$pages = new dbPages();
$users = new dbUsers();

// Security token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
