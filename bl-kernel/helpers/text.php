<?php
/**
 * Text Helper Functions
 */

function text_truncate($text, $length = 150, $ellipsis = '...') {
    if (mb_strlen($text) > $length) {
        return mb_substr($text, 0, $length) . $ellipsis;
    }
    return $text;
}

function text_slug($text) {
    $text = mb_strtolower($text);
    $text = preg_replace('/[^a-z0-9-]/', '-', $text);
    $text = preg_replace('/-+/', '-', $text);
    $text = trim($text, '-');
    return $text;
}

function text_clean($text) {
    return htmlspecialchars(strip_tags($text), ENT_QUOTES, 'UTF-8');
}

function text_markdown($text) {
    // Simple markdown parser
    $text = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $text);
    $text = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $text);
    $text = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $text);
    $text = preg_replace('/\*\*(.+)\*\*/', '<strong>$1</strong>', $text);
    $text = preg_replace('/\*(.+)\*/', '<em>$1</em>', $text);
    $text = preg_replace('/\[(.+)\]\((.+)\)/', '<a href="$2">$1</a>', $text);
    $text = nl2br($text);
    return $text;
}
