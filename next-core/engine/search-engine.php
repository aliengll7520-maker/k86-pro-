<?php
/**
 * K86 Pro Next Core
 *
 * Search Engine
 *
 * Engine quản lý chức năng tìm kiếm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Search_Engine' ) ) {

	class K86_Search_Engine {

		/**
		 * Danh sách bộ tìm kiếm.
		 *
		 * @var array
		 */
		protected $searchers = array();

		/**
		 * Khởi tạo Search Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->searchers = array();

		}

		/**
		 * Đăng ký bộ tìm kiếm.
		 *
		 * @param string $key
		 * @param mixed  $searcher
		 * @return void
		 */
		public function register( $key, $searcher ) {

			$this->searchers[ $key ] = $searcher;

		}

		/**
		 * Lấy bộ tìm kiếm.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->searchers ) ) {
				return $this->searchers[ $key ];
			}

			return $default;

		}

	}

}
