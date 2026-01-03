<?php
/**
 * FileCMS - Advanced Flat-File CMS
 * Based on Bludit architecture with enhanced features
 * 
 * @package FileCMS
 * @version 1.0.0
 */

// Define constant first
define('BLUDIT', true);

// Directory separator
define('DS', DIRECTORY_SEPARATOR);

// Define version
define('BLUDIT_VERSION', '1.0.0');
define('BLUDIT_CODENAME', 'FileCMS');
define('BLUDIT_RELEASE_DATE', '2026-01-03');
define('BLUDIT_BUILD', '1000');

// Define paths
define('PATH_ROOT', __DIR__ . DS);
define('PATH_KERNEL', PATH_ROOT . 'bl-kernel' . DS);
define('PATH_CONTENT', PATH_ROOT . 'bl-content' . DS);
define('PATH_PLUGINS', PATH_ROOT . 'bl-plugins' . DS);
define('PATH_THEMES', PATH_ROOT . 'bl-themes' . DS);
define('PATH_LANGUAGES', PATH_ROOT . 'bl-languages' . DS);
define('PATH_UPLOADS', PATH_CONTENT . 'uploads' . DS);
define('PATH_PAGES', PATH_CONTENT . 'pages' . DS);
define('PATH_DATABASES', PATH_CONTENT . 'databases' . DS);
define('PATH_TMP', PATH_CONTENT . 'tmp' . DS);

// Check if installation is required
if (!file_exists(PATH_DATABASES . 'site.php')) {
    header('Location: install.php');
    exit;
}

// Load kernel
require(PATH_KERNEL . 'boot.php');

// Initialize CMS
$cms = new CMS();
$cms->init();
$cms->render();
