$options = wp_parse_args(
	get_option( 'k86_settings', array() ),
	array(

		/* Product Box */
		'show_shopee'        => 1,
		'show_tiktok'        => 1,
		'show_lazada'        => 1,
		'show_amazon'        => 1,

		'show_discount'      => 1,
		'show_save_money'    => 1,
		'show_description'   => 1,

		/* CTA */
		'link_target'        => '_blank',
		'link_rel'           => 'nofollow sponsored noopener',

		/* Engagement */
		'show_engagement'    => 1,
		'show_like'          => 1,
		'show_share'         => 1,

		/* Icon Bar */
		'show_icon_bar'      => 1,
		'icon_bar_position'  => 'after_content',
		'icon_bar_post'      => 1,
		'icon_bar_product'   => 1,

		/* Auto Insert */
		'auto_insert'        => 1,
		'insert_position'    => 'after_content',
		'auto_product_box'   => 1,
		'auto_cta'           => 1,
		'auto_engagement'    => 1,

	)
);
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
		Mở liên kết
	</th>

	<td>

		<select name="k86_settings[link_target]">

			<option
				value="_blank"
				<?php selected( $options['link_target'], '_blank' ); ?>>
				Tab mới
			</option>

			<option
				value="_self"
				<?php selected( $options['link_target'], '_self' ); ?>>
				Cùng tab
			</option>

		</select>

	</td>

</tr>

<tr>

	<th scope="row">
		Thuộc tính rel
	</th>

	<td>

		<input
			type="text"
			class="regular-text"
			name="k86_settings[link_rel]"
			value="<?php echo esc_attr( $options['link_rel'] ); ?>">

		<p class="description">
			Ví dụ: nofollow sponsored noopener
		</p>

	</td>

</tr>
<tr>

	<th scope="row">
		Bật Engagement
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_engagement]"
				value="1"
				<?php checked( ! empty( $options['show_engagement'] ) ); ?>>

			Hiển thị khu vực tương tác

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Hiển thị nút Like
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_like]"
				value="1"
				<?php checked( ! empty( $options['show_like'] ) ); ?>>

			Bật Like / Reaction

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Hiển thị nút Share
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_share]"
				value="1"
				<?php checked( ! empty( $options['show_share'] ) ); ?>>

			Bật chia sẻ mạng xã hội

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Hiển thị Icon Bar
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_icon_bar]"
				value="1"
				<?php checked( ! empty( $options['show_icon_bar'] ) ); ?>>

			Hiển thị thanh icon cuối bài viết

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Vị trí Icon Bar
	</th>

	<td>

		<select name="k86_settings[icon_bar_position]">

			<option value="after_content"
				<?php selected( $options['icon_bar_position'], 'after_content' ); ?>>
				Cuối bài viết
			</option>

			<option value="before_content"
				<?php selected( $options['icon_bar_position'], 'before_content' ); ?>>
				Đầu bài viết
			</option>

		</select>

	</td>

</tr>
<tr>

	<th scope="row">
		Bật Auto Insert
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[auto_insert]"
				value="1"
				<?php checked( ! empty( $options['auto_insert'] ) ); ?>>

			Tự động chèn nội dung

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Vị trí chèn
	</th>

	<td>

		<select name="k86_settings[insert_position]">

			<option
				value="after_content"
				<?php selected( $options['insert_position'], 'after_content' ); ?>>
				Cuối bài viết
			</option>

			<option
				value="before_content"
				<?php selected( $options['insert_position'], 'before_content' ); ?>>
				Đầu bài viết
			</option>

		</select>

	</td>

</tr>

<tr>

	<th scope="row">
		Tự động chèn Product Box
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[auto_product_box]"
				value="1"
				<?php checked( ! empty( $options['auto_product_box'] ) ); ?>>

			Bật Product Box

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Tự động chèn CTA
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[auto_cta]"
				value="1"
				<?php checked( ! empty( $options['auto_cta'] ) ); ?>>

			Bật CTA

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Tự động chèn Engagement
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[auto_engagement]"
				value="1"
				<?php checked( ! empty( $options['auto_engagement'] ) ); ?>>

			Bật Engagement

		</label>

	</td>

