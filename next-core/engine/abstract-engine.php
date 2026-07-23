<?php
/**
 * K86 Pro Next Core
 * Abstract Engine
 *
 * @package K86Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Abstract_Engine' ) ) {

	abstract class K86_Abstract_Engine extends K86_Base_Engine {

		/**
		 * Engine priority.
		 *
		 * @var int
		 */
		protected $priority = 10;

		/**
		 * Engine dependencies.
		 *
		 * @var array
		 */
		protected $dependencies = array();

		/**
		 * Constructor.
		 */
		public function __construct() {
			parent::__construct();
		}

		/**
		 * Get engine priority.
		 *
		 * @return int
		 */
		public function get_priority() {

			return $this->priority;

		}

		/**
		 * Set engine priority.
		 *
		 * @param int $priority Engine priority.
		 *
		 * @return $this
		 */
		public function set_priority( $priority ) {

			$this->priority = (int) $priority;

			return $this;

		}

		/**
		 * Get engine dependencies.
		 *
		 * @return array
		 */
		public function get_dependencies() {

			return $this->dependencies;

		}

		/**
		 * Set engine dependencies.
		 *
		 * @param array $dependencies Dependencies.
		 *
		 * @return $this
		 */
		public function set_dependencies( array $dependencies ) {

			$this->dependencies = $dependencies;

			return $this;

		}

		/**
		 * Check whether dependencies are satisfied.
		 *
		 * @return bool
		 */
		public function dependencies_satisfied() {

			return true;

		}

		/**
		 * Initialize engine.
		 *
		 * Child classes may override.
		 *
		 * @return void
		 */
		public function init() {
		}

		/**
		 * Boot engine.
		 *
		 * Child classes may override.
		 *
		 * @return void
		 */
		public function boot() {
		}

		/**
		 * Shutdown engine.
		 *
		 * Child classes may override.
		 *
		 * @return void
		 */
		public function shutdown() {
		}

	}

}
