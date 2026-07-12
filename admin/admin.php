<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Admin Menu
 * Version: 1.5.0.6
 * Status: Development
 * --------------------------------------------------------
 */

/**
 * Đăng ký Menu K86 Pro
 */
add_action( 'admin_menu', 'k86_admin_menu' );

function k86_admin_menu() {

	/*
	|--------------------------------------------------------------------------
	| Menu chính
	|--------------------------------------------------------------------------
	*/

	add_menu_page(
		'K86 Pro',
		'K86 Pro',
		'manage_options',
		'k86-dashboard',
		'k86_dashboard_page',
		'dashicons-store',
		26
	);

	/*
	|--------------------------------------------------------------------------
	| Dashboard
	|--------------------------------------------------------------------------
	*/

	add_submenu_page(
		'k86-dashboard',
		'Dashboard',
		'Dashboard',
		'manage_options',
		'k86-dashboard',
		'k86_dashboard_page'
	);

	/*
	|--------------------------------------------------------------------------
	| Quản lý sản phẩm
	|--------------------------------------------------------------------------
	*/

	add_submenu_page(
		'k86-dashboard',
		'Quản lý sản phẩm',
		'Sản phẩm',
		'manage_options',
		'k86-products',
		'k86_product_manager_page'
	);

	/*
	|--------------------------------------------------------------------------
	| Cài đặt
	|--------------------------------------------------------------------------
	*/

	add_submenu_page(
		'k86-dashboard',
		'Cài đặt',
		'Cài đặt',
		'manage_options',
		'k86-settings',
		'k86_settings_page'
	);

	/*
	|--------------------------------------------------------------------------
	| Trang ẩn: Thêm sản phẩm
	|--------------------------------------------------------------------------
	*/

	add_submenu_page(
		null,
		'Thêm sản phẩm',
		'Thêm sản phẩm',
		'manage_options',
		'k86-add-product',
		'k86_add_product_form'
	);

	/*
	|--------------------------------------------------------------------------
	| Trang ẩn: Sửa sản phẩm
	|--------------------------------------------------------------------------
	*/

	add_submenu_page(
		null,
		'Sửa sản phẩm',
		'Sửa sản phẩm',
		'manage_options',
		'k86-edit-product',
		'k86_edit_product_form'
	);

}

/**
 * Dashboard
 */
function k86_dashboard_page() {
	?>

	<div class="wrap">

		<h1>K86 Pro Dashboard</h1>

		<p>Chào mừng bạn đến với K86 Pro.</p>

		<p>Plugin Affiliate dành riêng cho K86Shop.</p>

	</div>

	<?php
}
