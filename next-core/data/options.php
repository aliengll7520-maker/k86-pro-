<?php
/**
 * K86 Pro Next Core
 * Data Options
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Data_Options {

	/**
	 * Option key
	 */
	const OPTION_KEY = 'k86_next_core_options';

	/**
	 * Thiết lập mặc định
	 *
	 * @return array
	 */
	public static function defaults() {

		return array(

			'version' => '0.2.0',

			'database_version' => '1',

			'cache_enabled' => true,

			'cache_expiration' => HOUR_IN_SECONDS,

			'product_table' => 'k86_products',

			'meta_prefix' => '_k86_',

		);
	}

	/**
	 * Lấy toàn bộ cấu hình
	 *
	 * @return array
	 */
	public static function get_all() {

		return wp_parse_args(

			get_option( self::OPTION_KEY, array() ),

			self::defaults()

		);

	}

	/**
	 * Lấy một cấu hình
	 *
	 * @param string $key
	 * @param mixed  $default
	 * @return mixed
	 */
	public static function get( $key, $default = null ) {

		$options = self::get_all();

		return isset( $options[ $key ] )
			? $options[ $key ]
			: $default;

	}

	/**
	 * Cập nhật một cấu hình
	 *
	 * @param string $key
	 * @param mixed  $value
	 * @return bool
	 */
	public static function set( $key, $value ) {

		$options = self::get_all();

		$options[ $key ] = $value;

		return update_option(

			self::OPTION_KEY,

			$options

		);

	}

	/**
	 * Khôi phục mặc định
	 *
	 * @return bool
	 */
	public static function reset() {

		return update_option(

			self::OPTION_KEY,

			self::defaults()

		);

	}

}
