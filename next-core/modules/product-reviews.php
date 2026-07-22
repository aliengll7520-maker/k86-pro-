<?php
/**
 * K86 Pro Next Core
 *
 * Product Reviews Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Reviews_Module' ) ) {

	class K86_Product_Reviews_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 50;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$reviews = array();

			if ( ! empty( $product['reviews'] ) && is_array( $product['reviews'] ) ) {
				$reviews = $product['reviews'];
			}

			if ( empty( $reviews ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-reviews">

				<h3>Đánh giá sản phẩm</h3>

				<?php foreach ( $reviews as $review ) : ?>

					<div class="k86-review-item">

						<div class="k86-review-author">
							<?php echo esc_html( $review['author'] ?? 'Khách hàng' ); ?>
						</div>

						<div class="k86-review-rating">
							⭐ <?php echo esc_html( number_format( (float) ( $review['rating'] ?? 5 ), 1 ) ); ?>
						</div>

						<div class="k86-review-content">
							<?php echo esc_html( $review['content'] ?? '' ); ?>
						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
