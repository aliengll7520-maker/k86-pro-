<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Scheduler Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Scheduler Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy Prefix Scheduler.
 *
 * @return string
 */
function k86_scheduler_prefix() {

	return 'k86_';

}

/**
 * Lấy khoảng thời gian mặc định.
 *
 * @return string
 */
function k86_scheduler_default_interval() {

	return 'hourly';

}
/*
|--------------------------------------------------------------------------
| Cron Event API
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký Cron Event.
 *
 * @param string $hook
 * @param string $interval
 * @return bool
 */
function k86_schedule_event( $hook, $interval = '' ) {

	$interval = $interval ? $interval : k86_scheduler_default_interval();

	do_action(
		'k86_schedule_event',
		sanitize_key( $hook ),
		$interval
	);

	return true;

}

/**
 * Kiểm tra Cron Event đã tồn tại.
 *
 * @param string $hook
 * @return bool
 */
function k86_event_scheduled( $hook ) {

	return (bool) apply_filters(
		'k86_event_scheduled',
		false,
		sanitize_key( $hook )
	);

}

/**
 * Lấy danh sách Cron Event.
 *
 * @return array
 */
function k86_scheduler_events() {

	return apply_filters(
		'k86_scheduler_events',
		array()
	);

}
/*
|--------------------------------------------------------------------------
| Schedule API
|--------------------------------------------------------------------------
*/

/**
 * Lên lịch một tác vụ.
 *
 * @param string $hook
 * @param string $interval
 * @param array  $args
 * @return bool
 */
function k86_schedule_task( $hook, $interval = '', $args = array() ) {

	$interval = $interval ? $interval : k86_scheduler_default_interval();

	do_action(
		'k86_schedule_task',
		sanitize_key( $hook ),
		$interval,
		$args
	);

	return true;

}

/**
 * Chạy một tác vụ ngay lập tức.
 *
 * @param string $hook
 * @param array  $args
 * @return bool
 */
function k86_run_task( $hook, $args = array() ) {

	do_action(
		sanitize_key( $hook ),
		$args
	);

	return true;

}

/**
 * Lấy thông tin một tác vụ.
 *
 * @param string $hook
 * @return array
 */
function k86_scheduler_task( $hook ) {

	return (array) apply_filters(
		'k86_scheduler_task',
		array(),
		sanitize_key( $hook )
	);

}
/*
|--------------------------------------------------------------------------
| Unschedule API
|--------------------------------------------------------------------------
*/

/**
 * Hủy một tác vụ đã lên lịch.
 *
 * @param string $hook
 * @return bool
 */
function k86_unschedule_task( $hook ) {

	do_action(
		'k86_unschedule_task',
		sanitize_key( $hook )
	);

	return true;

}

/**
 * Hủy tất cả tác vụ của một Hook.
 *
 * @param string $hook
 * @return bool
 */
function k86_unschedule_all_tasks( $hook ) {

	do_action(
		'k86_unschedule_all_tasks',
		sanitize_key( $hook )
	);

	return true;

}

/**
 * Xóa toàn bộ Scheduler.
 *
 * @return bool
 */
function k86_scheduler_clear() {

	do_action(
		'k86_scheduler_clear'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Task Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Scheduler Engine sẵn sàng.
 *
 * @return bool
 */
function k86_scheduler_ready() {

	return apply_filters(
		'k86_scheduler_ready',
		true
	);

}

/**
 * Lấy thông tin Scheduler.
 *
 * @return array
 */
function k86_scheduler_info() {

	return apply_filters(
		'k86_scheduler_info',
		array(
			'prefix'           => k86_scheduler_prefix(),
			'default_interval' => k86_scheduler_default_interval(),
		)
	);

}

/**
 * Đồng bộ Scheduler.
 *
 * @return bool
 */
function k86_scheduler_sync() {

	do_action(
		'k86_scheduler_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Scheduler Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu tác vụ Scheduler.
 *
 * @param string $hook
 * @param array  $task
 * @return bool
 */
function k86_scheduler_store( $hook, $task ) {

	do_action(
		'k86_scheduler_store',
		sanitize_key( $hook ),
		$task
	);

	return true;

}

/**
 * Lấy dữ liệu Scheduler Storage.
 *
 * @return array
 */
function k86_scheduler_storage() {

	return apply_filters(
		'k86_scheduler_storage',
		array()
	);

}

/**
 * Kiểm tra Scheduler Storage sẵn sàng.
 *
 * @return bool
 */
function k86_scheduler_storage_ready() {

	return apply_filters(
		'k86_scheduler_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Scheduler Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Scheduler Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Scheduler Engine đã tải.
 */
do_action( 'k86_scheduler_loaded' );

/**
 * Filter dữ liệu Scheduler.
 *
 * @param array $task
 * @return array
 */
function k86_scheduler_filter_data( $task ) {

	return apply_filters(
		'k86_scheduler_data',
		$task
	);

}

/**
 * Filter kết quả Scheduler.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_scheduler_filter_result( $result ) {

	return apply_filters(
		'k86_scheduler_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Scheduler Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Scheduler Engine.
 *
 * @return void
 */
function k86_init_scheduler() {

	do_action( 'k86_scheduler_init' );

}

/**
 * Framework Scheduler Engine đã sẵn sàng.
 */
do_action( 'k86_scheduler_ready' );
