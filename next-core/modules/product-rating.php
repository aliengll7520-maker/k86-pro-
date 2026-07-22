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
		 * Render rating.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$rating = isset( $product['rating'] ) ? (float) $product['rating'] : 0;

			if ( $rating <= 0 ) {
				return '';
			}

			$rating = max( 0, min( 5, $rating ) );

			ob_start();
			?>

			<div class="k86-product-rating">

				<div class="k86-rating-score">

					<?php echo esc_html( number_format( $rating, 1 ) ); ?>

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

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
