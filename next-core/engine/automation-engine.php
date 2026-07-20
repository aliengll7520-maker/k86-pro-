<?php
/**
 * K86 Pro Next Core
 *
 * Automation Engine
 *
 * Engine quản lý tự động hóa.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Automation_Engine' ) ) {

	class K86_Automation_Engine {

		/**
		 * Danh sách tác vụ tự động.
		 *
		 * @var array
		 */
		protected $tasks = array();

		/**
		 * Khởi tạo Automation Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->tasks = array();

		}

		/**
		 * Đăng ký tác vụ.
		 *
		 * @param string $key
		 * @param mixed  $task
		 * @return void
		 */
		public function register( $key, $task ) {

			$this->tasks[ $key ] = $task;

		}

		/**
		 * Lấy tác vụ.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->tasks ) ) {
				return $this->tasks[ $key ];
			}

			return $default;

		}

	}

}
