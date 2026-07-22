<?php
/**
 * K86 Pro Next Core
 * Product Form
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

// Product mặc định.
$product = $product ?? array();

?>
<div class="wrap">

	<h1><?php esc_html_e( 'Add Product', 'k86-pro' ); ?></h1>

	<form
		method="post"
		action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
	>

		<input
			type="hidden"
			name="action"
			value="k86_save_product"
		/>

		<?php wp_nonce_field( 'k86_save_product', 'k86_product_nonce' ); ?>

		<?php require __DIR__ . '/sections/basic.php'; ?>

		<?php require __DIR__ . '/sections/media.php'; ?>

		<?php require __DIR__ . '/sections/pricing.php'; ?>

		<?php require __DIR__ . '/sections/actions.php'; ?>

		<?php require __DIR__ . '/sections/rating.php'; ?>

		<?php require __DIR__ . '/sections/description.php'; ?>

		<?php require __DIR__ . '/sections/compare.php'; ?>

		<?php require __DIR__ . '/sections/voucher.php'; ?>

		<?php require __DIR__ . '/sections/countdown.php'; ?>

		<?php require __DIR__ . '/sections/stock.php'; ?>

		<?php require __DIR__ . '/sections/shipping.php'; ?>

		<?php require __DIR__ . '/sections/policy.php'; ?>

		<?php require __DIR__ . '/sections/faq.php'; ?>

		<?php submit_button( __( 'Save Product', 'k86-pro' ) ); ?>

	</form>

</div>
