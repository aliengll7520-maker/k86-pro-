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

					/* Primary */
					'id',

					/* Basic */
					'title',
					'slug',
					'sku',
					'status',
					'short_description',
					'description',

					/* Media */
					'image',
					'gallery',
					'video',
					'youtube',
					'tiktok',
					'pdf',
					'documents',
					'audio',
					'icon',
					'downloads',

					/* Pricing */
					'price',
					'sale_price',

					/* Stock */
					'stock',
					'in_stock',
					'stock_progress',

					/* Affiliate */
					'affiliate_links',
					'cta_buttons',

					/* Review */
					'rating',
					'review_count',
					'highlights',
					'comparison',

					/* Voucher */
					'voucher',

					/* Countdown */
					'countdown',

					/* Shipping */
					'free_shipping',

					/* Policy */
					'warranty',
					'return_policy',
					'trust',

					/* SEO */
					'meta_title',
					'meta_description',
					'focus_keyword',

					/* System */
					'post_id',
					'created_at',
					'updated_at',

				),

			);

		}

	}

}
