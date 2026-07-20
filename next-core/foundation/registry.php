<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Registry
 *
 * Quản lý đăng ký và truy xuất đối tượng của Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Registry' ) ) {

	class K86_Registry {

		/**
		 * Danh sách đối tượng đã đăng ký.
		 *
		 * @var array
		 */
		protected $items = array();

		/**
		 * Khởi tạo Registry.
		 *
		 * @return void
		 */
		public function init() {

			$this->items = array();

		}

		/**
		 * Đăng ký đối tượng.
		 *
		 * @param string $key
		 * @param mixed  $object
		 * @return void
		 */
		public function set( $key, $object ) {

			$this->items[ $key ] = $object;

		}

		/**
		 * Lấy đối tượng.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->items ) ) {
				return $this->items[ $key ];
			}

			return $default;

		}

	}

}
