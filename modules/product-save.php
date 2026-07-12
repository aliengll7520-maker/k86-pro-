<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Save
 * Version: 1.5.0.2
 * Status: Development
 * --------------------------------------------------------
 */

/*
|--------------------------------------------------------------------------
| Lưu sản phẩm mới
|--------------------------------------------------------------------------
*/

add_action( 'admin_post_k86_save_product', 'k86_save_product' );

function k86_save_product() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Bạn không có quyền.' );
	}

	check_admin_referer( 'k86_save_product', 'k86_nonce' );

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';
		$wpdb->insert(
		$table,
		array(
			'name'        => sanitize_text_field( $_POST['name'] ?? '' ),
			'brand'       => sanitize_text_field( $_POST['brand'] ?? '' ),
			'slug'        => sanitize_title( $_POST['name'] ?? '' ),
			'price'       => sanitize_text_field( $_POST['price'] ?? '' ),
			'sale_price'  => sanitize_text_field( $_POST['sale_price'] ?? '' ),
			'shopee'      => esc_url_raw( $_POST['shopee'] ?? '' ),
			'tiktok'      => esc_url_raw( $_POST['tiktok'] ?? '' ),
			'lazada'      => esc_url_raw( $_POST['lazada'] ?? '' ),
			'image'       => esc_url_raw( $_POST['image'] ?? '' ),
			'description' => sanitize_textarea_field( $_POST['description'] ?? '' ),
			'status'      => sanitize_text_field( $_POST['status'] ?? 'active' ),
		),
		array(
			'%s', // name
			'%s', // brand
			'%s', // slug
			'%s', // price
			'%s', // sale_price
			'%s', // shopee
			'%s', // tiktok
			'%s', // lazada
			'%s', // image
			'%s', // description
			'%s', // status
		)
	);

	wp_safe_redirect(
		admin_url( 'admin.php?page=k86-products' )
	);

	exit;
}

/*
|--------------------------------------------------------------------------
| Cập nhật sản phẩm
|--------------------------------------------------------------------------
*/

add_action( 'admin_post_k86_update_product', 'k86_update_product' );

function k86_update_product() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Bạn không có quyền.' );
	}

	check_admin_referer( 'k86_update_product', 'k86_nonce' );

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';

	$id = absint( $_POST['id'] ?? 0 );
		$wpdb->update(
		$table,
		array(
			'name'        => sanitize_text_field( $_POST['name'] ?? '' ),
			'brand'       => sanitize_text_field( $_POST['brand'] ?? '' ),
			'slug'        => sanitize_title( $_POST['name'] ?? '' ),
			'price'       => sanitize_text_field( $_POST['price'] ?? '' ),
			'sale_price'  => sanitize_text_field( $_POST['sale_price'] ?? '' ),
			'shopee'      => esc_url_raw( $_POST['shopee'] ?? '' ),
			'tiktok'      => esc_url_raw( $_POST['tiktok'] ?? '' ),
			'lazada'      => esc_url_raw( $_POST['lazada'] ?? '' ),
			'image'       => esc_url_raw( $_POST['image'] ?? '' ),
			'description' => sanitize_textarea_field( $_POST['description'] ?? '' ),
			'status'      => sanitize_text_field( $_POST['status'] ?? 'active' ),
		),
		array(
			'id' => $id,
		),
		array(
			'%s', // name
			'%s', // brand
			'%s', // slug
			'%s', // price
			'%s', // sale_price
			'%s', // shopee
			'%s', // tiktok
			'%s', // lazada
			'%s', // image
			'%s', // description
			'%s', // status
		),
		array(
			'%d',
		)
	);

	wp_safe_redirect(
		admin_url( 'admin.php?page=k86-products' )
	);

	exit;
}
