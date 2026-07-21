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
			?>
			<div class="wrap">
				<h1>K86 Pro Dashboard</h1>
				<p>Welcome to K86 Pro Next Core.</p>
			</div>
			<?php
		}

		/**
		 * Products.
		 */
		public static function products() {
			?>
			<div class="wrap">
				<h1>Product Manager</h1>
				<p>Product list will be available in the next milestone.</p>
			</div>
			<?php
		}

		/**
		 * Add Product.
		 */
		public static function add_product() {
			?>
			<div class="wrap">
				<h1>Add Product</h1>
				<p>Product form will be available in the next milestone.</p>
			</div>
			<?php
		}

		/**
		 * Settings.
		 */
		public static function settings() {
			?>
			<div class="wrap">
				<h1>Settings</h1>
				<p>K86 Pro settings page.</p>
			</div>
			<?php
		}
	}

}
