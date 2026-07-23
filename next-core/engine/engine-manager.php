<?php
/**
 * K86 Pro Next Core
 * Engine Manager
 *
 * @package K86Pro
 * @since   1.6.0
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

			do_action( 'k86_engine_registered', $name, $engine );

			return $this;

		}

		/**
		 * Replace an existing engine.
		 *
		 * @param string $name   Engine name.
		 * @param object $engine Engine instance.
		 *
		 * @return $this
		 */
		public function replace( $name, $engine ) {

			$this->engines[ $name ] = $engine;

			do_action( 'k86_engine_replaced', $name, $engine );

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
		 * Get an engine or throw an exception.
		 *
		 * @param string $name Engine name.
		 *
		 * @throws InvalidArgumentException
		 *
		 * @return object
		 */
		public function getOrFail( $name ) {

			if ( ! $this->has( $name ) ) {
				throw new InvalidArgumentException(
					sprintf(
						'Engine "%s" does not exist.',
						$name
					)
				);
			}

			return $this->engines[ $name ];

		}

		/**
		 * Check whether an engine exists.
		 *
		 * @param string $name Engine name.
		 *
		 * @return bool
		 */
		public function has( $name ) {

			return array_key_exists( $name, $this->engines );

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
		 * Get all engine names.
		 *
		 * @return array
		 */
		public function keys() {

			return array_keys( $this->engines );

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

			$engine = $this->engines[ $name ];

			unset( $this->engines[ $name ] );

			do_action( 'k86_engine_removed', $name, $engine );

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
		 * Initialize all engines.
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

		/**
		 * Boot all engines.
		 *
		 * @return void
		 */
		public function boot() {

			foreach ( $this->engines as $engine ) {

				if ( method_exists( $engine, 'boot' ) ) {
					$engine->boot();
				}

			}

		}

		/**
		 * Shutdown all engines.
		 *
		 * @return void
		 */
		public function shutdown() {

			foreach ( $this->engines as $engine ) {

				if ( method_exists( $engine, 'shutdown' ) ) {
					$engine->shutdown();
				}

			}

		}

	}

}
