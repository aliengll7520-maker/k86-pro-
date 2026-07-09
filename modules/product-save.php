<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_post_k86_save_product', 'k86_save_product');

function k86_save_product() {

    // Kiểm tra quyền
    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền.');
    }

    // Kiểm tra Nonce chống CSRF
    check_admin_referer('k86_save_product', 'k86_nonce');

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $wpdb->insert(
        $table,
        array(
            'name'        => sanitize_text_field($_POST['name'] ?? ''),
            'slug'        => sanitize_title($_POST['name'] ?? ''),
            'price'       => sanitize_text_field($_POST['price'] ?? ''),
            'sale_price'  => '',
            'shopee'      => esc_url_raw($_POST['shopee'] ?? ''),
            'tiktok'      => esc_url_raw($_POST['tiktok'] ?? ''),
            'lazada'      => esc_url_raw($_POST['lazada'] ?? ''),
            'image'       => '',
            'description' => sanitize_textarea_field($_POST['description'] ?? ''),
            'status'      => 'active'
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        )
    );

    wp_redirect(admin_url('admin.php?page=k86-products'));
    exit;
}
