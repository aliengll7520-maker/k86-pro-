<?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Plugin Affiliate dành cho K86Shop.
 * Version: 1.1.0
 * Author: Liểng Sang
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Nạp các module
|--------------------------------------------------------------------------
*/

require_once plugin_dir_path(__FILE__) . 'includes/functions.php';

require_once plugin_dir_path(__FILE__) . 'admin/admin.php';

require_once plugin_dir_path(__FILE__) . 'settings/settings.php';

require_once plugin_dir_path(__FILE__) . 'modules/affiliate-box.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-manager.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-add.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-edit.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-save.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-delete.php';

require_once plugin_dir_path(__FILE__) . 'modules/product-shortcode.php';


/*
|--------------------------------------------------------------------------
| Kích hoạt Plugin
|--------------------------------------------------------------------------
*/

register_activation_hook(__FILE__, 'k86_install');

function k86_install() {

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $charset_collate = $wpdb->get_charset_collate();

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = "CREATE TABLE {$table} (

        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,

        name VARCHAR(255) NOT NULL,

        slug VARCHAR(255) NOT NULL,

        price VARCHAR(50) DEFAULT '',

        sale_price VARCHAR(50) DEFAULT '',

        shopee TEXT,

        tiktok TEXT,

        lazada TEXT,

        image TEXT,

        description LONGTEXT,

        status VARCHAR(20) DEFAULT 'active',

        created DATETIME DEFAULT CURRENT_TIMESTAMP,

        PRIMARY KEY (id)

    ) {$charset_collate};";

    dbDelta($sql);
}


/*
|--------------------------------------------------------------------------
| Nạp CSS + JavaScript + Media Library
|--------------------------------------------------------------------------
*/

add_action('admin_enqueue_scripts', 'k86_admin_assets');

function k86_admin_assets($hook){

    wp_enqueue_media();

    wp_enqueue_style(
        'k86-admin-style',
        plugin_dir_url(__FILE__) . 'assets/style.css',
        array(),
        '1.1.0'
    );

    wp_enqueue_script(
        'k86-media',
        plugin_dir_url(__FILE__) . 'assets/js/media.js',
        array('jquery'),
        '1.1.0',
        true
    );

    wp_localize_script(
        'k86-media',
        'k86Pro',
        array(
            'title'  => 'Chọn ảnh sản phẩm',
            'button' => 'Sử dụng ảnh này'
        )
    );
}
