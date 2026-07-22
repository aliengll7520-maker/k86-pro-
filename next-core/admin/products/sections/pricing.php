<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="k86-admin-section">

	<h2><?php esc_html_e( 'Giá sản phẩm', 'k86-pro' ); ?></h2>

	<table class="form-table">

		<tr>

			<th>
				<label for="k86_price">
					<?php esc_html_e( 'Giá gốc', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="number"
					id="k86_price"
					name="k86_price"
					class="regular-text"
					value="<?php echo esc_attr( $product['price'] ?? '' ); ?>">

			</td>

		</tr>

		<tr>

			<th>
				<label for="k86_sale_price">
					<?php esc_html_e( 'Giá khuyến mãi', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="number"
					id="k86_sale_price"
					name="k86_sale_price"
					class="regular-text"
					value="<?php echo esc_attr( $product['sale_price'] ?? '' ); ?>">

			</td>

		</tr>

		<tr>

			<th>
				<label for="k86_currency">
					<?php esc_html_e( 'Đơn vị tiền tệ', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="text"
					id="k86_currency"
					name="k86_currency"
					class="regular-text"
					value="<?php echo esc_attr( $product['currency'] ?? 'VND' ); ?>">

			</td>

		</tr>

		<tr>

			<th>
				<label for="k86_discount">
					<?php esc_html_e( 'Giảm giá (%)', 'k86-pro' ); ?>
				</label>
