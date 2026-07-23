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
					'id',
					'title',
					'slug',
					'sku',
					'status',
					'short_description',
					'description',
				),

				'media' => array(
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
				),

				'pricing' => array(
					'price',
					'sale_price',
				),

				'stock' => array(
					'stock',
					'in_stock',
					'stock_progress',
				),

				'affiliate' => array(
					'affiliate_links',
					'cta_buttons',
				),

				'review' => array(
					'rating',
					'review_count',
					'highlights',
					'comparison',
				),

				'voucher' => array(
					'voucher',
				),

				'countdown' => array(
					'countdown',
				),

				'shipping' => array(
					'free_shipping',
				),

				'policy' => array(
					'warranty',
					'return_policy',
					'trust',
				),

				'seo' => array(
					'meta_title',
					'meta_description',
					'focus_keyword',
				),

				'system' => array(
					'post_id',
					'created_at',
					'updated_at',
				),

			);

		}

	}
}
