<?php
/**
 * K86 Pro Next Core
 * Base Engine
 *
 * @package K86Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Base_Engine' ) ) {

	abstract class K86_Base_Engine implements K86_Engine_Interface {

		/**
		 * Engine name.
		 *
		 * @var string
		 */
		protected $name = '';

		/**
		 * Engine version.
		 *
		 * @var string
		 */
		protected $version = '1.0.0';

		/**
		 * Engine enabled.
		 *
		 * @var bool
		 */
		protected $enabled = true;

		/**
		 * Constructor.
		 */
		public function __construct() {
		}

		/**
		 * Initialize engine.
		 *
		 * @return void
		 */
		public function init() {
		}

		/**
		 * Boot engine.
		 *
		 * @return void
		 */
		public function boot() {
		}

		/**
		 * Shutdown engine.
		 *
		 * @return void
		 */
		public function shutdown() {
		}

		/**
		 * Get engine name.
		 *
		 * @return string
		 */
		public function get_name() {

			return $this->name;

		}

		/**
		 * Set engine name.
		 *
		 * @param string $name Engine name.
		 *
		 * @return $this
		 */
		public function set_name( $name ) {

			$this->name = (string) $name;

			return $this;

		}

		/**
		 * Get engine version.
		 *
		 * @return string
		 */
		public function get_version() {

			return $this->version;

		}

		/**
		 * Set engine version.
		 *
		 * @param string $version Engine version.
		 *
		 * @return $this
		 */
		public function set_version( $version ) {

			$this->version = (string) $version;

			return $this;

		}

		/**
		 * Check whether engine is enabled.
		 *
		 * @return bool
		 */
		public function is_enabled() {

			return $this->enabled;

		}

		/**
		 * Enable engine.
		 *
		 * @return $this
		 */
		public function enable() {

			$this->enabled = true;

			return $this;

		}

		/**
		 * Disable engine.
		 *
		 * @return $this
		 */
		public function disable() {

			$this->enabled = false;

			return $this;

		}

	}
}
