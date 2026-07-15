<?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Affiliate Platform dành cho K86Shop.
 * Version: 1.6.0
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

define( 'K86_PRO_VERSION', '1.6.0' );

define( 'K86_PRO_FILE', __FILE__ );

define( 'K86_PRO_BASENAME', plugin_basename( __FILE__ ) );

define( 'K86_PRO_PATH', plugin_dir_path( __FILE__ ) );

define( 'K86_PRO_URL', plugin_dir_url( __FILE__ ) );

define( 'K86_PRO_INC', K86_PRO_PATH . 'includes/' );

define( 'K86_PRO_MODULES', K86_PRO_PATH . 'modules/' );

define( 'K86_PRO_ASSETS', K86_PRO_URL . 'assets/' );
/*
|--------------------------------------------------------------------------
| Before Core Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_before_core' );

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
| Core Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_core_loaded' );

/*
|--------------------------------------------------------------------------
| Before Modules Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_before_modules' );
/*
|--------------------------------------------------------------------------
| Load Modules
|--------------------------------------------------------------------------
*/

$modules = array(

	/*
	|--------------------------------------------------------------------------
	| Framework
	|--------------------------------------------------------------------------
	*/

	'includes/functions.php',

	/*
	|--------------------------------------------------------------------------
	| Admin
	|--------------------------------------------------------------------------
	*/

	'admin/admin.php',

	/*
	|--------------------------------------------------------------------------
	| Settings
	|--------------------------------------------------------------------------
	*/

	'settings/settings.php',

	/*
	|--------------------------------------------------------------------------
	| Affiliate
	|--------------------------------------------------------------------------
	*/

	'modules/affiliate-box.php',

	/*
	|--------------------------------------------------------------------------
	| Product Engine
	|--------------------------------------------------------------------------
	*/
'modules/decision-engine.php',
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
| Modules Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_modules_loaded' );
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
| Load Admin Assets
|--------------------------------------------------------------------------
*/

add_action(
	'admin_enqueue_scripts',
	'k86_admin_assets'
);

/**
 * Load Admin Assets.
 *
 * @param string $hook_suffix Current admin page.
 * @return void
 */
function k86_admin_assets( $hook_suffix ) {

	// Chỉ nạp trên trang quản trị của K86 Pro.
	if ( false === strpos( $hook_suffix, 'k86' ) ) {
		return;
	}

	wp_enqueue_media();

	wp_enqueue_style(
		'k86-admin-style',
		K86_PRO_ASSETS . 'style.css',
		array(),
		K86_PRO_VERSION
	);

	wp_enqueue_script(
		'k86-admin-media',
		K86_PRO_ASSETS . 'js/media.js',
		array( 'jquery' ),
		K86_PRO_VERSION,
		true
	);

	wp_localize_script(
		'k86-admin-media',
		'k86Pro',
		array(
			'title'   => esc_html__( 'Chọn ảnh sản phẩm', 'k86-pro' ),
			'button'  => esc_html__( 'Sử dụng ảnh này', 'k86-pro' ),
			'version' => K86_PRO_VERSION,
			'nonce'   => wp_create_nonce( 'k86_admin_nonce' ),
		)
	);
}

/*
|--------------------------------------------------------------------------
| Plugin Loaded
|--------------------------------------------------------------------------
*/

do_action( 'k86_pro_loaded' );

/*
|--------------------------------------------------------------------------
| Framework Ready
|--------------------------------------------------------------------------
|
| Điểm khởi động chung của toàn bộ K86 Pro.
| Các Module mở rộng trong tương lai chỉ cần
| Hook vào đây mà không phải sửa file gốc.
|
*/

do_action( 'k86_framework_ready' );
