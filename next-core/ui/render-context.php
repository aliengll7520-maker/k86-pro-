<?php
/**
 * K86 Pro Next Core
 *
 * * Render Context
 *
 * Stores rendering context shared across the UI framework.
 *
 * @package K86Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Render_Context' ) ) {

	class K86_Render_Context {

		/**
		 * Context data.
		 *
		 * @var array
		 */
		protected $context = array();
		protected $media_manager = null;

		/**
		 * Constructor.
		 *
		 * @param array $context Initial context.
		 */
		public function __construct( array $context = array() ) {

			$this->context = $context;

		}

		/**
		 * Set a context value.
		 *
		 * @param string $key   Context key.
		 * @param mixed  $value Context value.
		 *
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->context[ $key ] = $value;

			return $this;

		}

		/**
		 * Get a context value.
		 *
		 * @param string $key     Context key.
		 * @param mixed  $default Default value.
		 *
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( ! $this->has( $key ) ) {
				return $default;
			}

			return $this->context[ $key ];

		}

		/**
		 * Determine whether a key exists.
		 *
		 * @param string $key Context key.
		 *
		 * @return bool
		 */
		public function has( $key ) {

			return array_key_exists( $key, $this->context );

		}

		/**
		 * Remove a context value.
		 *
		 * @param string $key Context key.
		 *
		 * @return bool
		 */
		public function remove( $key ) {

			if ( ! $this->has( $key ) ) {
				return false;
			}

			unset( $this->context[ $key ] );

			return true;

		}

		/**
		 * Get all context data.
		 *
		 * @return array
		 */
		public function all() {

			return $this->context;

		}

		/**
		 * Clear context.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->context = array();

			return $this;

    }
		/**
		 * Merge context.
		 *
		 * @param array $context Context data.
		 *
		 * @return $this
		 */
		public function merge( array $context ) {

			$this->context = array_merge(
				$this->context,
				$context
			);

			return $this;

		}

		/**
		 * Replace all context.
		 *
		 * @param array $context Context data.
		 *
		 * @return $this
		 */
		public function replace( array $context ) {

			$this->context = $context;

			return $this;

		}

		/**
		 * Get only selected keys.
		 *
		 * @param array $keys Context keys.
		 *
		 * @return array
		 */
		public function only( array $keys ) {

			return array_intersect_key(
				$this->context,
				array_flip( $keys )
			);

		}

		/**
		 * Get context except selected keys.
		 *
		 * @param array $keys Context keys.
		 *
		 * @return array
		 */
		public function except( array $keys ) {

			return array_diff_key(
				$this->context,
				array_flip( $keys )
			);

		}

		/**
		 * Get all context keys.
		 *
		 * @return array
		 */
		public function keys() {

			return array_keys( $this->context );

		}

		/**
		 * Get all context values.
		 *
		 * @return array
		 */
		public function values() {

			return array_values( $this->context );

		}

		/**
		 * Count context items.
		 *
		 * @return int
		 */
		public function count() {

			return count( $this->context );

		}

		/**
		 * Determine whether context is empty.
		 *
		 * @return bool
		 */
		public function is_empty() {

			return empty( $this->context );

		}
				/**
		 * Get nested context value.
		 *
		 * Supports dot notation.
		 *
		 * Example:
		 * product.price.sale
		 *
		 * @param string $key     Context key.
		 * @param mixed  $default Default value.
		 *
		 * @return mixed
		 */
		public function get_nested( $key, $default = null ) {

			$segments = explode( '.', $key );

			$value = $this->context;

			foreach ( $segments as $segment ) {

				if ( ! is_array( $value ) || ! array_key_exists( $segment, $value ) ) {
					return $default;
				}

				$value = $value[ $segment ];

			}

			return $value;

		}

		/**
		 * Convert context to array.
		 *
		 * @return array
		 */
		public function to_array() {

			return $this->context;

		}

		/**
		 * Convert context to JSON.
		 *
		 * @param int $flags JSON flags.
		 *
		 * @return string
		 */
		public function to_json( $flags = 0 ) {

			return wp_json_encode(
				$this->context,
				$flags
			);

		}

	}

}
