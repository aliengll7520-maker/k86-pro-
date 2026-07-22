<?php
/**
 * Product Compare Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Comparison Table', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_compare_title">
						<?php esc_html_e( 'Table Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_compare_title"
						name="k86_compare_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['compare_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_compare_data">
						<?php esc_html_e( 'Comparison Data', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_compare_data"
						name="k86_compare_data"
						rows="12"
						class="large-text code"
					><?php echo esc_textarea( $product['compare_data'] ?? '' ); ?></textarea>

					<p class="description">
						<?php esc_html_e( 'Mỗi dòng là một hàng của bảng. Chúng ta sẽ chuyển sang giao diện trực quan ở phiên bản sau.', 'k86-pro' ); ?>
					</p>

				</td>

			</tr>

		</tbody>

	</table>

</div>
