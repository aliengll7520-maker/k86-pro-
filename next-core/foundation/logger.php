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

			// Khởi tạo Logger.
			return;

		}

		/**
		 * Ghi log.
		 *
		 * @param mixed  $data
		 * @param string $level
		 * @return void
		 */
		public function log( $data, $level = 'info' ) {

			$record = array(
				'time'  => current_time( 'mysql' ),
				'level' => $level,
				'data'  => $data,
			);

			// Sẽ ghi $record vào hệ thống log ở giai đoạn sau.

		}

		/**
		 * Xóa toàn bộ log.
		 *
		 * @return void
		 */
		public function clear() {

			// Sẽ xóa log ở giai đoạn sau.

			return;

		}

	}

}
