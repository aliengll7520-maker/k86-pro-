<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Edit
 * Version: 1.5.0.3
 * Status: Development
 * --------------------------------------------------------
 */

function k86_edit_product_form() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền truy cập.', 'k86-pro' ) );
	}

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';

	$id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;

	$product = $wpdb->get_row(
		$wpdb->prepare(
			"SELECT * FROM {$table} WHERE id = %d",
			$id
		)
	);

	if ( ! $product ) {

		echo '<div class="notice notice-error"><p>Không tìm thấy sản phẩm.</p></div>';

		return;

	}

	?>

	<div class="wrap">

		<h1>Sửa sản phẩm Affiliate</h1>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">

			<input type="hidden" name="action" value="k86_update_product">

			<input type="hidden" name="id" value="<?php echo absint( $product->id ); ?>">

			<?php wp_nonce_field( 'k86_update_product', 'k86_nonce' ); ?>

			<table class="form-table">
				
			<tr>
				<th><label for="name">Tên sản phẩm</label></th>
				<td>
					<input
						type="text"
						id="name"
						name="name"
						class="regular-text"
						value="<?php echo esc_attr( $product->name ); ?>"
						required>
				</td>
			</tr>

			<tr>
				<th><label for="brand">Thương hiệu</label></th>
				<td>

					<input
						type="text"
						id="brand"
						name="brand"
						class="regular-text"
						value="<?php echo esc_attr( $product->brand ); ?>"
						placeholder="Ví dụ: TP-Link">

					<p class="description">
						Nhập thương hiệu của sản phẩm.
					</p>

				</td>
			</tr>

			<tr>
				<th><label for="price">Giá bán</label></th>
				<td>
					<input
						type="text"
						id="price"
						name="price"
						class="regular-text"
						value="<?php echo esc_attr( $product->price ); ?>">
				</td>
			</tr>

			<tr>
				<th><label for="sale_price">Giá khuyến mãi</label></th>
				<td>
					<input
						type="text"
						id="sale_price"
						name="sale_price"
						class="regular-text"
						value="<?php echo esc_attr( $product->sale_price ); ?>">
				</td>
			</tr>
				<tr>
				<th><label for="shopee">Link Shopee</label></th>
				<td>
					<input
						type="url"
						id="shopee"
						name="shopee"
						class="large-text"
						value="<?php echo esc_attr( $product->shopee ); ?>">
				</td>
			</tr>

			<tr>
				<th><label for="tiktok">Link TikTok Shop</label></th>
				<td>
					<input
						type="url"
						id="tiktok"
						name="tiktok"
						class="large-text"
						value="<?php echo esc_attr( $product->tiktok ); ?>">
				</td>
			</tr>

			<tr>
				<th><label for="lazada">Link Lazada</label></th>
				<td>
					<input
						type="url"
						id="lazada"
						name="lazada"
						class="large-text"
						value="<?php echo esc_attr( $product->lazada ); ?>">
				</td>
			</tr>

			<tr>
				<th><label for="image">Ảnh sản phẩm</label></th>
				<td>

					<input
						type="url"
						id="image"
						name="image"
						class="large-text"
						value="<?php echo esc_attr( $product->image ); ?>">

					<p style="margin-top:10px;">

						<button
							type="button"
							id="k86-upload-image"
							class="button button-secondary">

							📷 Chọn ảnh

						</button>

						<button
							type="button"
							id="k86-remove-image"
							class="button">

							❌ Xóa ảnh

						</button>

					</p>

					<div
						id="k86-image-preview"
						style="margin-top:15px;">

						<?php if ( ! empty( $product->image ) ) : ?>

							<img
								src="<?php echo esc_url( $product->image ); ?>"
								style="max-width:200px;border-radius:8px;"
								alt="<?php echo esc_attr( $product->name ); ?>">

						<?php endif; ?>

					</div>

					<p class="description">
						Bạn có thể chọn ảnh từ Media Library hoặc dán URL.
					</p>

				</td>
			</tr>
				<tr>
				<th><label for="description">Mô tả sản phẩm</label></th>
				<td>

					<textarea
						id="description"
						name="description"
						rows="8"
						class="large-text"><?php echo esc_textarea( $product->description ); ?></textarea>

					<p class="description">
						Mô tả ngắn về sản phẩm, ưu điểm và thông số kỹ thuật.
					</p>

				</td>
			</tr>

			<tr>
				<th><label for="status">Trạng thái</label></th>
				<td>

					<select id="status" name="status">

						<option value="active" <?php selected( $product->status, 'active' ); ?>>
							Hoạt động
						</option>

						<option value="inactive" <?php selected( $product->status, 'inactive' ); ?>>
							Tạm ẩn
						</option>

					</select>

				</td>
			</tr>

		</table>

		<p class="submit">

			<input
				type="submit"
				class="button button-primary button-large"
				value="💾 Cập nhật sản phẩm">

			<a
				href="<?php echo esc_url( admin_url( 'admin.php?page=k86-products' ) ); ?>"
				class="button button-large">

				Hủy

			</a>

		</p>

	</form>

</div>

<?php

}
