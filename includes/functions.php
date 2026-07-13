<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Includes: Helper Functions
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lấy tên bảng sản phẩm.
 *
 * @return string
 */
function k86_get_table() {

	global $wpdb;

	return $wpdb->prefix . 'k86_products';

}

/**
 * Lấy thông tin sản phẩm theo ID.
 *
 * @param int $id ID sản phẩm.
 * @return object|null
 */
function k86_get_product( $id ) {

	global $wpdb;

	return $wpdb->get_row(
		$wpdb->prepare(
			'SELECT * FROM ' . k86_get_table() . ' WHERE id = %d',
			absint( $id )
		)
	);

}

/**
 * Lấy toàn bộ danh sách sản phẩm.
 *
 * @return array
 */
function k86_get_products() {

	global $wpdb;

	return $wpdb->get_results(
		'SELECT * FROM ' . k86_get_table() . ' ORDER BY id DESC'
	);

}

/**
 * Kiểm tra quyền quản trị.
 *
 * @return bool
 */
function k86_is_admin() {

	return current_user_can( 'manage_options' );

}

/**
 * Làm sạch dữ liệu văn bản.
 *
 * @param string $value Dữ liệu đầu vào.
 * @return string
 */
function k86_clean( $value ) {

	return sanitize_text_field( $value );

}

/**
 * Làm sạch URL.
 *
 * @param string $url URL đầu vào.
 * @return string
 */
function k86_clean_url( $url ) {

	return esc_url_raw( $url );

}
