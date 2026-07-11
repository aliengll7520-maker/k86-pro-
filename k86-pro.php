<?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Plugin Affiliate dành cho K86Shop.
 * Version: 1.2.0
 * Author: Liểng Sang
 * Author URI: https://k86shop.com
 * License: GPL-2.0+
 * Text Domain: k86-pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Hằng số Plugin
|--------------------------------------------------------------------------
*/

define( 'K86_PRO_VERSION', '1.2.0' );
define( 'K86_PRO_FILE', __FILE__ );
define( 'K86_PRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'K86_PRO_URL', plugin_dir_url( __FILE__ ) );

/*
|--------------------------------------------------------------------------
| Nạp các Module
|--------------------------------------------------------------------------
*/

$modules = array(

	'includes/functions.php',

	'admin/admin.php',

	'settings/settings.php',

	'modules/affiliate-box.php',

	'modules/product-manager.php',

	'modules/product-add.php',

	'modules/product-edit.php',

	'modules/product-save.php',

	'modules/product-delete.php',

	'modules/product-shortcode.php',

);

foreach ( $modules as $module ) {

	$file = K86_PRO_PATH . $module;

	if ( file_exists( $file ) ) {

		require_once $file;

	}

}

/*
|--------------------------------------------------------------------------
| Kích hoạt Plugin
|--------------------------------------------------------------------------
*/

register_activation_hook( __FILE__, 'k86_install' );

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

	dbDelta( $sql );

}

/*
|--------------------------------------------------------------------------
| Tải CSS + JavaScript
|--------------------------------------------------------------------------
*/

add_action( 'admin_enqueue_scripts', 'k86_admin_assets' );

function k86_admin_assets( $hook ) {

	wp_enqueue_media();

	wp_enqueue_style(

		'k86-admin-style',

		K86_PRO_URL . 'assets/style.css',

		array(),

		K86_PRO_VERSION

	);

	wp_enqueue_script(

		'k86-media',

		K86_PRO_URL . 'assets/js/media.js',

		array( 'jquery' ),

		K86_PRO_VERSION,

		true

	);

	wp_localize_script(

		'k86-media',

		'k86Pro',

		array(

			'title'  => 'Chọn ảnh sản phẩm',

			'button' => 'Sử dụng ảnh này',

		)

	);

}
