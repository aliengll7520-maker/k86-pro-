<?php
/**
 * K86 Pro Next Core
 * Product Highlights Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Highlights_Module' ) ) {

	class K86_Product_Highlights_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 40;

		}

		/**
		 * Render product highlights.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$highlights = array();

			if (
				isset( $product['highlights'] ) &&
				is_array( $product['highlights'] )
			) {
				$highlights = $product['highlights'];
			}

			ob_start();
			?>

			<div class="k86-product-highlights">

				<?php if ( ! empty( $highlights ) ) : ?>

					<ul class="k86-highlights-list">

						<?php foreach ( $highlights as $item ) : ?>

							<li class="k86-highlight-item">

								<span class="k86-highlight-icon">✓</span>

								<span class="k86-highlight-text">
									<?php echo esc_html( $item ); ?>
								</span>

							</li>

						<?php endforeach; ?>

					</ul>

				<?php else : ?>

					<div class="k86-highlights-placeholder">

						<?php esc_html_e( 'Chưa có điểm nổi bật của sản phẩm.', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
