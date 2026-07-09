<?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Plugin Affiliate dành cho K86Shop.
 * Version: 1.0.0
 * Author: Liểng Sang
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'admin/admin.php';
require_once plugin_dir_path(__FILE__) . 'modules/affiliate-box.php';
require_once plugin_dir_path(__FILE__) . 'settings/settings.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-manager.php';
require_once plugin_dir_path(__FILE__) . 'modules/product-add.php';
require_once plugin_dir_path(__FILE__) . 'modules/product-edit.php';
require_once plugin_dir_path(__FILE__) . 'modules/product-save.php';

register_activation_hook(__FILE__, 'k86_install');

function k86_install() {

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        price VARCHAR(50),
        sale_price VARCHAR(50),
        shopee TEXT,
        tiktok TEXT,
        lazada TEXT,
        image TEXT,
        description LONGTEXT,
        status VARCHAR(20) DEFAULT 'active',
        created DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta($sql);
}
