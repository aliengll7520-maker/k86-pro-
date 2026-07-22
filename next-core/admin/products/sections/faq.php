<?php
/**
 * Product FAQ Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Frequently Asked Questions', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_faq_title">
						<?php esc_html_e( 'FAQ Title', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="k86_faq_title"
						name="k86_faq_title"
						class="regular-text"
						value="<?php echo esc_attr( $product['faq_title'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_faq_content">
						<?php esc_html_e( 'FAQ Content', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_faq_content"
						name="k86_faq_content"
						rows="12"
						class="large-text"
					><?php echo esc_textarea( $product['faq_content'] ?? '' ); ?></textarea>

					<p class="description">
						<?php esc_html_e( 'Mỗi câu hỏi và câu trả lời sẽ được tách thành từng mục ở phiên bản tiếp theo.', 'k86-pro' ); ?>
					</p>

				</td>

			</tr>

		</tbody>

	</table>

</div>
