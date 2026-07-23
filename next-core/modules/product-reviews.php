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

			return 55;

		}

		/**
		 * Get review count.
		 *
		 * @param array $product Product data.
		 *
		 * @return int
		 */
		protected function get_review_count( array $product ) {

			return ! empty( $product['review_count'] )
				? absint( $product['review_count'] )
				: 0;

		}

		/**
		 * Get sold count.
		 *
		 * @param array $product Product data.
		 *
		 * @return int
		 */
		protected function get_sold_count( array $product ) {

			return ! empty( $product['sold_count'] )
				? absint( $product['sold_count'] )
				: 0;

		}

		/**
		 * Render reviews summary.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$reviews = $this->get_review_count( $product );
			$sold    = $this->get_sold_count( $product );

			if ( $reviews <= 0 && $sold <= 0 ) {
				return '';
			}

			$rating = ! empty( $product['rating'] )
				? number_format( (float) $product['rating'], 1 )
				: '';

			ob_start();
			?>

			<div class="k86-product-reviews">

				<?php if ( $rating ) : ?>

					<div class="k86-review-rating">
						⭐ <?php echo esc_html( $rating ); ?>/5
					</div>

				<?php endif; ?>

				<?php if ( $reviews > 0 ) : ?>

					<div class="k86-review-count">
						<?php echo esc_html( number_format_i18n( $reviews ) ); ?>
						<?php esc_html_e( ' đánh giá', 'k86-pro' ); ?>
					</div>

				<?php endif; ?>

				<?php if ( $sold > 0 ) : ?>

					<div class="k86-sold-count">
						<?php echo esc_html( number_format_i18n( $sold ) ); ?>
						<?php esc_html_e( ' đã bán', 'k86-pro' ); ?>
					</div>

				<?php endif; ?>

				<div class="k86-review-link">
					<a href="#reviews">
						<?php esc_html_e( 'Xem tất cả đánh giá', 'k86-pro' ); ?>
					</a>
				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
