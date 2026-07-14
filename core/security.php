<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Security Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Security Configuration
|--------------------------------------------------------------------------
*/

/**
 * Capability mặc định của K86 Pro.
 *
 * @return string
 */
function k86_security_capability() {

	return 'manage_options';

}

/**
 * Nonce Action mặc định.
 *
 * @return string
 */
function k86_security_nonce_action() {

	return 'k86_security';

}
/*
|--------------------------------------------------------------------------
| Permission API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra quyền truy cập.
 *
 * @param string $capability
 * @return bool
 */
function k86_current_user_can( $capability = '' ) {

	$capability = $capability ? $capability : k86_security_capability();

	return (bool) apply_filters(
		'k86_current_user_can',
		current_user_can( $capability ),
		$capability
	);

}

/**
 * Kiểm tra người dùng đã đăng nhập.
 *
 * @return bool
 */
function k86_is_user_logged_in() {

	return (bool) apply_filters(
		'k86_is_user_logged_in',
		is_user_logged_in()
	);

}

/**
 * Từ chối truy cập.
 *
 * @return void
 */
function k86_security_deny_access() {

	do_action( 'k86_security_deny_access' );

	wp_die(
		esc_html__( 'You do not have permission to access this resource.', 'k86-pro' )
	);

}
/*
|--------------------------------------------------------------------------
| Nonce API
|--------------------------------------------------------------------------
*/

/**
 * Tạo Security Nonce.
 *
 * @param string $action
 * @return string
 */
function k86_create_nonce( $action = '' ) {

	$action = $action ? $action : k86_security_nonce_action();

	return wp_create_nonce( $action );

}

/**
 * Kiểm tra Security Nonce.
 *
 * @param string $nonce
 * @param string $action
 * @return bool
 */
function k86_verify_nonce( $nonce, $action = '' ) {

	$action = $action ? $action : k86_security_nonce_action();

	return (bool) wp_verify_nonce(
		$nonce,
		$action
	);

}

/**
 * Lấy Nonce Action.
 *
 * @return string
 */
function k86_nonce_action() {

	return k86_security_nonce_action();

}
/*
|--------------------------------------------------------------------------
| Sanitization API
|--------------------------------------------------------------------------
*/

/**
 * Làm sạch chuỗi văn bản.
 *
 * @param string $value
 * @return string
 */
function k86_sanitize_text( $value ) {

	return sanitize_text_field( $value );

}

/**
 * Làm sạch URL.
 *
 * @param string $url
 * @return string
 */
function k86_sanitize_url( $url ) {

	return esc_url_raw( $url );

}

/**
 * Làm sạch Email.
 *
 * @param string $email
 * @return string
 */
function k86_sanitize_email( $email ) {

	return sanitize_email( $email );

}
/*
|--------------------------------------------------------------------------
| Validation API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Email hợp lệ.
 *
 * @param string $email
 * @return bool
 */
function k86_is_valid_email( $email ) {

	return (bool) is_email( $email );

}

/**
 * Kiểm tra URL hợp lệ.
 *
 * @param string $url
 * @return bool
 */
function k86_is_valid_url( $url ) {

	return (bool) filter_var(
		$url,
		FILTER_VALIDATE_URL
	);

}

/**
 * Kiểm tra dữ liệu không rỗng.
 *
 * @param mixed $value
 * @return bool
 */
function k86_is_not_empty( $value ) {

	return ! empty( $value );

}
/*
|--------------------------------------------------------------------------
| Security Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Security Engine sẵn sàng.
 *
 * @return bool
 */
function k86_security_ready() {

	return apply_filters(
		'k86_security_ready',
		true
	);

}

/**
 * Lấy cấu hình Security.
 *
 * @return array
 */
function k86_security_settings() {

	return apply_filters(
		'k86_security_settings',
		array(
			'capability'   => k86_security_capability(),
			'nonce_action' => k86_security_nonce_action(),
		)
	);

}

/**
 * Đồng bộ Security.
 *
 * @return bool
 */
function k86_security_sync() {

	do_action(
		'k86_security_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Security Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Security Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Security Engine đã tải.
 */
do_action( 'k86_security_loaded' );

/**
 * Filter dữ liệu Security.
 *
 * @param array $data
 * @return array
 */
function k86_security_filter_data( $data ) {

	return apply_filters(
		'k86_security_data',
		(array) $data
	);

}

/**
 * Filter kết quả Security.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_security_filter_result( $result ) {

	return apply_filters(
		'k86_security_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Security Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Security Engine.
 *
 * @return void
 */
function k86_init_security() {

	do_action( 'k86_security_init' );

}

/**
 * Framework Security Engine đã sẵn sàng.
 */
do_action( 'k86_security_ready' );
