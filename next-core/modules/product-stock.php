<?php
/**
 * K86 Pro Next Core
 *
 * Product Stock Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Stock_Module' ) ) {

	class K86_Product_Stock_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 100;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$stock = isset( $product['stock'] ) ? (int) $product['stock'] : 0;

			ob_start();
			?>

			<div class="k86-product-stock">

				<?php if ( $stock > 0 ) : ?>

					<div class="k86-stock in-stock">
						✅ Còn hàng (<?php echo esc_html( number_format_i18n( $stock ) ); ?> sản phẩm)
					</div>

				<?php else : ?>

					<div class="k86-stock out-of-stock">
						❌ Hết hàng
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
