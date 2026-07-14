<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Bootstrap Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Bootstrap Configuration
|--------------------------------------------------------------------------
*/

/**
 * Danh sách Engine mặc định.
 *
 * @return array
 */
function k86_bootstrap_engines() {

	return array(
		'database',
		'settings',
		'logger',
		'security',
		'cache',
	);

}

/**
 * Kiểm tra Engine có tồn tại.
 *
 * @param string $engine
 * @return bool
 */
function k86_bootstrap_engine_exists( $engine ) {

	return in_array(
		strtolower( $engine ),
		k86_bootstrap_engines(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Loader API
|--------------------------------------------------------------------------
*/

/**
 * Nạp Engine.
 *
 * @param string $engine
 * @return bool
 */
function k86_load_engine( $engine ) {

	if ( ! k86_bootstrap_engine_exists( $engine ) ) {
		return false;
	}

	do_action(
		'k86_load_engine',
		strtolower( $engine )
	);

	return true;

}

/**
 * Nạp tất cả Engine.
 *
 * @return bool
 */
function k86_load_all_engines() {

	foreach ( k86_bootstrap_engines() as $engine ) {
		k86_load_engine( $engine );
	}

	return true;

}

/**
 * Kiểm tra Engine đã được nạp.
 *
 * @param string $engine
 * @return bool
 */
function k86_engine_loaded( $engine ) {

	return (bool) apply_filters(
		'k86_engine_loaded',
		false,
		strtolower( $engine )
	);

}
/*
|--------------------------------------------------------------------------
| Engine Registry API
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký Engine.
 *
 * @param string $engine
 * @return bool
 */
function k86_register_engine( $engine ) {

	do_action(
		'k86_register_engine',
		strtolower( $engine )
	);

	return true;

}

/**
 * Lấy danh sách Engine đã đăng ký.
 *
 * @return array
 */
function k86_registered_engines() {

	return (array) apply_filters(
		'k86_registered_engines',
		k86_bootstrap_engines()
	);

}

/**
 * Kiểm tra Engine đã được đăng ký.
 *
 * @param string $engine
 * @return bool
 */
function k86_engine_registered( $engine ) {

	return in_array(
		strtolower( $engine ),
		k86_registered_engines(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Bootstrap Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Bootstrap Engine sẵn sàng.
 *
 * @return bool
 */
function k86_bootstrap_ready() {

	return (bool) apply_filters(
		'k86_bootstrap_ready',
		true
	);

}

/**
 * Lấy cấu hình Bootstrap.
 *
 * @return array
 */
function k86_bootstrap_settings() {

	return (array) apply_filters(
		'k86_bootstrap_settings',
		array(
			'engines' => k86_registered_engines(),
		)
	);

}

/**
 * Đồng bộ Bootstrap.
 *
 * @return bool
 */
function k86_bootstrap_sync() {

	do_action(
		'k86_bootstrap_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Bootstrap Integration API
|--------------------------------------------------------------------------
*/

/**
 * Điều phối toàn bộ Engine.
 *
 * @return bool
 */
function k86_bootstrap_integrate() {

	do_action(
		'k86_bootstrap_integrate'
	);

	return true;

}

/**
 * Lấy danh sách Engine đang hoạt động.
 *
 * @return array
 */
function k86_active_engines() {

	return (array) apply_filters(
		'k86_active_engines',
		k86_registered_engines()
	);

}

/**
 * Kiểm tra Bootstrap Integration sẵn sàng.
 *
 * @return bool
 */
function k86_bootstrap_integration_ready() {

	return (bool) apply_filters(
		'k86_bootstrap_integration_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Bootstrap Loader Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Bootstrap Loader sẵn sàng.
 *
 * @return bool
 */
function k86_bootstrap_loader_ready() {

	return (bool) apply_filters(
		'k86_bootstrap_loader_ready',
		true
	);

}

/**
 * Khởi động Bootstrap Loader.
 *
 * @return bool
 */
function k86_bootstrap_loader_start() {

	do_action(
		'k86_bootstrap_loader_start'
	);

	return true;

}

/**
 * Hoàn tất Bootstrap Loader.
 *
 * @return bool
 */
function k86_bootstrap_loader_finish() {

	do_action(
		'k86_bootstrap_loader_finish'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Bootstrap Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Bootstrap Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Bootstrap Engine đã tải.
 */
do_action( 'k86_bootstrap_loaded' );

/**
 * Filter dữ liệu Bootstrap.
 *
 * @param array $data
 * @return array
 */
function k86_bootstrap_filter_data( $data ) {

	return apply_filters(
		'k86_bootstrap_data',
		(array) $data
	);

}

/**
 * Filter kết quả Bootstrap.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_bootstrap_filter_result( $result ) {

	return apply_filters(
		'k86_bootstrap_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Bootstrap Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Bootstrap Engine.
 *
 * @return void
 */
function k86_init_bootstrap() {

	do_action( 'k86_bootstrap_init' );

}

/**
 * Framework Bootstrap Engine đã sẵn sàng.
 */
do_action( 'k86_bootstrap_ready' );
