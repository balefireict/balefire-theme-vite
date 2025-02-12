<?php

/**
 * Theme Functions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */
$function_files = [
    'admin',
    'cleanup',
    'enqueue-scripts',
    'menu',
    'sidebar',
    'comments',
    'page-navi',
    'translation/translation',
    'disable-emoji',
    'related-posts',
    'custom-post-type',
    'login',
    'theme-support'
];

foreach ($function_files as $file) {
    require_once get_template_directory() . '/functions/' . $file . '.php';
}
