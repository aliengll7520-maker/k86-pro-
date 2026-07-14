<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * License Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| License Configuration
|--------------------------------------------------------------------------
*/

/**
 * Trạng thái License được hỗ trợ.
 *
 * @return array
 */
function k86_license_statuses() {

	return array(
		'active',
		'inactive',
		'expired',
		'invalid',
	);

}

/**
 * Kiểm tra trạng thái License hợp lệ.
 *
 * @param string $status
 * @return bool
 */
function k86_license_status_exists( $status ) {

	return in_array(
		strtolower( $status ),
		k86_license_statuses(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| License API
|--------------------------------------------------------------------------
*/

/**
 * Kích hoạt License.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_activate( $license_key ) {

	do_action(
		'k86_license_activate',
		sanitize_text_field( $license_key )
	);

	return true;

}

/**
 * Hủy kích hoạt License.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_deactivate( $license_key ) {

	do_action(
		'k86_license_deactivate',
		sanitize_text_field( $license_key )
	);

	return true;

}

/**
 * Lấy thông tin License.
 *
 * @return array
 */
function k86_license_info() {

	return (array) apply_filters(
		'k86_license_info',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| License Validation API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra License hợp lệ.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_validate( $license_key ) {

	return (bool) apply_filters(
		'k86_license_validate',
		false,
		sanitize_text_field( $license_key )
	);

}

/**
 * Lấy trạng thái License.
 *
 * @param string $license_key
 * @return string
 */
function k86_license_status( $license_key ) {

	return (string) apply_filters(
		'k86_license_status',
		'inactive',
		sanitize_text_field( $license_key )
	);

}

/**
 * Kiểm tra License còn hạn.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_is_active( $license_key ) {

	return ( 'active' === k86_license_status( $license_key ) );

}
/*
|--------------------------------------------------------------------------
| License Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu dữ liệu License.
 *
 * @param array $license
 * @return bool
 */
function k86_license_store( $license ) {

	do_action(
		'k86_license_store',
		(array) $license
	);

	return true;

}

/**
 * Lấy dữ liệu License đã lưu.
 *
 * @return array
 */
function k86_license_storage() {

	return (array) apply_filters(
		'k86_license_storage',
		array()
	);

}

/**
 * Kiểm tra License Storage sẵn sàng.
 *
 * @return bool
 */
function k86_license_storage_ready() {

	return apply_filters(
		'k86_license_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| License Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra License Engine sẵn sàng.
 *
 * @return bool
 */
function k86_license_ready() {

	return apply_filters(
		'k86_license_ready',
		true
	);

}

/**
 * Lấy cấu hình License.
 *
 * @return array
 */
function k86_license_settings() {

	return apply_filters(
		'k86_license_settings',
		array(
			'statuses' => k86_license_statuses(),
		)
	);

}

/**
 * Đồng bộ License.
 *
 * @return bool
 */
function k86_license_sync() {

	do_action(
		'k86_license_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| License Remote API
|--------------------------------------------------------------------------
*/

/**
 * Gửi yêu cầu xác thực License.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_remote_verify( $license_key ) {

	do_action(
		'k86_license_remote_verify',
		sanitize_text_field( $license_key )
	);

	return true;

}

/**
 * Làm mới thông tin License.
 *
 * @param string $license_key
 * @return bool
 */
function k86_license_remote_refresh( $license_key ) {

	do_action(
		'k86_license_remote_refresh',
		sanitize_text_field( $license_key )
	);

	return true;

}

/**
 * Kiểm tra License Remote API sẵn sàng.
 *
 * @return bool
 */
function k86_license_remote_ready() {

	return apply_filters(
		'k86_license_remote_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| License Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào License Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo License Engine đã tải.
 */
do_action( 'k86_license_loaded' );

/**
 * Filter dữ liệu License.
 *
 * @param array $license
 * @return array
 */
function k86_license_filter_data( $license ) {

	return apply_filters(
		'k86_license_data',
		(array) $license
	);

}

/**
 * Filter kết quả License.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_license_filter_result( $result ) {

	return apply_filters(
		'k86_license_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| License Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo License Engine.
 *
 * @return void
 */
function k86_init_license() {

	do_action( 'k86_license_init' );

}

/**
 * Framework License Engine đã sẵn sàng.
 */
do_action( 'k86_license_ready' );
