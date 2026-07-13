<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Affiliate Link Engine
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Affiliate Link Engine
|--------------------------------------------------------------------------
|
| Module này chịu trách nhiệm xử lý toàn bộ liên kết Affiliate.
|
| Các Module khác KHÔNG tự xử lý Link.
|
| Product Box
| CTA
| Dashboard
| AI Integration
|
| sẽ gọi API tại đây.
|
*/

/**
 * Kiểm tra Link hợp lệ.
 *
 * @param string $url
 * @return bool
 */
function k86_is_valid_link( $url ) {

	return filter_var(
		$url,
		FILTER_VALIDATE_URL
	) !== false;

}
/*
|--------------------------------------------------------------------------
| Link API
|--------------------------------------------------------------------------
*/

/**
 * Lấy liên kết theo nền tảng.
 *
 * @param object $product
 * @param string $platform
 * @return string
 */
function k86_get_product_link( $product, $platform ) {

	if ( empty( $product ) || ! is_object( $product ) ) {
		return '';
	}

	switch ( strtolower( $platform ) ) {

		case 'shopee':
			return k86_get_shopee_link( $product );

		case 'tiktok':
			return k86_get_tiktok_link( $product );

		case 'lazada':
			return k86_get_lazada_link( $product );

		case 'amazon':
			return k86_get_amazon_link( $product );

		default:
			return '';

	}

}

/**
 * Kiểm tra sản phẩm có liên kết hay không.
 *
 * @param object $product
 * @param string $platform
 * @return bool
 */
function k86_has_product_link( $product, $platform ) {

	return ! empty(
		k86_get_product_link( $product, $platform )
	);

}
/*
|--------------------------------------------------------------------------
| Shopee Link Engine
|--------------------------------------------------------------------------
*/

/**
 * Lấy liên kết Shopee.
 *
 * @param object $product
 * @return string
 */
function k86_get_shopee_link( $product ) {

	if ( empty( $product->shopee ) ) {
		return '';
	}

	$link = trim( $product->shopee );

	if ( ! k86_is_valid_link( $link ) ) {
		return '';
	}

	/**
	 * Cho phép Plugin khác chỉnh sửa Link Shopee.
	 */
	return apply_filters(
		'k86_shopee_link',
		$link,
		$product
	);

}

/**
 * Kiểm tra sản phẩm có Link Shopee.
 *
 * @param object $product
 * @return bool
 */
function k86_has_shopee_link( $product ) {

	return ! empty( k86_get_shopee_link( $product ) );

}
/*
|--------------------------------------------------------------------------
| TikTok Link Engine
|--------------------------------------------------------------------------
*/

/**
 * Lấy liên kết TikTok Shop.
 *
 * @param object $product
 * @return string
 */
function k86_get_tiktok_link( $product ) {

	if ( empty( $product->tiktok ) ) {
		return '';
	}

	$link = trim( $product->tiktok );

	if ( ! k86_is_valid_link( $link ) ) {
		return '';
	}

	/**
	 * Cho phép Plugin khác chỉnh sửa Link TikTok.
	 */
	return apply_filters(
		'k86_tiktok_link',
		$link,
		$product
	);

}

/**
 * Kiểm tra sản phẩm có Link TikTok Shop.
 *
 * @param object $product
 * @return bool
 */
function k86_has_tiktok_link( $product ) {

	return ! empty( k86_get_tiktok_link( $product ) );

}
/*
|--------------------------------------------------------------------------
| Lazada Link Engine
|--------------------------------------------------------------------------
*/

/**
 * Lấy liên kết Lazada.
 *
 * @param object $product
 * @return string
 */
function k86_get_lazada_link( $product ) {

	if ( empty( $product->lazada ) ) {
		return '';
	}

	$link = trim( $product->lazada );

	if ( ! k86_is_valid_link( $link ) ) {
		return '';
	}

	/**
	 * Cho phép Plugin khác chỉnh sửa Link Lazada.
	 */
	return apply_filters(
		'k86_lazada_link',
		$link,
		$product
	);

}

/**
 * Kiểm tra sản phẩm có Link Lazada.
 *
 * @param object $product
 * @return bool
 */
function k86_has_lazada_link( $product ) {

	return ! empty( k86_get_lazada_link( $product ) );

}
/*
|--------------------------------------------------------------------------
| Amazon Link Engine
|--------------------------------------------------------------------------
*/

/**
 * Lấy liên kết Amazon.
 *
 * @param object $product
 * @return string
 */
function k86_get_amazon_link( $product ) {

	if ( empty( $product->amazon ) ) {
		return '';
	}

	$link = trim( $product->amazon );

	if ( ! k86_is_valid_link( $link ) ) {
		return '';
	}

	/**
	 * Cho phép Plugin khác chỉnh sửa Link Amazon.
	 */
	return apply_filters(
		'k86_amazon_link',
		$link,
		$product
	);

}

/**
 * Kiểm tra sản phẩm có Link Amazon.
 *
 * @param object $product
 * @return bool
 */
function k86_has_amazon_link( $product ) {

	return ! empty( k86_get_amazon_link( $product ) );

}
/*
|--------------------------------------------------------------------------
| Link Validator
|--------------------------------------------------------------------------
*/

/**
 * Trả về target cho liên kết.
 *
 * @return string
 */
function k86_get_link_target() {

	return k86_open_new_tab() ? '_blank' : '_self';

}

/**
 * Trả về thuộc tính rel.
 *
 * @return string
 */
function k86_get_link_rel() {

	return k86_get_rel_attributes();

}

/**
 * Kiểm tra liên kết theo nền tảng có hợp lệ không.
 *
 * @param object $product
 * @param string $platform
 * @return bool
 */
function k86_validate_product_link( $product, $platform ) {

	$link = k86_get_product_link(
		$product,
		$platform
	);

	return ! empty( $link ) && k86_is_valid_link( $link );

}
/*
|--------------------------------------------------------------------------
| Framework Hooks
|--------------------------------------------------------------------------
|
| Các Module khác nên sử dụng các Hook này thay vì
| sửa trực tiếp Link Engine.
|
*/

/**
 * Thông báo Link Engine đã sẵn sàng.
 */
do_action( 'k86_link_engine_loaded' );

/**
 * Filter liên kết cuối cùng trước khi xuất ra.
 *
 * @param string $link
 * @param object $product
 * @param string $platform
 *
 * @return string
 */
function k86_filter_product_link( $link, $product, $platform ) {

	return apply_filters(
		'k86_product_link',
		$link,
		$product,
		$platform
	);

}
