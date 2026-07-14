<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Backup Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Backup Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy thư mục Backup mặc định.
 *
 * @return string
 */
function k86_backup_directory() {

	return 'k86-backups';

}

/**
 * Lấy định dạng Backup mặc định.
 *
 * @return string
 */
function k86_backup_format() {

	return 'json';

}
/*
|--------------------------------------------------------------------------
| Backup API
|--------------------------------------------------------------------------
*/

/**
 * Tạo bản sao lưu.
 *
 * @param string $name
 * @return bool
 */
function k86_create_backup( $name ) {

	do_action(
		'k86_create_backup',
		sanitize_file_name( $name )
	);

	return true;

}

/**
 * Kiểm tra bản sao lưu tồn tại.
 *
 * @param string $name
 * @return bool
 */
function k86_backup_exists( $name ) {

	return (bool) apply_filters(
		'k86_backup_exists',
		false,
		sanitize_file_name( $name )
	);

}

/**
 * Lấy danh sách bản sao lưu.
 *
 * @return array
 */
function k86_backup_list() {

	return apply_filters(
		'k86_backup_list',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| Restore API
|--------------------------------------------------------------------------
*/

/**
 * Khôi phục từ bản sao lưu.
 *
 * @param string $name
 * @return bool
 */
function k86_restore_backup( $name ) {

	do_action(
		'k86_restore_backup',
		sanitize_file_name( $name )
	);

	return true;

}

/**
 * Xóa bản sao lưu.
 *
 * @param string $name
 * @return bool
 */
function k86_delete_backup( $name ) {

	do_action(
		'k86_delete_backup',
		sanitize_file_name( $name )
	);

	return true;

}

/**
 * Lấy thông tin bản sao lưu.
 *
 * @param string $name
 * @return array
 */
function k86_backup_info( $name ) {

	return (array) apply_filters(
		'k86_backup_info',
		array(),
		sanitize_file_name( $name )
	);

}
/*
|--------------------------------------------------------------------------
| Backup Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu dữ liệu Backup.
 *
 * @param string $name
 * @param array  $data
 * @return bool
 */
function k86_backup_store( $name, $data ) {

	do_action(
		'k86_backup_store',
		sanitize_file_name( $name ),
		$data
	);

	return true;

}

/**
 * Đọc dữ liệu Backup.
 *
 * @param string $name
 * @return array
 */
function k86_backup_read( $name ) {

	return (array) apply_filters(
		'k86_backup_read',
		array(),
		sanitize_file_name( $name )
	);

}

/**
 * Kiểm tra Backup Storage sẵn sàng.
 *
 * @return bool
 */
function k86_backup_storage_ready() {

	return apply_filters(
		'k86_backup_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Backup Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Backup Engine sẵn sàng.
 *
 * @return bool
 */
function k86_backup_ready() {

	return apply_filters(
		'k86_backup_ready',
		true
	);

}

/**
 * Lấy thông tin cấu hình Backup.
 *
 * @return array
 */
function k86_backup_settings() {

	return apply_filters(
		'k86_backup_settings',
		array(
			'directory' => k86_backup_directory(),
			'format'    => k86_backup_format(),
		)
	);

}

/**
 * Đồng bộ Backup.
 *
 * @return bool
 */
function k86_backup_sync() {

	do_action(
		'k86_backup_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Backup Scheduler API
|--------------------------------------------------------------------------
*/

/**
 * Lên lịch sao lưu tự động.
 *
 * @param string $interval
 * @return bool
 */
function k86_backup_schedule( $interval = '' ) {

	do_action(
		'k86_backup_schedule',
		$interval
	);

	return true;

}

/**
 * Hủy lịch sao lưu tự động.
 *
 * @return bool
 */
function k86_backup_unschedule() {

	do_action(
		'k86_backup_unschedule'
	);

	return true;

}

/**
 * Kiểm tra Backup Scheduler sẵn sàng.
 *
 * @return bool
 */
function k86_backup_scheduler_ready() {

	return apply_filters(
		'k86_backup_scheduler_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Backup Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Backup Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Backup Engine đã tải.
 */
do_action( 'k86_backup_loaded' );

/**
 * Filter dữ liệu Backup.
 *
 * @param array $backup
 * @return array
 */
function k86_backup_filter_data( $backup ) {

	return apply_filters(
		'k86_backup_data',
		$backup
	);

}

/**
 * Filter kết quả Backup.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_backup_filter_result( $result ) {

	return apply_filters(
		'k86_backup_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Backup Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Backup Engine.
 *
 * @return void
 */
function k86_init_backup() {

	do_action( 'k86_backup_init' );

}

/**
 * Framework Backup Engine đã sẵn sàng.
 */
do_action( 'k86_backup_ready' );
