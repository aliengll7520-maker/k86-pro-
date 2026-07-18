<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Assets Manager Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Assets Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy thông tin Assets.
 *
 * @return array
 */
function k86_get_assets_config() {

	return array(
		'version' => K86_PRO_VERSION,
		'url'     => K86_PRO_URL . 'assets/',
	);

}

/*
|--------------------------------------------------------------------------
| CSS Loader
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký CSS của K86 Pro.
 *
 * @return void
 */
function k86_register_styles() {

	$config = k86_get_assets_config();

	wp_register_style(
		'k86-pro',
		$config['url'] . 'css/k86-pro.css',
		array(),
		$config['version']
	);

}

/**
 * Tải CSS ra Frontend.
 *
 * @return void
 */
function k86_enqueue_styles() {

	wp_enqueue_style(
		'k86-pro'
	);

}

add_action(
	'wp_enqueue_scripts',
	'k86_register_styles'
);

add_action(
	'wp_enqueue_scripts',
	'k86_enqueue_styles',
	20
);

/*
|--------------------------------------------------------------------------
| JavaScript Loader
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký JavaScript của K86 Pro.
 *
 * @return void
 */
function k86_register_scripts() {

	$config = k86_get_assets_config();

	wp_register_script(
		'k86-pro',
		$config['url'] . 'js/k86-pro.js',
		array( 'jquery' ),
		$config['version'],
		true
	);

}

/**
 * Tải JavaScript ra Frontend.
 *
 * @return void
 */
function k86_enqueue_scripts() {

	wp_enqueue_script(
		'k86-pro'
	);

}

add_action(
	'wp_enqueue_scripts',
	'k86_register_scripts'
);
/*
|--------------------------------------------------------------------------
| Module Asset Registry API
|--------------------------------------------------------------------------
*/

/**
 * Danh sách Assets của các Module.
 *
 * @return array
 */
function k86_get_module_assets() {

	$modules = array();

	return apply_filters(
		'k86_module_assets',
		$modules
	);

}

/**
 * Đăng ký Assets của từng Module.
 *
 * @return void
 */
function k86_register_module_assets() {

	$config = k86_get_assets_config();

	foreach ( k86_get_module_assets() as $module => $assets ) {

		if ( ! empty( $assets['css'] ) ) {

			wp_register_style(
				'k86-' . $module,
				$config['url'] . 'css/' . ltrim( $assets['css'], '/' ),
				array( 'k86-pro' ),
				$config['version']
			);

		}

		if ( ! empty( $assets['js'] ) ) {

			wp_register_script(
				'k86-' . $module,
				$config['url'] . 'js/' . ltrim( $assets['js'], '/' ),
				array(
					'jquery',
					'k86-pro',
				),
				$config['version'],
				true
			);

		}

	}

}

add_action(
	'wp_enqueue_scripts',
	'k86_register_module_assets',
	15
);
add_action(
	'wp_enqueue_scripts',
	'k86_enqueue_scripts',
	20
);

/*
|--------------------------------------------------------------------------
| Asset Helper API
|--------------------------------------------------------------------------
*/

/**
 * Lấy URL thư mục CSS.
 *
 * @return string
 */
function k86_get_css_url() {

	return K86_PRO_URL . 'assets/css/';

}

/**
 * Lấy URL thư mục JavaScript.
 *
 * @return string
 */
function k86_get_js_url() {

	return K86_PRO_URL . 'assets/js/';

}

/**
 * Lấy URL thư mục hình ảnh.
 *
 * @return string
 */
function k86_get_images_url() {

	return K86_PRO_URL . 'assets/images/';

}

/**
 * Lấy URL một Asset.
 *
 * @param string $file Tên file.
 * @param string $type Loại asset.
 * @return string
 */
function k86_get_asset_url( $file, $type = 'images' ) {

	switch ( $type ) {

		case 'css':
			return k86_get_css_url() . ltrim( $file, '/' );

		case 'js':
			return k86_get_js_url() . ltrim( $file, '/' );

		default:
			return k86_get_images_url() . ltrim( $file, '/' );

	}

}

/*
|--------------------------------------------------------------------------
| Asset Condition API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có nên tải Assets.
 *
 * @return bool
 */
function k86_should_load_assets() {

	if ( is_admin() ) {
		return false;
	}

	return apply_filters(
		'k86_should_load_assets',
		true
	);

}

/**
 * Kiểm tra có nên tải Assets Admin.
 *
 * @return bool
 */
function k86_should_load_admin_assets() {

	return apply_filters(
		'k86_should_load_admin_assets',
		is_admin()
	);

}

/**
 * Assets đã sẵn sàng.
 *
 * @return bool
 */
function k86_assets_ready() {

	return did_action(
		'k86_assets_ready'
	) > 0;

}

/*
|--------------------------------------------------------------------------
| Asset Hook API
|--------------------------------------------------------------------------
*/

function k86_before_enqueue_assets() {

	do_action(
		'k86_before_enqueue_assets'
	);

}

function k86_after_enqueue_assets() {

	do_action(
		'k86_after_enqueue_assets'
	);

}

function k86_enqueue_all_assets() {

	if ( ! k86_should_load_assets() ) {
		return;
	}

	k86_before_enqueue_assets();

	k86_enqueue_styles();

	k86_enqueue_scripts();

	k86_after_enqueue_assets();

}

/*
|--------------------------------------------------------------------------
| Assets Framework API
|--------------------------------------------------------------------------
*/

function k86_assets_version() {

	return K86_PRO_VERSION;

}

function k86_assets_url() {

	return K86_PRO_URL . 'assets/';

}

function k86_is_assets_ready() {

	return did_action(
		'k86_assets_manager_ready'
	) > 0;

}

do_action(
	'k86_assets_manager_ready'
);

/*
|--------------------------------------------------------------------------
| Assets Final API
|--------------------------------------------------------------------------
*/

function k86_init_assets() {

	if ( ! k86_should_load_assets() ) {
		return;
	}

	k86_enqueue_all_assets();

}

do_action(
	'k86_assets_ready'
);
