<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Logger
 *
 * Chịu trách nhiệm ghi log cho toàn bộ Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Logger' ) ) {

	class K86_Logger {

		/**
		 * Khởi tạo Logger.
		 *
		 * @return void
		 */
		public function init() {

		}

		/**
		 * Ghi log.
		 *
		 * @param mixed  $data
		 * @param string $level
		 * @return void
		 */
		public function log( $data, $level = 'info' ) {

		}

		/**
		 * Xóa log.
		 *
		 * @return void
		 */
		public function clear() {

		}

	}

}
