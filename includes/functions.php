<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Includes: Helper Functions
 * Version: 1.6.0.1
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
 * Lấy sản phẩm theo ID.
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
| Product Query API
|--------------------------------------------------------------------------
*/

/**
 * Lấy sản phẩm theo Slug.
 *
 * @param string $slug
 * @return object|null
 */
function k86_get_product_by_slug( $slug ) {

	global $wpdb;

	return $wpdb->get_row(
		$wpdb->prepare(
			'SELECT * FROM ' . k86_get_table() . ' WHERE slug = %s LIMIT 1',
			sanitize_title( $slug )
		)
	);

}

/**
 * Lấy toàn bộ sản phẩm đang hoạt động.
 *
 * @return array
 */
function k86_get_active_products() {

	global $wpdb;

	return $wpdb->get_results(
		"SELECT * FROM " . k86_get_table() . " WHERE status = 'active' ORDER BY id DESC"
	);

}

/**
 * Lấy toàn bộ sản phẩm tạm ẩn.
 *
 * @return array
 */
function k86_get_inactive_products() {

	global $wpdb;

	return $wpdb->get_results(
		"SELECT * FROM " . k86_get_table() . " WHERE status = 'inactive' ORDER BY id DESC"
	);

}
/*
|--------------------------------------------------------------------------
| Product Brand API
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ sản phẩm theo thương hiệu.
 *
 * @param string $brand
 * @return array
 */
function k86_get_products_by_brand( $brand ) {

	global $wpdb;

	return $wpdb->get_results(
		$wpdb->prepare(
			'SELECT * FROM ' . k86_get_table() . ' WHERE brand = %s ORDER BY id DESC',
			sanitize_text_field( $brand )
		)
	);

}

/**
 * Kiểm tra sản phẩm đang hoạt động.
 *
 * @param object $product
 * @return bool
 */
function k86_is_product_active( $product ) {

	if ( empty( $product ) || ! is_object( $product ) ) {
		return false;
	}

	return isset( $product->status ) && 'active' === $product->status;

}

/**
 * Kiểm tra sản phẩm đang tạm ẩn.
 *
 * @param object $product
 * @return bool
 */
function k86_is_product_inactive( $product ) {

	if ( empty( $product ) || ! is_object( $product ) ) {
		return false;
	}

	return isset( $product->status ) && 'inactive' === $product->status;

}
/*
|--------------------------------------------------------------------------
| Product Format API
|--------------------------------------------------------------------------
*/

/**
 * Chuẩn hóa dữ liệu sản phẩm.
 *
 * @param object $product
 * @return object|null
 */
function k86_format_product( $product ) {

	if ( empty( $product ) || ! is_object( $product ) ) {
		return null;
	}

	$product->price_number = (float) preg_replace(
		'/[^0-9]/',
		'',
		$product->price
	);

	$product->sale_price_number = (float) preg_replace(
		'/[^0-9]/',
		'',
		$product->sale_price
	);

	$product->discount_percent = 0;

	$product->saving_money = 0;

	if (
		$product->sale_price_number > 0 &&
		$product->sale_price_number < $product->price_number
	) {

		$product->discount_percent = round(
			(
				(
					$product->price_number -
					$product->sale_price_number
				)
				/
				$product->price_number
			) * 100
		);

		$product->saving_money =
			$product->price_number -
			$product->sale_price_number;

	}

	return $product;

}
/*
|--------------------------------------------------------------------------
| Product Helper API
|--------------------------------------------------------------------------
*/

/**
 * Định dạng giá hiển thị.
 *
 * @param float|int|string $price
 * @return string
 */
function k86_format_price( $price ) {

	$price = (float) preg_replace(
		'/[^0-9]/',
		'',
		(string) $price
	);

	return number_format(
		$price,
		0,
		',',
		'.'
	) . ' ₫';

}

/**
 * Kiểm tra sản phẩm có ảnh.
 *
 * @param object $product
 * @return bool
 */
