<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Notification Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Notification Configuration
|--------------------------------------------------------------------------
*/

/**
 * Danh sách loại thông báo.
 *
 * @return array
 */
function k86_notification_types() {

	return array(
		'success',
		'info',
		'warning',
		'error',
	);

}

/**
 * Kiểm tra loại thông báo hợp lệ.
 *
 * @param string $type
 * @return bool
 */
function k86_notification_type_exists( $type ) {

	return in_array(
		$type,
		k86_notification_types(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Notification API
|--------------------------------------------------------------------------
*/

/**
 * Gửi thông báo.
 *
 * @param string $type
 * @param string $message
 * @return bool
 */
function k86_notify( $type, $message ) {

	if ( ! k86_notification_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_notify',
		$type,
		wp_kses_post( $message )
	);

	return true;

}

/**
 * Gửi thông báo thành công.
 *
 * @param string $message
 * @return bool
 */
function k86_notify_success( $message ) {

	return k86_notify(
		'success',
		$message
	);

}

/**
 * Gửi thông báo lỗi.
 *
 * @param string $message
 * @return bool
 */
function k86_notify_error( $message ) {

	return k86_notify(
		'error',
		$message
	);

}
/*
|--------------------------------------------------------------------------
| Notification Queue API
|--------------------------------------------------------------------------
*/

/**
 * Thêm thông báo vào hàng đợi.
 *
 * @param string $type
 * @param string $message
 * @return bool
 */
function k86_notification_queue_add( $type, $message ) {

	if ( ! k86_notification_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_notification_queue_add',
		$type,
		wp_kses_post( $message )
	);

	return true;

}

/**
 * Lấy hàng đợi thông báo.
 *
 * @return array
 */
function k86_notification_queue() {

	return apply_filters(
		'k86_notification_queue',
		array()
	);

}

/**
 * Xóa toàn bộ hàng đợi thông báo.
 *
 * @return bool
 */
function k86_notification_queue_clear() {

	do_action(
		'k86_notification_queue_clear'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Notification Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu thông báo.
 *
 * @param string $type
 * @param string $message
 * @return bool
 */
function k86_notification_store( $type, $message ) {

	if ( ! k86_notification_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_notification_store',
		$type,
		wp_kses_post( $message )
	);

	return true;

}

/**
 * Lấy danh sách thông báo đã lưu.
 *
 * @return array
 */
function k86_notification_storage() {

	return apply_filters(
		'k86_notification_storage',
		array()
	);

}

/**
 * Kiểm tra Notification Storage đã sẵn sàng.
 *
 * @return bool
 */
function k86_notification_storage_ready() {

	return apply_filters(
		'k86_notification_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Notification Helper API
|--------------------------------------------------------------------------
*/

/**
 * Gửi thông báo thông tin.
 *
 * @param string $message
 * @return bool
 */
function k86_notify_info( $message ) {

	return k86_notify(
		'info',
		$message
	);

}

/**
 * Gửi thông báo cảnh báo.
 *
 * @param string $message
 * @return bool
 */
/*
|--------------------------------------------------------------------------
| Notification Display API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị thông báo.
 *
 * @param array $notification
 * @return void
 */
function k86_notification_display( $notification ) {

	do_action(
		'k86_notification_display',
		$notification
	);

}

/**
 * Hiển thị toàn bộ thông báo đang chờ.
 *
 * @return void
 */
function k86_notification_display_all() {

	do_action(
		'k86_notification_display_all'
	);

}

/**
 * Xóa thông báo đã hiển thị.
 *
 * @return bool
 */
function k86_notification_flush() {

	do_action(
		'k86_notification_flush'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Notification Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Notification Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Notification Engine đã tải.
 */
do_action( 'k86_notification_loaded' );

/**
 * Filter dữ liệu Notification.
 *
 * @param array $notification
 * @return array
 */
function k86_notification_filter_data( $notification ) {

	return apply_filters(
		'k86_notification_data',
		$notification
	);

}

/**
 * Filter kết quả Notification.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_notification_filter_result( $result ) {

	return apply_filters(
		'k86_notification_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Notification Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Notification Engine.
 *
 * @return void
 */
function k86_init_notification() {

	do_action( 'k86_notification_init' );

}

/**
 * Framework Notification Engine đã sẵn sàng.
 */
do_action( 'k86_notification_ready' );
