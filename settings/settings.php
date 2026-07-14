<?php
/**
 * K86 Pro
 *
 * Settings Engine
 *
 * @package K86Pro
 * @since 1.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Default Settings
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ cài đặt mặc định.
 *
 * @return array
 */
function k86_get_default_settings() {

	$defaults = array(

		/*
		|--------------------------------------------------------------------------
		| Product Box
		|--------------------------------------------------------------------------
		*/

		'show_product_box' => 1,
		'show_shopee'      => 1,
		'show_tiktok'      => 1,
		'show_lazada'      => 1,
		'show_amazon'      => 1,
		'show_discount'    => 1,
		'show_save_money'  => 1,
		'show_description' => 1,

		/*
		|--------------------------------------------------------------------------
		| CTA
		|--------------------------------------------------------------------------
		*/

		'show_cta'         => 1,
		'link_target'      => '_blank',
		'link_rel'         => 'nofollow sponsored',

		/*
		|--------------------------------------------------------------------------
		| Engagement
		|--------------------------------------------------------------------------
		*/

		'show_engagement'  => 1,
		'show_like'        => 1,
		'show_share'       => 1,
		'show_comment'     => 1,

		/*
		|--------------------------------------------------------------------------
		| Icon Bar
		|--------------------------------------------------------------------------
		*/

		'show_icon_bar'     => 1,
		'icon_bar_post'     => 1,
		'icon_bar_product'  => 1,
		'icon_bar_position' => 'after_content',

		/*
		|--------------------------------------------------------------------------
		| Auto Insert
		|--------------------------------------------------------------------------
		*/

		'auto_insert'      => 1,
		'insert_position'  => 'after_content',

	);

	return apply_filters(
		'k86_default_settings',
		$defaults
	);

}

/*
|--------------------------------------------------------------------------
| Settings Loader
|--------------------------------------------------------------------------
*/

/**
 * Lấy cài đặt Plugin.
 *
 * @return array
 */
function k86_get_settings() {

	$options = get_option(
		'k86_settings',
		array()
	);

	if ( ! is_array( $options ) ) {
		$options = array();
	}

	return wp_parse_args(
		$options,
		k86_get_default_settings()
	);

}
/*
|--------------------------------------------------------------------------
| Settings API
|--------------------------------------------------------------------------
*/

/**
 * Lấy một cài đặt.
 *
 * @param string $key
 * @param mixed  $default
 * @return mixed
 */
function k86_get_setting( $key, $default = null ) {

	$settings = k86_get_settings();

	if ( array_key_exists( $key, $settings ) ) {
		return $settings[ $key ];
	}

	return $default;

}

/**
 * Cập nhật một cài đặt.
 *
 * @param string $key
 * @param mixed  $value
 * @return bool
 */
function k86_update_setting( $key, $value ) {

	$settings = k86_get_settings();

	$settings[ $key ] = $value;

	return update_option(
		'k86_settings',
		$settings
	);

}

/**
 * Khôi phục cài đặt mặc định.
 *
 * @return bool
 */
function k86_reset_settings() {

	return update_option(
		'k86_settings',
		k86_get_default_settings()
	);

}

/*
|--------------------------------------------------------------------------
| Register Settings
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký Settings API.
 *
 * @return void
 */
function k86_register_settings() {

	register_setting(
		'k86_settings_group',
		'k86_settings',
		'k86_sanitize_settings'
	);

	add_settings_section(
		'k86_general_section',
		__( 'Cài đặt chung', 'k86-pro' ),
		'__return_false',
		'k86-settings'
	);

}

add_action(
	'admin_init',
	'k86_register_settings'
);
/*
|--------------------------------------------------------------------------
| Register Settings Fields
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký các trường cài đặt.
 *
 * @return void
 */
