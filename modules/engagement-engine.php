<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Engagement Engine
 * Version: 2.0.0
 * Status: Development
 * Priority: #1
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
 * Kiểm tra chức năng Engagement.
 */
function k86_engagement_enabled() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_engagement'] );

}

/**
 * Hiển thị Reaction.
 */
function k86_show_like_button() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_like'] );

}

/**
 * Hiển thị Share.
 */
function k86_show_share_button() {

	$settings = k86_get_settings();

	return ! empty( $settings['show_share'] );

}

/**
 * Hiển thị Copy Link.
 */
function k86_show_copy_button() {

	$settings = k86_get_settings();

	if ( isset( $settings['show_copy_link'] ) ) {
		return ! empty( $settings['show_copy_link'] );
	}

	return true;

}

/*
|--------------------------------------------------------------------------
| Reaction API
|--------------------------------------------------------------------------
*/

/**
 * Danh sách Reaction.
 */
function k86_get_reactions() {

	$reactions = array(

		'like' => array(
			'icon'  => '👍',
			'label' => 'Hữu ích',
		),

		'heart' => array(
			'icon'  => '❤️',
			'label' => 'Tim',
		),

		'haha' => array(
			'icon'  => '😂',
			'label' => 'Haha',
		),

		'wow' => array(
			'icon'  => '😮',
			'label' => 'Wow',
		),

		'sad' => array(
			'icon'  => '😢',
			'label' => 'Buồn',
		),

		'angry' => array(
			'icon'  => '😡',
			'label' => 'Không thích',
		),

	);

	return apply_filters(
		'k86_reactions',
		$reactions
	);

}

/**
 * Kiểm tra Reaction.
 */
function k86_is_valid_reaction( $reaction ) {

	return isset(
		k86_get_reactions()[ $reaction ]
	);

}

/**
 * Lấy thông tin Reaction.
 */
function k86_get_reaction( $reaction ) {

	$reactions = k86_get_reactions();

	if ( isset( $reactions[ $reaction ] ) ) {
		return $reactions[ $reaction ];
	}

	return array();

}

/*
|--------------------------------------------------------------------------
| Reaction Renderer
|--------------------------------------------------------------------------
*/

function k86_render_reaction_button( $reaction ) {

	if ( ! k86_is_valid_reaction( $reaction ) ) {
		return '';
	}

	$item = k86_get_reaction( $reaction );

	ob_start();
	?>

	<button
		type="button"
		class="k86-reaction-button k86-reaction-<?php echo esc_attr( $reaction ); ?>"
		data-reaction="<?php echo esc_attr( $reaction ); ?>">

		<span class="k86-reaction-icon">
			<?php echo esc_html( $item['icon'] ); ?>
		</span>

		<span class="k86-reaction-label">
			<?php echo esc_html( $item['label'] ); ?>
		</span>

	</button>

	<?php

	return ob_get_clean();

}

function k86_render_reaction_buttons() {

	$html = '';

	foreach ( k86_get_reactions() as $reaction => $data ) {
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
| Share Manager
|--------------------------------------------------------------------------
*/

function k86_get_share_platforms() {

	$platforms = array(

		'facebook'  => 'Facebook',
		'zalo'      => 'Zalo',
		'x'         => 'X',
		'telegram'  => 'Telegram',
		'messenger' => 'Messenger',
		'email'     => 'Email',

	);

	return apply_filters(
		'k86_share_platforms',
		$platforms
	);

}
/*
|--------------------------------------------------------------------------
| Share Button Renderer
|--------------------------------------------------------------------------
*/

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

/**
 * Hiển thị toàn bộ nhóm Share.
 *
 * @return string
 */
function k86_render_share_buttons() {

	$html = '';

	foreach ( k86_get_share_platforms() as $platform => $label ) {
		$html .= k86_render_share_button( $platform );
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

/*
|--------------------------------------------------------------------------
| Copy Link Manager
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị nút Copy Link.
 *
 * @return string
 */
function k86_render_copy_button() {

	if ( ! k86_show_copy_button() ) {
		return '';
	}

	ob_start();
	?>

	<button
		type="button"
		class="k86-copy-button"
		data-action="copy-link">

		📋 <?php esc_html_e( 'Copy Link', 'k86-pro' ); ?>

	</button>

	<?php

	return ob_get_clean();

}

/*
|--------------------------------------------------------------------------
| Statistics API
|--------------------------------------------------------------------------
*/

/**
 * Giá trị thống kê mặc định.
 *
 * @return array
 */
function k86_get_engagement_statistics() {

	return apply_filters(
		'k86_engagement_statistics',
		array(
			'reactions' => 0,
			'shares'    => 0,
			'copies'    => 0,
		)
	);

}

/*
|--------------------------------------------------------------------------
| Engagement Output API
|--------------------------------------------------------------------------
*/

function k86_has_engagement() {

	return (
		k86_show_like_button() ||
		k86_show_share_button() ||
		k86_show_copy_button()
	);

}

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

		echo k86_render_copy_button();

		?>

	</div>

	<?php

	return ob_get_clean();

}

/*
|--------------------------------------------------------------------------
| Hooks
|--------------------------------------------------------------------------
*/

do_action( 'k86_engagement_engine_loaded' );

function k86_engagement_filter( $html ) {

	return apply_filters(
		'k86_engagement_output',
		$html
	);

}

function k86_render_engagement() {

	return k86_engagement_filter(
		k86_engagement_output()
	);

}

/*
|--------------------------------------------------------------------------
| Final API
|--------------------------------------------------------------------------
*/

function k86_render_post_engagement() {

	if ( ! k86_has_engagement() ) {
		return '';
	}

	return k86_render_engagement();

}
/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
*/

function k86_engagement_enqueue_assets() {

	wp_enqueue_style(
		'k86-engagement',
		K86_PRO_URL . 'assets/css/engagement.css',
		array(),
		K86_PRO_VERSION
	);

	wp_enqueue_script(
		'k86-engagement',
		K86_PRO_URL . 'assets/js/engagement.js',
		array( 'jquery' ),
		K86_PRO_VERSION,
		true
	);

	wp_localize_script(
		'k86-engagement',
		'k86_ajax',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'k86_engagement_nonce' ),
		)
	);

}

add_action(
	'wp_enqueue_scripts',
	'k86_engagement_enqueue_assets'
);
do_action( 'k86_engagement_engine_ready' );
