<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Affiliate Box
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once K86_PRO_PATH . 'business/affiliate/link-manager.php';
/**
 * Đăng ký Shortcode Affiliate Box.
 */
add_shortcode( 'k86_box', 'k86_affiliate_box' );

/**
 * Hiển thị Affiliate Box.
 *
 * Wrapper để tương thích với các phiên bản cũ.
 *
 * Ví dụ:
 * [k86_box id="1"]
 *
 * @param array $atts Thuộc tính Shortcode.
 * @return string
 */
function k86_affiliate_box( $atts ) {

	/**
	 * Cho phép các Module mở rộng xử lý trước.
	 */
	do_action( 'k86_affiliate_box_before', $atts );

	/**
	 * Chuyển tiếp sang Product Shortcode.
	 *
	 * Điều này giúp chỉ còn một nơi duy nhất
	 * quản lý giao diện Product Box.
	 */
	$output = k86_product_shortcode( $atts );

	/**
	 * Cho phép thay đổi HTML trước khi trả về.
	 */
	$output = apply_filters(
		'k86_affiliate_box_output',
		$output,
		$atts
	);

	/**
	 * Hook sau khi hiển thị.
	 */
	do_action(
		'k86_affiliate_box_after',
		$atts
	);

	return $output;
}
