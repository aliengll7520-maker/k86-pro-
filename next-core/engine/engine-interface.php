<?php
/**
 * K86 Pro Next Core
 * Engine Interface
 *
 * @package K86Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! interface_exists( 'K86_Engine_Interface' ) ) {

	interface K86_Engine_Interface {

		/**
		 * Initialize the engine.
		 *
		 * @return void
		 */
		public function init();

		/**
		 * Boot the engine.
		 *
		 * @return void
		 */
		public function boot();

		/**
		 * Shutdown the engine.
		 *
		 * @return void
		 */
		public function shutdown();

		/**
		 * Get the engine name.
		 *
		 * @return string
		 */
		public function get_name();

		/**
		 * Get the engine version.
		 *
		 * @return string
		 */
		public function get_version();

		/**
		 * Determine whether the engine is enabled.
		 *
		 * @return bool
		 */
		public function is_enabled();

	}

}
