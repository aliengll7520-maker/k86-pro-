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
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 60;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$description = ! empty( $product['description'] ) ? wp_kses_post( $product['description'] ) : '';

			if ( '' === $description ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-description">

				<h3>Mô tả sản phẩm</h3>

				<div class="k86-description-content">
					<?php echo $description; ?>
				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
