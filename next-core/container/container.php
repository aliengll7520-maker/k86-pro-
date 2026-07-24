<?php
/**
 * K86 Pro
 * Next Core Container
 *
 * Service Container đơn giản cho Next Core.
 *
 * @package K86_Pro
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'K86_Container', false ) ) {
	return;
}

class K86_Container {

	/**
	 * Các service đã đăng ký.
	 *
	 * @var array
	 */
	protected $services = array();

	/**
	 * Đăng ký service.
	 *
	 * @param string $id
	 * @param mixed  $service
	 * @return void
	 */
	public function set( $id, $service ) {

		$this->services[ $id ] = $service;

	}

	/**
	 * Kiểm tra service.
	 *
	 * @param string $id
	 * @return bool
	 */
	public function has( $id ) {

		return isset( $this->services[ $id ] );

	}

	/**
	 * Lấy service.
	 *
	 * @param string $id
	 * @return mixed|null
	 */
	public function get( $id ) {

		if ( ! $this->has( $id ) ) {
			return null;
		}

		return $this->services[ $id ];

  }
  	/**
	 * Xóa service.
	 *
	 * @param string $id
	 * @return void
	 */
	public function remove( $id ) {

		if ( $this->has( $id ) ) {
			unset( $this->services[ $id ] );
		}

	}

	/**
	 * Lấy toàn bộ service.
	 *
	 * @return array
	 */
	public function all() {

		return $this->services;

	}

	/**
	 * Đếm số service.
	 *
	 * @return int
	 */
	public function count() {

		return count( $this->services );

	}

	/**
	 * Xóa toàn bộ service.
	 *
	 * @return void
	 */
	public function clear() {

		$this->services = array();

	}

}
