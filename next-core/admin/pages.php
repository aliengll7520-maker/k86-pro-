<?php
/**
 * K86 Pro Next Core
 * Admin Pages
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Admin_Pages' ) ) {

	class K86_Admin_Pages {

		/**
		 * Dashboard.
		 */
		public static function dashboard() {

			require_once __DIR__ . '/dashboard.php';

		}

		/**
		 * Product List.
		 */
		public static function products() {

			require_once __DIR__ . '/products/list.php';

		}

		/**
		 * Add Product.
		 */
		public static function add_product() {

			require_once __DIR__ . '/products/form.php';

		}

		/**
		 * Settings.
		 */
		public static function settings() {

			require_once __DIR__ . '/settings.php';

		}

	}

}
