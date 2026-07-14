<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Export Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Export Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy định dạng Export được hỗ trợ.
 *
 * @return array
 */
function k86_export_formats() {

	return array(
		'json',
		'csv',
	);

}

/**
 * Kiểm tra định dạng Export hợp lệ.
 *
 * @param string $format
 * @return bool
 */
function k86_export_format_exists( $format ) {

	return in_array(
		strtolower( $format ),
		k86_export_formats(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Export API
|--------------------------------------------------------------------------
*/

/**
 * Xuất dữ liệu.
 *
 * @param string $name
 * @param string $format
 * @return bool
 */
function k86_export( $name, $format = 'json' ) {

	if ( ! k86_export_format_exists( $format ) ) {
		return false;
	}

	do_action(
		'k86_export',
		sanitize_file_name( $name ),
		strtolower( $format )
	);

	return true;

}

/**
 * Kiểm tra dữ liệu Export tồn tại.
 *
 * @param string $name
 * @return bool
 */
function k86_export_exists( $name ) {

	return (bool) apply_filters(
		'k86_export_exists',
		false,
		sanitize_file_name( $name )
	);

}

/**
 * Lấy danh sách Export.
 *
 * @return array
 */
function k86_export_list() {

	return apply_filters(
		'k86_export_list',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| File Writer API
|--------------------------------------------------------------------------
*/

/**
 * Ghi dữ liệu ra tệp.
 *
 * @param string $name
 * @param array  $data
 * @param string $format
 * @return bool
 */
function k86_export_write( $name, $data, $format = 'json' ) {

	if ( ! k86_export_format_exists( $format ) ) {
		return false;
	}

	do_action(
		'k86_export_write',
		sanitize_file_name( $name ),
		(array) $data,
		strtolower( $format )
	);

	return true;

}

/**
 * Lấy nội dung tệp Export.
 *
 * @param string $name
 * @return string
 */
function k86_export_file_content( $name ) {

	return (string) apply_filters(
		'k86_export_file_content',
		'',
		sanitize_file_name( $name )
	);

}

/**
 * Kiểm tra tệp có thể ghi.
 *
 * @param string $name
 * @return bool
 */
function k86_export_is_writable( $name ) {

	return (bool) apply_filters(
		'k86_export_is_writable',
		false,
		sanitize_file_name( $name )
	);

}
/*
|--------------------------------------------------------------------------
| Data Formatter API
|--------------------------------------------------------------------------
*/

/**
 * Định dạng dữ liệu Export.
 *
 * @param array  $data
 * @param string $format
 * @return array
 */
function k86_export_format_data( $data, $format = 'json' ) {

	if ( ! k86_export_format_exists( $format ) ) {
		return array();
	}

	return (array) apply_filters(
		'k86_export_format_data',
		(array) $data,
		strtolower( $format )
	);

}

/**
 * Chuẩn hóa dữ liệu Export.
 *
 * @param array $data
 * @return array
 */
function k86_export_sanitize( $data ) {

	return (array) apply_filters(
		'k86_export_sanitize',
		(array) $data
	);

}

/**
 * Kiểm tra dữ liệu Export hợp lệ.
 *
 * @param array $data
 * @return bool
 */
function k86_export_validate( $data ) {

	return (bool) apply_filters(
		'k86_export_validate',
		true,
		(array) $data
	);

}
/*
|--------------------------------------------------------------------------
| Export Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Export Engine sẵn sàng.
 *
 * @return bool
 */
function k86_export_ready() {

	return apply_filters(
		'k86_export_ready',
		true
	);

}

/**
 * Lấy cấu hình Export.
 *
 * @return array
 */
function k86_export_settings() {

	return apply_filters(
		'k86_export_settings',
		array(
			'formats' => k86_export_formats(),
		)
	);

}

/**
 * Đồng bộ Export.
 *
 * @return bool
 */
function k86_export_sync() {

	do_action(
		'k86_export_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Export Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu dữ liệu Export.
 *
 * @param string $name
 * @param array  $data
 * @return bool
 */
function k86_export_store( $name, $data ) {

	do_action(
		'k86_export_store',
		sanitize_file_name( $name ),
		(array) $data
	);

	return true;

}

/**
 * Lấy dữ liệu Export đã lưu.
 *
 * @param string $name
 * @return array
 */
function k86_export_storage( $name = '' ) {

	return (array) apply_filters(
		'k86_export_storage',
		array(),
		sanitize_file_name( $name )
	);

}

/**
 * Kiểm tra Export Storage sẵn sàng.
 *
 * @return bool
 */
function k86_export_storage_ready() {

	return apply_filters(
		'k86_export_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Export Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Export Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Export Engine đã tải.
 */
do_action( 'k86_export_loaded' );

/**
 * Filter dữ liệu Export.
 *
 * @param array $data
 * @return array
 */
function k86_export_filter_data( $data ) {

	return apply_filters(
		'k86_export_data',
		$data
	);

}

/**
 * Filter kết quả Export.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_export_filter_result( $result ) {

	return apply_filters(
		'k86_export_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Export Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Export Engine.
 *
 * @return void
 */
function k86_init_export() {

	do_action( 'k86_export_init' );

}

/**
 * Framework Export Engine đã sẵn sàng.
 */
do_action( 'k86_export_ready' );
