<?php
/**
 * K86 Pro Next Core
 *
 * Knowledge Engine
 *
 * Engine quản lý kho tri thức.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Knowledge_Engine' ) ) {

	class K86_Knowledge_Engine {

		/**
		 * Kho tri thức.
		 *
		 * @var array
		 */
		protected $knowledge = array();

		/**
		 * Khởi tạo Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->knowledge = array();

		}

		/**
		 * Đăng ký dữ liệu tri thức.
		 *
		 * @param string $key
		 * @param mixed  $value
		 * @return void
		 */
		public function register( $key, $value ) {

			$this->knowledge[ $key ] = $value;

		}

		/**
		 * Lấy dữ liệu tri thức.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->knowledge ) ) {
				return $this->knowledge[ $key ];
			}

			return $default;

		}

	}

}
