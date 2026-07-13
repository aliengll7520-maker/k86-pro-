<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Settings
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * Trang cài đặt K86 Pro
 * --------------------------------------------------------
 */

function k86_settings_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền.', 'k86-pro' ) );
	}

	$options = wp_parse_args(
		get_option( 'k86_settings', array() ),
		array(

			/*
			|--------------------------------------------------------------------------
			| Product Box
			|--------------------------------------------------------------------------
			*/

			'show_shopee'        => 1,
			'show_tiktok'        => 1,
			'show_lazada'        => 1,
			'show_amazon'        => 1,

			'show_discount'      => 1,
			'show_save_money'    => 1,
			'show_description'   => 1,

			/*
			|--------------------------------------------------------------------------
			| Affiliate Profile
			|--------------------------------------------------------------------------
			*/

			'shopee_store'       => '',
			'shopee_affiliate'   => '',
			'shopee_partner'     => '',

			'tiktok_store'       => '',
			'tiktok_affiliate'   => '',

			'lazada_store'       => '',
			'lazada_affiliate'   => '',

			'amazon_store'       => '',
			'amazon_tracking'    => '',

			/*
			|--------------------------------------------------------------------------
			| Affiliate Behavior
			|--------------------------------------------------------------------------
			*/

			'open_new_tab'       => 1,
			'rel_nofollow'       => 1,
			'rel_sponsored'      => 1,
			'rel_noopener'       => 1,

		)
	);

?>

