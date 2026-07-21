<?php
/**
 * K86 Pro Next Core
 * Admin Menu
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Admin_Menu' ) ) {

	class K86_Admin_Menu {

		/**
		 * Khởi tạo.
		 */
		public function init() {

			add_action( 'admin_menu', array( $this, 'register_menu' ) );

		}

		/**
		 * Đăng ký menu quản trị.
		 */
		public function register_menu() {

			add_menu_page(
				'K86 Pro',
				'K86 Pro',
				'manage_options',
				'k86-pro',
				array( 'K86_Admin_Pages', 'dashboard' ),
				'dashicons-store',
				56
			);

			add_submenu_page(
				'k86-pro',
				'Dashboard',
				'Dashboard',
				'manage_options',
				'k86-pro',
				array( 'K86_Admin_Pages', 'dashboard' )
			);

			add_submenu_page(
				'k86-pro',
				'Products',
				'Products',
				'manage_options',
				'k86-products',
				array( 'K86_Admin_Pages', 'products' )
			);

			add_submenu_page(
				'k86-pro',
				'Add Product',
				'Add Product',
				'manage_options',
				'k86-add-product',
				array( 'K86_Admin_Pages', 'add_product' )
			);

			add_submenu_page(
				'k86-pro',
				'Settings',
				'Settings',
				'manage_options',
				'k86-settings',
				array( 'K86_Admin_Pages', 'settings' )
			);

		}

	}

}
