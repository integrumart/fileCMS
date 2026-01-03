<?php
/**
 * Filesystem Helper Functions
 */

function filesystem_mkdir($path, $recursive = true) {
    if (!file_exists($path)) {
        return mkdir($path, 0755, $recursive);
    }
    return true;
}

function filesystem_read($file) {
    if (file_exists($file)) {
        return file_get_contents($file);
    }
    return false;
}

function filesystem_write($file, $data, $lock = true) {
    $flags = $lock ? LOCK_EX : 0;
    return file_put_contents($file, $data, $flags);
}

function filesystem_delete($path) {
    if (is_file($path)) {
        return unlink($path);
    }
    return false;
}

function filesystem_list($path, $regex = '*', $sortByDate = false) {
    $files = glob($path . $regex);
    if ($sortByDate && $files) {
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
    }
    return $files ? $files : array();
}

function filesystem_extension($file) {
    return pathinfo($file, PATHINFO_EXTENSION);
}

function filesystem_uploadFile($tmp_name, $destination) {
    return move_uploaded_file($tmp_name, $destination);
}
