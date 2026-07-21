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
		 * Thiết lập phương thức vận chuyển.
		 *
		 * @param string $method
		 * @return $this
		 */
		public function set_method( $method ) {
			return $this->register( 'shipping_method', sanitize_text_field( $method ) );
		}

		/**
		 * Lấy phương thức vận chuyển.
		 *
		 * @return string
		 */
		public function get_method() {
			return $this->get( 'shipping_method', '' );
		}

		/**
		 * Thiết lập phí vận chuyển.
		 *
		 * @param float $fee
		 * @return $this
		 */
		public function set_fee( $fee ) {
			return $this->register( 'shipping_fee', (float) $fee );
		}

		/**
		 * Lấy phí vận chuyển.
		 *
		 * @return float
		 */
		public function get_fee() {
			return (float) $this->get( 'shipping_fee', 0 );
		}

		/**
		 * Thiết lập miễn phí vận chuyển.
		 *
		 * @param bool $enabled
		 * @return $this
		 */
		public function set_free_shipping( $enabled ) {
			return $this->register( 'free_shipping', (bool) $enabled );
		}

		/**
		 * Kiểm tra miễn phí vận chuyển.
		 *
		 * @return bool
		 */
		public function is_free_shipping() {
			return (bool) $this->get( 'free_shipping', false );
		}

		/**
		 * Thiết lập thời gian giao hàng dự kiến.
		 *
		 * @param string $estimate
		 * @return $this
		 */
		public function set_estimate( $estimate ) {
			return $this->register( 'delivery_estimate', sanitize_text_field( $estimate ) );
		}

		/**
		 * Lấy thời gian giao hàng dự kiến.
		 *
		 * @return string
		 */
		public function get_estimate() {
			return $this->get( 'delivery_estimate', '' );
		}

		/**
		 * Tính phí vận chuyển thực tế.
		 *
		 * @return float
		 */
		public function calculate_shipping_fee() {

			if ( $this->is_free_shipping() ) {
				return 0;
			}

			return $this->get_fee();
		}
	}
}
