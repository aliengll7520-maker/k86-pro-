<?php
/**
 * K86 Pro Next Core
 * Save Product
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

/**
 * Lưu sản phẩm
 */
function k86_save_product() {

	// Chỉ chấp nhận POST.
	if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
		wp_die( esc_html__( 'Invalid request.', 'k86-pro' ) );
	}

	// Kiểm tra quyền.
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'k86-pro' ) );
	}

	// Kiểm tra nonce.
	if (
		! isset( $_POST['k86_product_nonce'] ) ||
		! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST['k86_product_nonce'] ) ),
			'k86_save_product'
		)
	) {
		wp_die( esc_html__( 'Security check failed.', 'k86-pro' ) );
	}

	// Chuẩn bị dữ liệu.
	$product = array(
		'title'      => isset( $_POST['k86_title'] ) ? sanitize_text_field( wp_unslash( $_POST['k86_title'] ) ) : '',
		'price'      => isset( $_POST['k86_price'] ) ? floatval( wp_unslash( $_POST['k86_price'] ) ) : 0,
		'sale_price' => isset( $_POST['k86_sale_price'] ) ? floatval( wp_unslash( $_POST['k86_sale_price'] ) ) : 0,
		'status'     => isset( $_POST['k86_status'] ) ? sanitize_text_field( wp_unslash( $_POST['k86_status'] ) ) : 'draft',
	);

	/**
	 * Cho phép các module bổ sung dữ liệu trước khi lưu.
	 */
	$product = apply_filters( 'k86_before_save_product', $product );

	/**
	 * Sprint hiện tại:
	 * Chưa ghi Repository.
	 * Chỉ kiểm tra luồng dữ liệu.
	 */
	wp_die(
		'<pre>' . esc_html( print_r( $product, true ) ) . '</pre>'
	);

}

/**
 * Đăng ký action.
 */
add_action( 'admin_post_k86_save_product', 'k86_save_product' );
