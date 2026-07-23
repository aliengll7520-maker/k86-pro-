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
	/**
	 * Set shipping carrier.
	 *
	 * @param string $carrier Carrier.
	 *
	 * @return $this
	 */
	public function set_carrier( $carrier ) {

		return $this->register(
			'shipping_carrier',
			sanitize_text_field( $carrier )
		);

	}

	/**
	 * Get shipping carrier.
	 *
	 * @return string
	 */
	public function get_carrier() {

		return (string) $this->get( 'shipping_carrier', '' );

	}

	/**
	 * Set tracking number.
	 *
	 * @param string $tracking Tracking number.
	 *
	 * @return $this
	 */
	public function set_tracking_number( $tracking ) {

		return $this->register(
			'tracking_number',
			sanitize_text_field( $tracking )
		);

	}

	/**
	 * Get tracking number.
	 *
	 * @return string
	 */
	public function get_tracking_number() {

		return (string) $this->get( 'tracking_number', '' );

	}

	/**
	 * Has tracking number.
	 *
	 * @return bool
	 */
	public function has_tracking_number() {

		return '' !== $this->get_tracking_number();

	}

	/**
	 * Set shipping insurance.
	 *
	 * @param bool $enabled Insurance.
	 *
	 * @return $this
	 */
	public function set_shipping_insurance( $enabled ) {

		return $this->register(
			'shipping_insurance',
			(bool) $enabled
		);

	}

	/**
	 * Check shipping insurance.
	 *
	 * @return bool
	 */
	public function has_shipping_insurance() {

		return (bool) $this->get(
			'shipping_insurance',
			false
		);

	}

	/**
	 * Get shipping label.
	 *
	 * @return string
	 */
	public function get_shipping_label() {

		if ( $this->is_free_shipping() ) {
			return __( 'Miễn phí vận chuyển', 'k86-pro' );
		}

		return sprintf(
			__( 'Phí vận chuyển: %s', 'k86-pro' ),
			number_format_i18n(
				$this->calculate_shipping_fee(),
				0
			)
		);

	}
	}

}
