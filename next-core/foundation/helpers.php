<?php
/**
 * K86 Pro Next Core
 * Foundation Helpers
 *
 * Common helper utilities for the framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Helpers' ) ) {

	class K86_Helpers {

		/**
		 * Initialize helpers.
		 *
		 * @return $this
		 */
		public function init() {

			return $this;

		}

		/**
		 * Check whether a value is empty.
		 *
		 * @param mixed $value Value to check.
		 *
		 * @return bool
		 */
		public function is_empty( $value ) {

			return empty( $value );

		}

		/**
		 * Check whether a value is an array.
		 *
		 * @param mixed $value Value to check.
		 *
		 * @return bool
		 */
		public function is_array( $value ) {

			return is_array( $value );

		}

		/**
		 * Check whether a value is a string.
		 *
		 * @param mixed $value Value to check.
		 *
		 * @return bool
		 */
		public function is_string( $value ) {

			return is_string( $value );

		}

		/**
		 * Check whether a value is numeric.
		 *
		 * @param mixed $value Value to check.
		 *
		 * @return bool
		 */
		public function is_numeric( $value ) {

			return is_numeric( $value );

		}

		/**
		 * Convert a value to string.
		 *
		 * @param mixed $value Input value.
		 *
		 * @return string
		 */
		public function to_string( $value ) {

			if ( null === $value ) {
				return '';
			}

			if ( is_scalar( $value ) ) {
				return (string) $value;
			}

			$json = wp_json_encode( $value );

			return false === $json ? '' : $json;

		}

		/**
		 * Convert a value to array.
		 *
		 * @param mixed $value Input value.
		 *
		 * @return array
		 */
		public function to_array( $value ) {

			if ( is_array( $value ) ) {
				return $value;
			}

			if ( null === $value ) {
				return array();
			}

			return (array) $value;

		}

	}
}
