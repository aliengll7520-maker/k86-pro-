<?php
/**
 * K86 Pro Next Core
 *
 * Slot Manager
 *
 * Quản lý Slot trong từng Section.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Slot_Manager' ) ) {

	class K86_Slot_Manager {

		/**
		 * Danh sách Slot.
		 *
		 * @var array
		 */
		protected $slots = array();

		/**
		 * Khởi tạo Slot Manager.
		 *
		 * @return void
		 */
		public function init() {

			$this->slots = array();

		}

		/**
		 * Đăng ký Slot.
		 *
		 * @param string $layout  Layout key.
		 * @param string $section Section key.
		 * @param string $slot    Slot key.
		 * @param array  $config  Cấu hình Slot.
		 * @return void
		 */
		public function register( $layout, $section, $slot, $config = array() ) {

			if ( ! isset( $this->slots[ $layout ] ) ) {
				$this->slots[ $layout ] = array();
			}

			if ( ! isset( $this->slots[ $layout ][ $section ] ) ) {
				$this->slots[ $layout ][ $section ] = array();
			}

			$this->slots[ $layout ][ $section ][ $slot ] = $config;

		}

		/**
		 * Lấy một Slot.
		 *
		 * @param string $layout  Layout key.
		 * @param string $section Section key.
		 * @param string $slot    Slot key.
		 * @return array|null
		 */
		public function get( $layout, $section, $slot ) {

			if ( isset( $this->slots[ $layout ][ $section ][ $slot ] ) ) {
				return $this->slots[ $layout ][ $section ][ $slot ];
			}

			return null;

		}

		/**
		 * Lấy tất cả Slot của Section.
		 *
		 * @param string $layout  Layout key.
		 * @param string $section Section key.
		 * @return array
		 */
		public function get_all( $layout, $section ) {

			if ( isset( $this->slots[ $layout ][ $section ] ) ) {
				return $this->slots[ $layout ][ $section ];
			}

			return array();

		}

	}
}
