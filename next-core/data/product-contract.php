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

				'basic' => array(),

				'media' => array(),

				'pricing' => array(),

				'affiliate' => array(),

				'review' => array(),

				'voucher' => array(),

				'countdown' => array(),

				'stock' => array(),

				'shipping' => array(),

				'policy' => array(),

				'seo' => array(),

				'system' => array(),

			);

		}

	}

}
