<?php
/**
 * Product Shipping Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Shipping Information', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_shipping_title">
						<?php esc_html_e( 'Shipping Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_shipping_title"
						name="k86_shipping_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['shipping_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_shipping_time">
						<?php esc_html_e( 'Estimated Delivery', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_shipping_time"
						name="k86_shipping_time"
						class="regular-text"
						placeholder="<?php esc_attr_e( 'Ví dụ: 2–4 ngày', 'k86-pro' ); ?>"
						value="<?php echo esc_attr( $product['shipping_time'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_shipping_fee">
						<?php esc_html_e( 'Shipping Fee', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_shipping_fee"
						name="k86_shipping_fee"
						class="regular-text"
						placeholder="<?php esc_attr_e( 'Ví dụ: Miễn phí', 'k86-pro' ); ?>"
						value="<?php echo esc_attr( $product['shipping_fee'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_shipping_note">
						<?php esc_html_e( 'Shipping Note', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_shipping_note"
						name="k86_shipping_note"
						rows="3"
						class="large-text"
					><?php echo esc_textarea( $product['shipping_note'] ?? '' ); ?></textarea>

				</td>

			</tr>

		</tbody>

	</table>

</div>