function k86_register_settings_fields() {

	add_settings_field(
		'show_product_box',
		__( 'Product Box', 'k86-pro' ),
		'k86_render_checkbox_field',
		'k86-settings',
		'k86_general_section',
		array(
			'key'   => 'show_product_box',
			'label' => __( 'Hiển thị Product Box', 'k86-pro' ),
		)
	);

	add_settings_field(
		'show_cta',
		__( 'CTA', 'k86-pro' ),
		'k86_render_checkbox_field',
		'k86-settings',
		'k86_general_section',
		array(
			'key'   => 'show_cta',
			'label' => __( 'Hiển thị nút CTA', 'k86-pro' ),
		)
	);

	add_settings_field(
		'show_engagement',
		__( 'Engagement', 'k86-pro' ),
		'k86_render_checkbox_field',
		'k86-settings',
		'k86_general_section',
		array(
			'key'   => 'show_engagement',
			'label' => __( 'Hiển thị Like / Share', 'k86-pro' ),
		)
	);

	add_settings_field(
		'show_icon_bar',
		__( 'Icon Bar', 'k86-pro' ),
		'k86_render_checkbox_field',
		'k86-settings',
		'k86_general_section',
		array(
			'key'   => 'show_icon_bar',
			'label' => __( 'Hiển thị Icon Bar', 'k86-pro' ),
		)
	);

}

add_action(
	'admin_init',
	'k86_register_settings_fields'
);

/*
|--------------------------------------------------------------------------
| Field Renderer
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Checkbox.
 *
 * @param array $args Thông tin trường.
 * @return void
 */
function k86_render_checkbox_field( $args ) {

	$key   = isset( $args['key'] ) ? $args['key'] : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$value = k86_get_setting( $key, 0 );

	?>

	<label>

		<input
			type="checkbox"
			name="k86_settings[<?php echo esc_attr( $key ); ?>]"
			value="1"
			<?php checked( (int) $value, 1 ); ?>
		/>

		<?php echo esc_html( $label ); ?>

	</label>

	<?php

}
/*
|--------------------------------------------------------------------------
| Settings Page
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị trang Cài đặt K86 Pro.
 *
 * @return void
 */
function k86_render_settings_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	?>

	<div class="wrap">

		<h1><?php esc_html_e( 'K86 Pro Settings', 'k86-pro' ); ?></h1>

		<form method="post" action="options.php">

			<?php

			settings_fields( 'k86_settings_group' );

			do_settings_sections( 'k86-settings' );

			submit_button(
				__( 'Lưu thay đổi', 'k86-pro' )
			);

			?>

		</form>

	</div>

	<?php

}

/*
|--------------------------------------------------------------------------
| Settings Helper
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra đang ở trang Settings.
 *
 * @return bool
 */
function k86_is_settings_page() {

	if ( ! is_admin() ) {
		return false;
	}

	if ( empty( $_GET['page'] ) ) {
		return false;
	}

	return 'k86-settings' === sanitize_key(
		wp_unslash( $_GET['page'] )
	);

}
/*
|--------------------------------------------------------------------------
| Sanitize Settings
|--------------------------------------------------------------------------
*/

/**
 * Làm sạch dữ liệu trước khi lưu.
 *
 * @param array $input Dữ liệu đầu vào.
 * @return array
 */
function k86_sanitize_settings( $input ) {

	$defaults = k86_get_default_settings();

	$output = array();

	foreach ( $defaults as $key => $default ) {

		if ( ! isset( $input[ $key ] ) ) {

			$output[ $key ] = is_numeric( $default )
				? 0
				: $default;

			continue;

		}

		switch ( $key ) {

			case 'link_target':

			case 'link_rel':

			case 'icon_bar_position':

			case 'insert_position':

				$output[ $key ] = sanitize_text_field(
					wp_unslash( $input[ $key ] )
				);

				break;

			default:

				$output[ $key ] = absint(
					$input[ $key ]
				);

				break;

		}

	}

	return $output;

}

/*
|--------------------------------------------------------------------------
| Settings Utilities
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ Settings.
 *
 * @return array
 */
function k86_settings() {

	return k86_get_settings();

}

/**
 * Kiểm tra Setting có bật hay không.
 *
 * @param string $key
 * @return bool
 */
function k86_is_enabled( $key ) {

	return (bool) k86_get_setting(
		$key,
		0
	);

}
/*
|--------------------------------------------------------------------------
| Framework Ready
|--------------------------------------------------------------------------
*/

/**
 * Thông báo Settings đã sẵn sàng.
 */
do_action( 'k86_settings_ready' );

/*
|--------------------------------------------------------------------------
| End Of File
|--------------------------------------------------------------------------
*/
