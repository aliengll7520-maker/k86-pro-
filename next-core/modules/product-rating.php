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
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 50;

		}

		/**
		 * Get rating.
		 *
		 * @param array $product Product data.
		 *
		 * @return float
		 */
		protected function get_rating( array $product ) {

			$rating = isset( $product['rating'] ) ? (float) $product['rating'] : 0;

			return max( 0, min( 5, $rating ) );

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
		 * Render rating.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$rating = $this->get_rating( $product );

			if ( $rating <= 0 ) {
				return '';
			}

			$reviews = $this->get_review_count( $product );
			$percent = round( ( $rating / 5 ) * 100 );

			ob_start();
			?>

			<div class="k86-product-rating">

				<div class="k86-rating-score">
					<?php echo esc_html( number_format( $rating, 1 ) ); ?>/5
				</div>

				<div class="k86-rating-stars">

					<?php
					for ( $i = 1; $i <= 5; $i++ ) {

						if ( $rating >= $i ) {

							echo '<span class="k86-star filled">★</span>';

						} elseif ( $rating >= ( $i - 0.5 ) ) {

							echo '<span class="k86-star half">★</span>';

						} else {

							echo '<span class="k86-star">☆</span>';

						}

					}
					?>

				</div>

				<?php if ( $reviews > 0 ) : ?>

					<div class="k86-rating-reviews">
						<?php echo esc_html( number_format_i18n( $reviews ) ); ?> đánh giá
					</div>

				<?php endif; ?>

				<div class="k86-rating-percent">
					<?php echo esc_html( $percent ); ?>% hài lòng
				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
