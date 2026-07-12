<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Manager
 * Version: 1.5.0
 * --------------------------------------------------------
 */

/**
 * Trang quản lý sản phẩm
 */
function k86_products_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền truy cập.', 'k86-pro' ) );
	}

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';

	$products = $wpdb->get_results(
		"SELECT * FROM {$table} ORDER BY id DESC"
	);

?>
<div class="wrap">

	<h1 class="wp-heading-inline">Sản phẩm Affiliate</h1>

	<a
		href="<?php echo esc_url( admin_url( 'admin.php?page=k86-add-product' ) ); ?>"
		class="page-title-action">

		Thêm mới

	</a>

	<hr class="wp-header-end">
		<table class="widefat fixed striped" style="margin-top:20px;">

		<thead>

			<tr>

				<th width="60">ID</th>

				<th>Ảnh</th>

				<th>Tên sản phẩm</th>

				<th>Thương hiệu</th>

				<th>Giá</th>

				<th>Đánh giá</th>

				<th>Trạng thái</th>

				<th width="170">Thao tác</th>

			</tr>

		</thead>

		<tbody>

		<?php if ( ! empty( $products ) ) : ?>

			<?php foreach ( $products as $product ) : ?>

				<tr>

					<td>

						<?php echo (int) $product->id; ?>

					</td>

					<td>

						<?php if ( ! empty( $product->image ) ) : ?>

							<img
								src="<?php echo esc_url( $product->image ); ?>"
								style="width:60px;height:60px;border-radius:8px;object-fit:cover;">

						<?php else : ?>

							—

						<?php endif; ?>

					</td>

					<td>

						<strong>

							<?php echo esc_html( $product->name ); ?>

						</strong>

					</td>

					<td>

						<?php echo esc_html( $product->brand ); ?>

					</td>
						<td>

						<?php

						if ( ! empty( $product->sale_price ) ) {

							echo '<strong style="color:#d63638;">' .
								esc_html( $product->sale_price ) .
								'</strong><br>';

							echo '<del>' .
								esc_html( $product->price ) .
								'</del>';

						} else {

							echo esc_html( $product->price );

						}

						?>

					</td>

					<td>

						⭐ <?php echo esc_html( $product->rating ); ?>

						<br>

						<small>

							<?php echo (int) $product->review_count; ?> đánh giá

						</small>

					</td>

					<td>

						<?php if ( 'active' === $product->status ) : ?>

							<span style="color:#00a32a;font-weight:bold;">

								Hoạt động

							</span>

						<?php else : ?>

							<span style="color:#d63638;font-weight:bold;">

								Tạm ẩn

							</span>

						<?php endif; ?>

					</td>
						<td>

						<a
							class="button button-primary"
							href="<?php echo esc_url( admin_url( 'admin.php?page=k86-edit-product&id=' . absint( $product->id ) ) ); ?>">

							Sửa

						</a>

						<a
							class="button button-secondary"
							href="<?php echo esc_url(
								wp_nonce_url(
									admin_url( 'admin-post.php?action=k86_delete_product&id=' . absint( $product->id ) ),
									'k86_delete_product'
								)
							); ?>"
							onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">

							Xóa

						</a>

					</td>

				</tr>

			<?php endforeach; ?>

		<?php else : ?>

			<tr>

				<td colspan="8" style="text-align:center;padding:30px;">

					Chưa có sản phẩm nào.

				</td>

			</tr>

		<?php endif; ?>

		</tbody>

	</table>

</div>

<?php

}
