<?php
/**
 * K86 Pro Next Core
 * Product Layout
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="k86-product-layout">

	<div class="k86-product-header">

		<?php require dirname( __DIR__ ) . '/modules/product-title.php'; ?>

	</div>

	<div class="k86-product-content">

		<div class="k86-product-left">

			<?php require dirname( __DIR__ ) . '/modules/product-video.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-gallery.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-highlights.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-rating.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-reviews.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-description.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-compare.php'; ?>

		</div>

		<div class="k86-product-right">

			<?php require dirname( __DIR__ ) . '/modules/product-voucher.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-countdown.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-stock.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-shipping.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-policy.php'; ?>

			<?php require dirname( __DIR__ ) . '/modules/product-actions.php'; ?>

		</div>

	</div>

	<div class="k86-product-footer">

		<?php require dirname( __DIR__ ) . '/modules/trust.php'; ?>

		<?php require dirname( __DIR__ ) . '/modules/product-faq.php'; ?>

	</div>

</div>
