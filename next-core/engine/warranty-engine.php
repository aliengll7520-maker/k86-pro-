<?php
/**
 * K86 Pro Next Core
 * Warranty Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Engine' ) ) {

	class K86_Warranty_Engine extends K86_Engine_Base {

		/**
		 * Set warranty period.
		 *
		 * @param string $period Warranty period.
		 *
		 * @return $this
		 */
		public function set_period( $period ) {

			return $this->register(
				'warranty_period',
				sanitize_text_field( $period )
			);

		}

		/**
		 * Get warranty period.
		 *
		 * @return string
		 */
		public function get_period() {

			return (string) $this->get( 'warranty_period', '' );

		}

		/**
		 * Set warranty type.
		 *
		 * @param string $type Warranty type.
		 *
		 * @return $this
		 */
		public function set_type( $type ) {

			return $this->register(
				'warranty_type',
				sanitize_text_field( $type )
			);

		}

		/**
		 * Get warranty type.
		 *
		 * @return string
		 */
		public function get_type() {

			return (string) $this->get( 'warranty_type', '' );

		}

		/**
		 * Set warranty provider.
		 *
		 * @param string $provider Warranty provider.
		 *
		 * @return $this
		 */
		public function set_provider( $provider ) {

			return $this->register(
				'warranty_provider',
				sanitize_text_field( $provider )
			);

		}

		/**
		 * Get warranty provider.
		 *
		 * @return string
		 */
		public function get_provider() {

			return (string) $this->get( 'warranty_provider', '' );

		}

		/**
		 * Check whether warranty exists.
		 *
		 * @return bool
		 */
		public function has_warranty() {

			return '' !== trim( $this->get_period() );

		}

		/**
		 * Get warranty information.
		 *
		 * @return array
		 */
		public function get_warranty_info() {

			return array(
				'period'   => $this->get_period(),
				'type'     => $this->get_type(),
				'provider' => $this->get_provider(),
			);

		}

	}

}
