<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Engagement Engine
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Engagement Settings
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra chức năng Engagement có bật hay không.
 *
 * @return bool
 */
function k86_engagement_enabled() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_engagement'] );

}

/**
 * Kiểm tra hiển thị nút Like.
 *
 * @return bool
 */
function k86_show_like_button() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_like'] );

}

/**
 * Kiểm tra hiển thị nút Share.
 *
 * @return bool
 */
function k86_show_share_button() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_share'] );

}
/*
|--------------------------------------------------------------------------
| Reaction API
|--------------------------------------------------------------------------
*/

/**
 * Danh sách các loại tương tác.
 *
 * @return array
 */
function k86_get_reactions() {

	$reactions = array(
		'like'     => '👍 Hữu ích',
		'love'     => '❤️ Yêu thích',
		'thanks'   => '👏 Cảm ơn',
		'wow'      => '🔥 Quá hay',
		'dislike'  => '👎 Không thích',
	);

	return apply_filters(
		'k86_reactions',
		$reactions
	);

}

/**
 * Kiểm tra Reaction có hợp lệ.
 *
 * @param string $reaction
 * @return bool
 */
function k86_is_valid_reaction( $reaction ) {

	return array_key_exists(
		$reaction,
		k86_get_reactions()
	);

}

/**
 * Lấy tên hiển thị của Reaction.
 *
 * @param string $reaction
 * @return string
 */
function k86_get_reaction_label( $reaction ) {

	$reactions = k86_get_reactions();

	return isset( $reactions[ $reaction ] )
		? $reactions[ $reaction ]
		: '';

}
/*
|--------------------------------------------------------------------------
| Reaction Button Renderer
|--------------------------------------------------------------------------
*/

/**
 * Tạo một nút Reaction.
 *
 * @param string $reaction
 * @return string
 */
function k86_render_reaction_button( $reaction ) {

	if ( ! k86_is_valid_reaction( $reaction ) ) {
		return '';
	}

	$label = k86_get_reaction_label( $reaction );

	ob_start();
	?>

	<button
		type="button"
		class="k86-reaction-button k86-reaction-<?php echo esc_attr( $reaction ); ?>"
		data-reaction="<?php echo esc_attr( $reaction ); ?>">

		<?php echo esc_html( $label ); ?>

	</button>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị toàn bộ nhóm Reaction.
 *
 * @return string
 */
function k86_render_reaction_buttons() {

	$html = '';

	foreach ( k86_get_reactions() as $reaction => $label ) {
		$html .= k86_render_reaction_button( $reaction );
	}

	if ( empty( $html ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-reaction-group">

		<?php echo $html; ?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Share Engine
|--------------------------------------------------------------------------
*/

/**
 * Danh sách nền tảng chia sẻ.
 *
 * @return array
 */
function k86_get_share_platforms() {

	$platforms = array(
		'facebook' => 'Facebook',
		'zalo'     => 'Zalo',
		'x'        => 'X',
		'telegram' => 'Telegram',
		'copy'     => 'Copy Link',
	);

	return apply_filters(
		'k86_share_platforms',
		$platforms
	);

}

/**
 * Tạo một nút Share.
 *
 * @param string $platform
 * @return string
 */
function k86_render_share_button( $platform ) {

	$platforms = k86_get_share_platforms();

	if ( ! isset( $platforms[ $platform ] ) ) {
		return '';
	}

	ob_start();
	?>

	<button
		type="button"
		class="k86-share-button k86-share-<?php echo esc_attr( $platform ); ?>"
		data-platform="<?php echo esc_attr( $platform ); ?>">

		<?php echo esc_html( $platforms[ $platform ] ); ?>

	</button>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Share Group Renderer
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị toàn bộ nhóm nút chia sẻ.
 *
 * @return string
 */
function k86_render_share_buttons() {

	$html = '';

	foreach ( k86_get_share_platforms() as $platform => $label ) {

		$html .= k86_render_share_button(
			$platform
		);

	}

	if ( empty( $html ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-share-group">

		<?php echo $html; ?>

	</div>

	<?php

	return ob_get_clean();

}

/**
 * Kiểm tra có nút Share hay không.
 *
 * @return bool
 */
function k86_has_share_buttons() {

	return ! empty(
		k86_get_share_platforms()
	);

}
/*
|--------------------------------------------------------------------------
| Engagement Output API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra có hiển thị Engagement hay không.
 *
 * @return bool
 */
function k86_has_engagement() {

	return (
		k86_show_like_button() ||
		k86_show_share_button()
	);

}

/**
 * Hiển thị toàn bộ khu vực Engagement.
 *
 * @return string
 */
function k86_engagement_output() {

	if ( ! k86_engagement_enabled() ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-engagement">

		<?php

		if ( k86_show_like_button() ) {
			echo k86_render_reaction_buttons();
		}

		if ( k86_show_share_button() ) {
			echo k86_render_share_buttons();
		}

		?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Engagement Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Engagement Engine thay vì
| sửa trực tiếp Core.
|
*/

/**
 * Thông báo Engagement Engine đã sẵn sàng.
 */
do_action( 'k86_engagement_engine_loaded' );

/**
 * Filter HTML của khu vực Engagement.
 *
 * @param string $html
 * @return string
 */
function k86_engagement_filter( $html ) {

	return apply_filters(
		'k86_engagement_output',
		$html
	);

}

/**
 * Hiển thị Engagement sau khi áp dụng Filter.
 *
 * @return string
 */
function k86_render_engagement() {

	return k86_engagement_filter(
		k86_engagement_output()
	);

}
/*
|--------------------------------------------------------------------------
| Engagement Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Engagement cuối cùng.
 *
 * @return string
 */
function k86_render_post_engagement() {

	if ( ! k86_has_engagement() ) {
		return '';
	}

	return k86_render_engagement();

}

/**
 * Thông báo Engagement Engine khởi tạo hoàn tất.
 */
do_action( 'k86_engagement_engine_ready' );
