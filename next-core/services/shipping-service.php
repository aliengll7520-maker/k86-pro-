<?php
/**
 * K86 Pro Next Core
 * Shipping Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Shipping_Service' ) ) {

	class K86_Shipping_Service {

		protected $cache = array();

		public function __construct() {}

		public function get_shipping_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'free_shipping' => false,
				'shipping_fee'  => '',
				'delivery_time' => '',
				'shipping_note' => '',
			);

			$data = apply_filters(
				'k86_shipping_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		public function build( $product_id ) {

			return apply_filters(
				'k86_shipping_service_build',
				$this->get_shipping_data( $product_id ),
				$product_id
			);
		}

	}

}
