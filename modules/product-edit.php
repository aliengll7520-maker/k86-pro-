<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Edit
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hiển thị Form sửa sản phẩm.
 *
 * @return void
 */
function k86_edit_product_form() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			esc_html__( 'Bạn không có quyền truy cập.', 'k86-pro' )
		);
	}

	$id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;

	$product = k86_get_product( $id );

	if ( ! $product ) {
		?>

		<div class="notice notice-error">

			<p>

				<?php esc_html_e( 'Không tìm thấy sản phẩm.', 'k86-pro' ); ?>

			</p>

		</div>

		<?php

		return;

	}

	?>

	<div class="wrap">

		<h1>

			<?php esc_html_e( 'Sửa sản phẩm Affiliate', 'k86-pro' ); ?>

		</h1>

		<form
			method="post"
			action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">

			<input
				type="hidden"
				name="action"
				value="k86_update_product">

			<input
				type="hidden"
				name="id"
				value="<?php echo absint( $product->id ); ?>">

			<?php wp_nonce_field( 'k86_update_product', 'k86_nonce' ); ?>

			<table class="form-table">
				
				<tr>

					<th>

						<label for="name">

							<?php esc_html_e( 'Tên sản phẩm', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="brand">

							<?php esc_html_e( 'Thương hiệu', 'k86-pro' ); ?>

						</label>

					</th>

					<td>

						<input
							type="text"
							id="brand"
							name="brand"
							class="regular-text"
							value="<?php echo esc_attr( $product->brand ); ?>"
							placeholder="<?php esc_attr_e( 'Ví dụ: TP-Link', 'k86-pro' ); ?>">

						<p class="description">

							<?php esc_html_e( 'Nhập thương hiệu của sản phẩm.', 'k86-pro' ); ?>

						</p>

					</td>

				</tr>

				<tr>

					<th>

						<label for="price">

							<?php esc_html_e( 'Giá bán', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="sale_price">

							<?php esc_html_e( 'Giá khuyến mãi', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="shopee">

							<?php esc_html_e( 'Link Shopee', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="tiktok">

							<?php esc_html_e( 'Link TikTok Shop', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="lazada">

							<?php esc_html_e( 'Link Lazada', 'k86-pro' ); ?>

						</label>

					</th>

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

					<th>

						<label for="image">

							<?php esc_html_e( 'Ảnh sản phẩm', 'k86-pro' ); ?>

						</label>

					</th>

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

								📷 <?php esc_html_e( 'Chọn ảnh', 'k86-pro' ); ?>

							</button>

							<button
								type="button"
								id="k86-remove-image"
								class="button">

								❌ <?php esc_html_e( 'Xóa ảnh', 'k86-pro' ); ?>

							</button>

						</p>

						<div
							id="k86-image-preview"
							style="margin-top:15px;">

							<?php if ( ! empty( $product->image ) ) : ?>

								<img
									src="<?php echo esc_url( $product->image ); ?>"
									alt="<?php echo esc_attr( $product->name ); ?>"
									style="max-width:200px;border-radius:8px;">

							<?php endif; ?>

						</div>

						<p class="description">

							<?php
							esc_html_e(
								'Bạn có thể chọn ảnh từ Media Library hoặc dán URL.',
								'k86-pro'
							);
							?>

						</p>

					</td>

				</tr>

				<tr>

					<th>

						<label for="description">

							<?php esc_html_e( 'Mô tả sản phẩm', 'k86-pro' ); ?>

						</label>

					</th>

					<td>

						<textarea
							id="description"
							name="description"
							rows="8"
							class="large-text"><?php echo esc_textarea( $product->description ); ?></textarea>

						<p class="description">

							<?php
							esc_html_e(
								'Mô tả ngắn về sản phẩm, ưu điểm và thông số kỹ thuật.',
								'k86-pro'
							);
							?>

						</p>

					</td>

				</tr>

				<tr>

					<th>

						<label for="status">

							<?php esc_html_e( 'Trạng thái', 'k86-pro' ); ?>

						</label>

					</th>

					<td>

						<select
							id="status"
							name="status">

							<option
								value="active"
								<?php selected( $product->status, 'active' ); ?>>

								<?php esc_html_e( 'Hoạt động', 'k86-pro' ); ?>

							</option>

							<option
								value="inactive"
								<?php selected( $product->status, 'inactive' ); ?>>

								<?php esc_html_e( 'Tạm ẩn', 'k86-pro' ); ?>

							</option>

						</select>

					</td>

				</tr>
				</table>

			<p class="submit">

				<input
					type="submit"
					class="button button-primary button-large"
					value="<?php echo esc_attr__( '💾 Cập nhật sản phẩm', 'k86-pro' ); ?>">

				<a
					href="<?php echo esc_url( admin_url( 'admin.php?page=k86-products' ) ); ?>"
					class="button button-large">

					<?php esc_html_e( 'Hủy', 'k86-pro' ); ?>

				</a>

			</p>

		</form>

		<?php
		/**
		 * Hook mở rộng sau Form sửa sản phẩm.
		 *
		 * Shopping Assistant
		 * AI Engine
		 * Affiliate Engine
		 * Analytics Engine
		 * ...
		 */
		do_action( 'k86_product_edit_after' );
		?>

	</div>

	<?php
}
