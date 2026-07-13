<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * AJAX Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| AJAX Configuration
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra AJAX Request.
 *
 * @return bool
 */
function k86_is_ajax_request() {

	return wp_doing_ajax();

}

/**
 * Lấy Nonce của AJAX.
 *
 * @return string
 */
function k86_ajax_nonce_action() {

	return 'k86_ajax_nonce';

}
/*
|--------------------------------------------------------------------------
| AJAX Security API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Nonce của AJAX.
 *
 * @return void
 */
function k86_verify_ajax_nonce() {

	check_ajax_referer(
		k86_ajax_nonce_action(),
		'nonce'
	);

}

/**
 * Trả về lỗi quyền truy cập.
 *
 * @return void
 */
function k86_ajax_forbidden() {

	wp_send_json_error(
		array(
			'message' => __( 'Access denied.', 'k86-pro' ),
		),
		403
	);

}

/**
 * Kiểm tra quyền truy cập AJAX.
 *
 * @return bool
 */
function k86_ajax_can_access() {

	return apply_filters(
		'k86_ajax_can_access',
		true
	);

}
/*
|--------------------------------------------------------------------------
| AJAX Response API
|--------------------------------------------------------------------------
*/

/**
 * Trả kết quả thành công.
 *
 * @param array $data
 * @return void
 */
function k86_ajax_success( $data = array() ) {

	wp_send_json_success(
		apply_filters(
			'k86_ajax_success_data',
			$data
		)
	);

}

/**
 * Trả kết quả lỗi.
 *
 * @param string $message
 * @param int    $status
 * @return void
 */
function k86_ajax_error( $message = '', $status = 400 ) {

	wp_send_json_error(
		array(
			'message' => $message,
		),
		$status
	);

}

/**
 * Trả dữ liệu AJAX.
 *
 * @param bool  $success
 * @param array $data
 * @return void
 */
function k86_ajax_response( $success, $data = array() ) {

	if ( $success ) {
		k86_ajax_success( $data );
	}

	k86_ajax_error(
		__( 'Unknown error.', 'k86-pro' )
	);

}
/*
|--------------------------------------------------------------------------
| AJAX Router API
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký một AJAX Action.
 *
 * @param string   $action
 * @param callable $callback
 * @param bool     $public
 * @return void
 */
function k86_register_ajax_action( $action, $callback, $public = true ) {

	add_action(
		'wp_ajax_' . $action,
		$callback
	);

	if ( $public ) {

		add_action(
			'wp_ajax_nopriv_' . $action,
			$callback
		);

	}

}

/**
 * Kiểm tra Action AJAX hợp lệ.
 *
 * @param string $action
 * @return bool
 */
function k86_is_valid_ajax_action( $action ) {

	return ! empty( $action );

}
/*
|--------------------------------------------------------------------------
| AJAX Callback API
|--------------------------------------------------------------------------
*/

/**
 * Xử lý Callback AJAX chuẩn.
 *
 * @param callable $callback
 * @return void
 */
function k86_handle_ajax_callback( $callback ) {

	if ( ! k86_ajax_can_access() ) {
		k86_ajax_forbidden();
	}

	k86_verify_ajax_nonce();

	if ( is_callable( $callback ) ) {
		call_user_func( $callback );
	}

	k86_ajax_error(
		__( 'Invalid AJAX callback.', 'k86-pro' )
	);

}

/**
 * Thực thi Callback AJAX.
 *
 * @param callable $callback
 * @return void
 */
function k86_ajax_execute( $callback ) {

	k86_handle_ajax_callback( $callback );

}
/*
|--------------------------------------------------------------------------
| AJAX Helper API
|--------------------------------------------------------------------------
*/

/**
 * Lấy dữ liệu POST.
 *
 * @param string $key
 * @param mixed  $default
 * @return mixed
 */
function k86_ajax_post( $key, $default = '' ) {

	if ( ! isset( $_POST[ $key ] ) ) {
		return $default;
	}

	return sanitize_text_field(
		wp_unslash( $_POST[ $key ] )
	);

}

/**
 * Lấy dữ liệu GET.
 *
 * @param string $key
 * @param mixed  $default
 * @return mixed
 */
function k86_ajax_get( $key, $default = '' ) {

	if ( ! isset( $_GET[ $key ] ) ) {
		return $default;
	}

	return sanitize_text_field(
		wp_unslash( $_GET[ $key ] )
	);

}

/**
 * Lấy ID đối tượng.
 *
 * @return int
 */
function k86_ajax_object_id() {

	return absint(
		k86_ajax_post( 'id', 0 )
	);

}
/*
|--------------------------------------------------------------------------
| AJAX Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào AJAX Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo AJAX Engine đã tải.
 */
do_action( 'k86_ajax_loaded' );

/**
 * Filter dữ liệu AJAX.
 *
 * @param array $data
 * @return array
 */
function k86_ajax_filter_data( $data ) {

	return apply_filters(
		'k86_ajax_data',
		$data
	);

}

/**
 * Filter kết quả AJAX.
 *
 * @param mixed $response
 * @return mixed
 */
function k86_ajax_filter_response( $response ) {

	return apply_filters(
		'k86_ajax_response',
		$response
	);

}
/*
|--------------------------------------------------------------------------
| AJAX Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo AJAX Engine.
 *
 * @return void
 */
function k86_init_ajax() {

	if ( ! k86_is_ajax_request() ) {
		return;
	}

	do_action( 'k86_ajax_init' );

}

/**
 * Framework AJAX Engine đã sẵn sàng.
 */
do_action( 'k86_ajax_ready' );
