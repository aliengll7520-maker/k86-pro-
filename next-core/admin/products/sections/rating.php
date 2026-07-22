<?php
/**
 * Product Rating Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Rating & Reviews', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_rating">
						<?php esc_html_e( 'Average Rating', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="number"
						id="k86_rating"
						name="k86_rating"
						min="0"
						max="5"
						step="0.1"
						value="<?php echo esc_attr( $product['rating'] ?? '' ); ?>"
						class="small-text"
					/>

					<p class="description">
						<?php esc_html_e( 'Example: 4.8', 'k86-pro' ); ?>
					</p>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_review_count">
						<?php esc_html_e( 'Review Count', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="number"
						id="k86_review_count"
						name="k86_review_count"
						min="0"
						value="<?php echo esc_attr( $product['review_count'] ?? '' ); ?>"
						class="small-text"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_sold_count">
						<?php esc_html_e( 'Sold Count', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="number"
						id="k86_sold_count"
						name="k86_sold_count"
						min="0"
						value="<?php echo esc_attr( $product['sold_count'] ?? '' ); ?>"
						class="regular-text"
					/>

				</td>

			</tr>

		</tbody>

	</table>

</div>
