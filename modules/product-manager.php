<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Manager
 * Version: 1.3.1
 * --------------------------------------------------------
 */

function k86_product_manager_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền truy cập trang này.', 'k86-pro' ) );
	}

	$products = k86_get_products();
	/*
	|--------------------------------------------------------------------------
	| Thống kê sản phẩm
	|--------------------------------------------------------------------------
	*/

	$total_products  = count( $products );

	$active_products = 0;

	$sale_products   = 0;

	$total_price     = 0;

	foreach ( $products as $item ) {

		if ( empty( $item->status ) || $item->status === 'active' ) {

			$active_products++;

		}

		if ( ! empty( $item->sale_price ) ) {

			$sale_products++;

		}

		$total_price += (float) preg_replace(
			'/[^0-9]/',
			'',
			$item->price
		);

	}

	$average_price = $total_products
		? round( $total_price / $total_products )
		: 0;
	?>

	<div class="wrap">

		<h1 class="wp-heading-inline">
	📦 Quản lý sản phẩm
</h1>

<p style="
	margin:12px 0 18px;
	font-size:14px;
	color:#555;
">

	Quản lý toàn bộ sản phẩm Affiliate của K86 Pro.
	Sử dụng nút <strong>📋 Copy</strong> để chèn nhanh sản phẩm vào bài viết bằng shortcode.

</p>

		<a
			href="<?php echo esc_url( admin_url( 'admin.php?page=k86-add-product' ) ); ?>"
			class="page-title-action">

			➕ Thêm mới

		</a>

		<hr class="wp-header-end">
		<div style="
		display:grid;
		grid-template-columns:repeat(4,minmax(180px,1fr));
		gap:15px;
		margin:20px 0;
	">

		<div style="background:#fff;padding:18px;border-left:5px solid #2271b1;box-shadow:0 1px 4px rgba(0,0,0,.08);">

			<div style="font-size:14px;color:#666;">📦 Tổng sản phẩm</div>

			<div style="font-size:28px;font-weight:bold;margin-top:8px;">

				<?php echo esc_html( $total_products ); ?>

			</div>

		</div>

		<div style="background:#fff;padding:18px;border-left:5px solid #46b450;box-shadow:0 1px 4px rgba(0,0,0,.08);">

			<div style="font-size:14px;color:#666;">🟢 Đang hoạt động</div>

			<div style="font-size:28px;font-weight:bold;margin-top:8px;">

				<?php echo esc_html( $active_products ); ?>

			</div>

		</div>

		<div style="background:#fff;padding:18px;border-left:5px solid #dba617;box-shadow:0 1px 4px rgba(0,0,0,.08);">

			<div style="font-size:14px;color:#666;">🔥 Có khuyến mãi</div>

			<div style="font-size:28px;font-weight:bold;margin-top:8px;">

				<?php echo esc_html( $sale_products ); ?>

			</div>

		</div>

		<div style="background:#fff;padding:18px;border-left:5px solid #d63638;box-shadow:0 1px 4px rgba(0,0,0,.08);">

			<div style="font-size:14px;color:#666;">💰 Giá trung bình</div>

			<div style="font-size:28px;font-weight:bold;margin-top:8px;">

				<?php echo number_format( $average_price, 0, ',', '.' ); ?> ₫

			</div>

		</div>

	</div>
			<p style="margin:20px 0 15px;">

	<input
		type="search"
		id="k86-search-product"
		class="regular-text"
		placeholder="🔍 Tìm sản phẩm theo tên..."
		style="width:320px;">

			</p>

		<table class="widefat striped">

			<thead>

				<tr>

					<th width="60">ID</th>

					<th width="90">Ảnh</th>

					<th>Tên sản phẩm</th>

					<th width="120">Giá</th>

					<th width="250">Shortcode</th>

					<th width="70">Shopee</th>

					<th width="70">TikTok</th>

					<th width="70">Lazada</th>

					<th width="180">Thao tác</th>

				</tr>

			</thead>

			<tbody>

			<?php if ( ! empty( $products ) ) : ?>

			<?php foreach ( $products as $product ) : ?>

				<tr>
										<td>

						<?php echo esc_html( $product->id ); ?>

					</td>

					<td>

						<?php if ( ! empty( $product->image ) ) : ?>

							<img
								src="<?php echo esc_url( $product->image ); ?>"
								width="70"
								style="border-radius:6px;"
								alt="">

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

						<?php echo esc_html( $product->price ); ?>

					</td>
										<td>

						<div style="display:flex;align-items:center;gap:8px;">

							<input
								type="text"
								class="regular-text k86-shortcode"
								readonly
								value='[k86_product id="<?php echo absint( $product->id ); ?>"]'>

							<button
								type="button"
								class="button k86-copy-shortcode">

								📋 Copy

							</button>

						</div>

						<p style="margin:6px 0 0;">

							<small style="color:#2271b1;">

								Nhấn Copy để sao chép shortcode.

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
							onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');"
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

					<td colspan="9" style="text-align:center;padding:20px;">

						Chưa có sản phẩm nào.

					</td>

				</tr>

			<?php endif; ?>
				</tbody>

		</table>

	</div>

	<script>

	document.addEventListener('DOMContentLoaded', function () {
// Tìm kiếm sản phẩm
const search = document.getElementById('k86-search-product');

if (search) {

	search.addEventListener('keyup', function () {

		const keyword = this.value.toLowerCase();

		document.querySelectorAll('tbody tr').forEach(function(row){

			const text = row.innerText.toLowerCase();

			row.style.display = text.includes(keyword) ? '' : 'none';

		});

	});

}
		document.querySelectorAll('.k86-copy-shortcode').forEach(function(button){

			button.addEventListener('click', function(){

				let input = this.parentNode.querySelector('.k86-shortcode');

				if (!input) {
					return;
				}

				navigator.clipboard.writeText(input.value).then(() => {

					let oldText = this.innerHTML;

					this.innerHTML = '✅ Đã copy';

					setTimeout(() => {

						this.innerHTML = oldText;

					}, 1500);

				}).catch(() => {

					input.select();
					document.execCommand('copy');

					alert('Đã sao chép shortcode.');

				});

			});

		});

	});

	</script>

	<?php

}
