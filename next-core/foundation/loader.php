<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Loader
 *
 * Quản lý việc nạp và khởi tạo các thành phần của Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Loader' ) ) {

	class K86_Loader {

		/**
		 * Danh sách thành phần cần nạp.
		 *
		 * @var array
		 */
		protected $components = array();

		/**
		 * Khởi tạo Loader.
		 *
		 * @return void
		 */
		public function init() {

			$this->components = array();

		}

		/**
		 * Đăng ký thành phần.
		 *
		 * @param string $key
		 * @param mixed  $component
		 * @return void
		 */
		public function register( $key, $component ) {

			$this->components[ $key ] = $component;

		}

		/**
		 * Nạp tất cả thành phần đã đăng ký.
		 *
		 * @return void
		 */
		public function load() {

			foreach ( $this->components as $component ) {

				if ( is_object( $component ) && method_exists( $component, 'init' ) ) {
					$component->init();
				}

			}

		}

	}

}
