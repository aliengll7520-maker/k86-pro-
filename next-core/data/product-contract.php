<?php
/**
 * Product Contract
 *
 * Single Source of Truth for Product Engine.
 *
 * @package K86_Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Contract' ) ) {

	class K86_Product_Contract {

		/**
		 * Get Product Contract.
		 *
		 * @return array
		 */
		public static function fields() {

			return array(

				'basic' => array(
					'title',
					'slug',
					'sku',
					'status',
				),

				'media' => array(
					'gallery',
					'video',
				),

				'pricing' => array(
					'price',
					'sale_price',
				),

				'affiliate' => array(
					'affiliate_links',
				),

				'review' => array(
					'rating',
					'review_count',
				),

				'voucher' => array(
					'voucher',
				),

				'countdown' => array(),

				'stock' => array(
					'stock',
				),

				'shipping' => array(
					'shipping',
				),

				'policy' => array(
					'warranty',
					'return_policy',
				),

				'seo' => array(),

				'system' => array(
					'post_id',
					'created_at',
					'updated_at',
				),

			);

		}

	}

}
