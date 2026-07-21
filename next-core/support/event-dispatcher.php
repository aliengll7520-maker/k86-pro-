<?php
/**
 * K86 Pro Next Core
 * Event Dispatcher (Compatibility Layer)
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Event_Dispatcher' ) ) {

	class K86_Event_Dispatcher extends K86_Event_Manager {

		/**
		 * Register an event listener.
		 *
		 * Compatibility wrapper.
		 *
		 * @param string   $event    Event name.
		 * @param callable $callback Event callback.
		 *
		 * @return $this
		 */
		public function listen( $event, $callback ) {

			$this->add_listener( $event, $callback );

			return $this;

		}

	}
}
