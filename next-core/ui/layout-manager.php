<?php
/**
 * K86 Pro Next Core
 *
 * Layout Manager
 *
 * Quản lý các layout của UI System.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Layout_Manager' ) ) {

	class K86_Layout_Manager {

		/**
		 * Danh sách layout.
		 *
		 * @var array
		 */
		protected $layouts = array();

		/**
		 * Layout mặc định.
		 *
		 * @var string
		 */
		protected $default_layout = '';

		/**
		 * Khởi tạo Layout Manager.
		 *
		 * @return void
		 */
		public function init() {

			$this->layouts        = array();
			$this->default_layout = '';

		}

		/**
		 * Đăng ký layout.
		 *
		 * @param string $key
		 * @param array  $layout
		 * @return void
		 */
		public function register( $key, $layout ) {

			$this->layouts[ $key ] = $layout;

		}

		/**
		 * Lấy layout.
		 *
		 * @param string $key
		 * @return array|null
		 */
		public function get( $key ) {

			if ( array_key_exists( $key, $this->layouts ) ) {
				return $this->layouts[ $key ];
			}

			return null;

		}

		/**
		 * Thiết lập layout mặc định.
		 *
		 * @param string $key
		 * @return void
		 */
		public function set_default( $key ) {

			if ( array_key_exists( $key, $this->layouts ) ) {
				$this->default_layout = $key;
			}

		}

		/**
		 * Lấy layout mặc định.
		 *
		 * @return string
		 */
		public function get_default() {

			return $this->default_layout;

		}

	}

}
