<?php
/**
 * K86 Pro Next Core
 *
 * License Engine
 *
 * Engine quản lý giấy phép và kích hoạt.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_License_Engine' ) ) {

	class K86_License_Engine {

		/**
		 * Danh sách license.
		 *
		 * @var array
		 */
		protected $licenses = array();

		/**
		 * Khởi tạo Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->licenses = array();

		}

		/**
		 * Đăng ký license.
		 *
		 * @param string $key
		 * @param mixed  $license
		 * @return void
		 */
		public function register( $key, $license ) {

			$this->licenses[ $key ] = $license;

		}

		/**
		 * Lấy license.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->licenses ) ) {
				return $this->licenses[ $key ];
			}

			return $default;

		}

	}

}
