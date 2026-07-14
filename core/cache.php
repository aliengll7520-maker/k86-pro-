<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Cache Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Cache Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy Cache Group mặc định.
 *
 * @return string
 */
function k86_cache_group() {

	return 'k86-pro';

}

/**
 * Thời gian Cache mặc định.
 *
 * @return int
 */
function k86_cache_expiration() {

	return HOUR_IN_SECONDS;

}
/*
|--------------------------------------------------------------------------
| Cache Read API
|--------------------------------------------------------------------------
*/

/**
 * Lấy dữ liệu từ Cache.
 *
 * @param string $key
 * @param string $group
 * @return mixed
 */
function k86_cache_get( $key, $group = '' ) {

	$group = $group ? $group : k86_cache_group();

	return apply_filters(
		'k86_cache_get',
		false,
		sanitize_key( $key ),
		$group
	);

}

/**
 * Kiểm tra Cache tồn tại.
 *
 * @param string $key
 * @param string $group
 * @return bool
 */
function k86_cache_exists( $key, $group = '' ) {

	return false !== k86_cache_get(
		$key,
		$group
	);

}

/**
 * Lấy nhiều Cache cùng lúc.
 *
 * @param array  $keys
 * @param string $group
 * @return array
 */
function k86_cache_get_multiple( $keys, $group = '' ) {

	$data = array();

	foreach ( $keys as $key ) {
		$data[ $key ] = k86_cache_get(
			$key,
			$group
		);
	}

	return $data;

}
/*
|--------------------------------------------------------------------------
| Cache Write API
|--------------------------------------------------------------------------
*/

/**
 * Ghi dữ liệu vào Cache.
 *
 * @param string $key
 * @param mixed  $value
 * @param string $group
 * @param int    $expiration
 * @return bool
 */
function k86_cache_set( $key, $value, $group = '', $expiration = 0 ) {

	$group      = $group ? $group : k86_cache_group();
	$expiration = $expiration ? absint( $expiration ) : k86_cache_expiration();

	do_action(
		'k86_cache_set',
		sanitize_key( $key ),
		$value,
		$group,
		$expiration
	);

	return true;

}

/**
 * Ghi nhiều Cache cùng lúc.
 *
 * @param array  $items
 * @param string $group
 * @param int    $expiration
 * @return bool
 */
function k86_cache_set_multiple( $items, $group = '', $expiration = 0 ) {

	foreach ( $items as $key => $value ) {
		k86_cache_set(
			$key,
			$value,
			$group,
			$expiration
		);
	}

	return true;

}

/**
 * Thay thế Cache.
 *
 * @param string $key
 * @param mixed  $value
 * @param string $group
 * @param int    $expiration
 * @return bool
 */
function k86_cache_replace( $key, $value, $group = '', $expiration = 0 ) {

	return k86_cache_set(
		$key,
		$value,
		$group,
		$expiration
	);

}
/*
|--------------------------------------------------------------------------
| Cache Delete API
|--------------------------------------------------------------------------
*/

/**
 * Xóa một Cache.
 *
 * @param string $key
 * @param string $group
 * @return bool
 */
function k86_cache_delete( $key, $group = '' ) {

	$group = $group ? $group : k86_cache_group();

	do_action(
		'k86_cache_delete',
		sanitize_key( $key ),
		$group
	);

	return true;

}

/**
 * Xóa nhiều Cache cùng lúc.
 *
 * @param array  $keys
 * @param string $group
 * @return bool
 */
function k86_cache_delete_multiple( $keys, $group = '' ) {

	foreach ( $keys as $key ) {
		k86_cache_delete(
			$key,
			$group
		);
	}

	return true;

}

/**
 * Xóa toàn bộ Cache theo Group.
 *
 * @param string $group
 * @return bool
 */
function k86_cache_flush_group( $group = '' ) {

	$group = $group ? $group : k86_cache_group();

	do_action(
		'k86_cache_flush_group',
		$group
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Cache Helper API
|--------------------------------------------------------------------------
*/

/**
 * Xóa toàn bộ Cache.
 *
 * @return bool
 */
function k86_cache_flush() {

	do_action( 'k86_cache_flush' );

	return true;

}

/**
 * Kiểm tra Cache Engine sẵn sàng.
 *
 * @return bool
 */
function k86_cache_ready() {

	return apply_filters(
		'k86_cache_ready',
		true
	);

}

/**
 * Lấy thông tin Cache.
 *
 * @return array
 */
function k86_cache_info() {

	return apply_filters(
		'k86_cache_info',
		array(
			'group'      => k86_cache_group(),
			'expiration' => k86_cache_expiration(),
		)
	);

}
/*
|--------------------------------------------------------------------------
| Cache Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu Cache vào Storage.
 *
 * @param string $key
 * @param mixed  $value
 * @param string $group
 * @return bool
 */
function k86_cache_store( $key, $value, $group = '' ) {

	$group = $group ? $group : k86_cache_group();

	do_action(
		'k86_cache_store',
		sanitize_key( $key ),
		$value,
		$group
	);

	return true;

}

/**
 * Đồng bộ Cache.
 *
 * @return bool
 */
function k86_cache_sync() {

	do_action(
		'k86_cache_sync'
	);

	return true;

}

/**
 * Kiểm tra Cache Storage đã sẵn sàng.
 *
 * @return bool
 */
function k86_cache_storage_ready() {

	return apply_filters(
		'k86_cache_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Cache Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Cache Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Cache Engine đã tải.
 */
do_action( 'k86_cache_loaded' );

/**
 * Filter dữ liệu Cache.
 *
 * @param mixed $data
 * @return mixed
 */
function k86_cache_filter_data( $data ) {

	return apply_filters(
		'k86_cache_data',
		$data
	);

}

/**
 * Filter kết quả Cache.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_cache_filter_result( $result ) {

	return apply_filters(
		'k86_cache_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Cache Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Cache Engine.
 *
 * @return void
 */
function k86_init_cache() {

	do_action( 'k86_cache_init' );

}

/**
 * Framework Cache Engine đã sẵn sàng.
 */
do_action( 'k86_cache_ready' );
