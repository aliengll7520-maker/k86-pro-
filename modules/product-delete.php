<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_post_k86_delete_product', 'k86_delete_product');

function k86_delete_product() {

    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền.');
    }

    check_admin_referer('k86_delete_product', 'k86_nonce');

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $id = absint($_GET['id'] ?? 0);

    if ($id > 0) {
        $wpdb->delete(
            $table,
            array(
                'id' => $id
            ),
            array(
                '%d'
            )
        );
    }

    wp_redirect(admin_url('admin.php?page=k86-products'));
    exit;
}
