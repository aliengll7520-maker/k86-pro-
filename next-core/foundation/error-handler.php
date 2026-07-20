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

			set_error_handler( array( $this, 'handle_error' ) );
			set_exception_handler( array( $this, 'handle_exception' ) );
			register_shutdown_function( array( $this, 'handle_shutdown' ) );

		}

		/**
		 * Xử lý Exception.
		 *
		 * @param \Throwable $exception
		 * @return void
		 */
		public function handle_exception( $exception ) {

			$this->write_log( $exception );

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

			$this->write_log(
				array(
					'errno'   => $errno,
					'message' => $errstr,
					'file'    => $errfile,
					'line'    => $errline,
				)
			);

		}

		/**
		 * Xử lý Fatal Error khi PHP shutdown.
		 *
		 * @return void
		 */
		public function handle_shutdown() {

			$error = error_get_last();

			if ( ! empty( $error ) ) {
				$this->write_log( $error );
			}

		}

		/**
		 * Ghi log lỗi.
		 *
		 * @param mixed $data
		 * @return void
		 */
		protected function write_log( $data ) {

			// Sẽ kết nối với Logger ở giai đoạn sau.

		}

	}

}
