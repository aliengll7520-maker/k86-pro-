<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Update Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Update Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy phiên bản hiện tại.
 *
 * @return string
 */
function k86_current_version() {

	return '1.6.0';

}

/**
 * Lấy kênh cập nhật mặc định.
 *
 * @return string
 */
function k86_update_channel() {

	return 'stable';

}
/*
|--------------------------------------------------------------------------
| Version API
|--------------------------------------------------------------------------
*/

/**
 * Lấy phiên bản hiện tại.
 *
 * @return string
 */
function k86_get_version() {

	return k86_current_version();

}

/**
 * So sánh hai phiên bản.
 *
 * @param string $version1
 * @param string $version2
 * @return int
 */
function k86_version_compare( $version1, $version2 ) {

	return version_compare(
		$version1,
		$version2
	);

}

/**
 * Kiểm tra có bản cập nhật mới.
 *
 * @param string $latest_version
 * @return bool
 */
function k86_has_update( $latest_version ) {

	return version_compare(
		$latest_version,
		k86_current_version(),
		'>'
	);

}
/*
|--------------------------------------------------------------------------
| Update Check API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra cập nhật từ máy chủ.
 *
 * @return bool
 */
function k86_check_update() {

	do_action(
		'k86_check_update'
	);

	return true;

}

/**
 * Lấy thông tin bản cập nhật.
 *
 * @return array
 */
function k86_update_info() {

	return (array) apply_filters(
		'k86_update_info',
		array()
	);

}

/**
 * Kiểm tra máy chủ cập nhật sẵn sàng.
 *
 * @return bool
 */
function k86_update_server_ready() {

	return (bool) apply_filters(
		'k86_update_server_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Update Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu thông tin cập nhật.
 *
 * @param array $update
 * @return bool
 */
function k86_update_store( $update ) {

	do_action(
		'k86_update_store',
		(array) $update
	);

	return true;

}

/**
 * Lấy dữ liệu cập nhật đã lưu.
 *
 * @return array
 */
function k86_update_storage() {

	return (array) apply_filters(
		'k86_update_storage',
		array()
	);

}

/**
 * Kiểm tra Update Storage sẵn sàng.
 *
 * @return bool
 */
function k86_update_storage_ready() {

	return (bool) apply_filters(
		'k86_update_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Update Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Update Engine sẵn sàng.
 *
 * @return bool
 */
function k86_update_ready() {

	return apply_filters(
		'k86_update_ready',
		true
	);

}

/**
 * Lấy cấu hình Update.
 *
 * @return array
 */
function k86_update_settings() {

	return apply_filters(
		'k86_update_settings',
		array(
			'version' => k86_current_version(),
			'channel' => k86_update_channel(),
		)
	);

}

/**
 * Đồng bộ Update.
 *
 * @return bool
 */
function k86_update_sync() {

	do_action(
		'k86_update_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Update Remote API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra bản cập nhật từ máy chủ.
 *
 * @return bool
 */
function k86_update_remote_check() {

	do_action(
		'k86_update_remote_check'
	);

	return true;

}

/**
 * Tải thông tin bản cập nhật.
 *
 * @return array
 */
function k86_update_remote_info() {

	return (array) apply_filters(
		'k86_update_remote_info',
		array()
	);

}

/**
 * Kiểm tra Remote Update sẵn sàng.
 *
 * @return bool
 */
function k86_update_remote_ready() {

	return (bool) apply_filters(
		'k86_update_remote_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Update Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Update Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Update Engine đã tải.
 */
do_action( 'k86_update_loaded' );

/**
 * Filter dữ liệu Update.
 *
 * @param array $update
 * @return array
 */
function k86_update_filter_data( $update ) {

	return apply_filters(
		'k86_update_data',
		(array) $update
	);

}

/**
 * Filter kết quả Update.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_update_filter_result( $result ) {

	return apply_filters(
		'k86_update_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Update Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Update Engine.
 *
 * @return void
 */
function k86_init_update() {

	do_action( 'k86_update_init' );

}

/**
 * Framework Update Engine đã sẵn sàng.
 */
do_action( 'k86_update_ready' );
