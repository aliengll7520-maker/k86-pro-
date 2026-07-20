<?php
/**
 * K86 Pro Next Core
 *
 * Shopping Assistant Engine
 *
 * Engine hỗ trợ tư vấn mua sắm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Shopping_Assistant_Engine' ) ) {

	class K86_Shopping_Assistant_Engine {

		/**
		 * Danh sách trợ lý.
		 *
		 * @var array
		 */
		protected $assistants = array();

		/**
		 * Khởi tạo Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->assistants = array();

		}

		/**
		 * Đăng ký trợ lý.
		 *
		 * @param string $key
		 * @param mixed  $assistant
		 * @return void
		 */
		public function register( $key, $assistant ) {

			$this->assistants[ $key ] = $assistant;

		}

		/**
		 * Lấy trợ lý.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->assistants ) ) {
				return $this->assistants[ $key ];
			}

			return $default;

		}

	}

}
