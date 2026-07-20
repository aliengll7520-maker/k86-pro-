<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Container
 *
 * Quản lý các service của Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Container' ) ) {

	class K86_Container {

		/**
		 * Danh sách service.
		 *
		 * @var array
		 */
		protected $services = array();

		/**
		 * Khởi tạo Container.
		 *
		 * @return void
		 */
		public function init() {

			$this->services = array();

		}

		/**
		 * Đăng ký service.
		 *
		 * @param string $key
		 * @param mixed  $service
		 * @return void
		 */
		public function set( $key, $service ) {

			$this->services[ $key ] = $service;

		}

		/**
		 * Lấy service.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->services ) ) {
				return $this->services[ $key ];
			}

			return $default;

		}

	}
}
