<?php
/**
 * K86 Pro Next Core
 *
 * Import Export Engine
 *
 * Engine quản lý nhập và xuất dữ liệu.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Import_Export_Engine' ) ) {

	class K86_Import_Export_Engine {

		/**
		 * Danh sách trình xử lý import/export.
		 *
		 * @var array
		 */
		protected $handlers = array();

		/**
		 * Khởi tạo Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->handlers = array();

		}

		/**
		 * Đăng ký handler.
		 *
		 * @param string $key
		 * @param mixed  $handler
		 * @return void
		 */
		public function register( $key, $handler ) {

			$this->handlers[ $key ] = $handler;

		}

		/**
		 * Lấy handler.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->handlers ) ) {
				return $this->handlers[ $key ];
			}

			return $default;

		}

	}

}
