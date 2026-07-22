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
		 * Render reviews summary.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$reviews = isset( $product['review_count'] ) ? (int) $product['review_count'] : 0;
			$sold    = isset( $product['sold_count'] ) ? (int) $product['sold_count'] : 0;

			if ( $reviews <= 0 && $sold <= 0 ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-reviews">

				<?php if ( $reviews > 0 ) : ?>

					<div class="k86-review-count">

						<?php echo esc_html( number_format_i18n( $reviews ) ); ?>
						<?php esc_html_e( 'đánh giá', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

				<?php if ( $sold > 0 ) : ?>

					<div class="k86-sold-count">

						<?php echo esc_html( number_format_i18n( $sold ) ); ?>
						<?php esc_html_e( 'đã bán', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
