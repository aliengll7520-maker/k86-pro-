<?php
/**
 * K86 Pro Next Core
 * Voucher Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Voucher_Engine' ) ) {

	class K86_Voucher_Engine extends K86_Engine_Base {

		/**
		 * Thiết lập mã voucher.
		 *
		 * @param string $code
		 * @return $this
		 */
		public function set_code( $code ) {
			return $this->register( 'code', strtoupper( trim( $code ) ) );
		}

		/**
		 * Lấy mã voucher.
		 *
		 * @return string
		 */
		public function get_code() {
			return $this->get( 'code', '' );
		}

		/**
		 * Thiết lập giá trị giảm.
		 *
		 * @param float $value
		 * @return $this
		 */
		public function set_value( $value ) {
			return $this->register( 'value', (float) $value );
		}

		/**
		 * Lấy giá trị giảm.
		 *
		 * @return float
		 */
		public function get_value() {
			return $this->get( 'value', 0 );
		}

		/**
		 * Thiết lập loại voucher.
		 * percent | fixed
		 *
		 * @param string $type
		 * @return $this
		 */
		public function set_type( $type ) {

			$allowed = array( 'percent', 'fixed' );

			if ( ! in_array( $type, $allowed, true ) ) {
				$type = 'fixed';
			}

			return $this->register( 'type', $type );
		}

		/**
		 * Lấy loại voucher.
		 *
		 * @return string
		 */
		public function get_type() {
			return $this->get( 'type', 'fixed' );
		}

		/**
		 * Kiểm tra voucher hợp lệ.
		 *
		 * @return bool
		 */
		public function is_valid() {
			return $this->get_code() !== '' && $this->get_value() > 0;
		}

		/**
		 * Tính số tiền được giảm.
		 *
		 * @param float $price
		 * @return float
		 */
		public function calculate_discount( $price ) {

			if ( ! $this->is_valid() ) {
				return 0;
			}

			if ( $this->get_type() === 'percent' ) {
				return ( $price * $this->get_value() ) / 100;
			}

			return min( $price, $this->get_value() );
		}

		/**
		 * Tính giá sau khi áp dụng voucher.
		 *
		 * @param float $price
		 * @return float
		 */
		public function calculate_final_price( $price ) {

			$discount = $this->calculate_discount( $price );

			return max( 0, $price - $discount );
		}
	}
}
