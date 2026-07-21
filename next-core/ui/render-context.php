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
