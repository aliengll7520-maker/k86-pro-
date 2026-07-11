<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Trang Quản lý sản phẩm
 */
function k86_product_manager_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền truy cập trang này.', 'k86-pro' ) );
	}

	$products = k86_get_products();
	?>

	<div class="wrap">

		<h1 class="wp-heading-inline">Quản lý sản phẩm</h1>

		<a
			href="<?php echo esc_url( admin_url( 'admin.php?page=k86-add-product' ) ); ?>"
			class="page-title-action">

			➕ Thêm mới

		</a>

		<hr class="wp-header-end">

		<table class="widefat striped">

			<thead>

				<tr>

					<th width="60">ID</th>

					<th>Ảnh</th>

					<th>Tên sản phẩm</th>

					<th>Giá</th>

					<th width="180">Shortcode</th>

					<th>Shopee</th>

					<th>TikTok</th>

					<th>Lazada</th>

					<th width="180">Thao tác</th>

				</tr>

			</thead>

			<tbody>

			<?php if ( ! empty( $products ) ) : ?>

			<?php foreach ( $products as $product ) : ?>

				<tr>

					<td><?php echo esc_html( $product->id ); ?></td>

					<td>

						<?php if ( ! empty( $product->image ) ) : ?>

							<img
								src="<?php echo esc_url( $product->image ); ?>"
								width="70"
								alt="">

						<?php endif; ?>

					</td>

					<td>

						<strong>

							<?php echo esc_html( $product->name ); ?>

						</strong>

					</td>

					<td>

						<?php echo esc_html( $product->price ); ?>

					</td>
					<td>

						<input
							type="text"
							class="regular-text k86-shortcode"
							value='[k86_product id="<?php echo absint( $product->id ); ?>"]'
							readonly
							onclick="this.select();document.execCommand('copy');">

						<p style="margin-top:6px;">

							<small style="color:#2271b1;">
								📋 Nhấp vào ô để Copy
							</small>

						</p>

					</td>

					<td>

						<?php echo ! empty( $product->shopee ) ? '✔' : '-'; ?>

					</td>

					<td>

						<?php echo ! empty( $product->tiktok ) ? '✔' : '-'; ?>

					</td>

					<td>

						<?php echo ! empty( $product->lazada ) ? '✔' : '-'; ?>

					</td>
							<td>

						<a
							class="button button-primary"
							href="<?php echo esc_url( admin_url( 'admin.php?page=k86-edit-product&id=' . absint( $product->id ) ) ); ?>">

							Sửa

						</a>

						<a
							class="button button-secondary"
							onclick="return confirm('Bạn có chắc muốn xóa?');"
							href="<?php echo esc_url(
								wp_nonce_url(
									admin_url( 'admin-post.php?action=k86_delete_product&id=' . absint( $product->id ) ),
									'k86_delete_product'
								)
							); ?>">

							Xóa

						</a>

					</td>

				</tr>

			<?php endforeach; ?>

			<?php else : ?>

				<tr>

					<td colspan="9">

						Chưa có sản phẩm nào.

					</td>

				</tr>

			<?php endif; ?>

			</tbody>

		</table>

	</div>

	<?php

}
