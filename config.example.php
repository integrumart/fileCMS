<?php
/**
 * FileCMS Configuration Example
 * Copy this file to config.php and modify as needed
 */

// Timezone
define('TIMEZONE', 'UTC');

// Debug mode (disable in production)
define('DEBUG_MODE', false);

// Maximum upload file size (in MB)
define('MAX_UPLOAD_SIZE', 10);

// Allowed file extensions for upload
define('ALLOWED_EXTENSIONS', 'jpg,jpeg,png,gif,pdf,doc,docx,zip');

// Session timeout (in minutes)
define('SESSION_TIMEOUT', 30);

// Items per page
define('ITEMS_PER_PAGE', 10);

// Enable/disable cache
define('ENABLE_CACHE', true);

// Cache duration (in seconds)
define('CACHE_DURATION', 3600);
