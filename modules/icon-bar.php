<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Icon Bar Engine
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Icon Bar Settings
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Icon Bar có được bật hay không.
 *
 * @return bool
 */
function k86_icon_bar_enabled() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_icon_bar'] );

}

/**
 * Lấy danh sách icon mặc định.
 *
 * @return array
 */
function k86_get_icon_bar_items() {

	$items = array(
		'like',
		'love',
		'dislike',
		'share',
		'copy',
	);

	return apply_filters(
		'k86_icon_bar_items',
		$items
	);

}
/*
|--------------------------------------------------------------------------
| Icon Configuration API
|--------------------------------------------------------------------------
*/

/**
 * Lấy cấu hình của một icon.
 *
 * @param string $item
 * @return array
 */
function k86_get_icon_config( $item ) {

	$icons = array(

		'like' => array(
			'label' => '👍 Hữu ích',
			'class' => 'k86-icon-like',
		),

		'love' => array(
			'label' => '❤️ Yêu thích',
			'class' => 'k86-icon-love',
		),

		'dislike' => array(
			'label' => '👎 Không thích',
			'class' => 'k86-icon-dislike',
		),

		'share' => array(
			'label' => '📤 Chia sẻ',
			'class' => 'k86-icon-share',
		),

		'copy' => array(
			'label' => '🔗 Copy Link',
			'class' => 'k86-icon-copy',
		),

	);

	if ( ! isset( $icons[ $item ] ) ) {
		return array();
	}

	return apply_filters(
		'k86_icon_config',
		$icons[ $item ],
		$item
	);

}
/*
|--------------------------------------------------------------------------
| Icon Renderer
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị một icon.
 *
 * @param string $item
 * @return string
 */
function k86_render_icon( $item ) {

	$config = k86_get_icon_config( $item );

	if ( empty( $config ) ) {
		return '';
	}

	ob_start();
	?>

	<button
		type="button"
		class="k86-icon-button <?php echo esc_attr( $config['class'] ); ?>"
		data-action="<?php echo esc_attr( $item ); ?>">

		<span class="k86-icon-label">
			<?php echo esc_html( $config['label'] ); ?>
		</span>

	</button>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị toàn bộ thanh Icon.
 *
 * @return string
 */
function k86_render_icon_bar() {

	$html = '';

	foreach ( k86_get_icon_bar_items() as $item ) {
		$html .= k86_render_icon( $item );
	}

	if ( empty( $html ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-icon-bar">

		<?php echo $html; ?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Icon Output API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có Icon Bar hay không.
 *
 * @return bool
 */
function k86_has_icon_bar() {

	return ! empty(
		k86_get_icon_bar_items()
	);

}

/**
 * Hiển thị Icon Bar.
 *
 * @return string
 */
function k86_icon_bar_output() {

	if ( ! k86_icon_bar_enabled() ) {
		return '';
	}

	if ( ! k86_has_icon_bar() ) {
		return '';
	}

	return apply_filters(
		'k86_icon_bar_output',
		k86_render_icon_bar()
	);

}
/*
|--------------------------------------------------------------------------
| Icon Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Icon Bar Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Icon Bar Engine đã sẵn sàng.
 */
do_action( 'k86_icon_bar_loaded' );

/**
 * Filter HTML của Icon Bar.
 *
 * @param string $html
 * @return string
 */
function k86_icon_bar_filter( $html ) {

	return apply_filters(
		'k86_icon_bar_html',
		$html
	);

}

/**
 * Hiển thị Icon Bar sau khi áp dụng Filter.
 *
 * @return string
 */
function k86_render_icon_bar_output() {

	return k86_icon_bar_filter(
		k86_icon_bar_output()
	);

}
/*
|--------------------------------------------------------------------------
| Icon Position API
|--------------------------------------------------------------------------
*/

/**
 * Lấy vị trí hiển thị Icon Bar.
 *
 * @return string
 */
function k86_get_icon_bar_position() {

	$settings = k86_get_settings();

	if ( empty( $settings['icon_bar_position'] ) ) {
		return 'after_content';
	}

	return sanitize_key(
		$settings['icon_bar_position']
	);

}

/**
 * Kiểm tra có hiển thị trong Product Box.
 *
 * @return bool
 */
function k86_icon_bar_in_product() {

	$settings = k86_get_settings();

	return ! empty(
		$settings['icon_bar_product']
	);

}

/**
 * Kiểm tra có hiển thị trong bài viết.
 *
 * @return bool
 */
function k86_icon_bar_in_post() {

	$settings = k86_get_settings();

	return ! empty(
		$settings['icon_bar_post']
	);

}
/*
|--------------------------------------------------------------------------
| Icon Bar Final Hooks
|--------------------------------------------------------------------------
|
| Các module khác có thể Hook vào Icon Bar Engine
| để mở rộng mà không cần sửa Core.
|
*/

/**
 * Thông báo Icon Bar Engine đã khởi tạo.
 */
do_action( 'k86_icon_bar_ready' );

/**
 * Filter toàn bộ Icon Bar.
 *
 * @param string $html
 * @return string
 */
function k86_icon_bar_final_output( $html ) {

	return apply_filters(
		'k86_icon_bar_final_output',
		$html
	);

}

/**
 * Hiển thị Icon Bar cuối cùng.
 *
 * @return string
 */
function k86_render_final_icon_bar() {

	$html = k86_render_icon_bar_output();

	return k86_icon_bar_final_output(
		$html
	);

}
/*
|--------------------------------------------------------------------------
| Icon Bar Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Icon Bar cuối cùng.
 *
 * @return string
 */
function k86_display_icon_bar() {

	if ( ! k86_icon_bar_enabled() ) {
		return '';
	}

	return k86_render_final_icon_bar();

}

/**
 * Thông báo Icon Bar Engine khởi tạo hoàn tất.
 */
do_action( 'k86_icon_bar_engine_ready' );
