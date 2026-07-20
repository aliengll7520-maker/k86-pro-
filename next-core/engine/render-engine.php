<?php
/**
 * K86 Pro Next Core
 *
 * Render Engine
 *
 * Engine quản lý Render của hệ thống.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Render_Engine' ) ) {

	class K86_Render_Engine {

		/**
		 * Danh sách render handlers.
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
		 * Đăng ký render.
		 *
		 * @param string $key
		 * @param mixed  $handler
		 * @return void
		 */
		public function register( $key, $handler ) {

			$this->handlers[ $key ] = $handler;

		}

		/**
		 * Lấy render.
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
