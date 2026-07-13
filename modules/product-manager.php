<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Manager
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hiển thị trang quản lý sản phẩm.
 *
 * @return void
 */
function k86_product_manager_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			esc_html__( 'Bạn không có quyền truy cập.', 'k86-pro' )
		);
	}

	/**
	 * Lấy danh sách sản phẩm.
	 *
	 * Sử dụng Helper để dễ tái sử dụng
	 * cho Shopping Assistant và AI Engine.
	 */
	$products = k86_get_products();

	?>

	<div class="wrap">

		<h1 class="wp-heading-inline">
			<?php esc_html_e( 'Sản phẩm Affiliate', 'k86-pro' ); ?>
		</h1>

		<a
			href="<?php echo esc_url( admin_url( 'admin.php?page=k86-add-product' ) ); ?>"
			class="page-title-action">

			<?php esc_html_e( 'Thêm mới', 'k86-pro' ); ?>

		</a>

		<hr class="wp-header-end">

		<table class="widefat striped">

			<thead>

				<tr>

					<th style="width:60px;">
						<?php esc_html_e( 'ID', 'k86-pro' ); ?>
					</th>

					<th style="width:80px;">
						<?php esc_html_e( 'Ảnh', 'k86-pro' ); ?>
					</th>

					<th style="min-width:280px;">
						<?php esc_html_e( 'Tên sản phẩm', 'k86-pro' ); ?>
					</th>

					<th style="width:180px;">
						<?php esc_html_e( 'Thương hiệu', 'k86-pro' ); ?>
					</th>

					<th style="width:140px;">
						<?php esc_html_e( 'Giá', 'k86-pro' ); ?>
					</th>

					<th style="width:120px;">
						<?php esc_html_e( 'Trạng thái', 'k86-pro' ); ?>
					</th>

					<th style="width:180px;">
						<?php esc_html_e( 'Thao tác', 'k86-pro' ); ?>
					</th>

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
						alt="<?php echo esc_attr( $product->name ); ?>"
						style="width:60px;height:60px;object-fit:cover;border-radius:8px;">

				<?php else : ?>

					&mdash;

				<?php endif; ?>

			</td>

			<td style="min-width:280px;">

				<strong>

					<?php echo esc_html( $product->name ); ?>

				</strong>

			</td>

			<td>

				<?php
				echo ! empty( $product->brand )
					? esc_html( $product->brand )
					: '&mdash;';
				?>

			</td>

			<td>

				<?php if ( ! empty( $product->sale_price ) ) : ?>

					<strong style="color:#d63638;">

						<?php echo esc_html( $product->sale_price ); ?>

					</strong>

					<br>

					<del>

						<?php echo esc_html( $product->price ); ?>

					</del>

				<?php else : ?>

					<?php echo esc_html( $product->price ); ?>

				<?php endif; ?>

			</td>

			<td>

				<?php if ( 'active' === $product->status ) : ?>

					<span style="color:#00a32a;font-weight:bold;">

						<?php esc_html_e( 'Hoạt động', 'k86-pro' ); ?>

					</span>

				<?php else : ?>

					<span style="color:#d63638;font-weight:bold;">

						<?php esc_html_e( 'Tạm ẩn', 'k86-pro' ); ?>

					</span>

				<?php endif; ?>

			</td>

			<td>
		<a
	class="button button-primary"
	href="<?php echo esc_url( admin_url( 'admin.php?page=k86-edit-product&id=' . absint( $product->id ) ) ); ?>">

	<?php esc_html_e( 'Sửa', 'k86-pro' ); ?>

</a>

<a
	class="button button-secondary"
	href="<?php echo esc_url(
		wp_nonce_url(
			admin_url(
				'admin-post.php?action=k86_delete_product&id=' . absint( $product->id )
			),
			'k86_delete_product'
		)
	); ?>"
	onclick="return confirm('<?php echo esc_js( __( 'Bạn có chắc muốn xóa sản phẩm này?', 'k86-pro' ) ); ?>');">

	<?php esc_html_e( 'Xóa', 'k86-pro' ); ?>

</a>

</td>

</tr>

<?php endforeach; ?>

<?php else : ?>

<tr>

	<td colspan="7" style="text-align:center;padding:30px;">

		<?php esc_html_e( 'Chưa có sản phẩm nào.', 'k86-pro' ); ?>

	</td>

</tr>

<?php endif; ?>
				</tbody>

		</table>

		<?php
		/**
		 * Hook mở rộng sau danh sách sản phẩm.
		 *
		 * Cho phép Shopping Assistant,
		 * AI Engine, Analytics Engine,
		 * Affiliate Engine hoặc Module khác
		 * bổ sung giao diện mà không cần
		 * chỉnh sửa Product Manager.
		 */
		do_action( 'k86_product_manager_after' );
		?>

	</div>

	<?php
}
