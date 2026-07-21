<?php
/**
 * K86 Pro Next Core
 *
 * Product Rating Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Rating_Module' ) ) {

	class K86_Product_Rating_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 50;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$rating = isset( $product['rating'] )
				? (float) $product['rating']
				: 0;

			$review_count = isset( $product['review_count'] )
				? absint( $product['review_count'] )
				: 0;

			ob_start();
			?>

			<div class="k86-product-rating">

				<div class="k86-rating-summary">

					<span class="k86-rating-score">
						<?php echo esc_html( number_format( $rating, 1 ) ); ?>/5
					</span>

					<span class="k86-rating-stars">
						★★★★★
					</span>

					<span class="k86-rating-count">
						(<?php echo esc_html( $review_count ); ?> reviews)
					</span>

				</div>

				<?php if ( 0 === $review_count ) : ?>

					<div class="k86-rating-placeholder">
						No reviews yet.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
