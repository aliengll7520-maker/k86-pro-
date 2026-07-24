<?php
/**
 * K86 Pro - Kernel Loader
 *
 * Responsible for bootstrapping the Kernel layer.
 *
 * @package K86Pro
 * @since 1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Kernel_Loader' ) ) {

	class K86_Kernel_Loader {

		/**
		 * Kernel instance.
		 *
		 * @var K86_Kernel
		 */
		protected $kernel;

		/**
		 * Constructor.
		 *
		 * @param K86_Kernel $kernel Kernel instance.
		 */
		public function __construct( K86_Kernel $kernel ) {
			$this->kernel = $kernel;
		}

		/**
		 * Boot the Kernel.
		 *
		 * @return void
		 */
		public function boot() {

			do_action( 'k86_kernel_loader_before_boot', $this );

			$this->kernel->boot();

			do_action( 'k86_kernel_loader_after_boot', $this );
		}

		/**
		 * Shutdown the Kernel.
		 *
		 * @return void
		 */
		public function shutdown() {

			do_action( 'k86_kernel_loader_before_shutdown', $this );

			$this->kernel->shutdown();

			do_action( 'k86_kernel_loader_after_shutdown', $this );
		}

		/**
		 * Get Kernel instance.
		 *
		 * @return K86_Kernel
		 */
		public function get_kernel() {
			return $this->kernel;
		}

		/**
		 * Check whether the Kernel has been booted.
		 *
		 * @return bool
		 */
		public function is_booted() {

			if ( ! $this->kernel ) {
				return false;
			}

			return $this->kernel->isBooted();
		}

		/**
		 * Check whether the Kernel is running.
		 *
		 * @return bool
		 */
		public function is_running() {

			if ( ! $this->kernel ) {
				return false;
			}

			return $this->kernel->isRunning();
		}
	}

}
