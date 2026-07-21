<?php
/**
 * K86 Pro Next Core
 * Product Form
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="wrap">

	<h1>Add Product</h1>

	<form method="post" action="">

		<table class="form-table">

			<tr>
				<th scope="row">
					<label for="k86_title">Product Title</label>
				</th>
				<td>
					<input
						type="text"
						id="k86_title"
						name="k86_title"
						class="regular-text"
					/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="k86_price">Price</label>
				</th>
				<td>
					<input
						type="number"
						id="k86_price"
						name="k86_price"
						class="regular-text"
					/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="k86_sale_price">Sale Price</label>
				</th>
				<td>
					<input
						type="number"
						id="k86_sale_price"
						name="k86_sale_price"
						class="regular-text"
					/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="k86_status">Status</label>
				</th>
				<td>

					<select
						id="k86_status"
						name="k86_status"
					>

						<option value="instock">
							In Stock
						</option>

						<option value="outofstock">
							Out of Stock
						</option>

					</select>

				</td>
			</tr>

		</table>

		<?php submit_button( 'Save Product' ); ?>

	</form>

</div>
