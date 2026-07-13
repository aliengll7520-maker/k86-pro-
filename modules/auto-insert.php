<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Auto Insert Engine
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Auto Insert Settings
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Auto Insert có được bật hay không.
 *
 * @return bool
 */
function k86_auto_insert_enabled() {

	$settings = k86_get_settings();

	return ! empty( $settings['auto_insert'] );

}

/**
 * Lấy vị trí chèn mặc định.
 *
 * @return string
 */
function k86_get_insert_position() {

	$settings = k86_get_settings();

	if ( empty( $settings['insert_position'] ) ) {
		return 'after_content';
	}

	return sanitize_key(
		$settings['insert_position']
	);

}
/*
|--------------------------------------------------------------------------
| Auto Insert API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có tự động chèn Product Box.
 *
 * @return bool
 */
function k86_auto_insert_product_box() {

	$settings = k86_get_settings();

	return ! empty( $settings['auto_product_box'] );

}

/**
 * Kiểm tra có tự động chèn CTA.
 *
 * @return bool
 */
function k86_auto_insert_cta() {

	$settings = k86_get_settings();

	return ! empty( $settings['auto_cta'] );

}

/**
 * Kiểm tra có tự động chèn Engagement.
 *
 * @return bool
 */
function k86_auto_insert_engagement() {

	$settings = k86_get_settings();

	return ! empty( $settings['auto_engagement'] );

}
/*
|--------------------------------------------------------------------------
| Content Builder
|--------------------------------------------------------------------------
*/

/**
 * Tạo nội dung Product Box.
 *
 * @param object $product
 * @return string
 */
function k86_build_product_box( $product ) {

	if ( empty( $product ) ) {
		return '';
	}

	if ( ! function_exists( 'k86_render_product_box' ) ) {
		return '';
	}

	return k86_render_product_box( $product );

}

/**
 * Tạo nội dung CTA.
 *
 * @param object $product
 * @return string
 */
function k86_build_cta( $product ) {

	if ( empty( $product ) ) {
		return '';
	}

	if ( ! function_exists( 'k86_render_product_cta' ) ) {
		return '';
	}

	return k86_render_product_cta( $product );

}

/**
 * Tạo nội dung Engagement.
 *
 * @return string
 */
function k86_build_engagement() {

	if ( ! function_exists( 'k86_render_post_engagement' ) ) {
		return '';
	}

	return k86_render_post_engagement();

}
/*
|--------------------------------------------------------------------------
| Content Assembler
|--------------------------------------------------------------------------
*/

/**
 * Ghép toàn bộ nội dung tự động.
 *
 * @param object $product
 * @return string
 */
function k86_build_auto_content( $product ) {

	$content = '';

	if ( k86_auto_insert_product_box() ) {
		$content .= k86_build_product_box( $product );
	}

	if ( k86_auto_insert_cta() ) {
		$content .= k86_build_cta( $product );
	}

	if ( k86_auto_insert_engagement() ) {
		$content .= k86_build_engagement();
	}

	return $content;

}

/**
 * Kiểm tra có nội dung để chèn hay không.
 *
 * @param object $product
 * @return bool
 */
function k86_has_auto_content( $product ) {

	return ! empty(
		k86_build_auto_content( $product )
	);

}
/*
|--------------------------------------------------------------------------
| WordPress Content Filter
|--------------------------------------------------------------------------
*/

/**
 * Tự động chèn nội dung vào bài viết.
 *
 * @param string $content
 * @return string
 */
function k86_auto_insert_content( $content ) {

	if ( ! is_singular( 'post' ) ) {
		return $content;
	}

	if ( ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}

	if ( ! k86_auto_insert_enabled() ) {
		return $content;
	}

	/**
	 * Giai đoạn đầu chưa xác định Product tương ứng.
	 * Sẽ hoàn thiện ở các hạng mục tiếp theo.
	 */
	$product = null;

	$auto_content = k86_build_auto_content( $product );

	if ( empty( $auto_content ) ) {
		return $content;
	}

	switch ( k86_get_insert_position() ) {

		case 'before_content':
			return $auto_content . $content;

		case 'after_content':
		default:
			return $content . $auto_content;

	}

}
/*
|--------------------------------------------------------------------------
| Auto Insert Hooks
|--------------------------------------------------------------------------
*/

/**
 * Lọc nội dung trước khi chèn.
 *
 * @param string $content
 * @return string
 */
function k86_auto_insert_filter( $content ) {

	return apply_filters(
		'k86_auto_insert_content',
		$content
	);

}

/**
 * Chạy Auto Insert Engine.
 *
 * @param string $content
 * @return string
 */
function k86_run_auto_insert( $content ) {

	$content = k86_auto_insert_content( $content );

	return k86_auto_insert_filter( $content );

}

/**
 * Kiểm tra Auto Insert đã sẵn sàng.
 *
 * @return bool
 */
function k86_auto_insert_ready() {

	return did_action( 'k86_auto_insert_loaded' ) > 0;

}
/*
|--------------------------------------------------------------------------
| Auto Insert Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Auto Insert Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Auto Insert Engine đã sẵn sàng.
 */
do_action( 'k86_auto_insert_loaded' );

/**
 * Filter nội dung sau khi Auto Insert hoàn tất.
 *
 * @param string $content
 * @return string
 */
function k86_auto_insert_output( $content ) {

	return apply_filters(
		'k86_auto_insert_output',
		$content
	);

}

/**
 * Hiển thị nội dung Auto Insert cuối cùng.
 *
 * @param string $content
 * @return string
 */
function k86_render_auto_insert( $content ) {

	return k86_auto_insert_output(
		k86_run_auto_insert( $content )
	);

}
/*
|--------------------------------------------------------------------------
| Auto Insert Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị nội dung Auto Insert cuối cùng.
 *
 * @param string $content
 * @return string
 */
function k86_auto_insert( $content ) {

	if ( ! k86_auto_insert_enabled() ) {
		return $content;
	}

	return k86_render_auto_insert( $content );

}

/**
 * Thông báo Auto Insert Engine đã khởi tạo hoàn tất.
 */
do_action( 'k86_auto_insert_ready' );
