<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Includes: Helper Functions
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Database API
|--------------------------------------------------------------------------
*/

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
 * @param int $id
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
 * Lấy toàn bộ sản phẩm.
 *
 * @return array
 */
function k86_get_products() {

	global $wpdb;

	return $wpdb->get_results(
		'SELECT * FROM ' . k86_get_table() . ' ORDER BY id DESC'
	);

}
/*
|--------------------------------------------------------------------------
| Settings API
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ cài đặt K86 Pro.
 *
 * @return array
 */
function k86_get_settings() {

	return wp_parse_args(
		get_option( 'k86_settings', array() ),
		array(
			'show_shopee'      => 1,
			'show_tiktok'      => 1,
			'show_lazada'      => 1,
			'show_amazon'      => 1,

			'show_discount'    => 1,
			'show_save_money'  => 1,
			'show_description' => 1,

			'open_new_tab'     => 1,
			'rel_nofollow'     => 1,
			'rel_sponsored'    => 1,
			'rel_noopener'     => 1,
		)
	);

}

/**
 * Lấy một cài đặt theo khóa.
 *
 * @param string $key
 * @param mixed  $default
 * @return mixed
 */
function k86_get_setting( $key, $default = '' ) {

	$settings = k86_get_settings();

	return isset( $settings[ $key ] )
		? $settings[ $key ]
		: $default;

}
/*
|--------------------------------------------------------------------------
| Affiliate Profile API
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ thông tin Affiliate Profile.
 *
 * @return array
 */
function k86_get_affiliate_profiles() {

	return array(

		'shopee' => array(
			'store'      => k86_get_setting( 'shopee_store' ),
			'affiliate'  => k86_get_setting( 'shopee_affiliate' ),
			'partner'    => k86_get_setting( 'shopee_partner' ),
		),

		'tiktok' => array(
			'store'      => k86_get_setting( 'tiktok_store' ),
			'affiliate'  => k86_get_setting( 'tiktok_affiliate' ),
		),

		'lazada' => array(
			'store'      => k86_get_setting( 'lazada_store' ),
			'affiliate'  => k86_get_setting( 'lazada_affiliate' ),
		),

		'amazon' => array(
			'store'      => k86_get_setting( 'amazon_store' ),
			'tracking'   => k86_get_setting( 'amazon_tracking' ),
		),

	);

}

/**
 * Lấy hồ sơ Shopee.
 *
 * @return array
 */
function k86_get_shopee_profile() {

	$profiles = k86_get_affiliate_profiles();

	return $profiles['shopee'];

}

/**
 * Lấy hồ sơ TikTok Shop.
 *
 * @return array
 */
function k86_get_tiktok_profile() {

	$profiles = k86_get_affiliate_profiles();

	return $profiles['tiktok'];

}
/**
 * Lấy hồ sơ Lazada.
 *
 * @return array
 */
function k86_get_lazada_profile() {

	$profiles = k86_get_affiliate_profiles();

	return $profiles['lazada'];

}

/**
 * Lấy hồ sơ Amazon.
 *
 * @return array
 */
function k86_get_amazon_profile() {

	$profiles = k86_get_affiliate_profiles();

	return $profiles['amazon'];

}

/*
|--------------------------------------------------------------------------
| Affiliate Behavior API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có mở liên kết ở tab mới hay không.
 *
 * @return bool
 */
function k86_open_new_tab() {

	return (bool) k86_get_setting( 'open_new_tab', 1 );

}

/**
 * Lấy thuộc tính rel cho liên kết Affiliate.
 *
 * @return string
 */
function k86_get_rel_attributes() {

	$rel = array();

	if ( k86_get_setting( 'rel_nofollow', 1 ) ) {
		$rel[] = 'nofollow';
	}

	if ( k86_get_setting( 'rel_sponsored', 1 ) ) {
		$rel[] = 'sponsored';
	}

	if ( k86_get_setting( 'rel_noopener', 1 ) ) {
		$rel[] = 'noopener';
	}

	return implode( ' ', $rel );

}
/*
|--------------------------------------------------------------------------
| Security API
|--------------------------------------------------------------------------
*/

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
 * @param string $value
 * @return string
 */
function k86_clean( $value ) {

	return sanitize_text_field( $value );

}

/**
 * Làm sạch URL.
 *
 * @param string $url
 * @return string
 */
function k86_clean_url( $url ) {

	return esc_url_raw( $url );

}

/**
 * Làm sạch nội dung textarea.
 *
 * @param string $value
 * @return string
 */
function k86_clean_textarea( $value ) {

	return sanitize_textarea_field( $value );

}

/**
 * Chuyển giá trị về số nguyên dương.
 *
 * @param mixed $value
 * @return int
 */
function k86_clean_int( $value ) {

	return absint( $value );

}

/**
 * Kiểm tra Nonce.
 *
 * @param string $action
 * @param string $name
 * @return void
 */
function k86_verify_nonce( $action, $name = 'k86_nonce' ) {

	check_admin_referer(
		$action,
		$name
	);

}
/*
|--------------------------------------------------------------------------
| Framework API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Plugin đã sẵn sàng.
 *
 * @return bool
 */
function k86_is_ready() {

	return did_action( 'k86_framework_ready' ) > 0;

}

/**
 * Lấy phiên bản Plugin.
 *
 * @return string
 */
function k86_get_version() {

	return K86_PRO_VERSION;

}

/**
 * Lấy đường dẫn Plugin.
 *
 * @return string
 */
function k86_get_plugin_path() {

	return K86_PRO_PATH;

}

/**
 * Lấy URL Plugin.
 *
 * @return string
 */
function k86_get_plugin_url() {

	return K86_PRO_URL;

}

/**
 * Lấy URL thư mục Assets.
 *
 * @return string
 */
function k86_get_assets_url() {

	return K86_PRO_ASSETS;

}
/*
|--------------------------------------------------------------------------
| Framework Hooks
|--------------------------------------------------------------------------
|
| Các Module mở rộng nên Hook thông qua các Action
| và Filter của K86 Pro thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Framework API đã sẵn sàng.
 */
do_action( 'k86_functions_loaded' );

/**
 * Filter toàn bộ cài đặt K86 Pro.
 */
function k86_filter_settings( $settings ) {

	return apply_filters(
		'k86_settings',
		$settings
	);

}

/**
 * Filter dữ liệu Product.
 */
function k86_filter_product( $product ) {

	return apply_filters(
		'k86_product',
		$product
	);

}

/**
 * Filter danh sách Product.
 */
function k86_filter_products( $products ) {

	return apply_filters(
		'k86_products',
		$products
	);

}
