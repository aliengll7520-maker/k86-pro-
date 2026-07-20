<?php
/**
 * K86 Pro Next Core
 * Cache Manager
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Cache {

	/**
	 * Cache group
	 */
	const GROUP = 'k86_products';

	/**
	 * Lấy dữ liệu cache
	 *
	 * @param string $key
	 * @return mixed
	 */
	public static function get( $key ) {
		return wp_cache_get( $key, self::GROUP );
	}

	/**
	 * Lưu cache
	 *
	 * @param string $key
	 * @param mixed  $value
	 * @param int    $expiration
	 * @return bool
	 */
	public static function set( $key, $value, $expiration = HOUR_IN_SECONDS ) {
		return wp_cache_set(
			$key,
			$value,
			self::GROUP,
			$expiration
		);
	}

	/**
	 * Xóa một cache
	 *
	 * @param string $key
	 * @return bool
	 */
	public static function delete( $key ) {
		return wp_cache_delete( $key, self::GROUP );
	}

	/**
	 * Xóa toàn bộ cache của plugin
	 *
	 * @return bool
	 */
	public static function flush() {
		return wp_cache_flush();
	}
}
