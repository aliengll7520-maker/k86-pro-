<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Xóa sản phẩm
 */

add_action( 'admin_post_k86_delete_product', 'k86_delete_product' );

function k86_delete_product() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền.', 'k86-pro' ) );
	}

	// Kiểm tra Nonce
	check_admin_referer( 'k86_delete_product' );

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';

	$id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;

	if ( $id > 0 ) {

		$wpdb->delete(
			$table,
			array(
				'id' => $id,
			),
			array(
				'%d',
			)
		);

	}

	wp_safe_redirect(
		admin_url( 'admin.php?page=k86-products' )
	);

	exit;
}
