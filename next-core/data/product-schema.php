<?php
/**
 * Product Schema
 *
 * Product Engine Schema.
 *
 * @package K86_Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Schema' ) ) {

	class K86_Product_Schema {

		/**
		 * Get schema.
		 *
		 * @return array
		 */
		public static function get() {

			return array(

				'table'       => 'k86_products',

				'primary_key' => 'id',

				'contract'    => K86_Product_Contract::fields(),

				'columns'     => array(

					'id',

					'title',
					'slug',
					'sku',
					'status',
					'short_description',
					'description',

					'gallery',
					'video',

					'price',
					'sale_price',

					'affiliate_links',

					'rating',
					'review_count',

					'voucher',

					'stock',

					'shipping',

					'warranty',
					'return_policy',

					'post_id',

					'created_at',
					'updated_at',

				),

			);

		}

	}

}
