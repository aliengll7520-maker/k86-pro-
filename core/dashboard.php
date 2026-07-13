<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Dashboard Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Dashboard Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy slug Dashboard.
 *
 * @return string
 */
function k86_dashboard_slug() {

	return 'k86-dashboard';

}

/**
 * Lấy tiêu đề Dashboard.
 *
 * @return string
 */
function k86_dashboard_title() {

	return __( 'K86 Pro Dashboard', 'k86-pro' );

}
/*
|--------------------------------------------------------------------------
| Dashboard Widget API
|--------------------------------------------------------------------------
*/

/**
 * Lấy danh sách Widget Dashboard.
 *
 * @return array
 */
function k86_dashboard_widgets() {

	return apply_filters(
		'k86_dashboard_widgets',
		array()
	);

}

/**
 * Đăng ký Widget Dashboard.
 *
 * @param string $id
 * @param array  $args
 * @return void
 */
function k86_register_dashboard_widget( $id, $args ) {

	do_action(
		'k86_register_dashboard_widget',
		sanitize_key( $id ),
		$args
	);

}

/**
 * Kiểm tra Widget tồn tại.
 *
 * @param string $id
 * @return bool
 */
function k86_dashboard_widget_exists( $id ) {

	$widgets = k86_dashboard_widgets();

	return isset( $widgets[ $id ] );

}
/*
|--------------------------------------------------------------------------
| Dashboard Data API
|--------------------------------------------------------------------------
*/

/**
 * Lấy dữ liệu Dashboard.
 *
 * @return array
 */
function k86_dashboard_data() {

	return apply_filters(
		'k86_dashboard_data',
		array()
	);

}

/**
 * Lấy dữ liệu của một Widget.
 *
 * @param string $widget
 * @return array
 */
function k86_dashboard_widget_data( $widget ) {

	return apply_filters(
		'k86_dashboard_widget_data',
		array(),
		sanitize_key( $widget )
	);

}

/**
 * Làm mới dữ liệu Dashboard.
 *
 * @return void
 */
function k86_dashboard_refresh() {

	do_action( 'k86_dashboard_refresh' );

}
/*
|--------------------------------------------------------------------------
| Dashboard Card API
|--------------------------------------------------------------------------
*/

/**
 * Lấy danh sách Dashboard Card.
 *
 * @return array
 */
function k86_dashboard_cards() {

	return apply_filters(
		'k86_dashboard_cards',
		array()
	);

}

/**
 * Đăng ký Dashboard Card.
 *
 * @param string $id
 * @param array  $args
 * @return void
 */
function k86_register_dashboard_card( $id, $args ) {

	do_action(
		'k86_register_dashboard_card',
		sanitize_key( $id ),
		$args
	);

}

/**
 * Kiểm tra Dashboard Card tồn tại.
 *
 * @param string $id
 * @return bool
 */
function k86_dashboard_card_exists( $id ) {

	$cards = k86_dashboard_cards();

	return isset( $cards[ $id ] );

}
/*
|--------------------------------------------------------------------------
| Dashboard Summary API
|--------------------------------------------------------------------------
*/

/**
 * Lấy dữ liệu tổng quan Dashboard.
 *
 * @return array
 */
function k86_dashboard_summary() {

	$summary = array(
		'statistics' => apply_filters(
			'k86_dashboard_statistics',
			array()
		),
		'logger' => apply_filters(
			'k86_dashboard_logger',
			array()
		),
		'database' => apply_filters(
			'k86_dashboard_database',
			array()
		),
	);

	return apply_filters(
		'k86_dashboard_summary',
		$summary
	);

}

/**
 * Lấy số lượng Widget.
 *
 * @return int
 */
function k86_dashboard_widget_count() {

	return count(
		k86_dashboard_widgets()
	);

}

/**
 * Lấy số lượng Dashboard Card.
 *
 * @return int
 */
function k86_dashboard_card_count() {

	return count(
		k86_dashboard_cards()
	);

}
/*
|--------------------------------------------------------------------------
| Dashboard Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lấy cấu hình Dashboard của người dùng.
 *
 * @param int $user_id
 * @return array
 */
function k86_dashboard_settings( $user_id = 0 ) {

	$user_id = $user_id ? absint( $user_id ) : get_current_user_id();

	return apply_filters(
		'k86_dashboard_settings',
		array(),
		$user_id
	);

}

/**
 * Lưu cấu hình Dashboard.
 *
 * @param array $settings
 * @param int   $user_id
 * @return bool
 */
function k86_dashboard_save_settings( $settings, $user_id = 0 ) {

	$user_id = $user_id ? absint( $user_id ) : get_current_user_id();

	do_action(
		'k86_dashboard_save_settings',
		$settings,
		$user_id
	);

	return true;

}

/**
 * Đặt lại Dashboard về mặc định.
 *
 * @param int $user_id
 * @return bool
 */
function k86_dashboard_reset_settings( $user_id = 0 ) {

	$user_id = $user_id ? absint( $user_id ) : get_current_user_id();

	do_action(
		'k86_dashboard_reset_settings',
		$user_id
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Dashboard Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Dashboard Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Dashboard Engine đã tải.
 */
do_action( 'k86_dashboard_loaded' );

/**
 * Filter dữ liệu Dashboard.
 *
 * @param array $data
 * @return array
 */
function k86_dashboard_filter_data( $data ) {

	return apply_filters(
		'k86_dashboard_data',
		$data
	);

}

/**
 * Filter kết quả Dashboard.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_dashboard_filter_result( $result ) {

	return apply_filters(
		'k86_dashboard_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Dashboard Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Dashboard Engine.
 *
 * @return void
 */
function k86_init_dashboard() {

	do_action( 'k86_dashboard_init' );

}

/**
 * Framework Dashboard Engine đã sẵn sàng.
 */
do_action( 'k86_dashboard_ready' );
