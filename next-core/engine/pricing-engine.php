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
		 * Set regular price.
		 *
		 * @param float $price Regular price.
		 *
		 * @return $this
		 */
		public function set_regular_price( $price ) {

			return $this->register( 'regular_price', (float) $price );

		}

		/**
		 * Get regular price.
		 *
		 * @return float
		 */
		public function get_regular_price() {

			return (float) $this->get( 'regular_price', 0 );

		}

		/**
		 * Set sale price.
		 *
		 * @param float $price Sale price.
		 *
		 * @return $this
		 */
		public function set_sale_price( $price ) {

			return $this->register( 'sale_price', (float) $price );

		}

		/**
		 * Get sale price.
		 *
		 * @return float
		 */
		public function get_sale_price() {

			return (float) $this->get( 'sale_price', 0 );

		}

		/**
		 * Set currency.
		 *
		 * @param string $currency Currency code.
		 *
		 * @return $this
		 */
		public function set_currency( $currency ) {

			return $this->register(
				'currency',
				strtoupper( (string) $currency )
			);

		}

		/**
		 * Get currency.
		 *
		 * @return string
		 */
		public function get_currency() {

			return (string) $this->get( 'currency', 'VND' );

		}

		/**
		 * Check whether product is on sale.
		 *
		 * @return bool
		 */
		public function is_on_sale() {

			$regular = $this->get_regular_price();
			$sale    = $this->get_sale_price();

			return $sale > 0 && $sale < $regular;

		}

		/**
		 * Get current price.
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
		 * Get discount percent.
		 *
		 * @return int
		 */
		public function get_discount_percent() {

			if ( ! $this->is_on_sale() ) {
				return 0;
			}

			$regular = $this->get_regular_price();

			if ( $regular <= 0 ) {
				return 0;
			}

			return (int) round(
				(
					( $regular - $this->get_sale_price() )
					/ $regular
				) * 100
			);

		}

		/**
		 * Get discount amount.
		 *
		 * @return float
		 */
		public function get_discount_amount() {

			if ( ! $this->is_on_sale() ) {
				return 0;
			}

			return $this->get_regular_price() - $this->get_sale_price();

		}
public function format_price( $price = null ) {

    if ( null === $price ) {
        $price = $this->get_current_price();
    }

    return number_format(
        (float) $price,
        0,
        ',',
        '.'
    ) . ' ' . $this->get_currency();

}

public function get_formatted_price() {

    return $this->format_price(
        $this->get_current_price()
    );

}

public function get_formatted_regular_price() {

    return $this->format_price(
        $this->get_regular_price()
    );

}

public function get_formatted_sale_price() {

    return $this->format_price(
        $this->get_sale_price()
    );

}
	}

}
