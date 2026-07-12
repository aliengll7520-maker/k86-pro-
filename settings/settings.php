<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Settings
 * Version: 1.4.0
 * --------------------------------------------------------
 */

function k86_settings_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền.', 'k86-pro' ) );
	}

	$options = get_option(
		'k86_settings',
		array(
			'show_shopee'     => 1,
			'show_tiktok'     => 1,
			'show_lazada'     => 1,
			'show_discount'   => 1,
			'show_save_money' => 1,
			'show_description'=> 1,
		)
	);

?>
    	<div class="wrap">

		<h1>⚙️ Cài đặt K86 Pro</h1>

		<p>
			Phiên bản:
			<strong><?php echo esc_html( K86_PRO_VERSION ); ?></strong>
		</p>

		<form method="post" action="options.php">

			<?php
				settings_fields( 'k86_settings_group' );
				do_settings_sections( 'k86_settings_group' );
			?>

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
						Hiển thị TikTok
					</th>

					<td>

						<label>

							<input
								type="checkbox"
								name="k86_settings[show_tiktok]"
								value="1"
								<?php checked( ! empty( $options['show_tiktok'] ) ); ?>>

							Bật nút TikTok

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

			<?php submit_button( '💾 Lưu cài đặt' ); ?>

		</form>

	</div>

<?php

}

/**
 * --------------------------------------------------------
 * Đăng ký Settings
 * --------------------------------------------------------
 */

add_action( 'admin_init', 'k86_register_settings' );

function k86_register_settings() {

	register_setting(
		'k86_settings_group',
		'k86_settings'
	);

}
