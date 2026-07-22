<?php
/**
 * K86 Pro Next Core
 *
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
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$highlights = array();

			if ( ! empty( $product['highlights'] ) && is_array( $product['highlights'] ) ) {
				$highlights = $product['highlights'];
			}

			if ( empty( $highlights ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-highlights">

				<?php foreach ( $highlights as $item ) : ?>

					<span class="k86-highlight-item">
						<?php echo esc_html( $item ); ?>
					</span>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}
