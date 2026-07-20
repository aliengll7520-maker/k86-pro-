<?php
/**
 * K86 Pro Next Core
 *
 * Hook Engine
 *
 * Engine quản lý Action, Filter và Hook nội bộ.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Hook_Engine' ) ) {

	class K86_Hook_Engine {

		/**
		 * Danh sách hook handlers.
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
