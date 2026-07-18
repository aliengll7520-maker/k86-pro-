<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Affiliate Box
 * Version: 1.5.3
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lưu ý:
 * Shortcode "k86_box" được đăng ký trong:
 * modules/product-shortcode.php
 *
 * File này chỉ giữ vai trò Wrapper để tương thích
 * với các phiên bản cũ.
 */

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
	 * Nếu Product Shortcode chưa được nạp
	 * thì không gây Fatal Error.
	 */
	if ( ! function_exists( 'k86_product_shortcode' ) ) {
		return '<div class="k86-error">K86 Product Shortcode chưa được khởi tạo.</div>';
	}

	/**
	 * Chuyển tiếp sang Product Shortcode.
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
