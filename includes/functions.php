<?php
if (!defined('ABSPATH')) {
    exit;
}

function k86_pro_version() {
    return '1.0.0';
}

function k86_pro_name() {
    return 'K86 Pro';
}
function k86_pro_enqueue_style() {
    wp_enqueue_style(
        'k86-pro-style',
        plugin_dir_url(dirname(__FILE__)) . 'assets/style.css',
        array(),
        k86_pro_version()
    );
}

add_action('wp_enqueue_scripts', 'k86_pro_enqueue_style');
