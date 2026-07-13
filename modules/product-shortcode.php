/*
|--------------------------------------------------------------------------
| Product Shortcode Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy cài đặt Product Box.
 *
 * @return array
 */
function k86_get_product_box_settings() {

	$settings = k86_get_settings();

	return wp_parse_args(
		$settings,
		array(
			'show_product_box' => 1,
			'show_cta'         => 1,
			'show_icon_bar'    => 1,
			'show_engagement'  => 1,
		)
	);

}

/**
 * Kiểm tra Product Box có được bật.
 *
 * @return bool
 */
function k86_product_box_enabled() {

	$settings = k86_get_product_box_settings();

	return ! empty(
		$settings['show_product_box']
	);

}
/*
|--------------------------------------------------------------------------
| Product Renderer
|--------------------------------------------------------------------------
*/

/**
 * Chuẩn bị dữ liệu Product trước khi hiển thị.
 *
 * @param object $product
 * @return object|null
 */
function k86_prepare_product_box( $product ) {

	if ( empty( $product ) ) {
		return null;
	}

	if ( function_exists( 'k86_prepare_product' ) ) {
		$product = k86_prepare_product( $product );
	}

	return apply_filters(
		'k86_prepare_product_box',
		$product
	);

}

/**
 * Kiểm tra Product hợp lệ để hiển thị.
 *
 * @param object $product
 * @return bool
 */
function k86_can_render_product_box( $product ) {

	if ( ! k86_product_box_enabled() ) {
		return false;
	}

	if ( empty( $product ) ) {
		return false;
	}

	if (
		function_exists( 'k86_is_valid_product' ) &&
		! k86_is_valid_product( $product )
	) {
		return false;
	}

	return true;

}
/*
|--------------------------------------------------------------------------
| CTA Integration
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị CTA của Product Box.
 *
 * @param object $product
 * @return string
 */
function k86_render_product_cta_section( $product ) {

	if ( empty( $product ) ) {
		return '';
	}

	$settings = k86_get_product_box_settings();

	if ( empty( $settings['show_cta'] ) ) {
		return '';
	}

	if ( ! function_exists( 'k86_render_product_cta' ) ) {
		return '';
	}

	return apply_filters(
		'k86_product_cta_section',
		k86_render_product_cta( $product ),
		$product
	);

}

/**
 * Kiểm tra Product Box có CTA hay không.
 *
 * @param object $product
 * @return bool
 */
function k86_has_product_cta( $product ) {

	return '' !== k86_render_product_cta_section( $product );

}
/*
|--------------------------------------------------------------------------
| Icon Bar Integration
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Icon Bar trong Product Box.
 *
 * @return string
 */
function k86_render_product_icon_bar() {

	$settings = k86_get_product_box_settings();

	if ( empty( $settings['show_icon_bar'] ) ) {
		return '';
	}

	if ( ! function_exists( 'k86_display_icon_bar' ) ) {
		return '';
	}

	return apply_filters(
		'k86_product_icon_bar',
		k86_display_icon_bar()
	);

}

/**
 * Kiểm tra Product Box có Icon Bar hay không.
 *
 * @return bool
 */
function k86_has_product_icon_bar() {

	return '' !== k86_render_product_icon_bar();

}
/*
|--------------------------------------------------------------------------
| Engagement Integration
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Engagement trong Product Box.
 *
 * @return string
 */
function k86_render_product_engagement() {

	$settings = k86_get_product_box_settings();

	if ( empty( $settings['show_engagement'] ) ) {
		return '';
	}

	if ( ! function_exists( 'k86_render_post_engagement' ) ) {
		return '';
	}

	return apply_filters(
		'k86_product_engagement',
		k86_render_post_engagement()
	);

}

/**
 * Kiểm tra Product Box có Engagement hay không.
 *
 * @return bool
 */
function k86_has_product_engagement() {

	return '' !== k86_render_product_engagement();

}
/*
|--------------------------------------------------------------------------
| Product Box Layout Builder
|--------------------------------------------------------------------------
*/

/**
 * Xây dựng bố cục Product Box.
 *
 * @param object $product
 * @return string
 */
function k86_build_product_layout( $product ) {

	if ( ! k86_can_render_product_box( $product ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-box">

		<?php
		/**
		 * Nội dung Product.
		 * HTML chi tiết sẽ được hoàn thiện ở Template Engine.
		 */
		do_action( 'k86_product_box_header', $product );

		echo k86_render_product_cta_section( $product );

		echo k86_render_product_icon_bar();

		echo k86_render_product_engagement();

		do_action( 'k86_product_box_footer', $product );
		?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Shortcode Output API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Product Box thông qua Shortcode.
 *
 * @param array $atts Thuộc tính shortcode.
 * @return string
 */
function k86_product_shortcode( $atts = array() ) {

	$atts = shortcode_atts(
		array(
			'id' => 0,
		),
		$atts,
		'k86_box'
	);

	$product = k86_get_product(
		absint( $atts['id'] )
	);

	if ( ! k86_can_render_product_box( $product ) ) {
		return '';
	}

	return apply_filters(
		'k86_product_shortcode_output',
		k86_build_product_layout( $product ),
		$product,
		$atts
	);

}

/**
 * Đăng ký Shortcode.
 */
add_shortcode(
	'k86_box',
	'k86_product_shortcode'
);
/*
|--------------------------------------------------------------------------
| Product Shortcode Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Product Box cuối cùng.
 *
 * @param array $atts Thuộc tính shortcode.
 * @return string
 */
function k86_render_product_shortcode( $atts = array() ) {

	return apply_filters(
		'k86_render_product_shortcode',
		k86_product_shortcode( $atts ),
		$atts
	);

}

/**
 * Framework Product Shortcode đã sẵn sàng.
 */
do_action( 'k86_product_shortcode_ready' );
