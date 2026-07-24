<?php
/**
 * K86 Pro Next Core
 * Review Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Review_Service' ) ) {

	class K86_Review_Service {

		protected $cache = array();

		public function __construct() {}

		public function get_review_data( $product_id ) {

			if ( isset( $this->cache[ $product_id ] ) ) {
				return $this->cache[ $product_id ];
			}

			$data = array(
				'rating'        => 0,
				'review_count'  => 0,
				'recommendation'=> '',
				'review_note'   => '',
			);

			$data = apply_filters(
				'k86_review_service_data',
				$data,
				$product_id
			);

			$this->cache[ $product_id ] = $data;

			return $data;
		}

		public function build( $product_id ) {

			return apply_filters(
				'k86_review_service_build',
				$this->get_review_data( $product_id ),
				$product_id
			);
		}

	}

}
