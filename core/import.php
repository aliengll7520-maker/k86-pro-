<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Import Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Import Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy định dạng Import được hỗ trợ.
 *
 * @return array
 */
function k86_import_formats() {

	return array(
		'json',
		'csv',
	);

}

/**
 * Kiểm tra định dạng Import hợp lệ.
 *
 * @param string $format
 * @return bool
 */
function k86_import_format_exists( $format ) {

	return in_array(
		strtolower( $format ),
		k86_import_formats(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Import API
|--------------------------------------------------------------------------
*/

/**
 * Nhập dữ liệu.
 *
 * @param string $file
 * @param string $format
 * @return bool
 */
function k86_import( $file, $format = 'json' ) {

	if ( ! k86_import_format_exists( $format ) ) {
		return false;
	}

	do_action(
		'k86_import',
		sanitize_text_field( $file ),
		strtolower( $format )
	);

	return true;

}

/**
 * Kiểm tra tệp Import.
 *
 * @param string $file
 * @return bool
 */
function k86_import_file_exists( $file ) {

	return (bool) apply_filters(
		'k86_import_file_exists',
		false,
		sanitize_text_field( $file )
	);

}

/**
 * Lấy danh sách Import.
 *
 * @return array
 */
function k86_import_list() {

	return apply_filters(
		'k86_import_list',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| File Reader API
|--------------------------------------------------------------------------
*/

/**
 * Đọc dữ liệu từ tệp.
 *
 * @param string $file
 * @param string $format
 * @return array
 */
function k86_import_read( $file, $format = 'json' ) {

	if ( ! k86_import_format_exists( $format ) ) {
		return array();
	}

	return (array) apply_filters(
		'k86_import_read',
		array(),
		sanitize_text_field( $file ),
		strtolower( $format )
	);

}

/**
 * Lấy nội dung tệp Import.
 *
 * @param string $file
 * @return string
 */
function k86_import_file_content( $file ) {

	return (string) apply_filters(
		'k86_import_file_content',
		'',
		sanitize_text_field( $file )
	);

}

/**
 * Kiểm tra tệp có thể đọc.
 *
 * @param string $file
 * @return bool
 */
function k86_import_is_readable( $file ) {

	return (bool) apply_filters(
		'k86_import_is_readable',
		false,
		sanitize_text_field( $file )
	);

}
/*
|--------------------------------------------------------------------------
| Data Validation API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra dữ liệu Import hợp lệ.
 *
 * @param array $data
 * @return bool
 */
function k86_import_validate( $data ) {

	return (bool) apply_filters(
		'k86_import_validate',
		true,
		(array) $data
	);

}

/**
 * Lọc dữ liệu Import.
 *
 * @param array $data
 * @return array
 */
function k86_import_sanitize( $data ) {

	return (array) apply_filters(
		'k86_import_sanitize',
		(array) $data
	);

}

/**
 * Lấy danh sách lỗi Import.
 *
 * @return array
 */
function k86_import_errors() {

	return (array) apply_filters(
		'k86_import_errors',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| Import Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Import Engine sẵn sàng.
 *
 * @return bool
 */
function k86_import_ready() {

	return apply_filters(
		'k86_import_ready',
		true
	);

}

/**
 * Lấy cấu hình Import.
 *
 * @return array
 */
function k86_import_settings() {

	return apply_filters(
		'k86_import_settings',
		array(
			'formats' => k86_import_formats(),
		)
	);

}

/**
 * Đồng bộ Import.
 *
 * @return bool
 */
function k86_import_sync() {

	do_action(
		'k86_import_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Import Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu dữ liệu Import.
 *
 * @param string $source
 * @param array  $data
 * @return bool
 */
function k86_import_store( $source, $data ) {

	do_action(
		'k86_import_store',
		sanitize_text_field( $source ),
		(array) $data
	);

	return true;

}

/**
 * Lấy dữ liệu Import đã lưu.
 *
 * @param string $source
 * @return array
 */
function k86_import_storage( $source = '' ) {

	return (array) apply_filters(
		'k86_import_storage',
		array(),
		sanitize_text_field( $source )
	);

}

/**
 * Kiểm tra Import Storage sẵn sàng.
 *
 * @return bool
 */
function k86_import_storage_ready() {

	return apply_filters(
		'k86_import_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Import Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Import Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Import Engine đã tải.
 */
do_action( 'k86_import_loaded' );

/**
 * Filter dữ liệu Import.
 *
 * @param array $data
 * @return array
 */
function k86_import_filter_data( $data ) {

	return apply_filters(
		'k86_import_data',
		$data
	);

}

/**
 * Filter kết quả Import.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_import_filter_result( $result ) {

	return apply_filters(
		'k86_import_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Import Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Import Engine.
 *
 * @return void
 */
function k86_init_import() {

	do_action( 'k86_import_init' );

}

/**
 * Framework Import Engine đã sẵn sàng.
 */
do_action( 'k86_import_ready' );
