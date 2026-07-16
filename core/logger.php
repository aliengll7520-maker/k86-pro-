<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Logger Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Logger Configuration
|--------------------------------------------------------------------------
*/

/**
 * Các mức độ Log.
 *
 * @return array
 */
function k86_log_levels() {

	return array(
		'info',
		'warning',
		'error',
	);

}

/**
 * Mức Log mặc định.
 *
 * @return string
 */
function k86_default_log_level() {

	return 'info';

}
/*
|--------------------------------------------------------------------------
| Logger Write API
|--------------------------------------------------------------------------
*/

/**
 * Ghi một bản ghi Log.
 *
 * @param string $message
 * @param string $level
 * @param array  $context
 * @return array
 */
function k86_write_log( $message, $level = '', $context = array() ) {

	$level = empty( $level )
		? k86_default_log_level()
		: $level;

	if ( ! in_array( $level, k86_log_levels(), true ) ) {
		$level = k86_default_log_level();
	}

	$log = array(
		'time'    => current_time( 'mysql' ),
		'level'   => $level,
		'message' => sanitize_text_field( $message ),
		'context' => $context,
	);

	do_action(
    'k86_write_log',
    $log
);

return $log;
}
function k86_get_logs() {

	$logs = apply_filters(
		'k86_logs',
		array()
	);

	if ( ! is_array( $logs ) ) {
		return array();
	}

	return $logs;

}

/**
 * Lấy Log mới nhất.
 *
 * @return array|null
 */
function k86_get_latest_log() {

	$logs = k86_get_logs();

	if ( empty( $logs ) ) {
		return null;
	}

	return end( $logs );

}

/**
 * Đếm số lượng Log.
 *
 * @return int
 */
function k86_log_count() {

	return count(
		k86_get_logs()
	);

}
  /*
|--------------------------------------------------------------------------
| Logger Delete API
|--------------------------------------------------------------------------
*/

/**
 * Xóa toàn bộ Log.
 *
 * @return bool
 */
function k86_clear_logs() {

	do_action( 'k86_clear_logs' );

	return true;

}

/**
 * Xóa Log theo mức độ.
 *
 * @param string $level
 * @return bool
 */
function k86_clear_logs_by_level( $level ) {

	if ( ! in_array( $level, k86_log_levels(), true ) ) {
		return false;
	}

	do_action(
		'k86_clear_logs_by_level',
		$level
	);

	return true;

}

/**
 * Xóa Log cũ.
 *
 * @param int $days
 * @return bool
 */
function k86_clear_old_logs( $days = 30 ) {

	do_action(
		'k86_clear_old_logs',
		absint( $days )
	);

	return true;

}
  /*
|--------------------------------------------------------------------------
| Logger Helper API
|--------------------------------------------------------------------------
*/

/**
 * Ghi Log mức Info.
 *
 * @param string $message
 * @param array  $context
 * @return array
 */
function k86_log_info( $message, $context = array() ) {

	return k86_write_log(
		$message,
		'info',
		$context
	);

}

/**
 * Ghi Log mức Warning.
 *
 * @param string $message
 * @param array  $context
 * @return array
 */
function k86_log_warning( $message, $context = array() ) {

	return k86_write_log(
		$message,
		'warning',
		$context
	);

}

/**
 * Ghi Log mức Error.
 *
 * @param string $message
 * @param array  $context
 * @return array
 */
function k86_log_error( $message, $context = array() ) {

	return k86_write_log(
		$message,
		'error',
		$context
	);

}
  /*
|--------------------------------------------------------------------------
| Logger Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu Log.
 *
 * @param array $log
 * @return bool
 */
function k86_store_log( $log ) {

	$log = apply_filters(
		'k86_store_log_data',
		$log
	);

	do_action(
		'k86_store_log',
		$log
	);

	return true;

}

/**
 * Kiểm tra Storage khả dụng.
 *
 * @return bool
 */
function k86_logger_storage_ready() {

	return apply_filters(
		'k86_logger_storage_ready',
		true
	);

}

/**
 * Đồng bộ Log.
 *
 * @return void
 */
function k86_sync_logs() {

	do_action(
		'k86_sync_logs'
	);

}
  /*
|--------------------------------------------------------------------------
| Logger Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Logger Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Logger Engine đã tải.
 */
do_action( 'k86_logger_loaded' );

/**
 * Filter dữ liệu Log.
 *
 * @param array $log
 * @return array
 */
function k86_logger_filter_data( $log ) {

	return apply_filters(
		'k86_logger_data',
		$log
	);

}

/**
 * Filter kết quả Logger.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_logger_filter_result( $result ) {

	return apply_filters(
		'k86_logger_result',
		$result
	);

}
  /*
|--------------------------------------------------------------------------
| Logger Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Logger Engine.
 *
 * @return void
 */
function k86_init_logger() {

	do_action( 'k86_logger_init' );

}

/**
 * Framework Logger Engine đã sẵn sàng.
 */
do_action( 'k86_logger_ready' );
