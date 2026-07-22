<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="k86-admin-section">

	<h2><?php esc_html_e( 'Liên kết mua hàng', 'k86-pro' ); ?></h2>

	<table class="form-table">

		<tr>
			<th>
				<label for="k86_buy_url">
					<?php esc_html_e( 'Mua ngay', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="url"
					id="k86_buy_url"
					name="k86_buy_url"
					class="large-text"
					value="<?php echo esc_attr( $product['buy_url'] ?? '' ); ?>">

			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_shopee_url">
					<?php esc_html_e( 'Shopee', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="url"
					id="k86_shopee_url"
					name="k86_shopee_url"
					class="large-text"
					value="<?php echo esc_attr( $product['shopee_url'] ?? '' ); ?>">

			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_tiktok_url">
					<?php esc_html_e( 'TikTok Shop', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="url"
					id="k86_tiktok_url"
					name="k86_tiktok_url"
					class="large-text"
					value="<?php echo esc_attr( $product['tiktok_url'] ?? '' ); ?>">

			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_lazada_url">
					<?php esc_html_e( 'Lazada', 'k86-pro' ); ?>
				</label>
			</th>

			<td>

				<input
					type="url"
					id="k86_lazada_url"
					name="k86_lazada_url"
					class="large-text"
					value="<?php echo esc_attr( $product['lazada_url'] ?? '' ); ?>">

			</td>
		</tr>

	</table>

</div>
