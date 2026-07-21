<?php
/**
 * K86 Pro Next Core
 * Foundation Error Handler
 *
 * Handle framework errors and exceptions.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Error_Handler' ) ) {

	class K86_Error_Handler {

		/**
		 * Initialize error handling.
		 *
		 * @return $this
		 */
		public function init() {

			set_error_handler( array( $this, 'handle_error' ) );
			set_exception_handler( array( $this, 'handle_exception' ) );
			register_shutdown_function( array( $this, 'handle_shutdown' ) );

			return $this;

		}

		/**
		 * Handle uncaught exceptions.
		 *
		 * @param \Throwable $exception Exception instance.
		 *
		 * @return void
		 */
		public function handle_exception( $exception ) {

			$this->write_log( $exception );

		}

		/**
		 * Handle PHP errors.
		 *
		 * @param int    $errno   Error level.
		 * @param string $errstr  Error message.
		 * @param string $errfile Error file.
		 * @param int    $errline Error line.
		 *
		 * @return bool
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

			// Allow PHP to continue with its normal error handling.
			return false;

		}

		/**
		 * Handle fatal shutdown errors.
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
		 * Write error information.
		 *
		 * Reserved for Logger integration.
		 *
		 * @param mixed $data Error data.
		 *
		 * @return void
		 */
		protected function write_log( $data ) {

			// Logger integration will be implemented later.

		}

	}

}
