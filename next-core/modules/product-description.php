<?php
/**
 * K86 Pro Next Core
 *
 * Product Description Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Description_Module' ) ) {

	class K86_Product_Description_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 60;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
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
						<?php echo $description; // Nội dung đã được wp_kses_post() lọc ?>
					</div>

				<?php else : ?>

					<div class="k86-description-placeholder">
						No product description.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
