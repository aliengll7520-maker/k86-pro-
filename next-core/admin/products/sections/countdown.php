<?php
/**
 * Product Countdown Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Countdown Timer', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_countdown_title">
						<?php esc_html_e( 'Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_countdown_title"
						name="k86_countdown_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['countdown_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_countdown_end">
						<?php esc_html_e( 'End Time', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="datetime-local"
						id="k86_countdown_end"
						name="k86_countdown_end"
						value="<?php echo esc_attr( $product['countdown_end'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_countdown_note">
						<?php esc_html_e( 'Note', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_countdown_note"
						name="k86_countdown_note"
						rows="3"
						class="large-text"
					><?php echo esc_textarea( $product['countdown_note'] ?? '' ); ?></textarea>

				</td>

			</tr>

		</tbody>

	</table>

</div>
