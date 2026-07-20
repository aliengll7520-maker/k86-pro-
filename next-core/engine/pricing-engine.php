<?php
/**
 * K86 Pro Next Core
 * Pricing Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Pricing_Engine' ) ) {

	class K86_Pricing_Engine extends K86_Engine_Base {

		/**
		 * Đặt giá gốc.
		 *
		 * @param float $price
		 * @return $this
		 */
		public function set_regular_price( $price ) {
			return $this->register( 'regular_price', (float) $price );
		}

		/**
		 * Lấy giá gốc.
		 *
		 * @return float
		 */
		public function get_regular_price() {
			return $this->get( 'regular_price', 0 );
		}

		/**
		 * Đặt giá khuyến mãi.
		 *
		 * @param float $price
		 * @return $this
		 */
		public function set_sale_price( $price ) {
			return $this->register( 'sale_price', (float) $price );
		}

		/**
		 * Lấy giá khuyến mãi.
		 *
		 * @return float
		 */
		public function get_sale_price() {
			return $this->get( 'sale_price', 0 );
		}

		/**
		 * Đặt tiền tệ.
		 *
		 * @param string $currency
		 * @return $this
		 */
		public function set_currency( $currency ) {
			return $this->register( 'currency', strtoupper( $currency ) );
		}

		/**
		 * Lấy tiền tệ.
		 *
		 * @return string
		 */
		public function get_currency() {
			return $this->get( 'currency', 'VND' );
		}

		/**
		 * Kiểm tra có đang giảm giá không.
		 *
		 * @return bool
		 */
		public function is_on_sale() {

			return $this->get_sale_price() > 0
				&& $this->get_sale_price() < $this->get_regular_price();
		}

		/**
		 * Lấy giá hiện tại.
		 *
		 * @return float
		 */
		public function get_current_price() {

			if ( $this->is_on_sale() ) {
				return $this->get_sale_price();
			}

			return $this->get_regular_price();
		}

		/**
		 * Tính phần trăm giảm giá.
		 *
		 * @return int
		 */
		public function get_discount_percent() {

			if ( ! $this->is_on_sale() ) {
				return 0;
			}

			return round(
				(
					( $this->get_regular_price() - $this->get_sale_price() )
					/ $this->get_regular_price()
				) * 100
			);
		}

		/**
		 * Tính số tiền giảm.
		 *
		 * @return float
		 */
		public function get_discount_amount() {

			if ( ! $this->is_on_sale() ) {
				return 0;
			}

			return $this->get_regular_price() - $this->get_sale_price();
		}
	}
}
