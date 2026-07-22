<?php
/**
 * Product Policy Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Product Policy', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_policy_title">
						<?php esc_html_e( 'Policy Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_policy_title"
						name="k86_policy_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['policy_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_warranty">
						<?php esc_html_e( 'Warranty', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_warranty"
						name="k86_warranty"
						class="regular-text"
						placeholder="<?php esc_attr_e( 'Ví dụ: Bảo hành 24 tháng', 'k86-pro' ); ?>"
						value="<?php echo esc_attr( $product['warranty'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_return_policy">
						<?php esc_html_e( 'Return Policy', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_return_policy"
						name="k86_return_policy"
						rows="3"
						class="large-text"
					><?php echo esc_textarea( $product['return_policy'] ?? '' ); ?></textarea>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_policy_note">
						<?php esc_html_e( 'Policy Note', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_policy_note"
						name="k86_policy_note"
						rows="3"
						class="large-text"
					><?php echo esc_textarea( $product['policy_note'] ?? '' ); ?></textarea>

				</td>

			</tr>

		</tbody>

	</table>

</div>
