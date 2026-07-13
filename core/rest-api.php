<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * REST API Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| REST API Configuration
|--------------------------------------------------------------------------
*/

/**
 * Namespace của REST API.
 *
 * @return string
 */
function k86_rest_namespace() {

	return 'k86-pro/v1';

}

/**
 * Lấy URL gốc của REST API.
 *
 * @return string
 */
function k86_rest_url() {

	return rest_url( k86_rest_namespace() );

}
/*
|--------------------------------------------------------------------------
| REST Route API
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký một REST Route.
 *
 * @param string $route
 * @param array  $args
 * @return void
 */
function k86_register_rest_route( $route, $args ) {

	register_rest_route(
		k86_rest_namespace(),
		$route,
		$args
	);

}

/**
 * Khởi tạo các REST Route.
 *
 * @return void
 */
function k86_register_rest_routes() {

	do_action( 'k86_register_rest_routes' );

}

add_action(
	'rest_api_init',
	'k86_register_rest_routes'
);
/*
|--------------------------------------------------------------------------
| REST Permission API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra quyền truy cập REST API.
 *
 * @param WP_REST_Request $request
 * @return bool
 */
function k86_rest_permission( $request ) {

	return apply_filters(
		'k86_rest_permission',
		current_user_can( 'read' ),
		$request
	);

}

/**
 * Cho phép truy cập công khai.
 *
 * @return bool
 */
function k86_rest_public_permission() {

	return true;

}

/**
 * Chỉ cho quản trị viên truy cập.
 *
 * @return bool
 */
function k86_rest_admin_permission() {

	return current_user_can( 'manage_options' );

}
/*
|--------------------------------------------------------------------------
| REST Response API
|--------------------------------------------------------------------------
*/

/**
 * Trả kết quả thành công.
 *
 * @param mixed $data
 * @param int   $status
 * @return WP_REST_Response
 */
function k86_rest_success( $data = array(), $status = 200 ) {

	return rest_ensure_response(
		array(
			'success' => true,
			'data'    => apply_filters(
				'k86_rest_success_data',
				$data
			),
			'status'  => $status,
		)
	);

}

/**
 * Trả kết quả lỗi.
 *
 * @param string $message
 * @param int    $status
 * @return WP_REST_Response
 */
function k86_rest_error( $message = '', $status = 400 ) {

	return new WP_REST_Response(
		array(
			'success' => false,
			'message' => $message,
		),
		$status
	);

}
/*
|--------------------------------------------------------------------------
| REST Endpoint Helper API
|--------------------------------------------------------------------------
*/

/**
 * Lấy tham số từ REST Request.
 *
 * @param WP_REST_Request $request
 * @param string          $key
 * @param mixed           $default
 * @return mixed
 */
function k86_rest_param( $request, $key, $default = '' ) {

	$value = $request->get_param( $key );

	if ( null === $value ) {
		return $default;
	}

	if ( is_string( $value ) ) {
		return sanitize_text_field( wp_unslash( $value ) );
	}

	return $value;

}

/**
 * Lấy ID đối tượng.
 *
 * @param WP_REST_Request $request
 * @return int
 */
function k86_rest_object_id( $request ) {

	return absint(
		k86_rest_param( $request, 'id', 0 )
	);

}

/**
 * Kiểm tra Request hợp lệ.
 *
 * @param WP_REST_Request $request
 * @return bool
 */
function k86_rest_request_valid( $request ) {

	return ( $request instanceof WP_REST_Request );

}
/*
|--------------------------------------------------------------------------
| REST Endpoint Callback API
|--------------------------------------------------------------------------
*/

/**
 * Thực thi Endpoint Callback.
 *
 * @param callable        $callback
 * @param WP_REST_Request $request
 * @return WP_REST_Response
 */
function k86_rest_execute( $callback, $request ) {

	if ( ! k86_rest_request_valid( $request ) ) {
		return k86_rest_error(
			__( 'Invalid request.', 'k86-pro' ),
			400
		);
	}

	if ( ! is_callable( $callback ) ) {
		return k86_rest_error(
			__( 'Invalid endpoint callback.', 'k86-pro' ),
			500
		);
	}

	return call_user_func(
		$callback,
		$request
	);

}

/**
 * Wrapper thực thi Endpoint.
 *
 * @param callable        $callback
 * @param WP_REST_Request $request
 * @return WP_REST_Response
 */
function k86_rest_dispatch( $callback, $request ) {

	return k86_rest_execute(
		$callback,
		$request
	);

}
/*
|--------------------------------------------------------------------------
| REST Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào REST API Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo REST API Engine đã tải.
 */
do_action( 'k86_rest_loaded' );

/**
 * Filter dữ liệu REST.
 *
 * @param mixed $data
 * @return mixed
 */
function k86_rest_filter_data( $data ) {

	return apply_filters(
		'k86_rest_data',
		$data
	);

}

/**
 * Filter kết quả REST.
 *
 * @param mixed $response
 * @return mixed
 */
function k86_rest_filter_response( $response ) {

	return apply_filters(
		'k86_rest_response',
		$response
	);

}
/*
|--------------------------------------------------------------------------
| REST Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo REST API Engine.
 *
 * @return void
 */
function k86_init_rest_api() {

	do_action( 'k86_rest_init' );

}

/**
 * Framework REST API đã sẵn sàng.
 */
do_action( 'k86_rest_ready' );
