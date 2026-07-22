<?php
/**
 * Product Description Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Product Description', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_short_description">
						<?php esc_html_e( 'Short Description', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_short_description"
						name="k86_short_description"
						rows="4"
						class="large-text"
					><?php echo esc_textarea( $product['short_description'] ?? '' ); ?></textarea>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_highlights">
						<?php esc_html_e( 'Highlights', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_highlights"
						name="k86_highlights"
						rows="6"
						class="large-text"
					><?php echo esc_textarea( $product['highlights'] ?? '' ); ?></textarea>

					<p class="description">
						<?php esc_html_e( 'Mỗi dòng là một điểm nổi bật.', 'k86-pro' ); ?>
					</p>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_description">
						<?php esc_html_e( 'Full Description', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<?php
					wp_editor(
						$product['description'] ?? '',
						'k86_description',
						array(
							'textarea_name' => 'k86_description',
							'textarea_rows' => 12,
						)
					);
					?>

				</td>

			</tr>

		</tbody>

	</table>

</div>
