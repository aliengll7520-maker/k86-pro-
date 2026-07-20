<?php
/**
 * K86 Pro Next Core
 *
 * AI Engine
 *
 * Engine quản lý các dịch vụ AI.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_AI_Engine' ) ) {

	class K86_AI_Engine {

		/**
		 * Danh sách dịch vụ AI.
		 *
		 * @var array
		 */
		protected $services = array();

		/**
		 * Khởi tạo AI Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->services = array();

		}

		/**
		 * Đăng ký dịch vụ AI.
		 *
		 * @param string $key
		 * @param mixed  $service
		 * @return void
		 */
		public function register( $key, $service ) {

			$this->services[ $key ] = $service;

		}

		/**
		 * Lấy dịch vụ AI.
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
