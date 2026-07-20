<?php
/**
 * K86 Pro Next Core
 *
 * Render Manager
 *
 * Điều phối quá trình render giao diện.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Render_Manager' ) ) {

	class K86_Render_Manager {

		/**
		 * Dữ liệu render.
		 *
		 * @var array
		 */
		protected $data = array();

		/**
		 * Khởi tạo.
		 *
		 * @return void
		 */
		public function init() {

			$this->data = array();

		}

		/**
		 * Thiết lập dữ liệu.
		 *
		 * @param array $data Dữ liệu render.
		 * @return void
		 */
		public function set_data( $data ) {

			$this->data = $data;

		}

		/**
		 * Lấy dữ liệu.
		 *
		 * @return array
		 */
		public function get_data() {

			return $this->data;

		}

		/**
		 * Render giao diện.
		 *
		 * @return string
		 */
		public function render() {

			return '';

		}

	}
}
