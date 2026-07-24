<?php
/**
 * K86 Pro Next Core
 * Inventory Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Inventory_Service' ) ) {

	class K86_Inventory_Service {

		protected $cache = array();

		public function __construct() {}

		public function get_inventory_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'in_stock'        => true,
				'stock_quantity'  => 0,
				'sold_quantity'   => 0,
				'stock_status'    => 'instock',
			);

			$data = apply_filters(
				'k86_inventory_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		public function build( $product_id ) {

			return apply_filters(
				'k86_inventory_service_build',
				$this->get_inventory_data( $product_id ),
				$product_id
			);
		}

	}

}
