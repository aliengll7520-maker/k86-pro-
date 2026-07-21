<?php
/**
 * K86 Pro Next Core
 * Product List
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="wrap">

	<h1 class="wp-heading-inline">
		Product Manager
	</h1>

	<a href="<?php echo esc_url( admin_url( 'admin.php?page=k86-add-product' ) ); ?>" class="page-title-action">
		Add New
	</a>

	<hr class="wp-header-end">

	<table class="widefat striped">

		<thead>

			<tr>
				<th width="60">ID</th>
				<th>Product</th>
				<th width="140">Price</th>
				<th width="120">Status</th>
				<th width="160">Action</th>
			</tr>

		</thead>

		<tbody>

			<tr>

				<td colspan="5">

					<p style="text-align:center;padding:30px 0;">

						No products found.

					</p>

				</td>

			</tr>

		</tbody>

	</table>

</div>
