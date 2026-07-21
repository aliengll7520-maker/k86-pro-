<?php
/**
 * K86 Pro Next Core
 * Shipping Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Shipping_Engine' ) ) {

	class K86_Shipping_Engine extends K86_Engine_Base {

		/**
		 * Set shipping method.
		 *
		 * @param string $method Shipping method.
		 *
		 * @return $this
		 */
		public function set_method( $method ) {

			return $this->register(
				'shipping_method',
				sanitize_text_field( $method )
			);

		}

		/**
		 * Get shipping method.
		 *
		 * @return string
		 */
		public function get_method() {

			return (string) $this->get( 'shipping_method', '' );

		}

		/**
		 * Set shipping fee.
		 *
		 * @param float $fee Shipping fee.
		 *
		 * @return $this
		 */
		public function set_fee( $fee ) {

			return $this->register(
				'shipping_fee',
				max( 0, (float) $fee )
			);

		}

		/**
		 * Get shipping fee.
		 *
		 * @return float
		 */
		public function get_fee() {

			return (float) $this->get( 'shipping_fee', 0 );

		}

		/**
		 * Enable or disable free shipping.
		 *
		 * @param bool $enabled Free shipping status.
		 *
		 * @return $this
		 */
		public function set_free_shipping( $enabled ) {

			return $this->register(
				'free_shipping',
				(bool) $enabled
			);

		}

		/**
		 * Check free shipping status.
		 *
		 * @return bool
		 */
		public function is_free_shipping() {

			return (bool) $this->get( 'free_shipping', false );

		}

		/**
		 * Set delivery estimate.
		 *
		 * @param string $estimate Delivery estimate.
		 *
		 * @return $this
		 */
		public function set_estimate( $estimate ) {

			return $this->register(
				'delivery_estimate',
				sanitize_text_field( $estimate )
			);

		}

		/**
		 * Get delivery estimate.
		 *
		 * @return string
		 */
		public function get_estimate() {

			return (string) $this->get( 'delivery_estimate', '' );

		}

		/**
		 * Calculate final shipping fee.
		 *
		 * @return float
		 */
		public function calculate_shipping_fee() {

			if ( $this->is_free_shipping() ) {
				return 0.0;
			}

			return $this->get_fee();

		}

	}

}
