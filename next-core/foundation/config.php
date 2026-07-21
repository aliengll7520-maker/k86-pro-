<?php
/**
 * K86 Pro Next Core
 * Foundation Config
 *
 * Manage framework configuration.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Config' ) ) {

	class K86_Config {

		/**
		 * Configuration data.
		 *
		 * @var array
		 */
		protected $config = array();

		/**
		 * Initialize configuration.
		 *
		 * @return void
		 */
		public function init() {

			$this->config = array();

		}

		/**
		 * Set a configuration value.
		 *
		 * @param string $key   Configuration key.
		 * @param mixed  $value Configuration value.
		 *
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->config[ $key ] = $value;

			return $this;

		}

		/**
		 * Get a configuration value.
		 *
		 * @param string $key     Configuration key.
		 * @param mixed  $default Default value.
		 *
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			return array_key_exists( $key, $this->config )
				? $this->config[ $key ]
				: $default;

		}

		/**
		 * Check whether a configuration exists.
		 *
		 * @param string $key Configuration key.
		 *
		 * @return bool
		 */
		public function has( $key ) {

			return array_key_exists( $key, $this->config );

		}

		/**
		 * Remove a configuration value.
		 *
		 * @param string $key Configuration key.
		 *
		 * @return bool
		 */
		public function remove( $key ) {

			if ( ! $this->has( $key ) ) {
				return false;
			}

			unset( $this->config[ $key ] );

			return true;

		}

		/**
		 * Get all configuration values.
		 *
		 * @return array
		 */
		public function all() {

			return $this->config;

		}

		/**
		 * Clear all configuration.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->config = array();

			return $this;

		}

	}

}
