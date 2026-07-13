<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Delete
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Đăng ký Action xóa sản phẩm.
 */
add_action( 'admin_post_k86_delete_product', 'k86_delete_product' );

/**
 * Xóa sản phẩm.
 *
 * @return void
 */
function k86_delete_product() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			esc_html__( 'Bạn không có quyền truy cập.', 'k86-pro' )
		);
	}

	check_admin_referer( 'k86_delete_product' );

	global $wpdb;

	$table = k86_get_table();

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

		/**
		 * Hook sau khi xóa sản phẩm.
		 *
		 * Shopping Assistant
		 * AI Engine
		 * Affiliate Engine
		 * Analytics Engine
		 * ...
		 */
		do_action(
			'k86_product_deleted',
			$id
		);

	}

	wp_safe_redirect(
		admin_url( 'admin.php?page=k86-products' )
	);

	exit;
}
