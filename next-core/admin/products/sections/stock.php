<?php
/**
 * Product Stock Section
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-admin-card">

	<h2><?php esc_html_e( 'Stock Information', 'k86-pro' ); ?></h2>

	<table class="form-table" role="presentation">

		<tbody>

			<tr>

				<th scope="row">
					<label for="k86_stock_status">
						<?php esc_html_e( 'Stock Status', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<select
						id="k86_stock_status"
						name="k86_stock_status"
					>

						<option value="in_stock" <?php selected( $product['stock_status'] ?? '', 'in_stock' ); ?>>
							<?php esc_html_e( 'In Stock', 'k86-pro' ); ?>
						</option>

						<option value="low_stock" <?php selected( $product['stock_status'] ?? '', 'low_stock' ); ?>>
							<?php esc_html_e( 'Low Stock', 'k86-pro' ); ?>
						</option>

						<option value="out_of_stock" <?php selected( $product['stock_status'] ?? '', 'out_of_stock' ); ?>>
							<?php esc_html_e( 'Out of Stock', 'k86-pro' ); ?>
						</option>

					</select>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_stock_quantity">
						<?php esc_html_e( 'Quantity', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<input
						type="number"
						id="k86_stock_quantity"
						name="k86_stock_quantity"
						min="0"
						class="small-text"
						value="<?php echo esc_attr( $product['stock_quantity'] ?? '' ); ?>"
					/>

				</td>

			</tr>

			<tr>

				<th scope="row">
					<label for="k86_stock_note">
						<?php esc_html_e( 'Stock Note', 'k86-pro' ); ?>
					</label>
				</th>

				<td>

					<textarea
						id="k86_stock_note"
						name="k86_stock_note"
						rows="3"
						class="large-text"
					><?php echo esc_textarea( $product['stock_note'] ?? '' ); ?></textarea>

				</td>

			</tr>

		</tbody>

	</table>

</div>
