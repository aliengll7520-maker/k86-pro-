<?php
/**
 * K86 Pro Next Core
 *
 * Update Engine
 *
 * Engine quản lý cập nhật hệ thống.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Update_Engine' ) ) {

	class K86_Update_Engine {

		/**
		 * Danh sách updater.
		 *
		 * @var array
		 */
		protected $updaters = array();

		/**
		 * Khởi tạo Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->updaters = array();

		}

		/**
		 * Đăng ký updater.
		 *
		 * @param string $key
		 * @param mixed  $updater
		 * @return void
		 */
		public function register( $key, $updater ) {

			$this->updaters[ $key ] = $updater;

		}

		/**
		 * Lấy updater.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->updaters ) ) {
				return $this->updaters[ $key ];
			}

			return $default;

		}

	}

}
