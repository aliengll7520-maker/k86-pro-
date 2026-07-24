<?php
/**
 * K86 Pro Next Core
 * Pricing Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Pricing_Service' ) ) {

	class K86_Pricing_Service {

		/**
		 * Cached pricing data.
		 *
		 * @var array
		 */
		protected $cache = array();

		/**
		 * Constructor.
		 */
		public function __construct() {}

		/**
		 * Get pricing data.
		 *
		 * @param int $product_id Product ID.
		 * @return array
		 */
		public function get_pricing_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'price'          => '',
				'regular_price'  => '',
				'sale_price'     => '',
				'discount'       => '',
				'voucher'        => '',
				'currency'       => '₫',
			);

			$data = apply_filters(
				'k86_pricing_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		/**
		 * Build pricing data.
		 *
		 * @param int $product_id Product ID.
		 * @return array
		 */
		public function build( $product_id ) {

			return apply_filters(
				'k86_pricing_service_build',
				$this->get_pricing_data( $product_id ),
				$product_id
			);
		}

	}

}
