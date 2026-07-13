<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: CTA Engine
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| CTA Engine
|--------------------------------------------------------------------------
|
| Module này chịu trách nhiệm tạo toàn bộ nút CTA
| cho Product Box.
|
| Shopee
| TikTok Shop
| Lazada
| Amazon
|
*/

/**
 * Kiểm tra CTA có được bật hay không.
 *
 * @param string $platform
 * @return bool
 */
function k86_cta_enabled( $platform ) {

	$settings = k86_get_settings();

	switch ( strtolower( $platform ) ) {

		case 'shopee':
			return ! empty( $settings['show_shopee'] );

		case 'tiktok':
			return ! empty( $settings['show_tiktok'] );

		case 'lazada':
			return ! empty( $settings['show_lazada'] );

		case 'amazon':
			return ! empty( $settings['show_amazon'] );

		default:
			return false;

	}

}
/*
|--------------------------------------------------------------------------
| CTA Configuration
|--------------------------------------------------------------------------
*/

/**
 * Lấy cấu hình CTA theo nền tảng.
 *
 * @param string $platform
 * @return array
 */
function k86_get_cta_config( $platform ) {

	$config = array(

		'shopee' => array(
			'label' => '🛒 Shopee',
			'class' => 'k86-btn-shopee',
		),

		'tiktok' => array(
			'label' => '🎵 TikTok Shop',
			'class' => 'k86-btn-tiktok',
		),

		'lazada' => array(
			'label' => '🟦 Lazada',
			'class' => 'k86-btn-lazada',
		),

		'amazon' => array(
			'label' => '🛍 Amazon',
			'class' => 'k86-btn-amazon',
		),

	);

	$platform = strtolower( $platform );

	if ( ! isset( $config[ $platform ] ) ) {
		return array();
	}

	return apply_filters(
		'k86_cta_config',
		$config[ $platform ],
		$platform
	);

}
/*
|--------------------------------------------------------------------------
| CTA Button Renderer
|--------------------------------------------------------------------------
*/

/**
 * Tạo một nút CTA.
 *
 * @param object $product
 * @param string $platform
 * @return string
 */
function k86_render_cta_button( $product, $platform ) {

	if ( ! k86_cta_enabled( $platform ) ) {
		return '';
	}

	$link = k86_get_product_link( $product, $platform );

	if ( empty( $link ) ) {
		return '';
	}

	$config = k86_get_cta_config( $platform );

	if ( empty( $config ) ) {
		return '';
	}

	$target = esc_attr( k86_get_link_target() );
	$rel    = esc_attr( k86_get_link_rel() );

	ob_start();
	?>

	<a
		class="k86-cta-button <?php echo esc_attr( $config['class'] ); ?>"
		href="<?php echo esc_url( $link ); ?>"
		target="<?php echo $target; ?>"
		rel="<?php echo $rel; ?>">

		<?php echo esc_html( $config['label'] ); ?>

	</a>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| CTA Group Renderer
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị toàn bộ nhóm nút CTA.
 *
 * @param object $product
 * @return string
 */
function k86_render_cta_buttons( $product ) {

	$platforms = array(
		'shopee',
		'tiktok',
		'lazada',
		'amazon',
	);

	$buttons = '';

	foreach ( $platforms as $platform ) {

		$buttons .= k86_render_cta_button(
			$product,
			$platform
		);

	}

	if ( empty( $buttons ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-cta-group">

		<?php echo $buttons; ?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| CTA Customization API
|--------------------------------------------------------------------------
*/

/**
 * Lấy danh sách nền tảng CTA.
 *
 * @return array
 */
function k86_get_cta_platforms() {

	$platforms = array(
		'shopee',
		'tiktok',
		'lazada',
		'amazon',
	);

	return apply_filters(
		'k86_cta_platforms',
		$platforms
	);

}

/**
 * Lấy tiêu đề nút CTA.
 *
 * @param string $platform
 * @return string
 */
function k86_get_cta_label( $platform ) {

	$config = k86_get_cta_config( $platform );

	if ( empty( $config['label'] ) ) {
		return '';
	}

	return apply_filters(
		'k86_cta_label',
		$config['label'],
		$platform
	);

}

/**
 * Lấy CSS class của nút CTA.
 *
 * @param string $platform
 * @return string
 */
function k86_get_cta_class( $platform ) {

	$config = k86_get_cta_config( $platform );

	if ( empty( $config['class'] ) ) {
		return '';
	}

	return apply_filters(
		'k86_cta_class',
		$config['class'],
		$platform
	);

}
/*
|--------------------------------------------------------------------------
| CTA Output API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có CTA để hiển thị hay không.
 *
 * @param object $product
 * @return bool
 */
function k86_has_cta_buttons( $product ) {

	foreach ( k86_get_cta_platforms() as $platform ) {

		if ( k86_has_product_link( $product, $platform ) ) {
			return true;
		}

	}

	return false;

}

/**
 * Hiển thị CTA hoàn chỉnh.
 *
 * @param object $product
 * @return string
 */
function k86_cta_output( $product ) {

	if ( ! k86_is_valid_product( $product ) ) {
		return '';
	}

	if ( ! k86_has_cta_buttons( $product ) ) {
		return '';
	}

	return apply_filters(
		'k86_cta_output',
		k86_render_cta_buttons( $product ),
		$product
	);

}
/*
|--------------------------------------------------------------------------
| CTA Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào CTA Engine thay vì sửa trực tiếp.
|
*/

/**
 * Thông báo CTA Engine đã sẵn sàng.
 */
do_action( 'k86_cta_engine_loaded' );

/**
 * Filter HTML của một nút CTA.
 *
 * @param string $button
 * @param object $product
 * @param string $platform
 * @return string
 */
function k86_cta_button_output( $button, $product, $platform ) {

	return apply_filters(
		'k86_cta_button_output',
		$button,
		$product,
		$platform
	);

}

/**
 * Filter HTML của toàn bộ nhóm CTA.
 *
 * @param string $html
 * @param object $product
 * @return string
 */
function k86_cta_group_output( $html, $product ) {

	return apply_filters(
		'k86_cta_group_output',
		$html,
		$product
	);

}
/*
|--------------------------------------------------------------------------
| CTA Engine Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị CTA đã được xử lý cuối cùng.
 *
 * @param object $product
 * @return string
 */
function k86_render_product_cta( $product ) {

	if ( ! k86_is_valid_product( $product ) ) {
		return '';
	}

	$html = k86_cta_output( $product );

	return k86_cta_group_output(
		$html,
		$product
	);

}

/**
 * Thông báo CTA Engine đã khởi tạo hoàn tất.
 */
do_action( 'k86_cta_engine_ready' );
