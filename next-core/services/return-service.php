<?php
/**
 * K86 Pro Next Core
 * Return Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Service' ) ) {

	class K86_Return_Service {

		protected $cache = array();

		public function __construct() {}

		public function get_return_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'return_period' => '',
				'return_policy' => '',
				'refund_method' => '',
				'return_note'   => '',
			);

			$data = apply_filters(
				'k86_return_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		public function build( $product_id ) {

			return apply_filters(
				'k86_return_service_build',
				$this->get_return_data( $product_id ),
				$product_id
			);
		}

	}

}
