<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Config
 *
 * Quản lý cấu hình của toàn bộ Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Config' ) ) {

	class K86_Config {

		/**
		 * Dữ liệu cấu hình.
		 *
		 * @var array
		 */
		protected $config = array();

		/**
		 * Khởi tạo Config.
		 *
		 * @return void
		 */
		public function init() {

			$this->config = array();

		}

		/**
		 * Thiết lập cấu hình.
		 *
		 * @param string $key
		 * @param mixed  $value
		 * @return void
		 */
		public function set( $key, $value ) {

			$this->config[ $key ] = $value;

		}

		/**
		 * Lấy cấu hình.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->config ) ) {
				return $this->config[ $key ];
			}

			return $default;

		}

	}

}
