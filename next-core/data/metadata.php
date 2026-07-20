<?php
/**
 * K86 Pro Next Core
 * Metadata Manager
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Metadata {

	/**
	 * Tiền tố meta
	 */
	const PREFIX = '_k86_';

	/**
	 * Danh sách meta key chuẩn
	 *
	 * @return array
	 */
	public static function keys() {

		return array(

			'price'         => self::PREFIX . 'price',
			'sale_price'    => self::PREFIX . 'sale_price',

			'gallery'       => self::PREFIX . 'gallery',
			'video'         => self::PREFIX . 'video',

			'rating'        => self::PREFIX . 'rating',
			'review_count'  => self::PREFIX . 'review_count',

			'stock'         => self::PREFIX . 'stock',

			'voucher'       => self::PREFIX . 'voucher',

			'shipping'      => self::PREFIX . 'shipping',

			'warranty'      => self::PREFIX . 'warranty',

			'return_policy' => self::PREFIX . 'return_policy',

			'cta'           => self::PREFIX . 'cta',

		);

	}

	/**
	 * Lấy meta key theo tên
	 *
	 * @param string $name
	 * @return string|null
	 */
	public static function key( $name ) {

		$keys = self::keys();

		return isset( $keys[ $name ] ) ? $keys[ $name ] : null;

	}

	/**
	 * Đọc dữ liệu meta
	 *
	 * @param int $post_id
	 * @param string $name
	 * @param mixed $default
	 * @return mixed
	 */
	public static function get( $post_id, $name, $default = '' ) {

		$key = self::key( $name );

		if ( ! $key ) {
			return $default;
		}

		$value = get_post_meta( $post_id, $key, true );

		return $value === '' ? $default : $value;
	}

	/**
	 * Lưu dữ liệu meta
	 *
	 * @param int $post_id
	 * @param string $name
	 * @param mixed $value
	 * @return bool
	 */
	public static function update( $post_id, $name, $value ) {

		$key = self::key( $name );

		if ( ! $key ) {
			return false;
		}

		return (bool) update_post_meta( $post_id, $key, $value );
	}

	/**
	 * Xóa dữ liệu meta
	 *
	 * @param int $post_id
	 * @param string $name
	 * @return bool
	 */
	public static function delete( $post_id, $name ) {

		$key = self::key( $name );

		if ( ! $key ) {
			return false;
		}

		return (bool) delete_post_meta( $post_id, $key );
	}

}
