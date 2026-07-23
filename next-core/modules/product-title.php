<?php
/**
 * K86 Pro Next Core
 *
 * Product Title Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Title_Module' ) ) {

	class K86_Product_Title_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 10;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title   = ! empty( $product['title'] ) ? esc_html( $product['title'] ) : '';
			$badge   = ! empty( $product['badge'] ) ? esc_html( $product['badge'] ) : '';
			$rating  = isset( $product['rating'] ) ? (float) $product['rating'] : 0;
			$reviews = isset( $product['review_count'] ) ? (int) $product['review_count'] : 0;
			$sold    = ! empty( $product['sold'] ) ? esc_html( $product['sold'] ) : '';
$brand    = ! empty( $product['brand'] ) ? esc_html( $product['brand'] ) : '';
$sku      = ! empty( $product['sku'] ) ? esc_html( $product['sku'] ) : '';
$category = ! empty( $product['category'] ) ? esc_html( $product['category'] ) : '';
$stock    = ! empty( $product['stock_status'] ) ? esc_html( $product['stock_status'] ) : '';
$official = ! empty( $product['official'] );
			ob_start();
			?>

			<div class="k86-product-title">

				<?php if ( $badge ) : ?>
					<div class="k86-product-badge">
						<?php echo $badge; ?>
					</div>
				<?php endif; ?>

				<h1 class="k86-product-name">
					<?php echo $title; ?>
				</h1>

				<div class="k86-product-meta">
					<?php if ( $brand ) : ?>
	<span class="k86-product-brand">
		Thương hiệu: <?php echo $brand; ?>
	</span>
<?php endif; ?>

<?php if ( $sku ) : ?>
	<span class="k86-product-sku">
		SKU: <?php echo $sku; ?>
	</span>
<?php endif; ?>

<?php if ( $category ) : ?>
	<span class="k86-product-category">
		<?php echo $category; ?>
	</span>
<?php endif; ?>

<?php if ( $stock ) : ?>
	<span class="k86-product-stock">
		<?php echo $stock; ?>
	</span>
<?php endif; ?>

<?php if ( $official ) : ?>
	<span class="k86-product-official">
		✔ Chính hãng
	</span>
<?php endif; ?>

					<?php if ( $rating > 0 ) : ?>
						<span class="k86-product-rating">
							⭐ <?php echo esc_html( number_format( $rating, 1 ) ); ?>
						</span>
					<?php endif; ?>

					<?php if ( $reviews > 0 ) : ?>
						<span class="k86-product-reviews">
							(<?php echo esc_html( number_format_i18n( $reviews ) ); ?> đánh giá)
						</span>
					<?php endif; ?>

					<?php if ( $sold ) : ?>
						<span class="k86-product-sold">
							Đã bán <?php echo $sold; ?>
						</span>
					<?php endif; ?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
