<?php
/**
 * Date Helper Functions
 */

function cms_date_format($timestamp, $format = 'Y-m-d H:i:s') {
    return date($format, $timestamp);
}

function cms_date_current() {
    return time();
}

function cms_date_fromString($dateString) {
    return strtotime($dateString);
}

function cms_date_friendly($timestamp) {
    $diff = time() - $timestamp;
    
    if ($diff < 60) {
        return $diff . ' seconds ago';
    } elseif ($diff < 3600) {
        return floor($diff / 60) . ' minutes ago';
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . ' hours ago';
    } elseif ($diff < 604800) {
        return floor($diff / 86400) . ' days ago';
    } else {
        return date('F j, Y', $timestamp);
    }
}
