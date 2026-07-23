<?php
/**
 * K86 Pro Next Core
 * Registry
 *
 * @package K86Pro
 * @since   1.6.0
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
		 * Replace all registry items.
		 *
		 * @param array $items Registry items.
		 *
		 * @return $this
		 */
		public function replace( array $items ) {

			$this->items = $items;

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
		 * Get an item or throw an exception.
		 *
		 * @param string $key Registry key.
		 *
		 * @throws InvalidArgumentException When key does not exist.
		 *
		 * @return mixed
		 */
		public function getOrFail( $key ) {

			if ( ! $this->has( $key ) ) {
				throw new InvalidArgumentException(
					sprintf(
						'Registry key "%s" does not exist.',
						$key
					)
				);
			}

			return $this->items[ $key ];

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
		 * Get all registry keys.
		 *
		 * @return array
		 */
		public function keys() {

			return array_keys( $this->items );

		}

		/**
		 * Get all registry values.
		 *
		 * @return array
		 */
		public function values() {

			return array_values( $this->items );

		}

		/**
		 * Check whether registry is empty.
		 *
		 * @return bool
		 */
		public function isEmpty() {

			return empty( $this->items );

		}

		/**
		 * Export registry.
		 *
		 * @return array
		 */
		public function export() {

			return $this->items;

		}

		/**
		 * Import registry.
		 *
		 * @param array $items Registry items.
		 * @param bool  $merge Merge with existing items.
		 *
		 * @return $this
		 */
		public function import( array $items, $merge = true ) {

			$this->items = $merge
				? array_merge( $this->items, $items )
				: $items;

			return $this;

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
