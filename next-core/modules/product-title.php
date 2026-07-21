<?php
/**
 * K86 Pro Next Core
 *
 * Product Title Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Title_Module' ) ) {

	class K86_Product_Title_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 10;

		}

		/**
		 * Render module.
		 *
		 * @param array $product
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = '';

			if ( ! empty( $product['title'] ) ) {
				$title = esc_html( $product['title'] );
			}

			ob_start();
			?>

			<div class="k86-product-title">
				<h1><?php echo $title; ?></h1>
			</div>

			<?php

			return ob_get_clean();

		}

	}

}
