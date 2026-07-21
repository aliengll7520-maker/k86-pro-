<?php
/**
 * K86 Pro Next Core
 * Product Description Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Description_Module' ) ) {

	class K86_Product_Description_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 60;

		}

		/**
		 * Render product description.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$description = '';

			if ( ! empty( $product['description'] ) ) {
				$description = wp_kses_post( $product['description'] );
			}

			ob_start();
			?>

			<div class="k86-product-description">

				<?php if ( ! empty( $description ) ) : ?>

					<div class="k86-description-content">
						<?php
						// Nội dung đã được lọc an toàn bằng wp_kses_post().
						echo $description;
						?>
					</div>

				<?php else : ?>

					<div class="k86-description-placeholder">

						<?php esc_html_e( 'Chưa có mô tả sản phẩm.', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
