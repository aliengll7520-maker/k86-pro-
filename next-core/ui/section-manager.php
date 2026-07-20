<?php
/**
 * K86 Pro Next Core
 *
 * Section Manager
 *
 * Quản lý các Section trong từng Layout.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Section_Manager' ) ) {

	class K86_Section_Manager {

		/**
		 * Danh sách Section.
		 *
		 * @var array
		 */
		protected $sections = array();

		/**
		 * Khởi tạo Section Manager.
		 *
		 * @return void
		 */
		public function init() {

			$this->sections = array();

		}

		/**
		 * Đăng ký Section.
		 *
		 * @param string $layout Layout key.
		 * @param string $section Section key.
		 * @param array  $config Cấu hình Section.
		 * @return void
		 */
		public function register( $layout, $section, $config = array() ) {

			if ( ! isset( $this->sections[ $layout ] ) ) {
				$this->sections[ $layout ] = array();
			}

			$this->sections[ $layout ][ $section ] = $config;

		}

		/**
		 * Lấy một Section.
		 *
		 * @param string $layout Layout key.
		 * @param string $section Section key.
		 * @return array|null
		 */
		public function get( $layout, $section ) {

			if ( isset( $this->sections[ $layout ][ $section ] ) ) {
				return $this->sections[ $layout ][ $section ];
			}

			return null;

		}

		/**
		 * Lấy toàn bộ Section của Layout.
		 *
		 * @param string $layout Layout key.
		 * @return array
		 */
		public function get_all( $layout ) {

			if ( isset( $this->sections[ $layout ] ) ) {
				return $this->sections[ $layout ];
			}

			return array();

		}

	}
}
