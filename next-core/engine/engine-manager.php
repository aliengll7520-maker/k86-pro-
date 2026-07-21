<?php
/**
 * K86 Pro Next Core
 * Engine Manager
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Engine_Manager' ) ) {

	class K86_Engine_Manager {

		/**
		 * Registered engines.
		 *
		 * @var array
		 */
		protected $engines = array();

		/**
		 * Register an engine.
		 *
		 * @param string $name   Engine name.
		 * @param object $engine Engine instance.
		 *
		 * @return $this
		 */
		public function register( $name, $engine ) {

			$this->engines[ $name ] = $engine;

			return $this;

		}

		/**
		 * Get an engine.
		 *
		 * @param string $name Engine name.
		 *
		 * @return object|null
		 */
		public function get( $name ) {

			return $this->engines[ $name ] ?? null;

		}

		/**
		 * Check whether an engine exists.
		 *
		 * @param string $name Engine name.
		 *
		 * @return bool
		 */
		public function has( $name ) {

			return isset( $this->engines[ $name ] );

		}

		/**
		 * Get all registered engines.
		 *
		 * @return array
		 */
		public function all() {

			return $this->engines;

		}

		/**
		 * Remove an engine.
		 *
		 * @param string $name Engine name.
		 *
		 * @return bool
		 */
		public function remove( $name ) {

			if ( ! $this->has( $name ) ) {
				return false;
			}

			unset( $this->engines[ $name ] );

			return true;

		}

		/**
		 * Clear all engines.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->engines = array();

			return $this;

		}

		/**
		 * Count registered engines.
		 *
		 * @return int
		 */
		public function count() {

			return count( $this->engines );

		}

		/**
		 * Check whether manager is empty.
		 *
		 * @return bool
		 */
		public function is_empty() {

			return empty( $this->engines );

		}

		/**
		 * Initialize all engines that implement init().
		 *
		 * @return void
		 */
		public function init() {

			foreach ( $this->engines as $engine ) {

				if ( method_exists( $engine, 'init' ) ) {
					$engine->init();
				}

			}

		}

	}

}