function k86_has_product_image( $product ) {

	return ! empty( $product->image );

}

/**
 * Kiểm tra sản phẩm có thương hiệu.
 *
 * @param object $product
 * @return bool
 */
function k86_has_product_brand( $product ) {

	return ! empty( $product->brand );

}

/**
 * Kiểm tra sản phẩm có giá khuyến mãi.
 *
 * @param object $product
 * @return bool
 */
function k86_has_sale_price( $product ) {

	if ( empty( $product ) || ! is_object( $product ) ) {
		return false;
	}

	$product = k86_format_product( $product );

	return (
		$product->sale_price_number > 0 &&
		$product->sale_price_number < $product->price_number
	);

}
/*
|--------------------------------------------------------------------------
| Product Filter API
|--------------------------------------------------------------------------
*/

/**
 * Lọc dữ liệu một sản phẩm.
 *
 * @param object $product
 * @return object
 */
function k86_prepare_product( $product ) {

	$product = k86_format_product( $product );

	return apply_filters(
		'k86_prepare_product',
		$product
	);

}

/**
 * Lọc danh sách sản phẩm.
 *
 * @param array $products
 * @return array
 */
function k86_prepare_products( $products ) {

	if ( empty( $products ) ) {
		return array();
	}

	foreach ( $products as $key => $product ) {
		$products[ $key ] = k86_prepare_product( $product );
	}

	return apply_filters(
		'k86_prepare_products',
		$products
	);

}

/**
 * Kiểm tra sản phẩm hợp lệ.
 *
 * @param mixed $product
 * @return bool
 */
function k86_is_valid_product( $product ) {

	return is_object( $product ) && ! empty( $product->id );

}
/*
|--------------------------------------------------------------------------
| Product Statistics API
|--------------------------------------------------------------------------
*/

/**
 * Đếm tổng số sản phẩm.
 *
 * @return int
 */
function k86_count_products() {

	global $wpdb;

	return (int) $wpdb->get_var(
		'SELECT COUNT(*) FROM ' . k86_get_table()
	);

}

/**
 * Đếm sản phẩm đang hoạt động.
 *
 * @return int
 */
function k86_count_active_products() {

	global $wpdb;

	return (int) $wpdb->get_var(
		"SELECT COUNT(*) FROM " . k86_get_table() . " WHERE status = 'active'"
	);

}

/**
 * Đếm sản phẩm tạm ẩn.
 *
 * @return int
 */
function k86_count_inactive_products() {

	global $wpdb;

	return (int) $wpdb->get_var(
		"SELECT COUNT(*) FROM " . k86_get_table() . " WHERE status = 'inactive'"
	);

}

/**
 * Lấy sản phẩm mới nhất.
 *
 * @return object|null
 */
function k86_get_latest_product() {

	global $wpdb;

	return $wpdb->get_row(
		'SELECT * FROM ' . k86_get_table() . ' ORDER BY id DESC LIMIT 1'
	);

}
/*
|--------------------------------------------------------------------------
| Product Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên sử dụng API và Hook thay vì truy cập
| trực tiếp vào Database.
|
*/

/**
 * Thông báo Product Engine đã sẵn sàng.
 */
do_action( 'k86_product_engine_loaded' );

/**
 * Filter dữ liệu sản phẩm sau khi chuẩn hóa.
 *
 * @param object $product
 * @return object
 */
function k86_product_output( $product ) {

	return apply_filters(
		'k86_product_output',
		$product
	);

}

/**
 * Filter danh sách sản phẩm sau khi chuẩn hóa.
 *
 * @param array $products
 * @return array
 */
function k86_products_output( $products ) {

	return apply_filters(
		'k86_products_output',
		$products
	);

}
function k86_registry() {
    return $GLOBALS['k86_registry'] ?? null;
}

function k86_container() {
    $registry = k86_registry();

    return $registry ? $registry->get( 'container' ) : null;
}

function k86_engine() {
    $registry = k86_registry();

    return $registry ? $registry->get( 'engine_manager' ) : null;
}
