<?php
/**
 * Product Voucher Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Gift & Voucher', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_gift_title">
						<?php esc_html_e( 'Gift Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_gift_title"
						name="k86_gift_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['gift_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_gift_description">
						<?php esc_html_e( 'Gift Description', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_gift_description"
						name="k86_gift_description"
						rows="4"
						class="large-text"
					><?php echo esc_textarea( $product['gift_description'] ?? '' ); ?></textarea>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_voucher_code">
						<?php esc_html_e( 'Voucher Code', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_voucher_code"
						name="k86_voucher_code"
						class="regular-text"
						value="<?php echo esc_attr( $product['voucher_code'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_voucher_description">
						<?php esc_html_e( 'Voucher Description', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_voucher_description"
						name="k86_voucher_description"
						rows="4"
						class="large-text"
					><?php echo esc_textarea( $product['voucher_description'] ?? '' ); ?></textarea>

				</td>

			</tr>

		</tbody>

	</table>

</div>
