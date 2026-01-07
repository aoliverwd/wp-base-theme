<?php

/**
 * Theme functions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

define("BASETHEME_INCLUDES_PATH", __DIR__ . '/includes/');

// Include theme files
array_map(fn($filename) => require_once(BASETHEME_INCLUDES_PATH . "$filename.php"), [
    "theme-setup",
    "helpers",
    "filters",
    "wp-header",
    "wp-footer"
]);
