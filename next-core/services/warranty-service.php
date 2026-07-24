<?php
/**
 * K86 Pro Next Core
 * Warranty Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Service' ) ) {

	class K86_Warranty_Service {

		protected $cache = array();

		public function __construct() {}

		public function get_warranty_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'warranty_period' => '',
				'warranty_type'   => '',
				'warranty_note'   => '',
				'support_contact' => '',
			);

			$data = apply_filters(
				'k86_warranty_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		public function build( $product_id ) {

			return apply_filters(
				'k86_warranty_service_build',
				$this->get_warranty_data( $product_id ),
				$product_id
			);
		}

	}

}