<div class="wrap">

	<h1>⚙️ Cài đặt K86 Pro</h1>

	<p>

		Phiên bản

		<strong>

			<?php echo esc_html( K86_PRO_VERSION ); ?>

		</strong>

	</p>

	<form
		method="post"
		action="options.php">

		<?php

		settings_fields( 'k86_settings_group' );

		do_settings_sections( 'k86_settings_group' );

		?>

		<h2>

			Product Box

		</h2>

		<table class="form-table">
				<tr>

			<th scope="row">
				Hiển thị Shopee
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_shopee]"
						value="1"
						<?php checked( ! empty( $options['show_shopee'] ) ); ?>>

					Bật nút Shopee

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị TikTok Shop
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_tiktok]"
						value="1"
						<?php checked( ! empty( $options['show_tiktok'] ) ); ?>>

					Bật nút TikTok Shop

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị Lazada
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_lazada]"
						value="1"
						<?php checked( ! empty( $options['show_lazada'] ) ); ?>>

					Bật nút Lazada

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị Amazon
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_amazon]"
						value="1"
						<?php checked( ! empty( $options['show_amazon'] ) ); ?>>

					Bật nút Amazon

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị mô tả sản phẩm
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_description]"
						value="1"
						<?php checked( ! empty( $options['show_description'] ) ); ?>>

					Hiển thị mô tả

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị % giảm giá
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_discount]"
						value="1"
						<?php checked( ! empty( $options['show_discount'] ) ); ?>>

					Hiển thị phần trăm giảm giá

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Hiển thị số tiền tiết kiệm
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[show_save_money]"
						value="1"
						<?php checked( ! empty( $options['show_save_money'] ) ); ?>>

					Hiển thị số tiền tiết kiệm

				</label>

			</td>

		</tr>

	</table>

	<hr>

	<h2>Affiliate Profile</h2>

	<table class="form-table">	
				<tr>

			<th scope="row">
				Shopee Store
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[shopee_store]"
					value="<?php echo esc_attr( $options['shopee_store'] ); ?>"
					class="regular-text">

				<p class="description">
					Tên cửa hàng Shopee.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Shopee Affiliate ID
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[shopee_affiliate]"
					value="<?php echo esc_attr( $options['shopee_affiliate'] ); ?>"
					class="regular-text">

				<p class="description">
					ID Affiliate Shopee của bạn.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Shopee Partner ID
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[shopee_partner]"
					value="<?php echo esc_attr( $options['shopee_partner'] ); ?>"
					class="regular-text">

				<p class="description">
					Dùng cho các phiên bản mở rộng sau.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				TikTok Shop Name
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[tiktok_store]"
					value="<?php echo esc_attr( $options['tiktok_store'] ); ?>"
					class="regular-text">

			</td>

		</tr>

		<tr>

			<th scope="row">
				TikTok Affiliate ID
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[tiktok_affiliate]"
					value="<?php echo esc_attr( $options['tiktok_affiliate'] ); ?>"
					class="regular-text">

			</td>

		</tr>
				<tr>

			<th scope="row">
				Lazada Store Name
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[lazada_store]"
					value="<?php echo esc_attr( $options['lazada_store'] ); ?>"
					class="regular-text">

				<p class="description">
					Tên cửa hàng Lazada.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Lazada Publisher ID
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[lazada_affiliate]"
					value="<?php echo esc_attr( $options['lazada_affiliate'] ); ?>"
					class="regular-text">

				<p class="description">
					Publisher ID hoặc Affiliate ID của Lazada.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Amazon Store Name
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[amazon_store]"
					value="<?php echo esc_attr( $options['amazon_store'] ); ?>"
					class="regular-text">

				<p class="description">
					Tên tài khoản Amazon Associates.
				</p>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Amazon Tracking ID
			</th>

			<td>

				<input
					type="text"
					name="k86_settings[amazon_tracking]"
					value="<?php echo esc_attr( $options['amazon_tracking'] ); ?>"
					class="regular-text"
					placeholder="k86shop-20">

				<p class="description">
					Tracking ID của Amazon Associates (ví dụ: k86shop-20).
				</p>

			</td>

		</tr>

	</table>

	<hr>

	<h2>Affiliate Behavior</h2>

	<table class="form-table">
				<tr>

			<th scope="row">
				Mở liên kết ở tab mới
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[open_new_tab]"
						value="1"
						<?php checked( ! empty( $options['open_new_tab'] ) ); ?>>

					Mở tất cả liên kết Affiliate bằng tab mới

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Thuộc tính rel="nofollow"
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[rel_nofollow]"
						value="1"
						<?php checked( ! empty( $options['rel_nofollow'] ) ); ?>>

					Tự động thêm nofollow

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Thuộc tính rel="sponsored"
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[rel_sponsored]"
						value="1"
						<?php checked( ! empty( $options['rel_sponsored'] ) ); ?>>

					Tự động thêm sponsored

				</label>

			</td>

		</tr>

		<tr>

			<th scope="row">
				Thuộc tính rel="noopener"
			</th>

			<td>

				<label>

					<input
						type="checkbox"
						name="k86_settings[rel_noopener]"
						value="1"
						<?php checked( ! empty( $options['rel_noopener'] ) ); ?>>

					Tự động thêm noopener

				</label>

			</td>

		</tr>

	</table>

	<?php submit_button( '💾 Lưu cài đặt K86 Pro' ); ?>

	</form>

</div>

<?php
	/**
 * --------------------------------------------------------
 * Đăng ký Settings
 * --------------------------------------------------------
 */

add_action( 'admin_init', 'k86_register_settings' );

function k86_register_settings() {

	register_setting(
		'k86_settings_group',
		'k86_settings',
		'k86_sanitize_settings'
	);

}

/**
 * --------------------------------------------------------
 * Làm sạch dữ liệu trước khi lưu
 * --------------------------------------------------------
 */

function k86_sanitize_settings( $input ) {

	$output = array();

	foreach ( (array) $input as $key => $value ) {

		switch ( $key ) {

			case 'show_shopee':
			case 'show_tiktok':
			case 'show_lazada':
			case 'show_amazon':
			case 'show_discount':
			case 'show_save_money':
			case 'show_description':
			case 'open_new_tab':
			case 'rel_nofollow':
			case 'rel_sponsored':
			case 'rel_noopener':

				$output[ $key ] = empty( $value ) ? 0 : 1;

				break;

			default:

				$output[ $key ] = sanitize_text_field( $value );

				break;

		}

	}

	return $output;

}
