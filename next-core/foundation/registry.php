<?php
/**
 * K86 Pro Next Core
 * Registry
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Registry' ) ) {

	class K86_Registry {

		/**
		 * Registered items.
		 *
		 * @var array
		 */
		protected $items = array();

		/**
		 * Register an item.
		 *
		 * @param string $key   Registry key.
		 * @param mixed  $value Registry value.
		 *
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->items[ $key ] = $value;

			return $this;

		}

		/**
		 * Get an item.
		 *
		 * @param string $key     Registry key.
		 * @param mixed  $default Default value.
		 *
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			return array_key_exists( $key, $this->items )
				? $this->items[ $key ]
				: $default;

		}

		/**
		 * Check whether an item exists.
		 *
		 * @param string $key Registry key.
		 *
		 * @return bool
		 */
		public function has( $key ) {

			return array_key_exists( $key, $this->items );

		}

		/**
		 * Remove an item.
		 *
		 * @param string $key Registry key.
		 *
		 * @return bool
		 */
		public function remove( $key ) {

			if ( ! $this->has( $key ) ) {
				return false;
			}

			unset( $this->items[ $key ] );

			return true;

		}

		/**
		 * Get all registered items.
		 *
		 * @return array
		 */
		public function all() {

			return $this->items;

		}

		/**
		 * Clear the registry.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->items = array();

			return $this;

		}

		/**
		 * Get registered item count.
		 *
		 * @return int
		 */
		public function count() {

			return count( $this->items );

		}

	}

}
