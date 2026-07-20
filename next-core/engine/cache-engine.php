<?php
/**
 * K86 Pro Next Core
 *
 * Cache Engine
 *
 * Engine quản lý bộ nhớ đệm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Cache_Engine' ) ) {

	class K86_Cache_Engine {

		/**
		 * Danh sách bộ nhớ đệm.
		 *
		 * @var array
		 */
		protected $cache = array();

		/**
		 * Khởi tạo Cache Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->cache = array();

		}

		/**
		 * Đăng ký dữ liệu cache.
		 *
		 * @param string $key
		 * @param mixed  $value
		 * @return void
		 */
		public function register( $key, $value ) {

			$this->cache[ $key ] = $value;

		}

		/**
		 * Lấy dữ liệu cache.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->cache ) ) {
				return $this->cache[ $key ];
			}

			return $default;

		}

	}

}
