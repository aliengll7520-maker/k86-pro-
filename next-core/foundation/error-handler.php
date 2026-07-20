<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Error Handler
 *
 * Chịu trách nhiệm xử lý lỗi của toàn bộ Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Error_Handler' ) ) {

	class K86_Error_Handler {

		/**
		 * Khởi tạo Error Handler.
		 *
		 * @return void
		 */
		public function init() {

		}

		/**
		 * Xử lý Exception.
		 *
		 * @param \Throwable $exception
		 * @return void
		 */
		public function handle_exception( $exception ) {

		}

		/**
		 * Xử lý Error.
		 *
		 * @param int    $errno
		 * @param string $errstr
		 * @param string $errfile
		 * @param int    $errline
		 * @return void
		 */
		public function handle_error( $errno, $errstr, $errfile, $errline ) {

		}

		/**
		 * Ghi log lỗi.
		 *
		 * @param mixed $data
		 * @return void
		 */
		protected function write_log( $data ) {

		}

	}

}