</tr>
<tr>

	<th scope="row">
		Hiển thị Product Box
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_product_box]"
				value="1"
				<?php checked( ! empty( $options['show_product_box'] ) ); ?>>

			Hiển thị Product Box

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Hiển thị CTA
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[show_cta]"
				value="1"
				<?php checked( ! empty( $options['show_cta'] ) ); ?>>

			Hiển thị nút mua hàng

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Vị trí CTA
	</th>

	<td>

		<select name="k86_settings[cta_position]">

			<option
				value="after_product"
				<?php selected( $options['cta_position'], 'after_product' ); ?>>
				Sau Product Box
			</option>

			<option
				value="before_product"
				<?php selected( $options['cta_position'], 'before_product' ); ?>>
				Trước Product Box
			</option>

		</select>

	</td>

</tr>

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
				<?php checked(
					'_blank' === $options['link_target']
				); ?>>

			Tất cả liên kết Affiliate mở tab mới

		</label>

	</td>

</tr>
<tr>

	<th scope="row">
		Hiển thị trong bài viết
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[enable_post]"
				value="1"
				<?php checked( ! empty( $options['enable_post'] ) ); ?>>

			Áp dụng cho tất cả bài viết

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Hiển thị trong trang
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[enable_page]"
				value="1"
				<?php checked( ! empty( $options['enable_page'] ) ); ?>>

			Áp dụng cho tất cả trang

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Chế độ Debug
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[debug_mode]"
				value="1"
				<?php checked( ! empty( $options['debug_mode'] ) ); ?>>

			Bật Debug Mode

		</label>

	</td>

</tr>

<tr>

	<th scope="row">
		Ghi nhật ký (Log)
	</th>

	<td>

		<label>

			<input
				type="checkbox"
				name="k86_settings[enable_log]"
				value="1"
				<?php checked( ! empty( $options['enable_log'] ) ); ?>>

			Lưu Log hoạt động của Plugin

		</label>

	</td>

</tr>
<tr>

	<th scope="row">
		Xuất cấu hình
	</th>

	<td>

		<p class="description">
			Tính năng này sẽ cho phép xuất toàn bộ cài đặt K86 Pro để sử dụng cho website khác.
		</p>

		<button
			type="button"
			class="button"
			disabled>

			Xuất cấu hình (Coming Soon)

		</button>

	</td>

</tr>

<tr>

	<th scope="row">
		Nhập cấu hình
	</th>

	<td>

		<p class="description">
			Khôi phục nhanh toàn bộ cài đặt từ một file sao lưu.
		</p>

		<button
			type="button"
			class="button"
			disabled>

			Nhập cấu hình (Coming Soon)

		</button>

	</td>

</tr>

<tr>

	<th scope="row">
		Khôi phục mặc định
	</th>

	<td>

		<p class="description">
			Đưa toàn bộ cài đặt về mặc định của Plugin.
		</p>

		<button
			type="button"
			class="button button-secondary"
			disabled>

			Khôi phục mặc định

		</button>

	</td>

</tr>

<tr>

	<th scope="row">
		Thông tin Plugin
	</th>

	<td>

		<p>

			<strong>K86 Pro</strong><br>

			Phiên bản:
			<?php echo esc_html( K86_PRO_VERSION ); ?>

		</p>

		<p class="description">

			Framework Affiliate Platform dành cho WordPress.

		</p>

	</td>

</tr>
/*
|--------------------------------------------------------------------------
| Settings Final API
|--------------------------------------------------------------------------
*/

/**
 * Lấy toàn bộ cài đặt K86 Pro.
 *
 * @return array
 */
function k86_get_settings() {

	$settings = get_option(
		'k86_settings',
		array()
	);

	return apply_filters(
		'k86_settings_data',
		$settings
	);

}

/**
 * Cập nhật cài đặt.
 *
 * @param array $settings
 * @return bool
 */
function k86_update_settings( $settings ) {

	return update_option(
		'k86_settings',
		$settings
	);

}

/**
 * Framework đã sẵn sàng.
 */
do_action( 'k86_settings_ready' );
