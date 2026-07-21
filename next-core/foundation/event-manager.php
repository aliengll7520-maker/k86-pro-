<?php
/**
 * K86 Pro Next Core
 * Foundation Event Manager
 *
 * Manage internal framework events.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Event_Manager' ) ) {

	class K86_Event_Manager {

		/**
		 * Registered events.
		 *
		 * @var array
		 */
		protected $events = array();

		/**
		 * Initialize event manager.
		 *
		 * @return void
		 */
		public function init() {

			$this->events = array();

		}

		/**
		 * Register an event listener.
		 *
		 * @param string   $event    Event name.
		 * @param callable $callback Event callback.
		 *
		 * @return $this
		 */
		public function add_listener( $event, $callback ) {

			if ( ! isset( $this->events[ $event ] ) ) {
				$this->events[ $event ] = array();
			}

			$this->events[ $event ][] = $callback;

			return $this;

		}

		/**
		 * Dispatch an event.
		 *
		 * @param string $event     Event name.
		 * @param array  $arguments Event arguments.
		 *
		 * @return void
		 */
		public function dispatch( $event, array $arguments = array() ) {

			if ( empty( $this->events[ $event ] ) ) {
				return;
			}

			foreach ( $this->events[ $event ] as $callback ) {

				if ( is_callable( $callback ) ) {
					call_user_func_array( $callback, $arguments );
				}

			}

		}

		/**
		 * Check whether an event has listeners.
		 *
		 * @param string $event Event name.
		 *
		 * @return bool
		 */
		public function has( $event ) {

			return ! empty( $this->events[ $event ] );

		}

		/**
		 * Remove an event.
		 *
		 * @param string $event Event name.
		 *
		 * @return bool
		 */
		public function remove( $event ) {

			if ( ! $this->has( $event ) ) {
				return false;
			}

			unset( $this->events[ $event ] );

			return true;

		}

		/**
		 * Get all registered events.
		 *
		 * @return array
		 */
		public function all() {

			return $this->events;

		}

		/**
		 * Clear all events.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->events = array();

			return $this;

		}

	}

}
