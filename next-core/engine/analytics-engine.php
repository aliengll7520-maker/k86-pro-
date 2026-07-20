<?php
/**
 * K86 Pro Next Core
 *
 * Analytics Engine
 *
 * Engine quản lý phân tích dữ liệu.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Analytics_Engine' ) ) {

	class K86_Analytics_Engine {

		/**
		 * Danh sách bộ phân tích.
		 *
		 * @var array
		 */
		protected $analyzers = array();

		/**
		 * Khởi tạo Analytics Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->analyzers = array();

		}

		/**
		 * Đăng ký bộ phân tích.
		 *
		 * @param string $key
		 * @param mixed  $analyzer
		 * @return void
		 */
		public function register( $key, $analyzer ) {

			$this->analyzers[ $key ] = $analyzer;

		}

		/**
		 * Lấy bộ phân tích.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->analyzers ) ) {
				return $this->analyzers[ $key ];
			}

			return $default;

		}

	}

}
