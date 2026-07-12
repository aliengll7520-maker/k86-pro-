<?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Plugin Affiliate Platform dành cho K86Shop.
 * Version: 1.5.1
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
| Plugin Constants
|--------------------------------------------------------------------------
*/

define( 'K86_PRO_VERSION', '1.5.1' );
define( 'K86_PRO_FILE', __FILE__ );
define( 'K86_PRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'K86_PRO_URL', plugin_dir_url( __FILE__ ) );

/*
|--------------------------------------------------------------------------
| Load Core Engine
|--------------------------------------------------------------------------
*/

require_once K86_PRO_PATH . 'core/version.php';
require_once K86_PRO_PATH . 'core/install.php';
require_once K86_PRO_PATH . 'core/upgrade.php';

/*
|--------------------------------------------------------------------------
| Load Modules
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
| Register Activation Hook
|--------------------------------------------------------------------------
*/

register_activation_hook(
	K86_PRO_FILE,
	'k86_install_database'
);

/*
|--------------------------------------------------------------------------
| Load Assets
|--------------------------------------------------------------------------
*/

add_action(
	'admin_enqueue_scripts',
	'k86_admin_assets'
);

function k86_admin_assets() {

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

/*
|--------------------------------------------------------------------------
| Plugin Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_pro_loaded' );
